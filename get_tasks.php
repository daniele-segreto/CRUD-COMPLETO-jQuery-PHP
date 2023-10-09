<?php
// Include il file di configurazione del database
include_once("config.php");

// Definisci una query SQL per selezionare tutti i task dalla tabella "tasks"
$sql = "SELECT * FROM tasks";

// Esegui la query SQL
$result = $conn->query($sql);

// Verifica se ci sono risultati nella query
if ($result->num_rows > 0) {
    // Se ci sono risultati, entra in un ciclo while per elaborare ogni riga
    while ($row = $result->fetch_assoc()) {
        // Stampa un elemento di lista HTML con classe "list-group-item"
        echo '<li class="list-group-item">';
        
        // Stampa il nome del task all'interno di un elemento "span"
        echo '<span>' . $row["task_name"] . '</span>';
        
        // Stampa la descrizione del task all'interno di un elemento "p"
        echo '<p>' . $row["task_description"] . '</p>'; // Mostra la Descrizione
        
        // Stampa un pulsante "Delete" con classe "btn-danger" e attributo "data-id" che contiene l'ID del task
        echo '<button class="btn btn-danger btn-sm float-right delete-task" data-id="' . $row["id"] . '">Delete</button>';
        
        // Stampa un pulsante "Edit" con classe "btn-primary" e attributo "data-id" che contiene l'ID del task
        echo '<button class="btn btn-primary btn-sm float-right edit-task" data-id="' . $row["id"] . '">Edit</button>';
        
        // Stampa un campo nascosto "input" con classe "task-id" e valore che contiene l'ID del task
        echo '<input type="hidden" class="task-id" value="' . $row["id"] . '">';
        
        // Chiudi l'elemento di lista
        echo '</li>';
    }
} else {
    // Se non ci sono risultati, stampa un elemento di lista HTML che indica "Nessun task trovato"
    echo "<li class='list-group-item'>No tasks found</li>";
}

// Chiudi la connessione al database
$conn->close();
?>