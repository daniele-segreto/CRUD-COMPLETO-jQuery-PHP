<?php
// Include il file di configurazione del database
include_once("config.php");

// Verifica se sono stati inviati dati tramite POST con il nome "taskName"
if (isset($_POST["taskName"])) {
    // Ottieni il valore del campo "taskName" inviato tramite POST
    $taskName = $_POST["taskName"];
    
    // Ottieni il valore del campo "taskDescription" inviato tramite POST
    $taskDescription = $_POST["taskDescription"];

    // Prepara una query SQL per inserire un nuovo task nella tabella "tasks"
    $sql = "INSERT INTO tasks (task_name, task_description) VALUES (?, ?)";
    
    // Prepara la query SQL per l'esecuzione
    $stmt = $conn->prepare($sql);
    
    // Associa i valori delle variabili ai parametri nella query (in questo caso, due stringhe)
    $stmt->bind_param("ss", $taskName, $taskDescription);
    
    // Esegui la query SQL per inserire il nuovo task nel database
    $stmt->execute();
    
    // Chiudi la query preparata
    $stmt->close();
}
?>
