<?php

namespace App\Http\Controllers;

use App\Models\Lawyer;
use App\Models\LegalCase;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //dd(Lawyer::findOrFail(2)->cases);
        dd(LegalCase::find(26)->lawyers);
        //dd(Role::find(1)->permissions);
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
        return view('about');
    }

    /**
     * Show the Contact Us page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact()
    {
        return view('contact');
    }

    public function getContacts(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'message' => 'required|min:3',
        ]);

        //sending a letter
        return back()->with('success', 'Thanks!');
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
