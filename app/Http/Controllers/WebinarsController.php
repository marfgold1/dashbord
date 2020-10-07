<?php

namespace App\Http\Controllers;

use App\Webinar;
use Illuminate\Http\Request;

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
        return view('admin.create_webinar');
    }

    public function store(Request $request)
    {
        $req = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:65535',
            'topic' => 'required|string|max:255',
            'faculty' => 'required|string|max:255',
            'speaker' => 'required|string|max:255',
            'pic' => 'required|string|regex:/(\w+-\w+-+\w+;+)+/|max:255',
            'quota' => 'required|numeric',
            'schedule' => 'required|date',
            'deadline' => 'required|date',
        ]);
        $ins = Webinar::create([
            'nama' => $req['name'],
            'deskripsi' => $req['description'],
            'topik' => $req['topic'],
            'fakultas' => $req['faculty'],
            'narasumber' => $req['speaker'],
            'pic' => $req['pic'],
            'kuota' => $req['quota'],
            'jadwal' => $req['schedule'],
            'batas_pendaftaran' => $req['deadline'],
        ]);
        return back()->with('success', trans('You have successfully creating new webinar!'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Webinar  $webinar
     * @return \Illuminate\Http\Response
     */
    public function edit(Webinar $webinar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Webinar  $webinar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Webinar $webinar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Webinar  $webinar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Webinar $webinar)
    {
        //
    }
}
