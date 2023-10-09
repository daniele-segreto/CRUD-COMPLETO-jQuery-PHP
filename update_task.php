<?php
// Include il file di configurazione del database
include_once("config.php");

// Verifica se sono stati inviati dati tramite POST con il nome "taskId"
if (isset($_POST["taskId"])) {
    // Ottieni il valore dell'ID del task da modificare dalla richiesta POST
    $taskId = $_POST["taskId"];
    
    // Ottieni il valore del campo "taskName" inviato tramite POST
    $taskName = $_POST["taskName"];
    
    // Ottieni il valore del campo "taskDescription" inviato tramite POST
    $taskDescription = $_POST["taskDescription"];

    // Prepara una query SQL per aggiornare un task nella tabella "tasks" con i nuovi valori
    $sql = "UPDATE tasks SET task_name=?, task_description=? WHERE id=?";
    
    // Prepara la query SQL per l'esecuzione
    $stmt = $conn->prepare($sql);
    
    // Associa i nuovi valori ai parametri nella query (in questo caso, due stringhe e un intero)
    $stmt->bind_param("ssi", $taskName, $taskDescription, $taskId);
    
    // Esegui la query SQL per aggiornare il task nel database
    $stmt->execute();
    
    // Chiudi la query preparata
    $stmt->close();
}
?>
