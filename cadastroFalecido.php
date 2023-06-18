<?php
require_once("./views/layouts/header.php");
require_once("./models/DAO/FalecidoDAO.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $data_morte = $_POST["data_morte"];

    $falecido = new Falecido($name, $cpf, $data_morte);
    $falecidoDao = new FalecidoDAO();
    $falecidoDao->insert($falecido);
}
?>
<div class="container">
    <form method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome</label>
            <input required name="nome" type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="cpfInput" class="form-label">CPF</label>
            <input required name="cpf" type="text" class="form-control" id="cpfInput" placeholder="Informe o CPF" pattern="[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}" required>
            <small id="cpfHelp" class="form-text text-muted">O CPF deve seguir o formato 999.999.999-99.</small>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Data da Morte</label>
            <input required name="data_morte" type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php
require_once("./views/layouts/footer.php");
?>