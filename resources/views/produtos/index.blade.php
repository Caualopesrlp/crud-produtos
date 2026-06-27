@extends('layouts.app')

@section('title', 'Lista de Produtos')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="mb-0">Produtos</h1>

    <a href="{{ route('produtos.create') }}" class="btn btn-primary">
        + Novo Produto
    </a>
</div>

<form method="GET" action="{{ route('produtos.index') }}" class="mb-3">

    <div class="row g-2 align-items-center">

        <div class="col">
            <input type="text"
                name="search"
                class="form-control"
                value="{{ request('search') }}"
                placeholder="Buscar produto...">
        </div>

        <div class="col-auto">
            <select name="sort" class="form-select" onchange="this.form.submit()">
                <option value="nome" {{ request('sort') == 'nome' ? 'selected' : '' }}>
                    Nome
                </option>
                <option value="preco" {{ request('sort') == 'preco' ? 'selected' : '' }}>
                    Preço
                </option>
            </select>
        </div>

        <div class="col-auto">
            <button class="btn btn-primary" type="submit">
                Buscar
            </button>
        </div>

        <div class="col-auto">
            <a href="{{ route('produtos.index') }}" class="btn btn-secondary">
                Limpar
            </a>
        </div>

    </div>

</form>

<div class="card shadow-sm">

    <div class="card-body">

        <table class="table table-hover align-middle mb-0">

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
                        {{ \Illuminate\Support\Str::limit($produto->descricao, 40) }}
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

        <div class="d-flex justify-content-center mt-3">
            {{ $produtos->appends(request()->query())->links() }}
        </div>

    </div>
</div>

@endsection