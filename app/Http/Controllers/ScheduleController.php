<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        return Schedule::all();
    }

    public function store(Request $request)
    {
        $schedule = new Schedule([
            'date' => \DateTime::createFromFormat('d/m/Y', $request->get('date')),
        ]);
        $schedule->save();

        return response()->json(['message' => 'add new schedule with success']);
    }

    public function show(Schedule $schedule)
    {
        return $schedule;
    }

    public function update(Request $request, int $schedule)
    {
        Schedule::where('id', $schedule)
            ->update(['date' => \DateTime::createFromFormat('d/m/Y', $request->get('date'))]);

        return response()->json(['message' => 'Schedule updated with success']);
    }

    public function destroy(int $schedule)
    {
        Schedule::destroy($schedule);

        return response()->json(['message' => 'Schedule deleted with success']);
    }
}
