<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;

use \App\Models\user_form;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Auth;

use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromQuery, WithHeadings
{
    use Exportable;

    
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return user_form::all();
    // }
    protected $search;
    protected $loan_status;
    protected $from_date;
    protected $to_date;
    protected $role;
    protected $sortDate;

    function __construct($search, $loan_status,$from_date,$to_date,$role,$sortDate)
    {
        $this->search = $search;
        $this->loan_status = $loan_status;
        $this->from_date = $from_date;
        $this->to_date = $to_date;
        $this->role = $role;
        $this->sortDate = $sortDate;
    }
    public function query(){
        if($this->role!="" && $this->loan_status!="" && $this->from_date!="" && $this->to_date!="" && $this->sortDate!=""){
            $data = user_form::where('sponser_role',$this->role)->where('loanstatustype', $this->loan_status)->whereBetween('updated_at',[$this->from_date,$this->to_date])->orderBy('updated_at',$this->sortDate)->orderBy("id","desc");
        }
        elseif($this->role!="" && $this->loan_status!="" && $this->from_date!="" && $this->to_date!="" ){
            $data = user_form::where('sponser_role',$this->role)->where('loanstatustype', $this->loan_status)->whereBetween('updated_at',[$this->from_date,$this->to_date])->orderBy("id","desc");
        }
        elseif($this->role!="" && $this->loan_status!="" && $this->sortDate!="" ){
            $data = user_form::where('sponser_role',$this->role)->where('loanstatustype', $this->loan_status)->orderBy('updated_at',$this->sortDate)->orderBy("id","desc");
        }
        elseif($this->role!="" && $this->from_date!="" && $this->to_date!="" && $this->sortDate!="" ){
            $data = user_form::where('sponser_role',$this->role)->whereBetween('updated_at',[$this->from_date,$this->to_date])->orderBy("updated_at",$this->sortDate)->orderBy("id","desc");
        }
        elseif($this->loan_status!="" && $this->from_date!="" && $this->to_date!="" && $this->sortDate!="" ){
            $data = user_form::where('loanstatustype', $this->loan_status)->whereBetween('updated_at',[$this->from_date,$this->to_date])->orderBy("updated_at",$this->sortDate)->orderBy("id","desc");
        }
        elseif($this->role!="" && $this->loan_status!=""){
            $data = user_form::where('sponser_role',$this->role)->where('loanstatustype', $this->loan_status)->orderBy("id","desc");
            
        }
        elseif($this->role!="" && $this->sortDate!=""){
            $data = user_form::where('sponser_role',$this->role)->orderBy('updated_at', $this->sortDate)->orderBy("id","desc");
        }
        elseif($this->loan_status!="" && $this->sortDate!=""){
            $data = user_form::where('loanstatustype', $this->loan_status)->orderBy("updated_at",$this->sortDate)->orderBy("id","desc");
            $data->appends(["sortDate"=>$this->sortDate,"loan_status"=>$this->loan_status]);
        }
        elseif($this->from_date!="" && $this->to_date!="" && $this->sortDate!=""){
            $data = user_form::whereBetween('updated_at',[$this->from_date,$this->to_date])->orderBy('updated_at',$this->sortDate)->orderBy("id","desc");
        }
        elseif($this->loan_status!="" && $this->from_date!="" && $this->to_date!=""){
            $data = user_form::where('loanstatustype', $this->loan_status)->whereBetween('updated_at',[$this->from_date,$this->to_date])->orderBy("id","desc");
            $data->appends(["from_date"=>$this->from_date ,"to_date"=>$this->to_date,"loan_status"=>$this->loan_status]);
        }
        elseif($this->role!=""  && $this->from_date!="" && $this->to_date!=""){
            $data = user_form::where('sponser_role',$this->role)->whereBetween('updated_at',[$this->from_date,$this->to_date])->orderBy("id","desc");
        }
       elseif($this->sortDate!=""){
            $data = user_form::orderBy("updated_at",$this->sortDate)->orderBy("id","desc");
        }
       elseif($this->search!=""){
            $data = user_form::where('register_id','like','%'.$this->search.'%')->orWhere('loanstatustype','like','%'.$this->search.'%')->orWhere('fullname','like','%'.$this->search.'%')->orWhere('email','like','%'.$this->search.'%')->orWhere('sponser_name','like','%'.$this->search.'%')->orWhere('sponser_role','like','%'.$this->search.'%')->orWhere('company_name','like','%'.$this->search.'%')->orderBy("id","desc");
        }

       elseif($this->from_date!="" && $this->to_date!=""){
           $data = user_form::whereBetween('updated_at',[$this->from_date,$this->to_date])->orderBy("id","desc");
        }
        elseif($this->role!=""){
            $data = user_form::where('sponser_role',$this->role)->orderBy("id","desc");
        }
       elseif($this->loan_status!=""){
        $data = user_form::where('loanstatustype', $this->loan_status)->orderBy("id","desc");
       }
      elseif($this->id != ""){
        $data = user_form::where("sid",$this->id)->orderBy("id","desc");
      }
      
       elseif(Auth::user()->roles[0]->name == "Admin")
        {
            $data = user_form::orderBy("id","desc");
        } else {
            $data = user_form::where('sid', Auth::user()->id)->orderBy("id","desc");
        }
         return $data;
    }

    public function headings(): array
    {
        return [
            'Id',
            'Dealer Code',
            'Name',
            'Race',
            'IC Number',
            'Gender',
            'Housing Status',
            'Martial',
            "Bank",
            "Account Type",
            "Account No.",
            "Account Name",
            'Email',
            "Hanphone No.",
            "Address 1",
            "Address 2",
            "PostCode",
            "City",
            "State",
            "Length",
            "Call",
            "Relationship",
            'Register Id',
            'Refer By Id',
            'Refer By Name',
            "Sponser Role",
            'Occupation Type',
            "Nature",
            "Service Year",
            "Salary Date",
            "Salary",
            "Employment",
            'Company Name',
            'Company Address',
            'Company PostCode',
            'Company State',
            'Company City',
            'Office No.',
            "Document",
            "Brand",
            "Model",
            "Capacity",
            "Loan",
            'Loan Status',
            'Loan Status Name',
            "Follow Up Review",
            "Is Read",
            "Created At",
            "Updated At"
        ];
    }
}
