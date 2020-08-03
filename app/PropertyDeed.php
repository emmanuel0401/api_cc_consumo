<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyDeed extends Model
{
    protected $fillable = ["nombrepropietario", "apellidopaterno", "apellidomaterno", "notaria", "expediente", "tomo", "numeroescritura"];
}
