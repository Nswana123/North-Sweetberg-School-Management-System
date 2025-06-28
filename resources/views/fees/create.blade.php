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
      <h2>Add Fee</h2>
    </div>
</div>
    <div class="card-body">
<form method="POST" action="{{ isset($fee) ? route('fees.update', $fee->id) : route('fees.store') }}">
    @csrf
    @if(isset($fee)) @method('PUT') @endif

    <div class="d-flex gap-3 flex-wrap">
        <!-- Program -->
        <div class="flex-fill mb-3">
            <label for="program_id" class="form-label">Program</label>
            <select name="program_id" id="program_id" class="form-control" required>
                <option value="">-- Select Program --</option>
                @foreach($programs as $program)
                    <option value="{{ $program->id }}" {{ isset($fee) && $fee->program_id == $program->id ? 'selected' : '' }}>
                        {{ $program->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Year of Study -->
        <div class="flex-fill mb-3">
            <label for="year_of_study" class="form-label">Year of Study</label>
            <input type="number" name="year_of_study" id="year_of_study"
                   value="{{ $fee->year_of_study ?? '' }}" class="form-control"
                   placeholder="e.g. 1" min="1" required>
        </div>

        <!-- Amount -->
        <div class="flex-fill mb-3">
            <label for="amount" class="form-label">Fee Amount</label>
            <input type="number" name="amount" id="amount" step="0.01"
                   value="{{ $fee->amount ?? '' }}" class="form-control"
                   placeholder="e.g. 3500.00" required>
        </div>

        <!-- Registration Threshold -->
        <div class="flex-fill mb-3">
            <label for="registration_threshold" class="form-label">Registration Threshold (%)</label>
            <input type="number" name="registration_threshold" id="registration_threshold" min="0" max="100"
                   value="{{ $fee->registration_threshold ?? 50 }}" class="form-control"
                   placeholder="e.g. 50">
        </div>

        <!-- Exam Threshold -->
        <div class="flex-fill mb-3">
            <label for="exam_threshold" class="form-label">Exam Threshold (%)</label>
            <input type="number" name="exam_threshold" id="exam_threshold" min="0" max="100"
                   value="{{ $fee->exam_threshold ?? 75 }}" class="form-control"
                   placeholder="e.g. 75">
        </div>
    </div>

    <button class="btn btn-primary">{{ isset($fee) ? 'Update' : 'Add' }} Fee</button>
</form>


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