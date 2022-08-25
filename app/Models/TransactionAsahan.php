<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class TransactionAsahan extends Model
{
    protected $connection = "dbasahan";
    protected $collection = "devices";
}
