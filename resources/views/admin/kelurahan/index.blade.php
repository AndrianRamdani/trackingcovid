@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-title"><h4>Kelurahan</h4></div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <a href="{{route('kelurahan.create')}}" class="btn btn-primary">
                    Tambah
                    </a>
                        <table id="row-select" class="display fixed_header table table-borderd table-hover">
                        <thead>
                            <th>No</th>
                            <th>Kecamatan</th>
                            <th>Kelurahan</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        @php $no=1; @endphp
                        @foreach ($kelurahan as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{ $item->kecamatan->nama_kecamatan }}</td>
                                <td>{{$item->nama_kelurahan}}</td>
                                <td>
                                <form action="{{route('kelurahan.destroy',$item->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <!-- <a class="btn btn-info" href="{{route('kelurahan.show',$item->id)}}">Show</a> -->
                                    <a class="btn btn-warning ti-pencil" href="{{route('kelurahan.edit',$item->id)}}">Edit</a>
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

