<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class TransactionPematangsiantar extends Model
{
    protected $connection = "dbpematangsiantar";
    protected $collection = "devices";
}
