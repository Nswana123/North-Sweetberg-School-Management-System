<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>North Sweetberg University</title>
      
      <!-- Favicon -->
      <link rel="shortcut icon" href="../assets/images/favicon.ico">
      <!-- Library / Plugin Css Build -->
      <link rel="stylesheet" href="../assets/css/core/libs.min.css">
      
      <!-- Aos Animation Css -->
      <link rel="stylesheet" href="../assets/vendor/aos/dist/aos.css">
      
      <!-- Hope Ui Design System Css -->
      <link rel="stylesheet" href="../assets/css/hope-ui.min.css?v=4.0.0">
      
      <!-- Custom Css -->
      <link rel="stylesheet" href="../assets/css/custom.min.css?v=4.0.0">
      
      <!-- Dark Css -->
      <link rel="stylesheet" href="../assets/css/dark.min.css">
      
      <!-- Customizer Css -->
      <link rel="stylesheet" href="../assets/css/customizer.min.css">
      
      <!-- RTL Css -->
      <link rel="stylesheet" href="../assets/css/rtl.min.css">
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
<div class="card-header d-flex justify-content-between align-items-center flex-wrap">
    <div class="d-flex align-items-center gap-2">
        <h3>Registered Students - {{ $selectedYear  }}</h3>
    </div>

    <!-- Filter Button -->

    <form method="GET" class="mb-3">
        <div class="row g-2">
            <div class="col">
                <input type="number" name="year" value="{{ $selectedYear  }}" class="form-control" placeholder="Academic Year">
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>
  </div>



    <div class="card-body">



    <div class="table-wrapper">
        <table class="table table-hover">
            <thead class="table-light">
                           <tr>
                <th>#</th>
                <th>Student Number</th>
                <th>Name</th>
                <th>Year of Study</th>
                <th>Courses Registered</th>
            </tr>
        </thead>
        <tbody>
                @forelse($students as $yearOfStudy => $groupedStudents)
                    <tr class="table-secondary">
                        <td colspan="5">
                            <strong>Year {{ $yearOfStudy }} ({{ $groupedStudents->count() }} {{ Str::plural('student', $groupedStudents->count()) }})</strong>
                        </td>
                    </tr>

                    @foreach($groupedStudents as $index => $student)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $student->user->student_number }}</td>
                            <td>{{ $student->user->fname }} {{ $student->user->lname }}</td>
                            <td>Year {{ $student->year_of_study }}</td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#coursesModal{{ $student->id }}">
                                    {{ $student->course_count }} {{ Str::plural('course', $student->course_count) }}
                                </a>
                            </td>
                        </tr>

                        <!-- Modal for course list -->
                        <div class="modal fade" id="coursesModal{{ $student->id }}" tabindex="-1" aria-labelledby="coursesModalLabel{{ $student->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="coursesModalLabel{{ $student->id }}">
                                            Courses Registered - {{ $student->user->fname }} {{ $student->user->lname }}
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @php
                                            $courses = $student->courseRegistrations()
                                                ->with('course')
                                                ->where('academic_year', $selectedYear)
                                                ->get();
                                        @endphp

                                        @if($courses->count())
                                            <ul class="list-group">
                                                @foreach($courses as $courseReg)
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        <span>
                                                            {{ $courseReg->course->code }} - {{ $courseReg->course->title }}
                                                        </span>
                                                     
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p class="text-muted">No courses found for {{ $selectedYear }}.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">No registrations found for academic year {{ $selectedYear }}.</td>
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

    <!-- Library Bundle Script -->
    <script src="../assets/js/core/libs.min.js"></script>
    
    <!-- External Library Bundle Script -->
    <script src="../assets/js/core/external.min.js"></script>
    
    <!-- Widgetchart Script -->
    <script src="../assets/js/charts/widgetcharts.js"></script>
    
    <!-- mapchart Script -->
    <script src="../assets/js/charts/vectore-chart.js"></script>
    <script src="../assets/js/charts/dashboard.js" ></script>
    
    <!-- fslightbox Script -->
    <script src="../assets/js/plugins/fslightbox.js"></script>
    
    <!-- Settings Script -->
    <script src="../assets/js/plugins/setting.js"></script>
    
    <!-- Slider-tab Script -->
    <script src="../assets/js/plugins/slider-tabs.js"></script>
    
    <!-- Form Wizard Script -->
    <script src="../assets/js/plugins/form-wizard.js"></script>
    
    <!-- AOS Animation Plugin-->
    <script src="../assets/vendor/aos/dist/aos.js"></script>
    
    <!-- App Script -->
    <script src="../assets/js/hope-ui.js" defer></script>
    
    
  </body>
</html>