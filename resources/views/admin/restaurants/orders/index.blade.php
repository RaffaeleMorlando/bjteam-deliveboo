@extends('layouts.backend')

@section('main')
    <div id="dashboard_order">
        <h1>I MIEI ORDINI</h1>

        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">NUMERO ORDINE:</th>
                    <th scope="col">ORDINATO DA:</th>
                    <th scope="col">INDIRIZZO:</th>
                    <th scope="col">IN DATA:</th>
                    <th scope="col">PREZZO:</th>
                    <th scope="col">STATUS:</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{$order->order_number}}</td>
                        <td>{{$order->guest_name}}</td>
                        <td>{{$order->guest_address}}</td>
                        <td>{{$order->created_at}}</td>
                        <td>{{$order->total_price}}</td>
                        <td>{{$order->status}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route("admin.restaurants.orders.chart") }}">grafico</a>





    </div>

@endsection
