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
  <link rel="stylesheet" href="{{ asset('assets/css/zed.css') }}">
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
        <div class="header-title">
      <h2>Update Program</h2>
    </div>
</div>
    <div class="card-body">
<form method="POST" action="{{ route('programs.update', $program->id) }}">
        @csrf @method('PUT')
        
        <div class="mb-3">
            <label>Program Name</label>
            <input type="text" name="name" class="form-control" value="{{ $program->name }}" required>
        </div>

        <div class="mb-3">
            <label>Program Code</label>
            <input type="text" name="program_code" class="form-control" value="{{ $program->program_code }}" required>
        </div>

        <div class="mb-3">
            <label>Mode of Study</label>
            <input type="text" name="mode_of_study" class="form-control" value="{{ $program->mode_of_study }}" required>
        </div>

        <div class="mb-3">
            <label>Qualification</label>
            <input type="text" name="qualification" class="form-control" value="{{ $program->qualification }}" required>
        </div>

        <div class="mb-3">
            <label>Is Practical</label>
            <select name="is_practical" class="form-control">
                <option {{ $program->is_practical == 'yes' ? 'selected' : '' }}>yes</option>
                <option {{ $program->is_practical == 'no' ? 'selected' : '' }}>no</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Department</label>
            <select name="department_id" class="form-control" required>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}" {{ $program->department_id == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Program</button>
    </form>
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