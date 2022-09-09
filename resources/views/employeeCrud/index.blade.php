<!-- Extending layout from layout folder -->
@extends('layouts.main')
@section('title','Employee Crud')

@section('content')

        @if(session('name'))
            <div class="mt-3 text-white">
                Welcome: {{session('name')}}
            </div>
        @endif
       <div class="container">
        <!-- It will open Employee Form -->
            <a href="{{ Route('addData') }}" class="btn btn-success mt-5">Add Employee</a>

        <!-- It will open Employee Search Form -->
            <a href="{{ Route('search') }}" class="btn btn-primary mt-5 ml-3">Search Employee</a>
        </div>
        <!-- Showing Status Message -->
        @if(session('status'))
            <div class="alert alert-success mt-3">
                {{session('status')}}
            </div>    
        @endif
    
        <!-- Table Start -->
        <div class="table-responsive mt-3 rounded">
            <table class="table table-striped table-light table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Gender</th>
                        <th scope="col">CGPA</th>
                        <th scope="col">City</th>
                        <th scope="col">Designation</th>
                        <th scope="col">Address</th>
                        <th scope="col">email</th>
                        <th scope="col">Operations</th>
                    </tr>
                </thead>
        <!-- Loop through data in Database table -->
        <!-- compact() will show data -->
                <?php $none = "N/A";  ?>
                
                <tbody>
                @if(count($data))    
                @foreach($data as $key=>$employee)
                    <tr>
                        <td>{{$key+1}}</td>
                        <!-- <td><img src="{{asset('uploads/employees/'.$employee->image)}}" alt="{{$employee->name}}" width="100px" height="100px"></td> -->
                        <td><img src="{{$employee->image}}" alt="{{$employee->name}}" width="100px" height="100px"></td>
                        <td>{{$employee->name ?? 'N/A'}}</td>
                        <td>{{$employee->age ?? 'N/A'}}</td>
                        <td>
                            @if($employee->gender === 'M')
                                <span style="color:blue;">Male</span>
                            @elseif($employee->gender === 'F')
                                <span style="color:#FF00FF;">Female</span>
                            @else 
                                <span>N/A</span>
                            @endif
                        </td>
                        <td>{{$employee->cgpa ?? 'N/A'}}</td>
                        <td>{{$employee->city ?? 'N/A'}}</td>
                        <td>{{$employee->designation ?? 'N/A'}}</td>
                        <td>{{$employee->address ?? 'N/A'}}</td>
                        <td>{{$employee->email ?? 'N/A'}}</td> 

                        <td><a href="{{'edit/'.$employee->id}}" class="btn btn-success">Edit</a>
                            <a href="{{'delete/'.$employee->id}}" class="btn btn-danger mt-2">Delete</a></td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td class="alert alert-danger text-center text-dark" colspan="11">
                       <span> No Data Found </span> 
                    </td>
                </tr>
                @endif
            </tbody>
            </table>
        </div> 
        <!-- Table End -->
        <!-- Creating Pagination...in appservice provider -->
        @if(count($data))
        <div class="pagination">{{$data->links()}}</div>
        @endif
@endsection