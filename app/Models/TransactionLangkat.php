<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class TransactionLangkat extends Model
{
    protected $connection = "dblangkat";
    protected $collection = "devices";
}
