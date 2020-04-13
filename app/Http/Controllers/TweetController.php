<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;

class TweetController extends Controller
{
    public function tweet(Request $request){
        $tweetString = $request->input('tweetString');

        $twitter = new TwitterOAuth(env('TWITTER_CLIENT_ID'),
            env('TWITTER_CLIENT_SECRET'),
            env('TWITTER_CLIENT_ID_ACCESS_TOKEN'),
            env('TWITTER_CLIENT_ID_ACCESS_TOKEN_SECRET'));

        $twitter->post("statuses/update",[
            "status" => $tweetString
        ]);

        return view('success');
    }
}
