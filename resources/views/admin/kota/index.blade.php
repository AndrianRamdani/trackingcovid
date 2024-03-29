@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card">
                <div class="card-title"><h4>Kota</h4></div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <a href="{{route('kota.create')}}" class="btn btn-primary">
                    Tambah
                    </a>
                    <table id="row-select" class="display fixed_header table table-borderd table-hover">
                        <thead>
                            <th>No</th>
                            <th>Provinsi</th>
                            <th>Kode Kota</th>
                            <th>Kota</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        @php $no=1; @endphp
                        @foreach ($kota as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{ $item->provinsi->nama_provinsi }}</td>
                                <td>{{$item->kode_kota}}</td>
                                <td>{{$item->nama_kota}}</td>
                                <td>
                                <form action="{{route('kota.destroy',$item->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-warning ti-pencil" href="{{route('kota.edit',$item->id)}}">Edit</a>
                                    <button type="submit" class="btn btn-danger ti-trash" onclick="return confirm('Anda Yakin Ingin Hapus?')">Delete</button>
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
@endsection
