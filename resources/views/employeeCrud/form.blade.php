@extends('layouts.main')
@section('title','Add Data')

@section('content')
    <!-- Form Open -->
    <form action="{{route('store')}}" method="post" autocomplete=off enctype="multipart/form-data" class="container">
    
        @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif

        @if(Session::has('fail'))
            <div class="alert alert-success">{{Session::get('fail')}}</div>
        @endif

        @csrf
            <h4 class="mt-5">Enter Employee Data</h4>
            <hr>
                <div class="form-group">
                    <label>Upload Image</label>
                    <input type="File" class="form-control" name="image">
                        @error('image')
                            <div class='text-danger'>{{$message}}</div>
                        @enderror
                </div>

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" placeholder="Enter Your Name" name="name">
                        @error('name')
                            <div class='text-danger'>{{$message}}</div>
                        @enderror
                </div>
        
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                        @error('email')
                            <div class='text-danger'>{{$message}}</div>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                        @error('password')
                            <div class='text-danger'>{{$message}}</div>
                        @enderror
                </div>

                <div class="form-group">
                    <label>Age</label>
                    <input type="number" class="form-control" placeholder="Enter Your Age" name="age">
                        @error('age')
                            <div class='text-danger'>{{$message}}</div>
                        @enderror
                </div>

                <div class="form-group">
                    <label>Gender</label>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="genderM" value="M">
                        <label class="form-check-label" for="Male">
                            Male
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="genderF" value="F">
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
                    <input type="text" class="form-control" placeholder="Enter Your CGPA" name="cgpa">
                        @error('cgpa')
                            <div class='text-danger'>{{$message}}</div>
                        @enderror            
                </div>

                <div class="form-group">
                    <label>Select City</label>
                    <select class="form-control" name="city">
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
                    <input type="text" class="form-control" placeholder="Enter Your designation" name="designation">
                        @error('designation')
                            <div class='text-danger'>{{$message}}</div>
                        @enderror
                </div>

                <div class="form-outline">
                    <label class="form-label" for="Address">Adddress</label>
                    <textarea class="form-control" name="address" id="textAreaExample1" rows="4"></textarea>
                        @error('address')
                            <div class='text-danger'>{{$message}}</div>
                        @enderror
                </div>

            <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
    <!-- Form close -->
@endsection