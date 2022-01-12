<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use App\Models\ShiftUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use Mockery\Exception;
use DB;

class ShiftController extends Controller
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

    public function shift()
    {
        $data['page_title'] = "Atlantis BPO CRM - Shift Form";
        $data['agents'] = User::doesnthave('shift')->doesnthave('team_member')->whereNotIn('role_id', [1, 2, 3])->where('status', 1)->get();

        return view('shift.shift_form' , $data);
    }

    public function save_shift(Request $request)
    {
        $ids = explode(",",$request->user_ids);
        $validator = Validator::make($request->all(),[
            'title'=> 'required',
            'check_in'=>'required',
            'check_out'=> 'required',
//            'user_ids'=> 'required',
        ]);

        if($validator->passes()) {
            DB::beginTransaction();
            try{
                $shift = Shift::updateOrCreate([
                    'shift_id' => $request->shift_id,
                ], [
                    'title' => $request->title,
                    'check_in' => $request->check_in,
                    'check_out' => $request->check_out,
                    'added_by' => Auth::user()->user_id,
                ]);
                ShiftUser::where('shift_id',$shift->shift_id)->delete();
                if($request->user_ids != null){
                    foreach ($ids as $id) {
                        $shift_user = new ShiftUser;
                        $shift_user->shift_id = $shift->shift_id;
                        $shift_user->user_id = $id;
                        $shift_user->added_by = Auth::user()->user_id;
                        $shift_user->save();
                    }
                }
                DB::commit();
            } catch(Exception $ex) {
                DB::rollback();
            }
            $response['status'] = "Success";
            $response['result'] = "Saved Successfully";
        }
        else {
            $response['status'] = "Failure!";
            $response['result'] = $validator->errors()->toJson();
        }

        return response()->json($response);
    }

    public function shift_list()
    {
        $data['page_title'] = "Atlantis BPO CRM - Shift List";
        $data['shifts'] = Shift::with('manager')->orderBy('shift_id', 'desc')->get();

        return view('shift.shift_list' , $data);
    }

    public function show(Request $request)
    {
        $data['shift_data'] = Shift::where([
            'shift_id' => $request->shift_id,
        ])->with('manager', 'shiftUsers.user', 'shift_teams.team_member')->first();
        return view('shift.shift_single', $data);
    }

    public function edit($id)
    {
        $data['page_title'] = "Atlantis BPO CRM - Shift Edit Form";
        $data['shift_edit'] = Shift::where('shift_id' , $id)->with('manager', 'shiftUsers.user')->get()[0];
        $data['agents'] = User::doesnthave('shift')->doesnthave('team_member')->where('role_id', '!=', 1)->where('status', 1)->get();

        return view('shift.shift_edit' , $data);
    }

    public function shift_delete(Request $request)
    {
        ShiftUser::where('shift_id', $request->id)->delete();
        Shift::find($request->id)->delete();
        $response['status'] = "Success";
        $response['result'] = "Deleted Successfully";
        return response()->json($response);
    }
}
