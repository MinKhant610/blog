@props(['name', 'type'=>'text', 'accept'=>''])
<x-form.input-wrapper>
    <x-form.label :name="$name"/>
    <input type={{$type}}
    accept="{{$accept}}"
    required
    id="{{$name}}"
    class="form-control"
    name="{{$name}}"
    value="{{old($name)}}"
    >
    <x-error :name="$name"></x-error>
</x-form.input-wrapper>
