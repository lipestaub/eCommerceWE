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
        url: '/add-product',
        type: 'POST',
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
    if (confirm('Você realmente deseja remover o produto do carrinho?')) {
        $.ajax({
            url: '/remove-product',
            type: 'POST',
            data: {productId: productId},
            success: function() {
                alert('Produto removido do carrinho!');
                location.reload();
            },
            error: function() {
                alert('Erro ao remover o produto do carrinho!');
            }
        });
    }
}

function updateQuantity(productId, change) {
    var quantityElement = document.getElementById('quantity-' + productId);
    var currentQuantity = parseInt(quantityElement.innerText);
    var newQuantity = currentQuantity + change;

    if (newQuantity >= 1) {
        quantityElement.innerText = newQuantity;

        $.ajax({
            url: '/update-quantity',
            type: 'POST',
            data: {
                productId: productId,
                quantity: newQuantity
            },
            success: function() {
                location.reload();
            },
            error: function() {
                alert('Erro ao atualizar a quantidade do produto!');
            }
        });
    } else if (newQuantity === 0) {
        removeProduct(productId);
    }
}