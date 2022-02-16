<?php

namespace App\Http\Controllers\Auth;

use Image;
use Exception;
use App\Models\User;
use App\Models\Teacher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AddTeacherController extends Controller
{
    public function __construct(User $user, Teacher $teacher)
    {
        $this->user = $user;
        $this->teacher = $teacher;
        $this->middleware(['auth']);
    }

    public function index()
    {

        $titles = array('Mr.', 'Mrs.', 'Ms.');

        return view('auth.addTeacher')->with('titles', $titles);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => ['required', Rule::in(['Mr.', 'Mrs.', 'Ms.'])],
            'name' => ['required', 'max:35', 'unique:users,name'],
            'email' => ['required', 'email', 'max:255'],
            'profile_pic' => ['required', 'image', 'mimes:jpeg,bmp,png'],
            'user_type' => ['required', Rule::in(['staff'])],
            'gender' => ['required'],
            'phoneNumber' => ['required', 'unique:users,phoneNumber', 'starts_with:0', 'numeric'],
            'password' => ['required', 'confirmed'],

        ]);
        try {
            DB::transaction(function () use ($request) {

                $user = new User();

                $user->fill($request->all());

                $file = $request->profile_pic;

                $path = $file->hashName('public/profile_picture');
                // avatars/bf5db5c75904dac712aea27d45320403.jpeg

                $image = Image::make($file);

                $image->fit(150);

                // $request->profile_pic->store('profile_picture', 'public');

                Storage::put($path, (string) $image->encode());

                $user->password = Hash::make($request->password);
                $user->profile_pic = $file->hashName();
                $user->user_type = $request->user_type;
                $user->save();

                $teacher = new Teacher();

                $teacher->title = $request->title;
                $user->teacher()->save($teacher);

            });
            return redirect()->route('admin_dashboard');
        } catch (Exception $ex) {
            return back()->with('status', 'Could not register, something went wrong');
        }
    }


}
