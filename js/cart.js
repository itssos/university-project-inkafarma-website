const btnCart = document.querySelector('.container-cart-icon');
const containerCartProducts = document.querySelector(
    '.container-cart-products'
);


btnCart.addEventListener('click', () => {
    containerCartProducts.classList.toggle('hidden-cart');
});



/* ========================= */
const cartInfo = document.querySelector('.cart-product');
const rowProduct = document.querySelector('.row-product');

// Lista de todos los contenedores de productos
const productsList = document.querySelector('.container-items');

// Variable de arreglos de Productos
let allProducts = [];

const valorTotal = document.querySelector('.total-pagar');

const countProducts = document.querySelector('#contador-productos');

const cartEmpty = document.querySelector('.cart-empty');
const cartTotal = document.querySelector('.cart-total');

productsList.addEventListener('click', e => {
    if (e.target.classList.contains('btn-add-cart')) {
        const product = e.target.parentElement;

        const infoProduct = {
            quantity: 1,
            title: product.querySelector('h5').textContent,
            price: product.querySelector('p').textContent,
        };

        const exits = allProducts.some(
            product => product.title === infoProduct.title
        );

        if (exits) {
            const products = allProducts.map(product => {
                if (product.title === infoProduct.title) {
                    product.quantity++;
                    return product;
                } else {
                    return product;
                }
            });
            allProducts = [...products];
        } else {
            allProducts = [...allProducts, infoProduct];
        }

        showHTML();
    }
});

rowProduct.addEventListener('click', e => {
    if (e.target.classList.contains('icon-close')) {
        const product = e.target.parentElement;
        const title = product.querySelector('p').textContent;

        allProducts = allProducts.filter(
            product => product.title !== title
        );

        console.log(allProducts);

        showHTML();
    }
});

// Funcion para mostrar  HTML
const showHTML = () => {
    if (!allProducts.length) {
        cartEmpty.classList.remove('hidden');
        rowProduct.classList.add('hidden');
        cartTotal.classList.add('hidden');
    } else {
        cartEmpty.classList.add('hidden');
        rowProduct.classList.remove('hidden');
        cartTotal.classList.remove('hidden');
    }

    // Limpiar HTML
    rowProduct.innerHTML = '';

    let total = 0;
    let totalOfProducts = 0;

    // Obtener la fecha actual
    const fechaActual = new Date();
    const year = fechaActual.getFullYear();
    const month = String(fechaActual.getMonth() + 1).padStart(2, '0'); // Agregar ceros a la izquierda si es necesario
    const day = String(fechaActual.getDate()).padStart(2, '0'); // Agregar ceros a la izquierda si es necesario

    // Formatear la fecha como "YYYY-MM-DD"
    const fechaFormateada = `${year}-${month}-${day}`;

    // Asignar la fecha al campo de entrada oculto
    document.querySelector('#fecha').value = fechaFormateada;

    // Calcular el total a pagar
    const totalPagar = allProducts.reduce((total, product) => {
        return total + parseFloat(product.quantity) * parseFloat(product.price.slice(2));
    }, 0);

    // Generar la cadena con los productos y cantidades
    const cadenaProductos = allProducts.map(product => {
        return `${product.quantity} ${product.title}`;
    }).join(',');

    // Asignar los valores a los campos de entrada ocultos
    document.querySelector('#total').value = totalPagar.toFixed(2);
    document.querySelector('#venta_detalle').value = cadenaProductos;


    allProducts.forEach(product => {
        const containerProduct = document.createElement('div');
        containerProduct.classList.add('cart-product');

        containerProduct.innerHTML = `
            <div class="info-cart-product">
                <span class="cantidad-producto-carrito">${product.quantity}</span>
                <p class="titulo-producto-carrito">${product.title}</p>
                <span class="precio-producto-carrito">${product.price}</span>
            </div>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="icon-close"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 18L18 6M6 6l12 12"
                    />
                </svg>
        `;

        rowProduct.append(containerProduct);

        total = total + parseFloat(product.quantity * product.price.slice(2));
        totalOfProducts = totalOfProducts + product.quantity;

    });

    valorTotal.innerText = `s/${total}`;
    countProducts.innerText = totalOfProducts;
};
