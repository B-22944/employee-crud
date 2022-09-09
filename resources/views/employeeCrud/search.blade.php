<!-- Extending layout from layout folder -->
@extends('layouts.main')
@section('title','Employee Crud')

@section('content')

<h4 class="mt-5">Search Employee</h4>
<hr>

<form action="{{route('searchEmployee')}}" method="get" autocomplete=off class="container">

    <div class="input-group">
        <input type="search" class="form-control rounded" placeholder="Search Employee" name="query" aria-label="Search" aria-describedby="search-addon" />
        <button type="submit" class="btn btn-outline-primary">search</button>
    </div>

</form>

@if(isset($employees))

<div class="table-responsive mt-3 rounded">
            <table class="table table-striped table-light table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Gender</th>
                        <th scope="col">CGPA</th>
                        <th scope="col">City</th>
                        <th scope="col">Designation</th>
                        <th scope="col">Address</th>
                        <th scope="col">email</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($employees))
                    @foreach($employees as $key=>$employee)
                    <tr>
                        <td>{{$employee->id}}</td>
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
        
        @if(count($employees))
        <div>{{$employees->links()}}</div>
        @endif

@endif

@endsection