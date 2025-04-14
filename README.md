# Endpoint per le classi

- curl http://localhost:8080/classi
Richiesta:
GET    /classi                 ClassiController:index
Risposta
Se vla connessione al db non va a buon fine
Status code: 500
{"msg": "Errore di connessione al database"}

Se la connessione al db va a buon fine
Status code: 200   
[{"id": 1, "sezione":"5A", "anno": 2024},  {"id": 2 , "sezione":"5B", "anno": 2024}]


- curl http://localhost:8080/classi/2
Richiesta:
GET    /classi/2                 ClassiController:show
Risposta
Se vla connessione al db non va a buon fine
Status code: 500
{"msg": "Errore di connessione al database"}

Se la connessione al db va a buon fine
Status code: 200   
[{"id":"2","sezione":"5B","anno":"2024"}]


- curl -X POST http://localhost:8080/classi -H "Content-Type: application/json" -d '{"sezione": "5C", "anno": "2021"}'
Richiesta:
POST    /classi                ClassiController:create
Risposta
Se vla connessione al db non va a buon fine
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


- curl -X PUT http://localhost:8080/classi/3 -H "Content-Type: application/json" -d '{"sezione": "5B", "anno": "2023"}' 
Richiesta:
POST    /classi/3                ClassiController:update
Risposta
Se vla connessione al db non va a buon fine
Status code: 500
{"msg": "Errore di connessione al database"}

Se la query non funziona
Status code: 500
{"msg": "Errore nell'aggiornamento dell'alunno"}

Se la connessione al db va a buon fine e la query funziona
Status code: 200   
{"msg": "Alunno aggiornato con successo"}


- curl -X DELETE http://localhost:8080/classi/3
Richiesta:
POST    /classi/3                ClassiController:delete
Risposta
Se vla connessione al db non va a buon fine
Status code: 500
{"msg": "Errore di connessione al database"}

Se la query non funziona
Status code: 500
{"msg": "Errore nell'aggiornamento dell'alunno"}

Se la connessione al db va a buon fine e la query funziona
Status code: 200   
{"msg": "Alunno aggiornato con successo"}
