<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use DB;
use Validator;
use App\Tweet;

class TweetController extends Controller
{
    public function index(){
    	 //    $tweets = DB::table('tweets')
    		// ->select('id','tweet')
    		// ->orderBy('id','DESC')
    		// ->get();

    	// $tweets = Tweet::all();
    	$tweets = Tweet::orderBy('created_at','desc')->get();

 		 //resources/views/tweets/index.blade.php
    	return view('tweets.index',[
    		'tweets' => $tweets
    	]); 
    }

    public function store(Request $request){

		$validation = Validator::make($request->all()
		/*[
			'tweet' => request('tweettext'),
		]*/,[
			'tweettext' => 'required|max:140',
		]);

		if ($validation->passes()){

	 		// DB::table('tweets')->insert([
			// 'tweet' => request('tweettext'),
			// ]);

			$tweet = new Tweet();
			$tweet->tweet = request('tweettext');
			$tweet->save();

			return redirect('/')
				->with('successStatus','Tweet successfully created!');
			}

		else {
			return redirect('/')
				->withInput()
				->withErrors($validation);
		}
    }

     public function destroy($tweetID){
		// DB::table('tweets')
		// 	->where('id','=', $tweetID)
		// 	->delete();

     	$tweet = Tweet::find($tweetID);
     	$tweet->delete();

		return redirect('/')
			->with('successStatus','Tweet was deleted successfully!');
	}

	public function view($tweetID){
		// $tweet = DB::table('tweets')
		// 	->where('id','=', $tweetID)
		// 	->first();

		// dd($tweet);

		$tweet = Tweet::find($tweetID);

		return view('tweets.view',[
			'tweet' => $tweet
		]);
	}

	public function edit($tweetID){
		$tweet = Tweet::find($tweetID);

    	return view('tweets.edit',[
    		'tweet' => $tweet
    	]); 	
    }

    public function update(Request $request, $tweetID){

    	$validation = Validator::make($request->all()
		/*[
			'tweet' => request('tweettext'),
		]*/,[
			'tweettext' => 'required|max:140',
		]);

		if ($validation->passes()){
			$tweet = Tweet::find($tweetID);
			$tweet->tweet = request('tweettext');
			$tweet->save();

			return redirect("/tweets/$tweetID")
				->with('successStatus','Tweet successfully created!');
			}

		else {
			return redirect('/')
				->withInput()
				->withErrors($validation);
		}
    }
}


















