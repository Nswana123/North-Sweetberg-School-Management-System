<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Exam Slip</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .header { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
        th { background-color: #28a745; color: white; }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('images/graduate.png') }}" alt="Student Icon" width="70">
        <h3>Exam Slip</h3>
        <p><strong>Student Name:</strong> {{ $student->user->fname }} {{ $student->user->lname }}</p>
        <p><strong>Student ID:</strong> {{ $student->user->student_number }}</p>
        <p><strong>Program:</strong> {{ $student->program->name }}</p>
        <p><strong>Academic Year:</strong> {{ $student->year_of_study }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Course Code</th>
                <th>Course Name</th>
                <th>Invigilator</th>
                <th>Signature</th>
            </tr>
        </thead>
        <tbody>
            @forelse($registeredCourses as $registration)
                <tr>
                    <td>{{ $registration->course->code }}</td>
                    <td>{{ $registration->course->title }}</td>
                    <td></td>
                    <td></td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No registered courses found for this academic year.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
