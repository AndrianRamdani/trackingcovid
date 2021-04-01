@extends('layouts.admin')
@section('content')
<div class="c-body">
    <main class="c-main">
        <div class="container-fluid">
            <div class="fade-in">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card bg-warning img-card box-primary-shadow">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="text-white">
                                        <p class="text-white mb-0">TOTAL POSITIF</p>
                                        <h2 class="mb-0 number-font">{{ $positif }}</h2>
                                        <p class="text-white mb-0">ORANG</p>
                                    </div>
                                    <div class="ml-auto"> <img src="https://kawalcorona.com/uploads/sad-u6e.png" width="50"
                                            height="50" alt="Positif"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card bg-primary img-card box-primary-shadow">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="text-white">
                                        <p class="text-white mb-0">TOTAL SEMBUH</p>
                                        <h2 class="mb-0 number-font">{{ $sembuh }}</h2>
                                        <p class="text-white mb-0">ORANG</p>
                                    </div>
                                    <div class="ml-auto"> <img src="https://kawalcorona.com/uploads/happy-ipM.png" width="50"
                                            height="50" alt="Positif">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card bg-danger img-card box-primary-shadow">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="text-white">
                                        <p class="text-white mb-0">TOTAL MENINGGAL</p>
                                        <h2 class="mb-0 number-font">{{ $meninggal }}</h2>
                                        <p class="text-white mb-0">ORANG</p>
                                    </div>
                                    <div class="ml-auto"> <img src="https://kawalcorona.com/uploads/emoji-LWx.png" width="50"
                                            height="50" alt="Positif"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Kasus Global</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table fixed_header" id="global">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Negara</th>
                                        <th>Positif</th>
                                        <th>Sembuh</th>
                                        <th>Meninggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($global as $data => $val)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $val['attributes']['Country_Region'] }}</td>
                                            <td>{{ $val['attributes']['Confirmed'] }}</td>
                                            <td>{{ $val['attributes']['Recovered'] }}</td>
                                            <td>{{ $val['attributes']['Deaths'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection