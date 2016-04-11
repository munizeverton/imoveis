@extends('template')

@section('content')
    <div class="col-md-4">
       <img src="{{$imovel->url}}" class="img-rounded">
    </div>
    <div class="col-md-8">
        <ul>
            <li>
                <b>Endereço: </b> {{$imovel->endereco}}, {{$imovel->cidade}} - {{$imovel->estado}}
            </li>
            <li>
                <b>Valor do aluguel: </b> {{number_format($imovel->valor_aluguel, 2, ',', '.')}}
            </li>
            <li>
                <b>Desxcrição: </b> {{nl2br($imovel->descricao)}}
            </li>
        </ul>
    </div>
@endsection