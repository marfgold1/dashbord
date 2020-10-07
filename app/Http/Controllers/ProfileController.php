<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function show()
    {
        return view('dashboard.index-profile', [ 'user' => \Auth::user() ]);
    }

    public function edit()
    {
        return view('dashboard.edit-profile', [ 'user' => \Auth::user() ]);
    }

    public function destroy_avatar(Request $request){
        $user = \Auth::user();
        if($user->avatar != 'default.jpg'){
            \File::delete(public_path('/avatars').'/'.$user->avatar);
            $user->avatar = 'default.jpg';
            $user->save();
            return back()
                ->with('success', trans('You have successfully deleted your avatar.'));
        }
        return back()
            ->with('success', trans('You are using the default avatar.'));
    }

    public function update_avatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user = \Auth::user();

        if($user->avatar != 'default.jpg'){
            \File::delete(public_path('/avatars').'/'.$user->avatar);
        }

        $image = $request->file('avatar');
        $avatarName = $user->id.'_ava_'.time().'.'.$request->avatar->getClientOriginalExtension();

        $destinationPath = public_path('/avatars');
        $img = Image::make($image->path());
        $img->fit(300, 300)->save($destinationPath.'/'.$avatarName);

        $user->avatar = $avatarName;
        $user->save();

        return back()
            ->with('success', trans('You have successfully changed your avatar.'));
    }

    public function update_password(Request $request){
        $req = $request->validate([
            'password' => ['required', 'string', 'min:8', 'password'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $user = \Auth::user();

        $user->password = Hash::make($req['new_password']);
        $user->save();

        return back()
            ->with('success', trans('You have successfully updated your password.'));
    }

    public function update_info(Request $request){
        $req = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255']
        ]);

        $user = \Auth::user();

        if($user->email != $req['email']){
            $user->email_verified_at = null;
            $user->email = $req['email'];
            $user->name = $req['name'];
            $user->save();
            if ($request->user()->hasVerifiedEmail()) {
                return $request->wantsJson()
                    ? new JsonResponse([], 204)
                    : redirect($this->redirectPath());
            }

            $request->user()->sendEmailVerificationNotification();

            return $request->wantsJson()
                ? new JsonResponse([], 202)
                : back()->with('resent', true);
        } else if($user->name != $req['name']){
            $user->name = $req['name'];
            $user->save();
        }

        return back()
            ->with('success', trans('You have successfully updated your user info.'));
    }

    public function update_profile(Request $request){
        $req = $request->validate([
            'date_of_birth' => ['required', 'date'],
            'gender' => ['required_with:laki-laki,perempuan', 'string'],
            'category' => ['required_with:pelajar,mahasiswa,umum', 'string']
        ]);

        $user = \Auth::user();

        $user->date_of_birth = $req['date_of_birth'];
        $user->gender = $req['gender'];
        $user->category = $req['category'];
        $user->save();

        return back()
            ->with('success', trans('You have successfully updated your profile.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
