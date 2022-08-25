<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class MerchantAsahan extends Model
{
    protected $connection = "dbasahan";
    protected $collection = "merchants";
}
