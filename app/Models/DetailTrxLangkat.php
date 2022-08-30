<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class DetailTrxLangkat extends Model
{
    protected $connection = "dblangkat";
    protected $collection = "transactions";
}
