<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContainerPackLog extends Model
{
    public $incrementing = false;
    public $timestamps = false;

    protected $connection = 'portal';
    protected $table = 'container_pack_logs';
    protected $primaryKey = 'id';

    protected $casts = [
        'id' => 'int',
        'portal_instance_id' => 'int',
        'sender_uid' => 'string',
        'recipient_uid' => 'string',
        'message' => 'string',
        'time' => 'datetime'
    ];

    protected $fillable = [
        'portal_instance_id',
        'sender_uid',
        'recipient_uid',
        'message',
        'time'
    ];
}
