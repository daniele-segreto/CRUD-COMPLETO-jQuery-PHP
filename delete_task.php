<?php
// Include il file di configurazione del database
include_once("config.php");

// Verifica se è stato inviato un valore tramite POST con il nome "taskId"
if (isset($_POST["taskId"])) {
    // Ottieni il valore dell'ID del task da eliminare dalla richiesta POST
    $taskId = $_POST["taskId"];

    // Prepara una query SQL per eliminare un task dalla tabella "tasks" in base all'ID
    $sql = "DELETE FROM tasks WHERE id = ?";
    
    // Prepara la query SQL per l'esecuzione
    $stmt = $conn->prepare($sql);
    
    // Associa l'ID del task al parametro nella query (in questo caso, un intero)
    $stmt->bind_param("i", $taskId);
    
    // Esegui la query SQL per eliminare il task dal database
    $stmt->execute();
    
    // Chiudi la query preparata
    $stmt->close();
}
?>
