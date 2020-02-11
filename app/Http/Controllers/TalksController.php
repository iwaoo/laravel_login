<?php

namespace App\Http\Controllers;

use App\Talk;
use Illuminate\Http\Request;

class TalksController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
      $loginUserTalks = auth()->user()->hasTalk;

      $talk_list = Talk::get();
      $talks = array();
      $talkIds = array();
      $talkIdCount = 0;
      foreach ($talk_list as $talk_key => $talk_val) {
        foreach ($loginUserTalks as $loginUserTalk_key => $loginUserTalk_val) {
          if ($loginUserTalk_val->id == $talk_val->id) {
            $talkIds[$talkIdCount] = $talk_val->id;
            $talkIdCount += 1;
          }
        }
      }

      $talkCount = 0;
      foreach ($talk_list as $talk_key => $talk_val) {
        if ( !in_array($talk_val->id, $talkIds) ) {
          $talks[$talkCount] = $talk_val;
          $talkCount += 1;
        }
      }

//      dd($talks);

      return view('talks.index', compact('talks'));

    }

    public function create() {
      return view('talks.create');
    }

    public function store()
     {
         $data = request()->validate([
             'name' => 'required',
             'birth_year' => 'required',
             'listen' => 'required',
             'talk' => 'required'
         ]);

         Talk::create([
             'name' => $data['name'],
             'birth_year' => $data['birth_year'],
             'listen' => $data['listen'],
             'talk' => $data['talk'],
         ]);
         return redirect('/talks');
     }


}
