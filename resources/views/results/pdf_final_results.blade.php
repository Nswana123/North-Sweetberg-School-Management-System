<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Final Results</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        h3, h5 { margin-bottom: 0; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #000;
            padding: 5px;
            font-size: 12px;
        }
        .badge {
            display: inline-block;
            padding: 2px 5px;
            font-size: 11px;
            color: white;
        }
        .bg-success { background-color: #28a745; }
        .bg-danger { background-color: #dc3545; }
        .bg-secondary { background-color: #6c757d; }
    </style>
</head>
<body>

    <h3>Final Results</h3>
    <p><strong>Student:</strong> {{ $student->user->fname }} {{ $student->user->lname }}</p>
    <p><strong>Student Number:</strong> {{ $student->user->student_number }}</p>
    <p><strong>Program:</strong> {{ $student->program->name ?? '-' }}</p>
    <p><strong>Year of Study:</strong> {{ $student->year_of_study }}</p>

    @forelse($results as $year => $yearResults)
        <div>
            <h5>Academic Year: {{ $year }}</h5>
            <table>
                <thead>
                    <tr>
                        <th>Course Code</th>
                        <th>Course Title</th>
                        <th>CA</th>
                        <th>Exam</th>
                        <th>Final</th>
                        <th>Grade</th>
                        <th>Comment</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($yearResults as $result)
                        <tr>
                            <td>{{ $result->course->code }}</td>
                            <td>{{ $result->course->title }}</td>
                            <td>{{ $result->ca_mark ?? '-' }}</td>
                            <td>{{ $result->exam_mark ?? '-' }}</td>
                            <td>{{ $result->final_mark ?? '-' }}</td>
                            <td>
                                <span class="badge bg-{{ $result->grade === 'F' ? 'danger' : ($result->grade === 'A+' ? 'success' : 'secondary') }}">
                                    {{ $result->grade ?? '-' }}
                                </span>
                            </td>
                            <td>{{ $result->comment ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @empty
        <p>No results available.</p>
    @endforelse

</body>
</html>
