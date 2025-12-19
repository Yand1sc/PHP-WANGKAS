<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\CashTransaction;
use Illuminate\Support\Facades\Storage;

$transactions = CashTransaction::whereNotNull('proof_file')->get();

foreach ($transactions as $t) {
    $path = $t->proof_file;
    $full = storage_path('app/public/' . $path);
    $exists_native_bool = file_exists($full);
    $exists_native = $exists_native_bool ? 'yes' : 'no';
    $exists_disk = Storage::disk('public')->exists($path) ? 'yes' : 'no';
    $size = $exists_native_bool ? filesize($full) : 0;
    $mtime = $exists_native_bool ? date('c', filemtime($full)) : 'n/a';

    echo "ID: {$t->id}\n";
    echo "  proof_file (DB): {$path}\n";
    echo "  storage_path: {$full}\n";
    echo "  file_exists(storage_path): {$exists_native}\n";
    echo "  Storage::disk('public')->exists: {$exists_disk}\n";
    echo "  size: {$size}\n";
    echo "  mtime: {$mtime}\n";
    echo "-----------------------------\n";
}

echo 'TOTAL_WITH_PROOF: ' . count($transactions) . PHP_EOL;
