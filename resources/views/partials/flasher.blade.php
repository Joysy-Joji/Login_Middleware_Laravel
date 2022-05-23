@if(!empty($status = session('status')))
    <span style="color: green;">{{ $status }}</span>
@endif

@if(!empty($error = session('error')))
    <span style="color: red;">{{ $error }}</span>
@endif

@error('name') <span style="color: red;">{{ $message }}</span> @enderror<br>

@error('email')   <span style="color: red;">{{ $message }}</span> @enderror<br>

@error('password')  <span style="color: red;">{{ $message }}</span> @enderror<br>

