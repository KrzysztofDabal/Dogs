<?php

namespace App\Http\Controllers;

use App\Notices;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HeavenController extends Controller
{

    public function check_role(){
        $user = Auth::id();
        $name = User::findOrFail($user);

        if($name->role==1){
            return true;
        }
        else return false;
    }

    public function heaven(){
        if($this->check_role()==true){
            return view('heaven.heaven');
        }
        else{
            return redirect(route('index'));
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

    public function heaven_edit($id){
        $notice = Notices::findOrFail($id);
        if($this->check_role()==true){

            return view('heaven.notice_edit', [
                'notices' => $notice
            ]);
        }
        else{
            return redirect(route('heaven.notices.index'));
        }

    }

    public function heaven_notice_destroy($id){
        $notice = Notices::findOrFail($id);
        if($this->check_role()==true)
        {
            $notice->delete();
        }

        return redirect(route('heaven.notices.index'));
    }

    public function heaven_update_notice($id){
        $notice = Notices::findOrFail($id);
        if($this->check_role()==true){
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

        return redirect(route('heaven.notices.index'));
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
