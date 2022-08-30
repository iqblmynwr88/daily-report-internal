<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class DetailTrxKaro extends Model
{
    protected $connection = "dbkaro";
    protected $collection = "transactions";
}
