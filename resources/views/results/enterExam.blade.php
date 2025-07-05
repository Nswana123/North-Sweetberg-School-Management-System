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
         <h5 class="mb-0">
Enter Exam Marks
</h5>
        </div>
    </div>

    <div class="card-body">
@php
use App\Models\StudentResult;
@endphp

<!-- Course selection -->
<form method="GET">
    <select name="course_id" onchange="this.form.submit()" class="form-select mb-3">
        <option value="">Select Course</option>
        @foreach($courses as $course)
            <option value="{{ $course->id }}" {{ $selected == $course->id ? 'selected' : '' }}>
                {{ $course->code }} - {{ $course->title }}
            </option>
        @endforeach
    </select>
</form>

@if($selected)
<form method="POST" action="{{ route('results.saveExam') }}">
    @csrf
    <input type="hidden" name="course_id" value="{{ $selected }}">
    <input type="hidden" name="academic_year" value="{{ now()->year }}">

    <table class="table">
        <thead>
            <tr>
                <th>Student</th>
                <th>Exam Mark</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                @php
                    $result = StudentResult::where('student_id', $student->id)
                        ->where('course_id', $selected)
                        ->where('academic_year', now()->year)
                        ->first();
                @endphp
                <tr>
                    <td>{{ $student->user->student_number }} - {{ $student->user->fname }}</td>
                    <td>
                        <input
                            name="marks[{{ $student->id }}]"
                            type="number"
                            class="form-control"
                            min="0"
                            max="60"
                            step="0.1"
                            value="{{ old('marks.' . $student->id, optional($result)->exam_mark) }}"
                            required
                        >
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <button class="btn btn-success">Save Exam Marks</button>
</form>
@endif
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