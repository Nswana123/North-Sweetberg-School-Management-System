
                <!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>North Sweetberg University</title>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
   
      <style>
    .logo-title {
    font-size: 24px !important;;
    font-weight: bold !important;;
    color: #5b2c6f !important;
  }
  
  .logo-title .highlight {
    color: #f26b07 !important; /* Makes the "M" blue */
    font-weight: bolder !important;;
  }
  </style>
      
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

@php
    $user = Auth::user();
    $user_group = $user->user_group;
@endphp

@if($user_group && in_array($user_group->group_name, ['student', 'user']))
    <!-- Student/User Section -->

<div class="container-fluid">
    <!-- Welcome Header -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="welcome-card bg-gradient-primary text-white p-4 rounded-3 shadow">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="mb-1">Welcome back, {{ auth()->user()->fname }}!</h2>
                        <p class="mb-0">Here's what's happening with your education today</p>
                    </div>
                    <div class="student-avatar">
                        <img src="{{ auth()->user()->photo_url ?? asset('images/default-avatar.png') }}" 
                             class="rounded-circle" width="80" height="80" alt="Student Avatar">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Row -->
    <div class="row">
        <!-- Left Column -->
        <div class="col-lg-8">
            <!-- Announcements Section -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white border-bottom-0 pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-bullhorn text-primary me-2"></i> Announcements</h5>
                        <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
                    </div>
                </div>
                <div class="card-body">
                    @forelse($Studentdata['announcements'] as $announcement)
                    <div class="announcement-item mb-3 pb-3 border-bottom">
                        <div class="d-flex">
                            <div class="announcement-icon me-3">
                                <i class="fas fa-{{ $announcement->priority === 'high' ? 'exclamation-circle text-danger' : 'info-circle text-primary' }} fa-2x"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">{{ $announcement->title }}</h6>
                                <p class="text-muted small mb-2">{{ $announcement->created_at->diffForHumans() }}</p>
                                <p class="mb-2">{{ Str::limit($announcement->content, 150) }}</p>
                                <a href="#" class="btn btn-sm btn-outline-secondary">Read More</a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-4">
                        <i class="fas fa-bell-slash fa-3x text-muted mb-3"></i>
                        <p class="text-muted">No announcements at this time</p>
                    </div>
                    @endforelse
                </div>
            </div>

            <!-- Campus Events -->
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="fas fa-calendar-check text-primary me-2"></i> Upcoming Events</h5>
                </div>
                <div class="card-body">
                    @forelse($Studentdata['upcomingEvents'] as $event)
                    <div class="event-item mb-3">
                        <div class="d-flex">
                            <div class="event-date me-3 text-center">
                                <div class="bg-primary text-white rounded-top p-1">
                                    <small>{{ $event->start_date->format('M') }}</small>
                                </div>
                                <div class="border border-top-0 p-1">
                                    <strong>{{ $event->start_date->format('d') }}</strong>
                                </div>
                            </div>
                            <div>
                                <h6 class="mb-1">{{ $event->title }}</h6>
                                <p class="small text-muted mb-1">
                                    <i class="far fa-clock me-1"></i> 
                                    {{ $event->start_date->format('h:i A') }} - {{ $event->end_date->format('h:i A') }}
                                </p>
                                <p class="small text-muted mb-0">
                                    <i class="fas fa-map-marker-alt me-1"></i> {{ $event->location }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-3">
                        <i class="fas fa-calendar-times fa-2x text-muted mb-2"></i>
                        <p class="text-muted">No upcoming events</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .welcome-card {
        background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
    }
    
    .announcement-item:hover {
        background-color: #f8f9fa;
    }
    
    .event-date {
        min-width: 50px;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mark announcements as read when clicked
        document.querySelectorAll('.announcement-item').forEach(item => {
            item.addEventListener('click', function() {
                // You would implement AJAX to mark as read in a real application
                this.style.opacity = '0.8';
            });
        });
    });
</script>

@else
   <div class="container-fluid">
    <!-- Summary Cards -->
    <div class="row">
        <!-- Campuses -->
        <div class="col-xl-2 col-md-4 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Campuses</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data['campuses'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-university fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Schools -->
        <div class="col-xl-2 col-md-4 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Schools</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data['schools'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-school fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Departments -->
        <div class="col-xl-2 col-md-4 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Departments</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data['departments'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-building fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Programs -->
        <div class="col-xl-2 col-md-4 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Programs</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data['programs'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Students -->
        <div class="col-xl-2 col-md-4 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                Total Students</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data['students'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Current Year Students -->
        <div class="col-xl-2 col-md-4 mb-4">
            <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                {{ now()->year }} Students</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data['currentYearStudents'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Admission Statistics Row -->
    <div class="row">
        <!-- Admission Summary Cards -->
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Admission Statistics</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Total Admissions -->
                        <div class="col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $admissionStats['total'] }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Admissions -->
                        <div class="col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $admissionStats['pending'] }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clock fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Approved Admissions -->
                        <div class="col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Approved</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $admissionStats['approved'] }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Rejected Admissions -->
                        <div class="col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Rejected</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $admissionStats['rejected'] }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Staff Card -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Staff Members</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <i class="fas fa-user-tie fa-3x text-gray-300 mb-3"></i>
                        <h1 class="font-weight-bold">{{ $data['staff'] }}</h1>
                        <p class="mb-0">Total Staff Members</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Admission Chart -->
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Admissions Overview ({{ now()->year }})</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="admissionsChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// Admissions Chart
document.addEventListener('DOMContentLoaded', function() {
    var ctx = document.getElementById('admissionsChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($chartData['labels']),
            datasets: [
                {
                    label: 'Total',
                    data: @json($chartData['datasets']['total']),
                    backgroundColor: 'rgba(78, 115, 223, 0.5)',
                    borderColor: 'rgba(78, 115, 223, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Pending',
                    data: @json($chartData['datasets']['pending']),
                    backgroundColor: 'rgba(246, 194, 62, 0.5)',
                    borderColor: 'rgba(246, 194, 62, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Approved',
                    data: @json($chartData['datasets']['approved']),
                    backgroundColor: 'rgba(28, 200, 138, 0.5)',
                    borderColor: 'rgba(28, 200, 138, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Rejected',
                    data: @json($chartData['datasets']['rejected']),
                    backgroundColor: 'rgba(231, 74, 59, 0.5)',
                    borderColor: 'rgba(231, 74, 59, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    stacked: false,
                },
                y: {
                    stacked: false,
                    beginAtZero: true
                }
            },
            plugins: {
                tooltip: {
                    mode: 'index',
                    intersect: false
                },
                legend: {
                    position: 'top',
                }
            }
        }
    });
});
</script>
@endif

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