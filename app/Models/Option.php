<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $fillable = ['label','value','displayOrder','field_id'];

    public function field(){
        return $this->belongsTo('App\Models\Field');
    }
}
