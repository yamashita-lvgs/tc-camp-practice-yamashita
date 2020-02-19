@if($errors->has($value))
    @foreach($errors->get ($value) as $message)
        {{ $message }}<br>
    @endforeach
@endif
