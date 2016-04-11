@extends('template')

@section('content')
<div class="col-md-12">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form enctype="multipart/form-data" method="POST" action="/admin/imovel/novo">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$imovel->id}}">
        <div class="form-group">
            <label for="valor_aluguel">Valor do aluguel *</label>
            <input type="text" class="form-control mask-money" name="valor_aluguel" id="valor_aluguel" value=" {{number_format($imovel->valor_aluguel, 2, ',', '.')}}">
        </div>
        <div class="form-group">
            <label for="endereco">Endereço *</label>
            <input type="text" class="form-control" name="endereco" id="endereco" value="{{$imovel->endereco}}">
        </div>
        <div class="form-group">
            <label for="cidade">Cidade *</label>
            <input type="text" class="form-control" name="cidade" id="cidade" value="{{$imovel->cidade}}">
        </div>
        <div class="form-group">
            <label for="estado">Estado *</label>
            <input type="text" class="form-control" name="estado" id="estado" value="{{$imovel->estado}}">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição *</label>
            <textarea name="descricao" id="descricao" class="form-control">{{$imovel->descricao}}</textarea>
        </div>
        <div class="form-group">
            <img src="{{$imovel->url}}" class="img-rounded">
        </div>
        <div class="form-group">
            <label for="imagem">Imagem *</label>
            <input type="file" id="imagem" name="imagem">
        </div>
        <button type="submit" class="btn btn-default">Salvar</button>
    </form>
</div>
@endsection

@section('scripts')
    <script src="/js/jqueryMask/jquery.mask.js"></script>
    <script>
        $('.mask-money').mask('000.000,00', {reverse: true});
    </script>
@endsection