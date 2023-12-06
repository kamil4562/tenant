<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //get the current user attributes
        $user = auth()->user();



        // get all users where tenant_id is equal to the current user's which is stored in atrribute tenant_id
        $allusers = User::where('tenant_id', $user->attributesToArray()['tenant_id'])->get();
        //parse the users to the view by getting attributes
        $users = $allusers->map->attributesToArray();
        return view('home', compact('users'));
    }
}
