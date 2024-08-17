<?php
// require_once($_SERVER["DOCUMENT_ROOT"] . "/trabalho-ads-dsw-frontend/config/database.php");

// try {
//     $database = new DatabaseConnection();
//     $conn = $database->getConnection();

//     $sql = "SELECT id, solicitante, linha, local, item, descricao_problema, observacao, status, data_hora_abertura, tecnico_responsavel FROM SAP.ANUBIS_chamados WHERE STATUS = 'PENDENTE' OR STATUS = 'ACEITO' ORDER BY -id";
//     $stmt = $conn->prepare($sql);
//     $stmt->execute();

//     $chamados = $stmt->fetchAll(PDO::FETCH_ASSOC);

//     header('Content-Type: application/json; charset=utf-8');
//     echo json_encode(['data' => $chamados]);
// } catch (PDOException $e) {
//     header('Content-Type: application/json; charset=utf-8');
//     echo json_encode(['error' => $e->getMessage()]);
// }

// URL do endpoint Node.js
$url = 'http://localhost:3000/api/chamados';

try {
    // Inicializa uma sessão cURL
    $ch = curl_init();

    // Configura a URL e outras opções da sessão cURL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Executa a sessão cURL
    $response = curl_exec($ch);

    // Verifica se houve algum erro
    if(curl_errno($ch)) {
        throw new Exception('cURL Error: ' . curl_error($ch));
    }

    // Fecha a sessão cURL
    curl_close($ch);

    // Define o tipo de conteúdo da resposta
    header('Content-Type: application/json; charset=utf-8');

    // Retorna a resposta do endpoint Node.js
    echo $response;

} catch (Exception $e) {
    // Define o tipo de conteúdo da resposta em caso de erro
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['error' => $e->getMessage()]);
}
?>
