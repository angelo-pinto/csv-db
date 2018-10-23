<?php 

class CSVdb {

    // Develper: Angelo R. Pinto
    // Git     : https://github.com/angelo-pinto/csv-db
    // Version : 0.1

    var $arquivo = '';

    function __construct($arquivo) {
        $this->arquivo = $arquivo;
    }    

    /**
     * Função que salva os dados de um array em um arquivo CSV
     * @param  lista {array com os dados que serão salvos no CSV}
     * @return 0     {Sucesso}
     * @return 1     {Não é um array}
     * @return 2     {Array Vazio}
     * @return 3     {Falha ao abrir o arquivo csv}
     */
    function save($lista) {

        if (!is_array($lista)){
            return 1;
        }
        
        if (count($lista) == 0){ 
            return 2;
        }

        try {
            $file = fopen($this->arquivo, 'w');
        } catch (Exception $e){
            return 3;
        }

        // Adiciona as chaves dos vetores na primeira linha do arquivo CSV
        foreach ($lista as $linha) {
            $k = 0;
            foreach ($linha as $field => $value) {
                $arrayKey[$k] = $field;
                $k++;
            }
            break;
        }
        fputcsv($file, $arrayKey, ';');

        // Adiciona os valores de cada linha
        foreach ($lista as $linha) {
            fputcsv($file, $linha, ';');
        }

        fclose($file);

        return 0;
    }

    /**
     * Função que retorna os dados do CSV em um array
     * @return dados {Array contendo os dados contidos no array}
     */
    function select(){

        $handle = fopen($this->arquivo, "r");

        while (($linha = fgetcsv($handle, 0, ';')) !== FALSE) {
            if (!isset($fields)) {
                $fields = $linha;
                $i = 0;
            } else {
                $dados[$i] = $linha;
                $i++;
            }
        }     
        return $dados;
    }

    /**
     * Função que retorna os dados do CSV em um array a partir de um parametro de pesquisa 
     * @param  id    {Indice do array que será feita a comparação}
     * @param  value {Valor que será procurado dentro dados do array}
     * @return dados {Array contendo os dados contidos no array}
     */    
    function selectWhere($id, $value){
        $registros = $this->select();
        $i = 0;
        $k = 0;
        $dados = [];
        foreach ($registros as $registro) { 
            if ($registro[$id] == $value) {
                $dados[$k] = $registro;
                $k++;
            }
            $i++;
        }
        return $dados;
    }

}


