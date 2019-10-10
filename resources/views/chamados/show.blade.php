@extends('master')

@section('title', 'Chamado')

@section('content_header')
@stop

@section('javascripts_bottom')
@parent
<script>CKEDITOR.replace( 'comentario' );</script>
@stop

@section('content')
@parent

    <div class="card bg-light mb-3">
      <div class="card-header">{{ $chamado->user->codpes }} {{ $chamado->user->name }} - {{ Carbon\Carbon::parse($chamado->created_at)->format('d/m/Y H:i') }}</div>
      <div class="card-body">
        <b>status</b>: {{ $chamado->status }}<br>
        <b>prédio</b>: {{ $chamado->predio }}<br>
        <b>sala</b>: {{ $chamado->sala }}<br>
        <b>triagem por</b>: {{ $chamado->triagem_por }}<br>
        <b>atribuído para</b>: {{ $chamado->atribuido_para }}<br>
        <b>categoria</b>: 
            @if($chamado->categoria)
                {{ $chamado->categoria->nome  }}
            @endif
        <br>
        <p class="card-text">{!! $chamado->chamado !!}</p>
        @if(!is_null($chamado->fechado_em))
        <div><b>Fechado em</b>: {{ Carbon\Carbon::parse($chamado->fechado_em)->format('d/m/Y H:i') }}</div>
        @endif
      </div>
    </div>

@forelse ($chamado->comentarios->sortBy('created_at') as $comentario)

    <div class="card bg-light mb-3">
      <div class="card-header">{{ $comentario->user->name }} - {{ Carbon\Carbon::parse($comentario->created_at)->format('d/m/Y H:i') }}</div>
      <div class="card-body">
        <p class="card-text">{!! $comentario->comentario !!}</p>
      </div>
    </div>

@empty
    Não há comentários
@endforelse


  <form method="POST" role="form" action="#">
      @csrf

      <div class="form-group">
        <label for="comentario"><b>Novo comentário:</b></label>
        <textarea class="form-control" id="comentario" name="comentario" rows="7"></textarea>
      </div>

      @if($chamado->status == 'aberto')
      <div class="form-group">
        <button type="submit" class="btn btn-primary" value="">Enviar</button>
      </div>

        <div class="form-group">
          <button type="submit" class="btn btn-danger" name="status" value="fechar">Enviar e fechar chamado</button>
      </div>
      @else
        <div class="form-group">
          <button type="submit" class="btn btn-danger" name="status" value="abrir">Enviar e reabrir chamado</button>
      </div>
      @endif
  </form>

@stop
