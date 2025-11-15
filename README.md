# NutriFlow

Sistema de gestão nutricional desenvolvido em Laravel 10 + Filament PHP.

## Funcionalidades principais

-   Gestão de pacientes
-   Plano alimentar individualizado
-   Controle de refeições
-   Registro de mensurações corporais
-   Gestão de treinos
-   Funções personalizadas do nutricionista
-   Multi-tenancy (Tenants)
-   Painéis separados (Nutricionista / Paciente)
-   API para comunicação externa
-   Suporte a MFA, ACL e autenticação nativa Laravel
-   Front-end em Blade (personalização futura)

## Tecnologias usadas

-   PHP 8.2+
-   Laravel 10
-   Filament PHP
-   Livewire
-   MySQL
-   Composer
-   NPM / Vite

## Estrutura do Projeto

O projeto segue arquitetura padrão Laravel, com:

-   `app/Models` – modelos principais (Paciente, Treino, Plano etc.)
-   `app/Filament/Resources` – telas administrativas do Filament
-   `routes/web.php` – rotas web
-   `routes/api.php` – rotas da API
-   `resources/views` – páginas Blade
-   `database/migrations` – tabelas e configurações do BD
-   `database/seeders` – dados iniciais

## Instalação

```bash
git clone https://github.com/ferrerolan/NutriFlow.git
cd NutriFlow
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm install
npm run dev
php artisan serve
```
