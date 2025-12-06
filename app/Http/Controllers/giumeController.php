<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class giumeController extends Controller
{
    public function index(){
       
        return view('giume.index');
    }

    public function panel(){
        $userpanel = Auth::user();
        $userid = Auth::user()->id;
        $prods = Service::where('contacts_id',$userid)->get();
        
        $products = [];
        foreach ($prods as $prod) {
            $product = Type::where('id', $prod->types_id)->first();
            if ($product) {
                $products[] = $product;
            }
        }
        return view('giume.user',compact('userpanel','products'));
    }
    public function edituser(Request $req , $id){
        Contact::find($id)->update([
            'name' => $req->name,
            'phone_number' => $req->phone
        ]);
        return redirect()->route('giume.panel');
    }

    public function about(){
        return view('giume.about');
    }

    public function learn(){

        return view('giume.learn');
    }


    public function admin(){
        if(Auth::check()){

            $gate = Auth::user()->admin;
            if($gate){
                $member = Contact::all();
                $types = Type::all(); 
                $service = Service::all();
                $com = Comment::all();
                $comment =[];
                $authr = [];
                $name = [];
                $serviceName =[];
                #سرویس های کاربر
                foreach($service as $services){
                    
                    $name[] = Contact::find($services->contacts_id);
                    $serviceName[] = Type::find($services->types_id);

                }
                #کامنت ها
                foreach($com as $comm){
                    if($comm->submit == 0){
                        $comment[] = $comm;
                        $authr[] = Contact::find($comm->contacts_id);
                        }
                }
                
                return view('giume.admin',compact(['member','types','name','serviceName','comment','authr']));
            }else{
                return view('giume.index');
            }
        }
        else{
            return view('giume.index');
        }
    }

    public function remove($id){
        Contact::find($id)->delete();
        return redirect()->route('giume.admin');
    }

    public function update($id){
        Contact::where('id', $id)->update([
            'admin' => 1
        ]);
        return redirect()->route('giume.admin');
    }
    public function gate($id){
        Contact::where('id', $id)->update([
            'admin' => 0
        ]);
        return redirect()->route('giume.admin');
    }

    
    public function servedit($id){
        Service::where('contacts_id', $id)->update([
            'submit' => 1
        ]);
        return redirect()->route('giume.admin');
    }




    public function login(){
        return view('giume.login');
    }
    public function check(Request $request){

        $user = Contact::where('phone_number', $request->input('phone_number'))
                        ->where('password', $request->input('password'))
                        ->first();
        if($user){
            auth()->login($user);
            $admin = Auth::user()->admin;
            if ($admin){
                return redirect()->route('giume.admin');
            }else{
                
                return redirect()->route('giume.panel');
        }}
        else {
            return redirect()->route('giume.register');
        }
    }
    public function logout(Request $request){
        Auth::logout();


        $request->session()->invalidate(); 
        $request->session()->regenerateToken(); 

        return redirect()->route('giume.index');
    }






    public function register(){
        
        return view('giume.register');
    }
    public function store(Request $request){
        
        Contact::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'password' => $request->password
        ]);
        return redirect()->route('giume.login');
    }
}
