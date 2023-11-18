@props(['name', 'value'=>''])
<x-form.input-wrapper>
    <x-form.label :name="$name"/>
    <textarea id="{{$name}}" name="{{$name}}"
    cols="30" rows="10"
    class="form-control editor">
        {!!old($name, $value)!!}
    </textarea>
    <x-error name="{{$name}}"></x-error>
</x-form.input-wrapper>

