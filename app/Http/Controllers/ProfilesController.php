<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
class ProfilesController extends Controller
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
  public function index(User $user)
  {
      // ログインユーザーがフォローしてる場合はtrue
      $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

      $followersCount = $user->profile->followers->count();

      $followingCount = $user->following->count();

//20200830日      $talks = $user->hasTalk;
      $userTalkes = \App\UserTalk::where('user_id', '=', $user->id)->limit(1)->get();
        foreach ($userTalkes as $key => $userTalk) {
          $gachaTalks[$key]['talks'] = \App\Talk::where('id', '=', $userTalk['talk_id'])->get();
          $gachaTalks[$key]['hit_flg'] = $userTalk['hit_flg'];
          $gachaTalks[$key]['gachaStyles'] = \App\GachaStyle::where('id', '=', $userTalk['gacha_style_id'])->get();

        }
        $recommendStyles = \App\GachaStyle::where('recommend_flg', '=', true)->limit(3)->get();


//      dd($recommendStyles);

//      return view('profiles.index', compact('user', 'follows', 'followersCount', 'followingCount', 'talks'));
    return view('profiles.index', compact('user', 'follows', 'followersCount', 'followingCount', 'gachaTalks', 'recommendStyles'));
  }

  public function edit(User $user)
  {
      $this->authorize('update', $user->profile);
      return view('profiles.edit', compact('user'));
  }

  public function update(User $user)
{
    $this->authorize('update', $user->profile);
    $data = request()->validate([
        'title' => 'required',
        'description' => 'required',
    ]);

    auth()->user()->profile->update($data);
    return redirect("/home");
}



  public function follow_couont(User $user)
  {
    $followersCount =  $user->profile->followers->count();

    $followingCount =  $user->following->count();
    return compact('followersCount', 'followingCount');
  }
}
