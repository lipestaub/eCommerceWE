<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="application/javascript" src="../public/javascript/script.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-KrIt9QyEXCP7CQ2VqU3VjbqVd3BBj3i1pVIei7EX27E34QHmp4IaVxZpdHDf9IvzTK7BA7y1RrDU+OaXYbWv9g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" type="text/css" href="../public/fontawesome-free-6.5.1-web/css/all.min.css">
</head>
<body>
    <header>
        <img src="../public/images/Blue Square.png" alt="blue square" width="100%" height = "160px">
        <span class="centralize title">Carrinho </span>
    </header>
    <main>
        <table>
            <tr>
                <th></th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Subtotal</th>
            </tr>
            <?php foreach ($products as $productId => $product) { ?>
                <tr>
                    <td>
                        <img class="border" src="<?php echo $product['image']; ?>" alt="imagem do produto" height="100" width="100">
                    </td>
                    <td>
                        <span><?php echo $product['description']; ?></span>
                    </td>
                    <td>
                        <span>R$ <?php echo number_format($product['price'], 2, ',', '.'); ?></span>
                    </td>
                    <td>
                        <input type="number" name="quantity" id="quantity-<?php echo $productId; ?>" value="<?php echo $product['quantity']; ?>" min="1" oninput="updateQuantity('<?php echo $productId; ?>');">
                    </td>
                    <td>
                        <span>R$ <?php echo number_format($product['subtotal'], 2, ',', '.'); ?></span>
                    </td>
                    <td>
                        <button onclick="removeProduct('<?php echo $productId; ?>');">Remover produto</button>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <br>
        <span>Valor Total: <?php echo number_format($total, 2, ',', '.'); ?></span>
        <br>
        <br>
        <a href="/invoice">Finalizar Compra</a>
    </main>
</body>
</html>