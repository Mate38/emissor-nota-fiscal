<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="cpfCnpj">CPF ou CNPJ *</label>
            <input type="text" class="form-control" name="cpfCnpj" value="{{ $prestador->cpfCnpj ?? null}}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="email">E-mail *</label>
            <input type="email" class="form-control" name="email" value="{{ $prestador->email ?? null}}" required>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="telefone[ddd]">Código de área *</label>
            <input type="number" class="form-control cnpj" name="telefone[ddd]" value="{{ $prestador->telefone->ddd ?? null}}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="telefone[numero]">Número do telefone *</label>
            <input type="number" class="form-control" name="telefone[numero]" value="{{ $prestador->telefone->numero ?? null}}" required>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="incentivadorCultural">Icentivador cultural</label>
            <input type="text" class="form-control" name="incentivadorCultural" value="{{ $prestador->incentivadorCultural ?? null}}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="incentivoFiscal">Icentivado fiscal</label>
            <input type="text" class="form-control" name="incentivoFiscal" value="{{ $prestador->incentivoFiscal ?? null}}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="inscricaoMunicipal">Inscrição municipal *</label>
            <input type="text" class="form-control" name="inscricaoMunicipal" value="{{ $prestador->inscricaoMunicipal ?? null}}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="nomeFantasia">Nome fantasia</label>
            <input type="text" class="form-control" name="nomeFantasia" value="{{ $prestador->nomeFantasia ?? null}}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="razaoSocial">Razão social *</label>
            <input type="text" class="form-control" name="razaoSocial" value="{{ $prestador->razaoSocial ?? null}}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="regimeTributario">Regime tributário</label>
            <input type="text" class="form-control" name="regimeTributario" value="{{ $prestador->regimeTributario ?? null}}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="regimeTributarioEspecial">Regime tributário especial</label>
            <input type="text" class="form-control" name="regimeTributarioEspecial" value="{{ $prestador->regimeTributarioEspecial ?? null}}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="simplesNacional">Simples *</label>
            <input type="text" class="form-control" name="simplesNacional" value="{{ $prestador->simplesNacional ?? null}}" required>
        </div>
    </div>
</div>
