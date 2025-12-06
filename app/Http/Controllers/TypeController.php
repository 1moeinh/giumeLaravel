<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypeController extends Controller
{
    public function show($id){
        $show = Type::find($id);
        $com = Comment::all();
        $comment =[];
        $authr = [];
        $user = Auth::user();
        foreach($com as $comm){
            if($comm->submit == 1 && $show->id === $comm->types_id){
                $comment[] = $comm;
                $authr[] = Contact::find($comm->contacts_id);
                }
        }

        return view('giume.show',compact(['show','comment','authr','user']));
    }

    public function req(Request $request){
        
        Service::create([
            'types_id' => $request->id,
            'contacts_id' => $request->userid
        ]);
        return redirect()->route('giume.service');
    }


    public function remove($id){
        Comment::find($id)->delete();
        return redirect()->route('giume.admin');
    }
    public function create(Request $request){
        Comment::create([
            'contacts_id' =>$request->contact,
            'types_id' => $request->type,
            'description' => $request->description
        ]);
        return redirect()->route('giume.service');
    }
    public function update($id){
        Comment::find($id)->update([
            'submit' => 1
        ]);
        return redirect()->route('giume.service');
    }
}
