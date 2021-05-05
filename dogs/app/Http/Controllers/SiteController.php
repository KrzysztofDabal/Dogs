<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notices;
use App\Messages;
use App\User;
use App\Conversations;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Matcher\Not;

class SiteController extends Controller
{
    public function index(){

        $notices = Notices::orderBy('id', 'ASC')->paginate(20);

        return view('sites.notices', ['notices' => $notices]);
    }

    public function check_role(){
        $user = Auth::id();
        $name = User::findOrFail($user);

        if($name->role==1){
            return true;
        }
        else return false;

    }

    public function profile(){

        return view('sites.profile');
    }

    public function show_notice($id){
        $notice = Notices::findOrFail($id);;

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
        if($notice->user_id==Auth::id()||$this->check_role()==true)
        {
            $notice->delete();
        }

        return redirect('/dashboard/');
    }

    public function edit($id){
        $notice = Notices::findOrFail($id);
        if($notice->user_id==Auth::id()||$this->check_role()==true){

            return view('sites.edit', [
                'notices' => $notice
            ]);
        }
        else{
            return redirect('/dashboard/');
        }

    }

    public function dashboard(){
        $user = Auth::id();
        $notice = Notices::where('user_id', $user)->get();

        return view('sites.dashboard', [
            'notices' => $notice
        ]);
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
        //$conversations = Conversations::where('receiver_id', $user)->get();
        $conversations = DB::table('conversations')
            ->where('receiver_id', '=', $user)
            ->orWhere('sender_id', '=', $user)
            ->get();

        $notices = Notices::all();

        return view('sites.messages', compact('conversations', 'notices'));

    }

    public function show_message($id){
        $conversation = Conversations::findOrFail($id);
        $notice = Notices::findOrFail($conversation->notice_id);
        $messages = Messages::where('conversation_id', $conversation->id)->get();

        return view('sites.show_message', compact('conversation', 'messages', 'notice'));

    }

    public function store_conversation(){
        $exist = false;
        $conversations = Conversations::all();
        $user = Auth::id();
        $name = User::findOrFail($user);
        $message = new Messages();
        $id = 0;
        for($i=0; $i<count($conversations); $i++){
            if($conversations->notice_id=request('notice_id')){
                $exist = true;
                $id = $conversations[$i]->id;
            }
        }
        if($exist==false){
            $conversation = new Conversations();

            $conversation->sender_id = $user;
            $conversation->receiver_id = request('receiver_id');
            $conversation->notice_id = request('notice_id');
            $conversation->save();

            $message->sender_id = $user;
            $message->sender_name = $name->name;
            $message->conversation_id = request('conversation_id');
            $message->message = request('message');

            $message->save();

        }
        else{
            $message->sender_id = $user;
            $message->sender_name = $name->name;
            $message->conversation_id = $id;
            $message->message = request('message');

            $message->save();
        }

        return redirect('/notices/')->with('mssg', 'Twoja Odpowiedź została wysłana');
    }

    public function store_message(){
        $message = new Messages();
        $user = Auth::id();
        $name = User::findOrFail($user);

        $message->sender_id = $user;
        $message->sender_name = $name->name;
        $message->conversation_id = request('conversation_id');
        $message->message = request('message');

        $message->save();

        return redirect('/messages/'.$message->conversation_id.'/');
    }

    public function heaven(){
        if($this->check_role()==true){
            return view('heaven.heaven');
        }
        else{
            return redirect('/');
        }
    }

    public function heaven_notices(){
        if($this->check_role()==false){
            return redirect('/');
        }
        else{
            $notices = Notices::orderBy('id', 'ASC')->paginate(20);

            return view('heaven.heaven_notices', ['notices' => $notices]);
        }
    }

    public function heaven_users(){
        if($this->check_role()==false){
            return redirect('/');
        }
        else{
            $users = User::orderBy('id', 'ASC')->paginate(20);

            return view('heaven.heaven_users', ['users' => $users]);
        }
    }
}
