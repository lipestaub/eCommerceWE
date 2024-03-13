<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Fiscal</title>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-KrIt9QyEXCP7CQ2VqU3VjbqVd3BBj3i1pVIei7EX27E34QHmp4IaVxZpdHDf9IvzTK7BA7y1RrDU+OaXYbWv9g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" type="text/css" href="../public/fontawesome-free-6.5.1-web/css/all.min.css">

</head>
<body>
    <header>
        <img src="../public/images/Blue Square.png" alt="blue square" width="100%" height = "160px">
        <span class="centralize title">Nota Fiscal </span>
        <div id="header">
            <a class="headerLeft" href="/products"><i class="fa-solid fa-house" style="color: #ffffff;"></i> Produtos</a>
        </div>
    </header>
    <main>
        <div>
            <span class="descriptionCart">Nome: <span class="total"><?= $user->getName(); ?></span></span>
            <span class="descriptionCart">CPF: <span class="total"><?= $user->getCpf(); ?></span></span>
        </div>
        <table class="centralize">
            <tr class="descriptionCart">
                <th>Descrição</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Subtotal</th>
            </tr>
            <?php
                foreach ($products as $productId => $product) { ?>
                    <tr class="info">
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
        <span class="descriptionCart">Valor Total: <span class="total">R$ <?= number_format($total, 2, ',', '.'); ?></span></span>
    </main>
</body>
</html>