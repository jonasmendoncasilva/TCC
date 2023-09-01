<?php 
  session_start();
  include("imports/conection.php");  
  include("imports/head.php");
?>
  <link rel="stylesheet" href="styles/Simulacao.css">
</head>
<body>
  <?php include("imports/header.php"); ?>

  <!--Section-->
  <section onclick="fecharnav(icone)">
    
    <!--Formulário-->
    <form>
      <h2 class="h21">Faça uma simulação para saber seu estado de saúde</h2>
      <h2 class="h22">Calculo do IMC:</h2>

      <div class="" id="erro">
        <p class="msg"></p>
      </div>

      <div>
        <!--1° linha, idade, peso, e altura-->
        <div class="primeiro">
          <div class="input_label">
            <label class="label">Idade:</label>
            <input class="inputs menor" id="idade" type="number" placeholder="15">
          </div>

          <div class="input_label">
            <label class="label">Peso(Kg):</label>
            <input class="inputs menor" id="peso" type="number" step="0.01" min="0" placeholder="54,6">
          </div>

          <div class="input_label">
            <label class="label">Altura(m)</label>
            <input class="inputs menor" id="altura" type="number" placeholder="1,6">
          </div>
        </div>

        <!--2° linha, genero e atividade fisica-->

        <div class="segundo">
          <div class="input_label">
            <label class="label">Gênero</label>
            <select class="inputs seletor menor" id="genero">
              <option style="display: none"></option>
              <option>Masculino</option>
              <option>Feminino</option>
            </select>
          </div>
          <div class="input_label">
            <label class="label">Atividade física:</label>
            <select class="inputs seletor menor" id="atividade_fisica">
              <option style="display: none"></option>
              <option>Sedentarismo</option>
              <option>Leve</option>      
              <option>Moderada</option>      
              <option>Intensa</option>     
            </select>            
          </div>
        </div>
      </div>

      <!-- Botao submit -->
      <button class="calculo" name="submit" id="submit" type="button" >Calcular</button>
    </form>
    <!--Fim do formulário-->
    
    <!--4° linha, resultado e peso ideal-->
    <div class="resultado">

      <div class="input_label">
        <label class="label">IMC:</label>
        <input class="inputs rmenor" id="imc" type="text" disabled>
      </div>

      <div class="input_label">
        <label class="label">Classificação:</label>
        <input class="inputs rmenor" id="classificacao" type="text" disabled>
      </div>

      <div class="input_label">
        <label class="label">Peso ideal:</label>
        <input class="inputs rmenor" id="peso_ideal" type="text" disabled>
      </div>

      <div class="input_label">
        <label class="label">eer:</label>
        <input class="inputs rmenor" id="eer" type="text" disabled>
      </div>
    </div>
    
  </section>
  <!--EndSection-->

  <footer>
  </footer>
   
</body>
</html>
<script>

  $(document).ready(function(){
    $('#submit').click(function(){
      var idade = $('#idade').val();
      var peso = $('#peso').val();
      var atividade_fisica = $('#atividade_fisica').val();
      var genero = $('#genero').val();
      var altura = $('#altura').val();
      
      var imc = 0;
      var classificacao = 0;
      var peso_ideal = 0;
      var eer = 0;
      var id = null;
      
      var pa = 0;

      $('#erro').html('');
      if (idade == '' || peso == '' || atividade_fisica == '' || genero == '' || altura == '' ){
        $('#erro').html('Informe todos os valores');
        $('#erro').addClass('erro');
        setTimeout(function() {
          document.querySelector('.erro').classList.remove('erro');
          $('#erro').html('');
        }, 5000);
        return false;
      }

      //calcula o imc
      imc = peso/(altura*altura);
      if(imc >= 30 ){
        classificacao_aux = "Obesidade";
        classificacao = "Obesidade";
      }
      else if(imc <= 29.9 && imc >= 25){
        classificacao_aux = "Sobrepeso";
        classificacao = "Sobrepeso";
      }
      else if(imc <= 24.9 && imc >= 18.5){
        classificacao_aux = "Peso ideal";
        classificacao = "Peso ideal";
      }
      else if(imc <= 18.4 && imc >= 16){
        classificacao_aux = "Baixo peso";
        classificacao = "Baixo peso";
      }
      else if(imc< 16){
        classificacao_aux = "Desnutrição";
        classificacao = "Desnutricao";      
      }
      //calcula o EER e PESO IDEAL masculino
      if(genero == "Masculino"){
        // EER
        if(atividade_fisica == "Sedentarismo"){
          pa = 1;
          eer =  88.5 - 61.9 * idade + pa * (26.7 * peso + 903 * altura + 25);                           
        }
        else if(atividade_fisica == "Leve"){
          pa = 1.13;
          eer =  88.5 - 61.9 * idade + pa * (26.7 * peso + 903 * altura + 25);         
        }
        else if(atividade_fisica == "Moderada"){
          pa = 1.26;
          eer =  88.5 - 61.9 * idade + pa * (26.7 * peso + 903 * altura + 25);                    
        }
        else if(atividade_fisica == "Intensa"){
          pa = 1.42;
          eer =  88.5 - 61.9 * idade + pa * (26.7 * peso + 903 * altura + 25);
        }

        // PESO IDEAL
      }
      //calcula o EER e PESO IDEAL feminino
      if(genero == "Feminino"){
        // EERw
        if(atividade_fisica == "Sedentarismo"){
          pa = 1;
          eer =  135.3 - 30.8 * idade + pa * (10 * peso + 934 * altura + 25);
        }
        else if(atividade_fisica == "Leve"){
          pa = 1.16;
          eer =  135.3 - 30.8 * idade + pa * (10 * peso + 934 * altura + 25);        
        }
        else if(atividade_fisica == "Moderada"){
          pa = 1.31;
          eer =  135.3 - 30.8 * idade + pa * (10 * peso + 934 * altura + 25);
        }
        else if(atividade_fisica == "Intensa"){
          pa = 1.56;
          eer =  135.3 - 30.8 * idade + pa * (10 * peso + 934 * altura + 25);
        }

        // PESO IDEAL
      }
      //imprime os valores
      imc = round(imc, 2);
      eer = round(eer, 2);
      document.getElementById("imc").value = imc;
      document.getElementById("classificacao").value = classificacao_aux;          
      document.getElementById("eer").value = eer;
      
      $.ajax({
        url:'exe_simulacao.php',
        method: 'POST',
        data: {
          id: id,

          idade: idade,
          peso: peso,
          atividade_fisica: atividade_fisica,
          altura: altura,

          imc: imc,
          classificacao: classificacao,
          peso_ideal: peso_ideal,
          eer: eer
        }

      })



    })
  })
  
</script>
