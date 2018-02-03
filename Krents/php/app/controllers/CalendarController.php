<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 12/19/17
 * Time: 7:57 PM
 */

namespace Controllers;


use App\Models\Event;

class CalendarController
{

    public function index()
    {
        $dates       = [];
        $week        = [];
        $dayNumStart = date('N', strtotime(date('1.m.Y')));
        for ($i = 1; $i < $dayNumStart; $i++) {
            $week[$i] = '';
        }
        $curDay  = $dayNumStart;
        $lastDay = date('t');
        for ($dayNum = 1; $dayNum <= $lastDay; $dayNum++) {
            if (count($week) > 6) {
                $dates[] = $week;
                $week    = [];
                $curDay  = 0;

            }

            $week[$curDay] = date($dayNum.'.m.Y');
            $curDay++;
        }
        if (count($week) > 0) {
            $dates[] = $week;
        }

        return view('calendar/index', [
            'events' => Event::all(),
            'dates'  => $dates
        ]);
    }


    public function getEvent($input)
    {
        return Event::getData($input['date']);
    }

    public function getFilterEvent($input)
    {
        $from   = $input['from'] === '' ? null : strtotime($input['from']);
        $to     = $input['to'] === '' ? null : strtotime($input['to']);
        $events = Event::all();
        $result = [];
        foreach ($events as $event) {
            $dateEvent = strtotime($event);
            if (
                ($from === null && $to === null) ||
                ($to === null && $dateEvent >= $from) ||
                ($from === null && $dateEvent <= $to) ||
                ($from !== null && $dateEvent <= $to && $to !== null && $dateEvent >= $from)

            ) {
                $result[$event] = Event::getData($event);
            }
        }

        return json_encode($result);
    }
}