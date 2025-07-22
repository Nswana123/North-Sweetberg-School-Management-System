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
        
        .btn-success {
            background-color: var(--success);
        }
        
        .btn-success:hover {
            background-color: #219653;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
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
      <div>
         <div class="row">
            <div class="col-xl-12 col-lg-12">
            <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="header-title">
         <h5 class="mb-0">
    Campuses 
    <span class="badge bg-primary">{{ $campuses->total() }}</span>
</h5>
        </div>
        <a href="{{ route('campuses.create') }}" class="btn btn-primary">Add Campus</a>
    </div>

    <div class="card-body">
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Campus ID</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th style="width: 150px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($campuses as $index => $campus)
                    <tr class="table-row" style="animation-delay: {{ $index * 0.05 }}s">
                        <td>{{ $campus->id }}</td>
                        <td>{{ $campus->name }}</td>
                        <td>{{ $campus->location }}</td>
                        <td>
                            <a href="{{ route('campuses.show', $campus->id) }}" class="btn btn-success btn-sm">More</a>
                        </td>
                    </tr>
                @empty
                    <tr class="table-row">
                        <td colspan="4" class="text-center text-muted">No campuses found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="d-flex justify-content-center fade-in-up" style="animation-delay: 0.3s">
            {!! $campuses->links() !!}
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