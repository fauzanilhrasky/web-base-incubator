<!DOCTYPE html>
<html>
<head>
    <title>Assignments Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Assignments Report</h2>
    <table>
        <thead>
            <tr>
                <th>Course Material Title</th>
                <th>Assignment Link</th>
                <th>Value</th>
                <th>Comment</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($assignments as $assignment)
                @foreach ($assignment->userSubmissions as $submission)
                    <tr>
                        <td>{{ $assignment->material->title ?? 'No Title' }}</td>
                        <td>
                            @if ($submission->file)
                                <a href="{{ asset('storage/' . $submission->file) }}">View Assignment</a>
                            @else
                                No Submission
                            @endif
                        </td>
                        <td>{{ $submission->passing_grade ?? 'Not Graded' }}</td>
                        <td>{{ $submission->comment ?? 'No Comment' }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</body>
</html>
