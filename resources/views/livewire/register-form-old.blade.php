<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <form method="post" action="{{ route('register') }}">
        @csrf
        <div class="field">
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6" style="margin-bottom: 2px">
                <label class="label">Name<span style="color:red">&#42;</span></label>
            </div>
            <div class="field-body">
                <div class="field ">


                    <div class="grid grid-cols-1 gap-12 lg:grid-cols-1 mb-12">

                        <div class="select">
                            <input class="input" name="name" type="text" placeholder="Name Full Name"
                                   value="{{ old('name') }}">
                            @error('name')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>


                </div>

            </div>
        </div>
        <div class="field">
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6" style="margin-bottom: 2px">
                <label class="label">Password<span style="color:red">&#42;</span></label>

            </div>
            <div class="field-body">
                <div class="field ">


                    <div class="grid grid-cols-1 gap-12 lg:grid-cols-1 mb-12">

                        <div class="select">
                            <input class="input" type="password" name="password"
                                   autocomplete="current-password" placeholder="Password" value="{{ old('password') }}">
                            @error('password')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                </div>

            </div>
        </div>
        <div class="field">
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6" style="margin-bottom: 2px">
                <label class="label">Confirm password<span style="color:red">&#42;</span></label>

            </div>
            <div class="field-body">
                <div class="field ">


                    <div class="grid grid-cols-1 gap-12 lg:grid-cols-1 mb-12">

                        <div class="select">
                            <input class="input" type="password" name="password_confirmation"
                                   autocomplete="current-password" placeholder="Confirm Password" value="{{ old('password_confirmation') }}">
                            @error('password_confirmation')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                </div>

            </div>
        </div>
        <div class="field">
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6" style="margin-bottom: 2px">
                <label class="label">Contact Number<span style="color:red">&#42;</span></label>
                <label class="label">Email<span style="color:red">&#42;</span></label>
            </div>
            <div class="field-body">
                <div class="field ">


                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6">

                        <div class="select">
                            <input class="input" type="text" name="contact_number" maxlength="10"  minlength="10" placeholder="Enter Contact Number"
                                   value="{{ old('contact_number') }}">
                            @error('contact_number')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="select control" id="email">
                            <input class="input" name="email" type="email" placeholder="Enter Email Address"
                                   value="{{ old('email') }}">

                            @error('email')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                </div>

            </div>
        </div>
        <div class="field">
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6" style="margin-bottom: 2px">
                <label class="label">User type<span style="color:red">&#42;</span></label>
                @if ($user_type == 3)
                    <label class="label">Select Division<span style="color:red">&#42;</span></label>
                @endif
                @if ($user_type == 2)
                    <label class="label">Select Circle<span style="color:red">&#42;</span></label>
                @endif
                @if ($user_type == 1)
                    <label class="label">Select Zone<span style="color:red">&#42;</span></label>
                @endif
            </div>
            <form class="field-body">
                <div class="field ">


                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6">

                        <div class="select">
                            <select name="user_type" wire:model="user_type">

                                <option value="">Select Type</option>
                                @foreach ($usertypes as $usertype)
                                    <option value="{{ $usertype->id }}" {{ old('user_type') == $usertype->id ? 'selected' : '' }}>{{ $usertype->name }} </option>
                                @endforeach

                            </select>

                            @error('user_type')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        @if ($user_type == 3)

                            <div class="select control" id="division_type">
                                <select name="sub_type" >

                                    <option value="">Select Division</option>
                                    @foreach ($division as $division)
                                        <option value="{{ $division->id }}">{{ $division->division_name }}
                                        </option>
                                    @endforeach

                                </select>
                                @error('sub_type')
                                <span style="color: red">{{ $message }}</span>
                                @enderror


                            </div>

                        @endif

                        @if ($user_type == 2)



                            <div class="select control" id="circle_type">
                                <select name="sub_type" >

                                    <option value="">Select Circle</option>
                                    @foreach ($circle as $circles)
                                        <option value="{{ $circles->id }}">
                                            {{ $circles->circle_name }}
                                        </option>
                                    @endforeach

                                </select>
                                @error('sub_type')
                                <span style="color: red">{{ $message }}</span>
                                @enderror

                            </div>

                        @endif
                        @if ($user_type == 1)

                            <div class="select control" id="zone_type">
                                <select name="sub_type" >

                                    <option value="">Select Zone</option>
                                    @foreach ($zones as $zone)
                                        <option value="{{ $zone->id }}">{{ $zone->zone_name }}
                                        </option>
                                    @endforeach

                                </select>
                                @error('sub_type')
                                <span style="color: red">{{ $message }}</span>
                                @enderror

                            </div>

                        @endif
                    </div>
                    <div class="field spaced">
                        <div class="control">
                            <label class="checkbox"><input type="checkbox" name="remember" value="1" checked>

                            </label>
                            <button type="submit" class="button blue" >
                                Register
                            </button>
                        </div>
                    </div>
                    <hr>

                    <div class="field grouped">
                        <div class="control">
                            <div style="float: right">
                                Already registered?
                                <a href="{{route('login')}}" style="color: #2563eb">
                                    Login
                                </a>
                            </div>

                        </div>

                    </div>


                </div>
            </form>

        </div>
</div>
</div>

<!-- Include Select2 CSS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" rel="stylesheet"/>

<script>
    $(document).ready(function () {
        $('#division').select2();
    });
</script>
<script>
    $(document).ready(function () {
        $('#division').select2({
            width: '100%', // Adjust the width as needed
            placeholder: 'Select an option',
            allowClear: true // Allow clearing the selection
        });
    });
</script>
