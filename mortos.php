<?php
require_once("./views/layouts/header.php");
require_once("./models/DAO/FalecidoDAO.php");

$falecidos = new FalecidoDAO();
$falecidos = $falecidos->selectAll();
?>
<div class="container">
  <h1 class="text-center">Mortos</h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Cpf</th>
        <th scope="col">Data de Nascimento</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($falecidos as $falecido) { ?>
        <tr>
          <td scope="row" class="align-middle"><?= $falecido['id'] ?></td>
          <td scope="row" class="align-middle"><?= $falecido['nome'] ?></td>
          <td scope="row" class="align-middle"><?= $falecido['cpf'] ?></td>
          <td scope="row" class="align-middle"><?= $falecido['data_morte'] ?></td>
          <td class="table-light" style="width:15%">
            <a href="mortos_show.php?id=<?= $falecido['id'] ?>"><button type="button" class="btn btn-primary">Exibir</button></a>
            <a href="mortos_destroy.php?id=<?= $falecido['id'] ?>"><button type="button" class="btn btn-danger">Excluir</button></a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<?php
require_once("./views/layouts/footer.php");
?>