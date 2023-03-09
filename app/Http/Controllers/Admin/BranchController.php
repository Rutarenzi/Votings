<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;
use DataTables;

class BranchController extends Controller
{
    public function BCreate(Request $request){
        
        $branches = Branch::get();

        if($request->ajax()){
            $allData = DataTables::of($branches)
            ->addIndexColumn()
            ->addColumn('action', function($row){
               $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" class="editer" ><i class="material-icons" style="color: blue">edit_square</i></a>';
               $btn.='<a href="javascript:void(0)" data-id="'.$row->id.'" class="deleter"><i class="material-icons" style="color: red">delete</i></a>';

               return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);

            return $allData;

            
        }
        
        return view('Admin.Branch.BranchCreate', compact('branches'));
    }
   

    public function Bstore(Request $request){

        Branch::updateOrCreate(
            ['id'=>$request->Branch_id],
            [
                'Name'=>$request->Name,
                'Description'=>$request->Description,
                'Status'=>$request->Status,
            ]
            );
            return response()->json(['success'=>"student add"]);
    }

   

   public function Bedit($id){
     $branch = Branch::find($id);
     return response()->json($branch);
   }   
    public function Bdestroy($id){

        $branch = Branch::find($id)->delete();
       

        return response()->json(['success'=>"student add"]);
    }


}
