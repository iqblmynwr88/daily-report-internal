<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class MerchantBatam extends Model
{
    protected $connection = "dbbatam";
    protected $collection = "merchants";
}
