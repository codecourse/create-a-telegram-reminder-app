<?php

namespace App\Models;

use App\Helpers\Date;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $fillable = [
        'body',
        'frequency',
        'day',
        'date',
        'time',
        'expression',
        'run_once',
    ];

    public function shouldBeRunOnce()
    {
        return $this->run_once;
    }

    public function getFrequencyAttribute($value)
    {
        return array_get(Date::frequencies(), $value);
    }

    public function getDayAttribute($value)
    {
        if ($value === null) {
            return;
        }

        return array_get(Date::days(), $value);
    }

    public function getDateAttribute($value)
    {
        if ($value === null) {
            return;
        }
        
        return Date::ordinal($value);
    }
}
