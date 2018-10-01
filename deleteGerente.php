<?php
require_once('connection.php');

$id=$_GET['id'];

$sth = $pdo->prepare("SELECT id, nome,cpf,rg,endereco,estado from gerentes WHERE id = :id");
$sth->bindValue(':id', $id, PDO::PARAM_STR);
$sth->execute();

$reg = $sth->fetch(PDO::FETCH_OBJ);
$nome = $reg->nome;
$cpf = $reg->cpf;
$rg = $reg->rg;
$endereco = $reg->endereco;
$estado = $reg->estado;

require_once('header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3>Tem certeza de que deseja excluir o registro abaixo?</h3>
            <br>
            <b>ID:</b> <?=$id?><br>
            <b>Nome:</b> <?=$nome?><br>
            <b>CPF:</b> <?=$cpf?><br>
            <b>RG:</b> <?=$rg?><br>
            <b>Endereço:</b> <?=$endereco?><br>
            <b>UF:</b> <?=$estado?><br>
            <br>
            <form method="post" action="">
            <input name="id" type="hidden" value="<?=$id?>">
            <input name="enviar" class="btn btn-danger" type="submit" value="Excluir!">&nbsp;&nbsp;&nbsp;
            <input name="enviar" class="btn btn-warning" type="button" onclick="location='gerentes.php'" value="Voltar">
            </form>
        </div>
    <div>
</div>
<br><br><br>
<?php

if(isset($_POST['enviar'])){
$id = $_POST['id'];
    $sql = "DELETE FROM  $tbl_gerentes WHERE id = :id";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':id', $id, PDO::PARAM_INT);   
    if( $sth->execute()){
        print "<script>alert('Registro excluído com sucesso!');location='gerentes.php';</script>";
    }else{
        print "Erro ao exclur o registro!<br><br>";
    }
}
require_once('footer.php');
?>
