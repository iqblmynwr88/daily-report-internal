<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class SummaryReport extends Model
{
    protected $connection = 'dbmedan';
    protected $collection = 'summaries';
}
