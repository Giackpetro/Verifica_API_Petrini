<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ClassiController{
  //mostra tutte le colonne della tabella alunni
  public function index(Request $request, Response $response, $args){
    $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
    if ($mysqli_connection->connect_error) {
      $response->getBody()->write(json_encode(["error" => "Errore di connessione al database"]));
      return $response->withHeader("Content-type", "application/json")->withStatus(500);
    }else{
      $result = $mysqli_connection->query("SELECT * FROM classi");
      $results = $result->fetch_all(MYSQLI_ASSOC);
      $response->getBody()->write(json_encode($results));
      return $response->withHeader("Content-type", "application/json")->withStatus(200);
    }
  }

    //mostra tutte le colenne della tabella classi di una classe con il relativo id
    public function show(Request $request, Response $response, $args){
      $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
      if ($mysqli_connection->connect_error) {
        $response->getBody()->write(json_encode(["error" => "Errore di connessione al database"]));
        return $response->withHeader("Content-type", "application/json")->withStatus(500);
      }else{
        $result = $mysqli_connection->query("SELECT * FROM classi WHERE id = {$args['id']}");
        $results = $result->fetch_all(MYSQLI_ASSOC);
        $response->getBody()->write(json_encode($results));
        return $response->withHeader("Content-type", "application/json")->withStatus(200);
      }
    }

    //crea una nuova classe
    public function create(Request $request, Response $response, $args){
      $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
      $data = json_decode($request->getBody()->getContents(), true);
      if ($mysqli_connection->connect_error) {
          $response->getBody()->write(json_encode(["error" => "Errore di connessione al database"]));
          return $response->withHeader("Content-type", "application/json")->withStatus(500);
      }
      if (!$data || !isset($data['sezione']) || !isset($data['anno'])) {
          $response->getBody()->write(json_encode(["error" => "Dati non validi"]));
          return $response->withHeader("Content-type", "application/json")->withStatus(400);
      }
      $fields = implode(", ", array_keys($data));
      $values = implode("', '", array_values($data));

      $result = $mysqli_connection->query("INSERT INTO classi ($fields) VALUES ('$values')");
  
      $status = 500; //di default per dare errore
      if ($result) {
          $res = ["message" => "Classe creata con successo"];
          $status = 200; //azione eseguita con successo
      } else {
          $res = ["error" => "Errore nella creazione della classe"];
      }
      $response->getBody()->write(json_encode($res));
      return $response->withHeader("Content-type", "application/json")->withStatus($status);
  }  

  //aggiorna le informazioni di una classe 
  public function update(Request $request, Response $response, $args){
      $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
      $data = json_decode($request->getBody()->getContents(), true);
      if ($mysqli_connection->connect_error) {
        $response->getBody()->write(json_encode(["error" => "Errore di connessione al database"]));
        return $response->withHeader("Content-type", "application/json")->withStatus(500);
      }else{
        $fields = implode(", ", array_keys($data));
        $values = implode("', '", array_values($data));
        $updateFields = [];
        foreach ($data as $field => $value) {
          $updateFields[] = "$field = '$value'";
        }
        $updateQuery = implode(", ", $updateFields);
        $result = $mysqli_connection->query("UPDATE classi SET $updateQuery WHERE id = {$args['id']}");

        $res = ["message" => "Classe aggiornata con successo"];
        $response->getBody()->write(json_encode($res));
        return $response->withHeader("Content-type", "application/json")->withStatus(200);
      } 
    }

    //elimina una classe
    public function delete(Request $request, Response $response, $args){
      $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
      if ($mysqli_connection->connect_error) {
        $response->getBody()->write(json_encode(["error" => "Errore di connessione al database"]));
        return $response->withHeader("Content-type", "application/json")->withStatus(500);
      }else{
        $result = $mysqli_connection->query("DELETE FROM classi WHERE id = {$args['id']}");
        
        if ($result) {
            $res = ["message" => "Classe eliminata con successo"];
        } else {
            $res = ["message" => "Errore durante l'eliminazione della classe"];
        }
    
        $response->getBody()->write(json_encode($res));
        return $response->withHeader("Content-type", "application/json")->withStatus($result ? 200 : 500);
      }
  }
}
