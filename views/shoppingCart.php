<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" integrity="sha512-KrIt9QyEXCP7CQ2VqU3VjbqVd3BBj3i1pVIei7EX27E34QHmp4IaVxZpdHDf9IvzTK7BA7y1RrDU+OaXYbWv9g==" crossorigin="anonymous" />
    <link href="../public/css/style.css" rel="stylesheet">
    <link href="../public/fontawesome-free-6.5.1-web/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../public/javascript/script.js" type="application/javascript"></script>
    <title>Carrinho</title>
</head>
<body>
    <header>
        <img src="../public/images/Blue Square.png" alt="retângulo azul" width="100%" height="160px">
        <span class="centralize title">Carrinho</span>
        <div id="header">
            <a class="headerLeft" href="/products"><i class="fa-solid fa-house" style="color: #ffffff;"></i> Produtos</a>
        </div>
    </header>
    <main>
        <?php if ($productsCount > 0) { ?>
            <span class="descriptionCart">Você possui <?= $productsCount ?> item(ns) no seu carrinho!</span>
            <table class="centralize">
                <tr class="descriptionCart">
                    <th></th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
                <?php foreach ($products as $productId => $product) { ?>
                    <tr class="info">
                        
                        <td>
                            <img class="border" src="<?= $product->getImage(); ?>" alt="imagem do produto" height="100" width="100">
                        </td>
                        <td>
                            <span><?= $product->getDescription(); ?></span>
                        </td>
                        <td>
                            <span>R$ <?= number_format($product->getPrice(), 2, ',', '.'); ?></span>
                        </td>
                        <td>
                            <div class="quantity">
                                <button class="buttonQuantity" onclick="updateQuantity('<?= $productId; ?>', -1)"><i class="fa-solid fa-minus" style="color: #ffffff;"></i></button>
                                <span id="quantity-<?= $productId; ?>"><?= $product->getQuantity(); ?></span>
                                <button class="buttonQuantity" onclick="updateQuantity('<?= $productId; ?>', 1)"><i class="fa-solid fa-plus" style="color: #ffffff;"></i></button>
                            </div>
                        </td>
                        <td>
                            <span>R$ <?= number_format($product->getSubtotal(), 2, ',', '.'); ?></span>
                        </td>
                        <td>
                            <button class="removeProduct" onclick="removeProduct('<?= $productId; ?>');">Remover produto</button>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <br>
            <span class="descriptionCart">Valor Total: <span class="total">R$ <?= number_format($total, 2, ',', '.'); ?></span></span>
            <br>
            <br>
            <a class="invoice" href="/invoice">Finalizar Compra</a>
        <?php } else { ?>
            <span>Carrinho vazio.</span>
        <?php } ?>
    </main>
</body>
</html>