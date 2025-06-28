document.addEventListener('DOMContentLoaded', function() {
    // Initialize Bootstrap components
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
    
    const modal = new bootstrap.Modal(document.getElementById('confirmationModal'));
    
    // Application form steps
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
    document.getElementById('schoolSelect').addEventListener('change', function() {
        const school = this.value;
        const programLevelSelect = document.getElementById('programLevel');
        
        // Show/hide short course option based on school selection
        const shortOption = programLevelSelect.querySelector('.short-only');
        if (school === 'short') {
            shortOption.style.display = 'block';
            programLevelSelect.value = 'short';
        } else {
            shortOption.style.display = 'none';
            programLevelSelect.value = '';
        }
        
        // Reset course selection
        document.getElementById('courseContainer').classList.add('d-none');
        document.querySelector('.next-step').disabled = true;
    });
    
    // Program level change handler
    document.getElementById('programLevel').addEventListener('change', function() {
        const school = document.getElementById('schoolSelect').value;
        const programLevel = this.value;
        
        if (school && programLevel) {
            loadCourses(school, programLevel);
        } else {
            document.getElementById('courseContainer').classList.add('d-none');
            document.querySelector('.next-step').disabled = true;
        }
    });
    
    // Next step buttons
    document.querySelectorAll('.next-step').forEach(button => {
        button.addEventListener('click', function() {
            if (validateStep(currentStep)) {
                currentStep++;
                showStep(currentStep);
                updateProgressBar();
            }
        });
    });
    
    // Previous step buttons
    document.querySelectorAll('.prev-step').forEach(button => {
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
            // Generate student number
            const studentNumber = generateStudentNumber();
            document.getElementById('modalStudentNumber').textContent = studentNumber;
            
            // Show confirmation modal
            modal.show();
            
            // In a real app, you would submit to server here
            // For demo, we'll just show the modal
        }
    });
    
    // PDF download button
    document.getElementById('downloadPdfBtn').addEventListener('click', function() {
        generatePdf();
    });
    
    // Proceed to payment button
    document.getElementById('proceedToPaymentBtn').addEventListener('click', function() {
        // In a real app, this would redirect to payment gateway
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
                const requiredFields = ['fullName', 'dob', 'gender', 'email', 'phone', 'nationalId'];
                requiredFields.forEach(fieldId => {
                    const field = document.getElementById(fieldId);
                    if (!field.value.trim()) {
                        field.classList.add('is-invalid');
                        isValid = false;
                    } else {
                        field.classList.remove('is-invalid');
                    }
                });
                
                // Simple email validation
                const email = document.getElementById('email').value;
                if (email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                    document.getElementById('email').classList.add('is-invalid');
                    isValid = false;
                }
                
                if (!isValid) {
                    alert('Please fill in all required fields with valid information');
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
                    isValid = false;
                    alert('Please accept the declaration to proceed');
                } else {
                    // Update review section with form data
                    updateReviewSection();
                }
                break;
        }
        
        return isValid;
    }
    
    function loadCourses(school, programLevel) {
        const courseContainer = document.getElementById('courseContainer');
        courseContainer.innerHTML = '';
        
        if (courses[school] && courses[school][programLevel]) {
            courses[school][programLevel].forEach(course => {
                const courseCard = document.createElement('div');
                courseCard.className = 'col-md-4 mb-3';
                courseCard.innerHTML = `
                    <div class="card course-card" data-course="${course}">
                        <div class="card-body">
                            <h5 class="card-title">${course}</h5>
                            <p class="card-text text-muted small">
                                Tuition: ZMW ${tuitionFees[school][programLevel].toLocaleString()}
                            </p>
                            <button class="btn btn-sm btn-primary select-course">Select</button>
                        </div>
                    </div>
                `;
                courseContainer.appendChild(courseCard);
            });
            
            courseContainer.classList.remove('d-none');
            
            // Add event listeners to course cards
            document.querySelectorAll('.course-card').forEach(card => {
                card.addEventListener('click', function() {
                    // Remove selected class from all cards
                    document.querySelectorAll('.course-card').forEach(c => {
                        c.classList.remove('selected');
                    });
                    
                    // Add selected class to clicked card
                    this.classList.add('selected');
                    
                    // Enable next button
                    document.querySelector('.next-step').disabled = false;
                });
            });
        }
    }
    
    function handleFileUpload(event, previewId, multiple = false) {
        const files = event.target.files;
        const previewContainer = document.getElementById(previewId);
        previewContainer.innerHTML = '';
        
        if (files.length > 0) {
            if (multiple) {
                // For multiple files (certificates)
                const fileList = document.createElement('ul');
                fileList.className = 'list-unstyled';
                
                Array.from(files).forEach(file => {
                    const listItem = document.createElement('li');
                    listItem.className = 'small mb-1';
                    
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.className = 'preview-image img-thumbnail me-2';
                            img.style.maxHeight = '50px';
                            listItem.prepend(img);
                        };
                        reader.readAsDataURL(file);
                    } else if (file.type === 'application/pdf') {
                        const pdfIcon = document.createElement('i');
                        pdfIcon.className = 'bi bi-file-earmark-pdf text-danger me-2';
                        listItem.prepend(pdfIcon);
                    }
                    
                    const fileName = document.createElement('span');
                    fileName.textContent = file.name;
                    listItem.appendChild(fileName);
                    
                    fileList.appendChild(listItem);
                });
                
                previewContainer.appendChild(fileList);
            } else {
                // For single file uploads
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
                        <span>${file.name}</span>
                    `;
                    previewContainer.appendChild(pdfPreview);
                }
            }
        }
    }
    
    function generateStudentNumber() {
        const now = new Date();
        const year = now.getFullYear();
        const randomNum = Math.floor(1000 + Math.random() * 9000);
        return `NSUC/${year}/${randomNum}`;
    }
    
    function updateReviewSection() {
        // Personal details
        document.getElementById('reviewName').textContent = document.getElementById('fullName').value;
        document.getElementById('reviewDob').textContent = document.getElementById('dob').value;
        document.getElementById('reviewGender').textContent = 
            document.getElementById('gender').options[document.getElementById('gender').selectedIndex].text;
        document.getElementById('reviewEmail').textContent = document.getElementById('email').value;
        document.getElementById('reviewPhone').textContent = document.getElementById('phone').value;
        
        // Program details
        const schoolSelect = document.getElementById('schoolSelect');
        document.getElementById('reviewSchool').textContent = schoolSelect.options[schoolSelect.selectedIndex].text;
        
        const programLevelSelect = document.getElementById('programLevel');
        document.getElementById('reviewProgram').textContent = 
            programLevelSelect.options[programLevelSelect.selectedIndex].text;
        
        const selectedCourse = document.querySelector('.course-card.selected');
        document.getElementById('reviewCourse').textContent = selectedCourse ? selectedCourse.dataset.course : '';
        
        // Document uploads
        const idUploaded = document.getElementById('idUpload').files.length > 0;
        const certsUploaded = document.getElementById('certificateUpload').files.length;
        const photoUploaded = document.getElementById('photoUpload').files.length > 0;
        
        let docsText = [];
        if (idUploaded) docsText.push('ID/Passport');
        if (certsUploaded) docsText.push(`${certsUploaded} certificate(s)`);
        if (photoUploaded) docsText.push('Photo');
        
        document.getElementById('reviewDocs').textContent = docsText.join(', ') || 'None';
    }
    
    function generatePdf() {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        
        // Add university logo
        // Note: In a real app, you would need to load the image properly
        // doc.addImage('images/nsuc-logo.png', 'PNG', 10, 10, 40, 20);
        
        // Header
        doc.setFontSize(20);
        doc.setTextColor(0, 0, 128); // Navy blue
        doc.text('North Sweetberg University College', 105, 20, { align: 'center' });
        
        doc.setFontSize(12);
        doc.setTextColor(0, 0, 0); // Black
        doc.text('12790 Hillcrest Extension, Ndola', 105, 28, { align: 'center' });
        doc.text('Contact: 0971884141, 0773258040, 0960502036', 105, 35, { align: 'center' });
        
        // Title
        doc.setFontSize(16);
        doc.text('APPLICATION SUMMARY', 105, 50, { align: 'center' });
        
        // Current date and student number
        const studentNumber = document.getElementById('modalStudentNumber').textContent;
        const today = new Date().toLocaleDateString();
        
        doc.setFontSize(12);
        doc.text(`Student Number: ${studentNumber}`, 15, 65);
        doc.text(`Date: ${today}`, 180, 65, { align: 'right' });
        
        // Line separator
        doc.line(15, 70, 195, 70);
        
        // Personal Information
        doc.setFontSize(14);
        doc.text('PERSONAL INFORMATION', 15, 80);
        
        doc.setFontSize(12);
        let y = 90;
        doc.text(`Full Name: ${document.getElementById('fullName').value}`, 20, y);
        y += 10;
        doc.text(`Date of Birth: ${document.getElementById('dob').value}`, 20, y);
        doc.text(`Gender: ${document.getElementById('gender').options[document.getElementById('gender').selectedIndex].text}`, 120, y);
        y += 10;
        doc.text(`Email: ${document.getElementById('email').value}`, 20, y);
        doc.text(`Phone: ${document.getElementById('phone').value}`, 120, y);
        y += 10;
        doc.text(`National ID: ${document.getElementById('nationalId').value}`, 20, y);
        y += 10;
        doc.text(`Address: ${document.getElementById('address').value}`, 20, y);
        y += 15;
        
        // Program Information
        doc.setFontSize(14);
        doc.text('PROGRAM INFORMATION', 15, y);
        y += 10;
        
        doc.setFontSize(12);
        const schoolSelect = document.getElementById('schoolSelect');
        doc.text(`School: ${schoolSelect.options[schoolSelect.selectedIndex].text}`, 20, y);
        y += 10;
        
        const programLevelSelect = document.getElementById('programLevel');
        doc.text(`Program Level: ${programLevelSelect.options[programLevelSelect.selectedIndex].text}`, 20, y);
        y += 10;
        
        const selectedCourse = document.querySelector('.course-card.selected');
        doc.text(`Course: ${selectedCourse ? selectedCourse.dataset.course : ''}`, 20, y);
        y += 15;
        
        // Documents
        doc.setFontSize(14);
        doc.text('DOCUMENTS SUBMITTED', 15, y);
        y += 10;
        
        doc.setFontSize(12);
        const idUploaded = document.getElementById('idUpload').files.length > 0 ? 'Yes' : 'No';
        doc.text(`ID/Passport: ${idUploaded}`, 20, y);
        y += 10;
        
        const certsUploaded = document.getElementById('certificateUpload').files.length;
        doc.text(`Academic Certificates: ${certsUploaded} file(s)`, 20, y);
        y += 10;
        
        const photoUploaded = document.getElementById('photoUpload').files.length > 0 ? 'Yes' : 'No';
        doc.text(`Profile Photo: ${photoUploaded}`, 20, y);
        y += 15;
        
        // Tuition Information
        const school = schoolSelect.value;
        const programLevel = programLevelSelect.value;
        const tuitionFee = tuitionFees[school] && tuitionFees[school][programLevel] ? 
                           tuitionFees[school][programLevel] : 0;
        
        doc.setFontSize(14);
        doc.text('TUITION FEE INFORMATION', 15, y);
        y += 10;
        
        doc.setFontSize(12);
        doc.text(`Tuition Fee: ZMW ${tuitionFee.toLocaleString()}`, 20, y);
        y += 10;
        
        // Payment QR code (placeholder)
        doc.text('Scan to make payment:', 120, y);
        // In a real app, you would generate a QR code here
        doc.rect(120, y + 5, 60, 60);
        doc.text('DPO Payment QR', 150, y + 40, { align: 'center' });
        
        // Footer
        doc.setFontSize(10);
        doc.text('This document is system generated and requires no signature.', 105, 280, { align: 'center' });
        
        // Save the PDF
        doc.save(`NSUC_Application_${studentNumber}.pdf`);
    }
});
// Update the validateStep function for step 2
function validateStep(stepIndex) {
    let isValid = true;
    
    switch (stepIndex) {
        // ... other cases ...
        
        case 1: // Personal details
            const requiredFields = [
                'firstName', 'lastName', 'dob', 'gender', 
                'nationalId', 'email', 'phone',
                'streetAddress', 'city', 'province',
                'emergencyName', 'emergencyRelationship', 'emergencyPhone'
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

            if (!isValid) {
                alert('Please fill in all required fields with valid information');
                // Scroll to first invalid field
                document.querySelector('.is-invalid').scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }
            break;
            
        // ... other cases ...
    }
    
    return isValid;
}

// Update the updateReviewSection function
function updateReviewSection() {
    // Personal Information
    document.getElementById('reviewName').textContent = 
        `${document.getElementById('firstName').value} ${document.getElementById('lastName').value}`;
    document.getElementById('reviewDob').textContent = document.getElementById('dob').value;
    document.getElementById('reviewGender').textContent = 
        document.getElementById('gender').options[document.getElementById('gender').selectedIndex].text;
    document.getElementById('reviewNationalId').textContent = document.getElementById('nationalId').value;
    
    // Contact Information
    document.getElementById('reviewEmail').textContent = document.getElementById('email').value;
    document.getElementById('reviewPhone').textContent = document.getElementById('phone').value;
    
    // Address
    document.getElementById('reviewAddress').textContent = 
        `${document.getElementById('streetAddress').value}, ${document.getElementById('city').value}, ` +
        `${document.getElementById('province').options[document.getElementById('province').selectedIndex].text}`;
    
    // Emergency Contact
    document.getElementById('reviewEmergencyContact').textContent = 
        `${document.getElementById('emergencyName').value} (${document.getElementById('emergencyRelationship').value}) - ` +
        document.getElementById('emergencyPhone').value;
    
    // Program Information (existing)
    const schoolSelect = document.getElementById('schoolSelect');
    document.getElementById('reviewSchool').textContent = schoolSelect.options[schoolSelect.selectedIndex].text;
    
    const programLevelSelect = document.getElementById('programLevel');
    document.getElementById('reviewProgram').textContent = 
        programLevelSelect.options[programLevelSelect.selectedIndex].text;
    
    const selectedCourse = document.querySelector('.course-card.selected');
    document.getElementById('reviewCourse').textContent = selectedCourse ? selectedCourse.dataset.course : '';
    
    // Documents (existing)
    const idUploaded = document.getElementById('idUpload').files.length > 0 ? 'Yes' : 'No';
    const certsUploaded = document.getElementById('certificateUpload').files.length;
    const photoUploaded = document.getElementById('photoUpload').files.length > 0 ? 'Yes' : 'No';
    
    document.getElementById('reviewDocs').textContent = 
        `ID: ${idUploaded}, Certificates: ${certsUploaded}, Photo: ${photoUploaded}`;
}