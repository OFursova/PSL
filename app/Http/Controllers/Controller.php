<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function saveAttachment(Request $request)
    {
        $allowed = ['txt', 'doc', 'docx', 'pdf', 'odt', 'zip', 'rar'];
        $extension = $request->file('attachment')->extension();
       
        if (in_array($extension, $allowed)) {
            $name = $request->file('attachment')->getClientOriginalName();
            Storage::disk('public')->putFileAs(
                'files/',
                $request->file('attachment'),
                $name
              );
        }

        return 'storage/files/'.$name;
    }

    public function saveAvatar(Request $request)
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
