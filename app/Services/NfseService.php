<?php

namespace App\Services;

use TecnoSpeed\Plugnotas\Nfse;
use TecnoSpeed\Plugnotas\Nfse\Rps;
use TecnoSpeed\Plugnotas\Nfse\Servico;
use TecnoSpeed\Plugnotas\Nfse\Tomador;
use TecnoSpeed\Plugnotas\Configuration;
use TecnoSpeed\Plugnotas\Nfse\Impressao;
use TecnoSpeed\Plugnotas\Nfse\Prestador;
use TecnoSpeed\Plugnotas\Common\Endereco;
use TecnoSpeed\Plugnotas\Common\Telefone;
use TecnoSpeed\Plugnotas\Nfse\Servico\Iss;
use TecnoSpeed\Plugnotas\Nfse\Servico\Obra;
use TecnoSpeed\Plugnotas\Nfse\Servico\Valor;
use TecnoSpeed\Plugnotas\Error\RequiredError;
use TecnoSpeed\Plugnotas\Nfse\Servico\Evento;
use TecnoSpeed\Plugnotas\Common\ValorAliquota;
use TecnoSpeed\Plugnotas\Nfse\CidadePrestacao;
use TecnoSpeed\Plugnotas\Nfse\Servico\Deducao;
use TecnoSpeed\Plugnotas\Error\ValidationError;
use TecnoSpeed\Plugnotas\Nfse\Servico\Retencao;

class NfseService
{
    public static function emitirNota($dados)
    {
        try {
            // Criando os objetos auxiliares necessários e o objeto Prestador
            $enderecoPrestador = new Endereco();
            $enderecoPrestador->setTipoLogradouro(data_get($dados, 'prestador.tipo_logradouro'));
            $enderecoPrestador->setLogradouro(data_get($dados, 'prestador.logradouro'));
            $enderecoPrestador->setNumero(data_get($dados, 'prestador.numero'));
            $enderecoPrestador->setComplemento(data_get($dados, 'prestador.complemento'));
            $enderecoPrestador->setTipoBairro(data_get($dados, 'prestador.tipo_bairro'));
            $enderecoPrestador->setBairro(data_get($dados, 'prestador.bairro'));
            $enderecoPrestador->setCodigoCidade(data_get($dados, 'prestador.codigo_cidade'));
            $enderecoPrestador->setDescricaoCidade(data_get($dados, 'prestador.descricao_cidade'));
            $enderecoPrestador->setEstado(data_get($dados, 'prestador.estado'));
            $enderecoPrestador->setCep(data_get($dados, 'prestador.cep'));
            $telefonePrestador = new Telefone(data_get($dados, 'prestador.codigo_pais'), data_get($dados, 'prestador.numero_telefone'));
            $prestador = new Prestador();
            $prestador->setCertificado('5b855b0926ddb251e0f0ef42');
            $prestador->setCpfCnpj(data_get($dados, 'prestador.cnpj'));
            $prestador->setEmail(data_get($dados, 'prestador.email'));
            $prestador->setEndereco($enderecoPrestador);
            $prestador->setIncentivadorCultural(data_get($dados, 'prestador.icentivador_cultural'));
            $prestador->setIncentivoFiscal(data_get($dados, 'prestador.icentivado_fiscal'));
            $prestador->setInscricaoMunicipal(data_get($dados, 'prestador.inscricao_municipal'));
            $prestador->setNomeFantasia(data_get($dados, 'prestador.nome_fantasia'));
            $prestador->setRazaoSocial(data_get($dados, 'prestador.razao_social'));
            $prestador->setRegimeTributario(data_get($dados, 'prestador.regime_tributario'));
            $prestador->setRegimeTributarioEspecial(data_get($dados, 'prestador.regime_tributario_especial'));
            $prestador->setSimplesNacional(data_get($dados, 'prestador.simples_nacional'));
            $prestador->setTelefone($telefonePrestador);
            
            // Criando os objetos auxiliares necessários e o objeto Tomador
            $enderecoTomador = new Endereco();
            $enderecoTomador->setTipoLogradouro('Avenida');
            $enderecoTomador->setLogradouro('Duque de Caxias');
            $enderecoTomador->setNumero('882');
            $enderecoTomador->setComplemento('17 andar');
            $enderecoTomador->setTipoBairro('Zona');
            $enderecoTomador->setBairro('Zona 7');
            $enderecoTomador->setCodigoCidade('4115200');
            $enderecoTomador->setDescricaoCidade('Maringá');
            $enderecoTomador->setEstado('PR');
            $enderecoTomador->setCep('87.020-025');
            $telefoneTomador = new Telefone('44', '1234-1234');
            $tomador = new Tomador();
            $tomador->setCpfCnpj('00.000.000/0001-91');
            $tomador->setEmail('teste@plugnotas.com.br');
            $tomador->setEndereco($enderecoTomador);
            $tomador->setInscricaoEstadual('8214100099');
            $tomador->setNomeFantasia('Empresa Teste');
            $tomador->setRazaoSocial('Empresa Teste LTDA');
            $tomador->setTelefone($telefoneTomador);
            // Criando os objetos auxiliares necessários e o objeto Servico
            $deducao = new Deducao();
            $deducao->setTipo(99);
            $deducao->setDescricao('Teste de deducao');
            
            $evento = new Evento();
            $evento->setCodigo('4051200');
            $evento->setDescricao('CONFERENCIA');
            
            $iss = new Iss();
            $iss->setAliquota(0.03);
            $iss->setExigibilidade(1);
            $iss->setProcessoSuspensao('1234');
            $iss->setRetido(true);
            $iss->setTipoTributacao(1);
            $iss->setValor(12.30);
            $iss->setValorRetido(1.23);
            
            $obra = new Obra();
            $obra->setArt('6270201');
            $obra->setCodigo('21');
            
            $retencao = new Retencao();
            $retencao->setCofins(new ValorAliquota(100.10, 1.01));
            $retencao->setCsll(new ValorAliquota(202.20, 2.02));
            $retencao->setInss(new ValorAliquota(303.30, 3.03));
            $retencao->setIrrf(new ValorAliquota(404.40, 4.04));
            $retencao->setOutrasRetencoes(505.50);
            $retencao->setPis(new ValorAliquota(606.60, 6.06));
            
            $valor = new Valor();
            $valor->setBaseCalculo(0.01);
            $valor->setDeducoes(0.02);
            $valor->setDescontoCondicionado(0.03);
            $valor->setDescontoIncondicionado(0.04);
            $valor->setLiquido(0.05);
            $valor->setServico(0.06);
            
            $servico = new Servico();
            $servico->setCnae('4751201');
            $servico->setCodigo('1.02');
            $servico->setCodigoCidadeIncidencia('4115200');
            $servico->setCodigoTributacao('4115200');
            $servico->setDeducao($deducao);
            $servico->setDescricaoCidadeIncidencia('MARINGA');
            $servico->setDiscriminacao('Programação de software');
            $servico->setEvento($evento);
            $servico->setIdIntegracao('A001XT');
            $servico->setInformacoesLegais('Informações necessárias a serem adicionadas na NFSe');
            $servico->setIss($iss);
            $servico->setObra($obra);
            $servico->setRetencao($retencao);
            $servico->setValor($valor);
            // Criando os objetos auxiliares necessários e o objeto Rps
            $dateEmission = new \DateTime('now');
            $rps = new Rps();
            $rps->setDataEmissao($dateEmission);
            $rps->setCompetencia($dateEmission);
            // Criando os objetos auxiliares necessários e o objeto CidadePrestacao
            $cidadePrestacao = new CidadePrestacao();
            $cidadePrestacao->setCodigo('4115200');
            $cidadePrestacao->setDescricao('MARINGA');
            // Criando configuração (este objeto é onde você irá colocar seu api-key)
            $configuration = new Configuration(
                Configuration::TYPE_ENVIRONMENT_SANDBOX, // Ambiente a ser enviada a requisição
                '2da392a6-79d2-4304-a8b7-959572c7e44d' // API-Key
            );
            $impressao = new Impressao();
            $impressao->setCamposCustomizados([
               'inscricaoMunicipalTomador' => '123456'
            ]);
            // Criando uma NFSe
            $nfse = new Nfse();
            $nfse->setCidadePrestacao($cidadePrestacao);
            $nfse->setEnviarEmail(true);
            $nfse->setIdIntegracao('ABC123');
            $nfse->setImpressao($impressao);
            $nfse->setPrestador($prestador);
            $nfse->setRps($rps);
            $nfse->setServico($servico);
            $nfse->setSubstituicao(false);
            $nfse->setTomador($tomador);

            $response = $nfse->send($configuration); // A resposta sempre será um objeto TecnoSpeed\Plugnotas\Communication\Response
            return $response;

        } catch (ValidationError $e) {
            // Algum campo foi informado no formato errado
            return $e;
        } catch (RequiredError $e) {
            // Campos requeridos não foram informados
            return $e;
        } catch (\Exception $e) {
            // Algum erro não esperado
            // dd('Exception',$e);
            return $e;
        }

        return false;
    }

}