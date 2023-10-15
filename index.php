<?php

/*
* Forma de uso:
* Invocar o arquivo exibe o status da NFe e NFCe da sefaz de todos os estados;
* Invocar com parâmetros de URL ?estado=PE&servico=nfe exibe status do respectivo estado e serviço.
* Exemplos:
* https://supptex.com.br/statussefaz/?estado=PE&servico=nfe
* https://supptex.com.br/statussefaz/?estado=AM&servico=nfce
* Consultas são realizadas no portal monitorsefaz.webmaniabr.com.
* Dependências: PHP 7.1 ou superior e simplehtmldom.sourceforge.io.
*/

$url_estado = strtolower($_GET['estado']);
$url_servico = strtolower($_GET['servico']);

include('./simple_html_dom.php');

$html = new simple_html_dom();

$html = file_get_html('https://monitorsefaz.webmaniabr.com/');

if (isset($_GET['estado'], $_GET['servico'])) {

     foreach($html->find('div.service-status--info') as $tipo_servico){

         foreach($tipo_servico->find('span.service-status--name') as $nome_servico){

            $nome_estado = trim(strtolower($nome_servico->plaintext));
			
            if ($nome_estado == $url_estado){

                foreach($tipo_servico->find('span.service-status--status') as $status_servico)
                echo $status_servico->outertext;
				
            }
         }
      }

} else {

    //Se nenhum parâmetro for informado, ou não forem informados os 2 parâmetros exibe o status geral.
    foreach($html->find('div.service-status--info') as $tipo_servico){

        foreach($tipo_servico->find('span.service-status--name') as $nome_servico){
		
	    //Separa lista NFE de NFCE
		if (str_contains($nome_servico, 'Autorizados')) echo '<br>';
		
        echo $nome_servico->outertext . ' ';
		
		}
		
        foreach($tipo_servico->find('span.service-status--status') as $status_servico)
        echo $status_servico->outertext . '<br>';
		
    }

        echo '<br><br><br>';
		echo '<b>Para filtrar os resultados informe os parâmetros na URI como por exemplo:</b><br>';
		echo 'https://supptex.com.br/statussefaz/?estado=PE&servico=nfe <br>';
        echo 'https://supptex.com.br/statussefaz/?estado=AM&servico=nfce <br>';
        echo 'Consultas são realizadas no portal monitorsefaz.webmaniabr.com.';

}

?>
