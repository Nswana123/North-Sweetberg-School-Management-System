<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>North Sweetberg University College - Admissions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #2c3e50;
            --secondary: #3498db;
            --accent: #e74c3c;
            --light: #ecf0f1;
            --dark: #2c3e50;
            --success: #27ae60;
            --warning: #f39c12;
            --info: #2980b9;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: var(--dark);
        }

        .navbar {
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            background: linear-gradient(135deg, var(--primary) 0%, var(--dark) 100%);
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: 1px;
        }

        .navbar-brand img {
            margin-right: 10px;
        }

        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), 
                        url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') center/cover no-repeat;
            color: white;
            padding: 120px 0;
            position: relative;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(44, 62, 80, 0.8) 0%, rgba(52, 152, 219, 0.8) 100%);
            z-index: 0;
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero-title {
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            margin-bottom: 20px;
        }

        .hero-subtitle {
            font-weight: 300;
            margin-bottom: 30px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .btn-cta {
            background-color: var(--accent);
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(231, 76, 60, 0.4);
        }

        .btn-cta:hover {
            background-color: #c0392b;
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(231, 76, 60, 0.5);
        }

        /* Application Form Styles */
        .application-form-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            margin-top: -50px;
            position: relative;
            z-index: 10;
        }

        .form-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--dark) 100%);
            color: white;
            padding: 25px;
            position: relative;
        }

        .form-header h2 {
            font-weight: 600;
            margin-bottom: 0;
        }

        .progress-container {
            height: 8px;
            background-color: #e0e0e0;
            position: relative;
        }

        .progress-bar {
            height: 100%;
            background: linear-gradient(90deg, var(--secondary) 0%, var(--info) 100%);
            transition: width 0.5s ease;
            position: relative;
        }

        .progress-bar::after {
            content: '';
            position: absolute;
            right: 0;
            top: 0;
            height: 100%;
            width: 20px;
            background: linear-gradient(90deg, rgba(52, 152, 219, 0.8) 0%, rgba(41, 128, 185, 0) 100%);
        }

        .form-step {
            padding: 30px;
            display: none;
        }

        .form-step.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .section-title {
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 25px;
            position: relative;
            padding-bottom: 10px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--secondary) 0%, var(--info) 100%);
            border-radius: 3px;
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 8px;
            color: var(--dark);
        }

        .form-control, .form-select {
            border: 2px solid #e0e0e0;
            padding: 12px 15px;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--secondary);
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        }

        .form-control[required] + label::after, 
        .form-label[required]::after {
            content: " *";
            color: var(--accent);
        }

        /* Course Cards */
        .course-card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            margin-bottom: 20px;
            cursor: pointer;
        }

        .course-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .course-card.selected {
            border: 2px solid var(--secondary);
            box-shadow: 0 0 0 4px rgba(52, 152, 219, 0.2);
        }

        .course-card-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--dark) 100%);
            color: white;
            padding: 15px;
            font-weight: 600;
        }

        .course-card-body {
            padding: 20px;
        }

        .course-card-title {
            font-weight: 600;
            margin-bottom: 10px;
        }

        .course-card-text {
            color: #7f8c8d;
            font-size: 0.9rem;
        }

        .btn-select-course {
            background-color: var(--secondary);
            border: none;
            padding: 8px 20px;
            font-weight: 500;
            border-radius: 6px;
            transition: all 0.3s;
        }

        .btn-select-course:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
        }

        /* Upload Boxes */
        .upload-box {
            border: 2px dashed #bdc3c7;
            border-radius: 10px;
            padding: 25px;
            text-align: center;
            transition: all 0.3s;
            background-color: #f8f9fa;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .upload-box:hover {
            border-color: var(--secondary);
            background-color: rgba(52, 152, 219, 0.05);
        }

        .upload-label {
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .upload-icon {
            font-size: 2.5rem;
            color: var(--secondary);
            margin-bottom: 15px;
        }

        .upload-text {
            font-weight: 500;
            margin-bottom: 10px;
        }

        .upload-hint {
            font-size: 0.8rem;
            color: #7f8c8d;
        }

        .preview-container {
            margin-top: 20px;
            width: 100%;
            min-height: 100px;
        }

        .preview-image {
            max-width: 100%;
            max-height: 200px;
            border-radius: 8px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }

        .pdf-preview {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            border: 1px solid #e0e0e0;
        }

        .pdf-preview i {
            font-size: 3rem;
            color: var(--accent);
            display: block;
            margin-bottom: 10px;
        }

        /* Review Section */
        .review-section {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 25px;
        }

        .review-item {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px dashed #e0e0e0;
        }

        .review-item:last-child {
            border-bottom: none;
        }

        .review-label {
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 5px;
        }

        .review-value {
            color: var(--dark);
        }

        /* Navigation Buttons */
        .form-navigation {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
        }

        .btn-prev-step, .btn-next-step, .btn-submit {
            padding: 12px 25px;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .btn-prev-step {
            background-color: #bdc3c7;
            border: none;
            color: var(--dark);
        }

        .btn-prev-step:hover {
            background-color: #95a5a6;
            transform: translateX(-3px);
        }

        .btn-next-step, .btn-submit {
            background: linear-gradient(135deg, var(--secondary) 0%, var(--info) 100%);
            border: none;
            color: white;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.4);
        }

        .btn-next-step:hover, .btn-submit:hover {
            transform: translateX(3px);
            box-shadow: 0 6px 20px rgba(52, 152, 219, 0.5);
        }

        .btn-submit {
            background: linear-gradient(135deg, var(--success) 0%, #2ecc71 100%);
        }

        .btn-submit:hover {
            box-shadow: 0 6px 20px rgba(46, 204, 113, 0.5);
        }

        /* Programs Section */
        .programs-section {
            padding: 80px 0;
        }

        .section-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-header h2 {
            font-weight: 700;
            color: var(--primary);
            position: relative;
            display: inline-block;
            padding-bottom: 15px;
        }

        .section-header h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, var(--secondary) 0%, var(--info) 100%);
            border-radius: 2px;
        }

        .program-card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s;
            margin-bottom: 30px;
            height: 100%;
        }

        .program-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }

        .program-card-header {
            padding: 20px;
            color: white;
            font-weight: 600;
        }

        .program-card-body {
            padding: 25px;
        }

        .program-card-title {
            font-weight: 600;
            margin-bottom: 15px;
            color: var(--primary);
        }

        .program-list {
            list-style: none;
            padding-left: 0;
        }

        .program-list li {
            margin-bottom: 10px;
            position: relative;
            padding-left: 25px;
        }

        .program-list li::before {
            content: '\f00c';
            font-family: 'bootstrap-icons';
            position: absolute;
            left: 0;
            top: 2px;
            color: var(--success);
        }

        /* Contact Section */
        .contact-section {
            padding: 80px 0;
            background-color: #f8f9fa;
        }

        .contact-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .contact-info {
            padding: 40px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--dark) 100%);
            color: white;
            height: 100%;
        }

        .contact-info h2 {
            font-weight: 600;
            margin-bottom: 30px;
            position: relative;
            padding-bottom: 15px;
        }

        .contact-info h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 3px;
            background-color: var(--secondary);
        }

        .contact-item {
            margin-bottom: 20px;
            display: flex;
            align-items: flex-start;
        }

        .contact-icon {
            font-size: 1.2rem;
            margin-right: 15px;
            color: var(--secondary);
            margin-top: 3px;
        }

        .contact-form {
            padding: 40px;
            background-color: white;
        }

        /* Footer */
        .footer {
            background: linear-gradient(135deg, var(--primary) 0%, var(--dark) 100%);
            color: white;
            padding: 50px 0 20px;
        }

        .footer-logo {
            margin-bottom: 20px;
        }

        .footer-about {
            margin-bottom: 20px;
        }

        .footer-title {
            font-weight: 600;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 2px;
            background-color: var(--secondary);
        }

        .footer-links {
            list-style: none;
            padding-left: 0;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #bdc3c7;
            text-decoration: none;
            transition: all 0.3s;
        }

        .footer-links a:hover {
            color: white;
            padding-left: 5px;
        }

        .social-links a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background-color: rgba(255,255,255,0.1);
            border-radius: 50%;
            text-align: center;
            line-height: 40px;
            color: white;
            margin-right: 10px;
            transition: all 0.3s;
        }

        .social-links a:hover {
            background-color: var(--secondary);
            transform: translateY(-3px);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 20px;
            margin-top: 30px;
            text-align: center;
        }

        /* Modal */
        .confirmation-modal .modal-content {
            border: none;
            border-radius: 15px;
            overflow: hidden;
        }

        .confirmation-modal .modal-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--dark) 100%);
            color: white;
            border: none;
        }

        .confirmation-icon {
            font-size: 5rem;
            color: var(--success);
            margin-bottom: 20px;
        }

        .confirmation-title {
            font-weight: 700;
            margin-bottom: 15px;
        }

        .student-number {
            background-color: rgba(52, 152, 219, 0.1);
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .student-number-label {
            font-weight: 600;
            color: var(--primary);
        }

        .student-number-value {
            font-weight: 700;
            color: var(--accent);
            font-size: 1.2rem;
        }

        .btn-download {
            background-color: white;
            border: 2px solid var(--secondary);
            color: var(--secondary);
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-download:hover {
            background-color: var(--secondary);
            color: white;
        }

        .btn-payment {
            background: linear-gradient(135deg, var(--success) 0%, #2ecc71 100%);
            border: none;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-payment:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(46, 204, 113, 0.5);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-section {
                padding: 80px 0;
            }
            
            .hero-title {
                font-size: 2rem;
            }
            
            .application-form-container {
                margin-top: 0;
            }
            
            .contact-info, .contact-form {
                padding: 25px;
            }
        }

   .course-card.selected {
        border: 2px solid #198754;
        box-shadow: 0 0 8px rgba(25, 135, 84, 0.6);
    }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="https://via.placeholder.com/40x40/2c3e50/ffffff?text=NSUC" alt="NSUC Logo" height="40" class="d-inline-block align-top">
                <span class="ms-2">North Sweetberg UC</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#programs">Programs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#apply">Apply Now</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container text-center hero-content">
            <h1 class="hero-title display-4 fw-bold">Begin Your Academic Journey</h1>
            <p class="hero-subtitle lead">Apply for short courses, diploma or degree programs at North Sweetberg University College and unlock your potential with our world-class education</p>
            <a href="#apply" class="btn btn-cta btn-lg">Start Application</a>
        </div>
    </section>

    <!-- Application Form -->
    <main class="container mb-5">
        <section id="apply" class="application-form">
            <div class="application-form-container">
                <div class="form-header">
                    <h2><i class="bi bi-pencil-square me-2"></i>Admission Application</h2>
                </div>
                @if ($errors->any())
    <div class="alert alert-danger">
        <strong>There were some problems with your input:</strong>
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{-- Success Message --}}
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

{{-- General Error Message --}}
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
                <div class="progress-container">
                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                
       <form id="admissionForm" method="POST" action="{{ route('admission.submit') }}" enctype="multipart/form-data" novalidate>
    @csrf   

    <!-- Step 1: Program Selection -->
    <div class="form-step active" id="step1">
        <h3 class="section-title">Select Your Program</h3>

        <input type="hidden" name="program" id="selected_program" required>

        <div class="row">
            @foreach($programs as $program)
            <div class="col-md-4 mb-4 d-flex">
                <div class="card course-card flex-fill" data-course="{{ $program->id }}">
                    <div class="course-card-header">
                        <h5 class="mb-0">{{ $program->name }}</h5>
                    </div>
                    <div class="course-card-body">
                        <p class="course-card-text">
                            <i class="bi bi-clock me-1"></i> Duration: {{ $program->duration }} years
                        </p>
                        <p class="course-card-text">
                            <i class="bi bi-cash-coin me-1"></i> Tuition:
                            {{ $program->firstFee?->amount ?? 'N/A' }} Per Year
                        </p>
                        <button type="button" class="btn btn-select-course w-100" data-program="{{ $program->id }}">
                            <i class="bi bi-check-lg me-1"></i> Select
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-end mt-4">
            <button type="button" class="btn btn-next-step" disabled>
                Next <i class="bi bi-arrow-right ms-2"></i>
            </button>
        </div>
    </div>

    <!-- Step 2: Personal Details -->
    <div class="form-step" id="step2">
        <h3 class="section-title"><i class="bi bi-person-fill me-2"></i>Personal Information</h3>
        <div class="row">
            <div class="col-md-4 mb-4">
                <label for="title" class="form-label">Title</label>
                <select class="form-select" id="title" name="title" required>
                    <option value="" selected disabled>Select</option>
                    <option value="Mr.">Mr.</option>
                    <option value="Mrs.">Mrs.</option>
                    <option value="Ms.">Ms.</option>
                    <option value="Dr.">Dr.</option>
                    <option value="Prof.">Prof.</option>
                </select>
                <div class="invalid-feedback">Please select a title.</div>
            </div>
            <div class="col-md-4 mb-4">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstName" name="first_name" required>
                <div class="invalid-feedback">Please enter your first name.</div>
            </div>
            <div class="col-md-4 mb-4">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="last_name" required>
                <div class="invalid-feedback">Please enter your last name.</div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" required>
                <div class="invalid-feedback">Please enter your date of birth.</div>
            </div>
            <div class="col-md-6 mb-4">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" id="gender" name="gender" required>
                    <option value="" selected disabled>Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                    <option value="Undisclosed">Prefer not to say</option>
                </select>
                <div class="invalid-feedback">Please select your gender.</div>
            </div>
        </div>

        <h4 class="section-title mt-5"><i class="bi bi-card-checklist me-2"></i>Identification</h4>
        <div class="row">
            <div class="col-md-12 mb-4">
                <label for="nationalId" class="form-label">National ID/Passport Number</label>
                <input type="text" class="form-control" id="nationalId" name="national_id" required>
                <div class="invalid-feedback">Please enter your National ID or Passport number.</div>
            </div>
        </div>

        <h4 class="section-title mt-5"><i class="bi bi-envelope-fill me-2"></i>Contact Details</h4>
        <div class="row">
            <div class="col-md-6 mb-4">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required>
                <small class="text-muted">Official communication will be sent here</small>
                <div class="invalid-feedback">Please enter a valid email address.</div>
            </div>
            <div class="col-md-6 mb-4">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="phone" name="phone" required>
                <div class="invalid-feedback">Please enter your phone number.</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-4">
                <label for="altPhone" class="form-label">Alternative Phone</label>
                <input type="tel" class="form-control" id="altPhone" name="altPhone">
            </div>
        </div>

        <h4 class="section-title mt-5"><i class="bi bi-house-fill me-2"></i>Residential Address</h4>
        <div class="row">
            <div class="col-md-6 mb-4">
                <label for="streetAddress" class="form-label">Street Address</label>
                <input type="text" class="form-control" id="streetAddress" name="street_address" required>
                <div class="invalid-feedback">Please enter your street address.</div>
            </div>
            <div class="col-md-6 mb-4">
                <label for="city" class="form-label">City/Town</label>
                <input type="text" class="form-control" id="city" name="city" required>
                <div class="invalid-feedback">Please enter your city or town.</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-4">
                <label for="province" class="form-label">Province</label>
                <select class="form-select" id="province" name="province" required>
                    <option value="" selected disabled>Select Province</option>
                    <option value="Central">Central</option>
                    <option value="Copperbelt">Copperbelt</option>
                    <option value="Eastern">Eastern</option>
                    <option value="Luapula">Luapula</option>
                    <option value="Lusaka">Lusaka</option>
                    <option value="Muchinga">Muchinga</option>
                    <option value="North-Western">North-Western</option>
                    <option value="Northern">Northern</option>
                    <option value="Southern">Southern</option>
                    <option value="Western">Western</option>
                </select>
                <div class="invalid-feedback">Please select your province.</div>
            </div>
            <div class="col-md-6 mb-4">
                <label for="postalCode" class="form-label">Postal Code</label>
                <input type="text" class="form-control" id="postalCode" name="postalCode">
            </div>
        </div>

        <h4 class="section-title mt-5"><i class="bi bi-person-heart me-2"></i>Next of Kin</h4>
        <div class="row">
            <div class="col-md-6 mb-4">
                <label for="nextOfKinName" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="nextOfKinName" name="next_of_kin_name" required>
                <div class="invalid-feedback">Please enter next of kin's full name.</div>
            </div>
            <div class="col-md-6 mb-4">
                <label for="nextOfKinRelationship" class="form-label">Relationship</label>
                <input type="text" class="form-control" id="nextOfKinRelationship" name="next_of_kin_relationship" required>
                <div class="invalid-feedback">Please enter the relationship.</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-4">
                <label for="nextOfKinPhone" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="nextOfKinPhone" name="next_of_kin_phone" required>
                <div class="invalid-feedback">Please enter next of kin's phone number.</div>
            </div>
            <div class="col-md-6 mb-4">
                <label for="nextOfKinAltPhone" class="form-label">Alternative Phone</label>
                <input type="tel" class="form-control" id="nextOfKinAltPhone" name="nextOfKinAltPhone">
            </div>
        </div>

        <h4 class="section-title mt-5"><i class="bi bi-book me-2"></i>Secondary Education</h4>
        <div class="row">
            <div class="col-md-6 mb-4">
                <label for="secondarySchool" class="form-label">Name of Secondary School</label>
                <input type="text" class="form-control" id="secondarySchool" name="secondary_school" required>
                <div class="invalid-feedback">Please enter your secondary school name.</div>
            </div>
            <div class="col-md-6 mb-4">
                <label for="completionYear" class="form-label">Year Completed</label>
                <input type="number" class="form-control" id="completionYear" name="completion_year" min="1950" max="2025" required>
                <div class="invalid-feedback">Please enter year completed (1950 - 2025).</div>
            </div>
        </div>

        <div class="form-navigation">
            <button type="button" class="btn btn-prev-step">
                <i class="bi bi-arrow-left me-2"></i> Back
            </button>
            <button type="button" class="btn btn-next-step">
                Continue <i class="bi bi-arrow-right ms-2"></i>
            </button>
        </div>
    </div>

    <!-- Step 3: Document Upload -->
    <div class="form-step" id="step3">
        <h3 class="section-title"><i class="bi bi-cloud-arrow-up-fill me-2"></i>Document Upload</h3>
        <div class="alert alert-info">
            <i class="bi bi-info-circle-fill me-2"></i> Please upload clear scans of your documents in PDF or JPG format (Max 5MB each)
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="upload-box">
                    <input type="file" id="idUpload" name="id_document_path" accept=".pdf,.jpg,.jpeg,.png" required>
                    <label for="idUpload" class="upload-label">
                        <i class="bi bi-upload upload-icon"></i>
                        <span class="upload-text">Upload National ID/Passport</span>
                        <span class="upload-hint">PDF, JPG or PNG (Max 5MB)</span>
                    </label>
                    <div class="preview-container" id="idPreview"></div>
                    <div class="invalid-feedback">Please upload your ID/Passport</div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="upload-box">
                    <input type="file" id="certificateUpload" name="certificates_path[]" accept=".pdf,.jpg,.jpeg,.png" multiple required>
                    <label for="certificateUpload" class="upload-label">
                        <i class="bi bi-upload upload-icon"></i>
                        <span class="upload-text">Upload Academic Certificates</span>
                        <span class="upload-hint">PDF, JPG or PNG (Max 5MB each)</span>
                    </label>
                    <div class="preview-container" id="certificatePreview"></div>
                    <div class="invalid-feedback">Please upload your certificates</div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="upload-box">
                    <input type="file" id="photoUpload" name="photo_path" accept=".jpg,.jpeg,.png">
                    <label for="photoUpload" class="upload-label">
                        <i class="bi bi-upload upload-icon"></i>
                        <span class="upload-text">Upload Profile Photo</span>
                        <span class="upload-hint">JPG or PNG (Max 5MB)</span>
                    </label>
                    <div class="preview-container" id="photoPreview"></div>
                </div>
            </div>
        </div>
        <div class="form-navigation">
            <button type="button" class="btn btn-prev-step">
                <i class="bi bi-arrow-left me-2"></i> Back
            </button>
            <button type="button" class="btn btn-next-step">
                Continue <i class="bi bi-arrow-right ms-2"></i>
            </button>
        </div>
    </div>

    <!-- Step 4: Payment -->
    <div class="form-step" id="step4">
        <h3 class="section-title"><i class="bi bi-credit-card-2-front-fill me-2"></i>Payment</h3>
        
        <div class="alert alert-info">
            <i class="bi bi-info-circle-fill me-2"></i> Payment is required to complete your application. You'll need to pay the application fee before proceeding.
        </div>

        <div class="mb-4">
            <label for="paymentMode" class="form-label">Payment Mode</label>
            <select class="form-select" id="paymentMode" name="payment_mode" required>
                <option value="" selected disabled>Select Payment Mode</option>
                <option value="mobile_money_payment">Mobile Money Payment</option>
                <option value="card">Credit/Debit Card</option>
                <option value="bank_transfer">Bank Transfer</option>
            </select>
            <div class="invalid-feedback">Please select a payment mode.</div>
        </div>

        <div class="mb-4">
            <label for="paymentAmount" class="form-label">Amount (ZMK)</label>
            <input type="number" class="form-control" id="paymentAmount" name="paymentAmount" min="0" step="0.01" required readonly value="{{ $applicationFee ?? '50.00' }}">
            <div class="invalid-feedback">Please enter a valid payment amount.</div>
        </div>

        <!-- Mobile Money Details -->
        <div id="mobileMoneyDetails" style="display:none;">
            <div class="mb-3">
                <label for="paymentNumber" class="form-label">Mobile Money Number</label>
                <input type="text" class="form-control" id="paymentNumber" name="payment_number" placeholder="e.g. 097XXXXXXX">
                <div class="invalid-feedback">Please enter payment number.</div>
            </div>
            <div class="mb-3">
                <label for="paymentReference" class="form-label">Transaction Reference</label>
                <input type="text" class="form-control" id="paymentReference" name="payment_reference" placeholder="MM transaction reference">
                <div class="invalid-feedback">Please enter transaction reference.</div>
            </div>
        </div>

        <!-- Card Payment Details -->
        <div id="cardDetails" style="display:none;">
            <div class="mb-3">
                <label for="cardNumber" class="form-label">Card Number</label>
                <input type="text" class="form-control" id="cardNumber" name="cardNumber" maxlength="19" placeholder="xxxx xxxx xxxx xxxx">
                <div class="invalid-feedback">Please enter a valid card number.</div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cardExpiry" class="form-label">Expiry Date (MM/YY)</label>
                    <input type="text" class="form-control" id="cardExpiry" name="cardExpiry" placeholder="MM/YY" maxlength="5">
                    <div class="invalid-feedback">Please enter card expiry date.</div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cardCVC" class="form-label">CVC</label>
                    <input type="text" class="form-control" id="cardCVC" name="cardCVC" maxlength="4" placeholder="123">
                    <div class="invalid-feedback">Please enter card CVC.</div>
                </div>
            </div>
        </div>

        <!-- Bank Transfer Details -->
        <div id="bankTransferDetails" style="display:none;">
            <div class="mb-3">
                <label for="bankName" class="form-label">Bank Name</label>
                <input type="text" class="form-control" id="bankName" name="bankName" placeholder="Your Bank Name">
                <div class="invalid-feedback">Please enter bank name.</div>
            </div>
            <div class="mb-3">
                <label for="accountNumber" class="form-label">Account Number</label>
                <input type="text" class="form-control" id="accountNumber" name="accountNumber" placeholder="Your Account Number">
                <div class="invalid-feedback">Please enter account number.</div>
            </div>
            <div class="mb-3">
                <label for="transactionReference" class="form-label">Transaction Reference</label>
                <input type="text" class="form-control" id="transactionReference" name="transactionReference" placeholder="Bank Transaction Reference">
                <div class="invalid-feedback">Please enter transaction reference.</div>
            </div>
        </div>

        <!-- Payment processing section -->
        <div id="paymentProcessing" style="display: none;">
            <div class="text-center py-4">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Processing payment...</span>
                </div>
                <p class="mt-3">Processing your payment. Please wait...</p>
            </div>
        </div>

        <!-- Payment verification section -->
        <div id="paymentVerification" style="display: none;">
            <div class="alert alert-success">
                <i class="bi bi-check-circle-fill me-2"></i> Payment successfully received! Verifying transaction...
            </div>
        </div>

        <div class="form-navigation">
            <button type="button" class="btn btn-prev-step">
                <i class="bi bi-arrow-left me-2"></i> Back
            </button>
            <button type="button" id="initiatePaymentBtn" class="btn btn-primary">
                <i class="bi bi-credit-card me-2"></i> Process Payment
            </button>
            <button type="button" id="continueAfterPaymentBtn" class="btn btn-next-step" style="display: none;" disabled>
                Continue <i class="bi bi-arrow-right ms-2"></i>
            </button>
        </div>
    </div>

    <!-- Step 5: Review & Submit -->
    <div class="form-step" id="step5">
        <h3 class="section-title"><i class="bi bi-card-checklist me-2"></i>Review & Submit</h3>
        <p>Please review all your details before submitting your application.</p>

        <div>
            <h5>Program Selected:</h5>
            <p id="reviewProgram"></p>

            <h5>Personal Information:</h5>
            <ul>
                <li><strong>Name:</strong> <span id="reviewName"></span></li>
                <li><strong>Date of Birth:</strong> <span id="reviewDob"></span></li>
                <li><strong>Gender:</strong> <span id="reviewGender"></span></li>
                <li><strong>National ID/Passport:</strong> <span id="reviewNationalId"></span></li>
                <li><strong>Email:</strong> <span id="reviewEmail"></span></li>
                <li><strong>Phone:</strong> <span id="reviewPhone"></span></li>
                <li><strong>Address:</strong> <span id="reviewAddress"></span></li>
                <li><strong>Province:</strong> <span id="reviewProvince"></span></li>
                <li><strong>Next of Kin:</strong> <span id="reviewNextOfKin"></span></li>
                <li><strong>Secondary School:</strong> <span id="reviewSecondarySchool"></span></li>
                <li><strong>Year Completed:</strong> <span id="reviewCompletionYear"></span></li>
            </ul>

            <h5>Documents Uploaded:</h5>
            <ul>
                <li>National ID/Passport: <span id="reviewIdUpload"></span></li>
                <li>Academic Certificates: <span id="reviewCertificateUpload"></span></li>
                <li>Profile Photo: <span id="reviewPhotoUpload"></span></li>
            </ul>

            <h5>Payment Details:</h5>
            <ul>
                <li><strong>Payment Mode:</strong> <span id="reviewPaymentMode"></span></li>
                <li><strong>Amount:</strong> $<span id="reviewPaymentAmount"></span></li>
                <li id="reviewCardInfo" style="display:none;">
                    <ul>
                        <li><strong>Card Number:</strong> <span id="reviewCardNumber"></span></li>
                        <li><strong>Expiry Date:</strong> <span id="reviewCardExpiry"></span></li>
                    </ul>
                </li>
                <li id="reviewBankInfo" style="display:none;">
                    <ul>
                        <li><strong>Bank Name:</strong> <span id="reviewBankName"></span></li>
                        <li><strong>Account Number:</strong> <span id="reviewAccountNumber"></span></li>
                        <li><strong>Transaction Reference:</strong> <span id="reviewTransactionReference"></span></li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="form-navigation">
            <button type="button" class="btn btn-prev-step">
                <i class="bi bi-arrow-left me-2"></i> Back
            </button>
            <button type="submit" class="btn btn-success">
                Submit Application <i class="bi bi-check-lg ms-2"></i>
            </button>
        </div>
    </div>
</form>
            </div>
        </section>
        
          
        <!-- Programs Section -->
        <section id="programs" class="programs-section">
            <div class="section-header">
                <h2>Our Academic Programs</h2>
                <p class="text-muted">Choose from our wide range of accredited programs</p>
            </div>
            <div class="row">
    @foreach($schools as $school)
        @php
            $degreePrograms = [];
            $diplomaPrograms = [];

            foreach ($school->departments as $department) {
                foreach ($department->programs as $program) {
                    $qual = strtolower($program->qualification);

                    if (str_contains($qual, 'degree')) {
                        $degreePrograms[] = $program->name;
                    } elseif (str_contains($qual, 'diploma')) {
                        $diplomaPrograms[] = $program->name;
                    }
                }
            }

            // Randomize background gradient colors per school (optional)
            $colors = [
                ['#2c3e50', '#34495e'],
                ['#27ae60', '#2ecc71'],
                ['#2980b9', '#3498db'],
                ['#8e44ad', '#9b59b6'],
                ['#e67e22', '#d35400'],
                ['#1abc9c', '#16a085'],
            ];
            $colorIndex = $loop->index % count($colors);
            $colorStart = $colors[$colorIndex][0];
            $colorEnd = $colors[$colorIndex][1];
        @endphp

        <div class="col-md-4 mb-4">
            <div class="program-card">
                <div class="program-card-header" style="background: linear-gradient(135deg, {{ $colorStart }} 0%, {{ $colorEnd }} 100%);">
                    <h3 class="h5 mb-0">{{ $school->name }}</h3>
                </div>
                <div class="program-card-body">
                    @if(count($degreePrograms))
                        <h4 class="program-card-title">Degree Programs</h4>
                        <ul class="program-list">
                            @foreach($degreePrograms as $program)
                                <li>{{ $program }}</li>
                            @endforeach
                        </ul>
                    @endif

                    @if(count($diplomaPrograms))
                        <h4 class="program-card-title mt-4">Diploma Programs</h4>
                        <ul class="program-list">
                            @foreach($diplomaPrograms as $program)
                                <li>{{ $program }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    @endforeach

    {{-- Short Courses --}}
    @if($shortCourses->count())
        <div class="col-md-4 mb-4">
            <div class="program-card">
                <div class="program-card-header" style="background: linear-gradient(135deg, #f39c12 0%, #f1c40f 100%);">
                    <h3 class="h5 mb-0">Short Courses</h3>
                </div>
                <div class="program-card-body">
                    <ul class="program-list">
                        @foreach($shortCourses as $course)
                            <li>{{ $course->name }}</li>
                        @endforeach
                    </ul>
                    <p class="mt-3 text-muted"><small>Duration: 3 weeks – 1 year</small></p>
                </div>
            </div>
        </div>
    @endif
</div>

            </div>
        </section>
        <!-- Contact Section -->
        <section id="contact" class="contact-section">
            <div class="section-header">
                <h2>Contact Us</h2>
                <p class="text-muted">We're here to help with any questions you may have</p>
            </div>
            
            <div class="contact-card">
                <div class="row g-0">
                    <div class="col-lg-5">
                        <div class="contact-info">
                            <h2><i class="bi bi-chat-square-text me-2"></i>Get in Touch</h2>
                            
                            <div class="contact-item">
                                <i class="bi bi-geo-alt-fill contact-icon"></i>
                                <div>
                                    <h5>Address</h5>
                                    <p>12790 Hillcrest Extension, Ndola, Zambia</p>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <i class="bi bi-telephone-fill contact-icon"></i>
                                <div>
                                    <h5>Phone</h5>
                                    <p>+260 971 884 141<br>+260 773 258 040</p>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <i class="bi bi-envelope-fill contact-icon"></i>
                                <div>
                                    <h5>Email</h5>
                                    <p>admissions@northsweetberg.edu.zm<br>info@northsweetberg.edu.zm</p>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <i class="bi bi-clock-fill contact-icon"></i>
                                <div>
                                    <h5>Office Hours</h5>
                                    <p>Monday - Friday: 8:00 AM - 5:00 PM<br>Saturday: 9:00 AM - 1:00 PM</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-7">
                        <div class="contact-form">
                            <h3 class="section-title">Send Us a Message</h3>
                            <form id="contactForm">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="contactName" class="form-label">Your Name</label>
                                        <input type="text" class="form-control" id="contactName" required>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="contactEmail" class="form-label">Email Address</label>
                                        <input type="email" class="form-control" id="contactEmail" required>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="contactSubject" class="form-label">Subject</label>
                                    <input type="text" class="form-control" id="contactSubject" required>
                                </div>
                                <div class="mb-4">
                                    <label for="contactMessage" class="form-label">Message</label>
                                    <textarea class="form-control" id="contactMessage" rows="5" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-send-fill me-2"></i> Send Message
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="footer-logo">
                        <img src="https://via.placeholder.com/40x40/ffffff/2c3e50?text=NSUC" alt="NSUC Logo" height="40">
                        <span class="ms-2">North Sweetberg UC</span>
                    </div>
                    <div class="footer-about">
                        <p>Providing quality education since 1995. Accredited by the Higher Education Authority of Zambia.</p>
                    </div>
                    <div class="social-links">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                        <a href="#"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5 class="footer-title">Quick Links</h5>
                    <ul class="footer-links">
                        <li><a href="#">Home</a></li>
                        <li><a href="#programs">Programs</a></li>
                        <li><a href="#apply">Apply Now</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li><a href="#">About Us</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="footer-title">Programs</h5>
                    <ul class="footer-links">
                        <li><a href="#">Degree Programs</a></li>
                        <li><a href="#">Diploma Programs</a></li>
                        <li><a href="#">Short Courses</a></li>
                        <li><a href="#">Online Learning</a></li>
                        <li><a href="#">Professional Development</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="footer-title">Support</h5>
                    <ul class="footer-links">
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Admissions</a></li>
                        <li><a href="#">Student Portal</a></li>
                        <li><a href="#">Payment Options</a></li>
                        <li><a href="#">Help Center</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p class="mb-0">&copy; 2023 North Sweetberg University College. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Confirmation Modal -->
    <div class="modal fade confirmation-modal" id="confirmationModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Application Submitted</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center py-4">
                    <i class="bi bi-check-circle-fill confirmation-icon"></i>
                    <h4 class="confirmation-title">Thank You for Your Application!</h4>
                    <p>Your application has been successfully submitted to North Sweetberg University College.</p>
                    
                    <div class="student-number">
                        <div class="student-number-label">Your Student Number:</div>
                        <div class="student-number-value" id="modalStudentNumber"></div>
                    </div>
                    
                    <p class="mb-4">Please save your student number for future reference. You will receive a confirmation email shortly.</p>
                    
                    <div class="d-flex justify-content-center gap-3">
                        <button id="downloadPdfBtn" class="btn btn-download">
                            <i class="bi bi-download me-2"></i> Download Summary
                        </button>
                        <button id="proceedToPaymentBtn" class="btn btn-payment">
                            <i class="bi bi-credit-card me-2"></i> Proceed to Payment
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Form steps navigation
    const formSteps = document.querySelectorAll('.form-step');
    let currentStep = 0;

    // Initialize the form by showing the first step
    showStep(currentStep);

    // Program selection
    const programCards = document.querySelectorAll('.course-card');
    const selectedProgramInput = document.getElementById('selected_program');
    const nextStepBtnStep1 = document.querySelector('#step1 .btn-next-step');

    programCards.forEach(card => {
        card.addEventListener('click', function() {
            // Remove active class from all cards
            programCards.forEach(c => c.classList.remove('active'));
            
            // Add active class to selected card
            this.classList.add('active');
            
            // Set the selected program value
            const programId = this.getAttribute('data-course');
            selectedProgramInput.value = programId;
            
            // Enable next button
            nextStepBtnStep1.disabled = false;
        });
    });

    // Next/previous step buttons
    document.querySelectorAll('.btn-next-step').forEach(button => {
        button.addEventListener('click', function() {
            if (!validateCurrentStep(currentStep)) return;
            
            // Special handling for payment step
            if (currentStep === 3) { // Payment step (index 3)
                const isPaymentVerified = selectedProgramInput.getAttribute('data-payment-verified') === 'true';
                if (!isPaymentVerified) {
                    alert('Please complete the payment process before continuing.');
                    return;
                }
            }
            
            currentStep++;
            showStep(currentStep);
        });
    });

    document.querySelectorAll('.btn-prev-step').forEach(button => {
        button.addEventListener('click', function() {
            currentStep--;
            showStep(currentStep);
        });
    });

    function showStep(stepIndex) {
        // Hide all steps
        formSteps.forEach(step => {
            step.classList.remove('active');
        });
        
        // Show current step
        formSteps[stepIndex].classList.add('active');
        
        // Update form navigation buttons
        updateNavigationButtons(stepIndex);
        
        // Special handling for review step (step 4)
        if (stepIndex === 4) {
            populateReviewSection();
        }
    }

    function updateNavigationButtons(stepIndex) {
        // Hide all next/prev buttons first
        document.querySelectorAll('.btn-prev-step, .btn-next-step').forEach(btn => {
            btn.style.display = 'inline-block';
        });
        
        // Hide previous button on first step
        if (stepIndex === 0) {
            document.querySelectorAll('.btn-prev-step').forEach(btn => {
                btn.style.display = 'none';
            });
        }
        
        // Change next button to submit on last step
        if (stepIndex === formSteps.length - 1) {
            document.querySelectorAll('.btn-next-step').forEach(btn => {
                btn.style.display = 'none';
            });
        }
    }

    function validateCurrentStep(stepIndex) {
        let isValid = true;
        const currentStep = formSteps[stepIndex];
        
        // Validate all required fields in current step
        const requiredInputs = currentStep.querySelectorAll('[required]');
        requiredInputs.forEach(input => {
            if (!input.value) {
                input.classList.add('is-invalid');
                isValid = false;
            } else {
                input.classList.remove('is-invalid');
            }
        });
        
        // Special validation for email
        if (stepIndex === 1) { // Personal details step
            const emailInput = document.getElementById('email');
            if (emailInput && !validateEmail(emailInput.value)) {
                emailInput.classList.add('is-invalid');
                isValid = false;
            }
        }
        
        // Special validation for file uploads
        if (stepIndex === 2) { // Document upload step
            const idUpload = document.getElementById('idUpload');
            const certificateUpload = document.getElementById('certificateUpload');
            
            if (idUpload && !idUpload.files.length) {
                idUpload.classList.add('is-invalid');
                isValid = false;
            }
            
            if (certificateUpload && !certificateUpload.files.length) {
                certificateUpload.classList.add('is-invalid');
                isValid = false;
            }
        }
        
        if (!isValid) {
            // Scroll to the first invalid field
            const firstInvalid = currentStep.querySelector('.is-invalid');
            if (firstInvalid) {
                firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        }
        
        return isValid;
    }

    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    // Document upload preview
    document.getElementById('idUpload').addEventListener('change', function(e) {
        previewFile(e.target, 'idPreview');
    });

    document.getElementById('certificateUpload').addEventListener('change', function(e) {
        previewMultipleFiles(e.target, 'certificatePreview');
    });

    document.getElementById('photoUpload').addEventListener('change', function(e) {
        previewFile(e.target, 'photoPreview');
    });

    function previewFile(input, previewId) {
        const previewContainer = document.getElementById(previewId);
        previewContainer.innerHTML = '';
        
        if (input.files && input.files[0]) {
            const file = input.files[0];
            const reader = new FileReader();
            
            reader.onload = function(e) {
                if (file.type.includes('image')) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('preview-image');
                    previewContainer.appendChild(img);
                } else if (file.type === 'application/pdf') {
                    const pdfIcon = document.createElement('i');
                    pdfIcon.className = 'bi bi-file-earmark-pdf preview-icon';
                    previewContainer.appendChild(pdfIcon);
                }
                
                const fileName = document.createElement('p');
                fileName.textContent = file.name;
                fileName.classList.add('preview-filename');
                previewContainer.appendChild(fileName);
            };
            
            reader.readAsDataURL(file);
        }
    }

    function previewMultipleFiles(input, previewId) {
        const previewContainer = document.getElementById(previewId);
        previewContainer.innerHTML = '';
        
        if (input.files && input.files.length > 0) {
            for (let i = 0; i < input.files.length; i++) {
                const file = input.files[i];
                const reader = new FileReader();
                
                reader.onload = (function(file) {
                    return function(e) {
                        const filePreview = document.createElement('div');
                        filePreview.classList.add('file-preview');
                        
                        if (file.type.includes('image')) {
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.classList.add('preview-image');
                            filePreview.appendChild(img);
                        } else if (file.type === 'application/pdf') {
                            const pdfIcon = document.createElement('i');
                            pdfIcon.className = 'bi bi-file-earmark-pdf preview-icon';
                            filePreview.appendChild(pdfIcon);
                        }
                        
                        const fileName = document.createElement('p');
                        fileName.textContent = file.name;
                        fileName.classList.add('preview-filename');
                        filePreview.appendChild(fileName);
                        
                        previewContainer.appendChild(filePreview);
                    };
                })(file);
                
                reader.readAsDataURL(file);
            }
        }
    }

    // Payment mode toggle
    const paymentMode = document.getElementById('paymentMode');
    const mobileMoneyDetails = document.getElementById('mobileMoneyDetails');
    const cardDetails = document.getElementById('cardDetails');
    const bankTransferDetails = document.getElementById('bankTransferDetails');

    paymentMode.addEventListener('change', function() {
        mobileMoneyDetails.style.display = 'none';
        cardDetails.style.display = 'none';
        bankTransferDetails.style.display = 'none';

        if (this.value === 'mobile_money_payment') {
            mobileMoneyDetails.style.display = 'block';
        } else if (this.value === 'card') {
            cardDetails.style.display = 'block';
        } else if (this.value === 'bank_transfer') {
            bankTransferDetails.style.display = 'block';
        }
    });

    // Payment processing
    const initiatePaymentBtn = document.getElementById('initiatePaymentBtn');
    const continueAfterPaymentBtn = document.getElementById('continueAfterPaymentBtn');
    const paymentProcessing = document.getElementById('paymentProcessing');
    const paymentVerification = document.getElementById('paymentVerification');

    initiatePaymentBtn.addEventListener('click', function() {
        // Validate payment form first
        if (!validatePaymentForm()) {
            return;
        }

        // Show processing UI
        initiatePaymentBtn.disabled = true;
        paymentProcessing.style.display = 'block';

        // Simulate payment processing (in a real app, this would call your payment API)
        setTimeout(function() {
            paymentProcessing.style.display = 'none';
            paymentVerification.style.display = 'block';

            // Simulate payment verification
            setTimeout(function() {
                paymentVerification.style.display = 'none';
                
                // Show success and enable continue button
                alert('Payment successful! You can now continue with your application.');
                continueAfterPaymentBtn.disabled = false;
                continueAfterPaymentBtn.style.display = 'inline-block';
                initiatePaymentBtn.style.display = 'none';
                
                // Store payment verification in a hidden field
                selectedProgramInput.setAttribute('data-payment-verified', 'true');
            }, 2000);
        }, 3000);
    });

    function validatePaymentForm() {
        let isValid = true;
        const paymentModeValue = paymentMode.value;

        // Validate payment mode
        if (!paymentModeValue) {
            paymentMode.classList.add('is-invalid');
            isValid = false;
        } else {
            paymentMode.classList.remove('is-invalid');
        }

        // Validate payment amount
        const paymentAmount = document.getElementById('paymentAmount');
        if (!paymentAmount.value || parseFloat(paymentAmount.value) <= 0) {
            paymentAmount.classList.add('is-invalid');
            isValid = false;
        } else {
            paymentAmount.classList.remove('is-invalid');
        }

        // Validate payment details based on mode
        if (paymentModeValue === 'mobile_money_payment') {
            const paymentNumber = document.getElementById('paymentNumber');
            const paymentReference = document.getElementById('paymentReference');
            
            if (!paymentNumber.value) {
                paymentNumber.classList.add('is-invalid');
                isValid = false;
            } else {
                paymentNumber.classList.remove('is-invalid');
            }
            
            if (!paymentReference.value) {
                paymentReference.classList.add('is-invalid');
                isValid = false;
            } else {
                paymentReference.classList.remove('is-invalid');
            }
        } else if (paymentModeValue === 'card') {
            const cardNumber = document.getElementById('cardNumber');
            const cardExpiry = document.getElementById('cardExpiry');
            const cardCVC = document.getElementById('cardCVC');
            
            if (!cardNumber.value || cardNumber.value.replace(/\s/g, '').length < 16) {
                cardNumber.classList.add('is-invalid');
                isValid = false;
            } else {
                cardNumber.classList.remove('is-invalid');
            }
            
            if (!cardExpiry.value || !/^\d{2}\/\d{2}$/.test(cardExpiry.value)) {
                cardExpiry.classList.add('is-invalid');
                isValid = false;
            } else {
                cardExpiry.classList.remove('is-invalid');
            }
            
            if (!cardCVC.value || cardCVC.value.length < 3) {
                cardCVC.classList.add('is-invalid');
                isValid = false;
            } else {
                cardCVC.classList.remove('is-invalid');
            }
        } else if (paymentModeValue === 'bank_transfer') {
            const bankName = document.getElementById('bankName');
            const accountNumber = document.getElementById('accountNumber');
            const transactionReference = document.getElementById('transactionReference');
            
            if (!bankName.value) {
                bankName.classList.add('is-invalid');
                isValid = false;
            } else {
                bankName.classList.remove('is-invalid');
            }
            
            if (!accountNumber.value) {
                accountNumber.classList.add('is-invalid');
                isValid = false;
            } else {
                accountNumber.classList.remove('is-invalid');
            }
            
            if (!transactionReference.value) {
                transactionReference.classList.add('is-invalid');
                isValid = false;
            } else {
                transactionReference.classList.remove('is-invalid');
            }
        }

        if (!isValid) {
            // Scroll to the first invalid field
            const firstInvalid = document.querySelector('#step4 .is-invalid');
            if (firstInvalid) {
                firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        }

        return isValid;
    }

    // Populate review section
    function populateReviewSection() {
        // Program
        const selectedProgramCard = document.querySelector('.course-card.active');
        if (selectedProgramCard) {
            document.getElementById('reviewProgram').textContent = selectedProgramCard.querySelector('h5').textContent;
        }

        // Personal Information
        document.getElementById('reviewName').textContent = 
            `${document.getElementById('title').value} ${document.getElementById('firstName').value} ${document.getElementById('lastName').value}`;
        document.getElementById('reviewDob').textContent = document.getElementById('dob').value;
        document.getElementById('reviewGender').textContent = document.getElementById('gender').value;
        document.getElementById('reviewNationalId').textContent = document.getElementById('nationalId').value;
        document.getElementById('reviewEmail').textContent = document.getElementById('email').value;
        document.getElementById('reviewPhone').textContent = document.getElementById('phone').value;
        document.getElementById('reviewAddress').textContent = 
            `${document.getElementById('streetAddress').value}, ${document.getElementById('city').value}`;
        document.getElementById('reviewProvince').textContent = document.getElementById('province').value;
        document.getElementById('reviewNextOfKin').textContent = 
            `${document.getElementById('nextOfKinName').value} (${document.getElementById('nextOfKinRelationship').value}) - ${document.getElementById('nextOfKinPhone').value}`;
        document.getElementById('reviewSecondarySchool').textContent = document.getElementById('secondarySchool').value;
        document.getElementById('reviewCompletionYear').textContent = document.getElementById('completionYear').value;

        // Documents
        const idUpload = document.getElementById('idUpload');
        if (idUpload.files.length > 0) {
            document.getElementById('reviewIdUpload').textContent = idUpload.files[0].name;
        }

        const certificateUpload = document.getElementById('certificateUpload');
        if (certificateUpload.files.length > 0) {
            document.getElementById('reviewCertificateUpload').textContent = 
                `${certificateUpload.files.length} file(s) uploaded`;
        }

        const photoUpload = document.getElementById('photoUpload');
        if (photoUpload.files.length > 0) {
            document.getElementById('reviewPhotoUpload').textContent = photoUpload.files[0].name;
        } else {
            document.getElementById('reviewPhotoUpload').textContent = 'Not provided';
        }

        // Payment Details
        document.getElementById('reviewPaymentMode').textContent = 
            document.getElementById('paymentMode').options[document.getElementById('paymentMode').selectedIndex].text;
        document.getElementById('reviewPaymentAmount').textContent = document.getElementById('paymentAmount').value;

        // Hide all payment method details first
        document.getElementById('reviewCardInfo').style.display = 'none';
        document.getElementById('reviewBankInfo').style.display = 'none';

        // Show specific payment method details
        if (paymentMode.value === 'card') {
            document.getElementById('reviewCardInfo').style.display = 'block';
            document.getElementById('reviewCardNumber').textContent = document.getElementById('cardNumber').value;
            document.getElementById('reviewCardExpiry').textContent = document.getElementById('cardExpiry').value;
        } else if (paymentMode.value === 'bank_transfer') {
            document.getElementById('reviewBankInfo').style.display = 'block';
            document.getElementById('reviewBankName').textContent = document.getElementById('bankName').value;
            document.getElementById('reviewAccountNumber').textContent = document.getElementById('accountNumber').value;
            document.getElementById('reviewTransactionReference').textContent = document.getElementById('transactionReference').value;
        }
    }

    // Form submission
    document.getElementById('admissionForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validate all steps before submission
        for (let i = 0; i < formSteps.length; i++) {
            if (!validateCurrentStep(i)) {
                alert('Please complete all required fields before submitting.');
                showStep(i);
                return;
            }
        }
        
        // Check if payment is verified
        const isPaymentVerified = selectedProgramInput.getAttribute('data-payment-verified') === 'true';
        if (!isPaymentVerified) {
            alert('Please complete the payment process before submitting.');
            showStep(3); // Show payment step
            return;
        }
        
        // If everything is valid, submit the form
        this.submit();
    });
});
</script>
</body>
</html>