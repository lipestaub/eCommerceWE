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
        error: function(){
            alert('Ocorreu um erro ao inserir o produto no carrinho. Tente novamente.');
        }
    });
}

function removeProduct(productId) {
    if (confirm('Você realmente deseja remover o produto do carrinho?')) {
        $.ajax({
            url: '/remove-product',
            type: 'POST',
            data: {productId: productId},
            error: function() {
                alert('Ocorreu um erro ao remover o produto do carrinho. Tente novamente.');
            }
        });
    }
}

function updateQuantity(productId, changeValue) {
    const quantityElement = document.getElementById('quantity-' + productId);
    const newQuantity = parseInt(quantityElement.innerText) + parseInt(changeValue);

    if (newQuantity === 0) {
        removeProduct(productId);
        return;
    }

    $.ajax({
        url: '/update-quantity',
        type: 'POST',
        data: {
            productId: productId,
            quantity: newQuantity
        },
        success: function() {
            quantityElement.innerText = newQuantity;
            location.reload();
        },
        error: function() {
            alert('Ocorreu um erro ao atualizar a quantidade do produto do carrinho. Tente novamente.');
        }
    });
}