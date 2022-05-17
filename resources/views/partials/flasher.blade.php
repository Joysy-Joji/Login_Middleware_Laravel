@if(!empty($status = session('status')))
    <span style="color: green;">{{ $status }}</span>
@endif

@if(!empty($error = session('error')))
    <span style="color: red;">{{ $error }}</span>
@endif
