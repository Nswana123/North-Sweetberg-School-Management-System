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
         <h3>Add Student</h3>
    </div>
</div>
    <div class="card-body">
          
  <form action="{{ route('students.storeStudent') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <h5>Personal Information</h5>
                                <div class="form-group">
                                    <label>First Name*</label>
                                    <input type="text" name="first_name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Last Name*</label>
                                    <input type="text" name="last_name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Date of Birth*</label>
                                    <input type="date" name="dob" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Gender*</label>
                                    <select name="gender" class="form-control" required>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>National ID*</label>
                                    <input type="text" name="national_id" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Email*</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Phone*</label>
                                    <input type="text" name="phone" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Profile Photo</label>
                                    <input type="file" name="photo" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <h5>Academic Information</h5>
                                <div class="form-group">
                                    <label>Program*</label>
                                    <select name="program_id" class="form-control" required>
                                        @foreach($programs as $program)
                                        <option value="{{ $program->id }}">{{ $program->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Year of Study*</label>
                                    <input type="number" name="year_of_study" class="form-control" value="1" min="1" required>
                                </div>
                                <div class="form-group">
                                    <label>Secondary School*</label>
                                    <input type="text" name="secondary_school" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Completion Year*</label>
                                    <input type="number" name="completion_year" class="form-control" required>
                                </div>

                                <h5 class="mt-4">Contact Information</h5>
                                <div class="form-group">
                                    <label>Street Address*</label>
                                    <input type="text" name="street_address" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Town/City*</label>
                                    <input type="text" name="town" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Province*</label>
                                    <input type="text" name="province" class="form-control" required>
                                </div>

                                <h5 class="mt-4">Next of Kin</h5>
                                <div class="form-group">
                                    <label>Full Name*</label>
                                    <input type="text" name="next_of_kin_name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Relationship*</label>
                                    <input type="text" name="next_of_kin_relationship" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Phone*</label>
                                    <input type="text" name="next_of_kin_phone" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-right mt-4">
                            <button type="submit" class="btn btn-primary">Create Student</button>
                        </div>
                    </form>
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