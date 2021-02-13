@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-title"><h4>Covid</h4></div>

                <div class="card-body">
                    <a href="{{route('tracking.create')}}" class="btn btn-primary">
                    Tambah
                    </a>
                    <table id="row-select" class="display table table-borderd table-hover">
                        <thead>
                            <th>No</th>
                            <th>Lokasi</th>
                            <th>RW</th>
                            <th>Kasus Positif</th>
                            <th>Kasus Meninggal</th>
                            <th>Kasus Sembuh</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        @php $no=1; @endphp
                        @foreach ($tracking as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>
                                    {{ $item->rw->kelurahan->nama_kelurahan }} <br>
                                    {{ $item->rw->kelurahan->kecamatan->nama_kecamatan }} <br>
                                    {{ $item->rw->kelurahan->kecamatan->kota->nama_kota }} <br>
                                    {{ $item->rw->kelurahan->kecamatan->kota->provinsi->nama_provinsi }}
                                </td>
                                <td>{{ $item->rw->nama }}</td>
                                <td>{{$item->jumlah_positif}}</td>
                                <td>{{$item->jumlah_meninggal}}</td>
                                <td>{{$item->jumlah_sembuh}}</td>
                                <td>{{$item->tanggal}}</td>
                                <td>
                                <form action="{{route('tracking.destroy',$item->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-warning" href="{{route('tracking.edit',$item->id)}}">Edit</a>
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
