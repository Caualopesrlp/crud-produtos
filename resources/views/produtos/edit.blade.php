@extends('layouts.app')

@section('title', 'Editar Produto')

@section('content')

<h1 class="mb-4">Editar Produto</h1>

<div class="card shadow-sm">
    <div class="card-body">

        <form method="POST" action="{{ route('produtos.update', $produto->id) }}">
            @csrf
            @method('PUT')

            {{-- Nome --}}
            <div class="mb-3">
                <label class="form-label">Nome</label>

                <input
                    type="text"
                    name="nome"
                    value="{{ old('nome', $produto->nome) }}"
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
                    value="{{ old('preco', $produto->preco) }}"
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
                >{{ old('descricao', $produto->descricao) }}</textarea>

                @error('descricao')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Botões --}}
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    Atualizar
                </button>

                <a href="{{ route('produtos.index') }}" class="btn btn-secondary">
                    Voltar
                </a>
            </div>

        </form>

    </div>
</div>

@endsection