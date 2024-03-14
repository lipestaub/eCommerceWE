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
    <script src="../public/javascript/script.js" type="application/javascript" defer></script>
    <title>Produtos</title>
</head>
<body>
    <header>
        <img src="../public/images/Blue Square.png" alt="retângulo azul" width="100%" height="160px">
        <span class="centralize title">Produtos</span>
        <div id="header">
            <a class="headerLeft" href="/shopping-cart">Carrinho <i class="fa-solid fa-cart-shopping"></i></a>
            <a class="headerRight" href="/sign-out">Sair <i class="fa-solid fa-right-from-bracket"></i></a>
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
                        <div class="price">R$ <?= number_format($product->getPrice(), 2, ',', '.'); ?></div>
                        <button class="buy" onclick="addProduct('<?= $productId; ?>');">Comprar</button>
                    </div>
            <?php } ?>
        </div>
        <div class="pagination">
            <a id="prev">&laquo;</a>
            <a id="pageNumber-1">1</a>
            <a id="pageNumber-2">2</a>
            <a id="pageNumber-3">3</a>
            <a id="pageNumber-4">4</a>
            <a id="pageNumber-5">5</a>
            <a id="next">&raquo;</a>
        </div>
    </main>
    <?php if (isset($_SESSION['page'])) { ?>
        <script>
            document.getElementById('pageNumber-' + <?= $_SESSION['page']; ?>).classList.add('active');
        </script>
    <?php } ?>
</body>
</html>