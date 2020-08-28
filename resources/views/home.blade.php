@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Data about Bitcoin trades</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table id="table_id" class="display">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Price</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Updated at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bitcoinTrades as $trade)
                                <tr>
                                    <td>{{$trade->date}}</td>
                                    <td>{{$trade->price}}</td>
                                    <td>{{$trade->type}}</td>
                                    <td>{{$trade->amount}}</td>
                                    <td>{{$trade->updated_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
