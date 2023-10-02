<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserIndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        return User::latest('id');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $results = User::where('id', 'like', "%$query%")
            ->orWhere('name', 'like', "%$query%")
            ->orWhere('email', 'like', "%$query%")
            ->orWhere('paypal_amount', 'like', "%$query%")
            ->orWhere('isAdmin', 'like', "%$query%")
            ->orWhere('isMod', 'like', "%$query%")
            ->orWhere('isVerified', 'like', "%$query%")
            ->orWhere('isBanned', 'like', "%$query%")
            ->orWhere('ban_reason', 'like', "%$query%")
            ->orWhere('name', 'like', "%$query%")->get();

        return response($results);
    }
}
