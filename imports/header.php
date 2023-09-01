<header>
    <nav>
        <div id="link-titulo">
            <a  href="index.php"><h1 class="titulo" id="titulo"> Helper carrot</h1></a>
            <img id="icone1" class="icone" onclick = "abreindex()" src="img/carroticon.png" alt="icone">
            <img id="icone" class="icone" onclick="abrirnav(this)" src="img/carroticon.png" alt="icone">
        </div> 


        <div id="side-nav" class="side-nav">
            <ul class="menunav">
                <li><a id="inicio" href="index.php">INÍCIO</a></li>
                <li><a id="simulacao" href="simulacao.php">SIMULAÇÃO</a></li>
                <li><a id="receitas" href="receitas.php">RECEITAS</a></li>          
            </ul>                  
            <ul class="menunav">
                <li><a id="cadastre_se" href="cadastro.php">CADASTRE-SE</a></li>
                <?php 
                    if(isset($_SESSION['usuario'])){
                ?>
                <li><a id="perfil" href="panel.php">PERFIL</a></li>
                <?php 
                    }else{
                ?>
                <li><a id="login" href="login.php">LOGIN</a></li>
                <?php 
                    }
                ?>            
            </ul>
        </div>

        </div id="nav">      
            <ul class="menu">
            <li><a id="inicio" href="index.php">INÍCIO</a></li>
            <li><a id="simulacao" href="simulacao.php">SIMULAÇÃO</a></li>
            <li><a id="receitas" href="receitas.php">RECEITAS</a></li>
        </ul>
        

        
        <div id="botoes">
            <a href="cadastro.php"><button id="cadastre_se" class="botao">CADASTRE-SE</button></a>
            <?php 
                if(isset($_SESSION['usuario'])){
            ?>
            <a href="panel.php"><button id="perfil" class="botao">PERFIL</button></a>
            <?php 
                }else{
            ?>
            <a href="login.php"><button id="login" class="botao">LOGIN</button></a>
            <?php 
                }
            ?>
        </div>
    </nav>
</header>