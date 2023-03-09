<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contestant;
use App\Models\Branch;
use App\Models\Event;

class frontendController extends Controller
{
    public function content($id){
         
        $event = Event::findOrFail($id);
        return view('frontend.content',['event'=>$event]);
    }
    
    public function index(){
        $branches = Branch::with('events')->get();
        return view('frontend.index', ['branches'=>$branches]);
    }

    public function singleCont($id){
        return view('frontend.singleCont',['contestant'=>Contestant::findOrFail($id)]);
    }
}
