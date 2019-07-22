@if($filterType)
<div class="checkbox" >
    <input type="radio" class="checkbox_input" {{request()->$filterType == $checkbox_value? 'checked': ''}} name="{{ $checkbox_name }}" value="{{ $checkbox_value }}" id="{{
    $checkbox_id }}">
    <label class="checkbox_label" for="{{ $checkbox_id }}">{{ $checkbox_label }}</label>
</div>
@else
    <div class="checkbox" >
        <input type="radio" class="checkbox_input" name="{{ $checkbox_name }}" value="{{ $checkbox_value }}" id="{{
    $checkbox_id }}">
        <label class="checkbox_label" for="{{ $checkbox_id }}">{{ $checkbox_label }}</label>
    </div>
    @endif

