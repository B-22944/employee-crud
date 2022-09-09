@extends('partials.head')
<body class='container'>  

<form action="{{Route('employeeLogin')}}" method="POST" autocomplete=off>
  @csrf
  <h1>LOGIN Page</h1>
  <hr>
  <!-- Email input -->
    <div class="form-outline mb-4">
      <input type="email" id="form2Example1" class="form-control" value="{{old('email')}}" name="email" />
      <label class="form-label" for="form2Example1">Email address</label>
              @error('email')
                <div class='text-danger'>{{$message}}</div>
              @enderror
    </div>

  <!-- Password input -->
    <div class="form-outline mb-4">
      <input type="password" id="form2Example2" class="form-control" name="password" />
      <label class="form-label" for="form2Example2">Password</label>
              @error('password')
                <div class='text-danger'>{{$message}}</div>
              @enderror
    </div>

          @if(session('status'))
    <div class="alert alert-danger mt-3">
            {{session('status')}}
    </div>        
          @endif
    
        
  <!-- Submit button -->
      <button type="submit" class="btn btn-primary btn-block mb-4">Log in</button>
      <!-- Register buttons -->
      <div class="text-center">
        <p>Not a member? <a  href="{{ Route('addData') }}">Register</a></p>
      </div>
</form>

</body>