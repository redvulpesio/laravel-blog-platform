<div class="form-group row">
    <label  class="col-sm-2 col-form-label">{{$label}}</label>
    <div class="col-sm-10">
        <input type="{{$type}}" class="form-control text-left" dir="rtl" name="{{$name}}" value="@if(!$value) {{old($name)}} @else {{$value}} @endif" >
    </div>
</div>
@error($name)
   <span  class="alert text-danger">{{$message}}</span>
@enderror
