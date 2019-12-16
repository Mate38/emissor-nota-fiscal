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
            @include('partial.form-error', ['nome' => 'endereco.tipoLogradouro'])
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="endereco[logradouro]">Logradouro *</label>
            <input type="text" class="form-control" name="endereco[logradouro]" value="{{ $prestador->endereco->logradouro ?? null}}" required>
            @include('partial.form-error', ['nome' => 'endereco.logradouro'])
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="endereco[numero]">Número *</label>
            <input type="number" class="form-control" name="endereco[numero]" value="{{ $prestador->endereco->numero ?? null}}" required>
            @include('partial.form-error', ['nome' => 'endereco.numero'])
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="endereco[complemento]">Complemento</label>
            <input type="text" class="form-control" name="endereco[complemento]" value="{{ $prestador->endereco->complemento ?? null}}">
            @include('partial.form-error', ['nome' => 'endereco.complemento'])
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
            @include('partial.form-error', ['nome' => 'endereco.tipoBairro'])
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="endereco[bairro]">Bairro</label>
            <input type="text" class="form-control" name="endereco[bairro]" value="{{ $prestador->endereco->bairro ?? null}}">
            @include('partial.form-error', ['nome' => 'endereco.bairro'])
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="endereco[codigoCidade]">Código da cidade *</label>
            <input type="text" class="form-control codigo_cidade" name="endereco[codigoCidade]" value="{{ $prestador->endereco->codigoCidade ?? null}}" required>
            @include('partial.form-error', ['nome' => 'endereco.codigoCidade'])
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="endereco[descricaoCidade]">Cidade</label>
            <input type="text" class="form-control" name="endereco[descricaoCidade]" value="{{ $prestador->endereco->descricaoCidade ?? null}}">
            @include('partial.form-error', ['nome' => 'endereco.descricaoCidade'])
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
            @include('partial.form-error', ['nome' => 'endereco.estado'])
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="endereco[cep]">CEP *</label>
            <input type="text" class="form-control cep" name="endereco[cep]" value="{{ $prestador->endereco->cep ?? null}}" required>
            @include('partial.form-error', ['nome' => 'endereco.cep'])
        </div>
    </div>
</div>
    
