@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Kelurahan</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! --}}
                    <form action="{{route('kelurahan.store')}}" method="POST" >
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Kecamatan</label>
                            </div>
                            <div class="col-md-6">
                                <select name="id_kecamatan" class="form-control" required>
                                    @foreach($kecamatan as $data)
                                        <option value="{{$data->id}}">{{$data->nama_kecamatan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Kelurahan</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama_kelurahan" required>
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

