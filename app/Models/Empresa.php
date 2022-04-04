<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','cuenta_id','api_key'];

    public function fields(){
        return $this->hasMany('App\Models\Field');
    }

    public function users(){
        return $this->hasMany('App\Models\User');
    }

    // /**
    //  * The "booted" method of the model
    //  * 
    //  * @return void
    //  */
    // protected static function booted(){
    //     static::deleting(function(Empresa $empresa){
    //         $empresa->fields()->delete();
    //         $empresa->users()->delete();
    //     });
    // }
}
