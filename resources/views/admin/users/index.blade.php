@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-title"><h4>Data users </h4></div>
                        
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <a href="{{ route('users.create') }}" class="btn btn-primary">
                            Tambah
                        </a>
                        <div class="table-responsive">
                            <table class="table" id="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($user as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>
                                                @if($data->role === "Admin")
                                                <button class="btn btn-sm btn-success">{{ $data->role }}</button>
                                                @else
                                                <button class="btn btn-sm btn-info">{{ $data->role }}</button>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('users.destroy', $data->id) }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <a href="{{ route('users.edit', $data->id) }}"
                                                        class="btn btn-warning ti-pencil">Edit</a>
                                                    {{-- <a href="{{ route('users.show', $data->id) }}"
                                                        class="btn btn-warning">Show</a> --}}
                                                    @if($data->role == "Admin")
                                                    @else
                                                    <button type="submit" class="btn btn-danger ti-trash"
                                                        onclick="return confirm('apakah anda yakin ?')">Delete</button>
                                                    @endif
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection