<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class FieldsCategory extends Model
{
    use HasFactory;

    protected $table = 'fields_categories';

    public function fields(){
        return $this->hasMany('App\Models\Field','categoria_id')->where('empresa_id',Auth::user()->empresa->id);
    }

    public function opportunityFields(){
        return $this->hasMany('App\Models\Field','categoria_id')->where('relationship','opportunity')->where('empresa_id',Auth::user()->empresa->id);
    }
}
