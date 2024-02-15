<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\movie;
use Session;

class MovieContoller extends Controller
{
    public function index(Request $request){
        return view('movies', ['movieList'=>Movie::all()]);
    }
    public function create(Request $request){
        return view('CreateNewMovie', ['movieData'=> null]);
    }
    public function create_movie(Request $request){
        $request->validate([
            'name' => 'required',
            'url' => 'required',
            'release_date' => 'required',
        ]);
        movie::create([
            'name' =>  $request->name,
            'url' =>  $request->url,
            'release_date' => $request->release_date
        ]);
        
        return redirect()->route('movies.view')->with('success','');
    }
    
    public function retriveMovie(Request $request, $id){
        $movie = Movie::find($id);
        if (!$movie) {
            return abort(404);
        }
        
        return view('CreateNewMovie', ['movieData'=> $movie]);
    }
    
    public function edit_movie(Request $request, $id){
        $movie = Movie::find($id);
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'url' => 'required|string|url',
            'release_date' => 'required|date_format:Y-m-d',
        ]);

        $movie->update([
            'name' =>  $request->name,
            'url' =>  $request->url,
            'release_date' => $request->release_date
        ]);
        
        return redirect()->route('movies.view')->with('success','');
    }
    public function delete(Request $request, $id){
        $movie = Movie::find($id);

        $movie->delete();
        
        return redirect()->route('movies.view')->with('success','');
    }
    
}
