<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecordRequest;
use App\Models\Record;
use App\Models\Wallet;

class RecordController extends Controller
{

    private $model;

    function __construct(Record $record) {
        $this->model = $record;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = $this->model->with('wallet')->get();

        return view('records.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wallets = Wallet::all();

        return view('records.create', compact('wallets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecordRequest $request)
    {
        $this->model->store($request->all());

        return redirect()->route('records.index');
    }

}
