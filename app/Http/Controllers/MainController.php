<?php

namespace App\Http\Controllers;

use App\Models\Lawyer;
use App\Models\LegalCase;
use App\Models\Position;
use App\Models\Role;
use App\Models\Spec;
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
        return view('home');
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
     * Show the Contact Us page with form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact()
    {
        $specs = Spec::all()->pluck('name');
        return view('contact')->with('specs', $specs);
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

}
