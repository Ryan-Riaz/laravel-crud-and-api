<?php

namespace App\Http\Controllers;

use App\Models\Student;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $show_data = Student::all();
        // $show_data = Student::paginate(5);
        $show_data = Student::simplePaginate(5);

        return view('index', compact('show_data'));
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
        $rules = [
            'name' => 'required|max:10',
            'email' => 'required|email',
        ];

        $custom_message = [
            'name.required' => 'Please enter your name!',
            'name.max' => 'Your name can not be more than 10 characters',
            'email.required' => 'Please enter your email address!',
            'email.email' => 'Please provide a valid email',
        ];

        $this->validate($request, $rules, $custom_message);

        $store_data = new Student();
        $store_data->name = $request->name;
        $store_data->email = $request->email;
        $store_data->save();

        Session::flash('msg', 'Your Data saved Successfully');


        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view("add_data");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_data = Student::find($id);
        return view('edit_data', compact('edit_data'));
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
        $rules = [
            'name' => 'required|max:10',
            'email' => 'required|email',
        ];

        $custom_message = [
            'name.required' => 'Please enter your name!',
            'name.max' => 'Your name can not be more than 10 characters',
            'email.required' => 'Please enter your email address!',
            'email.email' => 'Please provide a valid email',
        ];

        $this->validate($request, $rules, $custom_message);

        $store_data =  Student::find($id);
        $store_data->name = $request->name;
        $store_data->email = $request->email;
        $store_data->save();

        Session::flash('msg', 'Your Data Updated Successfully');

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_data = Student::find($id);
        $delete_data->delete();

        Session::flash('msg', 'Your Data Deleted Successfully');

        return redirect('/');
    }
}
