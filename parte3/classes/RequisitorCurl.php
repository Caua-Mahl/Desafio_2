<?php 
// optei por static pois assim não preciso instanciar pra usar o get
class RequisitorCurl {
    private static $base = 'https://pokeapi.co/api/v2';

    public static function get($endpoint): array {
        $ch = curl_init(static::$base . '/' . $endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        if (curl_errno($ch)) {  
            http_response_code(400);
            echo json_encode(['message' => 'Curl error: ' . curl_error($ch)]);
            exit;
        }

        curl_close($ch);
        $decoded = json_decode($response, true);
        if (!$decoded) {
            http_response_code(404);
            echo json_encode(['message' => 'Data not found']);
            exit;
        }

        return $decoded;
    }

    // não necessários pro funcionamento do código agora, mas podem ser úteis no futuro
    public static function getBase(): string {
        return static::$base;
    }

    public static function setBase(string $base): void {
        static::$base = $base;
    }
}