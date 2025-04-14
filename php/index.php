<?php
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/controllers/AlunniController.php';
require __DIR__ . '/controllers/ClassiController.php';

$app = AppFactory::create();

//Endpoint per la gestione degli alunni


// Recuperare tutti gli alunni di una classe
// curl http://localhost:8080/classi/1/alunni
$app->get('/classi/{classe_id}/alunni', "AlunniController:index");

// Recuperare un singolo alunno di una classe tramite ID
// curl http://localhost:8080/classi/1/alunni/2
$app->get('/classi/{classe_id}/alunni/{id}', "AlunniController:show");

// Creare un nuovo alunno per una classe
// curl -X POST http://localhost:8080/classi/4/alunni -H "Content-Type: application/json" -d '{"nome": "Giuseppe", "cognome": "Verdi", "classe_id": 4}'
$app->post('/classi/{classe_id}/alunni', "AlunniController:create");

// Aggiornare un alunno tramite ID
// curl -X PUT http://localhost:8080/classi/4/alunni/4 -H "Content-Type: application/json" -d '{"nome": "Giacomo", "cognome": "Petrini"}'
$app->put('/classi/{classe_id}/alunni/{id}', "AlunniController:update");

// Eliminare una alunno tramite ID
// curl -X DELETE http://localhost:8080/classi/4/alunni/4
$app->delete('/classi/{classe_id}/alunni/{id}', "AlunniController:delete");



// Endpoint per la gestione delle classi


// Recuperare tutte le classi
// curl http://localhost:8080/classi
$app->get('/classi', "ClassiController:index");

// Recuperare una singola classe tramite ID
// curl http://localhost:8080/classi/2
$app->get('/classi/{id}', "ClassiController:show");

// Creare una nuova classe
// curl -X POST http://localhost:8080/classi -H "Content-Type: application/json" -d '{"sezione": "5C", "anno": "2021"}'
$app->post('/classi', "ClassiController:create");

// Aggiornare una classe tramite ID
// curl -X PUT http://localhost:8080/classi/3 -H "Content-Type: application/json" -d '{"sezione": "5B", "anno": "2023"}'
$app->put('/classi/{id}', "ClassiController:update");

// Eliminare una classe tramite ID
// curl -X DELETE http://localhost:8080/classi/3
$app->delete('/classi/{id}', "ClassiController:delete");
$app->run();
