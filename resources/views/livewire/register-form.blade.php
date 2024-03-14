<div>
    <form method="post" action="{{ route('register') }}">
        @csrf
        <div class="mb-4">
            <div class="row">
                <div class="col-sm">
                    <label class="form-label">User type</label><span style="color:red">&#42;</span>
                    <select class="form-select" name="user_type" wire:model="user_type">
                        <option value="">Select Type</option>
                        @foreach ($usertypes as $usertype)
                            <option value="{{ $usertype->id }}" {{ old('user_type') == $usertype->id ? 'selected' : '' }}>{{ $usertype->name }} </option>
                        @endforeach
                    </select>
                    @error('user_type')
                    <span style="color: red">{{ $message }}</span
                    @enderror
                </div>
                <div class="col-sm">
                    @if ($user_type== 3)
                        <label  class="form-label">Select Division</label><span style="color:red">&#42;</span>
                        <select class="form-select" name="sub_type">
                            <option value="">Select Division</option>
                            @foreach ($division as $division)
                                <option value="{{ $division->id }}">{{ $division->division_name }}
                                </option>
                            @endforeach
                        </select>
                    @endif
                    @if ($user_type == 2)
                        <label for="exampleInputEmail1" class="form-label">Select Circle</label><span style="color:red">&#42;</span>
                        <select name="sub_type" class="form-select">

                            <option value="">Select Circle</option>
                            @foreach ($circle as $circles)
                                <option value="{{ $circles->id }}">
                                    {{ $circles->circle_name }}
                                </option>
                            @endforeach

                        </select>
                    @endif

                    @if ($user_type == 1)
                        <label for="exampleInputEmail1" class="form-label">Select Zone</label><span style="color:red">&#42;</span>
                        <select name="sub_type" class="form-select" >

                            <option value="">Select Zone</option>
                            @foreach ($zones as $zone)
                                <option value="{{ $zone->id }}">{{ $zone->zone_name }}
                                </option>
                            @endforeach

                        </select>
                        @error('sub_type')
                        <span style="color: red">{{ $message }}</span>
                        @enderror


                    @endif

                </div>

            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputtext1" class="form-label">Name</label><span style="color:red">&#42;</span>
            <input type="text" class="form-control" id="exampleInputtext1" name="name" aria-describedby="textHelp" value="{{ old('name') }}">
            @error('name')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="exampleInputPassword1" class="form-label">Password</label> (minimum length 8 character)<span style="color:red">&#42;</span>
            <input type="password" value="{{ old('password') }}" name="password" class="form-control" >
            @error('password')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="exampleInputPassword1" class="form-label">Confirm password</label><span style="color:red">&#42;</span>
            <input type="password" value="{{ old('password_confirmation') }}" name="password_confirmation" class="form-control" >
            @error('password')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <div class="row">

                <div class="col-sm">
                    <label for="exampleInputEmail1" class="form-label">Contact Number</label><span style="color:red">&#42;</span>
                    <input type="text" value="{{ old('contact_number') }}"  name="contact_number" maxlength="10"  minlength="10"  value="{{ old('contact_number') }}" class="form-control" >
                    @error('contact_number')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-sm">
                    <label for="exampleInputEmail1" class="form-label">Email Address</label><span style="color:red">&#42;</span>
                    <input type="email"  name="email" class="form-control"   value="{{ old('email') }}" aria-describedby="emailHelp">
                    @error('email')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>


        <div class="row">
            <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Register</button>
        </div>
    {{--    <a href="./index.html" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign Up</a>--}}
        <div class="d-flex align-items-center justify-content-center">
            <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
            <a class="text-primary fw-bold ms-2" href="{{route('login')}}">Sign In</a>
        </div>
    </form>
</div>