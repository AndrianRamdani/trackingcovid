@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">Laporan</div>

                <div class="card-body">
                    <a href="#" class="btn btn-primary">
                    Tambah
                    </a>
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Id Negara</th>
                            <th>Jumlah Positif</th>
                            <th>Jumlah Sembuh</th>
                            <th>Jumlah Meninggal</th>
                            <th>Tanggal</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <!-- <form action="#" method="POST">
                                    @csrf
                                    <a class="btn btn-info" href="#">Lihat</a>
                                    <a class="btn btn-warning" href="#">Edit</a>
                                    <button type="submit" class="btn btn-danger" >Delete</button>
                                    </form> --></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
