<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lawyer;
use App\Models\LegalCase;
use App\Models\Permission;
use App\Models\Position;
use App\Models\Role;
use App\Models\Spec;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }

    public function permissions()
    {
        $permissions = Permission::get();
        return view('admin.permits.index', compact('permissions'));
    }

    public function positions()
    {
        $positions = Position::get();
        return view('admin.positions.index', compact('positions'));
    }

    public function roles()
    {
        $roles = Role::get();
        return view('admin.roles.index', compact('roles'));
    }

    public function specs()
    {
        $specs = Spec::get();
        return view('admin.specs.index', compact('specs'));
    }

    public function assign($name)
    {
        if ($name == 'specs') {
            $alpha = Spec::get()->pluck('name', 'id');;
            $beta = Lawyer::get()->pluck('name', 'id');;
            $types = ['specialization', 'lawyer'];
            return view('admin.assign', compact('alpha', 'beta', 'types'));
        }
        elseif ($name == 'positions') {
            $alpha = Position::get()->pluck('name', 'id');;
            $beta = Lawyer::get()->pluck('name', 'id');;
            $types = ['position', 'lawyer'];
            return view('admin.assign', compact('alpha', 'beta', 'types'));
        }
        elseif ($name == 'roles') {
            $alpha = Role::get()->pluck('name', 'id');; 
            $beta = User::get()->pluck('name', 'id');;
            $types = ['role', 'user'];
            return view('admin.assign', compact('alpha', 'beta', 'types'));
        }
        elseif ($name == 'permissions') {
            $alpha = Permission::get()->pluck('name', 'id');;
            $beta = Role::get()->pluck('name', 'id');;
            $types = ['permission', 'role'];
            return view('admin.assign', compact('alpha', 'beta', 'types'));
        }
        else {
            return redirect()->back();
        }
    }

    public function saveAssignment(Request $request)
    {
        if ($request->specialization && $request->lawyer) {
            $lawyer = Lawyer::findOrFail($request->lawyer);
            $lawyer->specs()->syncWithoutDetaching($request->specialization);
            return back()->with('success', 'Successfully assigned!');
        }
        elseif ($request->position && $request->lawyer) {
            $lawyer = Lawyer::findOrFail($request->lawyer);
            $data['position_id'] = $request->position;
            $lawyer->update($data);
            return back()->with('success', 'Successfully assigned!');
        }
        elseif ($request->role && $request->user) {
            $user = User::findOrFail($request->user);
            $data['role_id'] = $request->role;
            $user->update($data);
            return back()->with('success', 'Successfully assigned!');
        }
        elseif ($request->permission && $request->role) {
            $role = Role::findOrFail($request->role);
            $role->permissions()->syncWithoutDetaching($request->permission);
            return back()->with('success', 'Successfully assigned!');
        } else {
            back()->with('failure', 'Some error has occured!');
        }
        
    }
}
