<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class DetailTrxBatam extends Model
{
    protected $connection = "dbbatam";
    protected $collection = "transactions";
}
