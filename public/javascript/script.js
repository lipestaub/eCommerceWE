function validateSignInFields(event) {
    const email = document.getElementById('email').value;
    const cpf = document.getElementById('cpf').value;

    if (email.trim() === '' || cpf.trim() === '') {
        alert('Preencha todos os campos.');
        event.preventDefault();
        return false;
    }
    
    return true;
}

function addProduct(productId) {
    $.ajax({
        url: "/add-product",
        type: "POST",
        data: {productId: productId},
        success: function(){
            alert('Produto inserido no carrinho!');
        },
        error: function(){
            alert('Erro ao inserir o produto no carrinho!');
        }
    });
}

function removeProduct(productId) {
    $.ajax({
        url: "/remove-product",
        type: "POST",
        data: {productId: productId},
        success: function(){
            alert('Produto removido do carrinho!');
            location.reload();
        },
        error: function(){
            alert('Erro ao remover o produto do carrinho!');
        }
    });
}

function updateQuantity(productId) {
    $.ajax({
        url: "/update-quantity",
        type: "POST",
        data: {productId: productId},
        success: function(){
            alert('Produto removido do carrinho!');
            location.reload();
        },
        error: function(){
            alert('Erro ao remover o produto do carrinho!');
        }
    });
}