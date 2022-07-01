<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class TransactionDeliserdang extends Model
{
    protected $connection = "dbdeliserdang";
    protected $collection = "devices";
}
