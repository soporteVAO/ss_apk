<ul class="nav nav-tabs nav-fill" id="" role="tablist">
    @foreach($categories as $category)
        <li class="nav-item" role="presentation">
            <button class="nav-link @if($loop->first) active @endif" data-bs-toggle="tab" data-bs-target="#{{$category->name}}" type="button" role="tab" aria-controls="" aira-selected="true">{{$category->name}}</button>
        </li>
    @endforeach
</ul>
<div class="tab-content" id="">
    @foreach($categories as $category)
        <div class="tab-pane fade @if($loop->first) show active @endif" id="{{$category->name}}" role="tabpanel">
            Num Preguntas: {{count($category->opportunityFields)}}
            @foreach($category->opportunityFields as $field)
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="{{$field->id}}" name="fields[]">
                        <span class="form-check-sign"></span>
                        {{$field->label}}
                    </label>
                </div>
            @endforeach
        </div>

    @endforeach
        
</div>
    

    