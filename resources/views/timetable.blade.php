<!DOCTYPE html>
<html>

<head>
    <title>Timetable Generator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .standard {
            background-color: #004085;
            color: aliceblue;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Timetable For ABC School</h1>
        @if(isset($timetable))
        @foreach($timetable as $class => $sections)
        <center>
            <h3 class="standard">{{ $class }}</h3>
        </center>
        @foreach($sections as $section => $slots)
        <center>
            <h4>Section: {{ $section }}</h4>
        </center>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Slot</th>
                    <th>Teacher</th>
                    <th>Subject</th>
                </tr>
            </thead>
            <tbody>
                @php $s=0; @endphp
                @foreach($slots as $time => $details)
                @php $s++; @endphp
                <tr>
                    <td>{{ $s }}</td>
                    <td>{{ $time }}</td>
                    <td>{{ is_array($details) ? $details['teacher'] : '' }}</td>
                    <td>{{ is_array($details) ? $details['subject'] : $details }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endforeach
        <hr>
        @endforeach
        @endif
    </div>
</body>

</html>