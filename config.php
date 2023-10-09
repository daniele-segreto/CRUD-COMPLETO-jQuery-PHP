<?php
// Specifica i dettagli per la connessione al database
$servername = "localhost"; // Nome del server del database (solitamente "localhost" se è in esecuzione sulla stessa macchina)
$username = "root"; // Nome utente del database
$password = ""; // Password per l'utente del database (vuota nel tuo caso)
$dbname = "todolist"; // Nome del database a cui connettersi

// Crea una nuova istanza di connessione al database utilizzando la classe mysqli
$conn = new mysqli($servername, $username, $password, $dbname);

// Controlla se la connessione al database ha avuto successo
if ($conn->connect_error) {
    // Se la connessione ha fallito, viene generato un messaggio di errore e lo script viene interrotto
    die("Connection failed: " . $conn->connect_error);
}
?>
