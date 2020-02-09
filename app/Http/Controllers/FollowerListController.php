<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class FollowerListController extends Controller
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
      $followers = $user->profile->followers;
    //    dd($followers[0]['name']);
      return view('follow.follower_list', compact('follows', 'followers'));
  }

}
