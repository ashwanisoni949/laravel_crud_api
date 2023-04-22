@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center text-primary">User Show</h1>
            <a href="{{ route('add_user') }}"><button class="btn btn-secondary">Add User</button></a>
            <div class="float-end">
                <form action="{{ route('date_filter')}}" method="POST">
                    @csrf
                <label for="start_date" class="text-danger me-2 d-inline">Start Date</label>
                <input type="date" name="start_date" id="start_date">
                @if ($errors->has('start_date'))
                <p class="text-danger">{{ $errors->first('start_date') }}</p>
            @endif
                <label for="start_date" class="text-danger me-2">End Date</label>
                <input type="date" name="end_date" id="end_date">
                @if ($errors->has('end_date'))
                <p class="text-danger">{{ $errors->first('end_date') }}</p>
            @endif
                <button type="submit" class="btn btn-danger">Date Filter</button>
            </form>

            
                </div>
            <table class="table table-bordered mt-3">
                <thead>
                  <tr>
                    <th scope="col">Sr. No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date</th>
                    <th scope="col">Number</th>
                    <th scope="col">Address</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @if(!empty($filter_user_date))
                    @foreach ($filter_user_date as $key => $item)
                  <tr>
                    <th scope="row">{{ $key+1 }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->date }}</td>
                    <td>{{ $item->number }}</td>
                    <td>{{ $item->getUser->address }}</td>
                    <td>{{ $item->getUser->gender }}</td>
                    <td>
                        <a href="{{ url('user_edit/'.$item->id) }}">Edit</a>/
                        <a href="{{ url('user_delete/'.$item->id) }}" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                  @else
                  <h2 class="text-center">No record found</h2>
                  @endif
                </tbody>
              </table>
        </div>
    </div>
</div>

@endsection