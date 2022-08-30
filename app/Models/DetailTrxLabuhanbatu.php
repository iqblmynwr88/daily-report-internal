<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class DetailTrxLabuhanbatu extends Model
{
    protected $connection = "dblabuanbatu";
    protected $collection = "transactions";
}
