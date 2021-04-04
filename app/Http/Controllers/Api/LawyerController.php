<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\Lawyer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LawyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserResource::collection(Lawyer::with('roles', 'specs', 'cases')->get());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $validData = $request->validated();
        if(isset($validData['password'])) $validData['password'] = Hash::make($validData['password']);
        if(isset($validData['avatar'])) $validData['avatar'] = parent::saveAvatar($request);
        $lawyer = Lawyer::create($validData);
        $lawyer->specs()->syncWithoutDetaching($request->spec);
        $lawyer->cases()->syncWithoutDetaching($request->case);
        return UserResource::make($lawyer->loadMissing(['roles', 'specs', 'cases']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Lawyer $lawyer)
    {
        return UserResource::make($lawyer->loadMissing(['roles', 'specs', 'cases']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, Lawyer $lawyer)
    {
        $validData = $request->validated();
        $validData['password'] ? $validData['password'] = Hash::make($validData['password']) : $validData['password'] = $lawyer->password;
        if(isset($validData['avatar'])) $validData['avatar'] = parent::saveAvatar($request);
        $lawyer->update($validData);
        $lawyer->specs()->syncWithoutDetaching($request->spec);
        $lawyer->cases()->syncWithoutDetaching($request->case);
        return UserResource::make($lawyer->refresh()->loadMissing(['roles', 'specs', 'cases']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lawyer $lawyer)
    {
        $lawyer->delete();
        return response('deleted');
    }
}
