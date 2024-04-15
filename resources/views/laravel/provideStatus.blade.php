@include('laravel.header')
@if(isset($message))
<div style="margin: 10% 35% 0% 40%; color: grey; background: pink; padding: 10px; border-radius: 5px;">
        {{ $message }}
    </div>
    @endif

@foreach ($studentData as $data)
    <h2>{{ $data['subject']->sub_name }}</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['students'] as $student)
                <tr>
                    <td>{{ $student->user_id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>
                        <button type="button" class="btn btn-success btn-block">
                            <a href="{{ url('/approve') }}/{{$student->user_id}}/{{$data['subject']->id}}" class="text-white text-decoration-none">Approve</a>
                        </button>
                        <div class="reject-reason" style="display: none;">
                            <input type="text" name="reason" class="form-control" placeholder="Reason for rejection">
                        </div>
                        <button class="btn btn-danger btn-block reject-button" data-student="{{ $student->user_id }}" data-subject="{{ $data['subject']->id }}">Reject</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endforeach

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var rejectButtons = document.querySelectorAll('.reject-button');

        rejectButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent the default behavior of the link

                var rejectReason = this.closest('tr').querySelector('.reject-reason');
                var studentId = this.dataset.student;
                var subjectId = this.dataset.subject;

                if (rejectReason.style.display === 'none') {
                    rejectReason.style.display = 'block';
                } else {
                    var reasonInput = rejectReason.querySelector('input[name="reason"]');
                    var reasonValue = reasonInput.value.trim();
                    
                    if (reasonValue !== '') {
                        var rejectUrl = "{{ url('/reject') }}/" + studentId + "/" + subjectId + "/" + encodeURIComponent(reasonValue);
                        window.location.href = rejectUrl;
                    } else {
                        alert('Please provide a reason for rejection.');
                        reasonInput.focus(); 
                    }
                }
            });
        });
    });
</script>

@include('laravel.footer')
