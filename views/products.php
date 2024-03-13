<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>

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
        <span class="centralize title">Produtos</span>
        <div id="header">
            <a class="headerLeft" href="/sign-out"> <i class="fa-solid fa-right-from-bracket"></i> Sair</a>
            <a class="headerRight" href="/shopping-cart">Carrinho <i class="fa-solid fa-cart-shopping"></i></a>
        </div>
    </header>
    <main>
        <div class="container">
            <?php
                 foreach($products as $productId => $product) {
                    $product = unserialize($product);
            ?>
                    <div class="class">
                        <img class="border" src="<?= $product->getImage(); ?>" alt="imagem do produto" height="200" width="200">
                        <div class="info"><?= $product->getDescription(); ?></div>
                        <div class="info">R$ <?= number_format($product->getPrice(), 2, ',', '.'); ?></div>
                        <button class="buy" onclick="addProduct('<?= $productId; ?>');">Comprar</button>
                    </div>
            <?php } ?>
        </div>
    </main>
</body>
</html>