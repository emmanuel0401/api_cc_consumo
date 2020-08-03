<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escrituras extends Model
{
    protected $fillable = ["nombrepropietario", "apellidopaterno", "apellidomaterno", "notaria", "expediente", "tomo", "numeroescritura"];
}
