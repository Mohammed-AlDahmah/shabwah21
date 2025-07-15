<div>
@foreach($notifications as $note)
    <div class="alert alert-{{ $note['type'] }} d-flex align-items-center mb-2" role="alert">
        <i class="bi {{ $note['type'] == 'success' ? 'bi-check-circle-fill' : 'bi-info-circle-fill' }} me-2"></i>
        <div>{{ $note['message'] }}</div>
    </div>
@endforeach
</div> 