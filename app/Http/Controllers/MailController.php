<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function getBlood(User $user)
    {
        $user = $user->bloodGroup();
        dd($user);
    }
}
