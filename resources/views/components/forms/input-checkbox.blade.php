
@foreach ($options as $option)
    {{--$option->label--}}
    <div class="form-check">
        <label class="form-check-label">
            
            @if ($value==$option->value)
                <input class="form-check-input" type="checkbox" value="{{$option->value}}" id="flexCheckDefault" name="{{$systemName}}[]" checked>
            @else
                <input class="form-check-input" type="checkbox" value="{{$option->value}}" id="flexCheckDefault" name="{{$systemName}}[]">
            @endif
            <span class="form-check-sign"></span>
            {{$option->label}}
        </label>
    </div>
@endforeach