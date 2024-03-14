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
            <a class="headerLeft" href="/products">Produtos <i class="fa-solid fa-house" style="color: #ffffff;"></i></a>
            <a class="headerRight" href="">Limpar</a>
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
                            <span class="cart"><?= $product->getDescription(); ?></span>
                        </td>
                        <td>
                            <span class="cart">R$ <?= number_format($product->getPrice(), 2, ',', '.'); ?></span>
                        </td>
                        <td>
                            <div class="cart quantity">
                                <button class="buttonQuantity" onclick="updateQuantity('<?= $productId; ?>', -1)"><i class="fa-solid fa-minus" style="color: #ffffff;"></i></button>
                                <span class="cart" id="quantity-<?= $productId; ?>"><?= $product->getQuantity(); ?></span>
                                <button class="buttonQuantity" onclick="updateQuantity('<?= $productId; ?>', 1)"><i class="fa-solid fa-plus" style="color: #ffffff;"></i></button>
                            </div>
                        </td>
                        <td>
                            <span class="cart">R$ <?= number_format($product->getSubtotal(), 2, ',', '.'); ?></span>
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
            <span class="centralize emptyCart">Carrinho vazio.</span>
        <?php } ?>
        <div class="space"></div>
    </main>
    <footer>
        <p>Desenvolvido por <a href="https://github.com/CaioBalc" target="_blank" rel="noopener noreferrer">Caio Balczarek</a> e <a href="https://github.com/lipestaub" target="_blank" rel="noopener noreferrer">Felipe Ariel Staub</a></p>
    </footer>
</body>
</html>