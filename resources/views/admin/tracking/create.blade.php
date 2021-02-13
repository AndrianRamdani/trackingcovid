@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Kasus Covid-19</div>

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
                    <form action="{{route('tracking.store')}}" method="POST" >
                        @csrf
                    <!-- <div class ="row">
                        <div class ="col"> -->
                            @livewire('tracking-data')
                        <!-- </div>
                        <div class ="col">
                        <div class ="form-group">
                            <div class="col-md-6">
                                <label for="positif">Jumlah Positif</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="jumlah_positif" required>
                            </div>
                        </div>
                        <div class ="form-group">
                            <div class="col-md-6">
                                <label for="meninggal">Jumlah Meninggal</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="jumlah_meninggal" required>
                            </div>
                        </div>
                        <div class ="form-group">
                            <div class="col-md-6">
                                <label for="sembuh">Jumlah Sembuh</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="jumlah_sembuh" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label for="tanggal">Tanggal</label>
                            </div>
                            <div class="col-md-10">
                                <input type="date" class="form-control" name="tanggal" required>
                            </div>
                        </div>
                        </div>
                    </div> -->
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


