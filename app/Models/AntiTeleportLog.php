<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AntiTeleportLog extends Logging
{
    function toString(): string
    {
        return view('logs.entries.anti-tp', ['log' => $this])->render();
    }
}
