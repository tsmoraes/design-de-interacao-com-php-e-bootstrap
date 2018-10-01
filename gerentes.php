<?php
require_once('header.php');
?>
<nav class="navbar navbar-expand-lg navbar-primary bg-dark">
  <div class="container">
    <a class="navbar-brand" href="http://studeo.unicesumar.edu.br/#!/app/studeo/aluno/ambiente/disciplina/2018_EGRAD_ADSIS3-53_EGRAD_ADSIS100_004">DESIGN DE INTERAÇÃO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Funcionários</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="gerentes.php">Gerentes</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Análise e Desenvolvimento de Sistemas
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="https://www.unicesumar.edu.br/ead/cursos-graduacao/analise-e-desenvolvimento-de-sistemas/">Sobre o Curso</a>
            <a class="dropdown-item" href="https://www.unicesumar.edu.br/conheca-a-unicesumar/
            ">Conheça a UniCESUMAR</a>
            <a class="dropdown-item" href="https://www.unicesumar.edu.br/campus-polos-e-unidades/">Polos</a>
          </div>
        </li>
      </ul>
      <a href="addGerente.php" class="btn btn-primary">Adicionar</a>
    </div>
  </div>
</nav>
<br>

<?php
require_once('connection.php');

try{
  $stmte = $pdo->query("SELECT * FROM $tbl_gerentes order by nome");
  $executa = $stmte->execute();
  ?>
  <div class="container">
    <h1>Gerentes</h1>
    <table align="center" class="table table-striped table-dark table-responsive table-hover">
      <caption>CRUD de Gerentes</caption>
      <td><b>Nome</td><td><b>CPF</td><td><b>RG</td><td><b>Endereço</td><td><b>UF</td><td colspan="2" align="center">Opções</td></tr>

        <?php
        if($executa){
        while($reg = $stmte->fetch(PDO::FETCH_OBJ)){ // Para recuperar um ARRAY utilize PDO::FETCH_ASSOC 
          ?>
          <tr>
            <td><?=$reg->nome?></td>
            <td><?=$reg->cpf?></td>
            <td><?=$reg->rg?></td>
            <td><?=$reg->endereco?></td>
            <td><?=$reg->estado?></td>
            <td><a href="updateGerente.php?id=<?=$reg->id?>">Editar</a></td>
            <td><a href="deleteGerente.php?id=<?=$reg->id?>">Excluir</a></td></tr>
            <?php
          }
          print '</table>';
          print '</div>';
        }else{
         echo 'Erro ao inserir os dados';
       }
     }catch(PDOException $e){
      echo $e->getMessage();
    }

    require_once('footer.php');
