<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notices;
use App\Messages;
use App\User;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index(){

        $notices = Notices::all();

        return view('sites.notices', ['notices' => $notices]);
    }
    public function profile(){

        return view('sites.profile');
    }

    public function show_notice($id){
        $notice = Notices::findOrFail($id);

        return view('sites.show_notice', [
            'notices' => $notice
        ]);

    }

    public function creat(){
        return view('sites.creat');
    }

    public function store_notice(){
        $notice = new Notices();
        $id = Auth::id();
        $user = User::findOrFail($id);
        $name = $user->name;


        $notice->user = $name;
        $notice->user_id = $id;
        $notice->title = request('title');
        $notice->type = request('type');
        $notice->race = request('race');
        $notice->name = request('name');
        $notice->age = request('age');
        $notice->reward = request('reward');
        $notice->description = request('description');
        $date = request('date');
        $time = request('time');
        $notice->date = $date.' '.$time;
        $notice->location = request('location');

        $notice->save();

        return redirect('/notices/')->with('mssg', 'Twoje Ogłoszenie zostalo dodane');
    }

    public function destroy($id){
        $notice = Notices::findOrFail($id);
        if($notice->user_id==Auth::id())
        {
            $notice->delete();
        }

        return redirect('/dashboard/');
    }

    public function dashboard(){
        $user = Auth::id();
        $notice = Notices::where('user_id', $user)->get();

        return view('sites.dashboard', [
            'notices' => $notice
        ]);
    }

    public function edit($id){
        $notice = Notices::findOrFail($id);
        if($notice->user_id==Auth::id()){

            return view('sites.edit', [
                'notices' => $notice
            ]);
        }
        else{
            return redirect('/dashboard/');
        }

    }
    public function update_notice($id){
        $notice = Notices::findOrFail($id);
        if($notice->user_id==Auth::id()){
            $notice->title = request('title');
            $notice->type = request('type');
            $notice->race = request('race');
            $notice->name = request('name');
            $notice->age = request('age');
            $notice->reward = request('reward');
            $notice->description = request('description');
            $date = request('date');
            $time = request('time');
            $notice->date = $date.' '.$time;
            $notice->location = request('location');

            $notice->save();
        }

        return redirect('/dashboard/');

    }

    public function messages(){
        $user = Auth::id();
        $messages = Messages::where('receiver_id', $user)->get();
        $notices = Notices::all();

        return view('sites.messages', compact('messages', 'notices', 'user'));

    }

    public function show_message($id){
        $message = Messages::findOrFail($id);
        $notice = Notices::findOrFail($message->notice_id);
        $user = User::findOrFail($message->sender_id);

        return view('sites.show_message', compact('message', 'notice', 'user'));

    }

    public function store_message(){
        $message = new Messages();
        $user = Auth::id();

        $message->sender_id = $user;
        $message->receiver_id = request('receiver_id');
        $message->notice_id = request('notice_id');
        $message->message = request('message');

        $message->save();

        return redirect('/notices/')->with('mssg', 'Twoja Odpowiedź została wysłana');
    }
}
