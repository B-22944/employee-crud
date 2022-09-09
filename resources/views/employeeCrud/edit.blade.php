@extends('layouts.main')
@section('title','Update Data')

@section('content')
    <!-- Form Open -->
    <form action="{{route('update')}}" method="post" autocomplete=off class="container">
    @csrf
    <h4 class="mt-5">Update Employee Data</h4>
    <hr>
        <input type="hidden" name="id" value="{{$employee['id']}}">
        
        <div class="form-group">
            <label>Upload Image</label>
            <input type="File" class="form-control" name="image">
                @error('image')
                    <div class='text-danger'>{{$message}}</div>
                @enderror
        </div>

        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Enter Your Name" name="name" value="{{$employee['name']}}">
                @error('name')
                    <div class='text-danger'>{{$message}}</div>
                @enderror
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{$employee['email']}}">
                @error('email')
                    <div class='text-danger'>{{$message}}</div>
                @enderror
        </div>

        <div class="form-group">
            <label>Age</label>
            <input type="number" class="form-control" placeholder="Enter Your Age" name="age" value="{{$employee['age']}}">
                @error('age')
                    <div class='text-danger'>{{$message}}</div>
                @enderror
        </div>

        <div class="form-group">
            <label>Gender</label>
            
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="genderM" value="M" {{ ($employee->gender=="M")? "checked" : "" }}>
                <label class="form-check-label" for="Male">
                    Male
                </label>
            </div>
                
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="genderF" value="F" {{ ($employee->gender=="F")? "checked" : "" }}>
                <label class="form-check-label" for="Female">
                    Female
                </label>
            </div>
                    @error('gender')
                        <div class='text-danger'>{{$message}}</div>
                    @enderror
        </div>

        <div class="form-group">
            <label>CGPA</label>
            <input type="text" class="form-control" placeholder="Enter Your CGPA" name="cgpa" value="{{$employee['cgpa']}}">
                @error('cgpa')
                    <div class='text-danger'>{{$message}}</div>
                @enderror            
        </div>

        <div class="form-group">
            <label>Select City</label>
            <select class="form-control" name="city" value="{{$employee['city']}}" required>
                <option>Lahore</option>
                <option>Karachi</option>
                <option>Balochistan</option>
            </select>
                @error('city')
                    <div class='text-danger'>{{$message}}</div>
                @enderror
        </div>

        <div class="form-group">
            <label>Designation</label>
            <input type="text" class="form-control" placeholder="Enter Your designation" name="designation" value="{{$employee['designation']}}" required>
                @error('designation')
                    <div class='text-danger'>{{$message}}</div>
                @enderror
        </div>

        <div class="form-outline">
            <label class="form-label" for="Address">Adddress</label>
            <textarea class="form-control" name="address" id="textAreaExample1" rows="4">{{$employee['address']}}</textarea>
                @error('address')
                    <div class='text-danger'>{{$message}}</div>
                @enderror
        </div>

            <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
    <!-- Form close -->
@endsection