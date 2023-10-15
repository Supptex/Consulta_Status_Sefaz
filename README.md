# Consulta_Status_Sefaz
Parser em php do site https://monitorsefaz.webmaniabr.com/ para simplificar a exibição do status e facilitar integração com outros sistemas.

Forma de uso:
Invocar o arquivo exibe o status da NFe e NFCe da sefaz de todos os estados;
Invocar com parâmetros de URL ?estado=PE&servico=nfe exibe status do respectivo estado e serviço.
Exemplos:
https://supptex.com.br/statussefaz/?estado=PE&servico=nfe
https://supptex.com.br/statussefaz/?estado=AM&servico=nfce
Consultas são realizadas no portal monitorsefaz.webmaniabr.com.
Dependências: PHP 7.1 ou superior e simplehtmldom.sourceforge.io.
