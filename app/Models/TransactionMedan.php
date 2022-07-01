<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class TransactionMedan extends Model
{
    protected $connection = "dbmedan";
    protected $collection = "devices";
    // protected $primaryKey = "_id";
    
}