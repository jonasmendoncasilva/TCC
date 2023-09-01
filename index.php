<?php include("imports/head.php"); ?>
  <link rel="stylesheet" href="styles/index.css">
</head>
<body>
  <?php include("imports/header.php"); ?>

  
  <!--Section-->
  <section onclick="fecharnav(icone)">    
    <h1 class="titulosec">Saiba seu estado nutricional</h1>

    <div class="cards">
      <!--Card1-->
      <div class="card1">
        <div class="linha1" >
          <h1 class="h1">Descubra seu peso ideal</h1>
          <p class="p">Saiba se esta dentro do peso ou quanto precisa emagrecer ou ate mesmo engordar, mas claro, com ganho de massa e não gordura</p>
          <a href="simulacao.php"><button class="botaoc">Eu quero</button></a> 
        </div>
        <img class="fotos balanca"src="img/balanca.jpg">
      </div>
      <!--Card2-->
      <div class="card2">
        <img class="fotos tomate"src="img/tomate.jpg">
        <div class="linha2" >
          <h1 class="h1" >Site focado em crianças e adolescentes</h1>
          <p class="p">Focamos na classe juvenil, que é a mais afetada pela má alimentação nos dias atuais</p>
        </div>
      </div>
      <!--Card3-->
      <div class="card3">
        <div class="linha3" >
          <h1 class="h1" >Descubra receitas saudáveis</h1>
          <p class="p">Temos receitas incríveis para você se <br>alimentar melhor</p>
          <a href="receitas.php"><button class="botaoc">Eu quero</button></a>
        </div>
        <img class="fotos comida"src="img/comida.jpg">
      </div>
    </div>
  </section>
  <!--EndSection-->
  
  <footer>
  </footer>

</body>
</html>