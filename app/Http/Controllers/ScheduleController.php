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
        $updated = Schedule::where('id', $schedule)
            ->update(['date' => \DateTime::createFromFormat('d/m/Y', $request->get('date'))]);

        if ($updated) {
            return response()->json(['message' => 'Schedule updated with success']);
        }

        return response()->json(['message' => 'Schedule not found'], 404);
    }

    public function destroy(int $schedule)
    {
        $deleted = Schedule::destroy($schedule);

        if ($deleted) {
            return response()->json(['message' => 'Schedule deleted with success']);
        }

        return response()->json(['message' => 'Schedule not found'], 404);
    }

    public function addMember(Schedule $schedule, int $member)
    {
        $schedule->members()->syncWithoutDetaching([$member]);

        return response()->json(['message' => 'Member added to schedule with success']);
    }

    public function removeMember(Schedule $schedule, int $member)
    {
        $schedule->members()->detach($member);

        return response()->json(['message' => 'Remove member from schedule with success']);
    }
}
