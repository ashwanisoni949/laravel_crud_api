@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-4 offset-md-0">
                @if (Session::has('error'))
                    <p class="text-danger">{{ Session::get('error') }}</p>
                @endif
                @if (Session::has('success'))
                    <p class="text-danger">{{ Session::get('success') }}</p>
                @endif
                <h1 class="text-danger text-center">Register</h1>
                <form action="{{ route('store') }}" method="POST">
                    @csrf
                    @method('post')
                    <div class="">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter The Name">
                    </div>
                    @if ($errors->has('name'))
                        <p class="text-danger">{{ $errors->first('name') }}</p>
                    @endif

                    <div class=" mt-4">
                        <label for="name">Email</label>
                        <input type="email" name="email" class="form-control" id="email"  placeholder="Enter The Email">
                    </div>
                    @if ($errors->has('email'))
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                    @endif
                    <div class=" mt-4">
                        <label for="name">Number</label>
                        <input type="number" name="number" class="form-control" id="name"  placeholder="Enter The Number">
                    </div>
                    @if ($errors->has('number'))
                        <p class="text-danger">{{ $errors->first('number') }}</p>
                    @endif
                    <div class=" mt-4">
                        <label for="name">Date</label>
                        <input type="date" name="date" class="form-control" id="name"  placeholder="Enter The Date">
                    </div>
                    @if ($errors->has('date'))
                        <p class="text-danger">{{ $errors->first('date') }}</p>
                    @endif
                    <div class=" mt-4">
                        <label for="name">Address</label>
                        <input type="text" name="address" class="form-control" id="name"  placeholder="Enter The Address">
                    </div>
                    @if ($errors->has('address'))
                        <p class="text-danger">{{ $errors->first('address') }}</p>
                    @endif
                    <div class="mt-2">
                        <label for="gender">Gender</label>
                        <input type="radio" name="gender" value="Male">Male
                        <input type="radio" name="gender" value="Female">Female
                    </div>
                    @if ($errors->has('gender'))
                        <p class="text-danger">{{ $errors->first('gender') }}</p>
                    @endif
                    <button type="submit" class="btn btn-danger mt-3">Submit</button>
                    <a href="{{ route('user_show') }}" class="p-2 bg-dark text-light float-end " style="text-decoration:none;">User List
                    </a> 
                </form>
                
            </div>
        </div>
    </div>
@endsection
