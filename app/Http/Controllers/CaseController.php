<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLegalCaseRequest;
use App\Http\Requests\UpdateLegalCaseRequest;
use App\Models\LegalCase;
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
        $cases = LegalCase::latest()->get();
        $title = 'Legal Cases';
        //return $cases;
        return view('cases.index', compact('cases', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cases.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLegalCaseRequest $request)
    {
        $validData = $request->validated;
        LegalCase::create($validData);
        return redirect('/cases');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LegalCase  $legalCase
     * @return \Illuminate\Http\Response
     */
    public function show(LegalCase $legalCase)
    {
        //$case = LegalCase::findOrFail($legalCase->id);
        return view('cases.show', compact('legalCase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LegalCase  $legalCase
     * @return \Illuminate\Http\Response
     */
    public function edit(LegalCase $legalCase)
    {
        //$case = LagalCase::findOrFail($legalCase->id);
        return view('cases.edit', compact('legalCase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LegalCase  $legalCase
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLegalCaseRequest $request, LegalCase $legalCase)
    {
        $validData = $request->validated;
        $legalCase->update($validData);
        return redirect('/cases');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LegalCase  $legalCase
     * @return \Illuminate\Http\Response
     */
    public function destroy(LegalCase $legalCase)
    {
        $legalCase->delete();
        return redirect('/cases');
    }
}
