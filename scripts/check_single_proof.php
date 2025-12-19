<?php

if ($argc < 2) {
    echo "Usage: php check_single_proof.php <id>\n";
    exit(1);
}

$id = (int) $argv[1];

require __DIR__ . '/../vendor/autoload.php';

$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\CashTransaction;
use Illuminate\Support\Facades\Storage;

$t = CashTransaction::find($id);
if (! $t) {
    echo "Transaction with ID {$id} not found.\n";
    exit(1);
}

$path = $t->proof_file;
echo "ID: {$id}\n";
echo "DB proof_file: " . ($path ?? 'NULL') . "\n";

if (! $path) {
    exit(0);
}

$full = storage_path('app/public/' . $path);
echo "storage_path: {$full}\n";

$exists_native = file_exists($full) ? 'yes' : 'no';
$exists_disk = Storage::disk('public')->exists($path) ? 'yes' : 'no';

echo "file_exists(storage_path): {$exists_native}\n";
echo "Storage::disk('public')->exists: {$exists_disk}\n";

if ($exists_native === 'yes') {
    echo "size: " . filesize($full) . " bytes\n";
    echo "mtime: " . date('c', filemtime($full)) . "\n";
}

echo "Route download URL: http://127.0.0.1:8000/kas/{$id}/download\n";
