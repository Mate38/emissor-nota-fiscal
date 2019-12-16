# Sistema integra emissor de NFS-e, com camada SandBox do Plugnotas, utilizando Laravel 5.7

Atualmente com funções de cadastro, edição, visualização e remoção de prestadores de serviço.

## Dependências

Possui como dependência o Guzzle, o qual reques o cacart.pem configurado no servidor do php.

Para tal no arquivo php.ini adicione o endereço do certificado. (Uma cópia do certificado pode ser encontrado dentro do projeto em ```storage/certs```)

## Configuração

Após clonar o projeto, com o terminal aberto na pasta do projeto, execute o comando:

```composer install --no-scripts```

Renomeie então o arquivo:

```.env.example```

para

```.env```

Crie então uma nova chave para a aplicação com o comando:

```php artisan key:generate```
