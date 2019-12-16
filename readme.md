# Sistema integra emissor de NFS-e, com camada SandBox do Plugnotas, utilizando Laravel 5.7

Atualmente com funções de cadastro, edição, visualização e remoção de prestadores de serviço.

## Dependências

O sistema utiliza o Guzzle, que utiliza o curl, que necessita do cacart.pem configurado no servidor do php.

Assim, no arquivo php.ini adicione o endereço do certificado. (Uma cópia do certificado pode ser encontrado dentro do projeto em ```storage/certs```)

## Configuração

Após clonar o projeto, com o terminal aberto na pasta do projeto, execute o comando:

```composer install --no-scripts```

Renomeie então o arquivo:

```.env.example```

para

```.env```

Crie então uma nova chave para a aplicação com o comando:

```php artisan key:generate```
