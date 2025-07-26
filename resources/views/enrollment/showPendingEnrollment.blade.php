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
      <style>
        :root {
            --primary: #27ae60;
            --secondary: #0695f4;
            --accent: #e74c3c;
            --light: #ecf0f1;
            --dark: #000000;
            --success: #27ae60;
            --warning: #f39c12;
            --info: #2980b9;
        }
        
        /* Custom Animations */
        .fade-in-up {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease-out forwards;
        }
        
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .card {
            transition: all 0.3s ease;
            transform: translateY(20px);
            opacity: 0;
            animation: fadeInUp 0.6s ease-out 0.2s forwards;
            border: 1px solid rgba(44, 62, 80, 0.1);
        }
        
        .card-header {
            background-color: var(--primary);
            color: white;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .table-row {
            transition: all 0.3s ease;
            transform: translateX(-10px);
            opacity: 0;
            border-left: 3px solid transparent;
        }
        
        .table-row:hover {
            background-color: rgba(236, 240, 241, 0.5);
            border-left: 3px solid var(--secondary);
            transform: translateX(5px);
        }
        
        .table-row.show {
            transform: translateX(0);
            opacity: 1;
        }
        
        .btn {
            transition: all 0.2s ease;
            border: none;
        }
        
        .btn-primary {
            background-color: var(--primary);
        }
        
        .btn-primary:hover {
            background-color: #1a2636;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        
        .btn-info {
            background-color: var(--info);
            color: white;
        }
        
        .btn-info:hover {
            background-color: #2472a4;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        
        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
        }
        
        .btn:active {
            transform: translateY(0);
        }
        
        .badge {
            transition: all 0.3s ease;
            background-color: var(--secondary);
        }
        
        .alert-warning {
            background-color: rgba(243, 156, 18, 0.1);
            border-color: rgba(243, 156, 18, 0.2);
            color: var(--warning);
        }
        
        .alert-success {
            background-color: rgba(39, 174, 96, 0.1);
            border-color: rgba(39, 174, 96, 0.2);
            color: var(--success);
        }
        
        .alert {
            animation: fadeIn 0.5s ease-out, shake 0.5s ease;
            border-left: 4px solid;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20%, 60% { transform: translateX(-5px); }
            40%, 80% { transform: translateX(5px); }
        }
        
        .pagination .page-item .page-link {
            transition: all 0.2s ease;
            color: var(--primary);
            border: 1px solid rgba(44, 62, 80, 0.1);
        }
        
        .pagination .page-item.active .page-link {
            background-color: var(--primary);
            border-color: var(--primary);
            transform: scale(1.1);
        }
        
        .pagination .page-item:hover .page-link {
            background-color: rgba(44, 62, 80, 0.05);
        }
        
        .text-muted {
            color: #95a5a6 !important;
        }
        
        .code-cell {
            font-family: monospace;
            font-weight: bold;
            color: var(--info);
        }
      </style>
  </head>
  <body class="">
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
    <div class="alert alert-warning fade-in-up">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success fade-in-up">
        {{ session('success') }}
    </div>
@endif 
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif


      <div>
         <div class="row">
            <div class="col-xl-12 col-lg-12">
            <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="header-title">
            <h5 class="mb-0">
                Admission Details
            </h5>
        </div>
      
    </div>

    <div class="card-body">
    <ul class="list-group mb-4">
        <li class="list-group-item"><strong>Program Name:</strong> {{ $admission->program->name }}</li>
        <li class="list-group-item"><strong>Qualification:</strong> {{ $admission->program->qualification }}</li>
        <li class="list-group-item"><strong>Duration:</strong> {{ $admission->program->duration }} years</li>
    </ul>

    <h4 class="mb-3 text-primary">Applicant Information</h4>
    <ul class="list-group mb-4">
        <li class="list-group-item"><strong>Full Name:</strong> {{ $admission->title }} {{ $admission->first_name }} {{ $admission->last_name }}</li>
        <li class="list-group-item"><strong>Gender:</strong> {{ $admission->gender }}</li>
        <li class="list-group-item"><strong>DOB:</strong> {{ $admission->dob }}</li>
        <li class="list-group-item"><strong>National ID:</strong> {{ $admission->national_id }}</li>
        <li class="list-group-item"><strong>Email:</strong> {{ $admission->email }}</li>
        <li class="list-group-item"><strong>Phone:</strong> {{ $admission->phone }}</li>
        <li class="list-group-item"><strong>Address:</strong> {{ $admission->street_address }}, {{ $admission->city }}, {{ $admission->province }}</li>
        <li class="list-group-item"><strong>Next of Kin:</strong> {{ $admission->next_of_kin_name }} ({{ $admission->next_of_kin_relationship }}) - {{ $admission->next_of_kin_phone }}</li>
        <li class="list-group-item"><strong>Secondary School:</strong> {{ $admission->secondary_school }} ({{ $admission->completion_year }})</li>
        <li class="list-group-item"><strong>Status:</strong>
            <span class="badge
                @if($admission->admission_status == 'Approved') bg-success
                @elseif($admission->admission_status == 'Rejected') bg-danger
                @else bg-secondary @endif">
                {{ $admission->admission_status ?? 'Pending' }}
            </span>
        </li>
    </ul>

    <h4 class="mb-3 text-primary">Uploaded Documents</h4>
    <ul class="list-group mb-4">
        @if($admission->id_document_path)
            <li class="list-group-item"><a href="{{ asset('storage/' . $admission->id_document_path) }}" target="_blank">ID Document</a></li>
        @endif
        @if($admission->certificates_path)
            <li class="list-group-item"><a href="{{ asset('storage/' . $admission->certificates_path) }}" target="_blank">Certificates</a></li>
        @endif
        @if($admission->photo_path)
            <li class="list-group-item"><a href="{{ asset('storage/' . $admission->photo_path) }}" target="_blank">Photo</a></li>
        @endif
    </ul>

    <h4 class="mb-3 text-primary">Payment Info</h4>
    @if($admission->payment)
        <ul class="list-group mb-4">
            <li class="list-group-item"><strong>Mode:</strong> {{ $admission->payment->payment_mode }}</li>
            <li class="list-group-item"><strong>Amount:</strong> {{ $admission->payment->amount }}</li>
            <li class="list-group-item"><strong>Reference:</strong> {{ $admission->payment->transaction_reference }}</li>
            <li class="list-group-item"><strong>Payment Status:</strong> {{ $admission->payment->status }}</li>
        </ul>
    @else
        <p>No payment details available.</p>
    @endif

    <div class="mt-4">
        <form action="{{ route('enrollment.approve', $admission->id) }}" method="POST" class="d-inline">
            @csrf
            <button class="btn btn-success" type="submit">Approve</button>
        </form>

        <!-- Reject Button (triggers modal) -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal{{ $admission->id }}">
    Reject
</button>



        <a href="{{ route('enrollment.PendingEnrollment') }}" class="btn btn-secondary float-end">Back to List</a>
    </div>
    </div>
    </div>
</div>
<!-- Rejection Modal -->
<div class="modal fade" id="rejectModal{{ $admission->id }}" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('enrollment.reject', $admission->id) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectModalLabel">Reject Admission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="rejected_comment" class="form-label">Reason for Rejection</label>
                        <select class="form-select" id="rejected_comment" name="rejected_comment" required>
                            <option value="">Select a reason...</option>
                            <option value="Incomplete application">Incomplete application</option>
                            <option value="Missing documents">Missing documents</option>
                            <option value="Does not meet academic requirements">Does not meet academic requirements</option>
                            <option value="Does not meet age requirements">Does not meet age requirements</option>
                            <option value="Test scores below threshold">Test scores below threshold</option>
                            <option value="Previous academic performance">Previous academic performance</option>
                            <option value="Behavioral concerns">Behavioral concerns</option>
                            <option value="Attendance concerns">Attendance concerns</option>
                            <option value="Capacity reached">Capacity reached</option>
                            <option value="Duplicate application">Duplicate application</option>
                            <option value="False information provided">False information provided</option>
                            <option value="Application deadline missed">Application deadline missed</option>
                            <option value="Payment not received">Payment not received</option>
                            <option value="Incorrect payment amount">Incorrect payment amount</option>
                            <option value="Failed interview">Failed interview</option>
                            <option value="Failed entrance exam">Failed entrance exam</option>
                            <option value="No available seats in program">No available seats in program</option>
                            <option value="Program discontinued">Program discontinued</option>
                            <option value="Special needs not supported">Special needs not supported</option>
                            <option value="Language proficiency insufficient">Language proficiency insufficient</option>
                            <option value="Health requirements not met">Health requirements not met</option>
                            <option value="Visa/immigration issues">Visa/immigration issues</option>
                            <option value="Criminal background">Criminal background</option>
                            <option value="Disciplinary history">Disciplinary history</option>
                            <option value="Reference concerns">Reference concerns</option>
                            <option value="Essay quality insufficient">Essay quality insufficient</option>
                            <option value="Interview performance poor">Interview performance poor</option>
                            <option value="Extracurricular mismatch">Extracurricular mismatch</option>
                            <option value="Not aligned with school values">Not aligned with school values</option>
                            <option value="Parent/guardian concerns">Parent/guardian concerns</option>
                            <option value="Sibling priority given">Sibling priority given</option>
                            <option value="Faculty recommendation">Faculty recommendation</option>
                            <option value="Admissions committee decision">Admissions committee decision</option>
                            <option value="Financial aid unavailable">Financial aid unavailable</option>
                            <option value="Scholarship requirements not met">Scholarship requirements not met</option>
                            <option value="Tuition agreement issues">Tuition agreement issues</option>
                            <option value="Transportation unavailable">Transportation unavailable</option>
                            <option value="Housing unavailable">Housing unavailable</option>
                            <option value="International student quota filled">International student quota filled</option>
                            <option value="Gender balance considerations">Gender balance considerations</option>
                            <option value="Diversity considerations">Diversity considerations</option>
                            <option value="Athletic program mismatch">Athletic program mismatch</option>
                            <option value="Arts program mismatch">Arts program mismatch</option>
                            <option value="STEM program mismatch">STEM program mismatch</option>
                            <option value="Humanities program mismatch">Humanities program mismatch</option>
                            <option value="Religious requirements not met">Religious requirements not met</option>
                            <option value="Uniform policy conflict">Uniform policy conflict</option>
                            <option value="Technology requirements not met">Technology requirements not met</option>
                            <option value="Other (please specify)">Other (please specify)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="additional_comments" class="form-label">Additional Comments (Optional)</label>
                        <textarea class="form-control" id="additional_comments" name="additional_comments" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Confirm Rejection</button>
                </div>
            </form>
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
    
    <script>
        // Animate table rows on load
        document.addEventListener('DOMContentLoaded', function() {
            const rows = document.querySelectorAll('.table-row');
            rows.forEach((row, index) => {
                setTimeout(() => {
                    row.classList.add('show');
                }, index * 50);
            });
            
            // Animate badge count
            const badge = document.querySelector('.badge');
            if (badge) {
                setTimeout(() => {
                    badge.style.transform = 'scale(1.2)';
                    setTimeout(() => {
                        badge.style.transform = 'scale(1)';
                    }, 300);
                }, 500);
            }
            
            // Add hover effect to table rows
            const tableRows = document.querySelectorAll('tbody tr');
            tableRows.forEach(row => {
                row.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateX(5px)';
                });
                row.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateX(0)';
                });
            });
        });
    </script>
  </body>
</html>