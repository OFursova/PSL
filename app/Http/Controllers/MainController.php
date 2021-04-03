<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateContactUsRequest;
use App\Mail\CaseRequest;
use App\Models\Client;
use App\Models\Lawyer;
use App\Models\LegalCase;
use App\Models\Spec;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class MainController extends Controller
{
    /**
     * Show the application homepage.
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
        $specs = Spec::all()->pluck('name', 'id');
        $lawyers = Lawyer::all()->pluck('name', 'id');
        return view('contact', compact('specs', 'lawyers'));
    }

    public function getContacts(UpdateContactUsRequest $request)
    {
        $validData = $request->validated();
        if(isset($validData['attachment'])) $validData['attachment'] = parent::saveAttachment($request);
        $clientData = [
            'name' => $validData['name'],
            'email' => $validData['email'],
            'phone' => $validData['phone'],
            'address' => $validData['address']
        ];
        $caseData = [
            'name' => $validData['caseName'],
            'slug' => Str::slug($validData['caseName'], '-'),
            'description' => $validData['description'],
            'attachment' => $validData['attachment'],
        ];
        $clientId = auth()->user()->id;
       
        $client = Client::where('id', $clientId);
        $client->update($clientData);

        $case = LegalCase::create($caseData);
        $case->clients()->syncWithoutDetaching($clientId);

        $case->specs()->syncWithoutDetaching($validData['spec']);
        $case->lawyers()->syncWithoutDetaching($validData['lawyer']);

        //sending a letter
        Mail::to($validData['email'])->send(new CaseRequest());

        return back()->with('success', 'Your application has been sent!');
    }

}
