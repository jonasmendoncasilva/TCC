<?php 
  session_start();  
  include("imports/head.php");
?>
  <link rel="stylesheet" href="styles/Cadastro.css">
</head>
<body>
  <?php include("imports/header.php"); ?>

  <!--Section-->
  <section onclick="fecharnav(icone)">
    <!----------------- cadastro realizado -------------------->
    <?php 
      if(isset($_SESSION['cadastro'])): 
    ?>
    <div class="sucesso">
      <p class="msg">Cadastro realizado, faca seu login  <a class="link-login" href="login.php">aqui</a></p>
    </div>
    <?php 
      endif;
      unset($_SESSION['cadastro']); 
    ?>
    <!------------------ erro de usuário ----------------------->
    <?php 
      if(isset($_SESSION['user_exist'])):
    ?>
    <div class="erro">
      <p class="msg">Este usuário já foi cadastrado</p>
    </div>
    <?php 
      endif; 
      unset($_SESSION['user_exist']); 
    ?>
    <!------------------ erro de login ----------------------->
    <?php 
      if(isset($_SESSION['usuario'])):
    ?>
    <div class="erro">
      <p class="msg">Desconecte-se da conta atual para se cadastrar</p>
    </div>
    <?php 
      endif; 
    ?>
    <!------------ erro de confirmação de senha --------------->
    <?php
      if(isset($_SESSION['passwd_error'])):
    ?>
    <div class="erro">
      <p class="msg">As senhas não são iguais</p>
    </div>
    <?php
      endif;
      unset($_SESSION['passwd_error']);
    ?>
    <!------------ erro de seleção de  gênero ----------------->
    <?php
      if(isset($_SESSION['gender_error'])):
    ?>
    <div class="erro">
      <p class="msg">Escolha um gênero</p>
    </div>
    <?php
      endif;
      unset($_SESSION['gender_error']);
    ?>
    <!------------ erro de campos vazios -------------------->
    <?php
      if(isset($_SESSION['empty_error'])):
    ?>
    <div class="erro">
      <p class="msg">Preencha todos os campos</p>
    </div>
    <?php
      endif;
      unset($_SESSION['empty_error']);
    ?>
    <!--------------- formulário de cadastro ------------------>
    <form action="exe_cadastro.php" method="POST" class="cadastro">
      <input class="inputs" type="text" name="usuario" id="usuario" placeholder="Nome de usuário" autofocus="">      
      <select class="inputs seletor" name="genero"     id="genero">
        <option style="display: none">Gênero</option>
        <option>Masculino</option>
        <option>Feminino</option>
      </select>
      <input class="inputs" type="password" name="senha"              id="senha"                     placeholder="Senha">
      <input class="inputs" type="text"     name="data_de_nascimento" id="troca"           placeholder="Data de nascimento" onfocus="document.getElementById('troca').type = 'date'" onblur="document.getElementById('troca').type = 'text'">
      <input class="inputs" type="password" name="confirmar_senha"    id="confirmar_senha" placeholder="Confirmar senha">
      <input class="inputs" type="submit"   name="submit"             id="submit"             value="Cadastrar">
    </form>
    <!--------------------------------------------------------->
  </section>
  <!--EndSection-->

  <footer>
  </footer>


</body>
</html>