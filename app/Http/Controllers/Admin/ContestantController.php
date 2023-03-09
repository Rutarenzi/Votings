<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contestant;
use App\Models\Event;
use Exception;

class ContestantController extends Controller
{
    public function Contcreate(){
        $event = Event::get();
        return view('Admin.contestant.contestants',['event'=>$event]);
    }
   
    public function ContList($id){
        $contestants = Event::findOrFail($id)->contestants;
        return view('admin.contestant.contList',['contestants'=>$contestants]);
    }

    public function Contstore(Request $request){
        $request->validate([
            'Name'=> "required",
            'event_id' =>' required',
            'event_category_id'=> 'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $cont = $request->all();
        $contestanter = new Contestant();
        $contestanter->Name = $cont['Name'];
        $contestanter->event_id = $cont['event_id'];
        $contestanter->event_category_id =$cont['event_category_id'];
        $contestanter->VotingCode =random_int(1000, 99999);;
        
        if($request->hasFile('image')){

            $filenamewithextension = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filenametostore = $filename.'_'.time().'.'.$extension;
            $request->file('image')->storeAs('public/contImages',$filenametostore);
            $contestanter->Image = $filenametostore; 
            $filepath = public_path('storage/contImages/'.$filenametostore);
            try{

                \Tinify\setKey(env("TINIFY_API_KEY"));
                $source = \Tinify\fromFile($filepath);
                $source->toFile($filepath);
            }catch(\Tinify\AccountException $e){
                
                return redirect('createPeople')->with('error', $e->getMessage());
            }catch(\Tinify\ClientException $e){

                return redirect('createPeople')->with('error', $e->getMessage());
            }catch(\Tinify\ServerException $e){

                return redirect('createPeople')->with('error', $e->getMessage());
            }catch(\Tinify\ConnectionException $e){

                return redirect('createPeople')->with('error', $e->getMessage());
            } catch(Exception $e){
                return redirect('createPeople')->with('error', $e->getMessage());
            }

            
         }

         $contestanter->save(); 
         return redirect()->back();
    }

    public function Contupdate(Request $request,$id){
        $request->validate([
            'Name'=> "required",
            'event_id' =>' required',
            'event_category_id'=> 'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $cont = $request->all();
        $contestanter = Contestant::findOrFail($id);
        $contestanter->Name = $cont['Name'];
        $contestanter->event_id = $cont['event_id'];
        $contestanter->event_category_id =$cont['event_category_id'];
        
        if($request->hasFile('image')){
            $filenamewithextension = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filenametostore = $filename.'_'.time().'.'.$extension;
            $request->file('image')->storeAs('public/contImages',$filenametostore);
            $contestanter->Image = $filenametostore; 
            $filepath = public_path('storage/contImages/'.$filenametostore);
            try{

                \Tinify\setKey(env("TINIFY_API_KEY"));
                $source = \Tinify\fromFile($filepath);
                $source->toFile($filepath);
            }catch(\Tinify\AccountException $e){
                return redirect('createPeople')->with('error', $e->getMessage());
            }catch(\Tinify\ClientException $e){
                return redirect('createPeople')->with('error', $e->getMessage());
            }catch(\Tinify\ServerException $e){
                return redirect('createPeople')->with('error', $e->getMessage());
            }catch(\Tinify\ConnectionException $e){
                return redirect('createPeople')->with('error', $e->getMessage());
            } catch(Exception $e){
                return redirect('createPeople')->with('error', $e->getMessage());
            }
         }

         $contestanter->save(); 
         return redirect()->back();
        
    }


    public function Contedit($id){    
        return view('admin.contestant.contEdit',['contestant'=>Contestant::findOrFail($id),'event'=>Event::get()]);
    }

    public function Contdelete($id){
         Contestant::findOrFail($id)->delete();
         return  response()->json(['status'=>'The contestant is deleted successfully!!!']);
    
    }

}
