<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class EmployeeController extends Controller
{
    public function index()
    {

        $data = array
		(
			'title' => 'Show List Employee',
		);
        return View::make('employee/index',$data);
    }

    public function table()
    {

        $data = array
		(
			'query' => Employee::orderBy('id', 'desc')->get(),
		);
        return View::make('employee/table',$data);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'dob' => 'required',
            'status' => 'required',
            'join_date' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validasi error',
                'result' => $validator->errors()
            ]);
        }

        $data = Employee::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'success',
            'result' => $data
        ]);
    }

    public function read($id)
    {
        $result = Employee::where('id', '=', $id)->first();
        if (isset($result->id)) {
            return response()->json([
                'status' => true,
                'message' => 'success',
                'result' => $result
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'failed'
            ]);
        }
    }

    public function readDetail($id)
    {
        $result = EmployeeDetail::where('employee_id', '=', $id)->first();
        if (isset($result->id)) {
            return response()->json([
                'status' => true,
                'message' => 'success',
                'result' => $result
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'failed'
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'dob' => 'required',
            'status' => 'required',
            'join_date' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validasi error',
                'result' => $validator->errors()
            ]);
        }

        $getdata = Employee::where('id', '=', $id);
        if ($getdata->firstOrFail() != null) {

            $update = $getdata->update($request->except(['_token']));

            if ($update) {
                return response()->json([
                    'status' => true,
                    'message' => 'success'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'failed'
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'notfound'
            ]);
        }
    }

    public function updateDetail(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'experience' => 'required',
            'job_title' => 'required',
            'job_desc' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validasi error',
                'result' => $validator->errors()
            ]);
        }

        $data = EmployeeDetail::first();
        if(is_null($data)) {
            $data = new EmployeeDetail($request->except(['_token']));
            $data->save();
        } else {
            $data->update($request->except(['_token']));
        }

        return response()->json([
            'status' => true,
            'message' => 'success',
            'result' => $data
        ]);
    }

    public function delete($id)
    {
        $getdata = Employee::where('id', '=', $id);
        if ($getdata->firstOrFail() != null) {
            $getdata->delete();
            return response()->json([
                'status' => true,
                'message' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'failed'
            ]);
        }
    }
}
