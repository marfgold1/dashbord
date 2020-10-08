<?php

namespace App\Http\Controllers;

use App\User;
use App\Webinar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebinarsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function list()
    {
        $webinars = Webinar::paginate(2);
        $user = \Auth::user();
        return view('dashboard.webinars', [ 'webinars' => $webinars, 'user' => $user ]);
    }

    public function register(Request $request, Webinar $webinar){
        $request->validate([
            'webinar' => 'exists:webinars'
        ]);
        $user = \Auth::user();
        if(!$user->isRegisteredInWebinar($webinar)){
            $user->webinars()->attach($webinar->id);
            return back()
                ->with('success', trans('You have successfully registered to ').$webinar->nama);
        }
        return back()
            ->with('error', trans('You are already registered to ').$webinar->nama);
    }

    public function unregister(Request $request, Webinar $webinar){
        $request->validate([
            'webinar' => 'exists:webinars'
        ]);
        $user = \Auth::user();
        if($user->isRegisteredInWebinar($webinar)){
            $user->webinars()->detach($webinar->id);
            return back()
                ->with('success', trans('You have successfully unregistered to ').$webinar->nama);
        }
        return back()
            ->with('error', trans('You are not registered to ').$webinar->nama);
    }

    public function create()
    {
        $this->authorize('maintainer control');
        return view('admin.create_webinar');
    }

    public function validation(Request $request){
        return $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:65535',
            'topik' => 'required|string|max:255',
            'fakultas' => 'required|string|max:255',
            'narasumber' => 'required|string|max:255',
            'pic' => [ 'required', 'string', 'regex:/^([\w\s]+-[\w\s\/]+-[\w\s\/]+;)+$/', 'max:255' ],
            'kuota' => 'required|numeric',
            'jadwal' => 'required|date',
            'batas_pendaftaran' => 'required|date',
        ]);
    }

    public function store(Request $request)
    {
        $this->authorize('maintainer control');
        $req = $this->validation($request);
        $req['creator_id'] = Auth::user()->id;
        Webinar::create($req);
        return back()->with('success', trans('You have successfully creating new webinar!'));
    }

    public function manage()
    {
        $this->authorize('maintainer control');
        $webinars = Webinar::paginate(4);
        return view('admin.manage_webinars', [ 'webinars' => $webinars ]);
    }

    public function edit(Webinar $webinar)
    {
        $this->authorize('maintainer control');
        $this->authorize('update-webinar', $webinar);
        $user = Auth::user();
        return view('admin.edit_webinar', [ 'webinar' => $webinar ]);
    }

    public function update(Request $request, Webinar $webinar)
    {
        $this->authorize('maintainer control');
        $this->authorize('update-webinar', $webinar);
        $req = $this->validation($request);
        $webinar->update($req);
        return back()->with('success', trans('You have successfully updated ').$webinar->nama);
    }

    public function destroy(Webinar $webinar)
    {
        $this->authorize('maintainer control');
        $this->authorize('update-webinar', $webinar);
        $webinar->delete();
        return back()->with('success', trans('You have successfully deleted ').$webinar->nama);
    }
}
