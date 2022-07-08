<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class MerchantPematangsiantar extends Model
{
    protected $connection = "dbpematangsiantar";
    protected $collection = "merchants";
}
