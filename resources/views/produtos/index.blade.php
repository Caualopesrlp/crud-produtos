@extends('layouts.app')

@section('title', 'Lista de Produtos')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="mb-0">Produtos</h1>

    <a href="{{ route('produtos.create') }}" class="btn btn-primary">
        + Novo Produto
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">

        <table class="table table-hover mb-0 align-middle">

            <thead class="table-dark">
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Descrição</th>
                    <th width="180">Ações</th>
                </tr>
            </thead>

            <tbody>

                @forelse($produtos as $produto)
                <tr>
                    <td>{{ $produto->nome }}</td>

                    <td>
                        R$ {{ number_format($produto->preco, 2, ',', '.') }}
                    </td>

                    <td>
                        {{ Str::limit($produto->descricao, 40) }}
                    </td>

                    <td class="d-flex gap-2">

                        <a href="{{ route('produtos.edit', $produto->id) }}"
                            class="btn btn-sm btn-warning">
                            Editar
                        </a>

                        <form action="{{ route('produtos.destroy', $produto->id) }}"
                            method="POST"
                            onsubmit="return confirm('Tem certeza que deseja excluir este produto?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-sm btn-danger">
                                Excluir
                            </button>

                        </form>

                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="4" class="text-center py-4">
                        Nenhum produto cadastrado
                    </td>
                </tr>
                @endforelse

            </tbody>

        </table>

    </div>
</div>

@endsection