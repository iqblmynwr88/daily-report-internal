<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class MerchantMedan extends Model
{
    protected $connection = "dbmedan";
    protected $collection = "merchants";
}
