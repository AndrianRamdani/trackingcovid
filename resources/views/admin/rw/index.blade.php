@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-title"><h4>Rw</h4></div>

                <div class="card-body">
                    <a href="{{route('rw.create')}}" class="btn btn-primary">
                    Tambah
                    </a>
                    <table id="row-select" class="display table table-borderd table-hover">
                        <thead>
                            <th>No</th>
                            <th>Kelurahan</th>
                            <th>Rw</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        @php $no=1; @endphp
                        @foreach ($rw as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{ $item->kelurahan->nama_kelurahan }}</td>
                                <td>{{$item->nama}}</td>
                                <td>
                                <form action="{{route('rw.destroy',$item->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <!-- <a class="btn btn-info" href="{{route('rw.show',$item->id)}}">Show</a> -->
                                    <a class="btn btn-warning" href="{{route('rw.edit',$item->id)}}">Edit</a>
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

