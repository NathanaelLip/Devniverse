<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index()
    {
        $admin = Admin::select('paydate')->first();
        return response()->json($admin);
    }
}