@extends('layout.master')

@section('name', 'Emissor NFe')
    
@section('content')
<form method="POST" action="{{ $prestador ? route('prestador.salvar', [$prestador->cpfCnpj, $index]) : route('prestador.salvar') }}">
    @csrf

    <div class="card mb-5">

        <div class="card-header h5">
            Cadastrar prestador
        </div>
        <div class="card-body">
            @include('prestador.partial.dados-basicos')
        </div>
        <hr>
        <div class="card-body">
            @include('prestador.partial.endereco')
            <hr>
            <button type="submit" class="btn btn-primary float-right">Salvar</button>
        </div>

    </div>

</form>
@endsection