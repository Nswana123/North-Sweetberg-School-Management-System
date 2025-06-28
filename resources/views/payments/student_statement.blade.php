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
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div class="d-flex align-items-center gap-3 flex-wrap">
            <h3 class="mb-0">Payment Statement</h3>
        </div>
    </div>

    <div class="card-body">
        <div class="row g-3 mb-3">
            <div class="col-12 col-md-6">
                <p><strong>Student Number:</strong> {{ $statement['student_number'] }}</p>
            </div>
            <div class="col-12 col-md-6">
                <p><strong>Name:</strong> {{ $statement['name'] }}</p>
            </div>
            <div class="col-12 col-md-6">
                <p><strong>Program:</strong> {{ $statement['program'] }}</p>
            </div>
            <div class="col-12 col-md-6">
                <p><strong>Year of Study:</strong> {{ $statement['year_of_study'] }}</p>
            </div>
        </div>

        <div class="table-wrapper mb-4">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Total Fees</th>
                        <th>Total Paid</th>
                        <th>Balance</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>K{{ number_format($statement['total_fees'], 2) }}</td>
                        <td>K{{ number_format($statement['total_paid'], 2) }}</td>
                        <td>K{{ number_format($statement['balance'], 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h5 class="mt-4">Yearly Fee Breakdown</h5>
        <div class="table-wrapper mb-4">
            <table class="table table-sm table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Year of Study</th>
                        <th>Fee</th>
                        <th>Paid</th>
                        <th>Balance</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($statement['breakdown'] as $row)
                        <tr>
                            <td>Year {{ $row['year'] }}</td>
                            <td>K{{ number_format($row['total_fee'], 2) }}</td>
                            <td>K{{ number_format($row['paid'], 2) }}</td>
                            <td>K{{ number_format($row['balance'], 2) }}</td>
                            <td>
                                @if($row['status'] === 'Paid')
                                    <span class="badge bg-success">{{ $row['status'] }}</span>
                                @elseif($row['status'] === 'Partially Paid')
                                    <span class="badge bg-warning text-dark">{{ $row['status'] }}</span>
                                @else
                                    <span class="badge bg-danger">{{ $row['status'] }}</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <h5 class="mt-4">Payment History</h5>
        <div class="table-wrapper">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Amount</th>
                        <th>Paid On</th>
                        <th>Payment Status</th>
                        <th>Payment Method</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($statement['transactions'] as $i => $payment)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>K{{ number_format($payment->amount, 2) }}</td>
                            <td>{{ \Carbon\Carbon::parse($payment->created_at)->toFormattedDateString() }}</td>
                            <td>{{ ucfirst($payment->status) }}</td>
                            <td>{{ ucfirst($payment->method) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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