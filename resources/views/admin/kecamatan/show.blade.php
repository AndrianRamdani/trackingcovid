@extends('layouts.master')

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
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Kota</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" value="{{$kecamatan->kota->nama_kota}}" name="nama_kota" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Kode Kecamatan</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" value="{{$kecamatan->kode_kecamatan}}" name="kode_kecamatan" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Kecamatan</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" value="{{$kecamatan->nama_kecamatan}}" name="nama_kecamatan" readonly>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    $(document).ready(function()
    {
        $('.pilih-tag').select2();
    });
</script>
@endpush