<?php
require_once("./views/layouts/header.php");
require_once("./models/DAO/UsuarioDAO.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $user = new Usuario($nome, $email, $senha);
    $userDao = new UsuarioDAO();
    $userDao->insert($user);
}
?>
<div class="container">
    <form method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome</label>
            <input required name="nome" type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="cpfInput" class="form-label">Email</label>
            <input required name="email" type="text" class="form-control" id="cpfInput" placeholder="Informe o email">
            <small id="email" class="form-text text-muted">Nós não vamos compartilhar seu email com ninguém!</small>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Senha</label>
            <input required name="senha" type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php
require_once("./views/layouts/footer.php");
?>