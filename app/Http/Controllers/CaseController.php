<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLegalCaseRequest;
use App\Http\Requests\UpdateLegalCaseRequest;
use App\Models\LegalCase;
use App\Models\Spec;
use App\Models\Specialization;
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
        //return $cases;
        return view('cases.index', compact('cases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specs = Spec::all()->pluck('name');
        return view('cases.create')->with('specs', $specs);
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
        $case = LegalCase::create($validData);

        $spec_id = Spec::where('name', $request->get('spec'))->pluck('id');
        $case->specs()->sync($spec_id);
        // TO DO sync users
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
        $specs = Spec::all()->pluck('name');
        return view('cases.edit', compact('case', 'specs'));
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
        
        $legalCase = LegalCase::findOrFail($id);
        $legalCase->update($validData);

        $spec_id = Spec::where('name', $request->get('spec'))->pluck('id');
        $legalCase->specs()->sync($spec_id);
        // TO DO sync users
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
}
