
async function getProducts() {
    let url = 'http://localhost/tester/wp-json/myapp/v1/products?paged=100,1';
    try {
        let res = await fetch(url);
        return await res.json();
    } catch (error) {
        console.log(error);
    }
}


async function renderProducts() {


    let products = await getProducts();

    let html = '';
    products.forEach(product => {
        let htmlSegment = `
                                <div class="single-product">
                                <a href="${product.productLink}">
                                    <img src="${product.imageURL}" >
                                    <h2>${product.title} </h2>
                                    </a>
                                </div>
                            `;

        html += htmlSegment;
    });

    let container = document.querySelector('.product-listing');
    container.innerHTML = html;
}

renderProducts();