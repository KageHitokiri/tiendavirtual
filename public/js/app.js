function confirmEmptyCart(){
    if (confirm("¿Seguro que quiere vaciar el carrito?")) {
        return true;
    } else {
        return false;
    }
}