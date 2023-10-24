<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $transactionss = Transaction::query()->latest()->paginate(9);
        return view('landing', compact('transactionss'));
    }
}
