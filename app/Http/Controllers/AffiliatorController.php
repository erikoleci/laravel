<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;
use App\ImportCsv;
use App\Imports\CsvImport;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Button;

class AffiliatorController extends Controller
{
    
    public function index()
    {
        if (logged_in()) {

            return redirect(get_guard().'/');

        }
        else {
            return view('auth.login_affiliator');
        }
    }



    public function index_guard(){
        
        if (logged_in()) {
            return view('admin.users');
        }

        else {
            return view('auth.login_affiliator');
        }
    }



    //---------------------------------------------------------------------------- LEADS -------------------------------------------------------------------------------------------------



    public function leads()
    {
        
        $statuses = Status::whereNotNull('id')->get();
        return view('affiliator.leads')->with(['statuses'=>$statuses]);

    }

    public function getLeads(Request $request)
    {

        $user = ImportCsv::where('leads.affiliator', logged_in()->name)->orderBy('created_at','desc'); 


        if (!empty($request->get('status'))) {
            $user = $user->where('status_id','LIKE',"%{$request->status}%");
        }

        if (!empty($request->get('name'))) {
            $user = $user->where('name','LIKE',"%{$request->name}%");
        }

        if (!empty($request->get('source'))) {
            $user = $user->where('source','LIKE',"%{$request->source}%");
        }



        return Datatables::of($user)


        ->addIndexColumn()


        ->addColumn('name', function ($user) {
          $btn = '<a href="'.url('affiliator/lead_profile/'.$user->id).'">' . $user->name . '</a>';
          return $btn;

        })


        ->addColumn('status', function ($user) {
          $btn = ''.$user->status->status.'';
          return $btn;
        })


        ->rawColumns(['name'])
        ->make();

    }



//--------------------------------------------------------------------------- LEADS END --------------------------------------------------------------------------------------------------------





    public function lead_profile($id)
    {
    
    $user=ImportCsv::findOrFail($id);

    $statuses=Status::all();


    return view('affiliator.lead_profile')->with(['user'=>$user,'statuses'=>$statuses]);

    }


    public function createlead(Request $request){

        $user= new ImportCsv;
        $user->name=$request['name'];
        $user->phone=$request['phone'];
        $user->email=$request['email'];
        $user->promo_code=$request['promo_code'];
        $user->affiliator=$request['affiliator'];
        $user->source=$request['source'];
        $user->save();
    }



}
