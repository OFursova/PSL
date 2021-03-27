<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLegalCaseRequest;
use App\Http\Resources\LegalCaseResource;
use App\Models\LegalCase;
use Illuminate\Http\Request;

class LegalCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return LegalCaseResource::collection(LegalCase::get());
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
        return LegalCaseResource::make($case);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(LegalCase $case)
    {
        return LegalCaseResource::make($case);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreLegalCaseRequest $request, LegalCase $case)
    {
        $validData = $request->validated();
        $case->update($validData);
        return LegalCaseResource::make($case->refresh());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(LegalCase $case)
    {
        $case->delete();
        return response('deleted');
    }
}
