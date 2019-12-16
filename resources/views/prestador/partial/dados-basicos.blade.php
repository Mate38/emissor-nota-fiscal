<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="cpfCnpj">CPF ou CNPJ *</label>
            <input type="text" class="form-control cpf_cnpj" name="cpfCnpj" value="{{ $prestador->cpfCnpj ?? null}}" required>
            @include('partial.form-error', ['nome' => 'cpfCnpj'])
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="email">E-mail *</label>
            <input type="email" class="form-control" name="email" value="{{ $prestador->email ?? null}}" required>
            @include('partial.form-error', ['nome' => 'email'])
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            <label for="telefone[ddd]">Código de área *</label>
            <input type="text" class="form-control telefone_ddd" name="telefone[ddd]" value="{{ $prestador->telefone->ddd ?? null}}" required>
            @include('partial.form-error', ['nome' => 'telefone.ddd'])
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="telefone[numero]">Número do telefone *</label>
            <input type="text" class="form-control telefone_numero" name="telefone[numero]" value="{{ $prestador->telefone->numero ?? null}}" required>
            @include('partial.form-error', ['nome' => 'telefone.numero'])
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="inscricaoMunicipal">Inscrição municipal *</label>
            <input type="text" class="form-control" name="inscricaoMunicipal" value="{{ $prestador->inscricaoMunicipal ?? null}}" required>
            @include('partial.form-error', ['nome' => 'inscricaoMunicipal'])
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="nomeFantasia">Nome fantasia</label>
            <input type="text" class="form-control" name="nomeFantasia" value="{{ $prestador->nomeFantasia ?? null}}">
            @include('partial.form-error', ['nome' => 'nomeFantasia'])
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="razaoSocial">Razão social *</label>
            <input type="text" class="form-control" name="razaoSocial" value="{{ $prestador->razaoSocial ?? null}}" required>
            @include('partial.form-error', ['nome' => 'razaoSocial'])
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        <p class="form-check-label">Icentivador cultural</p>
        <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" name="incentivadorCultural" value="1" {{ isset($prestador->incentivadorCultural) && $prestador->incentivadorCultural ? 'checked' : '' }}>
            <label for="incentivadorCultural" class="form-check-label">Sim</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" name="incentivadorCultural" value="0" {{ isset($prestador->incentivadorCultural) && !$prestador->incentivadorCultural ? 'checked' : '' }}>
            <label for="incentivadorCultural" class="form-check-label">Não</label>
        </div>
        @include('partial.form-error', ['nome' => 'incentivadorCultural'])
    </div>
    <div class="col-md-2">
        <p class="form-check-label">Icentivado fiscal</p>
        <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" name="incentivoFiscal" value="1" {{ isset($prestador->incentivoFiscal) && $prestador->incentivoFiscal ? 'checked' : '' }}>
            <label for="incentivoFiscal" class="form-check-label">Sim</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" name="incentivoFiscal" value="0" {{ isset($prestador->incentivoFiscal) && !$prestador->incentivoFiscal ? 'checked' : '' }}>
            <label for="incentivoFiscal" class="form-check-label">Não</label>
        </div>
        @include('partial.form-error', ['nome' => 'incentivoFiscal'])
    </div>
    <div class="col-md-2">
        <p class="form-check-label">Regime tributário</p>
        <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" name="regimeTributario" value="1" {{ isset($prestador->regimeTributario) && $prestador->regimeTributario ? 'checked' : '' }}>
            <label for="regimeTributario" class="form-check-label">Sim</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" name="regimeTributario" value="0" {{ isset($prestador->regimeTributario) && !$prestador->regimeTributario  ? 'checked' : '' }}>
            <label for="regimeTributario" class="form-check-label">Não</label>
        </div>
        @include('partial.form-error', ['nome' => 'regimeTributario'])
    </div>
    <div class="col-md-3">
        <p class="form-check-label">Regime tributário especial</p>
        <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" name="regimeTributarioEspecial" value="1" {{ isset($prestador->regimeTributarioEspecial) && $prestador->regimeTributarioEspecial ? 'checked' : '' }}>
            <label for="regimeTributarioEspecial" class="form-check-label">Sim</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" name="regimeTributarioEspecial" value="0" {{ isset($prestador->regimeTributarioEspecial) && !$prestador->regimeTributarioEspecial ? 'checked' : '' }}>
            <label for="regimeTributarioEspecial" class="form-check-label">Não</label>
        </div>
        @include('partial.form-error', ['nome' => 'regimeTributarioEspecial'])
    </div>
    <div class="col-md-2">
        <p class="form-check-label">Simples nacional *</p>
        <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" name="simplesNacional" value="1" {{ isset($prestador->simplesNacional) && $prestador->simplesNacional ? 'checked' : '' }} required>
            <label for="simplesNacional" class="form-check-label">Sim</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" name="simplesNacional" value="0" {{ isset($prestador->simplesNacional) && !$prestador->simplesNacional ? 'checked' : '' }} required>
            <label for="simplesNacional" class="form-check-label">Não</label>
        </div>
        @include('partial.form-error', ['nome' => 'simplesNacional'])
    </div>
</div>
