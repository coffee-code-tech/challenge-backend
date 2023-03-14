<?php
/**
 * Layout: layouts/challange.php
 *
 * @package CoffeeCodeChallange
 */

?>
<div class="coffee_code_challange__view container">
	<div class="box">
		<form id="listarProdutosForm">
			<div class="field is-horizontal">
				<div class="field-label is-normal">
					<label class="label">Parâmetros de busca</label>
				</div>
				<div class="field-body">
					<div class="field is-narrow">
						<div class="control">
							<div class="select is-fullwidth">
								<select name="order">
									<option value='asc'>Asc</option>
									<option selected value='desc'>Desc</option>
								</select>
							</div>
						</div>
					</div>
					<div class="field is-narrow">
						<div class="control">
							<div class="select is-fullwidth">
							<select name="orderBy">
								<option value='date'>Data</option>
								<option value='id'>ID</option>
								<option value='title'>Título</option>
								<option selected value='price'>Preço</option>
							</select>
							</div>
						</div>
					</div>
					<div class="field">
						<p class="control is-one-quarter">
							<input class="input" name="perPage" type="number" step="5"  placeholder="5" value="5" min="5">
						</p>
					</div>
					<div class="field">
						<div class="control">
							<button class="button is-primary">
							Buscar
							</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
	<nav id="pagination" class="pagination is-centered is-small is-rounded" role="navigation" aria-label="pagination">
		<a class="pagination-previous">Anterior</a>
		<a class="pagination-next">Próxima</a>
		<ul class="pagination-list">
		</ul>
	</nav>
	<progress id="loading" class="progress is-small is-primary" max="100">0%</progress>
	<div id='content'>
		<div class="columns is-multiline is-mobile"></div>
	</div>
</div>
