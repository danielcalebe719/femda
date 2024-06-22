<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os valores do formulário
    $barmans = $_POST["barmans"];
    $garcons = $_POST["garcons"];
    $cozinheiros = $_POST["cozinheiros"];
    $duracaoHoras = $_POST["duracaoHoras"]; // Recupera a duração da festa em horas
    $quantidadePessoas = $_POST["quantidadePessoas"]; // Recupera a quantidade de pessoas

    // Conecta-se ao banco de dados (substitua os valores com os seus próprios)
    $conexao = mysqli_connect("localhost", "root", "", "bdtcc");

    // Verifica se a conexão foi estabelecida corretamente
    if (!$conexao) {
        die("Erro de conexão: " . mysqli_connect_error());
    }

    // Insere um novo serviço "personalizado" na tabela 'servicos'
    $queryInserirServico = "INSERT INTO servicos (nomeServico, total_servicos, duracaoHoras, quantidadePessoas) VALUES ('personalizado', NULL, $duracaoHoras, $quantidadePessoas)";
    if (mysqli_query($conexao, $queryInserirServico)) {
        // Recupera o idServicos do serviço "personalizado" recém-inserido
        $idServicosPersonalizado = mysqli_insert_id($conexao);

        // Calcula o subtotal para cada tipo de funcionário
        $subtotalBarmans = $barmans * 150; // Subtotal para Barmans é 150 por funcionário
        $subtotalGarcons = $garcons * 150; // Subtotal para Garçons é 150 por funcionário
        $subtotalCozinheiros = $cozinheiros * 150; // Subtotal para Cozinheiros é 150 por funcionário

        // Insere os valores na tabela 'servicosPedidos'
        $queryInsercao = "INSERT INTO servicosPedidos (idServicos, idPedidos, funcionarioTipo, quantidade, subtotal) VALUES ";
        $queryInsercao .= "($idServicosPersonalizado, NULL, 'Barman', $barmans, $subtotalBarmans), ";
        $queryInsercao .= "($idServicosPersonalizado, NULL, 'Garcom', $garcons, $subtotalGarcons), ";
        $queryInsercao .= "($idServicosPersonalizado, NULL, 'Cozinheiro', $cozinheiros, $subtotalCozinheiros)";

        // Executa a inserção
        if (mysqli_query($conexao, $queryInsercao)) {
            // Redireciona o usuário de volta para a página inicial
            header("Location: home.php");
            exit();
        } else {
            echo "Erro ao inserir os dados: " . mysqli_error($conexao);
        }
    } else {
        echo "Erro ao inserir o novo serviço 'personalizado': " . mysqli_error($conexao);
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conexao);
}
?>
