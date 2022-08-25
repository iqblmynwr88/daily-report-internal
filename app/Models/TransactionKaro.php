<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class TransactionKaro extends Model
{
    protected $connection = "dbkaro";
    protected $collection = "devices";
}
