<?php

namespace App\Http\Controllers;

use App\Conversations;
use App\Messages;
use App\Notices;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HeavenController extends Controller
{
    public function __construct()
        {
            $this->middleware('auth');
        }

    public function check_role(){
        $user = Auth::id();
        $name = User::findOrFail($user);

        if($name->role==1)
        {
            return true;
        }
        else return false;
    }

    public function index(){
        if($this->check_role()==false){
            return redirect(route('index'));
        }
        else{
            return view('heaven.heaven');
        }
    }

                        //NOTICES

    public function notices_index(){
        if($this->check_role()==false){
            return redirect(route('index'));
        }
        else{
            $notices = Notices::orderBy('id', 'ASC')->paginate(20);
            $users = User::all();

            return view('heaven.heaven_notices', compact('notices', 'users'));
        }
    }

    public function notice_create(){
        if($this->check_role()==false){
            return redirect(route('index'));
        }
        else{
            $users = User::all();
            return view('heaven.heaven_notice_create', [
                'users' => $users
            ]);
        }

    }

    public function notice_store(){
        $notice = new Notices();
        $user = User::findOrFail(request('id'));
        $name = $user->name;

        $notice->user_id = request('id');
        $notice->user = $name;
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

        return redirect(route('heaven.notices.index'));
    }

    public function notice_edit($id){
        if($this->check_role()==false){
            return redirect(route('index'));
        }
        else{
            $notice = Notices::findOrFail($id);
            $carbon = new Carbon($notice->date);
            $time = $carbon->toTimeString();
            $date = $carbon->toDateString();
            return view('heaven.heaven_notice_edit', compact('notice', 'time', 'date'));
        }

    }

    public function notice_update($id){
        if($this->check_role()==false){
            return redirect(route('index'));
        }
        else{
            $notice = Notices::findOrFail($id);

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
            return redirect(route('heaven.notices.index'));
        }

    }

    public function notice_destroy($id){
        if($this->check_role()==false){
            return redirect(route('index'));
        }
        else{
            $notice = Notices::findOrFail($id);
            $notice->delete();

            return redirect(route('heaven.notices.index'));
        }
    }

                        //USERS

    public function users_index(){
        if($this->check_role()==false){
            return redirect(route('index'));
        }
        else{
            $users = User::orderBy('id', 'ASC')->paginate(20);

            return view('heaven.heaven_users', ['users' => $users]);
        }
    }

    public function set_role($id){
        if($this->check_role()==false){
            return redirect(route('index'));
        }
        else{
            $user = User::findOrFail($id);
            $user->role = request('role');

            $user->save();

            return redirect(route('heaven.users.index'));
        }
    }

    public function user_create(){
        if($this->check_role()==false){
            return redirect(route('index'));
        }
        else{

            return view('heaven.heaven_user_create');
        }
    }

    public function user_store(){
        if($this->check_role()==false){
            return redirect(route('index'));
        }
        else{
            User::create([
                'name' => request('name'),
                'email' => request('email'),
                'password' => Hash::make(request('password')),
            ]);

            return redirect(route('heaven.users.index'));
        }
    }

    public function user_edit($id){
        if($this->check_role()==false){
            return redirect(route('index'));
        }
        else{
            $user = User::findOrFail($id);

            return view('heaven.heaven_user_edit', [
                'user' => $user
            ]);
        }
    }

    public function user_update($id){
        if($this->check_role()==false){
            return redirect(route('index'));
        }
        else{
            $user = User::findOrFail($id);

            $user->name = request('name');
            $user->email = request('email');
            $user->password = Hash::make(request('password'));
            $user->save();

            return redirect(route('heaven.users.index'));
        }
    }

    public function user_destroy($id){
        if($this->check_role()==false){
            return redirect(route('index'));
        }
        else{
            $user = User::findOrFail($id);
            $conversations = Conversations::where('sender_id', $user->id)->get();
            if(count($conversations)){
                for($i=0; $i<count($conversations); $i++){
                    $messages = Messages::where('conversation_id', $conversations[$i]->id)->get();
                    if(count($messages)){
                        for($i=0; $i<count($messages); $i++){
                            $messages[$i]->delete();
                        }
                    }
                    $conversations[$i]->delete();
                }
            }
            $conversations = Conversations::where('receiver_id', $user->id)->get();
            if(count($conversations)){
                for($i=0; $i<count($conversations); $i++){
                    $messages = Messages::where('conversation_id', $conversations[$i]->id)->get();
                    if(count($messages)){
                        for($i=0; $i<count($messages); $i++){
                            $messages[$i]->delete();
                        }
                    }
                    $conversations[$i]->delete();
                }
            }

            $user->delete();
            return redirect(route('heaven.users.index'));
        }
    }
}
