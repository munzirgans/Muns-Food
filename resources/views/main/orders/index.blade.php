@extends("main.layouts.master")
@section("title", "Order")
@section("content")
    <div class="container">
        <h2 class="text-center font-weight-bold" style="margin-top:80px;">Daftar Pesanan Anda</h2>
        <div class="bg-warning" style="border-radius:5px;padding-top:20px;padding-bottom:20px;margin-top:60px;margin-bottom:10px;">
            <div class="container">
                <p class="text-dark font-weight-bold" style="margin-bottom:0px;">Sedang Diproses</p>
            </div>
        </div>
            <table class="table table-striped">
                <thead>
                    <th>#</th>
                    <th>Total Price</th>
                    <th>Date & Time</th>
                </thead>
                <tbody>
                    @foreach($sedangs as $s)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$sedang_price}}</td>
                            <td>{{$s->datetime}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="bg-info" style="border-radius:5px;padding-top:20px;padding-bottom:20px;margin-top:40px;margin-bottom:10px;">
            <div class="container">
                <p class="text-light font-weight-bold" style="margin-bottom:0px;">Dalam Perjalanan</p>
            </div>
        </div>
            <table class="table table-striped">
                <thead>
                    <th>#</th>
                    <th>Total Price</th>
                    <th>Date & Time</th>
                </thead>
                <tbody>
                    @foreach($dalams as $d)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$dalam_price}}</td>
                            <td>{{$d->datetime}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="bg-success" style="border-radius:5px;padding-top:20px;padding-bottom:20px;margin-top:40px;margin-bottom:10px;">
            <div class="container">
                <p class="text-light font-weight-bold" style="margin-bottom:0px;">Diterima</p>
            </div>
        </div>
            <table class="table table-striped">
                <thead>
                    <th>#</th>
                    <th>Total Price</th>
                    <th>Date & Time</th>
                </thead>
                <tbody>
                    @foreach($diterimas as $d2)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$diterima_price}}</td>
                            <td>{{$d2->datetime}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="bg-danger" style="border-radius:5px;padding-top:20px;padding-bottom:20px;margin-top:40px;margin-bottom:10px;">
            <div class="container">
                <p class="text-light font-weight-bold" style="margin-bottom:0px;">Ditolak</p>
            </div>
        </div>
            <table class="table table-striped">
                <thead>
                    <th>#</th>
                    <th>Total Price</th>
                    <th>Date & Time</th>
                </thead>
                <tbody>
                    @foreach($ditolaks as $d3)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$ditolak_price}}</td>
                            <td>{{$d3->datetime}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
@endsection
