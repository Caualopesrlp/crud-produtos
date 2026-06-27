@extends('layouts.app')

@section('title', 'Cadastrar Produto')

@section('content')

<h1 class="mb-4">Cadastrar Produto</h1>

<div class="card shadow-sm">
    <div class="card-body">

        <form method="POST" action="{{ route('produtos.store') }}">
            @csrf

            {{-- Nome --}}
            <div class="mb-3">
                <label class="form-label">Nome</label>

                <input
                    type="text"
                    name="nome"
                    value="{{ old('nome') }}"
                    class="form-control @error('nome') is-invalid @enderror"
                >

                @error('nome')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Preço --}}
            <div class="mb-3">
                <label class="form-label">Preço</label>

                <input
                    type="number"
                    step="0.01"
                    name="preco"
                    value="{{ old('preco') }}"
                    class="form-control @error('preco') is-invalid @enderror"
                >

                @error('preco')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Descrição --}}
            <div class="mb-3">
                <label class="form-label">Descrição</label>

                <textarea
                    name="descricao"
                    class="form-control @error('descricao') is-invalid @enderror"
                >{{ old('descricao') }}</textarea>

                @error('descricao')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Botões --}}
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    Salvar
                </button>

                <a href="{{ route('produtos.index') }}" class="btn btn-secondary">
                    Voltar
                </a>
            </div>

        </form>

    </div>
</div>

@endsection