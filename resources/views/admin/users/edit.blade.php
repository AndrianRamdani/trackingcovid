@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data Users</div>
                    <div class="card-body">
                        <form action="{{ route('users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" value="{{$user->name}}" name="name">
                            </div>
                            <div class="form-group">
                                <label for="">email</label>
                                <input type="text" class="form-control" value="{{$user->email}}" name="email">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" value="{{$user->password}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection