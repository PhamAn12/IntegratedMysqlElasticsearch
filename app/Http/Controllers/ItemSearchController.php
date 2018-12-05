<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\University;
use App\Hometown;
class ItemSearchController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $items = Hometown::search($request->input('search'))->toArray();
        }
        return view('ItemSearch',compact('items'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        // $item = University::create($request->all());
        // $item->addToIndex();
        //$item = App\Hometown::where('id','<',200)->get();
        $item = Hometown::create($request->all());
        $item->addToIndex();
        return redirect()->back();
    }
}
