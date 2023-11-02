<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function store(Request $request) {
        $user = User::create(
            $request->all()
        );

        $user->skills()->sync($request->input('skills'));
        return response()->json($user, 201);
    }

    public function update(Request $request, $id) {
        $user = User::find($id);

        if(!$user)
        {
            return response()->json([
                'error' => 'User is not found'
            ], 404);
        }

        $user->update(
            [
                'name' => $request->input('name')
            ]
        );

        $user->skills()->sync($request->input('skills'));

        return response()->json($user->load('skills'), 200);
    }

    public function destroy($id) {
        $user = User::find($id);

        if(!$user)
        {
            return response()->json([
                'error' => 'User is not found'
            ], 404);
        }

        $user->skills()->detach();

        $user->delete();

        return response()->json(['message' => 'The user and the associated skills are removed']);
    }
}
