<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();

        $profile = $user->profile;
        $user['profile'] = $profile;

        $followersCount = $user->profile->followers->count();

        $followingCount = $user->following->count();

        $userTalkes = \App\UserTalk::where('user_id', '=', $user->id)->limit(1)->get();
          foreach ($userTalkes as $key => $userTalk) {
            $gachaTalks[$key]['talks'] = \App\Talk::where('id', '=', $userTalk['talk_id'])->get();
            $gachaTalks[$key]['hit_flg'] = $userTalk['hit_flg'];
            $gachaTalks[$key]['gachaStyles'] = \App\GachaStyle::where('id', '=', $userTalk['gacha_style_id'])->get();

          }
          $recommendStyles = \App\GachaStyle::where('recommend_flg', '=', true)->limit(3)->get();

//        dd($user);
        return view('home', compact('user', 'followersCount', 'followingCount', 'gachaTalks', 'recommendStyles'));
    }
}
