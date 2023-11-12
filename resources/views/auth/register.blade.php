<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto my-3">
                <h2 class="text-primary text-center my-2">Register Form</h2>
                <div class="card p-4 my-3 shadow-sm">
                    <form method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input
                            required
                            type="text"
                            class="form-control"
                            id="name"
                            aria-describedby="emailHelp"
                            name="name"
                            value="{{old('name')}}"
                            >
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text"
                            required
                            class="form-control"
                            id="username"
                            aria-describedby="emailHelp"
                            name="username"
                            value="{{old('username')}}"
                            >
                            @error('username')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email"
                            required
                            class="form-control"
                            id="email"
                            aria-describedby="emailHelp"
                            name="email"
                            value="{{old('email')}}"
                            >
                            @error('email')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="passsword" class="form-label">Password</label>
                            <input
                            required
                            type="password"
                            class="form-control"
                            id="passsword"
                            name="password"
                            >
                            @error('password')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
