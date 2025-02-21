<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $dob = Carbon::parse($request->dob);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'mobile_no' => $request->mobile_num,
            'blood_group_id' => $request->blood_group,
            'city_id' => $request->city_id,
            'dob' => $dob,
        ]);

        return response()->json([
            'message' => 'user registered successfully',
            'data' => $user,
            'status' => 1
        ]);
    }

    public function list()
    {
        $user = User::all();

        return response()->json([
            'message' => 'user List returned successfully',
            'data' => $user,
            'status' => '1'
        ]);
    }
}
