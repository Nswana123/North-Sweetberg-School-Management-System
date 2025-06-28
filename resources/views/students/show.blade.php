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
          <h3>Student Details: {{ $student->user->student_number }}  {{ $student->user->fname }} {{ $student->user->lname }}</h3>
            <div>
                   <a href="{{ route('students.edit', $student) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('students.destroy', $student) }}" method="POST" style="display:inline;">
        @csrf @method('DELETE')
        <button class="btn btn-danger" onclick="return confirm('Delete student?')">Delete</button>
    </form>
            </div>
        </div>

        <div class="card-body">
    <div class="mb-4 border rounded p-3">
        <p><strong>Email:</strong> {{ $student->user->email }}</p>
        <p><strong>Phone:</strong> {{ $student->user->mobile }}</p>
    </div>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="border rounded p-3">
                <strong>Program:</strong> {{ $student->program->name }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="border rounded p-3">
                <strong>Year:</strong> {{ $student->year_of_study }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="border rounded p-3">
                <strong>Status:</strong> {{ ucfirst($student->status) }}
            </div>
        </div>
    </div>

    <h5>Next of Kin</h5>
    <div class="border rounded p-3 mb-4">
        <p><strong>Name:</strong> {{ $student->nextOfKin->full_name }}</p>
        <p><strong>Relationship:</strong> {{ $student->nextOfKin->relationship }}</p>
        <p><strong>Phone:</strong> {{ $student->nextOfKin->phone }}</p>
    </div>

    <h5>Address</h5>
    <div class="border rounded p-3 mb-4">
        <p><strong>Physical:</strong> {{ $student->address->physical_address }}</p>
        <p><strong>Postal:</strong> {{ $student->address->postal_address }}</p>
        <p><strong>Town:</strong> {{ $student->address->town }}</p>
        <p><strong>Province:</strong> {{ $student->address->province }}</p>
        <p><strong>Country:</strong> {{ $student->address->country }}</p>
    </div>


    <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to List</a>
</div>
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