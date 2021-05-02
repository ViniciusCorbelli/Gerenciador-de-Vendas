@extends('admin.layouts.app')

@section('content')
    @php
    $totalSales = 0;
    $totalMoney = 0;
    $totalClients = 0;

    foreach ($sales as $sell) {
        if (date("d", strtotime($sell->date)) == date("m")) {
            $totalSales++;
            $totalMoney += $sell->product->price * $sell->amount;
        }
    }

    foreach ($clients as $client) {
        if (date("d", strtotime($client->date)) == date("m")) {
            $totalClients++;
        }
    }
    @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">Visão geral</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{ $totalSales }}</h3>
                                        <p>Total de vendas no mês</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-shopping-cart"></i>
                                    </div>
                                    <a href="{{ route('sales.index') }}" class="small-box-footer">
                                        Veja as vendas <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="small-box bg-gradient-secondary">
                                    <div class="inner">
                                        <h3>{{ $totalMoney }}</h3>
                                        <p>Valor das vendas no mês</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-money-bill-wave-alt"></i>
                                    </div>
                                    <a href="{{ route('sales.index') }}" class="small-box-footer">
                                        Veja as vendas <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="small-box bg-gradient-success">
                                    <div class="inner">
                                        <h3>{{ $totalClients }}</h3>
                                        <p>Novos clientes</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-user-plus"></i>
                                    </div>
                                    <a href="{{ route('clients.index') }}" class="small-box-footer">
                                        Veja os clientes <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div>
                            <hr>
                            <h1>Avisos</h1>
                        </div>
                        <div class="timeline">


                            @for($i = count($messages) - 1; $i >= 0; $i--)
                            <div class="time-label">
                                <span class="bg-green">{{ date('d/m/Y', strtotime($messages[$i]->date)) }}</span>
                            </div>
                            <div>
                                <i class="fas fa-envelope bg-blue"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fas fa-clock"></i> {{ date('H:i', strtotime($messages[$i]->date)) }}</span>
                                    <h3 class="timeline-header"><a href="">{{ $messages[$i]->sender->name }}</a> enviou uma menssagem para @if($messages[$i]->all) todos @else você @endif</h3>
                                    <div class="timeline-body"> {{ $messages[$i]->message }}</div>
                                    <div class="timeline-footer">
                                        <a class="btn btn-primary btn-sm">Ler mais</a>
                                    </div>
                                </div>
                            </div>
                            @endfor
                            <div>
                                <i class="fas fa-clock bg-gray"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
