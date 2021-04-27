<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notices;

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

    public function store(){
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

    public function destroy($id){
        $notice = Notices::findOrFail($id);
        $notice->delete();

        return redirect('/notices/');
    }
}
