<?php
require_once('connection.php');

$id=$_GET['id'];

$sth = $pdo->prepare("SELECT id, nome,cpf,rg,endereco,estado,funcao from funcionarios WHERE id = :id");
$sth->bindValue(':id', $id, PDO::PARAM_STR); // No select e no delete basta um bindValue
$sth->execute();

$reg = $sth->fetch(PDO::FETCH_OBJ);
$nome = $reg->nome;
$cpf = $reg->cpf;
$rg = $reg->rg;
$endereco = $reg->endereco;
$estado = $reg->estado;
$funcao = $reg->funcao;

require_once('header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form method="post" action="">
                <table class="table table-striped table-dark table-responsive table-hover">
                <tr><td><b>Nome</td><td><input type="text" name="nome" value="<?=$nome?>"></td></tr>
                <tr><td><b>CPF</td><td><input type="text" name="cpf" placeholder="000.000.000-00" value="<?=$cpf?>"></td></tr>
                <tr><td><b>RG</td><td><input type="text" name="rg" placeholder="Sem Pontuação" value="<?=$rg?>"></td></tr>
                <tr><td><b>Endereço</td><td><input type="text" name="endereco" value="<?=$endereco?>"></td></tr>
                <tr><td><b>UF</td><td>
                    <select type="text" name="estado" value="<?=$estado?>">
                      <option>AC</option>
                      <option>AL</option>
                      <option>AP</option>
                      <option>AM</option>
                      <option>BA</option>
                      <option>CE</option>
                      <option>DF</option>
                      <option>ES</option>
                      <option>GO</option>
                      <option>MA</option>
                      <option>MT</option>
                      <option>MS</option>
                      <option>MG</option>
                      <option>PA</option>
                      <option>PB</option>
                      <option>PR</option>
                      <option>PE</option>
                      <option>PI</option>
                      <option>RJ</option>
                      <option>RN</option>
                      <option>RS</option>
                      <option>RO</option>
                      <option>RR</option>
                      <option>SC</option>
                      <option>SP</option>
                      <option>SE</option>
                      <option>TO</option>
                    </select>
                  </td></tr>
                <tr><td><b>Função</td><td><input type="text" name="funcao" value="<?=$funcao?>"></td></tr>

                <input name="id" type="hidden" value="<?=$id?>">
                <tr><td></td><td><input name="enviar" class="btn btn-primary" type="submit" value="Editar">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input name="enviar" class="btn btn-warning" type="button" onclick="location='index.php'" value="Voltar"></td></tr>
                </table>
            </form>
        </div>
    <div>
</div>

<?php

if(isset($_POST['enviar'])){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $endereco = $_POST['endereco'];
    $estado = $_POST['estado'];
    $funcao = $_POST['funcao'];    

    $sql = "UPDATE $tbl_funcionarios SET nome = :nome, cpf=:cpf, rg=:rg, endereco=:endereco, estado=:estado, funcao=:funcao WHERE id = :id";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':id', $_POST['id'], PDO::PARAM_INT);   
    $sth->bindParam(':nome', $_POST['nome'], PDO::PARAM_INT);
    $sth->bindParam(':cpf', $_POST['cpf'], PDO::PARAM_INT);      
    $sth->bindParam(':rg', $_POST['rg'], PDO::PARAM_INT);   
    $sth->bindParam(':endereco', $_POST['endereco'], PDO::PARAM_INT);   
    $sth->bindParam(':estado', $_POST['estado'], PDO::PARAM_INT);   
    $sth->bindParam(':funcao', $_POST['funcao'], PDO::PARAM_INT);

   if($sth->execute()){
        print "<script>alert('Registro alterado com sucesso!');location='index.php';</script>";
    }else{
        print "Erro ao editar o registro!<br><br>";
    }
}
require_once('footer.php');
?>

