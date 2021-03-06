<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $fillable = ['id','relationship','systemName','label',
                            'dataType','isRequired','isAvailableInContactManager',
                             'empresa_id','categoria_id'];
    public $incrementing = false;
    protected $keyType = 'integer';

    public function guiones(){
        return $this->belongsToMany('App\Models\Guion','guiones_fields')->withPivot('order');
    }
    public function options(){
        return $this->hasMany('App\Models\Option');
    }

    public function category(){
        return $this->belongsTo('App\Models\FieldsCategory','categoria_id','id');
    }    
}
