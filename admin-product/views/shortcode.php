<?php
$request_console = wp_remote_get(site_url('wp-json/api/produtos'));
$produtos_console = $request_console['body'];

$request = wp_remote_get(site_url('wp-json/api/produtos/?paged=1'));
$variable = json_decode($request['body']);

?>

<div class="swc_container">
  <h2>Para ver o retorno em JSON abra o console e aperte F5.</h2>
  <?php

  $html = '';
  $i = 1;
  $card = '';
  //$cols = 3;
  switch ($cols) {
    case  1:
      $render_cout = 12;
      foreach ($variable as $key => $value) {

        $card .= '<div class="swc_row swc_mb-4">
                    <div class="swc_col-12"> 
                      <div class="swc_card">
                        <div class="zoom">
                          <img class="swc_card-img-top" src="' . $value->imageUrl . '" alt="Card image cap">
                        </div>
                        <div class="swc_card-body">
                          <h5 class="swc_card-title" style="height: 90px; text-align: center;">' . $value->title . ' <br> <strong style="color:blueviolet;"> R$' . number_format($value->price, 2, ',', '.') . '</strong></h5>
                          <div class="swc_card-text" style="height: 290px;">' . substr($value->description, 0, 140) . ' ...<br><a href="' . $value->productLink . '" target="_blank"> ver detalhes</a></div>
                          <p class="swc_card-text"><small class="swc_text-muted">ID: ' . $value->id . '</small></p>
                        </div>
                      </div>
                    </div>
                  </div>';
      }
      $html .=  $card;

      break;
    case  2:
      $render_cout = 6;
      foreach ($variable as $key => $value) {
        if ($i == 1) {
          $row = '<div class="swc_row swc_mb-4">';
          $f_row = '';
          $i++;
        } elseif ($i == 2) {
          $row = '';
          $f_row = '</div>';
          $i = 1;
        }

        $card .= $row .
          '<div class="swc_col-6"> 
              <div class="swc_card">
                <div class="zoom">
                  <img class="swc_card-img-top" src="' . $value->imageUrl . '" alt="Card image cap">
                </div>
                <div class="swc_card-body">
                  <h5 class="swc_card-title" style="height: 90px; text-align: center;">' . $value->title . ' <br> <strong style="color:blueviolet;"> R$' . number_format($value->price, 2, ',', '.') . '</strong></h5>
                    <div class="swc_card-text" style="height: 290px;">' . substr($value->description, 0, 140) . ' ...<br><a href="' . $value->productLink . '" target="_blank"> ver detalhes</a></div>
                    <p class="swc_card-text"><small class="swc_text-muted">ID: ' . $value->id . '</small></p>
                  </div>
                  </div>
                </div>' . $f_row;
      }
      $html .=  $card;

      break;

    case 3:
      $render_cout = 4;
      foreach ($variable as $key => $value) {
        if ($i == 1) {
          $row = '<div class="swc_row swc_mb-4">';
          $f_row = '';
          $i++;
        } elseif ($i == 2) {
          $row = '';
          $f_row = '';
          $i++;
        } elseif ($i == 3) {
          $row = '';
          $f_row = '</div>';
          $i = 1;
        }
        $card .= $row .
          '<div class="swc_col-4"> 
              <div class="swc_card">
                <div class="zoom">
                  <img class="swc_card-img-top" src="' . $value->imageUrl . '" alt="Card image cap">
                </div>
                <div class="swc_card-body">
                <h5 class="swc_card-title" style="height: 90px; text-align: center;">' . $value->title . ' <br> <strong style="color:blueviolet;"> R$' . number_format($value->price, 2, ',', '.') . '</strong></h5>
                  <div class="swc_card-text" style="height: 290px;">' . substr($value->description, 0, 140) . ' ...<br><a href="' . $value->productLink . '" target="_blank"> ver detalhes</a></div>
                  <p class="swc_card-text"><small class="swc_text-muted">ID: ' . $value->id . '</small></p>
                </div>
              </div>
          </div>' . $f_row;
      }
      $html .=  $card;
      break;

    case 4:
      $render_cout = 3;
      foreach ($variable as $key => $value) {
        if ($i == 1) {
          $row = '<div class="swc_row swc_mb-4">';
          $f_row = '';
          $i++;
        } elseif ($i == 2 or $i == 3) {
          $row = '';
          $f_row = '';
          $i++;
        } elseif ($i == 4) {
          $row = '';
          $f_row = '</div>';
          $i = 1;
        }
        $card .= $row .
          '<div class="swc_col-3"> 
              <div class="swc_card">
                <div class="zoom">
                  <img class="swc_card-img-top" src="' . $value->imageUrl . '" alt="Card image cap">
                </div>
                <div class="swc_card-body">
                  <h5 class="swc_card-title" style="height: 90px; text-align: center;">' . $value->title . ' <br> <strong style="color:blueviolet;"> R$' . number_format($value->price, 2, ',', '.') . '</strong></h5>
                  <div class="swc_card-text" style="mx-height: 290px;">' . substr($value->description, 0, 140) . ' ...<br><a href="' . $value->productLink . '" target="_blank"> ver detalhes</a></div>
                  <p class="swc_card-text"><small class="swc_text-muted">ID: ' . $value->id . '</small></p>
                </div>
              </div>
            </div>' . $f_row;
      }
      $html .=  $card . '<div class="swc_row swc_mb-4" id="new-row" style="display:none;"></div>';
      break;
    default:
      $html .= '<a href="#"><p class="card-text">' . $variable . '</p></a>';
      break;
  }
  $html .= '</div>
            <button class="btn" id="bt" onClick="loader(2)" style="display: block; width: 100%; padding: 5px 10px; max-height: 40px; border-color: #b87fec; border-radius: 4px;  background-color: blueviolet; text-align: center; text-decoration: unset; color: white;">
              Carregar mais produtos
            </button>
            <script>
            function loader(paged){
              const url = "' . site_url() . '/wp-json/api/produtos/?paged="+paged;   
              alert("Ao clicar no botão você está fazendo uso da rota personalizada com o parametro PAGED: " + url);
              var divAntiga = document.getElementById("new-row");  
              var btMore = document.getElementById("bt");       
              var divNova = document.createElement("div");
              divNova.className = "swc_row swc_mb-' . $cols . '";


              fetch(url)
              .then(response => response.json())
              .then(data => { data.forEach(objeto => {

                  const novoParagrafo = document.createElement("div");
                  novoParagrafo.className = "swc_col-' . $render_cout . '";
                  novoParagrafo.innerHTML = `<div class="swc_card">
                    <div class="zoom">
                      <img class="swc_card-img-top" src="${objeto.imageUrl}" alt="Card image cap">
                    </div>
                    <div class="swc_card-body">
                      <h5 class="swc_card-title" style="height: 90px; text-align: center;">${objeto.title}<br> <strong style="color:blueviolet;"> R$${objeto.price.toLocaleString(`pt-br`, {minimumFractionDigits: 2})},00</strong></h5>
                      <div class="swc_card-text" style="mx-height: 290px;"> ${objeto.description.slice(0, 140)} ...<br><a href="${objeto.productLink}" target="_blank"> ver detalhes</a></div>
                      <p class="swc_card-text"><small class="swc_text-muted">ID: ${objeto.id}</small></p>
                    </div>
                  </div>`;
                    
                     
                    divNova.appendChild(novoParagrafo);
                  });
                  divAntiga.parentNode.replaceChild(divNova, divAntiga);
                  
                })
              
              .catch(error => {
                console.error("Ocorreu um erro:", error);
              });
              

              
              btMore.style.display = "none";
              
            }
            
            console.log(' . $produtos_console . ')</script>';
  echo $html;

  ?>

</div>