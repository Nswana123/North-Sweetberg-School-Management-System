<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Accuracy Frontier</title>
      
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
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Edit User Information</h4>
                     </div>
                  </div>
                  <div class="card-body">
                  <form action="{{ route('setting.update', $users->id) }}" method="POST">
                @csrf

              
    <div class="row">
          <div class="col">
            <label>User Number</label>
            <input type="text" class="form-control @error('student_number') is-invalid @enderror" name="student_number" value="{{ old('student_number', $users->student_number) }}" required autocomplete="off">
            @error('student_number')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col">
            <label>First Name</label>
            <input type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname', $users->fname) }}" required autocomplete="off">
            @error('fname')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col">
        <label>Last Name</label>
            <input type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname', $users->lname) }}" required autocomplete="off">
            @error('lname')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div> 
    </div>
    <div class="row mt-3">
    <div class="col">
        <label>Mobile Number</label>
            <input type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile', $users->mobile) }}" required autocomplete="off">
            @error('mobile')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
       
        <div class="col">
        <label>Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$users->email) }}" required autocomplete="off">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="row mt-3">
    <div class="col">
        <label>Work Place</label>
            <input type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location', $users->location) }}" required autocomplete="off">
            @error('location')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col">
        <label>User Group</label>
        <select class="form-control @error('group_name') is-invalid @enderror" name="group_id" required autocomplete="off">
    <option>Select Group</option>
    @foreach($groups as $group)
        <option value="{{ $group->id }}" 
            {{ old('group_id', $users->group_id) == $group->id ? 'selected' : '' }}>
            {{ $group->group_name }}
        </option>
    @endforeach
</select>
            @error('group_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col">
        <label>Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password',$users->password) }}" required autocomplete="off">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    

    <div class="row mt-2">
        <div class="col">
            <button type="submit" class="btn btn-primary float-end">Submit</button>
        </div>
    </div>
    </form>
            </div>
        </div>
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