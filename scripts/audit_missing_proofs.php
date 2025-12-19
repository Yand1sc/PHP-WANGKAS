<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\CashTransaction;

$missing = CashTransaction::whereNotNull('proof_file')->get()->filter(function ($t) {
    return ! file_exists(storage_path('app/public/' . $t->proof_file));
});

foreach ($missing as $m) {
    echo $m->id . ' => ' . $m->proof_file . PHP_EOL;
}

echo 'TOTAL_MISSING: ' . count($missing) . PHP_EOL;
