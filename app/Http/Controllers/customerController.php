<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use App\Models\user_form;
use Auth;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;



class customerController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index(Request $request)
    {
        if($request->role!="" && $request->loan_status!="" && $request->from_date!="" && $request->to_date!="" && $request->sortDate!=""){
            $data = user_form::where('sponser_role',$request->role)->where('loanstatustype', $request->loan_status)->whereBetween('updated_at',[$request->from_date,$request->to_date])->orderBy('updated_at',$request->sortDate)->paginate(5);
            $data->appends(["sortDate"=>$request->sortDate,"loan_status"=>$request->loan_status,"role"=>$request->role,"from_date"=>$request->from_date ,"to_date"=>$request->to_date]);
        }
        elseif($request->role!="" && $request->loan_status!="" && $request->from_date!="" && $request->to_date!="" ){
            $data = user_form::where('sponser_role',$request->role)->where('loanstatustype', $request->loan_status)->whereBetween('updated_at',[$request->from_date,$request->to_date])->paginate(5);
            $data->appends(["from_date"=>$request->from_date ,"to_date"=>$request->to_date,"role"=>$request->role,"loan_status"=>$request->loan_status]);
        }
        elseif($request->role!="" && $request->loan_status!="" && $request->sortDate!="" ){
            $data = user_form::where('sponser_role',$request->role)->where('loanstatustype', $request->loan_status)->orderBy('updated_at',$request->sortDate)->paginate(5);
            $data->appends(["sortDate"=>$request->sortDate,"loan_status"=>$request->loan_status,"role"=>$request->role]);
        }
        elseif($request->role!="" && $request->from_date!="" && $request->to_date!="" && $request->sortDate!="" ){
            $data = user_form::where('sponser_role',$request->role)->whereBetween('updated_at',[$request->from_date,$request->to_date])->orderBy("updated_at",$request->sortDate)->paginate(5);
            $data->appends(["sortDate"=>$request->sortDate,"role"=>$request->role,"from_date"=>$request->from_date ,"to_date"=>$request->to_date]);
        }
        elseif($request->loan_status!="" && $request->from_date!="" && $request->to_date!="" && $request->sortDate!="" ){
            $data = user_form::where('loanstatustype', $request->loan_status)->whereBetween('updated_at',[$request->from_date,$request->to_date])->orderBy("updated_at",$request->sortDate)->paginate(5);
            $data->appends(["sortDate"=>$request->sortDate,"loan_status"=>$request->loan_status,"from_date"=>$request->from_date ,"to_date"=>$request->to_date]);
        }
        elseif($request->role!="" && $request->loan_status!=""){
            $data = user_form::where('sponser_role',$request->role)->where('loanstatustype', $request->loan_status)->paginate(5);
            $data->appends(["loan_status"=>$request->loan_status,"role"=>$request->role]);
            
        }
        elseif($request->role!="" && $request->sortDate!=""){
            $data = user_form::where('sponser_role',$request->role)->orderBy('updated_at', $request->sortDate)->paginate(5);
            $data->appends(["sortDate"=>$request->sortDate,"role"=>$request->role]);
        }
        elseif($request->loan_status!="" && $request->sortDate!=""){
            $data = user_form::where('loanstatustype', $request->loan_status)->orderBy("updated_at",$request->sortDate)->paginate(5);
            $data->appends(["sortDate"=>$request->sortDate,"loan_status"=>$request->loan_status]);
        }
        elseif($request->from_date!="" && $request->to_date!="" && $request->sortDate!=""){
            $data = user_form::whereBetween('updated_at',[$request->from_date,$request->to_date])->orderBy('updated_at',$request->sortDate)->paginate(5);
            $data->appends(["sortDate"=>$request->sortDate,"from_date"=>$request->from_date ,"to_date"=>$request->to_date]);
        }
        elseif($request->loan_status!="" && $request->from_date!="" && $request->to_date!=""){
            $data = user_form::where('loanstatustype', $request->loan_status)->whereBetween('updated_at',[$request->from_date,$request->to_date])->paginate(5);
            $data->appends(["from_date"=>$request->from_date ,"to_date"=>$request->to_date,"loan_status"=>$request->loan_status]);
        }
        elseif($request->role!=""  && $request->from_date!="" && $request->to_date!=""){
            $data = user_form::where('sponser_role',$request->role)->whereBetween('updated_at',[$request->from_date,$request->to_date])->paginate(5);
            $data->appends(["role"=>$request->role,"from_date"=>$request->from_date ,"to_date"=>$request->to_date]);
        }
       elseif($request->sortDate!=""){
            $data = user_form::orderBy("updated_at",$request->sortDate)->paginate(5);
            $data->appends(["sortDate"=>$request->sortDate]);
        }
       elseif($request->search!=""){
            $data = user_form::where('register_id','like','%'.$request->search.'%')->orWhere('loanstatustype','like','%'.$request->search.'%')->orWhere('fullname','like','%'.$request->search.'%')->orWhere('email','like','%'.$request->search.'%')->orWhere('sponser_name','like','%'.$request->search.'%')->orWhere('sponser_role','like','%'.$request->search.'%')->orWhere('company_name','like','%'.$request->search.'%')->paginate(5);
            $data->appends(["search"=>$request->search]);
        }

       elseif($request->from_date!="" && $request->to_date!=""){
           $data = user_form::whereBetween('updated_at',[$request->from_date,$request->to_date])->paginate(5);
           $data->appends(["from_date",$request->from_date ,"to_date"=>$request->to_date]);
        }
        elseif($request->role!=""){
            $data = user_form::where('sponser_role',$request->role)->paginate(5);
            $data->appends(["role",$request->role]);
        }
       elseif($request->loan_status!=""){
        $data = user_form::where('loanstatustype', $request->loan_status)->paginate(5);
        $data->appends(["loan_status",$request->loan_status]);
       }
      elseif($request->id != ""){
        $data = user_form::where("sid",$request->id)->paginate(5);
      }
       elseif(Auth::user()->roles[0]->name == "Admin")
        {
            $data = user_form::paginate(5);
        } else {
            $data = user_form::where('sid', Auth::user()->id)->paginate(5);
        }
        // $data = User::orderBy('id','DESC')->paginate(5);
        return view('admin.customer.index',compact('data'));
            // ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('admin.customer.create',compact('roles'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('customer.index')
                        ->with('success','User created successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.customer.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('admin.customer.edit',compact('user','roles','userRole'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('customer.index')
                        ->with('success','User updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('customer.index')
                        ->with('success','User deleted successfully');
    }

    public function loanStatus(Request $request){
        if($request->loan_status == 1){
            // return response()->json("approve_id".$request->id);
            user_form::where("id",$request->id)->update([
                "loan_status" => 1,
                "loanstatustype" => "approved" ,
                "follow_up"=>""
            ]);
        }
        elseif($request->loan_status == 3){
            user_form::where("id",$request->id)->update([
                "loan_status" => 3,
                "loanstatustype" => "follow up",
                "follow_up"=>$request->follow_up
            ]);
        }
        elseif($request->loan_status == 2){
        // return response()->json("reject_id".$request->id);
            user_form::where("id",$request->id)->update([
                "loan_status" => 2,
                "loanstatustype" => "rejected",
                "follow_up"=>""
            ]);
        }
        
        return redirect()->back();
    }

    public function deleteCustomer($id){
        user_form::where('id',$id)->delete();
        return redirect()->back()->with('success',"Deleted!");
    }

    public function export(Request $request){
        $search = $request->search1;
        $loan_status = $request->loan_status1;
        $from_date = $request->date1;
        $to_date = $request->date2;
        $role = $request->role1;
        $sortDate = $request->sdate;
        return Excel::download(new UsersExport($search,$loan_status,$from_date,$to_date,$role,$sortDate), 'customers.xlsx');
    }
    public function importExportView(){
       

    }
    public function import(){}
}
