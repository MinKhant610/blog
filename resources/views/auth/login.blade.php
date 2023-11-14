<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto my-3">
                <h2 class="text-primary text-center my-2">Login Form</h2>
                <div class="card p-4 my-3 shadow-sm">
                    <form method="POST" >
                        @csrf
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
                            <x-error name="email"></x-error>

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
                            <x-error name="password"></x-error>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
