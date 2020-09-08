<?php

namespace App\Http\Controllers;

use App\GachaStyle;
use App\User;



class GachaDrawingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function create()
    {
        return view('gacha_drawing.create');
    }

    public function store()
    {

        //dd(request('first_image')->store('uploads', 'public'));
        $background_image1 = request('image')->store('uploads', 'public');

        $data['a_word'] = request('a_word');
        $data['description'] = request('description');

        $data['background_image1'] = $background_image1;

        $data['user_id'] = auth()->user()->id;


        GachaStyle::create([
            'user_id' => $data['user_id'],
            'a_word' => $data['a_word'],
            'description' => $data['description'],
            'background_image1' => $data['background_image1']
        ]);



        //dd(auth()->user()->id);
    }


}
