<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
</head>

<body>
    <h1>Editar Produto</h1>

    <form method="POST" action="{{ route('produtos.update', $produto->id) }}">
        @csrf
        @method('PUT')

        <div>
            <label>Nome</label><br>
            <input type="text" name="nome" value="{{ old('nome', $produto->nome) }}">

            @error('nome')
            <small style="color:red">{{ $message }}</small>
            @enderror
        </div>

        <br>

        <div>
            <label>Preço</label><br>
            <input type="number" step="0.01" name="preco"
                value="{{ old('preco', $produto->preco) }}">

            @error('preco')
            <small style="color:red">{{ $message }}</small>
            @enderror
        </div>

        <br>

        <div>
            <label>Descrição</label><br>
            <textarea name="descricao">{{ old('descricao', $produto->descricao) }}</textarea>

            @error('descricao')
            <small style="color:red">{{ $message }}</small>
            @enderror
        </div>

        <br>

        <button type="submit">Atualizar</button>
    </form>
</body>

</html>