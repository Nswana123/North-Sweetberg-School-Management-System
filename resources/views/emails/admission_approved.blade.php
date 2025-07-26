<!DOCTYPE html>
<html>
<head>
    <title>Admission Approved</title>
</head>
<body>
    <h2>Congratulations!</h2>
    <p>Your admission has been approved. Below are your login credentials:</p>
    
    <p><strong>Student Number:</strong> {{ $studentNumber }}</p>
    <p><strong>Password:</strong> {{ $password }}</p>
    
    <p>Please login to the student portal using the following link:</p>
    <p><a href="{{ $loginUrl }}">{{ $loginUrl }}</a></p>
    
    <p>For security reasons, we recommend changing your password after first login.</p>
    
    <p>Best regards,<br>
    The Admissions Team</p>
</body>
</html>