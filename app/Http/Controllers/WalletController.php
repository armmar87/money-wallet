<?php

namespace App\Http\Controllers;

use App\Http\Requests\WalletStoreRequest;
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
        if (! auth()->user()->first_time) {
            session()->flash('status', 'You need to create a wallet to be continued!');
            return redirect()->route('wallets.create');
        }

        $wallets = $this->model->all();

        return view('wallet', compact('wallets'));
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
    public function store(WalletStoreRequest $request)
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
     * Display the specified resource.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function show(Wallet $wallet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function edit(Wallet $wallet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wallet $wallet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wallet $wallet)
    {
        //
    }
}
