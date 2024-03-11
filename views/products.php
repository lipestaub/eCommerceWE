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
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <header>
        <img class="square" src="/../public/images/Blue Square.png" alt="blue square" width ="150%" height = "160px">
        <span class="centralize title">Produtos</span>
        <div id="header">
            <a class="headerLeft" href="/sign-out">< Sair</a>
            
            <a class="headerRight" href="/shopping-cart">Carrinho ></a>
        </div>
    </header>
    <main>
        <?php foreach($products as $productId => $product) { ?>
            <div class="container">
                <img src="<?php echo $product['image']; ?>" alt="imagem do produto" height="100" width="100">
                <span class="info"><?php echo $product['description']; ?></span>
                <span class="info">R$ <?php echo number_format($product['price'], 2, ',', '.'); ?></span>
                <button class="buy" onclick="addProduct('<?php echo $productId; ?>');">Comprar</button>
            </div>
        <?php } ?>
    </main>
    <div>
        
    </div>
</body>
</html>