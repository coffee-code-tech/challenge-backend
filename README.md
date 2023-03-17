# WordPress Backend Challenge

## Desafio para programadores backend em WordPress na CoffeeCode.

**Endpoint**
O endpoint para consulta utilizando o parametro paged é o seguinte:

http://localhost/wp-json/myapp/v1/products?paged=1,1 (itens por página, página)

Produzirá um resultado como este:

```
{
    id: 123,
    title: "Product Title",
    description: "Description",
    price: "10.00",
    type: "simple",
    imageUrl: "https://challenge.homolog.tech/product1.jpg",
    productLink: "https://challenge.homolog.tech/product/product1",
}
```

Obs: sem o parametro paged, irá trazer a quantidade padrão de 10 itens

**Especifícações:**

✅ Criar uma rota personalizada com um parametro `paged` (opcional);
✅ Busque pelos produtos usando as rotas do Woocommerce no site [challenge.homolog.tech](https://challenge.homolog.tech/);
✅ Retorne o resultado em formato `JSON`;
✅ De preferencia utilizando o [WP Emerge Plugin](https://docs.wpemerge.com/#/starter/plugin/quickstart).

- Criar uma página no frontend que use a rota personalizada via javascript.
