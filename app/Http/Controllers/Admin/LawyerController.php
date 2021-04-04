<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLawyerRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Lawyer;
use App\Models\LegalCase;
use App\Models\Position;
use App\Models\Spec;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LawyerController extends Controller
{
    public function index()
    {
        $lawyers = Lawyer::filtered()->get();
        return view('admin.lawyers.index', compact('lawyers'));
    }

    public function create()
    {
        $specs = Spec::all()->pluck('name', 'id');
        $cases = LegalCase::all()->pluck('name', 'id');
        $positions = Position::all()->pluck('name', 'id');
        return view('admin.lawyers.create', compact('specs', 'cases', 'positions'));
    }

    public function store(StoreUserRequest $request)
    {
        $validData = $request->validated();
        if(isset($validData['password'])) $validData['password'] = Hash::make($validData['password']);
        if(isset($validData['avatar'])) $validData['avatar'] = parent::saveAvatar($request);
        $lawyer = Lawyer::create($validData);

        $lawyer->specs()->syncWithoutDetaching($request->spec);
        $lawyer->cases()->syncWithoutDetaching($request->case);
        
        return redirect('/admin/lawyers');
    }

    public function show(Lawyer $lawyer)
    {
        $lawyer = Lawyer::findOrFail($lawyer->id);
        return view('admin.lawyers.show', compact('lawyer'));
    }

    public function edit(Lawyer $lawyer)
    {
        $specs = Spec::all()->pluck('name', 'id');
        $cases = LegalCase::all()->pluck('name', 'id');
        $positions = Position::all()->pluck('name', 'id');
        return view('admin.lawyers.edit', compact('lawyer', 'specs', 'cases', 'positions'));
    }

    public function update(UpdateUserRequest $request, Lawyer $lawyer)
    {
        $validData = $request->validated();
        $validData['password'] ? $validData['password'] = Hash::make($validData['password']) : $validData['password'] = $lawyer->password;
        if(isset($validData['avatar'])) $validData['avatar'] = parent::saveAvatar($request);
    
        $lawyer = Lawyer::findOrFail($lawyer->id);
        $lawyer->update($validData);

        $lawyer->specs()->syncWithoutDetaching($request->spec);
        $lawyer->cases()->syncWithoutDetaching($request->case);

        return redirect('/admin/lawyers');
    }

    public function destroy(Lawyer $lawyer)
    {
        $lawyer->destroy($lawyer->id);
        return redirect('/admin/lawyers');
    }

    public function getAll()
    {
        $lawyers = Lawyer::filtered()->get();
        return view('lawyers.index', compact('lawyers'));
    }

    public function getOne($id)
    {
        $lawyer = Lawyer::findOrFail($id);
        return view('lawyers.show', compact('lawyer'));
    }

    public function editLawyer($id)
    {
        $lawyer = Lawyer::findOrFail($id);
        $specs = Spec::all()->pluck('name', 'id');
        $cases = LegalCase::all()->pluck('name', 'id');
        $positions = Position::all()->pluck('name', 'id');
        return view('lawyers.edit', compact('lawyer', 'specs', 'cases', 'positions'));
    }

    public function saveChanges(UpdateUserRequest $request, $id)
    {
        $validData = $request->validated();
        $lawyer = Lawyer::findOrFail($id);
        $validData['password'] ? $validData['password'] = Hash::make($validData['password']) : $validData['password'] = $lawyer->password;
        if(isset($validData['avatar'])) $validData['avatar'] = parent::saveAvatar($request);
        
        $lawyer->update($validData);

        $lawyer->specs()->syncWithoutDetaching($request->spec);
        $lawyer->cases()->syncWithoutDetaching($request->case);
    
        return redirect('/home');   
    }

    public function filter(Request $request)
    {
        $path = '/lawyers?'.$request['type'].'='.$request['filter'];
        return redirect($path);
    }

    public function adminFilter(Request $request)
    {
        $path = '/admin/lawyers?'.$request['type'].'='.$request['filter'];
        return redirect($path);
    }
}
