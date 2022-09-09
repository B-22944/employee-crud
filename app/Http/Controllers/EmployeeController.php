<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
//using Employee Model
use App\Models\Employee;
use App\Http\Requests\FormRequests;
use App\Http\Requests\LoginRequests;
use App\Http\Requests\UpdateRequests;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Hash;
Use Session;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // $data = Employee::paginate(4);
        // return view('index', ['employees'=>$data]);
        $data = Employee::paginate(7);
        //$data = [];
        return view('employeeCrud.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('employeeCrud.form');   
    }

    Public function viewLogin(){
        return view('login');
    }
    
    public function viewAbout(){
        return view('employeeCrud.about');
    }

    public function viewSearch(){
        return view('employeeCrud.search');
    }

    public function searchEmployee(Request $request){
        if (isset($_GET['query'])) {
            $search_employee = $_GET['query'];
            $employees = DB::table('employees')
                ->where('name','LIKE','%'.$search_employee.'%')
                ->orWhere('age','=',$search_employee)->paginate(9);
            $employees->appends($request->all());    
            return view('employeeCrud.search',compact('employees'));
        } else {
            return redirect(route('index'));
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormRequests $request)
    { 
        try {
        $data = new Employee;
        $data->name=$request->name;
        $data->age=$request->age;
        $data->designation=$request->designation;
       
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/employees/',$filename);
            $data->image = $filename;
        }
        $data->gender=$request->gender;
        $data->cgpa=$request->cgpa;
        $data->city=$request->city;
        $data->address=$request->address;
        $data->email=$request->email;
        $data->password=Hash::make($request->password);
        $data->save();

        return redirect(route('index'))->with('status','Employee Added Succesfully');
    } 
        catch(\Exception $e){
            return redirect(route('index'))->with('status','Something Went Wrong');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Getting data with the id
        $employee = Employee::find($id);
        return view('employeeCrud.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequests $request)
    {
        try{
        //requesting id's data to be updated   
        $data = Employee::find($request->id);
        $data->name=$request->name;
        $data->age=$request->age;
        $data->designation=$request->designation;

        if($request->hasfile('image')){

            //checking  the file destination
            $destination = 'uploads/employees/'.$data->image;
            if (File::exists($destination)) 
            {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/employees/',$filename);
            $data->image = $filename;
        }
        $data->gender=$request->gender;
        $data->cgpa=$request->cgpa;
        $data->city=$request->city;
        $data->address=$request->address;
        $data->email=$request->email;
        $data->save();
            return redirect(route('index'))->with('status','Updated Succesfully');
        }
        catch(\Exception $e){
            return redirect(route('index'))->with('status','Something Went Wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Destroy the data on the id
        $data = Employee::find($id);
        $data->delete();
        return redirect(route('index'))->with('status','Delete: '.$data->name.' is removed');;
    }

    public function loginEmployee(LoginRequests $request){
       
        $employee = Employee::where('email','=',$request->email)->first();

        if ($employee) {
            if (Hash::check($request->password, $employee->password)) {
                $request->session()->put("loginId", $employee->id);
                return redirect(route('index'))->with("name",$employee->name);
        }
            else {
                return redirect(route('login'))->with('status','Wrong Password');
            }
       } 
       else {
            return redirect(route('login'))->with('status','Email is Not registered');
       }
    }

    public function index(){
        $data = array();
        if(Session::has('loginId')){
            $data = Employee::where('id','=',Session::get('loginId'))->first();
        }
        return view('employeeCrud.index',compact('data'));
    }

    public function logout(){
        if (Session::has('loginId')) {
            Session::pull('loginId'); 
            return redirect(Route('login'));
         }
    }
}