<?php

namespace App\Http\Controllers;

use App\Models\ParsedHumanReadableLog;
use Illuminate\Http\Request;

class LogsController extends Controller
{
    public function listLogs()
    {
        return view('logs.list', ['logs' => ParsedHumanReadableLog::all()]);
    }
}
