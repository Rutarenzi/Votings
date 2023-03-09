<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Branch;
use Exception;

class EventController extends Controller
{
   
    public function ECreate(){
      $branches =Branch::get();
    return view('Admin.Event.EventCreate',compact('branches'));
    }
    
    public function Estore(Request $request){
        $request->validate([
            'Name'=> "required",
            'EventDate' =>' required',
            'Branch_id'=> 'required',
            'Venue'=> 'required',
            'Image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'=> 'required',
        ]);

        $event = new Event();
        $event->Name = $request->Name;
        $event->EventDate = $request->EventDate;
        $event->Branch_id = $request->Branch_id;
        $event->Venue = $request->Venue;
        $event->status = $request->status;
         
        if($request->hasFile('Image')){
            $filenamewithextension = $request->file('Image')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('Image')->getClientOriginalExtension();
            $filenametostore = $filename.'_'.time().'.'.$extension;
            $request->file('Image')->storeAs('public/Images',$filenametostore);
            $event->Image = $filenametostore; 
            $filepath = public_path('storage/Images/'.$filenametostore);

            try{

                \Tinify\setKey(env("TINIFY_API_KEY"));
                $source = \Tinify\fromFile($filepath);
                $source->toFile($filepath);

            }catch(\Tinify\AccountException $e){
                return redirect('home')->with('error', $e->getMessage());
            }catch(\Tinify\ClientException $e){
                return redirect('createEvent')->with('error', $e->getMessage());
            }catch(\Tinify\ServerException $e){
                return redirect('createEvent')->with('error', $e->getMessage());
            }catch(\Tinify\ConnectionException $e){
                return redirect('createEvent')->with('error', $e->getMessage());
            } catch(Exception $e){
                return redirect('createEvent')->with('error', $e->getMessage());
            }
            
         }
         $event->save();      
        return redirect()->back();
        
    }

    public function AllEvent(){
        $events = Event::with('branch')->get();
        return view('Admin.Event.AllEvent',compact('events'));
    }
    
    public function Eventedit($id){
        $event = Event::findOrFail($id);
        $branches =  Branch::get();
        return view('Admin.Event.EventEdit',['event'=> $event, 'branches'=>$branches]);
    }

    public function Eventupdate(Request $request, $id){
        $event = Event::findOrFail($id);
        $request->validate([
            'Name'=> "required",
            'EventDate' =>' required',
            'Branch_id'=> 'required',
            'Venue'=> 'required',
            'Image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'=> 'required',
        ]);

        $event->Name = $request->Name;
        $event->EventDate = $request->EventDate;
        $event->Branch_id = $request->Branch_id;
        $event->Venue = $request->Venue;
        $event->status = $request->status;
         
        if($request->hasFile('Image')){
            $filenamewithextension = $request->file('Image')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('Image')->getClientOriginalExtension();
            $filenametostore = $filename.'_'.time().'.'.$extension;
            $request->file('Image')->storeAs('public/Images',$filenametostore);
            $event->Image = $filenametostore; 
            $filepath = public_path('storage/Images/'.$filenametostore);

            try{

                \Tinify\setKey(env("TINIFY_API_KEY"));
                $source = \Tinify\fromFile($filepath);
                $source->toFile($filepath);

            }catch(\Tinify\AccountException $e){
                return redirect('home')->with('error', $e->getMessage());
            }catch(\Tinify\ClientException $e){
                return redirect('createEvent')->with('error', $e->getMessage());
            }catch(\Tinify\ServerException $e){
                return redirect('createEvent')->with('error', $e->getMessage());
            }catch(\Tinify\ConnectionException $e){
                return redirect('createEvent')->with('error', $e->getMessage());
            } catch(Exception $e){
                return redirect('createEvent')->with('error', $e->getMessage());
            }
            
         }
         $event->save(); 
      return redirect()->route('AllEvent'); 

    }

    public function Eventdelete($id){
        Event::find($id)->delete();
        return response()->json(['status'=>'Your Event was deleted successully']);
    }
}
