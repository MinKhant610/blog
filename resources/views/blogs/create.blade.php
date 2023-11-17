<x-layout>
    <h3 class="my-3 text-center">
        Blog cretate form
    </h3>
    <div class="col-md-8 mx-auto">
        <x-card-wrapper>
            <form action="/admin/blogs/store" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text"
                    required
                    id="title"
                    class="form-control"
                    name="title"
                    value="{{old('title')}}"
                    >
                    <x-error name="title"></x-error>
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">slug</label>
                    <input type="text"
                    required
                    id="slug"
                    class="form-control"
                    name="slug"
                    value="{{old('slug')}}"
                    >
                    <x-error name="slug"></x-error>
                </div>
                <div class="mb-3">
                    <label for="intro" class="form-label">intro</label>
                    <input type="text"
                    required
                    id="intro"
                    class="form-control"
                    name="intro"
                    value="{{old('intro')}}"
                    >
                    <x-error name="intro"></x-error>
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea id="body" name="body" id="" cols="30" rows="10" class="form-control">
                        {{old('body')}}
                    </textarea>
                    <x-error name="body"></x-error>
                </div>
                <div>
                    <label for="category" class="form-label">Categories</label>
                    <select name="category_id" id="category" class="form-control">
                        @foreach ($categories as $category)
                        <option
                        value="{{$category->id}}"
                        {{$category->id==old('category_id') ? 'selected' : ''}}
                            >
                            {{$category->name}}
                        </option>
                        @endforeach
                    </select>
                    <x-error name="category_id"></x-error>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </x-card-wrapper>
    </div>
</x-layout>
