<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = ['id','accountName','ownerID'];

    public function __construct($account){
        // dd($account[0]);
        $this->id = $account->id;
        $this->accountName = $account->accountName;
    }
}
