@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card">
            <div class="card-title"><h4>Kecamatan</h4></div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <a href="{{route('kecamatan.create')}}" class="btn btn-primary">
                    Tambah
                    </a>
                    <table id="row-select" class="display fixed_header table table-borderd table-hover">
                    <thead>
                        <th>No</th>
                        <th>Kota</th>
                        <!-- <th>Kode Kecamatan</th> -->
                        <th>Kecamatan</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    @php $no=1; @endphp
                    @foreach ($kecamatan as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{ $item->kota->nama_kota }}</td>
                            <!-- <td>{{$item->kode_kecamatan}}</td> -->
                            <td>{{$item->nama_kecamatan}}</td>
                            <td>
                            <form action="{{route('kecamatan.destroy',$item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <!-- <a class="btn btn-info" href="{{route('kecamatan.show',$item->id)}}">Show</a> -->
                                <a class="btn btn-warning ti-pencil" href="{{route('kecamatan.edit',$item->id)}}">Edit</a>
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