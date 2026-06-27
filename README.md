# CRUD de Cadastro de Produtos - Laravel

Projeto simples de CRUD para cadastro de produtos desenvolvido com Laravel, com foco em aprendizado prático de arquitetura e boas práticas.

---

## 📌 Funcionalidades

- Cadastro de produtos
- Listagem com paginação
- Busca por nome
- Ordenação por nome e preço
- Edição de produtos
- Exclusão de produtos
- Validação com Form Requests

---

## 🧱 Arquitetura

O projeto foi estruturado com separação de responsabilidades:

- Controllers
- Services
- Repositories
- Form Requests

---

## ⚙️ Tecnologias

- Laravel 12
- PHP 8+
- Blade
- MySQL / SQLite

---

## 🚀 Como rodar o projeto

```bash
git clone https://github.com/Caualopesrlp/crud-produtos.git
cd crud-produtos

composer install
cp .env.example .env
php artisan key:generate

php artisan migrate --seed

php artisan serve