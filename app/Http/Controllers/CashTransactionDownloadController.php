<?php

namespace App\Http\Controllers;

use App\Models\CashTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CashTransactionDownloadController extends Controller
{
    /**
     * Serve proof file for a cash transaction using the public disk.
     */
    public function __invoke(Request $request, CashTransaction $cashTransaction)
    {
        $path = $cashTransaction->proof_file;

        if (! $path || ! Storage::disk('public')->exists($path)) {
            abort(404);
        }

        return Storage::disk('public')->download($path);
    }
}
