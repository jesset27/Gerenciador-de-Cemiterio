<?php
require_once("./views/layouts/header.php");
require_once("./models/DAO/UsuarioDAO.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = new UsuarioDAO();
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $user->login($email, $senha);
    $login = ($user->login($email, $senha)) ? "Login efetuado" : "Login incorreto";
    echo $login;
}
?>
<link rel="stylesheet" href="./assets/css/style.css">
<div class="container">
    <div class="home">
        <img class="home-page" src="./assets//img/caveira.avif" alt="">
        <div class="home-page">
            <form method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">Nós não vamos compartilhar seu email com ninguém!</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Senha</label>
                    <input name="senha" type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-dark">Submit</button>
            </form>
            <p>Não tem conta? <a class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="cadastroUsuario.php">Clique aqui</a></p>
        </div>
    </div>
</div>
<?php
require_once("./views/layouts/footer.php");
?>