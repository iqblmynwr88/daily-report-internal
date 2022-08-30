<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class DetailTrxMedan extends Model
{
    protected $connection = "dbmedan";
    protected $collection = "transactions";
}
