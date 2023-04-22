<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserDetail;
use App\Models\UserList;
use Illuminate\Support\Carbon;

class APIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_list = UserList::with('getUser')->get();

        return response(['user_list' => $user_list]);
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
        

        // dd($request->all());
        $request->validate([
            'name'    => 'required | alpha',
            'email'   => 'required|email|unique:user_list',
            'number'  => 'required | min:10',
            'date'    => 'required',
            'address' => 'required',
            'gender'  => 'required'
        ]);

        $user_list = new UserList();
        $user_list->name    = $request->name;
        $user_list->email   = $request->email;
        $user_list->number  = $request->number;
        $user_list->date    = $request->date;
        $user_list->name    = $request->name;
        $user_list->save();

        $user_id = $user_list->id;

        $user_details = UserDetail::create([
            'user_id' => $user_id,
            'address' => $request->address,
            'gender'  => $request->gender,
        ]);
         return response(['user_list' => $user_list,'user_detials' => $user_details]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id = UserList::find($id);
        $user_details = UserDetail::where('user_id',$id)->get();

        return response(['single_user' => $user_id,'single_details' =>  $user_details]);
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
        
        // dd($request->all());
        $request->validate([
            'name'    => 'required | alpha',
            'email'   => 'required|email',
            'number'  => 'required',
            'date'    => 'required',
            'address' => 'required',
            'gender'  => 'required'
        ]);

    
        $user_list = UserList::find($id);
        $user_list->name    = $request->name;
        $user_list->email   = $request->email;
        $user_list->number  = $request->number;
        $user_list->date    = $request->date;
        $user_list->update();

        $user_details = UserDetail::where('user_id',$id)->first();
        $user_details->address = $request->address;
        $user_details->gender  = $request->gender;
        $user_details->update();

        return response(['user_list' => $user_list,'user_detaiils' => $user_details]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_delete = UserList::find($id);
        if($user_delete){
            $user_details_del = UserDetail::where('user_id',$id)->first();
            $user_delete->delete();
            $user_details_del->delete();
        }
        return response(['user_delete_details' => $user_delete,'success' => 'User delete successfully']);
    }
    public function date_filter(Request $request)
    {
        // dd($request->all());
       

        // $request->validate([
        //     'start_date' => 'required',
        //     'end_date'   => 'required',
        // ]);
        $start_date = Carbon::parse($request->start_date);
        $end_date = Carbon::parse($request->end_date);
        // dd($end_date->format('Y-m-d'));

        $filter_user_date = UserList::whereDate('date','<=',$end_date->format('Y-m-d'))
        ->whereDate('date','>=',$start_date->format('Y-m-d'))->get();

        return response($filter_user_date);
        // $date_filter = UserList


    }
}
