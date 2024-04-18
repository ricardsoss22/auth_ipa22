
<?php require "views/components/head.php" ?>

<form method="POST">
  <h1>Login</h1>
  <label>
    email:  
    <input name="email" value="<?= $_POST["email"] ?? "" ?>" />
  </label>
    <?php if(isset($errors["email"])) { ?>
    <p><?= $errors["email"] ?></p>
    <?php } ?>
  <label>
    Passoword:(Atkarto registretp profilu)
    <input name="password" />
  </label>
  <button>LogIn</button>
</form>

<?php require "views/components/footer.php" ?>

