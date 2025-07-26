<!DOCTYPE html>
<html>
<head>
    <title>Admission Application Received</title>
</head>
<body>
    <h2>Dear {{ $name }},</h2>
    
    <p>Thank you for submitting your admission application for <strong>{{ $programName }}</strong>.</p>
    
    <p>Your application reference number is: <strong>{{ $referenceNumber }}</strong></p>
    
    <p>We have received your application and it is currently being processed. You will be notified via email once a decision has been made.</p>
    
    <p>If you need to check the status of your application or have any questions, please quote your reference number in all communications.</p>
    
    <p>Best regards,<br>
    The Admissions Team</p>
</body>
</html>