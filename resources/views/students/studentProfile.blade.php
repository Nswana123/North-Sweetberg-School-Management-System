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

        <div class="card-body">
   <div class="container my-4">
    <div class="row">
        <!-- Left image -->
        <div class="col-md-3 text-center">
            <img src="{{ asset('images/graduate.png') }}" alt="Student Avatar" class="img-fluid" style="max-width: 150px;">
        </div>

        <!-- Right student information -->
        <div class="col-md-9">
            <div class="row">
                <!-- Personal Details -->
                <div class="col-md-6 mb-3">
                    <h5 class="border-bottom pb-2">Personal Details</h5>
                    <p><strong>Name:</strong> {{ $student->user->fname }} {{ $student->user->lname }}</p>
                    <p><strong>Gender:</strong> {{ $student->user->gender ?? 'N/A' }}</p>
                    <p><strong>Marital Status:</strong> {{ $student->user->marital_status ?? 'N/A' }}</p>
                </div>

                <!-- Contact Details -->
                <div class="col-md-6 mb-3">
                    <h5 class="border-bottom pb-2">Contact Details</h5>
                    <p><strong>Phone Number:</strong> {{ $student->user->mobile }}</p>
                    <p><strong>National ID:</strong> {{ $student->user->nrc }}</p>
                    <p><strong>Nationality:</strong> {{ $student->user->nationality ?? 'Zambia' }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- School Details -->
    <div class="row mt-4">
        <div class="col-12">
            <h5 class="border-bottom pb-2">School Details</h5>
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td><strong>Student #</strong></td>
                        <td>: {{ $student->user->student_number }}</td>
                    </tr>
                    <tr>
                        <td><strong>Campus</strong></td>
                        <td>: {{ $student->campus->name ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Program</strong></td>
                        <td>: {{ $student->program->name ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Academic Year</strong></td>
                        <td>: {{ $student->year_of_study }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Next of Kin -->
    <div class="row mt-4">
        <div class="col-12">
            <h5 class="border-bottom pb-2">Next of Kin</h5>
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td><strong>Name</strong></td>
                        <td>: {{ $student->nextOfKin->full_name ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Relationship</strong></td>
                        <td>: {{ $student->nextOfKin->relationship ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Phone Number</strong></td>
                        <td>: {{ $student->nextOfKin->phone ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Address</strong></td>
                        <td>: {{ $student->nextOfKin->address ?? 'N/A' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Address Information -->
    <div class="row mt-4">
        <div class="col-12">
            <h5 class="border-bottom pb-2">Residential Address</h5>
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td><strong>Province</strong></td>
                        <td>: {{ $student->address->province ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Town</strong></td>
                        <td>: {{ $student->address->town ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Area/Compound</strong></td>
                        <td>: {{ $student->address->physical_address ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Country</strong></td>
                        <td>: {{ $student->address->country ?? 'N/A' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
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