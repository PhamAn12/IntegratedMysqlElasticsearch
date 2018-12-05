<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\University;
class Search extends Controller
{
    public function getuniversity() {
        return view('home');
    }
    public function postuniversity(Request $request) {
        $query = $request->input('query');
        if($query === null) {
            $university = University::all();
        }
        else{
            $university = University::search($query);
        }
    }

    
    
}
