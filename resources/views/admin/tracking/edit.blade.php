@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Kasus Covid-19</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form action="{{route('tracking.update', $tracking->id)}}" method="POST" >
                        @csrf
                        @method('PUT')
                        <!-- <div class ="row">
                        <div class ="col"> -->
                        @livewire('tracking-data', ['selectedRw' => $tracking->id_rw, 'idt' => $tracking->id])
                        <!-- </div>
                        <div class ="col">
                        <div class ="form-group">
                            <div class="col-md-6">
                                <label for="positif">Jumlah Positif</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" value="{{$tracking->jumlah_positif}}" name="jumlah_positif" required>
                            </div>
                        </div>
                        <div class ="form-group">
                            <div class="col-md-6">
                                <label for="meninggal">Jumlah Meninggal</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" value="{{$tracking->jumlah_meninggal}}" name="jumlah_meninggal" required>
                            </div>
                        </div>
                        <div class ="form-group">
                            <div class="col-md-6">
                                <label for="sembuh">Jumlah Sembuh</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" value="{{$tracking->jumlah_sembuh}}" name="jumlah_sembuh" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label for="tanggal">Tanggal</label>
                            </div>
                            <div class="col-md-10">
                                <input type="date" class="form-control" value="{{$tracking->tanggal}}" name="tanggal" required>
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


