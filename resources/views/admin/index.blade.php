@extends('template')

@section('content')
    <div class="col-md-12">
        <a href="/admin/imovel/novo" class="btn btn-primary">Novo</a>
        <table class="table table-striped table-hover" id="datatable">
            <thead>
            <tr>
                <th>
                    Endereço
                </th>
                <th>
                    Valor do aluguel
                </th>
                <th>
                    Ações
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($imoveis as $imovel)
                <tr>
                    <td>
                        {{$imovel->endereco}}, {{$imovel->cidade}} - {{$imovel->estado}}
                    </td>
                    <td>
                        {{number_format($imovel->valor_aluguel, 2, ',', '.')}}
                    </td>
                    <td>
                        <a href="/admin/imovel/{{$imovel->id}}">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true" title="Editar"></span>
                        </a>
                        <a href="/admin/imovel/excluir/{{$imovel->id}}">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true" title="Excluir"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')

@endsection