@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">Negara</div>

                <div class="card-body">
                    <a href="{{route ('negara.create')}}" class="btn btn-primary">
                    Tambah
                    </a>
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Kode negara</th>
                            <th>Negara</th>
                        </thead>
                        <tbody>
                        @php $no=1; @endphp
                        @foreach ($negara as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->kode_negara}}</td>
                                <td>{{$item->nama_negara}}</td>
                                <td>
                                    <form action="{{route('negara.destroy',$item->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-info" href="{{route('negara.show',$item->id)}}">Show</a>
                                    <a class="btn btn-warning" href="{{route('negara.edit',$item->id)}}">Edit</a>
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

