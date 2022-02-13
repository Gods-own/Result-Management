<?php

namespace App\Http\Controllers\Admin;

use Image;
use Exception;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function edit(User $user) 
    {
        return view('admin.editTeacher')->with('user', $user);
    }

    public function update(Request $request, User $user) 
    {

        try{
            $validatedData = $request->validate([
                'name' => ['required', 'max:35', 'unique:users,name'],
                'email' => ['required', 'email', 'max:255'],
                'profile_pic' => ['required', 'image', 'mimes:jpeg,bmp,png'],
                'phoneNumber' => ['required', 'starts_with:0', 'numeric'],

            ]);

            $file = $request->profile_pic;

            $path = $file->hashName('public/profil_picture');
            // avatars/bf5db5c75904dac712aea27d45320403.jpeg

            $image = Image::make($file);

            $image->fit(150);

            // $request->profile_pic->store('profile_picture', 'public');

            Storage::put($path, (string) $image->encode());

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'profile_pic' => $file->hashName(),
                'phoneNumber' => $request->phoneNumber,
            ]);
            return redirect()->route('admin_dashboard');
        } catch (Exception $ex) {
            return back()->with('status', 'Could not update, something went wrong');
        }    
    }

    public function destroy(User $user) {
        $user->delete();
        return redirect()->route('admin_dashboard');
    }
}
