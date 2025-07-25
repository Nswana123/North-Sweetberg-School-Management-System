<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>North Sweet berg</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --sidebar-width: 260px;
            --sidebar-mini-width: 80px;
            --sidebar-bg: #ffffff;
            --sidebar-color: #3f4254;
            --sidebar-active-bg: #f4f6f9;
            --sidebar-active-color: #303336;
            --sidebar-hover-bg: #f4f6f9;
            --sidebar-hover-color: #0a4076; 
            --sidebar-border-radius: 8px;
            --sidebar-transition: all 0.3s ease;
            --sidebar-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            --sidebar-header-height: 70px;
            --sidebar-item-padding: 12px 15px;
            --sidebar-icon-size: 20px;
            --sidebar-submenu-indent: 20px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            overflow-x: hidden;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: var(--sidebar-width);
            background-color: var(--sidebar-bg);
            color: var(--sidebar-color);
            transition: var(--sidebar-transition);
            z-index: 1000;
            overflow-y: auto;
            box-shadow: var(--sidebar-shadow);
            border-right: 1px solid rgba(0, 0, 0, 0.05);
        }

        .sidebar.sidebar-mini {
            width: var(--sidebar-mini-width);
            text-align: center;
        }

        .sidebar.sidebar-mini .logo-title,
        .sidebar.sidebar-mini .item-name,
        .sidebar.sidebar-mini .mini-icon,
        .sidebar.sidebar-mini .right-icon,
        .sidebar.sidebar-mini .sidenav-mini-icon {
            display: none;
        }

        .sidebar.sidebar-mini .sidebar-toggle i {
            transform: rotate(180deg);
        }

        .sidebar.sidebar-mini .nav-link {
            justify-content: center;
        }

        .sidebar.sidebar-mini .sub-nav {
            position: absolute;
            left: 100%;
            top: 0;
            width: 220px;
            background-color: var(--sidebar-bg);
            border-radius: var(--sidebar-border-radius);
            box-shadow: var(--sidebar-shadow);
            display: none;
            padding: 10px 0;
            z-index: 1001;
        }

        .sidebar.sidebar-mini .nav-item:hover .sub-nav {
            display: block;
        }

        .sidebar-header {
            height: var(--sidebar-header-height);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: inherit;
        }

        .logo-main {
            display: flex;
            align-items: center;
        }

        .logo-normal {
            font-size: 24px;
            font-weight: 700;
            color: #3699ff;
        }

        .logo-title {
            margin-left: 10px;
            font-size: 18px;
            font-weight: 600;
            color: #3699ff;
        }

        .sidebar-toggle {
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            transition: var(--sidebar-transition);
            background-color: #3699ff;
            color: white;
        }

        .sidebar-toggle:hover {
            background-color: #2a7bc8;
        }

        .sidebar-toggle i {
            transition: var(--sidebar-transition);
        }

        .sidebar-body {
            padding: 20px 0;
            height: calc(100vh - var(--sidebar-header-height));
            overflow-y: auto;
        }

        .sidebar-list {
            list-style: none;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: var(--sidebar-item-padding);
            color: var(--sidebar-color);
            text-decoration: none;
            transition: var(--sidebar-transition);
            border-radius: var(--sidebar-border-radius);
            margin: 2px 15px;
        }

        .nav-link:hover {
            background-color: var(--sidebar-hover-bg);
            color: var(--sidebar-hover-color);
        }

        .nav-link:hover .icon i {
            color: var(--sidebar-hover-color);
        }

        .nav-link.active {
            background-color: var(--sidebar-active-bg);
            color: var(--sidebar-active-color);
            font-weight: 500;
        }

        .nav-link.active .icon i {
            color: var(--sidebar-active-color);
        }

        .nav-link .icon {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            width: var(--sidebar-icon-size);
            height: var(--sidebar-icon-size);
        }

        .nav-link .icon i {
            transition: var(--sidebar-transition);
        }

        /* Colorful icons */
        .nav-link .icon i.fa-tachometer-alt { color: #3699ff; }
        .nav-link .icon i.fa-user { color: #699834; }
        .nav-link .icon i.fa-building { color: #fd7e14; }
        .nav-link .icon i.fa-school { color: #20c997; }
        .nav-link .icon i.fa-sitemap { color: #6f42c1; }
        .nav-link .icon i.fa-graduation-cap { color: #e83e8c; }
        .nav-link .icon i.fa-book { color: #17a2b8; }
        .nav-link .icon i.fa-money-bill-wave { color: #28a745; }
        .nav-link .icon i.fa-users { color: #ffc107; }
        .nav-link .icon i.fa-file-invoice-dollar { color: #6610f2; }
        .nav-link .icon i.fa-file-alt { color: #6c757d; }
        .nav-link .icon i.fa-chalkboard-teacher { color: #dc3545; }
        .nav-link .icon i.fa-clipboard-list { color: #fd7e14; }
        .nav-link .icon i.fa-user-graduate { color: #20c997; }
        .nav-link .icon i.fa-chart-line { color: #17a2b8; }
        .nav-link .icon i.fa-poll { color: #6f42c1; }
        .nav-link .icon i.fa-file-signature { color: #e83e8c; }
        .nav-link .icon i.fa-users-cog { color: #6610f2; }
        .nav-link .icon i.fa-tools { color: #6c757d; }
        .nav-link .icon i.fa-cog { color: #3699ff; }

        .nav-link .item-name {
            flex: 1;
            white-space: nowrap;
        }

        .right-icon {
            margin-left: auto;
            transition: var(--sidebar-transition);
            color: #6c757d;
        }

        .nav-link[aria-expanded="true"] .right-icon {
            transform: rotate(90deg);
            color: var(--sidebar-active-color);
        }

        .sub-nav {
            list-style: none;
            padding-left: var(--sidebar-submenu-indent);
            display: none;
        }

        .sub-nav.show {
            display: block;
        }

        .sub-nav .nav-link {
            padding-left: 40px;
        }

        .hr-horizontal {
            border: 0;
            height: 1px;
            background-color: rgba(0, 0, 0, 0.1);
            margin: 15px 0;
        }

        .static-item {
            color: #888;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.5px;
            pointer-events: none;
        }

        .sidebar-footer {
            padding: 15px;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
        }

        /* Scrollbar styling */
        .sidebar-body::-webkit-scrollbar {
            width: 5px;
        }

        .sidebar-body::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .sidebar-body::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 10px;
        }

        .sidebar-body::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }

        /* Badge for notifications */
        .badge {
            display: inline-block;
            padding: 0.25em 0.4em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.25rem;
            margin-left: auto;
        }

        .badge-primary {
            color: #fff;
            background-color: #3699ff;
        }

        .badge-success {
            color: #fff;
            background-color: #28a745;
        }

        .badge-danger {
            color: #fff;
            background-color: #dc3545;
        }
        
        /* Hide items without permission */
        .nav-item.hidden {
            display: none;
        }

        /* Main content styles */
        .main-content {
            margin-left: var(--sidebar-width);
            transition: var(--sidebar-transition);
            min-height: 100vh;
            padding: 20px;
        }

        .sidebar-mini + .main-content {
            margin-left: var(--sidebar-mini-width);
        }

        /* Overlay styles */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
            display: none;
        }

        /* Mobile styles */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
                z-index: 1000;
                width: 260px;
            }
            
            .sidebar.sidebar-show {
                transform: translateX(0);
                box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            }
            
            .main-content {
                margin-left: 0 !important;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <aside class="sidebar sidebar-default sidebar-white sidebar-base navs-rounded-all">
        <div class="sidebar-header d-flex align-items-center justify-content-start">
            <a href="#" class="navbar-brand">
                <h4 class="logo-title">North Sweet berg</h4>
            </a>
            <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                <i class="icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </i>
            </div>
        </div>

        <!--Sidebar-->
      <!--Sidebar-->
        <div class="sidebar-body pt-0 data-scrollbar">
            <div class="sidebar-list">
                <!-- Sidebar Menu Start -->
                <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                @php
                        $user = Auth::user();
                        $user_group = $user->user_group;
                    @endphp
                    @if($permissions->contains('name', 'Home section'))
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled" href="#" tabindex="-1">
                            <span class="default-icon">Home</span>
                            <span class="mini-icon">-</span>
                        </a>
                    </li>
                    @endif
                    @if($permissions->contains('name', 'Dashboard'))
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('dashboard')}}">
                            <i class="icon">
                                <i class="fas fa-tachometer-alt"></i>
                            </i>
                            <span class="item-name">Dashboard</span>
                        </a>
                    </li>
                  @endif
    @if($permissions->contains('name', 'Student Profile'))
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('students.studentProfile')}}">
                            <i class="icon">
                                <i class="fas fa-user"></i>
                            </i>
                            <span class="item-name">Profile</span>
                        </a>
                    </li>
                  @endif
                          @if($permissions->contains('name', 'Campuses'))
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('campuses.index')}}">
                            <i class="icon">
                                <i class="fas fa-building"></i>
                            </i>
                            <span class="item-name">Campuses</span>
                        </a>
                    </li>
                  @endif
                              @if($permissions->contains('name', 'Schools'))
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('schools.index')}}">
                            <i class="icon">
                                <i class="fas fa-school"></i>
                            </i>
                            <span class="item-name">Schools</span>
                        </a>
                    </li>
                  @endif

                             @if($permissions->contains('name', 'Departments'))
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('departments.index')}}">
                            <i class="icon">
                                <i class="fas fa-sitemap"></i>
                            </i>
                            <span class="item-name">Departments</span>
                        </a>
                    </li>
                  @endif

                            @if($permissions->contains('name', 'Programs'))
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('programs.index')}}">
                            <i class="icon">
                                <i class="fas fa-graduation-cap"></i>
                            </i>
                            <span class="item-name">Programs</span>
                        </a>
                    </li>
                  @endif

                           @if($permissions->contains('name', 'Courses'))
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('courses.index')}}">
                            <i class="icon">
                                <i class="fas fa-book"></i>
                            </i>
                            <span class="item-name">Courses</span>
                        </a>
                    </li>
                  @endif

                  
                           @if($permissions->contains('name', 'Fees Settings'))
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('fees.index')}}">
                            <i class="icon">
                                <i class="fas fa-money-bill-wave"></i>
                            </i>
                            <span class="item-name">Fees Settings</span>
                        </a>
                    </li>
                  @endif

 @if($permissions->contains('name', 'Enrollment')) 
                    
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-enroll" role="button" aria-expanded="false" aria-controls="sidebar-enroll">
                            <i class="icon">
                                <i class="fas fa-chart-line"></i>
                            </i>
                            <span class="item-name">Admissions</span>
                            <i class="right-icon">
                                <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <!-- --->
                        <ul class="sub-nav collapse" id="sidebar-enroll" data-bs-parent="#sidebar-enroll">
                        <li class="nav-item">
                                <a class="nav-link " href="{{ route('enrollment.PendingEnrollment') }}">
                                    <i class="icon">
                                        <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> pa </i>
                                    <span class="item-name">Pending Admission</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{ route('enrollment.approvedEnrollment') }}">
                                    <i class="icon">
                                        <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> pa </i>
                                    <span class="item-name">Approved Admission</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{ route('enrollment.rejectedEnrollment') }}">
                                    <i class="icon">
                                        <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> ra </i>
                                    <span class="item-name">Rejected Admissions</span>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                    @endif 



                             @if($permissions->contains('name', 'Students'))
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('students.index')}}">
                            <i class="icon">
                                <i class="fas fa-users"></i>
                            </i>
                            <span class="item-name">Students</span>
                        </a>
                    </li>
                  @endif

                             @if($permissions->contains('name', 'Students Statements'))
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('payments.index')}}">
                            <i class="icon">
                                <i class="fas fa-file-invoice-dollar"></i>
                            </i>
                            <span class="item-name">Payment Statements</span>
                        </a>
                    </li>
                  @endif

                  
                             @if($permissions->contains('name', 'My Statements'))
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('payments.student_statement')}}">
                            <i class="icon">
                                <i class="fas fa-file-alt"></i>
                            </i>
                            <span class="item-name">My Statements</span>
                        </a>
                    </li>
                  @endif

                           @if($permissions->contains('name', 'Classes'))
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('classes.index')}}">
                            <i class="icon">
                                <i class="fas fa-chalkboard-teacher"></i>
                            </i>
                            <span class="item-name">Classes</span>
                        </a>
                    </li>
                  @endif
                                 @if($permissions->contains('name', 'Course Registration'))
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('students.register_courses')}}">
                            <i class="icon">
                                <i class="fas fa-clipboard-list"></i>
                            </i>
                            <span class="item-name">Course Registration</span>
                        </a>
                    </li>
                  @endif
                               @if($permissions->contains('name', 'Registered Students'))
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('students.registered_students_by_year')}}">
                            <i class="icon">
                                <i class="fas fa-user-graduate"></i>
                            </i>
                            <span class="item-name">Registered Students</span>
                        </a>
                    </li>
                  @endif

                   @if($permissions->contains('name', 'Results Dashboard')) 
                    
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-results" role="button" aria-expanded="false" aria-controls="sidebar-results">
                            <i class="icon">
                                <i class="fas fa-chart-line"></i>
                            </i>
                            <span class="item-name">Results Dashboard</span>
                            <i class="right-icon">
                                <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <!-- --->
                        <ul class="sub-nav collapse" id="sidebar-results" data-bs-parent="#sidebar-results">
                        <li class="nav-item">
                                <a class="nav-link " href="{{ route('results.viewCAs') }}">
                                    <i class="icon">
                                        <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> c </i>
                                    <span class="item-name">CAs Results</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{ route('results.viewExam') }}">
                                    <i class="icon">
                                        <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> e </i>
                                    <span class="item-name">Exam Results</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{ route('results.viewfinal') }}">
                                    <i class="icon">
                                        <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> r </i>
                                    <span class="item-name">Final Results</span>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                    @endif 


                                @if($permissions->contains('name', 'Results')) 
                    
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-studentresults" role="button" aria-expanded="false" aria-controls="sidebar-studentresults">
                            <i class="icon">
                                <i class="fas fa-poll"></i>
                            </i>
                            <span class="item-name">Results</span>
                            <i class="right-icon">
                                <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <!-- --->
                        <ul class="sub-nav collapse" id="sidebar-studentresults" data-bs-parent="#sidebar-studentresults">
                        <li class="nav-item">
                                <a class="nav-link " href="{{ route('students.resultsCa') }}">
                                    <i class="icon">
                                        <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> ca </i>
                                    <span class="item-name">CAs Results</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{ route('students.resultsFinal') }}">
                                    <i class="icon">
                                        <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> fr </i>
                                    <span class="item-name">Final Results</span>
                                </a>
                            </li>
                    
                            
                        </ul>
                    </li>
                    @endif 

                                  @if($permissions->contains('name', 'Exam Slip'))
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('students.examSlip')}}">
                            <i class="icon">
                                <i class="fas fa-file-signature"></i>
                            </i>
                            <span class="item-name">Exam Slip</span>
                        </a>
                    </li>
                  @endif

              
               @if($permissions->contains('name', 'systems settings section'))


                    <!-------recultment End----->
                    <li><hr class="hr-horizontal"></li>
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled" href="#" tabindex="-1">
                            <span class="default-icon">Systems settings</span>
                            <span class="mini-icon">-</span>
                        </a>
                    </li>
                   @endif
                   @if($permissions->contains('name', 'user management')) 
                    
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-user" role="button" aria-expanded="false" aria-controls="sidebar-user">
                            <i class="icon">
                                <i class="fas fa-users-cog"></i>
                            </i>
                            <span class="item-name">User Management</span>
                            <i class="right-icon">
                                <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <!-- --->
                        <ul class="sub-nav collapse" id="sidebar-user" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                                <a class="nav-link " href="{{ route('settings.usergroup') }}">
                                    <i class="icon">
                                        <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> y </i>
                                    <span class="item-name">User Group</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{ route('settings.user') }}">
                                    <i class="icon">
                                        <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> x </i>
                                    <span class="item-name">Add User</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{ route('settings.userlist') }}">
                                    <i class="icon">
                                        <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> z </i>
                                    <span class="item-name">User List</span>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                    @endif 
                    @if($permissions->contains('name', 'utilities'))
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#utilities-error" role="button" aria-expanded="false" aria-controls="utilities-error">
                            <i class="icon">
                                <i class="fas fa-tools"></i>
                            </i>
                            <span class="item-name">Utilities</span>
                            <i class="right-icon">
                                <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <ul class="sub-nav collapse" id="utilities-error" data-bs-parent="#sidebar-menu">
                            <li class="nav-item">
                                <a class="nav-link " href="#">
                                    <i class="icon">
                                        <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <span class="item-name">Error 404</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#">
                                    <i class="icon">
                                        <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <span class="item-name">Error 500</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#">
                                    <i class="icon">
                                        <svg  class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <span class="item-name">Maintenance</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if($permissions->contains('name', 'settings'))
                    <li class="nav-item">
                        <a class="nav-link "  href="{{ route('settings.Settings') }}">
                            <i class="icon">
                                <i class="fas fa-cog"></i>
                            </i>
                            <span class="item-name">Settings</span>
                        </a>
                    </li>
                   @endif
                </ul>
                <!-- Sidebar Menu End -->        
            </div>
        </div>
        <div class="sidebar-footer"></div>
    </aside>

  <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get DOM elements
            const sidebarToggle = document.querySelector('.sidebar-toggle');
            const sidebar = document.querySelector('.sidebar');
            const mainContent = document.querySelector('.main-content');
            
            // Create overlay if it doesn't exist
            let sidebarOverlay = document.querySelector('.sidebar-overlay');
            if (!sidebarOverlay) {
                sidebarOverlay = document.createElement('div');
                sidebarOverlay.className = 'sidebar-overlay';
                document.body.insertBefore(sidebarOverlay, mainContent);
            }

            // Toggle sidebar function
            function toggleSidebar() {
                // For mobile screens (<= 768px)
                if (window.innerWidth <= 768) {
                    const isShowing = sidebar.classList.contains('sidebar-show');
                    
                    if (isShowing) {
                        sidebar.classList.remove('sidebar-show');
                        sidebarOverlay.style.display = 'none';
                    } else {
                        sidebar.classList.add('sidebar-show');
                        sidebarOverlay.style.display = 'block';
                    }
                } 
                // For larger screens (> 768px)
                else {
                    const isMini = sidebar.classList.contains('sidebar-mini');
                    
                    if (isMini) {
                        sidebar.classList.remove('sidebar-mini');
                        if (mainContent) mainContent.style.marginLeft = '260px';
                    } else {
                        sidebar.classList.add('sidebar-mini');
                        if (mainContent) mainContent.style.marginLeft = '80px';
                    }
                    
                    // Store preference in localStorage
                    localStorage.setItem('sidebarMini', !isMini);
                }
            }

            // Initialize sidebar state
            function initSidebar() {
                // For mobile - always start closed
                if (window.innerWidth <= 768) {
                    sidebar.classList.remove('sidebar-show');
                    sidebarOverlay.style.display = 'none';
                    if (mainContent) mainContent.style.marginLeft = '0';
                } 
                // For desktop - check localStorage
                else {
                    const isMini = localStorage.getItem('sidebarMini') === 'true';
                    if (isMini) {
                        sidebar.classList.add('sidebar-mini');
                        if (mainContent) mainContent.style.marginLeft = '80px';
                    } else {
                        sidebar.classList.remove('sidebar-mini');
                        if (mainContent) mainContent.style.marginLeft = '260px';
                    }
                }
            }

            // Close sidebar when clicking outside on mobile
            function handleOutsideClick(e) {
                if (window.innerWidth <= 768 && 
                    !sidebar.contains(e.target) && 
                    !sidebarToggle.contains(e.target) &&
                    sidebar.classList.contains('sidebar-show')) {
                    sidebar.classList.remove('sidebar-show');
                    sidebarOverlay.style.display = 'none';
                }
            }

            // Handle submenu collapse/expand
            function handleSubmenuToggle(e) {
                e.preventDefault();
                const target = this.getAttribute('href');
                const parent = this.getAttribute('data-bs-parent');
                const isExpanded = this.getAttribute('aria-expanded') === 'true';
                
                // Close other open submenus in the same parent
                if (parent) {
                    document.querySelectorAll(parent + ' .sub-nav.show').forEach(el => {
                        if (el.id !== target.substring(1)) {
                            el.classList.remove('show');
                            const trigger = document.querySelector(`[href="#${el.id}"]`);
                            if (trigger) {
                                trigger.setAttribute('aria-expanded', 'false');
                            }
                        }
                    });
                }
                
                // Toggle current submenu
                const submenu = document.querySelector(target);
                if (submenu) {
                    submenu.classList.toggle('show');
                }
                
                // Update aria-expanded
                this.setAttribute('aria-expanded', !isExpanded);
            }

            // Set active link based on URL hash
            function setActiveLink() {
                const hash = window.location.hash;
                const navLinks = document.querySelectorAll('.nav-link:not(.static-item)');
                
                // Remove active class from all links
                navLinks.forEach(link => {
                    link.classList.remove('active');
                });
                
                if (hash) {
                    // Find the link that matches the hash
                    const activeLink = document.querySelector(`.nav-link[href="${hash}"]`);
                    if (activeLink) {
                        activeLink.classList.add('active');
                        
                        // If it's in a submenu, open the submenu
                        const submenu = activeLink.closest('.sub-nav');
                        if (submenu) {
                            submenu.classList.add('show');
                            const trigger = document.querySelector(`[href="#${submenu.id}"]`);
                            if (trigger) {
                                trigger.setAttribute('aria-expanded', 'true');
                            }
                        }
                    }
                } else {
                    // Default to Dashboard if no hash
                    const dashboardLink = document.querySelector('.nav-link[href="{{route('dashboard')}}"]');
                    if (dashboardLink) {
                        dashboardLink.classList.add('active');
                    }
                }
            }

            // Handle regular link clicks
            function handleLinkClick() {
                if (!this.classList.contains('static-item')) {
                    // Remove active class from all links
                    document.querySelectorAll('.nav-link:not(.static-item)').forEach(el => {
                        el.classList.remove('active');
                    });
                    
                    // Add active class to clicked link
                    this.classList.add('active');
                    
                    // Close sidebar if in mini mode on desktop
                    if (window.innerWidth > 768 && sidebar.classList.contains('sidebar-mini')) {
                        const submenu = this.closest('.sub-nav');
                        if (submenu) {
                            submenu.classList.remove('show');
                            const trigger = document.querySelector(`[href="#${submenu.id}"]`);
                            if (trigger) {
                                trigger.setAttribute('aria-expanded', 'false');
                            }
                        }
                    }
                    
                    // Close sidebar completely on mobile
                    if (window.innerWidth <= 768) {
                        sidebar.classList.remove('sidebar-show');
                        sidebarOverlay.style.display = 'none';
                    }
                }
            }

            // Handle window resize
            function handleResize() {
                initSidebar();
            }

            // Event listeners
            sidebarToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                toggleSidebar();
            });
            
            sidebarOverlay.addEventListener('click', function() {
                if (window.innerWidth <= 768) {
                    sidebar.classList.remove('sidebar-show');
                    sidebarOverlay.style.display = 'none';
                }
            });
            
            document.addEventListener('click', handleOutsideClick);
            window.addEventListener('hashchange', setActiveLink);
            window.addEventListener('resize', handleResize);

            // Initialize submenu toggles
            document.querySelectorAll('[data-bs-toggle="collapse"]').forEach(link => {
                link.addEventListener('click', handleSubmenuToggle);
            });

            // Initialize regular links
            document.querySelectorAll('.nav-link:not([data-bs-toggle])').forEach(link => {
                link.addEventListener('click', handleLinkClick);
            });

            // Initial setup
            initSidebar();
            setActiveLink();
        });
    </script>
</body>
</html>