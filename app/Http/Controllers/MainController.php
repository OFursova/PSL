<?php

namespace App\Http\Controllers;

use App\Models\Lawyer;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
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
        return view('home');
    }

    public function test()
    {
        //$user = User::find(6)->roles;
        //$user = Lawyer::firstOrFail()->attachments;
        $user = Lawyer::firstOrFail()->specializations->pluck('name');
        dd($user);
        //return view('test');
    }

    /**
     * Show the About Us page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function about()
    {
        # code...
    }

    /**
     * Show the Contact Us page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact()
    {
        # code...
    }

    /**
     * Show the Team page with list of partners and lawyers.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function team()
    {
        # code...
    }
}
