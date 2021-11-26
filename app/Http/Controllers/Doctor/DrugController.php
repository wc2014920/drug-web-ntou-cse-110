<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;

use App\Models\Clinic_hospital;
use App\Models\Doctor;
use App\Models\Prescription;
use App\Models\Scirptdetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class DrugController extends Controller
{
    //Methods
    function drug_url_img($String){
        $drug_name_url = "http://drugtw.com/api/drugs?q=".$String;
        $data = Http::get($drug_name_url)->json('drug_table');
        $count = count($data);
        if ($count == 1){
            $data = Arr::get($data,'0');
//            dd($data['fig']);
            return $data['fig'];
        }
        return null;
    }
    //Functions
    public function ShowProfile(){ //顯示 Dcotor 帳戶個資
        $search = Clinic_hospital::where('clinic_id','=',Doctor::getClinicID())->first();
        $data = [
            'clinic_name' => $search->name,
            'clinic_address'=> $search->address,
            'clinic_phone'=> $search->phone
        ];
        return view('dashboard.user.profile',compact('data'));
    }

    public function create(Request $request){ //建立藥單
        $request->validate([
            'patient_name'=>'required',
            'patient_account'=>'required|exists:users,name',
            'doctor_name'=>'required',
            'drug_name.*'=>'required',
            'drug_code.*'=>'required',
            'day.*'=>'required',
            'drug_amount.*'=>'required',
            'morning.*'=>'numeric|in:1,2,3',
            'noon.*'=>'numeric|in:1,2,3',
            'night.*'=>'numeric|in:1,2,3',
            'sleep.*'=>'numeric|in:1,2',
        ]);
        $patient_name = $request->patient_name;$patient_account = $request->patient_account;$doctor_name = $request->doctor_name;$drug_name = $request->drug_name;$drug_code = $request->drug_code;$drug_day = $request->day;$drug_amount = $request->drug_amount;$morning = $request->morning;$noon = $request->noon;$night = $request->night;$sleep=$request->sleep;
        $clinic_id = Doctor::getClinicID();
        $clinic_details = Clinic_hospital::where('clinic_id','=',$clinic_id)->first();
        $patient_id = DB::table('users')->where('name',$patient_account)->value('id');
        $timenow = Carbon::now('Asia/Taipei');
        $expired = Carbon::now('Asia/Taipei');
        $expired = $expired->addDays(max($drug_day));
//        dd($timenow);
        $datasave = [ //存入 table : prescriptions
            'doctor_name'=>$doctor_name,
            'patient_name'=>$patient_name,
            'clinic'=>$clinic_details->name,
            'doctor_id'=>Auth::id(),
            'patient_id'=>$patient_id,
            'clinic_id'=>$clinic_id,
            'expired_date'=>$expired,
            'created_at' =>  $timenow,
            'updated_at' => $timenow,
        ];
        $SavetoPre=DB::table('prescriptions')->insert($datasave);
        if ($SavetoPre){ //存入 table : scriptdetails
            $last = DB::table('prescriptions')->orderBy('id', 'DESC')->first();
            for($i = 0; $i < count($drug_name); $i++) {
                $prescription = Prescription::find($last->id);
                $data = $this->drug_url_img($drug_name[$i+1]);
                $drug_pic_url = Arr::get($data,'0');
                $scirptdetail = new Scirptdetail;
                $scirptdetail->prescription_id = $last->id;
                $scirptdetail->patient_id = $patient_id;
                $scirptdetail->drug_name = $drug_name[$i+1];
                $scirptdetail->drug_pic_url = $drug_pic_url;
                $scirptdetail->drug_code = $drug_code[$i+1];
                $scirptdetail->drug_amount = $drug_amount[$i+1];
                $scirptdetail->day = $drug_day[$i+1];
                $scirptdetail->time_morning = $morning[$i+1];
                $scirptdetail->time_noon = $noon[$i+1];
                $scirptdetail->time_night = $night[$i+1];
                $scirptdetail->time_sleep = $sleep[$i+1];
                $scirptdetail->created_at = $timenow;
                $scirptdetail->updated_at = $timenow;
                $prescription = $prescription->scirptdetails()->save($scirptdetail);
                if(!$prescription){
                    return redirect()->back()->with('fail','Build Fail!!');
                }
            }
            return redirect()->back()->with('success','Build Success!! ');
        }
        return redirect()->back()->with('fail','Build Fail!!');
    }

    public function searchrescriptionresult(Request $request){
        if (!isset($request->searchitem)){
            return redirect()->action([DrugController::class,'showprescription']);
        }
        $searchword = $request->searchitem;
        $cc = \App\Models\User::where('name','=',$searchword)->get('id');
        if (count($cc)==0){
            $searchdata=[
                'updated_at'=>date($searchword),
                'created_at'=>date($searchword),
                'patient_name'=>$searchword,
            ];
        }else{
            $searchdata=[
                'updated_at'=>date($searchword),
                'created_at'=>date($searchword),
                'patient_name'=>$searchword,
                'patient_id'=>$cc[0]->id
            ];
        }
        return redirect()->action([DrugController::class,'showprescription'],['search'=>$searchdata]);

    }

    public function showprescription(Request $request){
        $user=Auth::id();
        $paginator=Prescription::where('doctor_id','=',$user)->paginate(5);
        if(isset($request->deletesuccess)){
            $deletesuccess = $request->deletesuccess;
            return view('dashboard.user.doctor.home',compact(['paginator','deletesuccess']));
        }elseif (isset($request->deletefail)){
            $deletefail = $request->deletefail;
            return view('dashboard.user.doctor.home',compact(['paginator','deletefail']));
        }elseif(isset($request->search)){
            $data_array = $request->search;
            if(count($data_array)==3){
                $paginator = Prescription::whereDate('updated_at','=',$data_array['updated_at'])
                    ->orWhereDate('created_at','=',$data_array['created_at'])
                    ->orWhere('patient_name','=',$data_array['patient_name'])
                    ->paginate(5);
            }else{
                $paginator = Prescription::whereDate('updated_at','=',$data_array['updated_at'])
                    ->orWhereDate('created_at','=',$data_array['created_at'])
                    ->orWhere('patient_name','=',$data_array['patient_name'])
                    ->orWhere('patient_id','=',$data_array['patient_id'])
                    ->paginate(5);
            }
            return view('dashboard.user.doctor.home',compact('paginator'));
        }else{
            return view('dashboard.user.doctor.home',compact('paginator'));
        }
    }

    public function showmyown(){
        $user=Auth::id();
        $paginator=Prescription::where('patient_id','=',$user)->paginate(5);
        return view('dashboard.user.home',compact('paginator'));
    }

    public function showmyowndetail(Request $request){
        $paginator=Scirptdetail::where('prescription_id','=',$request->id)->paginate(5);
        return view('dashboard.user.showmypredetails',compact('paginator'));
    }

    public function showeditprescription(Request $request){
        $request->validate([
            'id'=>'exists:prescriptions,id'
        ]);
        $prescriptions_id = $request->id;
        $scirptdetail = Prescription::find($prescriptions_id);
        $data = $scirptdetail->scirptdetails()->where('prescription_id','=',$prescriptions_id)->get();
        $search = Prescription::find($prescriptions_id)->first();
        $patient = DB::table('users')->where('id','=',$search->patient_id)->first();
        $patient = $patient->name;
        if(isset($request->fail)){
            return view('dashboard.function.doctor.editprescription',compact('data','search','patient','prescriptions_id'))
                ->with('fail',$request->fail);
        }elseif ($request->success){
            return view('dashboard.function.doctor.editprescription',compact('data','search','patient','prescriptions_id'))
                ->with('success',$request->success);
        }
        return view('dashboard.function.doctor.editprescription',compact('data','search','patient','prescriptions_id'));
    }

    public function editprescription(Request $request){
        $doctor_name = $request->doctor_name;$drug_name = $request->drug_name;$drug_code = $request->drug_code;$drug_day = $request->day;$drug_amount = $request->drug_amount;$morning = $request->morning;$noon = $request->noon;$night = $request->night;$sleep = $request->sleep;$prescriptions_id = $request->p_id;$scriptdetails_id = $request->id;
        for($i = 1; $i <= count($drug_name); $i++){
            $fail = '填寫的資訊有誤! 請仔細填寫!';
            if ($morning[$i] == 0 || $noon[$i] == 0 || $night[$i] == 0 || $sleep[$i] == 0 || $drug_day[$i] <= 0 || $drug_amount[$i] <= 0) {
                return redirect()->action([DrugController::class, 'showeditprescription'],['id'=>$prescriptions_id,'fail'=>$fail]);
            }
            $data = $this->drug_url_img($drug_name[$i]);
            if (!isset($data)){
                return redirect()->action([DrugController::class, 'showeditprescription'],['id'=>$prescriptions_id,'fail'=>$fail]);
            }
            $update = Scirptdetail::where('id','=',$scriptdetails_id[$i])->update(['drug_code'=>$drug_code[$i], 'drug_amount'=>$drug_amount[$i], 'day'=>$drug_day[$i], 'time_morning'=>$morning[$i], 'time_noon'=>$noon[$i], 'time_night'=>$night[$i], 'time_sleep'=>$sleep[$i], 'updated_at'=>Carbon::now('Asia/Taipei')]);
            if(!$update){
                return redirect()->action([DrugController::class, 'showeditprescription'],['id'=>$prescriptions_id,'fail'=>$fail]);
            }
        }
        $createdtime = Prescription::where('id','=',$prescriptions_id)->first();
        $createdtime = Carbon::createFromFormat('Y-m-d H:i:s',$createdtime->created_at);
        $expired = $createdtime->addDays(max($drug_day));
        //因為是Post 若是不符回上個Controller，則 Validate 類別( GET Method )就會失效，所以要手動檢驗(龜速...)
        $update = Prescription::where('id','=',$prescriptions_id)->update(['expired_date'=>$expired,'doctor_name'=>$doctor_name,'updated_at'=>Carbon::now()]);
        if($update){
            return redirect()->action([DrugController::class, 'showeditprescription'],['id'=>$prescriptions_id,'success'=>'全部更新成功!']);
        }
        return redirect()->action([DrugController::class, 'showeditprescription'],['id'=>$prescriptions_id,'fail'=>$fail]);
    }

    public function deleteprescription(Request $request){
        $request->validate([
            'id'=>'exists:prescriptions,id'
        ]);
        $check = Prescription::findOrFail($request->id)->delete();
        return redirect()->action([DrugController::class, 'showprescription'], ['deletesuccess'=>'Delete Successfully!']);
    }
}
