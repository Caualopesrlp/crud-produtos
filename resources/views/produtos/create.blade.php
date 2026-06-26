<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
</head>

<body>
    <h1>Novo Produto</h1>

    <form method="POST" action="{{ route('produtos.store') }}">
        @csrf

        
        <div>
            <label>Nome do Produto</label><br>
            <input type="text" name="nome" value="{{ old('nome') }}">

            @error('nome')
            <small style="color:red">{{ $message }}</small>
            @enderror
        </div>

        <br>

        
        <div>
            <label>Preço</label><br>
            <input type="number" step="0.01" name="preco" value="{{ old('preco') }}">

            @error('preco')
            <small style="color:red">{{ $message }}</small>
            @enderror
        </div>

        <br>

        
        <div>
            <label>Descrição</label><br>
            <textarea name="descricao">{{ old('descricao') }}</textarea>

            @error('descricao')
            <small style="color:red">{{ $message }}</small>
            @enderror
        </div>

        <br>

        <button type="submit">Salvar</button>
    </form>
</body>

</html>