@extends('layout.master')

@section('name', 'Emissor NFe')
    
@section('content')
<div class="card">
    <div class="card-header h5">
        Prestadores de serviço
        <a href="{{ route('prestador.cadastrar') }}" class="btn btn-primary float-right btn-sm">Cadastrar nova</a>
    </div>
    <div class="card-body">
        
        <div class="table-responsive-md">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Razão Social</th>
                        <th scope="col">Nome Fantasia</th>
                        <th scope="col">CPF ou CNPJ</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody class="dados-prestador">
                    {{-- <tr>
                        <th colspan="5" class="text-center">Nenhum registro encontrado</th>
                    </tr> --}}
                </tbody>
            </table>
        </div>

    </div>
</div>

@include('prestador.partial.modal-visualizacao-dados')
@endsection

@section('scripts')
<script>

    function modalDados(cpfCnpj) {
        $.ajax({url: '{!! route('prestador.visualizar') !!}/'+cpfCnpj, success: function(result){
            $('#visualizacaoDadosModal').modal('show');
            $(".conteudo-modal").html(result);
        }});
    }

    function limpaCpfCnpj(valor){
        valor = valor.replace(".", "");
        valor = valor.replace(".", "");
        valor = valor.replace("-", "");
        valor = valor.replace("/", "");
        return valor;
    }

    function remover(chave) {
        localStorage.removeItem(chave)
        $('#'+chave).remove()
    }

    function adicionaLinha(indice, razaoSocial, nomeFantasia, cpfCnpj) {
        $('.dados-prestador')
            .append('<tr id="'+i+'">'
                + '<th scope="row">'+i+'</th>'
                + '<td>'+razaoSocial+'</td>'
                + '<td>'+nomeFantasia+'</td>'
                + '<td>'+cpfCnpj+'</td>'
                + '<td>'
                    + '<a href="javascript:;" class="btn btn-sm" title="Vizualizar" data-toggle="tooltip" data-placement="top" onclick=(modalDados('+limpaCpfCnpj(cpfCnpj)+'))>'
                        + '<i class="fas fa-eye"></i>'
                    + '</a>'
                    + '<a href="{{ route('prestador.cadastrar') }}/'+limpaCpfCnpj(cpfCnpj)+'/'+i+'" class="btn btn-sm" title="Editar" data-toggle="tooltip" data-placement="top">'
                        + '<i class="fas fa-user-edit"></i>'
                    + '</a>'
                    + '<a href="javascript:;" onclick="remover('+i+')" class="btn btn-sm" title="Excluir" data-toggle="tooltip" data-placement="top">'
                        + '<i class="fas fa-trash"></i>'
                    + '</a>'
                + '</td>'
            + '</tr>')
    }
    
    @if(isset($dados))
        if(!localStorage.getItem('contador')) {
            localStorage.setItem('contador', '1')
        }
        if(chave = '{!! $index !!}') {
            localStorage.removeItem(chave)
            localStorage.setItem(chave, '{!! json_encode($dados) !!}')
        } else {
            localStorage.setItem(localStorage.getItem('contador'), '{!! json_encode($dados) !!}')
            localStorage.setItem('contador', parseInt(localStorage.getItem('contador'))+1)
        }
    @endif

    $(document).ready(function(){
         if(contador = localStorage.getItem('contador')) {
            for(i = 1; i < contador; i++) {
                dados = $.parseJSON(localStorage.getItem(i.toString()))
                if(dados) {
                    adicionaLinha(i, dados['razaoSocial'], dados['nomeFantasia'] ? dados['nomeFantasia'] : 'Não informado', dados['cpfCnpj'])
                }
            }
        } 
    })

</script>
@endsection