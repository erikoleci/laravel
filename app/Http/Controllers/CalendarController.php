<?php

namespace App\Http\Controllers;

use App\Calendar;
use App\ImportCsv;
use App\User;
use App\Agents;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */





    public function store(Request $request)
    {

        $calendar = new Calendar;
        $calendar->user_id=logged_in()->id;
        $calendar->client_id=$request['client_id'];
        $calendar->event_comment=$request['event_comment'];
        $calendar->title=$request['title'];
        $calendar->start=$request['start'];
        $calendar->priority=$request['priority'];
        $calendar->status=$request['status'];
        $calendar->real_user=$request['real_user'];
        $calendar->save();


        if ($request['real_user']) {
            User::where('id', $request['client_id'])->update(['updated_at'=>Carbon::now()]);
        }
        else{
            ImportCsv::where('id', $request['client_id'])->update(['updated_at'=>Carbon::now()]);
        }

    }


    public function add_user_event(Request $request)
    {
        //
//        return response()->json($request->all());
        $calendar = new Calendar;
        $calendar->user_id=$request['user_id'];
        $calendar->client_id=$request['client_id'];
        $calendar->event_comment=$request['event_comment'];
        $calendar->title=$request['title'];
        $calendar->start=$request['start'];
        $calendar->priority=$request['priority'];
        $calendar->status=$request['status'];
        $calendar->save();
        return redirect()->back();
    }


    public function delete_event(Request $request)
    {
        //
//        return response()->json($request->all());
        $calendar = Calendar::where('id',$request['id'])->delete();
    }


    public function get_event(Request $request)
    {
        //
//        return response()->json($request->all());
        $calendar = Calendar::where('id',$request['id'])->get();
        return $calendar;
//        return response()->json($calendar);
    }


    public function get_event_json(Request $request)
    {
        //
//        return response()->json($request->all());
        $calendar = Calendar::where('id',$request['id'])->get();
//        return $calendar;
        return response()->json($calendar);
    }




    public function update_event(Request $request)
    {

        $calendar = Calendar::where('id', $request['id'])->update([
            'event_comment'=>$request['event_comment'] , 'start'=>$request['start'], 'priority'=>$request['priority'], 'status'=>$request['status'] ]);
    }


    public function set_seen_event(Request $request)
    {

        $calendar = Calendar::where('id', $request['id'])->update([
            'seen'=>1]);

    }


    public function set_event_completed(Request $request)
    {

        $calendar = Calendar::where('id', $request['id'])->update([
            'seen'=>1, 'status'=>'completed']);

    }


    public function get_user_events(Request $request){

        $events=Calendar::where('user_id', logged_in()->id)->get();
        return response()->json($events);
    }


    public function get_all_events(Request $request){



        if(logged_in()->account_id === 'admin'){

            $events=Calendar::whereNotNull('id')->get();
            if (!empty($request->get('title'))) {
                $user = $user->where('title','LIKE',"%{$request->title}%");
            }
            return response()->json($events);
            
         }
    
    
            if(logged_in()->account_id === 'officemanager'){
            $events = Calendar::whereNotNull('client_id')->join('users', 'calendar.user_id', '=', 'users.id')->where('users.promo_code', logged_in()->promo_code)->get();
            if (!empty($request->get('title'))) {
            $user = $user->where('title','LIKE',"%{$request->title}%");
        }
    }

        if(logged_in()->account_id === 'teamleader'){
            $mng=Agents::where('account_id','manager')->where('teamleader', logged_in()->id)->select('id');
            $events = Calendar::whereNotNull('client_id')->join('users', 'calendar.client_id', '=', 'users.id')->whereIn('users.manager', $mng)->get();
            if (!empty($request->get('title'))) {
            $user = $user->where('title','LIKE',"%{$request->title}%");
        }
    }


        if(logged_in()->account_id === 'caposala'){

            $mng = Agents::where('account_id', 'manager')->where('departament',logged_in()->departament)->where('promo_code',logged_in()->promo_code)->whereIn('manager_desk', logged_in()->desk)->select('id');
            $events = Calendar::whereNotNull('client_id')->join('users', 'calendar.client_id', '=', 'users.id')->whereIn('users.manager', $mng)->get();
            if (!empty($request->get('title'))) {
            $user = $user->where('title','LIKE',"%{$request->title}%");
        }
    }
        
            return response()->json($events);

            }




    public function get_reminder(Request $request){
        $now=Carbon::now()->addHour(2);
        $events=Calendar::where('user_id', logged_in()->id)->where('seen', 0)->where('start', '<', $now)->get();
        return response()->json($events);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
