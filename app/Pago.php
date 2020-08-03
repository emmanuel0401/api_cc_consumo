<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Extension\Table\Table;

class Pago extends Model
{
    protected $table = 'pagos';
    protected $primaryKey = 'idpagos';
}
