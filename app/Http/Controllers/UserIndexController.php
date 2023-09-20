<?php

namespace App\Http\Controllers;

use App\Models\AllUsers;
use App\Models\User;
use Illuminate\Http\Request;

class UserIndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return User::all();
    }
}
