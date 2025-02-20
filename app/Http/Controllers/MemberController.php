<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        return Member::all();
    }

    public function store(Request $request)
    {
        Member::create([
            'name' => $request->get('name'),
        ]);

        return response()->json(['message' => 'Member created with success']);
    }

    public function show(Member $member)
    {
        return $member;
    }

    public function update(Request $request, int $member)
    {
        Member::where('id', $member)
            ->update([
                'name' => $request->get('name')
            ]);

            return response()->json(['message' => 'Member updated with success']);
    }

    public function destroy(int $member)
    {
        Member::destroy($member);

        return response()->json(['message' => 'Member deleted with success']);
    }
}
