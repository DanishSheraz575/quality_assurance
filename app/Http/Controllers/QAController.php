<?php
namespace App\Http\Controllers;
use App\Models\CallDisposition;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\QualityAssurance;
use App\Models\User;
use App\Models\CallType;
use ZipArchive;

class QAController extends Controller
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
    public function form(){
        $data['page_title'] = "QA From - Atlantis BPO CRM";
        $data['agents'] = User::whereIn('role_id', [1,2,3,4,22] )->where('status', 1)->get();
        $data['call_types'] = CallType::get();
        return view('qa.qa_form' , $data);
    }
    public function list()
    {
        $data['page_title'] = "QA List - Atlantis BPO CRM";
        $data['small_nav'] = true;
        $data['qa_lists'] = QualityAssurance::where([
            'status'=> 1,
            ])->with(['agent','call_type','qa_status'])->get();
        return view('qa.qa_list', $data);
    }
    public function show(Request $request)
    {
        $data['qa_data'] = QualityAssurance::where([
            'qa_id' => $request->qa_id,
        ])->with(['agent', 'call_type', 'qa_done_by'])->first();
        return view('qa.qa_single', $data);
    }
    public function save(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'rep_name'=> 'required',
                'call_type'=> 'required',
                'call_number'=> 'required',
                'greetings_correct' => 'required',
                'greetings_assurity_statement'=> 'required',
                'customer_name_call' => 'required',
                'listening_skills' => 'required',
                'courtesy_please' => 'required',
                'courtesy_thank_you' => 'required',
                'courtesy_interest' => 'required',
                'courtesy_empathy' => 'required',
                'courtesy_Apologized' => 'required',
                'equipment_system' => 'required',
                'soft_skills_energy' => 'required',
                'soft_skill_avoided_silence' => 'required',
                'soft_skill_polite' => 'required',
                'soft_skill_grammar' => 'required',
                'soft_skill_refrained_company' => 'required',
                'soft_skill_positive_words' => 'required',
                'using_hold_informed_customer' => 'required',
                'using_hold_touch' => 'required',
                'using_hold_thanked' => 'required',
                'connecting_calls_department' => 'required',
                'connecting_calls_customer' => 'required',
                'closing_recap' => 'required',
                'clossing_assistance' => 'required',
                'automatic_fail_misquoting' => 'required',
                'automatic_fail_disconnected' => 'required',
                'automatic_fail_answer' => 'required',
                'automatic_fail_repeating_details' => 'required',
                'automatic_fail_changing_details' => 'required',
                'automatic_fail_fabricating' => 'required',
                'additional_comment' => 'required',
        ]);
        if($validator->passes()) {
            $qa_form_data = [
                'agent_id'	=> $request->rep_name,
                'call_type_id'=> $request->call_type,
                'call_number'=>$request->call_number,
                'greetings_correct'=>$request->greetings_correct,
                'greetings_assurity_statement'=>$request->greetings_assurity_statement,
                'greetings_comment'=>$request->greetings_comment,
                'customer_name_call'=>$request->customer_name_call,
                'customer_comment'=>$request->customer_comment,
                'listening_skills'=>$request->listening_skills,
                'listening_comment' => $request->listening_comment,
                'courtesy_please'=> $request->courtesy_please,
                'courtesy_thank_you'=>$request->courtesy_thank_you,
                'courtesy_interest'=>$request->courtesy_interest,
                'courtesy_empathy'=>$request->courtesy_empathy,
                'courtesy_Apologized'=>$request->courtesy_Apologized,
                'courtesy_comment'=>$request->courtesy_comment,
                'equipment_system'=>$request->equipment_system,
                'equipment_comment'=>$request->equipment_comment,
                'soft_skills_energy'=>$request->soft_skills_energy,
                'soft_skill_avoided_silence'=>$request-> soft_skill_avoided_silence,
                'soft_skill_polite'=>$request->soft_skill_polite,
                'soft_skill_grammar'=>$request->soft_skill_grammar,
                'soft_skill_refrained_company'=> $request->soft_skill_refrained_company,
                'soft_skill_positive_words'=> $request->soft_skill_positive_words,
                'soft_skills_comment'=> $request->soft_skills_comment,
                'using_hold_informed_customer' => $request->using_hold_informed_customer,
                'using_hold_touch'=> $request->using_hold_touch,
                'using_hold_thanked' => $request->using_hold_thanked,
                'using_hold_comment'=> $request->using_hold_comment,
                'connecting_calls_department' => $request->connecting_calls_department,
                'connecting_calls_customer'=> $request->connecting_calls_customer,
                'connecting_calls_comment'=> $request->connecting_calls_comment,
                'closing_recap'=> $request->closing_recap,
                'clossing_assistance' => $request->clossing_assistance,
                'closing_comment' => $request->closing_comment,
                'automatic_fail_misquoting'=> $request->automatic_fail_misquoting,
                'automatic_fail_disconnected'=> $request->automatic_fail_disconnected,
                'automatic_fail_answer' => $request->automatic_fail_answer,
                'automatic_fail_repeating_details'=> $request->automatic_fail_repeating_details,
                'automatic_fail_changing_details' => $request->automatic_fail_changing_details,
                'automatic_fail_fabricating'=> $request->automatic_fail_fabricating,
                'automatic_fail_other' => $request->automatic_fail_other,
                'automatic_fail_comment'=> $request->automatic_fail_comment,
                'additional_comment' => $request->additional_comment,
                'yes_responses'=> $request->yes_responses,
                'no_responses' => $request->no_responses,
                'automatic_fail_response'=> $request->automatic_fail_response,
                'monitor_percentage' => $request->monitor_percentage,
                ];
            $files = [];
            if($request->hasfile('recording'))
            {
                $current = Carbon::now()->format('YmdHms');
                $i =1;
                foreach($request->file('recording') as $file)
                {
                    $name= $current.'_'.$i.'.'.$file->getClientOriginalExtension();
                    $file->move(public_path('recordings'), $name);
                    $files[] = $name;
                    $i++;
                }
            }
            if($request->qa_id){
                try {
                    $qa_record = QualityAssurance::where('qa_id', $request->qa_id)->pluck('recording')->first();
                    $old_files = explode(',', $qa_record);
                    $remaining_files =  explode(',', $request->attached_files);
                    $trashed_files = array_diff($old_files,$remaining_files);
                    foreach ($trashed_files as $trash){
                        if(File::exists(public_path('recordings/'.$trash))){
                            File::delete(public_path('recordings/'.$trash));
                        }
                    }
                    $recording = array_merge($files,$remaining_files);
                    $recording = implode(',',$recording);
                    $qa_form_data['recording'] = $recording;
                    $qa_form_data['modified_by'] = Auth::user()->user_id;
                    QualityAssurance::where('qa_id', $request->qa_id)->update($qa_form_data);
                    $response['status'] = 'success';
                    $response['result']= "Updated Successfully";
                } catch(Exception $e) {
                    $response['status'] = 'failure';
                    $response['result'] = "Unexpected Db Error";
                }
            }
            else{
                $qa_form_data['added_by'] = Auth::user()->user_id;
                $qa_form_data['recording'] = implode(',',$files);
                $qa_form_data['call_id'] = $request->call_id;
                if($request->call_date != null){
                    $qa_form_data['call_date'] = $request->call_date;
                }
                $call_id = QualityAssurance::select('call_id')->where([
                    'call_id' => $request->call_id,
                ])->get();
                if(count($call_id)>0){
                    $response['status'] = "Failure!";
                    $response['result'] = "Quality Assessment for this call already exist";
                } else {
                    QualityAssurance::create($qa_form_data);
                    $response['status'] = "Success";
                    $response['result'] = "Added Successfully";
                }
            }
        } else {
            $response['status'] = "Failure!";
            $response['result'] = $validator->errors()->toJson();
        }
        return response()->json($response);
    }
    public function edit($id)
    {
        $data['page_title'] = "QA Form - Atlantis BPO CRM";
        $data['qa_edit'] = QualityAssurance::where('qa_id' , $id)->with('agent' , 'call_type')->first();
        return view('qa.qa_edit' , $data);
    }
    public function qa_queue(){
        $data['page_title'] = "QA Queue - Atlantis BPO CRM";
        $data['qa_queue'] = CallDisposition::where([
            'status' => 1,
            'disposition_type' => 1
        ])
            ->where('added_on','>', '2022-02-07')->with(['user','call_disposition_types','call_dispositions_services'])->doesntHave('qa_assessment')->whereRaw("date(added_on)>='2021-11-29 17:00:00'")->get();
        $data['qa_done'] = QualityAssurance::where([
            'status'=> 1,
            'call_type_id' => 1
        ])
            ->where('added_on','>', '2022-02-07')->with(['agent','call_type','qa_status','call_disposition','call_disposition.call_dispositions_services', 'qa_done_by'])->whereRaw("date(added_on)>='2021-11-29 17:00:00'")->get();
        return view('qa.qa_list' , $data);
    }
    public function qa_add($id){
        $data['page_title'] = "QA Form - Atlantis BPO CRM";
        $data['qa_data'] = CallDisposition::where([
            'call_id'=> $id,
            'status'=> 1,
        ])->with(['call_disposition_types','user'])->get()[0];
        $data['agents'] = User::where([
            'role_id'=> 4,
            'status'=> 1,
        ])->get();
        $data['call_types'] = CallType::get();
        return view('qa.qa_form' , $data);
    }
    public function show_single_qa(Request $request)
    {
        $data['qa_data'] = QualityAssurance::where([
            'qa_id' => $request->qa_id,
        ])->with(['agent', 'call_type','call_disposition'])->get()[0];
        return view('qa.qa_single_report' , $data);
    }

    public function rec_download($rec)
    {
        if($rec) {

            if(File::exists(public_path('temporary_zip/Recordings.zip'))) {
                File::delete(public_path('temporary_zip/Recordings.zip'));
            }
            $zip = new ZipArchive;
            $fileName = 'Recordings.zip';
            if ($zip->open(public_path('temporary_zip/'.$fileName), ZipArchive::CREATE) === TRUE) {
                $files = explode(',',$rec);
//                $files = File::files(public_path('uploads/file'));
                foreach ($files as $recording) {
                    $relativeName = File::files(public_path('recordings/'));
                    $zip->addFile(public_path('recordings/'.$recording), $recording);
                }
                $zip->close();
            }
            return response()->download(public_path('temporary_zip/'.$fileName));
        }
    }




}
