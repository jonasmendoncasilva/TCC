<?php
  session_start(); 
  include("imports/head.php");
?>
  <link rel="stylesheet" href="styles/Login.css">
</head>
<body>
  <?php include("imports/header.php"); ?>

  <!--Section-->
  <section onclick="fecharnav(icone)">
    <?php if(isset($_SESSION['invalid'])): ?>
    <div class="erro">
      <p class="msg_erro">ERRO: Usuário ou senha invalidos</p>
    </div>
    <?php 
      endif; 
      unset($_SESSION['invalid']);
    ?>
    <form action="exe_login.php" method="POST" class="login">
      <input class="inputs" type="text"     name="usuario" id=""placeholder="Usuário" autofocus="">
      <input class="inputs" type="password" name="senha" id=""placeholder="Senha">
      <input class="inputs" type="submit"   name="submit" value="Entrar" id="submit">
    </form>
  </section>
  <!--EndSection-->

  <footer>
  </footer>


</body>
</html>