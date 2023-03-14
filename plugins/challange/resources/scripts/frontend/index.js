// eslint-disable-next-line no-unused-vars
import config from '@config';
import './vendor/*.js';
import '@styles/frontend';
import './spritesvg';

(($) => {
    $(document).ready(() => {
        const $elPaginacao = $("#pagination");
        let produtos = [];
        let currPage = 1;

        $elPaginacao.children('.pagination-previous').on('click', () => {
            if (currPage > 1) {
                currPage--;
                buscarProdutos((resp) => {
                    produtos = resp;
                },
                () => {
                    alert('Something is not OK, please call emergency !!!')
                })
            }
        })

        $elPaginacao.children('.pagination-next').on('click', () => {
            if (currPage < produtos.totalPages) {
                currPage++;
                buscarProdutos((resp) => {
                    produtos = resp;
                },
                () => {
                    alert('Something is not OK, please call emergency !!!')
                })
            }
        })

        const buscarProdutos = (resolve, error, resetPage) => {
            $.ajax({
                url: '/wp-admin/admin-ajax.php',
                type: 'get',
                beforeSend: () => {
                    $('#content').hide();
                    $('#loading').show();
                },
                data: { 
                    action: 'listar_produtos',
                    'per_page': $('[name=perPage').val(),
                    'order': $('[name=order').val(),
                    'orderby': $('[name=orderBy]').val(),
                    'page': resetPage || currPage
                },
                complete: () => {
                    $('#loading').hide();
                    $('#content').show();
                    exibirPaginacao();
                    exibirProdutos();
                },
                success: resolve,
                error: error
            })
        }

        const esconderPaginacao = () => {
            $elPaginacao.hide();
        }

        const exibirPaginacao = () => {
            if (produtos.data && produtos.data.length > 0) {
                const listaPaginas = $elPaginacao.children('.pagination-list');
                listaPaginas.empty();
                for (let i=0; i < produtos.totalPages; i++) {
                    listaPaginas.append(`<li><a class="pagination-link ${currPage == (i+1) ? 'is-current' : ''}" aria-label="Página ${i+1}" aria-current="page">${i+1}</a></li>`);
                }

                $elPaginacao.show();
                return;
            }
            esconderPaginacao()
        }

        const exibirProdutos = () => {
            $('#content .columns').empty();
            if (produtos.data && produtos.data.length > 0) {
                for (const produto of produtos.data) {
                    $('#content .columns').append(`
                        <div class="column is-one-third">
                            <div class="block">
                                <article class="media">
                                    <figure class="media-left">
                                        <p class="image is-64x64">
                                        <img src="${produto.imageUrl}">
                                        </p>
                                    </figure>
                                    <div class="media-content">
                                        <div class="content">
                                        <p>
                                            <strong>${produto.title}</strong> <small>${produto.type}</small> <small>R$ ${produto.price}</small>
                                            <br>
                                            ${produto.description}
                                        </p>
                                        <p>
                                            <a class="button is-link" rel="norefereer noopener" href="${produto.productLink}" target="_blank">Visitar</a> 
                                        </p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    `)
                }
            }
        }

        $("#listarProdutosForm").on('submit', (e) => {
            e.preventDefault();

            esconderPaginacao();

            buscarProdutos((resp) => {
                currPage = 1;
                produtos = resp;
            },
            () => {
                alert('Something is not OK, please call emergency !!!')
            }, 
            1)

            return false;
        })

        $('#loading').hide();
        esconderPaginacao();
    })
})(jQuery)