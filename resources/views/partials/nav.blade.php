       <!-- Nav Bar Start -->
         <nav class="navbar navbar-expand-lg navbar-light bg-light mt-3 rounded container">
            <a class="navbar-brand" href="{{Route('index')}}">Employee CRUD</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ Route('index') }}">Employee <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ Route('addData') }}">Add Employee</a> 
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ Route('aboutPage') }}">About</a>
                </li>

                <li class="nav-item">
                <a class="nav-link" style="margin-left: 500px;" href="{{Route('logout')}}">Logout</a>
                </li>
                
                </ul>
            </div>
            </nav>
        <!-- Nav Bar End -->