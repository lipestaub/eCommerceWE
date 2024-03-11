<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="application/javascript" src="../public/javascript/script.js"></script>
</head>
<body>
    <header>
        <h1>Carrinho (<span><?php echo $productsNumber; ?></span>)</h1>
    </header>
    <main>
        <table>
            <tr>
                <th></th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Subtotal</th>
                <th></th>
            </tr>
            <?php foreach ($products as $productId => $product) { ?>
                <tr>
                    <td>
                        <img src="<?php echo $product['image']; ?>" alt="imagem do produto" height="100" width="100">
                    </td>
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
                            <span>R$ <?php echo number_format(floatval($product['price']) * $product['quantity'], 2, ',', '.'); ?></span>
                        </td>
                    </td>
                    <td>
                        <button onclick="removeProduct('<?php echo $productId; ?>');">Remover produto</button>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </main>
    <span>Valor Total: <?php echo number_format($total, 2, ',', '.'); ?></span>
</body>
</html>