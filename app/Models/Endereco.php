<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    public static function getTiposLogradouro() {
        
        $allowedTypes = [
            'Alameda',
            'Avenida',
            'Chácara',
            'Colônia',
            'Condomínio',
            'Estância',
            'Estrada',
            'Fazenda',
            'Praça',
            'Prolongamento',
            'Rodovia',
            'Rua',
            'Sítio',
            'Travessa',
            'Vicinal'
        ];

        return $allowedTypes;
    }

    public static function getTiposBairro() {
        
        $allowedTypes = [
            'Bairro',
            'Bosque',
            'Chácara',
            'Conjunto',
            'Desmembramento',
            'Distrito',
            'Favela',
            'Fazenda',
            'Gleba',
            'Horto',
            'Jardim',
            'Loteamento',
            'Núcleo',
            'Parque',
            'Residencial',
            'Sítio',
            'Tropical',
            'Vila',
            'Zona',
            'Centro',
            'Setor'
        ];

        return $allowedTypes;
    }

    public static function getEstados() {
        
        $allowedStates = [
            'AC',
            'AL',
            'AM',
            'AP',
            'BA',
            'CE',
            'DF',
            'ES',
            'GO',
            'MA',
            'MG',
            'MS',
            'MT',
            'PA',
            'PB',
            'PE',
            'PI',
            'PR',
            'RJ',
            'RN',
            'RO',
            'RR',
            'RS',
            'SC',
            'SE',
            'SP',
            'TO'
        ];

        return $allowedStates;
    }

}
