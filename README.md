# WordPress Backend Challenge
## Desafio para programadores backend em WordPress na CoffeeCode.

**Introdução**

Desenvolva um Plugin em WordPress usando o boilerplate do [WP Emerge](https://docs.wpemerge.com/#/starter/plugin/quickstart) que crie uma [rota personalizada](https://developer.wordpress.org/rest-api/extending-the-rest-api/adding-custom-endpoints/) que aceite pelo menos os paramentro `paged` que busque e liste os produtos em ordem de preço crescente, paginando de 5 em 5 e retorne o resultado como `JSON`, na seguinte estrutura:
```
{
    id: 123,
    title: "Product Title",
    description: "Description",
    price: "10.00",
    currency: "USD".
    imageUrl: "https://challenge.homolog.tech/product1.jpg",
    productLink: "https://challenge.homolog.tech/product1",
}
```

**Especifícações:**

* Criar uma rota personalizada com um parametro `paged` (opcional);
* Busque pelos produtos usando as rotas do Woocommerce no site [challenge.homolog.tech](https://challenge.homolog.tech/);
* Retorne o resultado em formato `JSON`;
* De preferencia utilizando o [WP Emerge Plugin](https://docs.wpemerge.com/#/starter/plugin/quickstart).

**Instruções**

1. Efetue o fork deste repositório e crie um branch com o seu nome e sobrenome. (exemplo: fulano-dasilva)
2. Após finalizar o desafio, crie um Pull Request.
3. Aguarde algum contribuidor realizar o code review.

**Extra**

Opcional
1. Criar uma página no frontend que usando a rota personalizada via javascript.

**Pré-requisitos**

* PHP >= 8.1
* Orientado a objetos

**Dúvidas**

> Em caso de dúvidas, crie uma issue.
