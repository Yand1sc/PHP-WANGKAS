<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\CashTransaction;

$missing = CashTransaction::whereNotNull('proof_file')->get()->filter(function ($t) {
    return ! file_exists(storage_path('app/public/' . $t->proof_file));
});

if (count($missing) === 0) {
    echo "NO_MISSING\n";
    exit(0);
}

$ids = $missing->pluck('id')->toArray();

CashTransaction::whereIn('id', $ids)->update(['proof_file' => null]);

foreach ($ids as $id) {
    echo "CLEARED: {$id}\n";
}

echo 'TOTAL_CLEARED: ' . count($ids) . PHP_EOL;
