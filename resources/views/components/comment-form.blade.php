@props(['blog'])
<x-card-wrapper>
    <form action="/blogs/{{$blog->slug}}/comments"
    method="POST"
    >
      @csrf
        <div class="mb-3">
            <textarea
                required
                name="body"
                cols="10"
                rows="5"
                class="form-control border border-0 test"
                placeholder="say something..."
            ></textarea>
            <x-error name="body"></x-error>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</x-card-wrapper>
