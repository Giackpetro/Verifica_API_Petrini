# Endpoint per le classi

- curl http://localhost:8080/classi
Richiesta:
GET    /classi                 ClassiController:index
Risposta
Se la connessione al db non va a buon fine
Status code: 500
{"msg": "Errore di connessione al database"}

Se la connessione al db va a buon fine
Status code: 200   
[{"id": 1, "sezione":"5A", "anno": 2024},  {"id": 2 , "sezione":"5B", "anno": 2024}]


- curl http://localhost:8080/classi/2
Richiesta:
GET    /classi/{id}               ClassiController:show
Risposta
Se la connessione al db non va a buon fine
Status code: 500
{"msg": "Errore di connessione al database"}

Se la connessione al db va a buon fine
Status code: 200   
[{"id":"2","sezione":"5B","anno":"2024"}]


- curl -X POST http://localhost:8080/classi -H "Content-Type: application/json" -d '{"sezione": "5C", "anno": "2021"}'
Richiesta:
POST    /classi                ClassiController:create
Risposta
Se la connessione al db non va a buon fine
Status code: 500
{"msg": "Errore di connessione al database"}

Se i dati non sono validi
Status code: 400
{"msg": "Dati non validi"}

Se la query non funziona
Status code: 500
{"msg": "Errore nella creazione della classe"}

Se la connessione al db va a buon fine, i dati sono validi e la query funziona
Status code: 200   
{"msg": "Classe creata con successo"}


- curl -X PUT http://localhost:8080/classi/3 -H "Content-Type: application/json" -d '{"sezione": "5B", "anno": "2023"}' 
Richiesta:
PUT    /classi/{id}                ClassiController:update
Risposta
Se la connessione al db non va a buon fine
Status code: 500
{"msg": "Errore di connessione al database"}

Se la query non funziona
Status code: 500
{"msg": "Errore nell'aggiornamento della classe"}

Se la connessione al db va a buon fine e la query funziona
Status code: 200   
{"msg": "Classe aggiornata con successo"}


- curl -X DELETE http://localhost:8080/classi/3
Richiesta:
DELETE    /classi/{id}                ClassiController:delete
Risposta
Se la connessione al db non va a buon fine
Status code: 500
{"msg": "Errore di connessione al database"}

Se la query non funziona
Status code: 500
{"msg": "Errore nell'aggiornamento della classe"}

Se la connessione al db va a buon fine e la query funziona
Status code: 200   
{"msg": "Classe aggiornata con successo"}


# Endpoint per gli alunni

- curl http://localhost:8080/classi/1/alunni
Richiesta:
GET    /classi/{classe_id}/alunni                 AlunniController:index
Risposta
Se la connessione al db non va a buon fine
Status code: 500
{"msg": "Errore di connessione al database"}

Se la connessione al db va a buon fine
Status code: 200   
[{"id":"1","nome":"Claudio","cognome":"Benve","classe_id":"1"},{"id":"2","nome":"Ivan","cognome":"Bruno","classe_id":"1"}]


- curl http://localhost:8080/classi/1/alunni/2
Richiesta:
GET    /classi/{classe_id}/alunni/{id}           AlunniController:show
Risposta
Se la connessione al db non va a buon fine
Status code: 500
{"msg": "Errore di connessione al database"}

Se la connessione al db va a buon fine
Status code: 200   
[{"id":"2","nome":"Ivan","cognome":"Bruno","classe_id":"1"}]


- curl -X POST http://localhost:8080/classi/4/alunni -H "Content-Type: application/json" -d '{"nome": "Giuseppe", "cognome": "Verdi", "classe_id": 4}'
Richiesta:
POST    /classi/{classe_id}/alunni                AlunniController:create
Risposta
Se la connessione al db non va a buon fine
Status code: 500
{"msg": "Errore di connessione al database"}

Se i dati non sono validi
Status code: 400
{"msg": "Dati non validi"}

Se la query non funziona
Status code: 500
{"msg": "Errore nella creazione dell'alunno"}

Se la connessione al db va a buon fine, i dati sono validi e la query funziona
Status code: 200   
{"msg": "Alunno creato con successo"}


- curl -X PUT http://localhost:8080/classi/4/alunni/4 -H "Content-Type: application/json" -d '{"nome": "Giacomo", "cognome": "Petrini"}'
Richiesta:
PUT    /classi/{classe_id}/alunni/{id}                AlunniController:update
Risposta
Se la connessione al db non va a buon fine
Status code: 500
{"msg": "Errore di connessione al database"}

Se la query non funziona
Status code: 500
{"msg": "Errore nell'aggiornamento dell'alunno"}

Se la connessione al db va a buon fine e la query funziona
Status code: 200   
{"msg": "Alunno aggiornato con successo"}


- curl -X DELETE http://localhost:8080/classi/4/alunni/4
Richiesta:
DELETE    /classi/{classe_id}/alunni/{id}            AlunniController:delete
Risposta
Se la connessione al db non va a buon fine
Status code: 500
{"msg": "Errore di connessione al database"}

Se la query non funziona
Status code: 500
{"msg": "Errore nell'aggiornamento dell'alunno"}

Se la connessione al db va a buon fine e la query funziona
Status code: 200   
{"msg": "Alunno aggiornato con successo"}
