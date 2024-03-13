<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Fiscal</title>
</head>
<body>
    <header>
        <h1>Nota Fiscal</h1>
    </header>
    <main>
        <div>
            <span>Nome: <?= $user->getName(); ?></span>
            <span>CPF: <?= $user->getCpf(); ?></span>
        </div>
        <table>
            <tr>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Subtotal</th>
            </tr>
            <?php
                foreach ($products as $productId => $product) { ?>
                    <tr>
                        <td>
                            <span><?= $product->getDescription(); ?></span>
                        </td>
                        <td>
                            <span>R$ <?= number_format($product->getPrice(), 2, ',', '.'); ?></span>
                        </td>
                        <td>
                        <span><?= $product->getQuantity(); ?></span>
                        </td>
                        <td>
                            <span>R$ <?= number_format($product->getSubtotal(), 2, ',', '.'); ?></span>
                        </td>
                </tr>
            <?php } ?>
        </table>
        <br>
        <span>Valor Total: R$ <?= number_format($total, 2, ',', '.'); ?></span>
    </main>
</body>
</html>