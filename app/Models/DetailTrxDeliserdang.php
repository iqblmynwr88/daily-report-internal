<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class DetailTrxDeliserdang extends Model
{
    protected $connection = "dbdeliserdang";
    protected $collection = "transactions";
}
