document.addEventListener("DOMContentLoaded", () => {
    const cartCountElement = document.querySelector(".icon-cart span");
    const addCartButtons = document.querySelectorAll(".addCart");

    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    const updateCartCount = () => {
        cartCountElement.textContent = cart.length;
    };

    const addToCart = (product) => {
        cart.push(product);
        localStorage.setItem("cart", JSON.stringify(cart));
        updateCartCount();
    };

    addCartButtons.forEach((button, index) => {
        button.addEventListener("click", () => {
            const product = {
                id: index + 1,
                name: button.closest(".item").querySelector("h3").textContent,
                price: button.closest(".row-in").querySelector(".item-price").textContent,
            };
            addToCart(product);
            alert(`${product.name} added to cart!`);
        });
    });

    updateCartCount();
});
