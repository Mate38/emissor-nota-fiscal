@if ($errors->has($nome))
    <span class="help-block small text-danger">
        {{$errors->first($nome)}}
    </span>
@endif