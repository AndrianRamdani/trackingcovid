@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Negara</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! --}}
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Kode Negara</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" value="{{$negara->kode_negara}}" name="kode_negara" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Negara</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" value="{{$negara->nama_negara}}" name="nama_negara" readonly>
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