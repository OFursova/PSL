<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLegalCaseRequest;
use App\Http\Requests\UpdateLegalCaseRequest;
use App\Models\Client;
use App\Models\Lawyer;
use App\Models\LegalCase;
use App\Models\Spec;
use Illuminate\Http\Request;

class CaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cases = LegalCase::latest()->filtered()->get();
        return view('cases.index', compact('cases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specs = Spec::all()->pluck('name', 'id');
        $lawyers = Lawyer::all()->pluck('name', 'id');
        $clients = Client::all()->pluck('name', 'id');
        return view('cases.create', compact('specs', 'lawyers', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLegalCaseRequest $request)
    {
        $validData = $request->validated();
        if(isset($validData['attachment'])) $validData['attachment'] = parent::saveAttachment($request);
        $case = LegalCase::create($validData);

        $case->specs()->syncWithoutDetaching($request->spec);
        $case->lawyers()->syncWithoutDetaching($request->lawyer);
        $case->clients()->syncWithoutDetaching($request->client);

        return redirect('/cases');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LegalCase  $legalCase
     * @return \Illuminate\Http\Response
     */
    public function show(LegalCase $legalCase, $id)
    {
        $case = LegalCase::findOrFail($id);
        return view('cases.show', compact('case'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LegalCase  $legalCase
     * @return \Illuminate\Http\Response
     */
    public function edit(LegalCase $legalCase, $id)
    {
        $case = LegalCase::findOrFail($id);
        $specs = Spec::all()->pluck('name', 'id');
        $lawyers = Lawyer::all()->pluck('name', 'id');
        $clients = Client::all()->pluck('name', 'id');
        return view('cases.edit', compact('case', 'specs', 'lawyers', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LegalCase  $legalCase
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLegalCaseRequest $request, $id)
    {
        $validData = $request->validated();
        if(isset($validData['attachment'])) $validData['attachment'] = parent::saveAttachment($request);
        $case = LegalCase::findOrFail($id);
        $case->update($validData);

        $case->specs()->syncWithoutDetaching($request->spec);
        $case->lawyers()->syncWithoutDetaching($request->lawyer);
        $case->clients()->syncWithoutDetaching($request->client);
        return redirect('/cases');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LegalCase  $legalCase
     * @return \Illuminate\Http\Response
     */
    public function destroy(LegalCase $legalCase, $id)
    {
        $legalCase->destroy($id);
        return redirect('/cases');
    }

     /**
     * Display a filtered listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $path = '/cases?'.$request['type'].'='.$request['filter'];
        
        return redirect($path);
    }

}
