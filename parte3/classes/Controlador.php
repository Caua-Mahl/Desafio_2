<?php 
    class Controlador {

        public static function listaPokemons($message){
            if (!file_exists('all.txt')) {
                $limit    = 150;
                $message  = 'Fetched from API.';
                $response = RequisitorCurl::get("pokemon?limit=$limit");

                $data = array_map(function ($data) {
                    return $data["name"];
                }, $response['results']);
                
                file_put_contents('all.txt', json_encode($data));
            }
        
            $fileContent    = file_get_contents('all.txt');
            $todos          = json_decode($fileContent, true);
            $page           = (int)$_GET['page'] ?? 1;
            $resultsPerPage = 15;

            if ($page < 1) {
                $page = 1;
            }

            if ($page * $resultsPerPage > count($todos)) {
                $page = ceil(count($todos) / $resultsPerPage);
            }

            $retorno = array_slice($todos, ($page - 1) * $resultsPerPage, $resultsPerPage);
            echo json_encode([
                'message' => $message,
                'page'    => $page,
                'data'    => $retorno
            ]);
            exit; 
        }
        
        public static function Pokemon($message, $searched){
            if (!file_exists("$searched.txt")) {
                $message = 'Fetched from API.';
                $response = RequisitorCurl::get("pokemon/$searched");
        
                $formatted  = [
                    'name'  => $response['name'],
                    'stats' => []
                ];

                foreach ($response['stats'] as $stat) {
                    $formatted['stats'][$stat['stat']['name']] = $stat['base_stat'];
                }

                file_put_contents("$searched.txt", json_encode($formatted));
            }

            $fileContent = file_get_contents("$searched.txt");
            echo json_encode([
                'message' => $message,
                'pokemon' => json_decode($fileContent)
            ]);
            exit;
        }    
    }

