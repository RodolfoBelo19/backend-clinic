<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Requisitos
### Certifique-se de ter as seguintes ferramentas instaladas em seu sistema:

- php: versão 8.1 ou superior
- composer

## Instalação
### Siga as etapas abaixo para configurar o projeto em sua máquina:

- 1: Clone este repositório para o seu diretório local usando o seguinte comando:

```bash
git clone https://github.com/RodolfoBelo19/backend-clinic
```

- 2: Configure seu arquivo .env, segue abaixo um exemplo:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=clinic
DB_USERNAME=root
DB_PASSWORD=12345678
```

- 3: Instale as dependências do projeto:

```bash
composer install
```

- 4: Rode o comando para fazer as migration:

```bash
php artisan migrate
```

## Executando o Projeto
### Após concluir a instalação e configuração, você pode iniciar o servidor de desenvolvimento do Laravel com o seguinte comando:

```bash
php artisan serve
```

### Aguarde até que o servidor de desenvolvimento seja iniciado e acesse a seguinte URL em seu navegador:
- http://127.0.0.1:8000/


## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
