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
                        <fieldset disabled>

                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-sm">
                                        <label for="disabledTextInput" class="form-label">Name</label>
                                        <input type="text" value="{{$user->name}}" class="form-control" placeholder="Disabled input">
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-sm">
                                        <label for="disabledTextInput" class="form-label">Contact number</label>
                                        <input type="text" value="{{$user->contact_number}}" class="form-control" placeholder="Disabled input">
                                    </div>
                                    <div class="col-sm">
                                        <label for="disabledTextInput" class="form-label">Email</label>
                                        <input type="text" value="{{$user->email}}" class="form-control" placeholder="Disabled input">
                                    </div>


                                </div>
                        </fieldset>
                                <div class="row">
                                    <div class="col-sm">
                                        <label for="disabledTextInput" class="form-label">Password</label>
                                        <input type="password" value="" name="password" class="form-control" placeholder="Password">
                                        @error('password')
                                        <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm">
                                        <label for="disabledTextInput" class="form-label">Confirm password</label>
                                        <input type="password" value="" name="password_confirmation" class="form-control" placeholder="Confirm password">
                                        @error('password')
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
