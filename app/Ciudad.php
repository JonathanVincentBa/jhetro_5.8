<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table='ciudad';

    protected $primaryKey='id_ciudad';

    public $timestamps=true;

    protected $fillable =[
    	'descripcion',
    	'estado'
    ];

    protected $guarded =[

    ];
}
