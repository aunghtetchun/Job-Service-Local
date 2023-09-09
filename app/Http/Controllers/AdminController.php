<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function workerList()
    {
        $workers=User::where('role','worker')->where('count','=',1)->get();
        return view('admin.worker-list',compact('workers'));
    }
    public function showWorker(Request $request){
        $worker=User::where('role','worker')->where('id',$request->id)->first();
        return view('admin.show-worker',compact('worker'));
    }
    public function groupWorkerList()
    {
        $workers=User::where('role','worker')->where('count','>',1)->get();
        return view('admin.group-worker-list',compact('workers'));
    }

    public function banWorker(){
        //
    }

    public function userList()
    {
        $workers=User::where('role','user')->get();
        return view('admin.user-list',compact('workers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
