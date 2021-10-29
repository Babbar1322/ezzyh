<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ticket;
use Auth;

class TicketController extends Controller
{
   public function create(){
       return view('admin.ticket.create');
   }
   public function store(Request $request){
       $file = $request->file;
       if($request->hasFile('file')){
           $file->move(public_path('/uploads/tickets'),$filename);
           $filename = $file->getClientOriginalName();
       }
       else{
           $filename = "";
       }
       ticket::create([
           "user_name"=> $request->name,
           "email"=> $request->email,
           "user_id"=> $request->user_id,
           "role"=> $request->role,
           "subject"=> $request->subject,
           "message"=>$request->message,
           "file"=>$filename
       ]);
       return redirect()->back()->with("success","Ticket Submitted!");
   }

   public function index(){
       $tickets = ticket::where('user_id',Auth::user()->id)->get();
       return view('admin.ticket.index',compact('tickets'));
   }

   public function requests(){
       $reqs = ticket::orderBy('id','desc')->get();
       return view('admin.ticket.requests',compact('reqs'));
   }

   public function reply($id){
       $ticket = ticket::findOrFail($id);
       return view('admin.ticket.reply',compact('ticket'));
   }

   public function storeReply(Request $request,$id){
      
        $file = $request->file;
        $filename = $file->getClientOriginalName();
        $file->move(public_path('/uploads/tickets'),$filename);
       ticket::where('id',$id)->update([
           "reply"=>$request->message,
           'reply_file'=>$filename,
           "status"=>1
       ]);
       return redirect()->route('ticket.requests')->with('success',"Replied!");
   }
}
