<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $table = 'activity_logs';  // Explicitly define the table name

    protected $fillable = [
        'log_name',
        'subject_id',
        'subject_type',
        'causer_id',
        'causer_type',
        'properties',
    ];
}