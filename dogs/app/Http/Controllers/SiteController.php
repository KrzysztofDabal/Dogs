<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notices;
use App\Reply;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index(){

        $notices = Notices::all();

        return view('sites.notices', ['notices' => $notices]);
    }

    public function show(){
        $id =2;
        $notices = Notices::findOrFail($id);

        return view('sites.show_notice', [
            'notices' => $notices
        ]);

    }

    public function creat(){
        return view('sites.creat');
    }

    public function store_notice(){
        $notice = new Notices();
        $user = Auth::id();

        $notice->user = request('user');
        $notice->user_id = $user;
        $notice->title = request('title');
        $notice->type = request('type');
        $notice->race = request('race');
        $notice->name = request('name');
        $notice->age = request('age');
        $notice->price = request('price');
        $notice->description = request('description');
        $date = request('date');
        $time = request('time');
        $notice->date = $date.' '.$time;
        $notice->location = request('location');

        $notice->save();

        return redirect('/notices/')->with('mssg', 'Twoje Ogłoszenie zostalo dodane');
    }

    public function store_reply(){
        $reply = new Reply();

        $user = Auth::id();
        $reply->sender_id = $user;
        $reply->receiver_id = request('receiver_id');
        $reply->notice_id = request('notice_id');
        $reply->reply = request('reply');

        $reply->save();

        return redirect('/notices/')->with('mssg', 'Twoja Odpowiedź została wysłana');
    }

    public function destroy($id){
        $notice = Notices::findOrFail($id);
        $notice->delete();

        return redirect('/dashboard/');
    }

    public function dashboard(){
        $user = Auth::id();
        $notices = Notices::where('user_id', $user)->get();

        return view('sites.dashboard', [
            'notices' => $notices
        ]);
    }
}
