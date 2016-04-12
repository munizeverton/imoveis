@extends('template')

@section('content')
    <div class="col-md-12">
        <table class="table table-striped table-hover" id="datatable">
            <thead>
            <tr>
                <th>
                    &nbsp;
                </th>
                <th>
                    Endereço
                </th>
                <th>
                    Valor do aluguel
                </th>
                <th>
                    Detalhes
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($imoveis as $imovel)
                <tr>
                    <td>
                        <img src="{{$imovel->url_imagem}}" class="img-rounded"  style="width: 50px;">
                    </td>
                    <td>
                        {{$imovel->endereco}}, {{$imovel->cidade}} - {{$imovel->estado}}
                    </td>
                    <td>
                        {{number_format($imovel->valor_aluguel, 2, ',', '.')}}
                    </td>
                    <td>
                        <a href="/imovel/{{$imovel->id}}"><span class="glyphicon glyphicon-plus-sign"
                                                                     aria-hidden="true"></span></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        } );
    </script>
@endsection