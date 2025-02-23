@if($rating)
    @for($i = 1; $i <= 5; $i++)
        <span style="color: {{ $i <= round($rating) ? '#FFD700' : '#ccc' }};">★</span>
    @endfor
@else
    No rating yet
@endif
