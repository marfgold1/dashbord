<?php

namespace App\Http\Controllers;

use App\User;
use App\Webinar;
use Illuminate\Http\Request;
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
}
