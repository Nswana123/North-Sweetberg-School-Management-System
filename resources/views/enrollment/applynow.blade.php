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

                <div class="progress-container">
                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                
                <form id="admissionForm" novalidate>
                    <!-- Step 1: Program Selection -->
                    <div class="form-step active" id="step1">
  <div class="col-md-6 mb-4">
    <label for="schoolSelect" class="form-label">School/Faculty</label>
    <select class="form-select" id="schoolSelect" required>
        <option value="" selected disabled>-- Select School --</option>
        @foreach($schools as $school)
            <option value="{{ $school->id }}">{{ $school->name }}</option>
        @endforeach
    </select>
</div>

<div class="col-md-6 mb-4">
    <label for="programLevel" class="form-label">Program Level</label>
    <select class="form-select" id="programLevel" required>
        <option value="" selected disabled>-- Select Level --</option>
        <option value="degree">Degree Program</option>
        <option value="diploma">Diploma Program</option>
        <option value="short" class="short-only" style="display:none">Short Course</option>
    </select>
</div>

                        
                        <div id="courseContainer" class="row mt-3 d-none">
                            <!-- Courses will be loaded here dynamically -->
                        </div>
                        
                        <div class="d-flex justify-content-end mt-4">
                            <button type="button" class="btn btn-next-step" disabled>Next <i class="bi bi-arrow-right ms-2"></i></button>
                        </div>
                    </div>
                    
                    <!-- Step 2: Personal Details -->
                    <div class="form-step" id="step2">
                        <h3 class="section-title"><i class="bi bi-person-fill me-2"></i>Personal Information</h3>
                        
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <label for="title" class="form-label">Title</label>
                                <select class="form-select" id="title" required>
                                    <option value="" selected disabled>Select</option>
                                    <option value="mr">Mr.</option>
                                    <option value="mrs">Mrs.</option>
                                    <option value="ms">Ms.</option>
                                    <option value="dr">Dr.</option>
                                    <option value="prof">Prof.</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" required>
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-select" id="gender" required>
                                    <option value="" selected disabled>Select</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                    <option value="undisclosed">Prefer not to say</option>
                                </select>
                            </div>
                        </div>

                        <h4 class="section-title mt-5"><i class="bi bi-card-checklist me-2"></i>Identification</h4>
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label for="nationalId" class="form-label">National ID/Passport Number</label>
                                <input type="text" class="form-control" id="nationalId" required>
                            </div>
                        </div>

                        <h4 class="section-title mt-5"><i class="bi bi-envelope-fill me-2"></i>Contact Details</h4>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" required>
                                <small class="text-muted">Official communication will be sent here</small>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="altPhone" class="form-label">Alternative Phone</label>
                                <input type="tel" class="form-control" id="altPhone">
                            </div>
                        </div>

                        <h4 class="section-title mt-5"><i class="bi bi-house-fill me-2"></i>Residential Address</h4>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="streetAddress" class="form-label">Street Address</label>
                                <input type="text" class="form-control" id="streetAddress" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="city" class="form-label">City/Town</label>
                                <input type="text" class="form-control" id="city" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="province" class="form-label">Province</label>
                                <select class="form-select" id="province" required>
                                    <option value="" selected disabled>Select Province</option>
                                    <option value="central">Central</option>
                                    <option value="copperbelt">Copperbelt</option>
                                    <option value="eastern">Eastern</option>
                                    <option value="luapula">Luapula</option>
                                    <option value="lusaka">Lusaka</option>
                                    <option value="muchinga">Muchinga</option>
                                    <option value="north-western">North-Western</option>
                                    <option value="northern">Northern</option>
                                    <option value="southern">Southern</option>
                                    <option value="western">Western</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="postalCode" class="form-label">Postal Code</label>
                                <input type="text" class="form-control" id="postalCode">
                            </div>
                        </div>

                        <h4 class="section-title mt-5"><i class="bi bi-person-heart me-2"></i>Next of Kin</h4>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="nextOfKinName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="nextOfKinName" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="nextOfKinRelationship" class="form-label">Relationship</label>
                                <input type="text" class="form-control" id="nextOfKinRelationship" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="nextOfKinPhone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="nextOfKinPhone" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="nextOfKinAltPhone" class="form-label">Alternative Phone</label>
                                <input type="tel" class="form-control" id="nextOfKinAltPhone">
                            </div>
                        </div>

                        <h4 class="section-title mt-5"><i class="bi bi-book me-2"></i>Secondary Education</h4>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="secondarySchool" class="form-label">Name of Secondary School</label>
                                <input type="text" class="form-control" id="secondarySchool" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="completionYear" class="form-label">Year Completed</label>
                                <input type="number" class="form-control" id="completionYear" min="1950" max="2025" required>
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
                                    <input type="file" id="idUpload" accept=".pdf,.jpg,.jpeg,.png" required>
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
                                    <input type="file" id="certificateUpload" accept=".pdf,.jpg,.jpeg,.png" multiple required>
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
                                    <input type="file" id="photoUpload" accept=".jpg,.jpeg,.png">
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
                    
                    <!-- Step 4: Review & Submit -->
                    <div class="form-step" id="step4">
                        <h3 class="section-title"><i class="bi bi-check-circle-fill me-2"></i>Review Your Application</h3>
                        
                        <div class="review-section mb-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="section-title">Personal Information</h5>
                                    <div class="review-item">
                                        <div class="review-label">Full Name</div>
                                        <div class="review-value" id="reviewName"></div>
                                    </div>
                                    <div class="review-item">
                                        <div class="review-label">Date of Birth</div>
                                        <div class="review-value" id="reviewDob"></div>
                                    </div>
                                    <div class="review-item">
                                        <div class="review-label">Gender</div>
                                        <div class="review-value" id="reviewGender"></div>
                                    </div>
                                    <div class="review-item">
                                        <div class="review-label">National ID/Passport</div>
                                        <div class="review-value" id="reviewNationalId"></div>
                                    </div>
                                    <div class="review-item">
                                        <div class="review-label">Email</div>
                                        <div class="review-value" id="reviewEmail"></div>
                                    </div>
                                    <div class="review-item">
                                        <div class="review-label">Phone</div>
                                        <div class="review-value" id="reviewPhone"></div>
                                    </div>
                                    <div class="review-item">
                                        <div class="review-label">Address</div>
                                        <div class="review-value" id="reviewAddress"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="section-title">Additional Information</h5>
                                    <div class="review-item">
                                        <div class="review-label">Next of Kin</div>
                                        <div class="review-value" id="reviewNextOfKin"></div>
                                    </div>
                                    <div class="review-item">
                                        <div class="review-label">Secondary School</div>
                                        <div class="review-value" id="reviewSecondarySchool"></div>
                                    </div>
                                    <div class="review-item">
                                        <div class="review-label">Year Completed</div>
                                        <div class="review-value" id="reviewCompletionYear"></div>
                                    </div>
                                    <div class="review-item">
                                        <div class="review-label">School</div>
                                        <div class="review-value" id="reviewSchool"></div>
                                    </div>
                                    <div class="review-item">
                                        <div class="review-label">Program Level</div>
                                        <div class="review-value" id="reviewProgram"></div>
                                    </div>
                                    <div class="review-item">
                                        <div class="review-label">Course</div>
                                        <div class="review-value" id="reviewCourse"></div>
                                    </div>
                                    <div class="review-item">
                                        <div class="review-label">Documents Uploaded</div>
                                        <div class="review-value" id="reviewDocs"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="declaration" required>
                            <label class="form-check-label" for="declaration">
                                I declare that all information provided is accurate and complete. I understand that providing false information may result in the rejection of my application.
                            </label>
                            <div class="invalid-feedback">You must accept the declaration</div>
                        </div>
                        
                        <div class="form-navigation">
                            <button type="button" class="btn btn-prev-step">
                                <i class="bi bi-arrow-left me-2"></i> Back
                            </button>
                            <button type="submit" class="btn btn-submit">
                                <i class="bi bi-send-fill me-2"></i> Submit Application
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
                <div class="col-md-4">
                    <div class="program-card">
                        <div class="program-card-header" style="background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);">
                            <h3 class="h5 mb-0">School of Engineering</h3>
                        </div>
                        <div class="program-card-body">
                            <h4 class="program-card-title">Degree Programs</h4>
                            <ul class="program-list">
                                <li>BEng in Civil Engineering</li>
                                <li>BEng in Electrical Engineering</li>
                                <li>BEng in Mechanical Engineering</li>
                                <li>BEng in Mechatronics</li>
                                <li>BEng in Chemical Engineering</li>
                            </ul>
                            
                            <h4 class="program-card-title mt-4">Diploma Programs</h4>
                            <ul class="program-list">
                                <li>Dip in Civil Engineering</li>
                                <li>Dip in Electrical Engineering</li>
                                <li>Dip in Mechanical Engineering</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="program-card">
                        <div class="program-card-header" style="background: linear-gradient(135deg, #27ae60 0%, #2ecc71 100%);">
                            <h3 class="h5 mb-0">School of Humanities & Business</h3>
                        </div>
                        <div class="program-card-body">
                            <h4 class="program-card-title">Degree Programs</h4>
                            <ul class="program-list">
                                <li>Bachelor of Science in Marketing</li>
                                <li>Bachelor of Management</li>
                                <li>Bachelor of Arts in Economics</li>
                                <li>Bachelor of Accounting</li>
                            </ul>
                            
                            <h4 class="program-card-title mt-4">Diploma Programs</h4>
                            <ul class="program-list">
                                <li>Diploma in Business Administration</li>
                                <li>Diploma in Accountancy</li>
                                <li>Diploma in Marketing</li>
                                <li>Diploma in Human Resources</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="program-card">
                        <div class="program-card-header" style="background: linear-gradient(135deg, #f39c12 0%, #f1c40f 100%);">
                            <h3 class="h5 mb-0">Short Courses</h3>
                        </div>
                        <div class="program-card-body">
                            <ul class="program-list">
                                <li>General Agriculture</li>
                                <li>Auto Mechanics</li>
                                <li>Travel & Tourism</li>
                                <li>Solar Installation</li>
                                <li>Graphic Design & GIS</li>
                                <li>Food Production & Catering</li>
                                <li>ICT Fundamentals</li>
                                <li>Entrepreneurship</li>
                            </ul>
                            <p class="mt-3 text-muted"><small>Duration: 3 weeks - 1 year</small></p>
                        </div>
                    </div>
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
        // Bootstrap modal
        const modal = new bootstrap.Modal(document.getElementById('confirmationModal'));

        // Steps
        const form = document.getElementById('admissionForm');
        const steps = document.querySelectorAll('.form-step');
        const progressBar = document.querySelector('.progress-bar');
        let currentStep = 0;

        // Course data
        const courses = {
            engineering: {
                degree: [
                    "BEng in Civil Engineering",
                    "BEng in Electrical Engineering",
                    "BEng in Mechanical Engineering",
                    "BEng in Mechatronics Engineering",
                    "BEng in Quantity Surveying",
                    "BEng in Chemical Engineering",
                    "BEng in Environmental Engineering",
                    "BEng in Geology Engineering",
                    "BEng in Mining Engineering",
                    "BEng in Metallurgy Engineering"
                ],
                diploma: [
                    "Dip in Civil Engineering",
                    "Dip in Electrical Engineering",
                    "Dip in Mechanical Engineering",
                    "Dip in Mechatronics Engineering",
                    "Dip in Quantity Surveying",
                    "Dip in Chemical Engineering",
                    "Dip in Environmental Engineering",
                    "Dip in Geology Engineering",
                    "Dip in Mining Engineering",
                    "Dip in Metallurgy Engineering"
                ]
            },
            humanities: {
                degree: [
                    "Bachelor of Science in Marketing",
                    "Bachelor of Management in Strategic Management",
                    "Bachelor of Management in Supply Chain Management",
                    "Bachelor of Management in Process Management"
                ],
                diploma: [
                    "Diploma in Business Administration",
                    "Diploma in Accountancy",
                    "Diploma in Marketing",
                    "Diploma in Political Science",
                    "Diploma in Human Resource Management",
                    "Diploma in Banking and Finance",
                    "Diploma in Accounts and Finance",
                    "Diploma in Business Management",
                    "Diploma in Energy Management",
                    "Diploma in Banking and Insurance",
                    "Diploma in Operational Management",
                    "Diploma in Supply Chain Management",
                    "Diploma in Strategic Management"
                ]
            },
            agriculture: {
                degree: [
                    "BSc in Agriculture Economics",
                    "BSc in Agriculture Science (Animal Science)",
                    "BSc in Agriculture Science (Crop Science)",
                    "BSc in Agriculture Science with Education"
                ],
                diploma: [
                    "Diploma in Agriculture Economics",
                    "Diploma in Animal Science",
                    "Diploma in Crop Science"
                ]
            },
            education: {
                degree: [
                    "Bachelor of Arts with Education",
                    "Bachelor of Arts in Music",
                    "Bachelor of Education in Special Education",
                    "Bachelor of Arts in Peace and Conflict Studies",
                    "Bachelor of Science with Education",
                    "Bachelor of Education in Early Childhood",
                    "Bachelor of Education in Primary Education",
                    "Bachelor of ICT with Education",
                    "Bachelor of Science in Home Economics",
                    "Bachelor of Science in Design & Technology with Education",
                    "Bachelor of Science in Textile and Technology with Education",
                    "Bachelor of Science in Food and Nutrition with Education",
                    "Bachelor of Science in Fashion and Design with Education"
                ],
                diploma: [
                    "Diploma in Education (Secondary)",
                    "Diploma in Teaching Methodology",
                    "Diploma in Education (Early Childhood)",
                    "Diploma in Education (Primary)"
                ]
            },
            short: {
                short: [
                    "General Agriculture",
                    "Auto Mechanics",
                    "Travel & Tourism",
                    "Tile Fixing",
                    "Solar Installation",
                    "Panel Beating",
                    "Occupational Health & Safety",
                    "Agribusiness",
                    "Psychosocial Counseling",
                    "Entrepreneurship",
                    "Graphic Design & GIS",
                    "General Hospitality",
                    "Hotel & Tourism",
                    "Records Management",
                    "Cosmetology",
                    "Automotive Electrical",
                    "Home Management",
                    "Fashion Design",
                    "Food Production & Catering",
                    "Transport & Logistics",
                    "Painting",
                    "Sign Writing & Decorating",
                    "Heavy Duty Operations",
                    "Secretarial & Computer Studies",
                    "Research Methodology",
                    "Project Planning & Management",
                    "Community Development",
                    "Remote Sensing & GIS",
                    "Monitoring & Evaluation",
                    "Human Resource Management",
                    "Social Work",
                    "Research Methods",
                    "Food Safety",
                    "Carpentry",
                    "Plumbing",
                    "Metal Fabrication",
                    "Building & Plastering",
                    "Power Electrical",
                    "Driving",
                    "Security Management"
                ]
            }
        };

        // Tuition fees (sample data)
        const tuitionFees = {
            engineering: {
                degree: 8500,
                diploma: 5500
            },
            humanities: {
                degree: 7500,
                diploma: 5000
            },
            agriculture: {
                degree: 8000,
                diploma: 5200
            },
            education: {
                degree: 7800,
                diploma: 5100
            },
            short: {
                short: 1500
            }
        };

        // Initialize form
        showStep(currentStep);

        // School select change handler
    // Update the school select change handler
document.getElementById('schoolSelect').addEventListener('change', function() {
    const schoolId = this.value;
    const programLevelSelect = document.getElementById('programLevel');
    const shortOption = programLevelSelect.querySelector('.short-only');
    
    // Show/hide short course option based on school selection
    if (schoolId === '5') { // Assuming '5' is your short courses school ID
        shortOption.style.display = 'block';
    } else {
        shortOption.style.display = 'none';
        programLevelSelect.value = '';
    }
    
    document.getElementById('courseContainer').classList.add('d-none');
    document.querySelector('.btn-next-step').disabled = true;
});

// Update the program level change handler
document.getElementById('programLevel').addEventListener('change', function() {
    const schoolId = document.getElementById('schoolSelect').value;
    const programLevel = this.value;
    
    if (schoolId && programLevel) {
        loadCourses(schoolId, programLevel);
    } else {
        document.getElementById('courseContainer').classList.add('d-none');
        document.querySelector('.btn-next-step').disabled = true;
    }
});

// Update the loadCourses function
function loadCourses(schoolId, programLevel) {
    console.log(`Loading courses for school: ${schoolId}, level: ${programLevel}`); // Debug log
    
    const courseContainer = document.getElementById('courseContainer');
    courseContainer.innerHTML = '<div class="col-12 text-center py-4"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>';
    
    fetch(`/api/programs?school_id=${schoolId}&level=${programLevel}`)
        .then(response => { 
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(programs => {
            console.log('API Response:', programs); // Debug log
            if (!Array.isArray(programs)) {
                throw new Error('Invalid response format - expected array');
            }
            
            courseContainer.innerHTML = '';
            
            if (programs.length === 0) {
                courseContainer.innerHTML = '<div class="col-12 text-center py-4"><p>No programs available for this selection</p></div>';
                return;
            }
            programs.forEach(program => {
                const courseCard = document.createElement('div');
                courseCard.className = 'col-md-4 mb-3';
                courseCard.innerHTML = `
                    <div class="card course-card" data-course="${program.name}" data-program-id="${program.id}">
                        <div class="course-card-header">
                            <h5 class="mb-0">${program.name}</h5>
                        </div>
                        <div class="course-card-body">
                            <p class="course-card-text">
                                <i class="bi bi-clock me-1"></i> Duration: ${program.duration}
                            </p>
                            <p class="course-card-text">
                                <i class="bi bi-cash-coin me-1"></i> Tuition: ZMW ${program.fees[0]?.amount?.toLocaleString() || 'N/A'}/year
                            </p>
                            <button type="button" class="btn btn-select-course w-100">
                                <i class="bi bi-check-lg me-1"></i> Select
                            </button>
                        </div>
                    </div>
                `;
                courseContainer.appendChild(courseCard);
            });
            
            courseContainer.classList.remove('d-none');
            document.querySelectorAll('.btn-select-course').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    document.querySelectorAll('.course-card').forEach(c => c.classList.remove('selected'));
                    this.closest('.course-card').classList.add('selected');
                    document.querySelector('.btn-next-step').disabled = false;
                });
            });
        })
        .catch(error => {
            console.error('Error loading programs:', error);
            courseContainer.innerHTML = '<div class="col-12 text-center py-4"><p>Error loading programs. Please try again.</p></div>';
        });
}
        // Next step buttons
        document.querySelectorAll('.btn-next-step').forEach(button => {
            button.addEventListener('click', function() {
                if (validateStep(currentStep)) {
                    currentStep++;
                    showStep(currentStep);
                    updateProgressBar();
                }
            });
        });

        // Previous step buttons
        document.querySelectorAll('.btn-prev-step').forEach(button => {
            button.addEventListener('click', function() {
                currentStep--;
                showStep(currentStep);
                updateProgressBar();
            });
        });

        // File upload handlers
        document.getElementById('idUpload').addEventListener('change', function(e) {
            handleFileUpload(e, 'idPreview');
        });
        document.getElementById('certificateUpload').addEventListener('change', function(e) {
            handleFileUpload(e, 'certificatePreview', true);
        });
        document.getElementById('photoUpload').addEventListener('change', function(e) {
            handleFileUpload(e, 'photoPreview');
        });

        // Form submission
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            if (validateStep(currentStep)) {
                const studentNumber = generateStudentNumber();
                document.getElementById('modalStudentNumber').textContent = studentNumber;
                modal.show();
            }
        });

        // PDF download button
        document.getElementById('downloadPdfBtn').addEventListener('click', function() {
            generatePdf();
        });

        // Proceed to payment button
        document.getElementById('proceedToPaymentBtn').addEventListener('click', function() {
            alert('Redirecting to payment gateway...');
            modal.hide();
        });

        // Contact form submission
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Thank you for your message. We will contact you soon.');
            this.reset();
        });

        // Functions
        function showStep(stepIndex) {
            steps.forEach((step, index) => {
                step.classList.toggle('active', index === stepIndex);
            });
            
            // Always update the review section when showing step 3 (review)
            if (stepIndex === 3) {
                updateReviewSection();
            }
        }
        
        function updateProgressBar() {
            const progress = ((currentStep + 1) / steps.length) * 100;
            progressBar.style.width = `${progress}%`;
            progressBar.setAttribute('aria-valuenow', progress);
        }
        
        function validateStep(stepIndex) {
            let isValid = true;
            switch (stepIndex) {
                case 0: // Program selection
                    const school = document.getElementById('schoolSelect').value;
                    const programLevel = document.getElementById('programLevel').value;
                    const courseSelected = document.querySelector('.course-card.selected');
                    if (!school || !programLevel || !courseSelected) {
                        isValid = false;
                        alert('Please select a school, program level, and course');
                    }
                    break;
                case 1: // Personal details
                    const requiredFields = [
                        'title', 'firstName', 'lastName', 'dob', 'gender', 
                        'nationalId', 'email', 'phone',
                        'streetAddress', 'city', 'province',
                        'nextOfKinName', 'nextOfKinRelationship', 'nextOfKinPhone',
                        'secondarySchool', 'completionYear'
                    ];
                    requiredFields.forEach(fieldId => {
                        const field = document.getElementById(fieldId);
                        if (!field.value.trim()) {
                            field.classList.add('is-invalid');
                            isValid = false;
                        } else {
                            field.classList.remove('is-invalid');
                        }
                    });
                    // Email validation
                    const email = document.getElementById('email').value;
                    if (email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                        document.getElementById('email').classList.add('is-invalid');
                        isValid = false;
                    }
                    // Phone validation
                    const phone = document.getElementById('phone').value;
                    if (phone && !/^[\d\s+-]{10,15}$/.test(phone)) {
                        document.getElementById('phone').classList.add('is-invalid');
                        isValid = false;
                    }
                    // Year validation
                    const completionYear = document.getElementById('completionYear').value;
                    if (completionYear && (completionYear < 1950 || completionYear > 2025)) {
                        document.getElementById('completionYear').classList.add('is-invalid');
                        isValid = false;
                    }
                    if (!isValid) {
                        alert('Please fill in all required fields with valid information');
                        document.querySelector('.is-invalid').scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                    }
                    break;
                case 2: // Document upload
                    const idUpload = document.getElementById('idUpload').files.length;
                    const certUpload = document.getElementById('certificateUpload').files.length;
                    if (!idUpload || !certUpload) {
                        isValid = false;
                        alert('Please upload required documents (ID and Certificates)');
                    }
                    break;
                case 3: // Review
                    if (!document.getElementById('declaration').checked) {
                        document.getElementById('declaration').classList.add('is-invalid');
                        isValid = false;
                        alert('Please accept the declaration to proceed');
                    } else {
                        document.getElementById('declaration').classList.remove('is-invalid');
                        updateReviewSection();
                    }
                    break;
            }
            return isValid;
        }
        
  // Modify the loadCourses function to fetch from the server
// Modify the loadCourses function to fetch from the server
function loadCourses(schoolId, programLevel) {
    const courseContainer = document.getElementById('courseContainer');
    courseContainer.innerHTML = '<div class="col-12 text-center py-4"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>';
    
    // Fetch programs from the server
    fetch(`/api/programs?school_id=${schoolId}&level=${programLevel}`)
        .then(response => response.json())
        .then(programs => {
            courseContainer.innerHTML = '';
            
            if (programs.length === 0) {
                courseContainer.innerHTML = '<div class="col-12 text-center py-4"><p>No programs available for this selection</p></div>';
                return;
            }
            
            programs.forEach(program => {
                const courseCard = document.createElement('div');
                courseCard.className = 'col-md-4 mb-3';
                courseCard.innerHTML = `
                    <div class="card course-card" data-course="${program.name}" data-program-id="${program.id}">
                        <div class="course-card-header">
                            <h5 class="mb-0">${program.name}</h5>
                        </div>
                        <div class="course-card-body">
                            <p class="course-card-text">
                                <i class="bi bi-clock me-1"></i> Duration: ${program.duration}
                            </p>
                            <p class="course-card-text">
                                <i class="bi bi-cash-coin me-1"></i> Tuition: ZMW ${program.fees[0]?.amount?.toLocaleString() || 'N/A'}/year
                            </p>
                            <button type="button" class="btn btn-select-course w-100">
                                <i class="bi bi-check-lg me-1"></i> Select
                            </button>
                        </div>
                    </div>
                `;
                courseContainer.appendChild(courseCard);
            });
            
            courseContainer.classList.remove('d-none');
            document.querySelectorAll('.btn-select-course').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    document.querySelectorAll('.course-card').forEach(c => c.classList.remove('selected'));
                    this.closest('.course-card').classList.add('selected');
                    document.querySelector('.btn-next-step').disabled = false;
                });
            });
        })
        .catch(error => {
            console.error('Error loading programs:', error);
            courseContainer.innerHTML = '<div class="col-12 text-center py-4"><p>Error loading programs. Please try again.</p></div>';
        });
}
        function handleFileUpload(event, previewId, multiple = false) {
            const files = event.target.files;
            const previewContainer = document.getElementById(previewId);
            previewContainer.innerHTML = '';
            if (files.length > 0) {
                if (multiple) {
                    const fileList = document.createElement('ul');
                    fileList.className = 'list-unstyled';
                    Array.from(files).forEach(file => {
                        const listItem = document.createElement('li');
                        listItem.className = 'small mb-2 d-flex align-items-center';
                        if (file.type.startsWith('image/')) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                const img = document.createElement('img');
                                img.src = e.target.result;
                                img.className = 'preview-image img-thumbnail me-3';
                                img.style.maxHeight = '50px';
                                listItem.prepend(img);
                            };
                            reader.readAsDataURL(file);
                        } else if (file.type === 'application/pdf') {
                            const pdfIcon = document.createElement('i');
                            pdfIcon.className = 'bi bi-file-earmark-pdf text-danger me-3';
                            listItem.prepend(pdfIcon);
                        }
                        const fileName = document.createElement('span');
                        fileName.textContent = file.name;
                        listItem.appendChild(fileName);
                        fileList.appendChild(listItem);
                    });
                    previewContainer.appendChild(fileList);
                } else {
                    const file = files[0];
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.className = 'preview-image';
                            previewContainer.appendChild(img);
                        };
                        reader.readAsDataURL(file);
                    } else if (file.type === 'application/pdf') {
                        const pdfPreview = document.createElement('div');
                        pdfPreview.className = 'pdf-preview';
                        pdfPreview.innerHTML = `
                            <i class="bi bi-file-earmark-pdf"></i>
                            <div class="mt-2">${file.name}</div>
                        `;
                        previewContainer.appendChild(pdfPreview);
                    }
                }
            }
        }
        
        function generateStudentNumber() {
            // Start with 2025 (first 4 digits)
            const prefix = "2025";
            // Generate remaining 6 random digits
            const randomDigits = Math.floor(100000 + Math.random() * 900000).toString();
            return prefix + randomDigits;
        }
        
        function updateReviewSection() {
            // Personal Information
            const title = document.getElementById('title').options[document.getElementById('title').selectedIndex].text;
            document.getElementById('reviewName').textContent = 
                `${title} ${document.getElementById('firstName').value} ${document.getElementById('lastName').value}`;
            document.getElementById('reviewDob').textContent = document.getElementById('dob').value;
            document.getElementById('reviewGender').textContent = 
                document.getElementById('gender').options[document.getElementById('gender').selectedIndex].text;
            document.getElementById('reviewNationalId').textContent = document.getElementById('nationalId').value;
            document.getElementById('reviewEmail').textContent = document.getElementById('email').value;
            document.getElementById('reviewPhone').textContent = document.getElementById('phone').value;
            
            // Add alternative phone if provided
            const altPhone = document.getElementById('altPhone').value;
            if (altPhone) {
                document.getElementById('reviewPhone').textContent += ` / ${altPhone}`;
            }
            
            document.getElementById('reviewAddress').textContent = 
                `${document.getElementById('streetAddress').value}, ${document.getElementById('city').value}, ` +
                `${document.getElementById('province').options[document.getElementById('province').selectedIndex].text}`;
            
            // Add postal code if provided
            const postalCode = document.getElementById('postalCode').value;
            if (postalCode) {
                document.getElementById('reviewAddress').textContent += `, ${postalCode}`;
            }
            
            // Next of Kin information
            document.getElementById('reviewNextOfKin').textContent = 
                `${document.getElementById('nextOfKinName').value} (${document.getElementById('nextOfKinRelationship').value}) - ` +
                document.getElementById('nextOfKinPhone').value;
            
            // Add alternative next of kin phone if provided
            const nextOfKinAltPhone = document.getElementById('nextOfKinAltPhone').value;
            if (nextOfKinAltPhone) {
                document.getElementById('reviewNextOfKin').textContent += ` / ${nextOfKinAltPhone}`;
            }
            
            // Secondary education
            document.getElementById('reviewSecondarySchool').textContent = document.getElementById('secondarySchool').value;
            document.getElementById('reviewCompletionYear').textContent = document.getElementById('completionYear').value;
            
            // Program Information
            const schoolSelect = document.getElementById('schoolSelect');
            document.getElementById('reviewSchool').textContent = schoolSelect.options[schoolSelect.selectedIndex].text;
            const programLevelSelect = document.getElementById('programLevel');
            document.getElementById('reviewProgram').textContent = 
                programLevelSelect.options[programLevelSelect.selectedIndex].text;
            const selectedCourse = document.querySelector('.course-card.selected');
            document.getElementById('reviewCourse').textContent = selectedCourse ? selectedCourse.dataset.course : '';
            
            // Documents
            const idUploaded = document.getElementById('idUpload').files.length > 0 ? 'Yes' : 'No';
            const certsUploaded = document.getElementById('certificateUpload').files.length;
            const photoUploaded = document.getElementById('photoUpload').files.length > 0 ? 'Yes' : 'No';
            document.getElementById('reviewDocs').textContent = 
                `ID: ${idUploaded}, Certificates: ${certsUploaded} file(s), Photo: ${photoUploaded}`;
        }
// The pdf document creation

        function generatePdf() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF({
                orientation: 'portrait',
                unit: 'mm',
                format: 'a4'
            });

            // Set document margins and styles
            const leftMargin = 20;
            const rightMargin = 20;
            const topMargin = 25;
            const lineHeight = 6;
            let yPos = topMargin;

            // Add watermark background
            doc.setFontSize(60);
            doc.setTextColor(230, 230, 230); // Light gray for watermark
            doc.setFont('helvetica', 'bold');
            doc.text('NORTH SWEETBERG', 105, 140, { 
                angle: 45, 
                align: 'left',
                opacity: 0.2
            });
            doc.setTextColor(0, 0, 0); // Reset text color

            // Header with logo and contact info
            doc.addImage('NORTH LOGO', 'PNG', leftMargin, yPos, 40, 15);
            doc.setFontSize(14);
            doc.setFont('helvetica', 'normal');
            doc.text('North Sweetberg University College', leftMargin + 50, yPos + 5);
            doc.text('12790 Hillcrest Extension, Ndola, Zambia', leftMargin + 50, yPos + 10);
            doc.text('Tel: +260 971 884 141 | Email: admissions@northsweetberg.edu.zm', leftMargin + 50, yPos + 15);
            
            // Divider line
            doc.setDrawColor(200, 200, 200);
            doc.setLineWidth(0.5);
            doc.line(leftMargin, yPos + 20, 190, yPos + 20);
            yPos += 25;

            // Main title
            doc.setFontSize(18);
            doc.setFont('helvetica', 'bold');
            doc.setTextColor(44, 62, 80); // Dark blue
            doc.text('ADMISSION APPLICATION SUMMARY', 105, yPos, { align: 'center' });
            yPos += 15;

            // Application reference section
            doc.setFontSize(10);
            doc.setFont('helvetica', 'bold');
            doc.text('Application Reference:', leftMargin, yPos);
            doc.text('Date:', 150, yPos);
            doc.setFont('helvetica', 'normal');
            const studentNumber = document.getElementById('modalStudentNumber').textContent;
            const today = new Date().toLocaleDateString('en-US', { 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric' 
            });
            doc.text(studentNumber, leftMargin + 35, yPos);
            doc.text(today, 160, yPos);
            yPos += 10;

            // Section divider
            doc.setDrawColor(52, 152, 219); // Blue
            doc.setLineWidth(0.8);
            doc.line(leftMargin, yPos, leftMargin + 40, yPos);
            yPos += 5;

            // Personal Information section
            doc.setFontSize(14);
            doc.setFont('helvetica', 'bold');
            doc.setTextColor(52, 152, 219); // Blue
            doc.text('PERSONAL INFORMATION', leftMargin, yPos);
            yPos += 10;

            // Personal details
            doc.setFontSize(10);
            doc.setFont('helvetica', 'bold');
            doc.setTextColor(0, 0, 0);
            const personalDetails = [
                { label: 'Full Name:', value: `${document.getElementById('title').options[document.getElementById('title').selectedIndex].text} ${document.getElementById('firstName').value} ${document.getElementById('lastName').value}` },
                { label: 'Date of Birth:', value: document.getElementById('dob').value },
                { label: 'Gender:', value: document.getElementById('gender').options[document.getElementById('gender').selectedIndex].text },
                { label: 'National ID/Passport:', value: document.getElementById('nationalId').value },
                { label: 'Email:', value: document.getElementById('email').value },
                { label: 'Phone:', value: document.getElementById('phone').value },
                { label: 'Address:', value: `${document.getElementById('streetAddress').value}, ${document.getElementById('city').value}, ${document.getElementById('province').options[document.getElementById('province').selectedIndex].text}` }
            ];

            personalDetails.forEach(detail => {
                doc.text(detail.label, leftMargin, yPos);
                doc.setFont('helvetica', 'normal');
                // Split long values into multiple lines
                const lines = doc.splitTextToSize(detail.value, 120);
                doc.text(lines, leftMargin + 35, yPos);
                yPos += (lines.length * lineHeight);
                doc.setFont('helvetica', 'bold');
            });
            yPos += 5;

            // Next of Kin section
            doc.setFontSize(14);
            doc.setFont('helvetica', 'bold');
            doc.setTextColor(52, 152, 219);
            doc.text('NEXT OF KIN', leftMargin, yPos);
            yPos += 10;

            doc.setFontSize(10);
            doc.setFont('helvetica', 'bold');
            doc.setTextColor(0, 0, 0);
            const nextOfKinDetails = [
                { label: 'Name:', value: document.getElementById('nextOfKinName').value },
                { label: 'Relationship:', value: document.getElementById('nextOfKinRelationship').value },
                { label: 'Phone:', value: document.getElementById('nextOfKinPhone').value }
            ];

            nextOfKinDetails.forEach(detail => {
                doc.text(detail.label, leftMargin, yPos);
                doc.setFont('helvetica', 'normal');
                doc.text(detail.value, leftMargin + 35, yPos);
                yPos += lineHeight;
                doc.setFont('helvetica', 'bold');
            });
            yPos += 5;

            // Education Background section
            doc.setFontSize(14);
            doc.setFont('helvetica', 'bold');
            doc.setTextColor(52, 152, 219);
            doc.text('EDUCATION BACKGROUND', leftMargin, yPos);
            yPos += 10;

            doc.setFontSize(10);
            doc.setFont('helvetica', 'bold');
            doc.setTextColor(0, 0, 0);
            const educationDetails = [
                { label: 'Secondary School:', value: document.getElementById('secondarySchool').value },
                { label: 'Year Completed:', value: document.getElementById('completionYear').value }
            ];

            educationDetails.forEach(detail => {
                doc.text(detail.label, leftMargin, yPos);
                doc.setFont('helvetica', 'normal');
                doc.text(detail.value, leftMargin + 35, yPos);
                yPos += lineHeight;
                doc.setFont('helvetica', 'bold');
            });
            yPos += 10;

            // Program Information section
            doc.setFontSize(14);
            doc.setFont('helvetica', 'bold');
            doc.setTextColor(52, 152, 219);
            doc.text('PROGRAM INFORMATION', leftMargin, yPos);
            yPos += 10;

            doc.setFontSize(10);
            doc.setFont('helvetica', 'bold');
            doc.setTextColor(0, 0, 0);
            const schoolSelect = document.getElementById('schoolSelect');
            const programLevelSelect = document.getElementById('programLevel');
            const selectedCourse = document.querySelector('.course-card.selected');
            
            const programDetails = [
                { label: 'School:', value: schoolSelect.options[schoolSelect.selectedIndex].text },
                { label: 'Program Level:', value: programLevelSelect.options[programLevelSelect.selectedIndex].text },
                { label: 'Course:', value: selectedCourse ? selectedCourse.dataset.course : '' }
            ];

            programDetails.forEach(detail => {
                doc.text(detail.label, leftMargin, yPos);
                doc.setFont('helvetica', 'normal');
                doc.text(detail.value, leftMargin + 35, yPos);
                yPos += lineHeight;
                doc.setFont('helvetica', 'bold');
            });
            yPos += 10;

            // Documents Submitted section
            doc.setFontSize(14);
            doc.setFont('helvetica', 'bold');
            doc.setTextColor(52, 152, 219);
            doc.text('DOCUMENTS SUBMITTED', leftMargin, yPos);
            yPos += 10;

            doc.setFontSize(10);
            doc.setFont('helvetica', 'bold');
            doc.setTextColor(0, 0, 0);
            const idUploaded = document.getElementById('idUpload').files.length > 0 ? 'Yes' : 'No';
            const certsUploaded = document.getElementById('certificateUpload').files.length;
            const photoUploaded = document.getElementById('photoUpload').files.length > 0 ? 'Yes' : 'No';
            
            const documentDetails = [
                { label: 'ID/Passport:', value: idUploaded },
                { label: 'Academic Certificates:', value: `${certsUploaded} file(s)` },
                { label: 'Profile Photo:', value: photoUploaded }
            ];

            documentDetails.forEach(detail => {
                doc.text(detail.label, leftMargin, yPos);
                doc.setFont('helvetica', 'normal');
                doc.text(detail.value, leftMargin + 35, yPos);
                yPos += lineHeight;
                doc.setFont('helvetica', 'bold');
            });
            yPos += 15;

            // Footer
            doc.setFontSize(8);
            doc.setTextColor(100, 100, 100);
            doc.setFont('helvetica', 'italic');
            doc.text('This document is system generated and requires no signature.', 105, 280, { align: 'center' });
            doc.text(`Application Reference: ${studentNumber}`, 105, 285, { align: 'center' });

            // Add page border
            doc.setDrawColor(200, 200, 200); 
            doc.setLineWidth(0.2);
            doc.rect(10, 10, 190, 277);

            // Save the PDF
            doc.save(`NSUC_Application_${studentNumber}.pdf`);
        }
    });
</script>
</body>
</html>