<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class DetailTrxPematangsiantar extends Model
{
    protected $connection = "dbpematangsiantar";
    protected $collection = "transactions";
}
