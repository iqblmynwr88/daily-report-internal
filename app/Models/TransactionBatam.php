<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class TransactionBatam extends Model
{
    protected $connection = "dbbatam";
    protected $collection = "devices";
}