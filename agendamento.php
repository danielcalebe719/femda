<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento de Pedido</title>
      <!--css bootstrap-->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
      <!--js bootstrap-->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/pt.js"></script>
    <!-- Adiciona o arquivo de tradução para o português -->
    <link rel="stylesheet" href="styles.css">
   
</head>

<body>
    <div class="container">
        
        <h1>Agendamento de Pedido</h1>
        
        <div>
            <div class="calendar">
                <label for="selectedDate">Selecione a data de entrega do pedido:</label>
                <input type="text" id="selectedDate" name="selectedDate" readonly>
            </div>
            <div>
                <label for="selectedTime">Selecione o horário de incio do evento:</label>
                <input type="time" id="selectedTime" name="selectedTime">
            </div>
            <div>
                <label for="selectedTime2">Selecione o horário de fim do evento:</label>
                <input type="time" id="selectedTime2" name="selectedTime2">
            </div>
            <button   id="confirmButton2" onclick="agendconfirm()" data-bs-toggle="modal" data-bs-target="#exampleModal">Agendar</button>
           
        </div>
    </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Alerta</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <br>

        <div class="modal-body" >
          <div id="confirmation"></div>
            <p>Adicione abaixo alguma observação sobre seu pedido, caso queira contatar-nos mais rapidamente, verifique outras formas de contato.</p>
            <br><br>
            <h5>Observação</h5>
            <label for="obs" >
            
           
            <input type="text" style="height: 200px; width: 300px; text-align: top;" placeholder="Observação sobre qualquer coisa do pedido..." >
        
        </label>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="confirmButton" style="background-color: #fa856e; border: #fa856e;">Confirmar</button>
        </div>
      </div>
    </div>
  </div>
  
    <script src="agendamento.js"></script>
</body>

</html>
