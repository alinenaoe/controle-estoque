<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //se você não nomear os arquivos no padrão do Laravel, fazer isso:
    // public $tableName = 'products';
    // public $primaryKey = 'nome da primary key';
    // public $timestamps = false;

    public function users () {
        return $this->belongsTo('App\User');
    }

}
