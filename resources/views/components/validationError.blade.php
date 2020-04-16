@error($field)
@foreach($errors->get($field) as $error)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $error }}</strong>
    </span>
@endforeach
@enderror
