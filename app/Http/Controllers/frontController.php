<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\user_form;
use App\Models\User;
use App\Models\banner;
use App\Models\logController;
use App\Models\notification;

class frontController extends Controller
{
    // public function dashboard(Request $request){
    //     return view('admin.dashboard');
    // }
    public function indexpage(Request $request) {
        if (!Auth::user()) {
            return view('user.index');
        } else {
            return redirect('admin/dashboard');
        } 
    }
    
    public function userformpage(Request $request, $id) {
        $user = User::where("id",$id)->first();
        $ban = banner::where('user_id',$id)->orWhere("user_id",$user->spid)->first();
        return view('user.userform', compact('id','ban'));
    }

    public function storeUserform(Request $request, $id){
        $rand = mt_rand(1000000000, 9999999999);
        $user = User::where('id',$id)->first();
        $cstm = user_form::create([
            "dealer_code"=>$request->dealer_code,
            "fullname"=>$request->fullname,
            "race"=>$request->race,
            "ic_number"=>$request->ic_number, 
            "gender"=>$request->gender, 
            "status"=>$request->STATUS,
            "martial"=>$request->MARTIAL,
            "bank"=>$request->BANK,
            "account"=>$request->ACCOUNT,
            "account_no"=>$request->account_no,
            "account_name"=>$request->account_name,
            "email"=>$request->email, 
            "hanphone_no"=>$request->hanphone_no, 
            "address1"=>$request->address1,
            "address2"=>$request->address2,
            "postcode"=>$request->postcode,
            "city"=>$request->city,
            "state"=>$request->state,
            "length"=>$request->LENGTH,
            "call1"=>$request->CALL,
            "relationship"=>$request->RELATIONSHIP,
            "register_id"=>$rand,
            "sid"=>$id,
            "sponser_name"=>$user->name,
            "sponser_role"=>$user->roles[0]->name,
            "occupation_type"=>$request->occupation_type,
             "nature"=>$request->NATURE,
            "service_year"=>$request->service_year,
            "salary_date"=>$request->salary_date,
            "salary"=>$request->salary,
            "employment"=>$request->EMPLOYMENT,
            "company_name"=>$request->company_name,
            "company_address"=>$request->company_address,
            "company_postcode"=>$request->company_postcode,
            "company_state"=>$request->company_state,
            "company_city"=> $request->company_city,
            "office_no"=>$request->office_no,
            "document"=>$request->document,
            "brand"=>$request->BRAND,
            "model"=>$request->MODEL,
            "capacity"=>$request->CAPACITY,
            "loan"=>$request->LOAN
        ]);

        $log = new logController();
        $log->title = "Customer Form Registerd";
        $log->description = "customer " .$cstm->fullname. " is registered  By  ".$cstm->sponser_name ." As a " .$cstm->sponser_role;
        $log->type = 1;
        $log->save();

        notification::create([
            'status'=>1
        ]);

        return redirect()->back()->with('success',"submitted successfully");
    }
    public function contactus_page(Request $request){
        return view('contact');
    }
    public function aboutus_page(Request $request){
        return view('about');
    }

    
}
