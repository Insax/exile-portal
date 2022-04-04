<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogTemplate extends Model
{
    public $incrementing = true;
    public $timestamps = true;

    protected $connection = 'portal';
    protected $table = 'log_templates';
    protected $primaryKey = 'id';

    protected $casts = [
        'id' => 'int',
        'log_name' => 'string',
        'argument_count' => 'string',
        'template' => 'string'
    ];

    protected $fillable = [
        'log_name',
        'argument_count',
        'template'
    ];
}
