<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class DetailTrxAsahan extends Model
{
    protected $connection = "dbasahan";
    protected $collection = "transactions";
}
