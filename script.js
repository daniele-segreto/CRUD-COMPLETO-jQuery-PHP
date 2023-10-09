$(document).ready(function () {
    // Questo blocco di codice verrà eseguito quando la pagina è completamente caricata e pronta per l'interazione

    // Carica la lista dei task all'avvio
    loadTaskList();

    // Gestisce la sottomissione del form per aggiungere un nuovo task
    $("#taskForm").submit(function (e) {
        e.preventDefault(); // Impedisce il comportamento predefinito del modulo (l'invio della pagina)

        // Ottiene il nome e la descrizione del task dai campi di input
        var taskName = $("#taskName").val();
        var taskDescription = $("#taskDescription").val();

        // Esegue una richiesta AJAX per aggiungere un nuovo task
        $.ajax({
            type: "POST",
            url: "add_task.php",
            data: {
                taskName: taskName,
                taskDescription: taskDescription
            },
            success: function (response) {
                // Dopo aver aggiunto il task, ricarica la lista dei task
                loadTaskList();
                $("#taskForm")[0].reset(); // Reimposta il form di aggiunta
            }
        });
    });

    // Gestisce il clic su "Modifica"
    $(document).on("click", ".edit-task", function () {
        // Quando si fa clic su "Modifica" su un task esistente

        var taskId = $(this).data("id"); // Ottiene l'ID del task da modificare
        var taskName = $(this).siblings("span").text(); // Ottiene il nome del task
        var taskDescription = $(this).siblings("p").text(); // Ottiene la descrizione del task

        // Popola il form di modifica con i dati del task
        $("#editTaskId").val(taskId);
        $("#editTaskName").val(taskName);
        $("#editTaskDescription").val(taskDescription);

        // Mostra il form di modifica e nasconde il form di aggiunta
        $("#taskForm").hide();
        $("#editTaskForm").show();
    });

    // Gestisce l'annullamento della modifica
    $("#cancelEdit").click(function () {
        // Quando si fa clic su "Annulla" nel form di modifica

        // Nasconde il form di modifica e mostra il form di aggiunta
        $("#editTaskForm").hide();
        $("#taskForm").show();
    });

    // Gestisce la sottomissione del form di modifica
    $("#editTaskForm").submit(function (e) {
        e.preventDefault(); // Impedisce il comportamento predefinito del modulo (l'invio della pagina)

        // Ottiene l'ID, il nome e la descrizione del task modificato
        var taskId = $("#editTaskId").val();
        var taskName = $("#editTaskName").val();
        var taskDescription = $("#editTaskDescription").val();

        // Esegue una richiesta AJAX per aggiornare il task
        $.ajax({
            type: "POST",
            url: "update_task.php",
            data: {
                taskId: taskId,
                taskName: taskName,
                taskDescription: taskDescription
            },
            success: function () {
                // Dopo aver aggiornato il task, ricarica la lista dei task
                loadTaskList();
                $("#editTaskForm").hide(); // Nasconde il form di modifica
                $("#taskForm").show(); // Mostra il form di aggiunta
                $("#editTaskForm")[0].reset(); // Reimposta il form di modifica
            }
        });
    });

    // Funzione per caricare la lista dei task
    function loadTaskList() {
        // Esegue una richiesta AJAX per ottenere la lista dei task dal server
        $.ajax({
            type: "GET",
            url: "get_tasks.php",
            success: function (data) {
                // Quando la richiesta ha successo, aggiorna la lista dei task nell'HTML
                $("#taskList").html(data);
            }
        });
    }

    // Gestisce l'eliminazione di un task
    $(document).on("click", ".delete-task", function () {
        // Quando si fa clic sul pulsante "Elimina" di un task

        var taskId = $(this).data("id"); // Ottiene l'ID del task da eliminare

        // Esegue una richiesta AJAX per eliminare il task
        $.ajax({
            type: "POST",
            url: "delete_task.php",
            data: {
                taskId: taskId
            },
            success: function () {
                // Dopo aver eliminato il task, ricarica la lista dei task
                loadTaskList();
            }
        });
    });
});
