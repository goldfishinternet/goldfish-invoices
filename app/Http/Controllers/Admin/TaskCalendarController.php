<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Carbon\Carbon;

class TaskCalendarController extends Controller
{
    public function index()
    {
        $events = Task::whereNotNull('due_date')
            ->get()
            ->map(function ($task) {
                return [
                    'title' => $task->name,
                    'start' => Carbon::createFromFormat(config('project.date_format'), $task->due_date)->format('Y-m-d'),
                    'url'   => route('admin.tasks.show', $task),
                ];
            });

        return view('admin.task-calendar.index', compact('events'));
    }
}
