<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>North Sweetberg University</title>
      
          <link rel="stylesheet" href="{{ asset('assets/css/core/libs.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/aos/dist/aos.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/hope-ui.min.css?v=4.0.0') }}">
<link rel="stylesheet" href="{{ asset('assets/css/custom.min.css?v=4.0.0') }}">
<link rel="stylesheet" href="{{ asset('assets/css/dark.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/customizer.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/rtl.min.css') }}">
  <link rel="stylesheet" href="../assets/css/zed.css">
  </head>
  <body class="  ">
    <!-- loader Start -->
    <div id="loading">
      <div class="loader simple-loader">
          <div class="loader-body">
          </div>
      </div>    
    </div>
    <!-- loader END -->
    @include('dashboard.sidebar')
    @include('dashboard.header')
   

<div class="conatiner-fluid content-inner mt-n5 py-0">
@if ($errors->any())
    <div class="alert alert-warning">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif 
      <div>
         <div class="row">
          <div class="col-xl-12 col-lg-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Campus Details</h4>
            <div>
                <a href="{{ route('campuses.edit', $campus->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('campuses.destroy', $campus->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Delete this campus?')" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>

        <div class="card-body">
            <!-- Basic Campus Info -->
            <div class="mb-4">
                <h5>{{ $campus->name }}</h5>
            </div>

            <!-- Summary Row -->
            <div class="row text-center mb-4">
                <!-- Departments -->
                <div class="col-md-4 mb-2">
                    <div class="d-flex justify-content-between align-items-center border rounded p-2">
                        <strong>Departments</strong>
                        <span class="badge bg-success px-3 py-2">{{ $departmentCount }}</span>
                    </div>
                </div>

                <!-- Schools -->
                <div class="col-md-4 mb-2">
                    <div class="d-flex justify-content-between align-items-center border rounded p-2">
                        <strong>Schools</strong>
                        <span class="badge bg-info text-dark px-3 py-2">{{ $schoolCount }}</span>
                    </div>
                </div>

                <!-- Students -->
                <div class="col-md-4 mb-2">
                    <div class="d-flex justify-content-between align-items-center border rounded p-2">
                        <strong>Students</strong>
                        <span class="badge bg-primary px-3 py-2">{{ $studentCount }}</span>
                    </div>
                </div>
            </div>

            <!-- Add a border after summary -->
            <hr class="my-4">

    <!-- Programs List -->
    <div class="mb-3">
        <h5>Programs: 
             <span class="badge bg-primary">{{ $programs->count() }}</span>
        </h5>
    </div>

    <div class="card">
        <div class="card-header">
            <strong>Programs Registered Under {{ $campus->name }}</strong>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
               <thead>
                <tr>
                    <th>Program Name</th>
                    <th>Department</th>
                    <th>School</th>
                
                </tr>
            </thead>
            <tbody>
                @forelse ($programs as $program)
                    <tr>
                        <td>{{ $program->name }}</td>
                        <td>{{ $program->department->name ?? 'N/A' }}</td>
                        <td>{{ $program->department->school->name ?? 'N/A' }}</td>
                        <td>
                            
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">
                            No programs found for this campus.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        </div>
    </div>
    </div>
</div>

      </div>
    </div>
<script src="{{ asset('assets/js/core/libs.min.js') }}"></script>
    
    <!-- External Library Bundle Script -->
    <script src="{{ asset('assets/js/core/external.min.js') }}"></script>
    
    <!-- Widgetchart Script -->
    <script src="{{ asset('assets/js/charts/widgetcharts.js') }}"></script>
    
    <!-- mapchart Script -->
    <script src="{{ asset('assets/js/charts/vectore-chart.js') }}"></script>
    <script src="{{ asset('assets/js/charts/dashboard.js') }}" ></script>
    
    <!-- fslightbox Script -->
    <script src="{{ asset('assets/js/plugins/fslightbox.js') }}"></script>
    
    <!-- Settings Script -->
    <script src="{{ asset('assets/js/plugins/setting.js') }}"></script>
    
    <!-- Slider-tab Script -->
    <script src="{{ asset('assets/js/plugins/slider-tabs.js') }}"></script>
    
    <!-- Form Wizard Script -->
    <script src="{{ asset('assets/js/plugins/form-wizard.js') }}"></script>
    
    <!-- AOS Animation Plugin-->
    <script src="{{ asset('assets/vendor/aos/dist/aos.js') }}"></script>
    
    <!-- App Script -->
    <script src="{{ asset('assets/js/hope-ui.js') }}" defer></script>
    
    
    
  </body>
</html>