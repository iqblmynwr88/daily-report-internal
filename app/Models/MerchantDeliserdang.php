<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class MerchantDeliserdang extends Model
{
    protected $connection = "dbdeliserdang";
    protected $collection = "merchants";
}
