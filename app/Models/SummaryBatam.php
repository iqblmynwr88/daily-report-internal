<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class SummaryBatam extends Model
{
    protected $connection = "dbbatam";
    protected $collection = "summaries";
}
