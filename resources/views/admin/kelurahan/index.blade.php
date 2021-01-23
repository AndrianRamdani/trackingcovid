@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">Kelurahan</div>

                <div class="card-body">
                    <a href="{{route('kelurahan.create')}}" class="btn btn-primary">
                    Tambah
                    </a>
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Kecamatan</th>
                            <th>Kelurahan</th>
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
                                    <a class="btn btn-info" href="{{route('kelurahan.show',$item->id)}}">Show</a>
                                    <a class="btn btn-warning" href="{{route('kelurahan.edit',$item->id)}}">Edit</a>
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

