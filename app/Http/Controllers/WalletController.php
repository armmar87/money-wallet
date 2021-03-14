<?php

namespace App\Http\Controllers;

use App\Http\Requests\WalletRequest;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    private $model;

    function __construct(Wallet $wallet) {
        $this->model = $wallet;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wallets = $this->model->all();

        return view('wallets.index', compact('wallets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wallets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WalletRequest $request)
    {
        $user = auth()->user();
        if (! $user->first_time) {
            $user->first_time = Carbon::now();
            $user->save();
        }
        $request->merge(['user_id' => $user->id]);
        $this->model->store($request->all());

        return redirect()->route('wallets.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function edit(Wallet $wallet)
    {
        return view('wallets.edit', compact('wallet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function update(WalletRequest $request, Wallet $wallet)
    {
        $wallet->store($request->all());

        return redirect()->route('wallets.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wallet $wallet)
    {
        $wallet->delete();

        return redirect()->route('wallets.index');
    }
}
