<?php

namespace App\Http\Controllers;

use App\Models\ParsedHumanReadableLog;
use Illuminate\Http\Request;

class LogsController extends Controller
{
    public function listLogs()
    {
        foreach (ParsedHumanReadableLog::all() as $log) {
            var_dump($log);
        }
        die();
    }
}
