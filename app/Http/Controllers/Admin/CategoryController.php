<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventCategory;

class CategoryController extends Controller
{
    public function CCreate($id){
        $event = Event::find($id);
        $eventCategories = $event->eventCategory->all();
        return view('Admin.Category.CategoryCreate', ['eventCategories'=>$eventCategories,'event'=>$event]);
    }

    public function getCatjson($id){
        $event = Event::find($id);
        $eventCategories = $event->eventCategory->all();
        return json_encode($eventCategories);
    }
    

    public function CStore(Request $request){
        $request->validate([
            'Name' => 'required',
            'event_id'=>'required',

        ]);
        EventCategory::updateOrCreate(
            ['id'=>$request->CatId],
            [
                'Name'=>$request->Name,
                'event_id'=>$request->event_id,
            ]

        );

        if($request->CatId){
        return \Redirect::route('AllEvent');
        }
        else{
            return redirect()->back();
        }
    }

    public function Cdelete($id){
        EventCategory::find($id)->delete();
        return redirect()->back();
    }
   
    public function Cedit(Request $request){
        $id = $request->id; 
        $ider = $request->ider;              
        $event = Event::find($id);
        $eventCategories = $event->eventCategory->all();
        $cat = EventCategory::find($ider);
        return view('Admin.Category.CategoryEdit', ['eventCategories'=>$eventCategories,'event'=>$event,'cat'=>$cat]);
    }
}
