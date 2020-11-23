<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Expert;
use Carbon\Carbon;
use Carbon\Traits\Date;
use DateInterval;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Countries\Package\Countries;
use PragmaRX\Countries\Package\Services\Config;
use function Sodium\add;

class AppointmentsController extends Controller
{

    public function __construct() {
        $this->middleware('auth:api');
    }

    public function index(){

        $experts = Expert::all();
        $user_timezone = explode(" ",auth()->user()->Timezone);
        foreach ($experts as $expert){
            //TODO Convert start time from expert to user
            $date = new DateTime($expert->start_time,new DateTimeZone("UTC"));
            $expert->start_time = $date->setTimezone(new DateTimeZone($user_timezone[0]))->format('H:i:s A');

            //TODO Convert end time from expert to user
            $date1 = new DateTime( $expert->end_time ,new DateTimeZone("UTC"));
            $expert->end_time =$date1->setTimezone(new DateTimeZone($user_timezone[0]))->format('H:i:s A');
        }
        return response()->json($experts);
    }

    public function details($id){

        $expert = Expert::find($id);
        $user_timezone = explode(" ",auth()->user()->Timezone);
        //TODO Convert start time from expert to user
        $date = new DateTime( $expert->start_time ,  new DateTimeZone("UTC"));
        $expert->start_time = $date->setTimezone(new DateTimeZone($user_timezone[0]))->format('H:i:s');
        //TODO Convert end time from expert to user
        $date1 = new DateTime( $expert->end_time ,new DateTimeZone("UTC"));
        $expert->end_time =$date1->setTimezone(new DateTimeZone($user_timezone[0]))->format('H:i:s');
        return response()->json($expert);
    }

    public function appointment(Request $request , $id){
        $user_timezone = explode(" ",auth()->user()->Timezone);
        $expert = Expert::find($id);
        //TODO Convert start time from expert to user

        $start_date = new DateTime( $request->start_time ,new DateTimeZone($user_timezone[0]));


//        $temp1 = Date('Y-m-d H:i:s',strtotime($start_date,$request->Duration));
        $end_date =new DateTime( $request->start_time,new DateTimeZone($user_timezone[0]));
        $end_date->add(new DateInterval('PT' . $request->Duration . 'M'));
        $end_date->setTimezone(new DateTimeZone("UTC"));
        $start_date->setTimezone(new DateTimeZone("UTC"));
        $appointment = Appointment::create([
            'start_date'=>$start_date,
            'end_date'=>$end_date,
            'duration'=>$request->Duration,
            'user_id'=>auth()->user()->id,
            'expert_id'=>$expert->id


        ]);
        return response()->json([
            'status'=> 201,
            'appointment'=>$appointment
        ]);
    }
}
