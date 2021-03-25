<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLawyerRequest;
use App\Models\Lawyer;
use App\Models\Spec;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LawyerController extends Controller
{
    public function index()
    {
        $lawyers = Lawyer::get();
        //return $lawyers;
        return view('admin.lawyers.index', compact('lawyers'));
    }

    public function create()
    {
        $specs = Spec::all()->pluck('name');
        return view('admin.lawyers.create')->with('specs', $specs);
    }

    public function store(StoreLawyerRequest $request)
    {
        $validData = $request->validated();
        if(isset($validData['avatar'])) $validData['avatar'] = $this->saveAvatar($request);
        $lawyer = Lawyer::create($validData);

        $spec_id = Spec::where('name', $request->get('spec'))->pluck('id');
        $lawyer->specs()->sync($spec_id);
        // TO DO sync cases
        return redirect('/admin/lawyers');
    }

    public function show(Lawyer $lawyer)
    {
        $lawyer = Lawyer::findOrFail($lawyer->id);
        return view('admin.lawyers.show', compact('lawyer'));
    }


    public function edit(Lawyer $lawyer)
    {
        $specs = Spec::all()->pluck('name');
        return view('admin.lawyers.edit', compact('lawyer', 'specs'));
    }

    public function update(StoreLawyerRequest $request, Lawyer $lawyer)
    {
        $validData = $request->validated();
        if(isset($validData['avatar'])) $validData['avatar'] = $this->saveAvatar($request);
        
        $lawyer = Lawyer::findOrFail($lawyer->id);
        $lawyer->update($validData);

        $spec_id = Spec::where('name', $request->get('spec'))->pluck('id');
        $lawyer->specs()->sync($spec_id);
        // TO DO sync cases
        return redirect('/admin/lawyers');
    }

    public function destroy(Lawyer $lawyer)
    {
        $lawyer->destroy($lawyer->id);
        return redirect('/admin/lawyers');
    }

    public function getAll()
    {
        $lawyers = Lawyer::paginate(20);
        return view('lawyers.index', compact('lawyers'));
    }

    public function getOne($id)
    {
        $lawyer = Lawyer::findOrFail($id);
        return view('lawyers.show', compact('lawyer'));
    }

    public function saveAvatar(StoreLawyerRequest $request)
    {
        $allowed = ['png', 'jpg', 'jpeg', 'webp', 'jfif'];
        $extension = $request->file('avatar')->extension();
       
        if (in_array($extension, $allowed)) {
            $name = $request->file('avatar')->getClientOriginalName();
            //$path = $request->file('avatar')->storeAs('images', $name, 'img');
            Storage::disk('public')->putFileAs(
                'avatars/',
                $request->file('avatar'),
                $name
              );
        }

        return 'storage/avatars/'.$name;
    }
}
