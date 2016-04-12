[![Build Status](https://travis-ci.org/munizeverton/imoveis.svg?branch=master)](https://travis-ci.org/munizeverton/imoveis)
[![Code Climate](https://codeclimate.com/github/munizeverton/imoveis/badges/gpa.svg)](https://codeclimate.com/github/munizeverton/imoveis)

# Instalação e configuração

Faça um clone desse projeto

```sh
git clone https://github.com/munizeverton/imoveis.git
```

Entre na pasta do projeto clonado e instale as dependencias com o composer

```sh
cd imoveis
composer install
```

Crie um arquivo chamado .env a partir do arquivo .env.example e altere as configurações abaixo,  
referentes ao banco da aplicação, banco de testes e do Amazon S3

```
DB_CONNECTION=mysql
DB_HOST=192.168.33.11
DB_PORT=3306
DB_DATABASE=imoveis
DB_USERNAME=root
DB_PASSWORD=root

TESTING_DB_HOST=192.168.33.11
TESTING_DB_DATABASE=imoveis
TESTING_DB_USERNAME=root
TESTING_DB_PASSWORD=root

S3_KEY=
S3_SECRET=
S3_REGION=us-standard
S3_BUCKET=
```

Rode os comandos abaixo para criar as tabelas e popular com os dados fake

```sh
php artisan migrate
php artisan db:seed
```

# Rodando a aplicação

Você pode rodar a aplicação usando o servidor embutido do PHP
com o comando abaixo

```sh
php -S 127.0.0.1:8080 -t public/
```

Agora basta acessar a aplicação em http://127.0.0.1:8080

**Usuário** admin@imoveis.com
**Senha** 123456

Se houver algum problema com as sessions do php,
provavelmente você precisa dar permissão na pasta storage

# Rodando os testes

Você pode rodar a suite de testes executando o comando abaixo

```sh
vendo/bin/phpunit
```