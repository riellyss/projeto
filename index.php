<?php

$dbHost = '127.0.0.1:3306';
$dbUserName = 'root';
$dbPassWord = '';
$dbName = 'sistema_fornecedores';


$conexao = new mysqli($dbHost, $dbUserName, $dbPassWord, $dbName);


if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
}


$nome_fantasia = $_POST['nome_fantasia'];
$razao_social = $_POST['razao_social'];
$cnpj = $_POST['cnpj'];
$inscricao_estadual = $_POST['inscricao_estadual'];
$inscricao_municipal = $_POST['inscricao_municipal'];
$telefone_principal = $_POST['telefone_principal'];
$email_contato = $_POST['email_contato'];


$sql = "INSERT INTO fornecedores 
(nome_fantasia, razao_social, cnpj, inscricao_estadual, inscricao_municipal, telefone_principal, email_contato)
VALUES 
('$nome_fantasia', '$razao_social', '$cnpj', '$inscricao_estadual', '$inscricao_municipal', '$telefone_principal', '$email_contato')";


if ($conexao->query($sql) === TRUE) {
    echo "Fornecedor cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar fornecedor: " . $conexao->error;
}

$conexao->close();
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistemas Fornecedores</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
  <h2>Cadastro de Fornecedores</h2>

  <form method="POST" action="cadastrar_fornecedor.php">
    <label>Nome Fantasia:</label>
    <input type="text" name="nome_fantasia" required>

    <label>Razão Social:</label>
    <input type="text" name="razao_social" required>

    <label>CNPJ:</label>
    <input type="text" name="cnpj" required>

    <label>Inscrição Estadual:</label>
    <input type="text" name="inscricao_estadual">

    <label>Inscrição Municipal:</label>
    <input type="text" name="inscricao_municipal">

    <label>Telefone:</label>
    <input type="tel" name="telefone_principal" required>

    <label>Email:</label>
    <input type="email" name="email_contato" required>

    <button type="submit">Cadastrar</button>
  </form>

</body>
</html>