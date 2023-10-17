@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="card-title">Update User</h4>
                <div class="card-header-action">
                    <div class="buttons">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('user.update', $user->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nama </label>
                        <input type="text" name="name" class="form-control" required value="{{$user->name}}">
                    </div>
                    <div class="form-group">
                        <label>Email </label>
                        <input type="email" name="email" class="form-control" required value="{{$user->email}}">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="role" required>
                            @if ($user->role =='admin')
                            <option value = "admin" selected> Admin </option>
                            <option value = "member"> Member </option>
                            @else
                            <option value = "admin"> Admin </option>
                            <option value = "member" selected> Member </option>
                            @endif
                        </select>
                    </div>
                    <input type="submit" value="Simpan Data" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>

@endsection
