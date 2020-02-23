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

        $background_image1 = request('background_image1')->store('uploads', 'public');
        $background_image2 = request('background_image2')->store('uploads', 'public');
        $background_image3 = request('background_image3')->store('uploads', 'public');

        $data['a_word'] = request('a_word');
        $data['description'] = request('description');

        $data['background_image1'] = $background_image1;
        $data['background_image2'] = $background_image2;
        $data['background_image3'] = $background_image3;

        $data['user_id'] = auth()->user()->id;

        GachaStyle::create([
            'user_id' => $data['user_id'],
            'a_word' => $data['a_word'],
            'description' => $data['description'],
            'background_image1' => $data['background_image1'],
            'background_image2' => $data['background_image2'],
            'background_image3' => $data['background_image3'],
        ]);



        //dd(auth()->user()->id);
    }


}
