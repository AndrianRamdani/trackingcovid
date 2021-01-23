@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">Provinsi</div>

                <div class="card-body">
                    <a href="{{route ('provinsi.create')}}" class="btn btn-primary">
                    Tambah
                    </a>
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Kode Provinsi</th>
                            <th>Provinsi</th>
                        </thead>
                        <tbody>
                        @php $no=1; @endphp
                        @foreach ($provinsi as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->kode_provinsi}}</td>
                                <td>{{$item->nama_provinsi}}</td>
                                <td>
                                    <form action="{{route('provinsi.destroy',$item->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-info" href="{{route('provinsi.show',$item->id)}}">Show</a>
                                    <a class="btn btn-warning" href="{{route('provinsi.edit',$item->id)}}">Edit</a>
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
