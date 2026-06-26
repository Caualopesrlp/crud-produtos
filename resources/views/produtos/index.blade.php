<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Produtos</title>
</head>

<body>
    <h1>Lista de Produtos</h1>

<a href="{{ route('produtos.create') }}">Novo Produto</a>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="8">
    <tr>
        <th>Nome</th>
        <th>Preço</th>
        <th>Descrição</th>
        <th>Ações</th>
    </tr>

    @foreach($produtos as $produto)
        <tr>
            <td>{{ $produto->nome }}</td>
            <td>{{ $produto->preco }}</td>
            <td>{{ $produto->descricao }}</td>
            <td>
                <a href="{{ route('produtos.edit', $produto->id) }}">Editar</a>

                <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
</body>

</html>