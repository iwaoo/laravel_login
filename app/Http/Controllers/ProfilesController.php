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
      
      $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

      $followersCount = Cache::remember(
      'count.followers.' . $user->id,
      now()->addSeconds(30),
      function () use ($user) {
          return $user->profile->followers->count();
      });

      $followingCount = Cache::remember(
          'count.following.' . $user->id,
          now()->addSeconds(30),
          function () use ($user) {
              return $user->following->count();
          });

      return view('profiles.index', compact('user', 'follows', 'followersCount', 'followingCount'));
  }

  public function store(User $user)
  {
    $followersCount =  $user->profile->followers->count();

    $followingCount =  $user->following->count();
    return compact('followersCount', 'followingCount');
  }
}
