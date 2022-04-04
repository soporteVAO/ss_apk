<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guion extends Model
{
    use HasFactory;
    protected $table = 'guiones';
    protected $fillable = ['nombre','empresa_id'];
    protected $keyType = 'integer';

    public function fields(){
        return $this->belongsToMany('App\Models\Field','guiones_fields')->withPivot('order');
    }

    public function getOrderedFields(){
        return $this->fields()->orderBy('order')->orderBy('categoria_id')->get();
        // return $this->fields()->join('fields')
    }
}
