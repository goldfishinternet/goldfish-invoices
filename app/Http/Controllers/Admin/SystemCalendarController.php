<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SystemCalendarController extends Controller
{
    public $sources = [
    ];

    public function index()
    {
        abort_if(Gate::denies('system_calendar_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $events = [];

        foreach ($this->sources as $source) {
            foreach ($source['model']::all() as $model) {
                $crudFieldValue = $model->getAttributes()[$source['date_field']];

                if (!$crudFieldValue) {
                    continue;
                }

                $events[] = [
                    'title' => sprintf(
                        '%s %s %s',
                        trim($source['prefix']),
                        $model->{$source['field']},
                        trim($source['suffix']),
                    ),
                    'start' => $crudFieldValue,
                    'url'   => route($source['route'], $model),
                ];
            }
        }

        return view('admin.system-calendar.index', compact('events'));
    }
}
