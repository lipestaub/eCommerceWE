<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="application/javascript" src="../public/javascript/script.js"></script>
</head>
<body>
    <header>
        <h1>Produtos</h1>
        <a href="/sign-out">Sair</a>
        <a href="/shopping-cart">Carrinho</a>
    </header>
    <main>
        <?php foreach($products as $productId => $product) { ?>
            <div>
                <img src="<?php echo $product['image']; ?>" alt="imagem do produto" height="100" width="100">
                <span><?php echo $product['description']; ?></span>
                <span>R$ <?php echo number_format($product['price'], 2, ',', '.'); ?></span>
                <button onclick="addProduct('<?php echo $productId; ?>');">Comprar</button>
            </div>
        <?php } ?>
    </main>
    <div>
        
    </div>
</body>
</html>