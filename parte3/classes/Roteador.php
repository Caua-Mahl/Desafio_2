<?php 
    class Roteador {

        public static function rotear($requisicao) {
            if (preg_match('/\/\?page=[0-9]+/', $requisicao->getRoute()) ) {
                $message = 'Read from file.';
                Controlador::listaPokemons($message);
            }
            elseif (preg_match('/\/pokemon\/.+/', $requisicao->getRoute()) ) {
                $message  = 'Read from file.';
                $searched = explode('/', substr($requisicao->getRoute(), 1))[1];
                Controlador::Pokemon($message, $searched);
            } else {
                echo json_encode([
                    'message' => "Rota errada, por favor use /?page=[1,9] ou /pokemon/[nome do pokemon]",
                ]);
                exit; 
            };
        }
    }
?>