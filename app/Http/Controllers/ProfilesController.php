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

<<<<<<< HEAD
      $followersCount = $user->profile->followers->count();

=======
>>>>>>> feature/home
      $followingCount = $user->following->count();

      return view('profiles.index', compact('user', 'follows', 'followersCount', 'followingCount'));
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
