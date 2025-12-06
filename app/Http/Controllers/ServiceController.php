<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function service(){
        $type = Type::all();
        return view('giume.service',compact('type'));
    }


    public function delete($id){
        Type::find($id)->delete();
        return redirect()->route('giume.admin');
    }
    public function edit($id,Request $request){
        Type::where('id', $id)->update([
            'service_name' => $request->name,
            'service_price' => $request->price
        ]);
        return redirect()->route('giume.admin');
    }    
}
