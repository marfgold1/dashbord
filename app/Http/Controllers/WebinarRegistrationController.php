<?php

namespace App\Http\Controllers;

use App\Notifications\WebinarUpdate;
use App\User;
use App\Webinar;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Calculation\Web;

class WebinarRegistrationController extends Controller
{
    public function __construct(Webinar $webinar)
    {
        $this->middleware(['auth', 'verified']);
    }

    public function validateWebinarOwnership(Webinar $webinar){
        $this->authorize('maintainer control');
        $this->authorize('update-webinar', $webinar);
    }

    public function userShow(Request $request, Webinar $webinar){
        $this->validateWebinarOwnership($webinar);
        $req = $request->validate([
            'search' => 'string',
            'perPage' => 'numeric|max:100'
        ]);
        $users = $webinar->users();
        if(isset($req['search'])){
            $users = $users->where('name', 'like', '%'.$req['search'].'%');
        }
        if(isset($req['perPage'])) {
            $users = $users->paginate($req['perPage']);
        } else {
            $users = $users->paginate(10);
        }
        return view('admin.webinar-registration.users', [ 'users' => $users, 'webinar' => $webinar ]);
    }

    public function userUnregister(Request $request, Webinar $webinar){
        $this->validateWebinarOwnership($webinar);
        $req = $request->validate([
            'id' => 'required|numeric|exists:users',
            'name' => 'required|string'
        ]);
        $webinar->users()->detach($req['id']);
        return back()->with('success', trans('You have successfully unregistered').' '.$req['name'].' '.trans('in').' '.$webinar->nama);
    }

    public function emailShow(Webinar $webinar){
        $this->validateWebinarOwnership($webinar);
        return view('admin.webinar-registration.email', [ 'webinar' => $webinar ]);
    }

    public function emailPreview(Request $request, Webinar $webinar){
        $this->validateWebinarOwnership($webinar);
        $req = $request->validate([
            'subject' => 'required|string|max:100',
            'greeting' => 'string|max:100',
            'message' => 'required|string',
            'action_name' => 'string|max:50',
            'action_url' => 'url',
            'salutation' => 'string|max:100'
        ]);
        $details = $req;
        $details['webinar_name'] = $webinar->nama;
        $user = Auth::user();
        return (new WebinarUpdate($details))->toMail($user);
    }

    public function emailSend(Request $request, Webinar $webinar){
        $this->validateWebinarOwnership($webinar);
        if($request['is-greeting']=='false')
             $request['greeting'] = null;
        if($request['is-action']=='false') {
            $request['action_name'] = null;
            $request['action_url'] = null;
        }
        if($request['is-salutation']=='false')
            $request['salutation'] = null;
        if($request['is-attachment']=='false')
            $request['attachment'] = null;
        $req = $request->validate([
            'subject' => 'required|string|max:100',
            'greeting' => 'string|max:100',
            'message' => 'required|string',
            'action_name' => 'string|max:50',
            'action_url' => 'url',
            'salutation' => 'string|max:100',
            'attachment' => 'file|max:4096',
        ]);
        $details = $req;
        if(isset($req['attachment'])){
            $file = $request->file('attachment');
            $details['attachment_mime'] = $file->getMimeType();
            $details['attachment_name'] = $file->getFilename();
            $details['attachment'] = $file->getRealPath();
        }
        $details['webinar_name'] = $webinar->nama;
        $users = $webinar->users;
        \Notification::send($users, new WebinarUpdate($details));
        return back()->with('success', 'Email anda berhasil terkirim!');
    }
}
