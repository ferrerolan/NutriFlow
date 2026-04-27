<h1 align="center">🥗 NutriFlow</h1>

<p align="center">
  <b>Plataforma inteligente de gestão nutricional com foco em automação e IA</b><br>
  Desenvolvido para nutricionistas que querem escalar atendimento e melhorar resultados 🚀
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12-red?style=for-the-badge&logo=laravel">
  <img src="https://img.shields.io/badge/Filament-Admin-blueviolet?style=for-the-badge">
  <img src="https://img.shields.io/badge/Livewire-Dynamic-green?style=for-the-badge">
  <img src="https://img.shields.io/badge/Status-Em%20Desenvolvimento-yellow?style=for-the-badge">
</p>

---
🧰 Tecnologias
⚙️ Laravel 12
🎛️ Filament PHP
🔄 Livewire
🎨 Tailwind CSS
⚡ Vite
🗄️ SQLite / MySQL

---
git clone https://github.com/ferrerolan/NutriFlow.git
cd NutriFlow

composer install
cp .env.example .env
php artisan key:generate

php artisan migrate --seed

npm install
npm run dev

php artisan serve

---

URL: http://127.0.0.1:8000/admin

Email: admin@nutriflow.local
Senha: 12345678

---

+ CRUD completo
+ Relações entre entidades
+ Factories e seeders
+ Dashboard inicial
- IA integrada
- Chatbot ativo
- Deploy em produção

---


## ✨ Sobre o Projeto

O **NutriFlow** é uma plataforma de gestão nutricional que centraliza dados, automatiza processos e prepara o ambiente para integração com **IA e chatbots**.

💡 A ideia é transformar o acompanhamento nutricional em uma experiência digital, inteligente e escalável.

---

## 🧠 Conceito do Sistema

```mermaid
flowchart LR
    A[Paciente] --> B[Cadastro]
    B --> C[Mensurações]
    B --> D[Plano Alimentar]
    B --> E[Treinos]
    C --> F[Dashboard Inteligente]
    D --> F
    E --> F
    F --> G[Bot NutriFlow 🤖]
    G --> H[Automação e Insights]
