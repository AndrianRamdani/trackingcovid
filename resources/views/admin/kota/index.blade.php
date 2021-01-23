@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">Kota</div>

                <div class="card-body">
                    <a href="{{route('kota.create')}}" class="btn btn-primary">
                    Tambah
                    </a>
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Provinsi</th>
                            <th>Kode Kota</th>
                            <th>Kota</th>
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
                                    <a class="btn btn-info" href="{{route('kota.show',$item->id)}}">Show</a>
                                    <a class="btn btn-warning" href="{{route('kota.edit',$item->id)}}">Edit</a>
                                    <button type="submit" class="btn btn-danger" >Delete</button>
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
