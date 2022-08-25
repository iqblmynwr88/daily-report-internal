<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class MerchantLangkat extends Model
{
    protected $connection = "dblangkat";
    protected $collection = "merchants";
}
