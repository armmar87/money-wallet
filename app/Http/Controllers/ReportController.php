<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Wallet;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! auth()->user()->first_time) {
            session()->flash('status', 'You need to create a wallet to be continued!');
            return redirect()->route('wallets.create');
        }

        $wallets = Wallet::with('records')->get();

        return view('report', compact('wallets'));
    }
}
