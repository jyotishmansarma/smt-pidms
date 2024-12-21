@extends('layouts.master')

@section('main-body')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <h5 class="card-title fw-semibold mb-4">My Profile</h5>
                <div class="card-body">
                    <form action="{{route('update_myprofile',['id' => $user->id])}}" method="post">
                        @csrf
                       
                            <div class="mb-3">
                                <div class="row">
                                    <fieldset disabled>
                                    <div class="col-sm">
                                        <label for="disabledTextInput" class="form-label">Name</label>
                                        <input type="text" value="{{$user->name}}" class="form-control" placeholder="Disabled input">
                                    </div>
                                    </fieldset>

                                </div>
                                <div class="row">
                                    <div class="col-sm">
                                        <fieldset disabled>
                                            <label for="disabledTextInput" class="form-label">Contact number</label>
                                            <input type="text" value="{{ $user->profile->phone_number }}" class="form-control" placeholder="Disabled input">
                                        </fieldset>
                                    </div>
                                    <div class="col-sm">
                                        <label for="disabledTextInput" class="form-label">Email</label>
                                        <input type="text" value="{{$user->email}}" class="form-control" placeholder="Email">
                                        @error('email')
                                        <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    </div>
                        

                                <div class="row">
                                    <div class="col-sm">
                                        <label for="disabledTextInput" class="form-label">Address</label>
                                        <textarea name="address" class="form-control" placeholder="Address">
                                            {{ $user->profile->address }}
                                        </textarea>
                                        @error('address')
                                        <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm">
                                        <label for="disabledTextInput" class="form-label">GST No</label>
                                        <input type="text" value="" name="gst_no" class="form-control" placeholder="GST No.">
                                        @error('gst_no')
                                        <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">

                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('main-script')
    @include('issue.js')
@endsection
