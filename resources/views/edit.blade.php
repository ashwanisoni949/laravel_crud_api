@extends('layouts.app')
@section('content')
    {{-- @dd($edit_user->getUser->gender); --}}
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-4 offset-md-0">
                <h1 class="text-danger text-center">Register</h1>
                <form action="{{ url('user_update/'.$edit_user->id) }}" method="POST">
                    @csrf
                    @method('post')
                    <div class="">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name"
                            value="{{ $edit_user->name }}">
                    </div>
                    <div class=" mt-4">
                        <label for="name">Email</label>
                        <input type="email" name="email" class="form-control" id="email"
                            value="{{ $edit_user->email }}">
                    </div>
                    <div class=" mt-4">
                        <label for="name">Number</label>
                        <input type="number" name="number" class="form-control" id="name"
                            value="{{ $edit_user->number }}">
                    </div>
                    <div class=" mt-4">
                        <label for="name">Date</label>
                        <input type="date" name="date" class="form-control"
                            id="name"value="{{ $edit_user->date }}">
                    </div>
                    <div class=" mt-4">
                        <label for="name">Address</label>
                        <input type="text" name="address" class="form-control"
                            id="name"value="{{ $edit_user->getUser->address }}">
                    </div>
                    <div class="mt-2">
                        <label for="gender">Gender</label>
                        <input type="radio" name="gender" value="Male" {{ ($edit_user->getUser->gender=="Male")? "checked" : "" }}>Male
                        <input type="radio" name="gender" value="Female" {{($edit_user->getUser->gender=="Female")? "checked" : "" }}>Female
                    </div>
                    <button type="submit" class="btn btn-danger mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
