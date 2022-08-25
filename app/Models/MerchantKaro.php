<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class MerchantKaro extends Model
{
    protected $connection = "dbkaro";
    protected $collection = "merchants";
}
