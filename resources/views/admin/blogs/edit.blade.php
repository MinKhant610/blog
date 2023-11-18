<x-admin.admin-layout>
    <h3 class="my-3 text-center">
        Blog edit form
    </h3>
    <x-card-wrapper>
        <form action="/admin/blogs/{{$blog->slug}}/update"
        method="POST"
        enctype="multipart/form-data"
        >
            @csrf
            @method('patch')
            <x-form.input name="title" value="{{$blog->title}}"/>
            <x-form.input name="slug" value="{{$blog->slug}}"/>
            <x-form.input name="intro" value="{{$blog->intro}}" />
            <x-form.textarea name="body" value="{{$blog->body}}" />
            <x-form.input name="thumbnail" type="file" accept="image/*"/>
            <img src="/storage/{{$blog->thumbnail}}"
             alt="thumbnail photo"
             width="200px" height="100px"
             >
            <x-form.input-wrapper>
                <x-form.label name="category"/>
                <select name="category_id" id="category" class="form-control">
                    @foreach ($categories as $category)
                    <option
                    value="{{$category->id}}"
                    {{$category->id==old('category_id', $blog->category->id) ? 'selected' : ''}}
                        >
                        {{$category->name}}
                    </option>
                    @endforeach
                </select>
                <x-error name="category_id"></x-error>
            </x-form.input-wrapper>

            <div class="d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-primary">Update Post</button>
            </div>
        </form>
    </x-card-wrapper>

</x-admin.admin-layout>

