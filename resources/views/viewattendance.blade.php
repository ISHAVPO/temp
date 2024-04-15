@include('laravel.header')

<table class="table table-light">
    <thead>
        <tr>
            <th>Student ID</th>
            <th>Student Name</th>
            <th>Status</th>
            <th>Study Time</th>
            <th>View Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{ $student->user_id }}</td>
            <td>{{ $student->name }}</td>
            <td>
                @if ($student->currentAttendance->isNotEmpty())
                    Present
                @else
                    Absent
                @endif
            </td>
            <td>
                @php
                    $totalStudySeconds = 0;
                @endphp
                @foreach ($student->currentAttendance as $attendance)
                    @if ($attendance->markOut)
                        @php
                            $markIn = strtotime($attendance->markIn);
                            $markOut = strtotime($attendance->markOut);
                            $timeDiff = $markOut - $markIn;
                            $totalStudySeconds += $timeDiff;
                        @endphp
                    @endif
                @endforeach
                @php
                    $totalStudyHours = floor($totalStudySeconds / 3600); // 3600 seconds in an hour
                    $totalStudyMinutes = floor(($totalStudySeconds % 3600) / 60); // Remaining minutes after subtracting hours
                    $totalStudySeconds %= 60; // Remaining seconds after subtracting hours and minutes
                @endphp
                {{ $totalStudyHours }} hours {{ $totalStudyMinutes }} minutes {{ $totalStudySeconds }} seconds
            </td>
            <td>
                <button class="btn btn-light" data-toggle="modal" data-target="#attendanceModal{{ $student->user_id }}">
                    View Status
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@foreach($students as $student)
    <div class="modal fade" id="attendanceModal{{ $student->user_id }}" tabindex="-1" role="dialog" aria-labelledby="attendanceModalLabel{{ $student->user_id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="attendanceModalLabel{{ $student->user_id }}">Attendance Status for {{ $student->name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Study Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalStudySecondsModal = 0;
                            @endphp
                            @foreach ($student->allAttendance as $attendance)
                                <tr>
                                    <td>{{ $attendance->dateIn }}</td>
                                    <td>
                                        @if ($attendance->markOut)
                                            Present
                                        @else
                                            Absent
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $markIn = strtotime($attendance->markIn);
                                            $markOut = strtotime($attendance->markOut);
                                            $timeDiff = $markOut - $markIn;
                                            $studyHours = floor($timeDiff / 3600); // 3600 seconds in an hour
                                            $studyMinutes = floor(($timeDiff % 3600) / 60); // Remaining minutes after subtracting hours
                                            $studySeconds = $timeDiff % 60; // Remaining seconds after subtracting hours and minutes
                                            $totalStudySecondsModal += $timeDiff;
                                        @endphp
                                        {{ floor($studyHours) }} hours {{ floor($studyMinutes) }} minutes {{ $studySeconds }} seconds
                                    </td>
                                </tr>
                            @endforeach
                            @php
                                $totalStudyHoursModal = floor($totalStudySecondsModal / 3600); // 3600 seconds in an hour
                                $totalStudyMinutesModal = floor(($totalStudySecondsModal % 3600) / 60); // Remaining minutes after subtracting hours
                                $totalStudySecondsModal %= 60; // Remaining seconds after subtracting hours and minutes
                            @endphp
                            <tr>
                                <td colspan="2"><strong>Total Study Time</strong></td>
                                <td>{{ $totalStudyHoursModal }} hours {{ $totalStudyMinutesModal }} minutes {{ $totalStudySecondsModal }} seconds</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endforeach

@include('laravel.footer')
