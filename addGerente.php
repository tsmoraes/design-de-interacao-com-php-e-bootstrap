<?php
require_once('header.php');
?>

<br><br>
<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">

      <table class="table table-striped table-dark table-responsive table-hover">    
        <form method="post" action="addGerente.php">           
          <tr><td>Nome</td><td><input type="text" name="nome"></td></tr>
          <tr><td>CPF</td><td><input type="text" name="cpf" placeholder="000.000.000-00"></td></tr>
          <tr><td>RG</td><td><input type="text" name="rg" placeholder="Sem Pontuação"></td></tr>
          <tr><td>Endereço</td><td><input type="text" name="endereco"></td></tr>
          <tr><td>UF</td><td>
            <select type="text" name="estado">
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
          <tr><td></td><td><input class="btn btn-primary" name="enviar" type="submit" value="Cadastrar">&nbsp;&nbsp;&nbsp;
            <input class="btn btn-warning" name="enviar" type="button" onclick="location='gerentes.php'" value="Voltar"></td></tr>
          </form>
        </table>
      </div>
    </div>
  </div>

  <?php

  require_once('connection.php');

  if(isset($_POST['enviar'])){
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $endereco = $_POST['endereco'];
    $estado = $_POST['estado'];

    try{
     $stmte = $pdo->prepare("INSERT INTO gerentes(nome,cpf,rg,endereco,estado) VALUES (?, ?, ?, ?, ?)");
     $stmte->bindParam(1, $nome , PDO::PARAM_STR);
     $stmte->bindParam(2, $cpf , PDO::PARAM_STR);
     $stmte->bindParam(3, $rg , PDO::PARAM_STR);
     $stmte->bindParam(4, $endereco , PDO::PARAM_STR);
     $stmte->bindParam(5, $estado , PDO::PARAM_STR);
     $executa = $stmte->execute();

     if($executa){
       echo 'Dados inseridos com sucesso';
       header('location: gerentes.php');
     }
     else{
       echo 'Erro ao inserir os dados';
     }
   }
   catch(PDOException $e){
    echo $e->getMessage();
  }
}
require_once('footer.php');
?>

