<?php
// Conexão com o banco de dados
include("../static/conexao.php");

// Verificar e iniciar a sessão se não estiver iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificar se o id do usuário está definido na sessão
if (!isset($_SESSION['id_usuario'])) {
    die("Erro: ID de usuário não encontrado na sessão.");
}

$id_usuario = $_SESSION['id_usuario'];

// Verificar se o arquivo foi enviado corretamente
if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] === UPLOAD_ERR_OK) {

    // Verificar se o arquivo é uma imagem
    $check = getimagesize($_FILES["foto"]["tmp_name"]);
    if ($check === false) {
        die("O arquivo enviado não é uma imagem válida.");
    }

    // Verificar a extensão do arquivo
    $extensoesPermitidas = array('jpeg', 'jpg', 'png', 'gif');
    $extensaoArquivo = strtolower(pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION));
    if (!in_array($extensaoArquivo, $extensoesPermitidas)) {
        die("Tipo de arquivo não suportado. Apenas JPEG, JPG, PNG e GIF são permitidos.");
    }

    // Definir o diretório para salvar a imagem
    $diretorioUpload = "../Imagens/ftperfil/";
    
    // Gerar um nome único para a imagem
    $novoNomeArquivo = uniqid() . "." . $extensaoArquivo;
    $caminhoFinal = $diretorioUpload . basename($novoNomeArquivo); // Segurança no caminho final

    // Tente mover o arquivo temporário para o diretório final
    if (!move_uploaded_file($_FILES["foto"]["tmp_name"], $caminhoFinal)) {
        die("Ocorreu um erro ao fazer o upload da imagem.");
    }

    // Atualize o caminho da imagem no banco de dados
    $stmt = $mysqli->prepare("UPDATE cadastro SET foto_perfil_caminho = ? WHERE id_usuario = ?");
    if ($stmt === false) {
        die("Erro na preparação da consulta: " . $mysqli->error);
    }

    // Vincular os parâmetros e executar a consulta
    if (!$stmt->bind_param("si", $caminhoFinal, $id_usuario)) {
        die("Erro ao vincular os parâmetros: " . $stmt->error);
    }
    
    if (!$stmt->execute()) {
        die("Erro ao executar a consulta: " . $stmt->error);
    }

    // Fechar a declaração
    $stmt->close();

    // Redirecionar para a página da conta com uma mensagem de sucesso
    header("Location: conta.php?upload=sucesso");
    exit();
} else {
    die("Nenhum arquivo válido foi enviado.");
}
?>
