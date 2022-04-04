
<div class="mb-3 form-group">
    <label for="exampleFormControlInput1" class="form-label">{{$field->label}}</label>
    @if($field->dataType=='int')
        <input type="number" name="{{$field->systemName}}" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{$value}}">
    @elseif ($field->dataType=='text')
        <input type="text" name="{{$field->systemName}}" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{$value}}">
    @elseif ($field->dataType=='boolean')
        <x-Forms.InputBoolean :value="$value" :systemName="$field->systemName"></x-Forms.InputBoolean>
    @elseif ($field->dataType=='date')
        <!-- <input type="datetime" name="{{$field->systemName}}" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{$value}}">     -->
    @elseif($field->dataType=='checkbox')
        <x-Forms.InputCheckbox :value="$value" :systemName="$field->systemName" :options="$field->options" ></x-Forms.InputCheckbox>
    @elseif($field->dataType=='picklist')
        <x-Forms.Select :value="$value" :systemName="$field->systemName" :options="$field->options"></x-Forms.InputCheckbox>
    @elseif($field->dataType=='textarea')
        <textarea name="{{$field->systemName}}" id="" cols="30" rows="20" class="form-control"></textarea>
    @elseif($field->dataType=='upload')

    @else
        <input type="text" class="form-control" id="" name="{{$field->systemName}}" placeholder="" value="{{$value}}">
    @endif
</div>