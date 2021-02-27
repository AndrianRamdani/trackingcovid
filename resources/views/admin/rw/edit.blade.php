@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Rw</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                    <form action="{{route('rw.update', $rw->id)}}" method="POST" >
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Kelurahan</label>
                            </div>
                            <div class="col-md-6">
                                <select name="id_kelurahan" class="form-control" required>
                                        @foreach($kelurahan as $data)
                                        <option value="{{$data->id}}" {{ $data->id == $rw->id_kelurahan ? 'selected' : '' }} >{{$data->nama_kelurahan}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Rw</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{$rw->nama}}" name="nama" required>
                            </div>
                        </div>
                        <br>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <button class="btn btn-primary" type="reset">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

                                            
@endsection

@push('script')
<script type="text/javascript">
    $(document).ready(function()
    {
        $('.pilih-tag').select2();
    });
</script>
@endpush

