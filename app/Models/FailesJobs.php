<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FailesJobs extends Model
{
    protected $table = 'failed_jobs';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'connection',
        'queue',
        'payload',
        'exception',
        'failed_at'
    ];
}
