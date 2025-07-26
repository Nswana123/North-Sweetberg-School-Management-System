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
<div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-3">
    <!-- Left side: Title and badge -->
    <div class="d-flex align-items-center gap-3 flex-wrap">
        <h3 class="mb-0">
            Payment Management
        </h3>
    </div>
    </div>
</div>

     <div class="card-body">
          <!-- Filters Section -->
    <div class="card mb-4">
        <div class="card-header bg-secondary text-white">
            <h4 class="mb-0">Filters</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('payments.viewPayments') }}" method="GET">
                <div class="row">
                    <!-- Admission Date Filter -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="admission_date">Admission Payment Date</label>
                            <input type="date" name="admission_date" id="admission_date" 
                                   class="form-control" value="{{ request('admission_date') }}">
                        </div>
                    </div>
                    
                    <!-- Student Payment Date Filter -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="student_payment_date">Student Payment Date</label>
                            <input type="date" name="student_payment_date" id="student_payment_date" 
                                   class="form-control" value="{{ request('student_payment_date') }}">
                        </div>
                    </div>
                    
                    <!-- Student Number Filter -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="student_number">Student Number</label>
                            <select name="student_number" id="student_number" class="form-control select2">
                                <option value="">All Students</option>
                                @foreach($studentNumbers as $number)
                                    <option value="{{ $number }}" {{ request('student_number') == $number ? 'selected' : '' }}>
                                        {{ $number }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-filter"></i> Apply Filters
                        </button>
                        @if(request()->hasAny(['admission_date', 'student_payment_date', 'student_number']))
                            <a href="{{ route('payments.viewPayments') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times"></i> Clear Filters
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
  <!-- Admission Payments Section -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Admission Payments</h4>
            @if(request('admission_date'))
                <span class="badge bg-light text-dark">
                    Filtered by date: {{ request('admission_date') }}
                </span>
            @endif
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Ref #</th>
                            <th>Applicant</th>
                            <th>Program</th>
                            <th>Amount</th>
                            <th>Method</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($admissionPayments as $payment)
                        <tr>
                            <td>{{ $payment->transaction_reference ?? 'N/A' }}</td>
                            <td>
                                {{ $payment->admission->first_name }} {{ $payment->admission->last_name }}
                                <br><small>{{ $payment->admission->email }}</small>
                            </td>
                            <td>{{ $payment->admission->program->name ?? 'N/A' }}</td>
                            <td>ZMW {{ number_format($payment->amount, 2) }}</td>
                            <td>
                                @switch($payment->payment_mode)
                                    @case('mobile_money_payment')
                                        Mobile Money
                                        @break
                                    @case('card')
                                        Card Payment
                                        @break
                                    @case('bank_transfer')
                                        Bank Transfer
                                        @break
                                    @default
                                        {{ $payment->payment_mode }}
                                @endswitch
                            </td>
                            <td>
                                <span class="badge bg-{{ $payment->status == 'completed' ? 'success' : ($payment->status == 'pending' ? 'warning' : 'danger') }}">
                                    {{ ucfirst($payment->status) }}
                                </span>
                            </td>
                            <td>{{ $payment->created_at }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info" title="View Details">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @if($payment->status == 'pending')
                                    <a href="#" class="btn btn-sm btn-success" title="Approve">
                                        <i class="fas fa-check"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">No admission payments found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $admissionPayments->links() }}
            </div>
        </div>
    </div>

    <!-- Student Payments Section -->
    <div class="card">
             <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Student Payments</h4>
            <div>
                @if(request('student_payment_date'))
                    <span class="badge bg-light text-dark mr-2">
                        Date: {{ request('student_payment_date') }}
                    </span>
                @endif
                @if(request('student_number'))
                    <span class="badge bg-light text-dark">
                        Student #: {{ request('student_number') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Ref #</th>
                            <th>Student</th>
                            <th>Student #</th>
                            <th>Program</th>
                            <th>Amount</th>
                            <th>Purpose</th>
                            <th>Method</th>
                               <th>Payment Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($studentPayments as $payment)
                        <tr>
                            <td>{{ $payment->reference ?? 'N/A' }}</td>
                            <td>
                                {{ $payment->student->user->fname }} {{ $payment->student->user->lname }}
                                <br><small>{{ $payment->student->user->email }}</small>
                            </td>
                            <td>{{ $payment->student->user->student_number }}</td>
                            <td>{{ $payment->student->program->name ?? 'N/A' }}</td>
                            <td>ZMW {{ number_format($payment->amount, 2) }}</td>
                            <td>{{ $payment->payment_purpose ?? 'Tuition' }}</td>
                            <td>{{ ucfirst($payment->method) }}</td>
                                <td>{{ ucfirst($payment->status) }}</td>
                            <td>{{ $payment->created_at }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info" title="View Details">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-primary" title="Print Receipt">
                                    <i class="fas fa-print"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center">No student payments found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $studentPayments->links() }}
            </div>
        </div>
    </div>
</div>
</div>

      </div>
    </div>
<!-- Select2 for student number dropdown -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Select student number",
            allowClear: true
        });
    });
</script>
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