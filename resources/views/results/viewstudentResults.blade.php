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
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="header-title">
<div class="d-flex flex-wrap gap-3 align-items-center mb-3">
  <h3 class="mb-0 flex-grow-1">Final Results - {{ $student->user->fname }} {{ $student->user->lname }}</h3>

  <div><strong>Student Number:</strong> {{ $student->user->student_number }}</div>
  <div><strong>Program:</strong> {{ $student->program->name ?? '-' }}</div>
  <div><strong>Year of Study:</strong> {{ $student->year_of_study }}</div>
</div>

        </div>
    </div>

    <div class="card-body">
       @forelse($results as $year => $yearResults)
        <h5 class="mb-2">Academic Year: {{ $year }}</h5>
        <table class="table table-sm table-striped">
            <thead>
                <tr>
                    <th>Course Code</th>
                    <th>Title</th>
                    <th>CA</th>
                    <th>Exam</th>
                    <th>Final</th>
                    <th>Grade</th>
                    <th>Comment</th>
                </tr>
            </thead>
            <tbody>
                @foreach($yearResults as $result)
                <tr>
                    <td>{{ $result->course->code }}</td>
                    <td>{{ $result->course->title }}</td>
                    <td>{{ $result->ca_mark ?? '-' }}</td>
                    <td>{{ $result->exam_mark ?? '-' }}</td>
                    <td><strong>{{ $result->final_mark ?? '-' }}</strong></td>
                    <td><span class="badge bg-{{ $result->grade === 'F' ? 'danger' : ($result->grade === 'A+' ? 'success' : 'secondary') }}">{{ $result->grade ?? '-' }}</span></td>
                    <td>{{ $result->comment ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @empty
        <p class="text-muted">No results available.</p>
    @endforelse
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