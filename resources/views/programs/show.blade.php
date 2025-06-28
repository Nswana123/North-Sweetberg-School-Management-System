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
            <h4>{{$program->name}}</h4>
            <div>
         <!-- Trigger Button -->
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#assignCoursesModal">
                Assign Courses
            </button>

                <a href="{{ route('programs.edit', $program->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('programs.destroy', $program->id) }}" method="POST" style="display:inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Delete program?')" class="btn btn-sm btn-danger">Delete</button>
                        </form> 



<!-- Assign Courses Modal -->
<div class="modal fade" id="assignCoursesModal" tabindex="-1" aria-labelledby="assignCoursesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form method="POST" action="{{ route('programs.assignCourses', $program->id) }}">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="assignCoursesModalLabel">Assign Courses to {{ $program->name }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div class="row">
            <div class="col-12 mb-3">
              <label class="form-label">Select Courses and Assign Year</label>
            </div>

            @foreach ($allCourses as $course)
              @php
                  $existingCourse = $program->courses->firstWhere('id', $course->id);
                  $year = $existingCourse ? $existingCourse->pivot->year_of_study : '';
              @endphp
              <div class="col-md-6 mb-3">
                <div class="border rounded p-3">
                  <div class="form-check">
                    <input type="checkbox" name="courses[{{ $course->id }}][selected]" value="1"
                      id="course{{ $course->id }}" class="form-check-input"
                      {{ $existingCourse ? 'checked' : '' }}>
                    <label class="form-check-label" for="course{{ $course->id }}">
                      {{ $course->code }} - {{ $course->title }}
                    </label>
                  </div>
                  <label class="form-label mt-2">Year of Study</label>
                  <input type="number" name="courses[{{ $course->id }}][year]" class="form-control"
                    value="{{ $year }}" min="1">
                </div>
              </div>
            @endforeach

          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Assign Selected Courses</button>
        </div>
      </div>
    </form>
  </div>
</div>

                        
            </div>
        </div>

        <div class="card-body">
            <!-- Basic Campus Info -->
           <!-- Campus List -->
            <div class="row">
        <div class="col-md-6">
            <h5>Campuses <span class="badge bg-success mb-2">{{ $campuses->count() }}</span></h5>
            <table class="table table-bordered">
                <thead><tr><th>Campus Name</th></tr></thead>
                <tbody>
                    @foreach($campuses as $campus)
                        <tr><td>{{ $campus->name }}</td></tr>
                    @endforeach
                </tbody>
            </table>

            <h5>Department <span class="badge bg-success mb-2">{{ $program->department->count() }}</span></h5>
            <table class="table table-bordered">
                <thead><tr><th>Department Name</th></tr></thead>
                <tbody>
                    <tr><td>{{ $program->department->name ?? 'N/A' }}</td></tr>
                </tbody>
            </table>
        </div>

        <!-- Program Details -->
        <div class="col-md-6">
            <h5 class="mb-2">Program Details</h5>
            <table class="table table-bordered">
                <tr><th>School</th><td>{{ $program->department->school->name ?? 'N/A' }}</td></tr>
                <tr><th>Study Type</th><td>{{ $program->mode_of_study }}</td></tr>
                <tr><th>Program Type</th><td>other</td></tr>
                <tr><th>Is Practical</th><td>{{ $program->is_practical }}</td></tr>
                <tr><th>Qualification</th><td>{{ $program->qualification }}</td></tr>
                <tr><th>Tuition Fee</th>
                    <td>
                        {{ $program->fees->first()?->amount ?? 'N/A' }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
            </div>


    <!-- Courses -->
    <div class="row mt-4">
        <div class="col-12">
            <form method="POST" action="#">
                @csrf

                <table class="table table-bordered">
                    <thead>
                        
                    </thead>
                    <tbody>
                        @foreach($groupedCourses as $year => $courses)
                            <tr><td colspan="5"><strong>{{ $year }}<sup>st</sup> Year Courses</strong></td></tr>
                            @foreach($courses as $course)
                                <tr>
                                    <td><input type="checkbox" name="selected_courses[]" value="{{ $course->id }}"></td>
                                    <td>{{ $year }}</td>
                                    <td>{{ $course->code }}</td>
                                    <td>{{ $course->title }}</td>
                                    <td>
                                        <form action="{{ route('course-program.detach', ['program_id' => $program->id, 'course_id' => $course->id]) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
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