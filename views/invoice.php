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
        <table>
            <tr>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Subtotal</th>
            </tr>
            <?php foreach ($products as $productId => $product) { ?>
                <tr>
                    <td>
                        <span><?php echo $product['description']; ?></span>
                    </td>
                    <td>
                        <span>R$ <?php echo number_format($product['price'], 2, ',', '.'); ?></span>
                    </td>
                    <td>
                    <span><?php echo $product['quantity']; ?></span>
                    </td>
                    <td>
                        <td>
                            <span>R$ <?php echo number_format($product['subtotal'], 2, ',', '.'); ?></span>
                        </td>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </main>
</body>
</html>