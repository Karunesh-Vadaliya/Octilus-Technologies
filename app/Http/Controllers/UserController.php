<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\UserDetail;
use App\Models\UserAddress;
use App\Models\UserLog;
use Exception;
use Jenssegers\Agent\Facades\Agent;

class UserController extends Controller
{
    public function userUnique(Request $request){
        $fn = $request->fieldName;
        if(UserDetail::where($request->fieldName, $request->$fn)->first()){
            return response()->json(false);
        } else {
            return response()->json(true);
        }
    }
    public function saveUserDetails(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'lstDobDay' => 'required',
            'lstDobMonth' => 'required',
            'lstDobYear' => 'required',
            'email' => 'required|email|unique:user_details,email',
            'phone' => 'required|unique:user_details,phone',
        ]);
   
        if($validator->fails()){
            return redirect()->back()->with('fail', implode(",",$validator->errors()->all()));
        }

        $data = $request->All();
        $UserDetail = new UserDetail();
        $UserDetail->first_name = $data['first_name'];
        $UserDetail->last_name = $data['last_name'];
        $UserDetail->dob = $data['lstDobYear']."-".$data['lstDobMonth']."-".$data['lstDobDay'];
        $UserDetail->email = $data['email'];
        $UserDetail->phone = $data['phone'];
        $UserDetail->save();

        return redirect()->action([UserController::class, 'getUserDetails'], ['id' => $UserDetail->id]);
    }

    public function getUserDetails(Request $request, $id){
        $userLog = new UserLog();
        $userLog->user_details_id = $id;
        $userLog->ip_address = $request->ip();
        $userLog->device_type = Agent::isPhone()? 'Phone' : (Agent::isTablet()? "Tablet": "Desktop");
        $userLog->browser = Agent::browser();
        $userLog->user_agent = $_SERVER['HTTP_USER_AGENT'];
        $userLog->save();

        $user = UserDetail::find($id);
        if($user){
            return view('previoud_address',['data' => $user]);
        }
        return redirect('/');
    }

    public function saveUserAddresses(Request $request){
        $validator = Validator::make($request->all(), [
            'line1.*' => 'required',
            'line2.*' => 'required',
            'line3.*' => 'required',
            'record_id' => 'required',
        ]);
   
        if($validator->fails()){
            return redirect()->back()->with('fail', implode(",",$validator->errors()->all()));
        }

        $data = $request->All();
        $insertArray = [];
        foreach($data['line1'] AS $key => $value){
            array_push($insertArray,
                [
                    'user_details_id'=>$data['record_id'],
                    'line1' => $value,
                    'line2' => $data['line2'][$key],
                    'line3' => $data['line3'][$key],
                ]
            );
        }
        try{
            UserAddress::insert($insertArray);
        }catch(Exception $exception){
            return redirect()->back()->with('fail', $exception->getMessage());
        }
        return redirect('thank-you');
    }
}
