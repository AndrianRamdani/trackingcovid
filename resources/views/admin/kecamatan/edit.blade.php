@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Kecamatan</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! --}}
                    @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                    <form action="{{route('kecamatan.update', $kecamatan->id)}}" method="POST" >
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Kota</label>
                            </div>
                            <div class="col-md-6">
                                <select name="id_kota" class="form-control" required>
                                        @foreach($kota as $data)
                                        <option value="{{$data->id}}" {{ $data->id == $kecamatan->id_kota ? 'selected' : '' }} >{{$data->nama_kota}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-md-4">
                                <label for="">Kode Kecamatan</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{$kecamatan->kode_kecamatan}}" name="kode_kecamatan" required>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Kecamatan</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{$kecamatan->nama_kecamatan}}" name="nama_kecamatan" required>
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

