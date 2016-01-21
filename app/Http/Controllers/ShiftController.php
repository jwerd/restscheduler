<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Shift;
use Auth;

class ShiftController extends ApiController
{
   /**
    * Display a listing of the resource.
    *
    * @return Response
    */
   public function index() {
       $auth = Auth::user();
       // Check role for proper lookup
       // Employee can only see his own shifts
       // Manager can see all shifts created by them
       $lookup_type = ($auth->role ==  'employee') ? 'byEmployee' : 'byManager';
       // Employee's see manager contact info, manager's see employee contact info.
       $with_type   = ($auth->role ==  'employee') ? 'manager' : 'employee';

       $shifts = \App\Shift::{$lookup_type}()->with($with_type)->get();

       if(empty($shifts)) {
           return $this->setStatusCode(404)->setError('User has no shifts');
       }

       return response()->json($shifts);
   }
   /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
   public function store(Request $request) {
       // Only managers can create new shifts
       if(Auth::user()->role == "manager") {
            // These need better validation but for times sake, this will prevent some bad data (not all)
            $validator = Validator::make($request->all(), [
                'employee_id' => 'required',
                'start_time' => 'required|min:1',
                'end_time' => 'required|min:1',
            ]);

            if ($validator->fails()) {
                return $this->setStatusCode('400')->setError('Missing data to create a new shift resource');
            }
            $shift = new \App\Shift;
            $shift->employee_id = $request->employee_id;
            $shift->manager_id  = Auth::user()->id;
            $shift->start_time  = $request->start_time;
            $shift->end_time    = $request->end_time;
            if(!$shift->save()) {
                return $this->setStatusCode(500)->setError('An error occured');
            }
            // Everything checks out...
            return $this->setStatusCode(200)->setSuccess('success');
       } else // For readability sake, even though we will always return
            return $this->setStatusCode(403)->setError('Unauthorized Access');
   }

   /**
   * Update a resource in storage
   * @return Response
   */
   public function update($id, Request $request) {
       // Only managers can update shifts
       if(Auth::user()->role == "manager") {
           //var_dump($request->all());
           /*$validator = Validator::make($request->all(), [
               'id' => 'required',
           ]);

           if ($validator->fails()) {
               return $this->setStatusCode('400')->setError('Missing data to update shift resource');
           }*/

           $shift = Shift::findOrFail($id);
           if(!$shift) {
               return $this->setStatusCode(404)->setError('Shift resource #'.$request->id.' not found');
           }

           // What changed in the passed in data
           if($shift->start_time != $request->start_time) {
               $shift->start_time = $request->start_time;
           }
           if($shift->end_time != $request->end_time) {
               $shift->end_time = $request->end_time;
           }
           if($shift->employee_id != $request->employee_id) {
               $shift->employee_id = $request->employee_id;
           }
           if($shift->save()) {
               return $this->setStatusCode(200)->setSuccess('success');
           }
       } else // For readability sake, even though we will always return
            return $this->setStatusCode(403)->setError('Unauthorized Access');
   }
}
