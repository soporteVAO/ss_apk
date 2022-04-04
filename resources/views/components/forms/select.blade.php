
<select class="form-select" aria-label="Default select example" name="{{$systemName}}">
    @foreach ($options as $option)
        @if($loop->iteration==1 && is_null($value))
                
        @endif
        <option value="{{$option->value}}">{{$option->label}}</option>
    @endforeach
</select>