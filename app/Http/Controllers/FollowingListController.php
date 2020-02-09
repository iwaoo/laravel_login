<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class FollowingListController extends Controller
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
      $following = $user->following;

      return view('follow.following_list', compact('follows', 'following'));
  }
}
