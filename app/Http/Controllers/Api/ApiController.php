<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Prescription;
use App\Models\Scirptdetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ApiController extends Controller
{

        public function create(Request $request) {
            if ( User::where('email','=',$request->email)->exists() ){
                //email has been used
                return response()->json(['status'=>401],401);
            }
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = \Hash::make($request->password);
            $user->is_doctor = false;
            $user->cellphone = $request->cellphone;
            $SavetoUser = $user->save();
            if( $SavetoUser ){
                $user->sendEmailVerificationNotification();//寄送Email驗證,手動驗證
                return response()->json(['status'=>201],201);
            }
            return response()->json(['status'=>"Bad Request"],400);
        }
    /*
            * 代號:
            * 400 - 註冊/登入請求不受理 *
            * 401 - 郵件未驗證
            * 403 - 不合法存取
            * 201 - 登入成功 -> 進入主畫面
            * 202 - 登出成功 -> 返回開始畫面，重新登入
            * 203 - 更新手機資料庫
            * 204 - 註冊成功
            * dd($data[0]->id);
            * dd(count($data));
            * */
        public function check(Request $request)
        {
            $ccreds = $request->only('email','password');
            if( Auth::guard('web')->attempt($ccreds) ){
                $user = Auth::user();
                if(is_null($user->email_verified_at)){
                    return response()->json(['status'=>"Email not verified"],401);
                }
                $response = [
                    'id'=>$user->id,
                    'name'=>$user->name,
                    'email'=>$user->email,
                    'cellphone'=>$user->cellphone,
                    'token'=>$user->api_token,
                    'status'=>"ok",
                ];
                return response()->json([
                    'user'=>$response ],201);
            }else{
                return response()->json(['status'=>400],400);
            }
//            return 'data has been sent';
        }
        public function logout() {
            Auth::guard('web')->logout();
            return response()->json(['status'=>202],202);
        }

    public function getDataForm() {
        if(Auth::check()){
            $time=  Carbon::now('Asia/Taipei');
            DB::table('prescriptions')
                ->where('expired_date','<',$time)
                ->delete();
            $user = Auth::id();
            $data = Prescription::where('patient_id','=',$user)->get();
            $details = Scirptdetail::where('patient_id','=',$user)->get();

            $response = [
                'data'=>$data,
                'detail'=>$details
            ];
            return response()->json($response,203);
        }
        return response()->json(['status'=>403],403);
    }

}


