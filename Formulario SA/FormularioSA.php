<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 90%;
            max-width: 1000px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: center;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .mensagem {
            text-align: center;
            color: #888;
            font-size: 18px;
            margin-top: 40px;
        }
    </style>
</head>
<body>

<?php
session_start();

if (
    isset($_GET['tipo1']) &&
    isset($_GET['voltagem1']) &&
    isset($_GET['marca1']) &&
    isset($_GET['qtda1']) &&
    isset($_GET['preco1']) &&
    isset($_GET['data1'])
) {
    // Cria um novo produto
    $novoProduto = [
        'tipo1' => $_GET['tipo1'],
        'voltagem1' => $_GET['voltagem1'],
        'marca1' => $_GET['marca1'],
        'qtda1' => $_GET['qtda1'],
        'preco1' => $_GET['preco1'],
        'data1' => $_GET['data1'],
    ];

    // Adiciona ao array de sessão
    $_SESSION['produtos'][] = $novoProduto;
}

// Recupera os produtos armazenados
$produtos = $_SESSION['produtos'] ?? [];
?>

<h1>Dados dos Produtos</h1>

<?php if (count($produtos) > 0): ?>
    <table>
        <tr>
            <th>Tipo</th>
            <th>Voltagem</th>
            <th>Marca</th>
            <th>Quantidade</th>
            <th>Preço</th>
            <th>Data de validade</th>
        </tr>
        <?php foreach ($produtos as $produto): ?>
            <tr>
                <td><?= htmlspecialchars($produto['tipo1']) ?></td>
                <td><?= htmlspecialchars($produto['voltagem1']) ?></td>
                <td><?= htmlspecialchars($produto['marca1']) ?></td>
                <td><?= htmlspecialchars($produto['qtda1']) ?></td>
                <td><?= htmlspecialchars($produto['preco1']) ?></td>
                <td><?= htmlspecialchars($produto['data1']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p class="mensagem">Nenhum produto registrado ainda.</p>
<?php endif; ?>

</body>
</html>
