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
        <h5 class="mb-0">Students</h5>
        <span class="badge bg-primary">{{ $students->total() }}</span>
    </div>

    <!-- Filter Button -->
    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#filterModal">
        Filter Students
    </button>
</div>
<!-- Modal -->
<div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form method="GET" action="{{ route('students.index') }}" class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="filterModalLabel">Filter by Student Number</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
            <div class="mb-3">
                <label for="student_number" class="form-label">Student Number</label>
                <input type="text" name="student_number" id="student_number"
                       value="{{ request('student_number') }}" class="form-control" placeholder="e.g. STD0001">
            </div>
        </div>

        <div class="modal-footer">
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Reset</a>
            <button type="submit" class="btn btn-primary">Apply Filter</button>
        </div>
    </form>
  </div>
</div>


    <div class="card-body">
          <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Student Number</th>
                <th>Name</th>
                <th>Program</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                         <td>{{ $student->user->student_number }}</td>
                    <td>{{ $student->user->fname }} {{ $student->user->lname }}</td>
                    <td>{{ $student->program->name }}</td>
                    <td>{{ $student->year_of_study }}</td>
                    <td>{{ ucfirst($student->status) }}</td>
                    <td>
                        <a href="{{ route('students.show', $student) }}" class="btn btn-info btn-sm">More</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $students->links() }}
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