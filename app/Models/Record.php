<?php

namespace App\Models;

use App\Scopes\UserRecordScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $table = 'records';
    protected $fillable = ['wallet_id', 'amount', 'type'];
    protected $appends = ['action'];

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }

    protected static function booted()
    {
        static::addGlobalScope(new UserRecordScope());
    }

    public function getActionAttribute()
    {
        return $this->action = $this->amount >= 0 ? 'Add' : 'Withdraw';
    }

    public function store(array $data)
    {
        $this->fill($data);
        $this->save();
    }
}
