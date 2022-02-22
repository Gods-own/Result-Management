<?php

namespace App\Http\Controllers\Admin;

use Image;
use Exception;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    public function edit(User $user)
    {
        return view('admin.editStudent')->with('user', $user);
    }

    public function update(Request $request, User $user)
    {

        try{
            $validatedData = $request->validate([
                'name' => ['required', 'max:35'],
                'email' => ['required', 'email', 'max:255'],
                'profile_pic' => ['required', 'image', 'mimes:jpeg,bmp,png'],
                'phoneNumber' => ['required', 'starts_with:0', 'numeric'],

            ]);

            // dd($validatedData);

            // $path = Storage::path($user->profile_pic);

            $image_path = public_path('storage/profile_picture/'.$user->profile_pic);

            // dd($image_path);

            File::delete($image_path);

            $file = $request->profile_pic;

            $path = $file->hashName('public/profile_picture');

            // avatars/bf5db5c75904dac712aea27d45320403.jpeg

            // dd($file->hashName().'/'.$file->hashName('public/profile_picture'));

            $image = Image::make($file);

            $image->fit(150);

            // $request->profile_pic->store('profile_picture', 'public');

            Storage::put($path, (string) $image->encode());

            // dd($see);

            $user->fill([
                'name' => $request->name,
                'email' => $request->email,
                'phoneNumber' => $request->phoneNumber,
            ]);

            $user->profile_pic = $file->hashName();

            $user->save();
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
