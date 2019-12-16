<?php

namespace App\Services;

use phpDocumentor\Reflection\Types\This;
use TecnoSpeed\Plugnotas\Nfse;
use TecnoSpeed\Plugnotas\Configuration;
use TecnoSpeed\Plugnotas\Nfse\Prestador;
use TecnoSpeed\Plugnotas\Error\RequiredError;
use TecnoSpeed\Plugnotas\Traits\Communication;
use TecnoSpeed\Plugnotas\Error\ValidationError;

class PrestadorService
{
    use Communication;

    public static function cadastrar($dados)
    {
        try {
            $prestador = Prestador::fromArray($dados);
            $prestador->setCertificado('5b855b0926ddb251e0f0ef42');

            // Criando configuração (este objeto é onde você irá colocar seu api-key)
            $configuration = new Configuration(
                Configuration::TYPE_ENVIRONMENT_SANDBOX, // Ambiente a ser enviada a requisição
                '2da392a6-79d2-4304-a8b7-959572c7e44d' // API-Key
            );

            return $prestador->send($configuration);

        } catch (ValidationError $e) {
            // Algum campo foi informado no formato errado
            return $e;
        } catch (RequiredError $e) {
            // Campos requeridos não foram informados
            return $e;
        } catch (\Exception $e) {
            // Algum erro não esperado
            return $e;
        }

        return false;
    }

    public static function getPrestador($cpfCnpj) {
        try {
            // Criando configuração (este objeto é onde você irá colocar seu api-key)
            $configuration = new Configuration(
                Configuration::TYPE_ENVIRONMENT_SANDBOX, // Ambiente a ser enviada a requisição
                '2da392a6-79d2-4304-a8b7-959572c7e44d' // API-Key
            );
        
            $communication = (new self)->getCallApiInstance($configuration);

            return $communication->send('GET', "/nfse/prestador/$cpfCnpj", null);

        } catch (\Exception $e) {
          return $e;
        }
    }

    public static function editar($dados, $cpfCnpj)
    {
        try {
            // Criando configuração (este objeto é onde você irá colocar seu api-key)
            $configuration = new Configuration(
                Configuration::TYPE_ENVIRONMENT_SANDBOX, // Ambiente a ser enviada a requisição
                '2da392a6-79d2-4304-a8b7-959572c7e44d' // API-Key
            );
        
            $communication = (new self)->getCallApiInstance($configuration);

            return $communication->send('PATCH', "/nfse/prestador/$cpfCnpj", $dados);

        } catch (ValidationError $e) {
            // Algum campo foi informado no formato errado
            return $e;
        } catch (RequiredError $e) {
            // Campos requeridos não foram informados
            return $e;
        } catch (\Exception $e) {
            // Algum erro não esperado
            return $e;
        }

        return false;
    }

}