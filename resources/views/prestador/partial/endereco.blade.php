<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="endereco[tipoLogradouro]">Tipo do logradouro *</label>
            <select class="form-control" name="endereco[tipoLogradouro]" required>
                <option value="" selected>Selecione uma opção</option>
                @foreach($tiposLogradouro as $tipo)
                    <option value="{{$tipo}}" {{isset($prestador->endereco->tipoLogradouro) && $prestador->endereco->tipoLogradouro ? 'selected' : ''}}>{{$tipo}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="endereco[logradouro]">Logradouro *</label>
            <input type="text" class="form-control" name="endereco[logradouro]" value="{{ $prestador->endereco->logradouro ?? null}}" required>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="endereco[numero]">Número *</label>
            <input type="number" class="form-control" name="endereco[numero]" value="{{ $prestador->endereco->numero ?? null}}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="endereco[complemento]">Complemento</label>
            <input type="text" class="form-control" name="endereco[complemento]" value="{{ $prestador->endereco->complemento ?? null}}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="endereco[tipoBairro]">Tipo do bairro *</label>
            <select class="form-control" name="endereco[tipoBairro]" required>
                <option value="" selected>Selecione uma opção</option>
                @foreach($tiposBairro as $tipo)
                    <option value="{{$tipo}}" {{isset($prestador->endereco->tipoBairro) && $prestador->endereco->tipoBairro ? 'selected' : ''}}>{{$tipo}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="endereco[bairro]">Bairro</label>
            <input type="text" class="form-control" name="endereco[bairro]" value="{{ $prestador->endereco->bairro ?? null}}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="endereco[codigoCidade]">Código da cidade *</label>
            <input type="text" class="form-control" name="endereco[codigoCidade]" value="{{ $prestador->endereco->codigoCidade ?? null}}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="endereco[descricaoCidade]">Descrição da cidade</label>
            <input type="text" class="form-control" name="endereco[descricaoCidade]" value="{{ $prestador->endereco->descricaoCidade ?? null}}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="endereco[estado]">Estado *</label>
            <select class="form-control" name="endereco[estado]" required>
                <option value="" selected>Selecione uma opção</option>
                @foreach($estados as $estado)
                    <option value="{{$estado}}" {{isset($prestador->endereco->estado) && $prestador->endereco->estado ? 'selected' : ''}}>{{$estado}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="endereco[cep]">CEP *</label>
            <input type="text" class="form-control" name="endereco[cep]" value="{{ $prestador->endereco->cep ?? null}}" required>
        </div>
    </div>
</div>
    
