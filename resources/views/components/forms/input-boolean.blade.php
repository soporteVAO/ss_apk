
<div class="form-check form-check-radio">
  <label class="form-check-label">
    <input class="form-check-input" type="radio" name="{{$systemName}}" id="flexRadioDefault1" value=1 @if($value=="1") checked @endif>
    <span class="form-check-sign"></span>
    Verdadero
  </label>  
</div>

<div class="form-check form-check-radio">
  <label class="form-check-label">
    <input class="form-check-input" type="radio" name="{{$systemName}}" id="flexRadioDefault2" value=0 @if($value=="0") checked @endif>
    <span class="form-check-sign"></span>
    Falso
  </label>  
</div>