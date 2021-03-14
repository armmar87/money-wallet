<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $table = 'records';
    protected $fillable = ['wallet_id', 'amount', 'type'];

    public function store(array $data)
    {
        $this->fill($data);
        $this->save();
    }

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
}
