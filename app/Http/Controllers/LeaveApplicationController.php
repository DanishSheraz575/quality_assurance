<?php
namespace App\Http\Controllers;
use App\Models\Enquiry;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\LeaveApplication;
use App\Models\LeaveType;
class LeaveApplicationController extends Controller
{
    /**
     *
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function index(){
        $data['page_title'] = "Leave Application Form";
        $data['leave_types'] = LeaveType::where('status',1)->get();
        $data['leave'] = false;
        return view('leave_application.leave_form' , $data);
    }
    public function save(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'from'=> 'required',
            'to'=> 'required_if:leave_type, != , half',
            'leave_type' => 'required',
            'half' => 'required_if:leave_type, == , half',
            'medical_report' => 'mimes:pdf,png,jpg,jpeg ',
            'no_leaves' => 'required_if:leave_type, != , half',
            'reason' => 'required',
        ]);

        if($validator->passes())
        {

            if(isset($request->leave_id)) {
                LeaveApplication::where('leave_id', $request->leave_id)->update([
                    'added_by' =>Auth::user()->user_id,
                    'leave_type_id' => $request->leave_type,
                    'from' => $request->from,
                    'to' => $request->to,
                    'half_type' => $request->half_type,
                    'attachement' => $request->attachement,
                    'no_leaves' =>$request->no_leaves,
                    'reason' => $request->reason,

                ]);
                $response['status'] = "Success";
                $response['result'] = "Updated Successfully";
            }

        else{
            $leave =new LeaveApplication();
            $leave->added_by = Auth::user()->user_id;
            $leave->leave_type_id = $request->leave_type;
            $leave->from = $request->from;
            $leave->to = $request->to;
            $leave->half_type = $request->half;
            $leave->no_leaves= $request->no_leaves;
            $leave_file = "";
            if($request->file('medical_report'))
            {
                $file = $request->file('medical_report');
                $leave_file = time() . rand(1, 100) . '.' . $file->extension();
                $file->move(public_path('leave_applications'), $leave_file);
            }
            $leave->attachement = $leave_file;
            $leave->no_leaves  = $request->no_leaves;
            $leave->reason = $request->reason;


            $leave->save();
            $response['status'] = "Success";
            $response['result'] = "Added Successfully";


        }




        }
        else {
            $response['status'] = "Failure!";
            $response['result'] = str_replace('3', 'Sick',$validator->errors()->toJson());
        }
        return response()->json($response);
    }
    public function edit(Request $request){
        $data['page_title'] = "Leave Application Form";
        $data['leave_types'] = LeaveType::where('status',1)->get();
        if(isset($request->id)){
            $data['leave'] = LeaveApplication::where('leave_id',$request->id)->get()[0];
        } else {
            $data['leave'] = false;
        }
        return view('leave_application.leave_form' , $data);
    }
    Public function delete(Request $request)
    {
        $leave = LeaveApplication::where('leave_id', $request->id)->update([
            'status' => 0,
        ]);
        $response['status'] = "Success";
        $response['result'] = "Deleted Successfully";
        return response()->json($response);
    }
    public function list()
    {
        $data['page_title'] = "Atlantis BPO CRM - Call Dispositions List";
        if(Auth::user()->role_id == 2){
            $data['leave_lists'] = LeaveApplication::where([
                ['status','=',1],
                ['approved_by_manager' ,'=',1],
                ['approved_by_hr' ,'=',1]
            ])->where(function($query) {
                $query->whereHas('user', function ($query) {
                    return $query->where('manager_id', '=', Auth::user()->user_id);
                })->orWhere('added_by','=',Auth::user()->user_id);
            })->get();

            $data['leave_lists_unapproved']= LeaveApplication::where([
                ['status','=',1],
            ])->where(function($query) {
                $query->where('approved_by_manager','=',NULL)
                    ->orWhere('approved_by_hr','=',NULL);
            })->where(function($query) {
                $query->whereHas('user', function ($query) {
                    return $query->where('manager_id', '=', Auth::user()->user_id);
            })->orWhere('added_by','=',Auth::user()->user_id);
            })->get();
        }



        else if(Auth::user()->role_id == 5){
            $data['leave_lists'] = LeaveApplication::where([
                ['status','=',1],
                ['approved_by_manager','=', 1],
                ['approved_by_hr','=', 1]
            ])->with('user')->get();
            $data['leave_lists_unapproved'] = LeaveApplication::where([
                ['status','=', 1],['approved_by_manager','<>',NULL],['approved_by_hr','=',NULL]
            ])->with('user')->get();
        }
        else if(Auth::user()->role_id == 1){
            $data['leave_lists'] = LeaveApplication::where([
                ['status','=',1],  ['approved_by_manager','=', 1],
                ['approved_by_hr','=', 1]
            ])->with('user')->get();
            $data['leave_lists_unapproved'] = LeaveApplication::where([
                ['status', '=' ,1],
            ])->where(function($query) {
                $query->where('approved_by_manager','=',NULL)
                    ->orWhere('approved_by_hr','=',NULL);
            })->with('user')->get();

        }
        else{
            $data['leave_lists'] = LeaveApplication::where([
                ['status','=', 1] ,
                ['added_by','=',Auth::user()->user_id],
                ['approved_by_manager' ,'=',1],
                ['approved_by_hr' ,'=',1],
            ])->with('user')->get();
            $data['leave_lists_unapproved'] = LeaveApplication::where([
                ['status', '=' ,1],['added_by','=',Auth::user()->user_id]
            ])->where(function($query) {
                $query->where('approved_by_manager','=',NULL)
                    ->orWhere('approved_by_hr','=',NULL);
            })->with('user')->get();
        }


        return view('leave_application.leave_list' , $data);
    }
    Public function reject(Request $request)
    {
        if(Auth::user()->role_id ==2){
            $leave = LeaveApplication::where('leave_id', $request->id)->update([
                'approved_by_manager' => 2,
                'approved_by_hr' => 2,
            ]);
        }
        elseif (Auth::user()->role_id==5){
            $leave = LeaveApplication::where('leave_id', $request->id)->update([
                'approved_by_hr' => 2,
            ]);
        }
        $response['status'] = "Success";
        $response['result'] = "Application Rejected";
        return response()->json($response);
    }
    Public function approve(Request $request)
    {
        if(Auth::user()->role_id == 2){
            $leave = LeaveApplication::where('leave_id', $request->id)->update([
                'approved_by_manager' => 1,
            ]);
        }
        elseif (Auth::user()->role_id==5){
            $leave = LeaveApplication::where('leave_id', $request->id)->update([
                'approved_by_hr' => 1,
            ]);
        }
        $response['status'] = "Success";
        $response['result'] = "Application Accepted";
        return response()->json($response);
    }
//    public  function edit($id){
//        $data['page_title'] = "Atlantis BPO CRM - Call Disposition Form";
//        $data['leave_edit'] = LeaveApplication::where('id' , $id)->with(['LeaveType'])->get()[0];
//    }
}
