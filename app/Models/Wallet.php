<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\UserWalletScope;

class Wallet extends Model
{
    use HasFactory;

    protected $table = 'wallets';
    protected $fillable = ['user_id', 'name', 'type'];

    protected static function booted()
    {
        static::addGlobalScope(new UserWalletScope());
    }

    public function store(array $data)
    {
        $this->fill($data);
        $this->save();
    }
}
