<?php
include("../static/conexao.php");

if (!isset($_SESSION)) {
    session_start();
}

// Verifique se o id_usuario está na sessão
if (!isset($_SESSION['id_usuario'])) {
    die("ID do usuário não encontrado na sessão.");
}

$id = $_SESSION['id_usuario'];  // Agora o id deve estar na sessão

// Resto do código de upload de imagem
if (isset($_FILES["foto"])) {
    // Verifique se o arquivo é uma imagem válida
    $check = getimagesize($_FILES["foto"]["tmp_name"]);
    if ($check === false) {
        die("O arquivo não é uma imagem.");
    }

    // Verifique a extensão do arquivo
    $extensoesPermitidas = array('jpeg', 'jpg', 'png', 'gif');
    $extensaoArquivo = strtolower(pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION));
    if (!in_array($extensaoArquivo, $extensoesPermitidas)) {
        die("Tipo de arquivo não suportado.");
    }

    // Defina o local para salvar a imagem
    $diretorioUpload = "../Imagens/ftperfil/";

    // Verifique se o diretório existe, se não, crie-o
    if (!is_dir($diretorioUpload)) {
        mkdir($diretorioUpload, 0777, true);
    }

    $novoNomeArquivo = uniqid() . "." . $extensaoArquivo;
    $caminhoFinal = $diretorioUpload . $novoNomeArquivo;

    // Tente mover o arquivo temporário para o diretório final
    if (!move_uploaded_file($_FILES["foto"]["tmp_name"], $caminhoFinal)) {
        die("Ocorreu um erro ao fazer o upload da imagem.");
    }

    // Atualize o caminho da imagem no banco de dados
    $stmt = $mysqli->prepare("UPDATE cadastro SET arquivo_foto = ? WHERE id_usuario = ?");
    $stmt->bind_param("ss", $caminhoFinal, $id);
    if (!$stmt->execute()) {
        die("Erro ao atualizar o caminho da imagem no banco de dados.");
    }

    // Redirecione de volta à página original
    header("Location: conta_adm.php");
    exit();
}
?>
