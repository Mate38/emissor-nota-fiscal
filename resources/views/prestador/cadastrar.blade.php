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

@section('scripts')
<script>
    // Mascara de CPF e CNPJ
    var CpfCnpjMaskBehavior = function (val) {
                return val.replace(/\D/g, '').length <= 11 ? '000.000.000-009' : '00.000.000/0000-00';
            },
        cpfCnpjpOptions = {
            onKeyPress: function(val, e, field, options) {
            field.mask(CpfCnpjMaskBehavior.apply({}, arguments), options);
        }
    };

    $(document).ready(function(){
        $('.cep').mask('00000-000');
        $('.telefone_numero').mask('00000-0000');
        $('.telefone_ddd').mask('(00)');      
        $('.codigo_cidade').mask('0000000');      
        $('.cpf_cnpj').mask(CpfCnpjMaskBehavior, cpfCnpjpOptions);
    });
</script>
@endsection