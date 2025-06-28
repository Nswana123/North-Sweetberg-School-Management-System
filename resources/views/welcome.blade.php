<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-MN0xTn8mB/8L3k7UuDqmpX7WWmOU2+I3TjZBlDfDEUDGfQe6vZTwM4gH+4Ls+7rhj7ez9NY0Q6+jzV4kGUwTQg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>North Sweetberg University</title>
  <meta content="North Sweetberg University College offers diploma, degree, and short courses in Ndola, Zambia" name="description">
  <meta content="university, college, education, diploma, degree, Zambia, Ndola" name="keywords">

  <!-- Favicons -->
  <link href="logo for university.png" rel="icon">
  <link href="logo for university.png" rel="apple-touch-icon">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-MN0xTn8mB/8L3k7UuDqmpX7WWmOU2+I3TjZBlDfDEUDGfQe6vZTwM4gH+4Ls+7rhj7ez9NY0Q6+jzV4kGUwTQg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- Custom Color Scheme -->
  <style>
    :root {
      /* Brand Colors */
      --color-navy: #032247;       /* Navy Blue */
      --color-sky: #87CEEB;        /* Sky Blue */
      --color-gold: #06ec11;       /* Gold/Yellow */
      --color-white: #FFFFFF;      /* White */
      --color-black: #000000;      /* Black */
      
      /* Applied Colors */
      --color-primary: var(--color-navy);
      --color-secondary: var(--color-gold);
      --color-accent: var(--color-sky);
    }
    
    /* Header */
    .header {
      background: var(--color-white);
      box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
    }
    .logo h1 {
      color: var(--color-primary);
    }
    .logo h1 span {
      color: var(--color-secondary);
    }
    .navbar a {
      color: var(--color-primary);
    }
    .navbar a:hover {
      color: #06ec11;
    }
   .btn-apply-now { 
      position: relative;
      background-color: var(--color-secondary);
      color: #000;
      border: 2px solid var(--color-secondary);
      border-radius: 6px;
      padding: 10px 10px;
      margin-right: 60px;
      font-weight: 600; 
      font-size: 1rem;
      cursor: pointer;
      transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
    }
  .btn-portal {
  background-color: #334C66;
  color: #ffffff; 
  border: 2px solid var(#032247);
  border-radius: 6px;
  padding: 10px 10px;
  font-weight: 600;
  font-size: 1rem;
  cursor: pointer;
  transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
}
.btn-portal:hover {
  background-color: var(--color-secondary);
  color: var(--color-white);
  border-color: #18246b;
}

.btn-apply-now:hover {
  background-color: #18246b;
  color: var(--color-white);
  border-color: #18246b;
}

   /* Hero Section */
.hero {
  background: linear-gradient(rgba(0, 31, 63, 0.8), rgba(0, 31, 63, 0.8)), url('assets/img/campus-hero.jpg');
  background-size: cover;
  position: relative;
  overflow: hidden;
}

.hero h2 {
  color: var(--color-white);
  font-weight: 700;
  text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

.hero p {
  color: var(--color-sky);
  font-size: 1.2rem;
  text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
}

/* Image Carousel */
.image-carousel {
  position: relative;
  height: 400px;
  width: 400px;
  perspective: 1000px;
}

.image-carousel img {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: contain;
  opacity: 0;
  transform: translateX(10px);
  transition: all 1s cubic-bezier(0.645, 0.045, 0.355, 1);
  border-radius: 8px;
  box-shadow: 0 5px 10px rgba(0, 255, 38, 0.774); 
}

.image-carousel img.active {
  opacity: 1;
  transform: translateX(0) rotateY(0deg);
  z-index: 1;
}

/* Carousel Dots */
.carousel-dots {
  display: flex;
  justify-content: center;
  margin-top: 20px;
}

.carousel-dots span {
  display: block;
  width: 12px;
  height: 12px;
  margin: 0 5px;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.5);
  cursor: pointer;
  transition: all 0.3s ease;
}

.carousel-dots span.active {
  background: var(--color-white);
  transform: scale(1.2);
}

/* Floating Shapes */
.floating-shapes {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  overflow: hidden;
  z-index: 0;
}

.floating-shapes::before,
.floating-shapes::after {
  content: '';
  position: absolute;
  border-radius: 50%;
  background: rgba(14, 175, 68, 0.1);
  animation: float 15s infinite linear;
}

.floating-shapes::before {
  width: 100px;
  height: 100px;
  top: 20%;
  left: 10%;
  animation-delay: 0s;
}

.floating-shapes::after {
  width: 150px;
  height: 150px;
  bottom: 15%;
  right: 10%;
  animation-delay: 3s;
} 
/* TEAMS OR COURSES SECTION EXPANDANBLE */
 .team-section {
      padding: 80px 0;
      background-color: var(--bg-color);
    }

    .team-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 30px;
    }

    .team-member {
      width: 280px;
      background: var(--card-bg);
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      transition: all 0.4s ease;
      position: relative;
    }

    .team-member:hover {
      transform: translateY(-15px);
      box-shadow: 0 20px 40px rgba(0,0,0,0.2);
    }

    .member-img {
      height: 280px;
      overflow: hidden;
      position: relative;
    }

    .member-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.5s ease;
    }

    .team-member:hover .member-img img {
      transform: scale(1.1);
    }

    .member-info {
      padding: 20px;
      text-align: center;
    }

    .member-name {
      font-size: 1.3rem;
      font-weight: 700;
      margin-bottom: 5px;
      color: var(--title-color);
    }

    .member-position {
      color: var(--primary-color);
      font-weight: 600;
      margin-bottom: 15px;
      display: block;
    }

    .member-social {
      display: flex;
      justify-content: center;
      gap: 15px;
    }

    .member-social a {
      color: var(--icon-color);
      font-size: 1.2rem;
      transition: all 0.3s ease;
    }

    .member-social a:hover {
      color: var(--primary-color);
      transform: translateY(-3px);
    }

    .member-bio {
      position: absolute;
      bottom: -100%;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0,0,0,0.8);
      padding: 20px;
      color: white;
      transition: all 0.4s ease;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .team-member:hover .member-bio {
      bottom: 0;
    }
 /* ======= Research Services Section ======= */
    .research-services {
      padding: 60px 0;
      background-color: var(--secondary-color);
    }

    .research-card {
      background-color: var(--card-bg);
      border-radius: 10px;
      padding: 30px;
      margin-bottom: 30px;
      transition: all 0.3s ease;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.966);
    }

    .research-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.548);
    }

    .research-icon {
      font-size: 2.5rem;
      color: #ffa600; 
      margin-bottom: 20px;
    }


@keyframes float {
  0% {
    transform: translateY(0) rotate(0deg);
  }
  50% {
    transform: translateY(-20px) rotate(180deg);
  }
  100% {
    transform: translateY(0) rotate(360deg);
  }
}

/* Buttons */
.btn-apply-now {
  background: var(--color-primary);
  color: white;
  padding: 12px 30px;
  border-radius: 30px;
  font-weight: 600;
  transition: all 0.3s ease;
  box-shadow: 0 4px 15px rgba(0, 81, 162, 0.3);
}

.btn-apply-now:hover {
  transform: translateY(-3px);
  box-shadow: 0 6px 20px rgba(0, 81, 162, 0.4);
  color: white;
}

.btn-watch-video {
  color: white;
  font-weight: 600;
  transition: all 0.3s ease;
}

.btn-watch-video i {
  transition: all 0.3s ease;
}

.btn-watch-video:hover {
  color: var(--color-sky);
}

.btn-watch-video:hover i {
  transform: scale(1.1);
}
    /* Why Us Section */
    .why-us {
      background-color: #333B65
    }
    .why-box {
      background: #21c021;
      color: #0ae439;
    }
    .why-box h3 {
      color: #e6f0fa;
    }
    
    /* Programs Section */
    .program-item {
      border: 1px solid var(--color-sky);
    }
    .program-item h4 {
      color: var(--color-primary);
    }
    .btn-learn-more {
      color: var(--color-primary);
      border: 2px solid var(--color-primary);
    }
    .btn-learn-more:hover {
      background: var(--color-primary);
      color: var(--color-white);
    }
    .btn-watch-video {
  font-weight: 500;
  color: #fefeff;
  text-decoration: none;
  transition: color 0.3s ease;
}

.btn-watch-video:hover {
  color: var(--color-secondary);
}

    
    /* Footer */
    .footer {
      background: var(--color-primary);
      color: var(--color-white);
    }
    .footer h4 {
      color: var(--color-secondary);
    }
    .footer a {
      color: var(--color-sky);
    }
    .footer .social-links a {
      color: var(--color-white);
      background: rgba(255, 255, 255, 0.1);
    }
    .footer .social-links a:hover {
      background: var(--color-secondary);
      color: var(--color-primary);
    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">
        <h1>NORTH SWEETBERG UNIVERSITY</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#hero">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#programs">Programs</a></li>
          <li><a href="#admissions">Admissions</a></li>
          <li><a href="#research">Research</a></li>
        </ul>
      </nav><!-- .navbar -->

      <a class="btn-portal" href="admissions">Student Portal</a>


    </div>
     </nav><!-- .navbar -->

      <a class="btn-apply-now" href="{{ route('enrollment.applynow') }}">Apply Now</a>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->

<!-- ======= Hero Section ======= -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">
    <div class="floating-shapes" id="floatingShapes"></div>
    <div class="container">
      <div class="row justify-content-between gy-5 align-items-center">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
          <h2 data-aos="fade-up" class="mb-3 animate-fall">DILIGENCE, RESILIENCE <br>AND EXCELLENCE</h2>
          <p data-aos="fade-up" data-aos-delay="100" class="mb-4 animate-jump">Offering diploma, degree, and short courses designed to prepare students for successful careers.</p>
          <div class="d-flex gap-3" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('enrollment.applynow') }}" class="btn-apply-now">Apply Now</a>
          
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start position-relative">
          <div class="image-carousel">
            <img src="North students.jpg" class="img-fluid active animate-fall" alt="University Logo">
            <img src="NORTH LOGO.png" class="img-fluid animate-jump" alt="Campus Building">
            <img src="North students.jpg" class="img-fluid animate-broken" alt="Students Group">
            <img src="NORTH LOGO.png" class="img-fluid animate-fall" alt="Graduation">
             <img src="North students.jpg" class="img-fluid animate-broken" alt="Students Group">
            <img src="NORTH LOGO.png" class="img-fluid animate-fall" alt="Graduation">
          </div>
          <div class="carousel-dots"></div>
        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->
<!-- End Hero Section -->

<!-- ABOUT SECTION NEW -->
  <main id="about">
 <style>
            :root {
                --primary-blue: #334C65; 
                --secondary-blue: #333865; 
                --accent-blue: #ffffff;
                --light-blue: #e6f0fa;
                --gold: #fcfcfc;
            }
            
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }
            
            body {
                overflow-x: hidden;
            }
            
            .about-section {
                min-height: 100vh;
                width: 100%;
                background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
                padding: 80px 5%;
                color: white;
                position: relative;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                overflow: hidden;
            }
            
            .university-name {
                font-size: 2.5rem;
                margin-bottom: 20px;
                text-align: center;
                color: var(--gold);
                text-shadow: 2px 2px 4px rgba(24, 26, 24, 0.904);
                z-index: 1;
                opacity: 0;
                transform: translateY(30px);
                animation: fadeInUp 1s 0.2s forwards;
                font-weight: 100PX;
            }
            
            .contact-info {
                background:#032247;
                padding: 15px 25px;
                border-radius: 30px;
                margin-bottom: 30px;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 15px;
                z-index: 1;
                opacity: 0;
                transform: translateY(30px);
                animation: fadeInUp 1s 0.4s forwards;
            }
            
            .contact-item {
                display: flex;
                align-items: center;
                gap: 8px;
            }
            
            .contact-item i {
                color: var(--accent-blue);
            }
            
            .address {
                background: rgba(255, 255, 255, 0.1);
                padding: 15px 25px;
                border-radius: 10px;
                margin-bottom: 40px;
                text-align: center;
                max-width: 600px;
                backdrop-filter: blur(5px);
                z-index: 1;
                opacity: 0;
                transform: translateY(30px);
                animation: fadeInUp 1s 0.6s forwards;
            }
            
            .floating-shapes {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                overflow: hidden;
                z-index: 0;
            }
            
            .floating-shapes div {
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.205);
                animation: float 15s infinite linear;
            }
            
            @keyframes float {
                0% {
                    transform: translateY(0) rotate(0deg);
                    opacity: 1;
                }
                100% {
                    transform: translateY(-1000px) rotate(720deg);
                    opacity: 0;
                }
            }
            
            .section-header {
                text-align: center;
                margin-bottom: 100px;
                z-index: 1;
                opacity: 0;
                transform: translateY(30px);
                animation: fadeInUp 1s 0.8s forwards;
            }
            
            .section-header h2 {
                font-size: 2.2rem;
                margin-bottom: 20px;
                position: relative;
                display: inline-block;
            }
            
            .section-header h2::after {
                content: '';
                position: absolute;
                bottom: -10px;
                left: 50%;
                transform: translateX(-50%);
                width: 80px;
                height: 4px;
                background: #0ae439;
                border-radius: 2px;
            }
            
            .section-header p {
                font-size: 1.1rem;
                max-width: 800px;
                line-height: 1.6;
            }
            
            .about-content {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 30px;
                z-index: 1;
                margin-bottom: 40px;
            }
            
            .about-card {
                background: #032247;
                backdrop-filter: blur(10px);
                border-radius: 15px;
                padding: 25px;
                width: 300px;
                transition: all 0.3s ease;
                opacity: 0;
                transform: translateY(30px);
                animation: fadeInUp 1s forwards;
                border: 1px solid rgba(255, 255, 255, 0.342);
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            }
            
            .about-card:nth-child(1) {
                animation-delay: 1s;
            }
            
            .about-card:nth-child(2) {
                animation-delay: 1.2s;
            }
            
            .about-card:nth-child(3) {
                animation-delay: 1.4s;
            }
            
            .about-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
                background: rgba(255, 255, 255, 0.15);
            }
            
            .card-icon {
                font-size: 2.2rem;
                color: var(--accent-blue);
                margin-bottom: 15px;
            }
            
            .about-card h3 {
                font-size: 1.4rem;
                margin-bottom: 15px;
                position: relative;
                padding-bottom: 10px;
            }
            
            .about-card h3::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 0;
                width: 40px;
                height: 3px;
                background: var(--accent-blue);
            }
            
            .about-card p {
                line-height: 1.6;
                margin-bottom: 15px;
                font-size: 0.95rem;
            }
            
            .programs-highlight {
                background: #032247;
                border: 1px solid var(--accent-blue);
                border-radius: 10px;
                padding: 20px;
                max-width: 800px;
                text-align: center;
                margin-top: 20px;
                z-index: 1;
                opacity: 0;
                transform: translateY(30px);
                animation: fadeInUp 1s 1.6s forwards;
            }
            
            .programs-highlight h3 {
                color: var(--gold);
                margin-bottom: 10px;
                font-size: 1.4rem;
            }
            
            .programs-list {
                display: flex;
                justify-content: center;
                flex-wrap: wrap;
                gap: 15px;
                margin-top: 15px;
            }
            
            .program-item {
                background: rgba(255, 255, 255, 0.1);
                padding: 8px 15px;
                border-radius: 20px;
                font-size: 0.9rem;
            }
            
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            /* Responsive adjustments */
            @media (max-width: 768px) {
                .university-name {
                    font-size: 2rem;
                }
                
                .contact-info {
                    flex-direction: column;
                    align-items: center;
                    gap: 10px;
                    padding: 15px;
                }
                
                .about-card {
                    width: 100%;
                    max-width: 350px;
                }
                
                .section-header h2 {
                    font-size: 1.8rem;
                }
                
            }
        </style>
    </head>
    <body>
       <!-- ======= About Section ======= -->
  <main id="about">
    <section class="about-section">
      <div class="floating-shapes" id="aboutFloatingShapes"></div>
      
      <h1 class="university-name">NORTH SWEETBERG UNIVERSITY COLLEGE</h1>
      
      <div class="contact-info">
        <div class="contact-item">
          <i class="bi bi-telephone"></i>
          <span>0971884141</span>
        </div>
        <div class="contact-item">
          <i class="bi bi-telephone"></i>
          <span>0773258040</span>
        </div>
        <div class="contact-item">
          <i class="bi bi-telephone"></i>
          <span>0960502036</span>
        </div>
      </div>
      
      <div class="address">
        <i class="bi bi-geo-alt"></i>
        <span>Main Campus: 12790 Hillcrest Extension Ndola</span>
      </div>
      
      <div class="section-header">
        <h1>About Our Institution</h1>
        <p>North Sweetberg University College is a premier higher education institution committed to academic excellence, innovative learning, and student success. Established with a vision to transform lives through education, we provide quality programs that prepare students for the challenges of the modern workforce.</p>
      </div>
      
      <div class="about-content">
        <div class="about-card">
          <div class="card-icon">
            <i class="bi bi-building"></i>
          </div>
          <h3>Our Mission</h3>
          <p>To provide accessible, quality education that empowers students with knowledge, skills, and values necessary for personal and professional success in a dynamic global environment.</p>
        </div>
        
        <div class="about-card">
          <div class="card-icon">
            <i class="bi bi-people"></i>
          </div>
          <h3>Our Community</h3>
          <p>We foster a diverse and inclusive learning environment where students from all backgrounds can thrive. Our supportive community encourages collaboration and personal growth.</p>
        </div>
        
        <div class="about-card">
          <div class="card-icon">
            <i class="bi bi-book"></i>
          </div>
          <h3>Learning Approach</h3>
          <p>We combine theoretical knowledge with practical application, ensuring our graduates are work-ready. Our experienced faculty provide personalized attention to each student.</p>
        </div>
      </div>
      
      <div class="programs-highlight">
        <h3>WE OFFER COMPREHENSIVE PROGRAMS</h3>
        <p>North Sweetberg University College provides flexible learning options to suit diverse educational needs and career aspirations.</p>
        <div class="programs-list">
          <div class="program-item">Short Courses</div>
          <div class="program-item">Diploma Programs</div>
          <div class="program-item">Degree Programs</div>
          <div class="program-item">Professional Certifications</div>
          <div class="program-item">Continuing Education</div>
        </div>
      </div>
    </section>


<!-- ======= Stats Counter Section ======= -->
<!-- ======= Stats Counter Section ======= -->
<section id="stats-counter" class="stats-counter">
  <div class="container" data-aos="zoom-out">

    <div class="row gy-4">

      <div class="col-lg-3 col-md-6">
        <div class="stats-item text-center w-100 h-100 shadow-lg rounded-4 p-4 bg-glass">
          <i class="fas fa-user-graduate fa-3x mb-3 text-warning"></i>
          <span data-purecounter-start="0" data-purecounter-end="1200" data-purecounter-duration="1" class="purecounter"></span>
          <p>Students </p>
        </div>
      </div><!-- End Stats Item -->

      <div class="col-lg-3 col-md-6">
        <div class="stats-item text-center w-100 h-100 shadow-lg rounded-4 p-4 bg-glass">
          <i class="fas fa-layer-group fa-3x mb-3 text-info"></i>
          <span data-purecounter-start="0" data-purecounter-end="24" data-purecounter-duration="1" class="purecounter"></span>
          <p>Programs</p>
        </div>
      </div><!-- End Stats Item -->

      <div class="col-lg-3 col-md-6">
        <div class="stats-item text-center w-100 h-100 shadow-lg rounded-4 p-4 bg-glass">
          <i class="fas fa-chalkboard-teacher fa-3x mb-3 text-success"></i>
          <span data-purecounter-start="0" data-purecounter-end="45" data-purecounter-duration="1" class="purecounter"></span>
          <p>Faculty Members</p>
        </div>
      </div><!-- End Stats Item -->

      <div class="col-lg-3 col-md-6">
        <div class="stats-item text-center w-100 h-100 shadow-lg rounded-4 p-4 bg-glass">
          <i class="fas fa-school fa-3x mb-3 text-danger"></i>
          <span data-purecounter-start="0" data-purecounter-end="5" data-purecounter-duration="1" class="purecounter"></span>
          <p>Years Established</p>
        </div>
      </div><!-- End Stats Item -->

    </div>

  </div>
</section><!-- End Stats Counter Section -->

<!-- Advanced Programs Section -->
<!-- Advanced Programs Section -->
<section id="programs" class="advanced-programs-section">
  <div class="container" data-aos="fade-up">
    
    <!-- Premium Tab Navigation -->
    <div class="advanced-tabs-container">
      <ul class="nav nav-tabs advanced-programs-tabs justify-content-center">
        <li class="nav-item">
          <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#programs-short">
            <div class="tab-icon-wrapper">
              <i class="bi bi-lightning-charge"></i>
            </div>
            <span>Short Courses</span>
            <div class="tab-ripple"></div>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" data-bs-target="#programs-diploma">
            <div class="tab-icon-wrapper">
              <i class="bi bi-file-earmark-text"></i>
            </div>
            <span>Diploma</span>
            <div class="tab-ripple"></div>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" data-bs-target="#programs-degree">
            <div class="tab-icon-wrapper">
              <i class="bi bi-mortarboard"></i>
            </div>
            <span>Degree</span>
            <div class="tab-ripple"></div>
          </a>
        </li>
      </ul>
    </div>

    <!-- Tab Content -->
    <div class="tab-content mt-4">

      <!-- Short Courses Tab -->
      <div class="tab-pane fade show active" id="programs-short">
        <div class="section-header-center">
          <span class="section-subtitle">Rapid Skill Development</span>
          <h2 class="section-title">Professional Short Courses</h2>
          <div class="section-divider"></div>
        </div>

        <div class="row g-4 justify-content-center">
          <!-- Course 1 -->
          <div class="col-lg-4 col-md-6">
            <div class="advanced-program-card">
              <div class="card-badge">Popular</div>
              <div class="program-image-container">
                <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" 
                     alt="Web Development" class="program-image">
                <div class="image-overlay"></div>
              </div>
              
              <div class="program-content">
                <div class="program-meta-tags">
                  <span class="meta-tag duration"><i class="bi bi-clock"></i> 8 Weeks</span>
                  <span class="meta-tag level"><i class="bi bi-bar-chart"></i> Intermediate</span>
                </div>
                
                <h3 class="program-name">Full Stack Development</h3>
                <p class="program-description">
                  Master modern web development with React, Node.js, and MongoDB. Build deployable applications with industry best practices.
                </p>
                
                <div class="program-highlights">
                  <div class="highlight-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Hands-on projects</span>
                  </div>
                  <div class="highlight-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Career support</span>
                  </div>
                </div>
                
                <a href="#" class="advanced-apply-btn">
                  <span>Apply Now</span>
                  <div class="btn-dynamic-border"></div>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

          <!-- Course 2 -->
          <div class="col-lg-4 col-md-6">
            <div class="advanced-program-card">
              <div class="program-image-container">
                <img src="https://images.unsplash.com/photo-1620712943543-bcc4688e7485?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=765&q=80" 
                     alt="Data Science" class="program-image">
                <div class="image-overlay"></div>
              </div>
              
              <div class="program-content">
                <div class="program-meta-tags">
                  <span class="meta-tag duration"><i class="bi bi-clock"></i> 10 Weeks</span>
                  <span class="meta-tag level"><i class="bi bi-bar-chart"></i> Advanced</span>
                </div>
                
                <h3 class="program-name">Data Science Intensive</h3>
                <p class="program-description">
                  Comprehensive training in Python, machine learning, and data visualization for real-world analytics solutions.
                </p>
                
                <div class="program-highlights">
                  <div class="highlight-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Kaggle competitions</span>
                  </div>
                  <div class="highlight-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Cloud lab access</span>
                  </div>
                </div>
                
                <a href="#" class="advanced-apply-btn">
                  <span>Apply Now</span>
                  <div class="btn-dynamic-border"></div>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

          <!-- Course 3 -->
          <div class="col-lg-4 col-md-6">
            <div class="advanced-program-card">
              <div class="card-badge">New</div>
              <div class="program-image-container">
                <img src="https://images.unsplash.com/photo-1605379399642-870262d3d051?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1206&q=80" 
                     alt="UX Design" class="program-image">
                <div class="image-overlay"></div>
              </div>
              
              <div class="program-content">
                <div class="program-meta-tags">
                  <span class="meta-tag duration"><i class="bi bi-clock"></i> 6 Weeks</span>
                  <span class="meta-tag level"><i class="bi bi-bar-chart"></i> Beginner</span>
                </div>
                
                <h3 class="program-name">UX/UI Design</h3>
                <p class="program-description">
                  Learn user-centered design principles, Figma prototyping, and usability testing to create exceptional digital experiences.
                </p>
                
                <div class="program-highlights">
                  <div class="highlight-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Portfolio projects</span>
                  </div>
                  <div class="highlight-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Design system training</span>
                  </div>
                </div>
                
                <a href="#" class="advanced-apply-btn">
                  <span>Apply Now</span>
                  <div class="btn-dynamic-border"></div>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Diploma Programs -->
      <div class="tab-pane fade" id="programs-diploma">
        <div class="section-header-center">
          <span class="section-subtitle">Career-Focused Education</span>
          <h2 class="section-title">Diploma Programs</h2>
          <div class="section-divider"></div>
        </div>

        <div class="row g-4 justify-content-center">
          <!-- Diploma 1 -->
          <div class="col-lg-4 col-md-6">
            <div class="advanced-program-card">
              <div class="card-badge">Industry-Aligned</div>
              <div class="program-image-container">
                <img src="https://images.unsplash.com/photo-1496171367470-9ed9a91ea931?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" 
                     alt="Software Development" class="program-image">
                <div class="image-overlay"></div>
              </div>
              
              <div class="program-content">
                <div class="program-meta-tags">
                  <span class="meta-tag duration"><i class="bi bi-clock"></i> 12 Months</span>
                  <span class="meta-tag level"><i class="bi bi-bar-chart"></i> Advanced</span>
                </div>
                
                <h3 class="program-name">Diploma in Software Engineering</h3>
                <p class="program-description">
                  Comprehensive training in full-stack development, databases, and DevOps. Includes 3-month industry internship.
                </p>
                
                <div class="program-highlights">
                  <div class="highlight-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Java & Spring Boot</span>
                  </div>
                  <div class="highlight-item">
                    <i class="bi bi-check-circle"></i>
                    <span>AWS Certification</span>
                  </div>
                </div>
                
                <a href="#" class="advanced-apply-btn">
                  <span>Apply Now</span>
                  <div class="btn-dynamic-border"></div>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

          <!-- Diploma 2 -->
          <div class="col-lg-4 col-md-6">
            <div class="advanced-program-card">
              <div class="program-image-container">
                <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" 
                     alt="Cyber Security" class="program-image">
                <div class="image-overlay"></div>
              </div>
              
              <div class="program-content">
                <div class="program-meta-tags">
                  <span class="meta-tag duration"><i class="bi bi-clock"></i> 10 Months</span>
                  <span class="meta-tag level"><i class="bi bi-bar-chart"></i> Intermediate</span>
                </div>
                
                <h3 class="program-name">Diploma in Cyber Security</h3>
                <p class="program-description">
                  Develop expertise in ethical hacking, network security, and digital forensics with hands-on lab simulations.
                </p>
                
                <div class="program-highlights">
                  <div class="highlight-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Penetration testing</span>
                  </div>
                  <div class="highlight-item">
                    <i class="bi bi-check-circle"></i>
                    <span>CEH Exam Prep</span>
                  </div>
                </div>
                
                <a href="#" class="advanced-apply-btn">
                  <span>Apply Now</span>
                  <div class="btn-dynamic-border"></div>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

          <!-- Diploma 3 -->
          <div class="col-lg-4 col-md-6">
            <div class="advanced-program-card">
              <div class="card-badge">New</div>
              <div class="program-image-container">
                <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" 
                     alt="Data Analytics" class="program-image">
                <div class="image-overlay"></div>
              </div>
              
              <div class="program-content">
                <div class="program-meta-tags">
                  <span class="meta-tag duration"><i class="bi bi-clock"></i> 9 Months</span>
                  <span class="meta-tag level"><i class="bi bi-bar-chart"></i> Intermediate</span>
                </div>
                
                <h3 class="program-name">Diploma in Data Analytics</h3>
                <p class="program-description">
                  Master SQL, Python, and Power BI to transform raw data into actionable business insights.
                </p>
                
                <div class="program-highlights">
                  <div class="highlight-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Tableau Certification</span>
                  </div>
                  <div class="highlight-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Capstone project</span>
                  </div>
                </div>
                
                <a href="#" class="advanced-apply-btn">
                  <span>Apply Now</span>
                  <div class="btn-dynamic-border"></div>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Degree Programs -->
      <div class="tab-pane fade" id="programs-degree">
        <div class="section-header-center">
          <span class="section-subtitle">Higher Education</span>
          <h2 class="section-title">Bachelor's Degree Programs</h2>
          <div class="section-divider"></div>
        </div>

        <div class="row g-4 justify-content-center">
          <!-- Degree 1 -->
          <div class="col-lg-4 col-md-6">
            <div class="advanced-program-card">
              <div class="card-badge">ABET Accredited</div>
              <div class="program-image-container">
                <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" 
                     alt="Computer Science" class="program-image">
                <div class="image-overlay"></div>
              </div>
              
              <div class="program-content">
                <div class="program-meta-tags">
                  <span class="meta-tag duration"><i class="bi bi-clock"></i> 4 Years</span>
                  <span class="meta-tag level"><i class="bi bi-bar-chart"></i> Advanced</span>
                </div>
                
                <h3 class="program-name">BSc Computer Science</h3>
                <p class="program-description">
                  Comprehensive curriculum covering algorithms, AI, cybersecurity, and software engineering with research opportunities.
                </p>
                
                <div class="program-highlights">
                  <div class="highlight-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Specializations available</span>
                  </div>
                  <div class="highlight-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Study abroad options</span>
                  </div>
                </div>
                
                <a href="#" class="advanced-apply-btn">
                  <span>Apply Now</span>
                  <div class="btn-dynamic-border"></div>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

          <!-- Degree 2 -->
          <div class="col-lg-4 col-md-6">
            <div class="advanced-program-card">
              <div class="program-image-container">
                <img src="https://images.unsplash.com/photo-1629904853893-c2c8981a1dc5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" 
                     alt="Information Technology" class="program-image">
                <div class="image-overlay"></div>
              </div>
              
              <div class="program-content">
                <div class="program-meta-tags">
                  <span class="meta-tag duration"><i class="bi bi-clock"></i> 3.5 Years</span>
                  <span class="meta-tag level"><i class="bi bi-bar-chart"></i> Intermediate</span>
                </div>
                
                <h3 class="program-name">BSc Information Technology</h3>
                <p class="program-description">
                  Focus on enterprise systems, cloud computing, and IT management with business applications.
                </p>
                
                <div class="program-highlights">
                  <div class="highlight-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Cisco Networking Academy</span>
                  </div>
                  <div class="highlight-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Industry certifications</span>
                  </div>
                </div>
                
                <a href="#" class="advanced-apply-btn">
                  <span>Apply Now</span>
                  <div class="btn-dynamic-border"></div>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

          <!-- Degree 3 -->
          <div class="col-lg-4 col-md-6">
            <div class="advanced-program-card">
              <div class="card-badge">STEM Program</div>
              <div class="program-image-container">
                <img src="https://images.unsplash.com/photo-1635070041078-e363dbe005cb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" 
                     alt="Data Science" class="program-image">
                <div class="image-overlay"></div>
              </div>
              
              <div class="program-content">
                <div class="program-meta-tags">
                  <span class="meta-tag duration"><i class="bi bi-clock"></i> 4 Years</span>
                  <span class="meta-tag level"><i class="bi bi-bar-chart"></i> Advanced</span>
                </div>
                
                <h3 class="program-name">BSc Data Science</h3>
                <p class="program-description">
                  Interdisciplinary program combining statistics, computer science, and domain expertise for big data solutions.
                </p>
                
                <div class="program-highlights">
                  <div class="highlight-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Hadoop/Spark training</span>
                  </div>
                  <div class="highlight-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Research partnerships</span>
                  </div>
                </div>
                
                <a href="#" class="advanced-apply-btn">
                  <span>Apply Now</span>
                  <div class="btn-dynamic-border"></div>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CSS remains identical to previous example -->

<!-- Advanced CSS -->
<style>
.advanced-programs-section {
  padding: 100px 0;
  background: #dedede; 
  position: relative;
}

.advanced-tabs-container {
  position: relative;
  margin-bottom: 40px;
}

.advanced-programs-tabs {
  border: none;
  position: relative;
}

.advanced-programs-tabs .nav-item {
  margin: 0 5px;
}

.advanced-programs-tabs .nav-link {
  border: none;
  background: transparent;
  color: #64748b;
  font-weight: 600;
  padding: 15px 25px;
  display: flex;
  flex-direction: column;
  align-items: center;
  position: relative;
  transition: all 0.3s ease;
  border-radius: 8px;
}

.tab-icon-wrapper {
  width: 50px;
  height: 50px;
  background: rgba(15, 118, 110, 0.1);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 10px;
  transition: all 0.3s ease;
}

.advanced-programs-tabs .nav-link i {
  font-size: 1.25rem;
  color: #0f766e;
  transition: all 0.3s ease;
}

.advanced-programs-tabs .nav-link span {
  font-size: 0.95rem;
  letter-spacing: 0.5px;
}

.advanced-programs-tabs .nav-link.active {
  color: #0f766e;
}

.advanced-programs-tabs .nav-link.active .tab-icon-wrapper {
  background: #0f766e;
  transform: translateY(-5px);
  box-shadow: 0 10px 20px rgba(15, 118, 110, 0.2);
}

.advanced-programs-tabs .nav-link.active i {
  color: white;
}

.tab-ripple {
  position: absolute;
  bottom: -5px;
  left: 50%;
  transform: translateX(-50%);
  width: 6px;
  height: 6px;
  background: #0f766e;
  border-radius: 50%;
  opacity: 0;
  transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.advanced-programs-tabs .nav-link.active .tab-ripple {
  opacity: 1;
  bottom: -10px;
  width: 8px;
  height: 8px;
}

.section-header-center {
  text-align: center;
  margin-bottom: 50px;
}

.section-subtitle {
  display: inline-block;
  color: #0f766e;
  font-size: 0.85rem;
  font-weight: 600;
  letter-spacing: 1px;
  text-transform: uppercase;
  margin-bottom: 15px;
}

.section-title {
  font-weight: 700;
  font-size: 2.2rem;
  color: #0f172a;
  margin-bottom: 20px;
}

.section-divider {
  width: 80px;
  height: 3px;
  background: linear-gradient(90deg, #0f766e 0%, rgba(15, 118, 110, 0.1) 100%);
  margin: 0 auto;
}

/* Advanced Program Card */
.advanced-program-card {
  border: none;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.322);
  transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
  background: white;
  height: 100%;
  position: relative;
}

.advanced-program-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 20px 40px rgba(15, 118, 110, 0.1);
}

.card-badge {
  position: absolute;
  top: 15px;
  right: 15px;
  background: #0f766e;
  color: white;
  padding: 5px 12px;
  border-radius: 20px;
  font-size: 0.7rem;
  font-weight: 700;
  z-index: 2;
  text-transform: uppercase;
}

.program-image-container {
  height: 200px;
  position: relative;
  overflow: hidden;
}

.program-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.6s ease;
}

.advanced-program-card:hover .program-image {
  transform: scale(1.05);
}

.image-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(to bottom, rgba(0,0,0,0) 0%, rgba(0,0,0,0.3) 100%);
}

.program-content {
  padding: 25px;
}

.program-meta-tags {
  display: flex;
  gap: 10px;
  margin-bottom: 15px;
}

.meta-tag {
  font-size: 0.75rem;
  font-weight: 600;
  padding: 4px 10px;
  border-radius: 20px;
  display: inline-flex;
  align-items: center;
}

.meta-tag i {
  margin-right: 5px;
  font-size: 0.8rem;
}

.meta-tag.duration {
  background: rgba(99, 102, 241, 0.1);
  color: #6366f1;
}

.meta-tag.level {
  background: rgba(14, 165, 233, 0.1);
  color: #0ea5e9;
}

.program-name {
  font-size: 1.3rem;
  font-weight: 700;
  color: #0f172a;
  margin-bottom: 15px;
  line-height: 1.3;
}

.program-description {
  color: #64748b;
  margin-bottom: 20px;
  line-height: 1.6;
  font-size: 0.95rem;
}

.program-highlights {
  margin-bottom: 25px;
}

.highlight-item {
  display: flex;
  align-items: center;
  margin-bottom: 8px;
}

.highlight-item i {
  color: #0f766e;
  margin-right: 8px;
  font-size: 0.9rem;
}

.highlight-item span {
  font-size: 0.9rem;
  color: #475569;
}

/* Advanced Apply Button */
.advanced-apply-btn {
  position: relative;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  background: #0f766e;
  color: white;
  padding: 12px 25px;
  border-radius: 8px;
  font-weight: 600;
  overflow: hidden;
  text-decoration: none;
  transition: all 0.4s;
  width: 100%;
  border: none;
  z-index: 1;
}

.advanced-apply-btn i {
  margin-left: 8px;
  transition: all 0.3s;
}

.btn-dynamic-border {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border: 2px solid transparent;
  border-radius: 6px;
  z-index: -1;
  transition: all 0.4s;
}

.advanced-apply-btn:hover {
  background: transparent;
  color: #0f766e;
  transform: translateY(-2px);
}

.advanced-apply-btn:hover .btn-dynamic-border {
  border-color: #0f766e;
}

.advanced-apply-btn:hover i {
  transform: translateX(5px);
}

@media (max-width: 992px) {
  .advanced-programs-tabs .nav-link {
    padding: 12px 15px;
  }
  
  .program-image-container {
    height: 180px;
  }
}

@media (max-width: 768px) {
  .section-title {
    font-size: 1.8rem;
  }
  
  .advanced-programs-tabs .nav-item {
    margin-bottom: 10px;
  }
}
</style>
  


    <!-- ======= Admissions Section ======= -->
 <!-- ======= Premium Admissions Section ======= -->
<section id="admissions" class="premium-admissions-section">
  <div class="container" data-aos="fade-up">

    <!-- Section Header -->
    <div class="section-header-center">
      <span class="section-subtitle">Your Journey Begins Here</span>
      <h2 class="section-title">Admissions Process</h2>
      <div class="section-divider"></div>
      <p class="section-intro">Start your application in just a few simple steps</p>
    </div>

    <div class="admission-process-container">
      <div class="row g-0">

        <!-- Visual Column -->
        <div class="col-lg-5 admission-visual-col">
          <div class="admission-visual-wrapper">
            <div class="floating-admission-card" data-aos="fade-right">
              <div class="card-header">
                <h3>Ready to Apply?</h3>
                <p>We're accepting applications for 2024 intakes</p>
              </div>
              <div class="card-stats">
                <div class="stat-item">
                  <div class="stat-number">97%</div>
                  <div class="stat-label">Admission Success</div>
                </div>
                <div class="stat-item">
                  <div class="stat-number">48h</div>
                  <div class="stat-label">Avg. Response Time</div>
                </div>
              </div>
              <div class="card-image-overlay">
                <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" 
                     alt="Happy students on campus" class="img-fluid">
              </div>
            </div>
          </div>
        </div>

        <!-- Process Steps Column -->
        <div class="col-lg-7 admission-steps-col">
          <div class="admission-process-steps" data-aos="fade-left">
            
            <!-- Step 1 -->
            <div class="process-step active">
              <div class="step-indicator">
                <div class="step-number">1</div>
                <div class="step-progress"></div>
              </div>
              <div class="step-content">
                <h3 class="step-title">Check Requirements</h3>
                <p class="step-description">
                  Review academic prerequisites, language proficiency, and program-specific requirements for your chosen course.
                </p>
                <div class="step-details">
                  <div class="detail-item">
                    <i class="bi bi-file-earmark-text"></i>
                    <span>Transcripts</span>
                  </div>
                  <div class="detail-item">
                    <i class="bi bi-translate"></i>
                    <span>English Test Scores</span>
                  </div>
                  <div class="detail-item">
                    <i class="bi bi-file-person"></i>
                    <span>Personal Statement</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Step 2 -->
            <div class="process-step">
              <div class="step-indicator">
                <div class="step-number">2</div>
                <div class="step-progress"></div>
              </div>
              <div class="step-content">
                <h3 class="step-title">Submit Application</h3>
                <p class="step-description">
                  Complete our streamlined online application and upload all required supporting documents.
                </p>
                <div class="step-details">
                  <div class="detail-item">
                    <i class="bi bi-laptop"></i>
                    <span>Online Portal</span>
                  </div>
                  <div class="detail-item">
                    <i class="bi bi-upload"></i>
                    <span>Document Upload</span>
                  </div>
                  <div class="detail-item">
                    <i class="bi bi-chat-square-text"></i>
                    <span>Application Review</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Step 3 -->
            <div class="process-step">
              <div class="step-indicator">
                <div class="step-number">3</div>
                <div class="step-progress"></div>
              </div>
              <div class="step-content">
                <h3 class="step-title">Interview & Assessment</h3>
                <p class="step-description">
                  Participate in an admission interview (if required) and complete any program-specific assessments.
                </p>
                <div class="step-details">
                  <div class="detail-item">
                    <i class="bi bi-camera-video"></i>
                    <span>Virtual Interview</span>
                  </div>
                  <div class="detail-item">
                    <i class="bi bi-pencil-square"></i>
                    <span>Entrance Exam</span>
                  </div>
                  <div class="detail-item">
                    <i class="bi bi-people"></i>
                    <span>Faculty Review</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Step 4 -->
            <div class="process-step">
              <div class="step-indicator">
                <div class="step-number">4</div>
                <div class="step-progress"></div>
              </div>
              <div class="step-content">
                <h3 class="step-title">Receive Decision</h3>
                <p class="step-description">
                  Get your admission decision along with registration details and next steps.
                </p>
                <div class="step-details">
                  <div class="detail-item">
                    <i class="bi bi-envelope-open"></i>
                    <span>Email Notification</span>
                  </div>
                  <div class="detail-item">
                    <i class="bi bi-file-text"></i>
                    <span>Official Letter</span>
                  </div>
                  <div class="detail-item">
                    <i class="bi bi-calendar-check"></i>
                    <span>Orientation Date</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- CTA Button -->
            <div class="process-cta">
              <a href="#" class="premium-apply-btn">
                <span>Begin Your Application</span>
                <div class="btn-hover-effect"></div>
                <i class="bi bi-arrow-right"></i>
              </a>
              <p class="cta-note">
                Need help? <a href="#">Contact our admissions team</a> or attend an <a href="#">information session</a>.
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- Premium Admissions CSS -->
<style>
.premium-admissions-section {
  padding: 100px 0;
  background: linear-gradient(135deg, #f8fafc 0%, #3be264 100%);
  position: relative;
}

.section-header-center {
  text-align: center;
  margin-bottom: 60px;
}

.section-subtitle {
  display: inline-block;
  color: #0f766e;
  font-size: 0.9rem;
  font-weight: 600;
  letter-spacing: 1px;
  text-transform: uppercase;
  margin-bottom: 15px;
}

.section-title {
  font-weight: 700;
  font-size: 2.3rem;
  color: #0f172a;
  margin-bottom: 15px;
}

.section-divider {
  width: 80px;
  height: 3px;
  background: linear-gradient(90deg, #0f766e 0%, rgba(15, 118, 110, 0.1) 100%);
  margin: 20px auto;
}

.section-intro {
  color: #64748b;
  max-width: 600px;
  margin: 0 auto;
  font-size: 1.1rem;
}

.admission-process-container {
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 15px 50px rgba(0, 0, 0, 0.432);
}

.admission-visual-col {
  position: relative;
  min-height: 500px;
}

.admission-visual-wrapper {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(135deg, #0f766e 0%, #115e59 100%);
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 40px;
}

.floating-admission-card {
  background: white;
  border-radius: 10px;
  padding: 30px;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
  max-width: 380px;
  position: relative;
  z-index: 2;
}

.card-header h3 {
  color: #0f172a;
  font-weight: 700;
  margin-bottom: 5px;
}

.card-header p {
  color: #64748b;
  font-size: 0.95rem;
}

.card-stats {
  display: flex;
  gap: 20px;
  margin: 25px 0;
}

.stat-item {
  text-align: center;
  flex: 1;
}

.stat-number {
  font-size: 1.8rem;
  font-weight: 700;
  color: #0f766e;
  line-height: 1;
}

.stat-label {
  font-size: 0.8rem;
  color: #64748b;
  margin-top: 5px;
}

.card-image-overlay {
  margin-top: 20px;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.card-image-overlay img {
  width: 100%;
  height: auto;
  display: block;
}

.admission-steps-col {
  background: white;
  padding: 50px;
}

.admission-process-steps {
  max-width: 600px;
  margin: 0 auto;
}

.process-step {
  display: flex;
  gap: 20px;
  padding: 25px 0;
  border-bottom: 1px solid #e2e8f0;
  transition: all 0.3s;
}

.process-step:last-child {
  border-bottom: none;
}

.process-step:hover {
  padding-left: 10px;
}

.step-indicator {
  position: relative;
  flex-shrink: 0;
}

.step-number {
  width: 40px;
  height: 40px;
  background: #e2e8f0;
  color: #64748b;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 700;
  font-size: 1.1rem;
  transition: all 0.3s;
}

.step-progress {
  position: absolute;
  top: 40px;
  left: 50%;
  transform: translateX(-50%);
  width: 2px;
  height: calc(100% - 40px);
  background: #e2e8f0;
  z-index: 1;
}

.process-step:last-child .step-progress {
  display: none;
}

.process-step.active .step-number {
  background: #0f766e;
  color: white;
}

.step-title {
  font-size: 1.1rem;
  font-weight: 600;
  color: #0f172a;
  margin-bottom: 8px;
}

.step-description {
  color: #64748b;
  font-size: 0.95rem;
  margin-bottom: 15px;
  line-height: 1.6;
}

.step-details {
  display: flex;
  gap: 15px;
  flex-wrap: wrap;
}

.detail-item {
  display: flex;
  align-items: center;
  background: #f1f5f9;
  padding: 6px 12px;
  border-radius: 20px;
  font-size: 0.8rem;
}

.detail-item i {
  color: #0f766e;
  margin-right: 5px;
  font-size: 0.9rem;
}

.process-cta {
  margin-top: 40px;
  text-align: center;
}

.premium-apply-btn {
  position: relative;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  background: #0f766e;
  color: white;
  padding: 15px 35px;
  border-radius: 8px;
  font-weight: 600;
  overflow: hidden;
  text-decoration: none;
  transition: all 0.4s;
  box-shadow: 0 4px 15px rgba(15, 118, 110, 0.3);
  border: none;
}

.premium-apply-btn i {
  margin-left: 10px;
  transition: all 0.3s;
}

.btn-hover-effect {
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
  transition: 0.5s;
}

.premium-apply-btn:hover {
  transform: translateY(-3px);
  box-shadow: 0 7px 20px rgba(15, 118, 110, 0.4);
}

.premium-apply-btn:hover .btn-hover-effect {
  left: 100%;
}

.premium-apply-btn:hover i {
  transform: translateX(5px);
}

.cta-note {
  margin-top: 15px;
  color: #64748b;
  font-size: 0.9rem;
}

.cta-note a {
  color: #0f766e;
  font-weight: 500;
  text-decoration: none;
  transition: all 0.3s;
}

.cta-note a:hover {
  text-decoration: underline;
}

@media (max-width: 992px) {
  .admission-visual-col {
    min-height: 300px;
  }
  
  .admission-steps-col {
    padding: 30px;
  }
  
  .floating-admission-card {
    max-width: 100%;
  }
}

@media (max-width: 768px) {
  .section-title {
    font-size: 1.8rem;
  }
  
  .admission-process-steps {
    padding-top: 30px;
  }
  
  .process-step {
    padding: 20px 0;
  }
}
</style>

   
<!-- ======= Modern Research Section ======= -->
<section id="research" class="modern-research">
  <div class="floating-shapes" id="researchShapes"></div>
  
  <div class="container" data-aos="fade-up">
    <div class="section-header text-center">
      <span class="section-subtitle">Cutting-Edge Discoveries</span>
      <h2 class="section-title">Research & Innovation</h2>
      <div class="header-divider"></div>
      <p class="section-description">Driving progress through interdisciplinary research and technological advancement</p>
    </div>

    <div class="research-grid">
      <div class="row g-4 justify-content-center">
        <!-- Research Item 1 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="research-card">
            <div class="card-badge">Energy</div>
            <div class="research-image-container">
              <img src="https://images.unsplash.com/photo-1508514177221-188b1cf16e9d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1172&q=80" 
                   alt="Renewable Energy Research" class="research-image">
              <div class="image-overlay"></div>
            </div>
            <div class="research-content">
              <h3 class="research-title">Renewable Energy Solutions</h3>
              <p class="research-description">
                Developing affordable solar technologies and energy storage systems for rural Zambian communities
              </p>
              <div class="research-meta">
                <span class="meta-item"><i class="bi bi-people"></i> 12 Researchers</span>
                <span class="meta-item"><i class="bi bi-calendar"></i> Since 2018</span>
              </div>
              <a href="#" class="research-link">
                <span>Explore Project</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- Research Item 2 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="research-card">
            <div class="card-badge">Education</div>
            <div class="research-image-container">
              <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" 
                   alt="Education Research" class="research-image">
              <div class="image-overlay"></div>
            </div>
            <div class="research-content">
              <h3 class="research-title">Education Innovation</h3>
              <p class="research-description">
                Researching culturally-responsive teaching methods and digital learning platforms for Zambian classrooms
              </p>
              <div class="research-meta">
                <span class="meta-item"><i class="bi bi-people"></i> 8 Researchers</span>
                <span class="meta-item"><i class="bi bi-calendar"></i> Since 2020</span>
              </div>
              <a href="#" class="research-link">
                <span>Explore Project</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- Research Item 3 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="research-card">
            <div class="card-badge">Agriculture</div>
            <div class="research-image-container">
              <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1171&q=80" 
                   alt="Agriculture Research" class="research-image">
              <div class="image-overlay"></div>
            </div>
            <div class="research-content">
              <h3 class="research-title">Sustainable Agriculture</h3>
              <p class="research-description">
                Developing climate-resilient farming techniques and drought-resistant crop varieties for local farmers
              </p>
              <div class="research-meta">
                <span class="meta-item"><i class="bi bi-people"></i> 15 Researchers</span>
                <span class="meta-item"><i class="bi bi-calendar"></i> Since 2016</span>
              </div>
              <a href="#" class="research-link">
                <span>Explore Project</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="text-center mt-5">
      <a href="#" class="btn-view-all">
        View All Research Projects
        <i class="bi bi-chevron-double-right"></i>
      </a>
    </div>
  </div>
</section>

<style>
.modern-research {
  padding: 80px 0;
  position: relative;
  background-color: #ffff;
}

.floating-shapes {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  overflow: hidden;
  z-index: 0;
}

.section-header {
  margin-bottom: 50px;
  position: relative;
  z-index: 1;
}

.section-subtitle {
  display: block;
  color: #0d6efd;
  font-size: 0.9rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 1px;
  margin-bottom: 10px;
}

.section-title {
  font-size: 2.2rem;
  font-weight: 700;
  color: #212529;
  margin-bottom: 15px;
}

.header-divider {
  width: 60px;
  height: 3px;
  background: linear-gradient(to right, #0d6efd, #6c757d);
  margin: 0 auto 20px;
}

.section-description {
  color: #6c757d;
  max-width: 700px;
  margin: 0 auto;
}

.research-grid {
  position: relative;
  z-index: 1;
}

.research-card {
  border-radius: 10px;
  overflow: hidden;
  background: white;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
  transition: all 0.4s ease;
  height: 100%;
}

.research-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 15px 40px rgba(0, 0, 0, 0.384);
}

.card-badge {
  position: absolute;
  top: 15px;
  right: 15px;
  background: #0d6efd;
  color: white;
  padding: 5px 15px;
  border-radius: 20px;
  font-size: 0.8rem;
  font-weight: 600;
  z-index: 2;
}

.research-image-container {
  height: 220px;
  position: relative;
  overflow: hidden;
}

.research-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.5s ease;
}

.research-card:hover .research-image {
  transform: scale(1.05);
}

.image-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(to bottom, rgba(0,0,0,0) 0%, rgba(0,0,0,0.3) 100%);
}

.research-content {
  padding: 25px;
}

.research-title {
  font-size: 1.3rem;
  font-weight: 700;
  color: #212529;
  margin-bottom: 15px;
}

.research-description {
  color: #6c757d;
  margin-bottom: 20px;
  line-height: 1.6;
}

.research-meta {
  display: flex;
  gap: 15px;
  margin-bottom: 20px;
}

.meta-item {
  display: flex;
  align-items: center;
  font-size: 0.85rem;
  color: #6c757d;
}

.meta-item i {
  margin-right: 5px;
  color: #0d6efd;
}

.research-link {
  display: inline-flex;
  align-items: center;
  color: #0d6efd;
  font-weight: 600;
  text-decoration: none;
  transition: all 0.3s;
}

.research-link i {
  margin-left: 8px;
  transition: transform 0.3s;
}

.research-link:hover {
  color: #0b5ed7;
}

.research-link:hover i {
  transform: translateX(5px);
}

.btn-view-all {
  display: inline-flex;
  align-items: center;
  background: #0d6efd;
  color: white;
  padding: 12px 30px;
  border-radius: 8px;
  font-weight: 600;
  text-decoration: none;
  transition: all 0.3s;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
}

.btn-view-all i {
  margin-left: 10px;
  transition: transform 0.3s;
}

.btn-view-all:hover {
  background: #0b5ed7;
  transform: translateY(-2px);
  box-shadow: 0 7px 20px rgba(13, 110, 253, 0.3);
}

.btn-view-all:hover i {
  transform: translateX(5px);
}

@media (max-width: 768px) {
  .section-title {
    font-size: 1.8rem;
  }
  
  .research-image-container {
    height: 200px;
  }
  
  .research-content {
    padding: 20px;
  }
}
</style>

<script>
// Floating shapes animation for background
document.addEventListener('DOMContentLoaded', function() {
  const container = document.getElementById('researchShapes');
  const shapes = ['circle', 'triangle', 'square'];
  const colors = ['rgba(13, 110, 253, 0.1)', 'rgba(108, 117, 125, 0.1)', 'rgba(220, 53, 69, 0.1)'];
  
  for (let i = 0; i < 15; i++) {
    const shape = document.createElement('div');
    const size = Math.random() * 50 + 20;
    const shapeType = shapes[Math.floor(Math.random() * shapes.length)];
    const color = colors[Math.floor(Math.random() * colors.length)];
    
    shape.style.position = 'absolute';
    shape.style.width = `${size}px`;
    shape.style.height = `${size}px`;
    shape.style.background = color;
    shape.style.opacity = '0.7';
    shape.style.borderRadius = shapeType === 'circle' ? '50%' : '0';
    shape.style.clipPath = shapeType === 'triangle' ? 'polygon(50% 0%, 0% 100%, 100% 100%)' : 'none';
    shape.style.left = `${Math.random() * 100}%`;
    shape.style.top = `${Math.random() * 100}%`;
    shape.style.animation = `float ${Math.random() * 10 + 10}s linear infinite`;
    shape.style.animationDelay = `${Math.random() * 5}s`;
    shape.style.transform = `rotate(${Math.random() * 360}deg)`;
    
    container.appendChild(shape);
  }
});
</script>


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div>
            <h4>Address</h4>
            <p>
              12790 Hillcrest Extension<br>
              Ndola, Zambia<br>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Contact</h4>
            <p>
              <strong>Phone:</strong> +260 971 884 141<br>
              <strong>Email:</strong> northsuniversitycollege@gmail.com<br>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>Opening Hours</h4>
            <p>
              <strong>Mon-Fri:</strong> 8AM - 5PM<br>
              <strong>Sat:</strong> 9AM - 1PM
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Quick Links</h4>
          <ul>
            <li><a href="#admissions">Admissions</a></li>
            <li><a href="#programs">Programs</a></li>
            <li><a href="#">Student Portal</a></li>
            <li><a href="#">Library</a></li>
          </ul>
        </div>

      </div>
    </div>

    <div class="container">
      <div class="copyright">
       2025 &copy; Copyright <strong><span>NORTH SWEETBERG UNIVERSITY COLLEGE</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a target="_blank" href=" https://chosentechnology.netlify.app">Chosen Technology</a>
      </div>
    </div>
    <script>
      // Create floating shapes
      const floatingShapes = document.getElementById('floatingShapes');
      for (let i = 0; i < 15; i++) {
          const shape = document.createElement('div');
          const size = Math.random() * 100 + 50;
          const posX = Math.random() * window.innerWidth;
          const posY = Math.random() * window.innerHeight + window.innerHeight;
          const delay = Math.random() * 15;
          const duration = Math.random() * 10 + 10;
          
          shape.style.width = `${size}px`;
          shape.style.height = `${size}px`;
          shape.style.left = `${posX}px`;
          shape.style.top = `${posY}px`;
          shape.style.animationDelay = `${delay}s`;
          shape.style.animationDuration = `${duration}s`;
          
          floatingShapes.appendChild(shape);
      }
      
      // Animation trigger when page loads
      document.addEventListener('DOMContentLoaded', function() {
          // Force all animations to play (for browsers that might not trigger them automatically)
          const animatedElements = document.querySelectorAll('[style*="animation"]');
          animatedElements.forEach(el => {
              el.style.animationPlayState = 'running';
          });
      });
      // Add this script at the end of your file or in a separate JS file
document.addEventListener('DOMContentLoaded', function() {
  // Image carousel functionality
  const images = document.querySelectorAll('.image-carousel img');
  const dots = document.querySelectorAll('.carousel-dots span');
  let currentIndex = 0;
  
  // Create dots dynamically
  const carouselDots = document.querySelector('.carousel-dots');
  images.forEach((_, index) => {
    const dot = document.createElement('span');
    if(index === 0) dot.classList.add('active');
    dot.addEventListener('click', () => goToSlide(index));
    carouselDots.appendChild(dot);
  });
  
  function updateCarousel() {
    images.forEach((img, index) => {
      img.classList.toggle('active', index === currentIndex);
    });
    
    document.querySelectorAll('.carousel-dots span').forEach((dot, index) => {
      dot.classList.toggle('active', index === currentIndex);
    });
  }
  
  function goToSlide(index) {
    currentIndex = index;
    updateCarousel();
  }
  
  function nextSlide() {
    currentIndex = (currentIndex + 1) % images.length;
    updateCarousel();
  }
  
  // Auto-rotate images every 5 seconds
  setInterval(nextSlide, 5000);
  
  // Floating shapes
  const floatingShapes = document.getElementById('floatingShapes');
  const shapes = ['circle', 'triangle', 'square'];
  const colors = ['rgba(255, 255, 255, 0.1)', 'rgba(255, 255, 255, 0.07)', 'rgba(255, 255, 255, 0.05)'];
  
  for(let i = 0; i < 8; i++) {
    const shape = document.createElement('div');
    const size = Math.random() * 50 + 20;
    const posX = Math.random() * 100;
    const posY = Math.random() * 100;
    const delay = Math.random() * 10;
    const duration = Math.random() * 15 + 10;
    const shapeType = shapes[Math.floor(Math.random() * shapes.length)];
    
    shape.style.width = `${size}px`;
    shape.style.height = `${size}px`;
    shape.style.left = `${posX}%`;
    shape.style.top = `${posY}%`;
    shape.style.animationDelay = `${delay}s`;
    shape.style.animationDuration = `${duration}s`;
    shape.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
    
    if(shapeType === 'circle') {
      shape.style.borderRadius = '50%';
    } else if(shapeType === 'triangle') {
      shape.style.width = '0';
      shape.style.height = '0';
      shape.style.backgroundColor = 'transparent';
      shape.style.borderLeft = `${size/2}px solid transparent`;
      shape.style.borderRight = `${size/2}px solid transparent`;
      shape.style.borderBottom = `${size}px solid ${colors[Math.floor(Math.random() * colors.length)]}`;
    }
    
    shape.style.position = 'absolute';
    shape.style.opacity = '0.5';
    shape.style.animation = `float ${duration}s infinite linear`;
    
    floatingShapes.appendChild(shape);
  }
});
  // Apply Now button smooth scroll
  document.querySelector('.btn-apply-now').addEventListener('click', function(e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute('href'));
    target.scrollIntoView({
      behavior: 'smooth'
    });
  });
  </script>
  
  </footer><!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>