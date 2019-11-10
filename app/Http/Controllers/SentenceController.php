<?php

namespace App\Http\Controllers;

use App\Sentence;
use Illuminate\Http\Request;

class SentenceController extends Controller
{
    public function store(Sentence $sentence, Request $request)
    {

        if ($sentence->user_id == $request->user()->id) {
            $sentence->update([
                'value' =>  $request->input('value')
            ]);

            return $sentence;
        }

        return response(['error' => 'user not authorized'], 401);
    }
}
