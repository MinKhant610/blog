@props(['name', 'type'=>'text', 'accept'=>'', 'value'=>''])
<x-form.input-wrapper>
    <x-form.label :name="$name"/>
    <input type={{$type}}
    accept="{{$accept}}"
    {{-- required --}}
    id="{{$name}}"
    class="form-control"
    name="{{$name}}"
    value="{{old($name, $value)}}"
    >
    <x-error :name="$name"></x-error>
</x-form.input-wrapper>
