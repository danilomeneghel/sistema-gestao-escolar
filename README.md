# Gestão Escolar

Sistema de Gestão Escolar com informações de Alunos, Escolas e Turmas.
Com disponibilização de consumo de dados através de API REST.

### Pré-requisitos:

-   Composer
-   PHP >= 7

## Instalação

## Banco MySql

Criar o banco de dados MySql.

## Criar e configurar arquivo .env

```bash
  cp .env.example .env
```

Variáveis de ambiente do .env

-   DB_CONNECTION=mysql
-   DB_HOST=127.0.0.1
-   DB_PORT=3306
-   DB_DATABASE=db_name
-   DB_USERNAME=root
-   DB_PASSWORD=

## Gerar a key do projeto

```bash
  php artisan key:generate
```

## Instalar as dependências do projeto

```bash
  composer install
```

## Criar as tabelas

```bash
  php artisan migrate
```

## Popular as tabelas

Será populado 15 registos por execução

```bash
  php artisan db:seed
```

## Iniciar o Servidor do Laravel

```bash
  php artisan serve
```

## Endpoints API

API disponibiliza as funcionalidade baseada na rota:

```bash
  localhost:8000/api
```

-Rotas

-   index (GET)

```bash
  /alunos
  /escolas
  /turmas
```

-   show (GET)

```bash
  /aluno/{id}
  /escola/{id}
  /turma/{id}
```

-   store (POST)

```bash
  /aluno
  /escola
  /turma
```

-   update (PUT)

```bash
  /aluno/{id}
  /escola/{id}
  /turma/{id}
```

-   destroy (DELETE)

```bash
  /aluno/{id}
  /escola/{id}
  /turma/{id}
```

-   Header

```bash
  Content-Type application/json
```

## Construído com:

-   [Laravel](https://laravel.com/) - Framework Laravel 8.
-   [MySql](https://www.mysql.com/) - Gerenciador de Banco de Dados
-   [Bootstrap](https://getbootstrap.com/) - Bootstrap 5.

