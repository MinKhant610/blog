<x-layout>
    <!-- single blog section -->
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto text-center">
          <img
            src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
            class="card-img-top"
            alt="..."
          />
          <h3 class="my-3"> {{$blog->title}} </h3>
          <div>
            <div>
                Author -
                <a href="/users/{{$blog->author->username}}">
                {{$blog->author->name}}
                </a>
            </div>
            <div>
                <a href="/categories/{{$blog->category->slug}}">
                    <span class="badge bg-primary">
                        {{$blog->category->name}}
                    </span>
                </a>
            </div>
            <div class="text-secondary"> {{$blog->created_at->diffForHumans()}}
            </div>
            <div class="text-secondary">
                <button class="btn btn-warning">
                    subscribe
                </button>
            </div>
          </div>
          <p class="lh-md mt-3">
            {{$blog->body}}
          </p>
        </div>
      </div>
    </div>

    <section class="container">
        <div class="col-md-8 mx-auto">
            @auth
            <x-comment-form :blog="$blog"></x-comment-form>
            @else
            <h6 class="text-center">
              Please <a href="/login" style="text-decoration: none;">login</a> to participate in this discussion.
            </h6>
            @endauth
        </div>
    </section>

    @if ($blog->comments->count())
    <x-comments :comments="$blog->comments()->latest()->paginate(3)"></x-comments>
    @endif
    <x-blogs-you-may-like :randomBlogs="$randomBlogs"></x-blogs-you-may-like>

</x-layout>
