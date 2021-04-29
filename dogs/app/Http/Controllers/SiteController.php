<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notices;
use App\Reply;

class SiteController extends Controller
{
    public function index(){

        $notices = Notices::all();

        return view('sites.notices', ['notices' => $notices]);
    }

    public function show($id){
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

        $notice->user = request('user');
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

        $reply->sender_id = request('sender_id');
        $reply->receiver_id = request('receiver_id');
        $reply->notice_id = request('notice_id');
        $reply->reply = request('reply');

        $reply->save();

        return redirect('/notices/')->with('mssg', 'Twoja Odpowiedź została wysłana');
    }

    public function destroy($id){
        $notice = Notices::findOrFail($id);
        $notice->delete();

        return redirect('/notices/');
    }
}
