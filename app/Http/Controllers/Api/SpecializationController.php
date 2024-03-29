<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSpecRequest;
use App\Http\Resources\SpecializationResource;
use App\Models\Spec;
use Illuminate\Support\Str;

class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SpecializationResource::collection(Spec::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpecRequest $request)
    {
        $validData = $request->validated();
        $spec = Spec::create($validData);
        // return SpecializationResource::make($spec);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Spec $spec)
    {
        return SpecializationResource::make($spec);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSpecRequest $request, Spec $spec)
    {
        $validData = $request->validated();
        $validData['slug'] ??  $validData['slug'] = Str::slug($validData['name'], '-');
        $spec->update($validData);
        // return SpecializationResource::make($spec->refresh());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spec $spec)
    {
        $spec->delete();
        // return response('deleted');
        return redirect()->back();
    }
}
