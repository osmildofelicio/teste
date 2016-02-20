<?php 
class VerIMC {
	public function calcImc ($massa,$medidas){
		$imc = $massa/($medidas * $medidas);
		return $imc;
	}
	
}
 
?>
<!DOCTYPE html>
<html>
<head>
<title>IMC
</title>
         <style>
             
            .bc {
                background-color: antiquewhite;
                font-family: arial, helvetica, sans-serif;  
                font-size: 11;
                               
             }
            .f1 {
                color:#0000ff;
                font-weight: bold;
                font-family: arial, helvetica, sans-serif;
                font-size: 11;
            }
            .f2 {
                color:saddlebrown;
                font-weight: bold;
                font-family: arial, helvetica, sans-serif;
                  font-size: 11;
            }
            .f3 {
                color:#cc0000;
                font-weight: bold;
                font-family: arial, helvetica, sans-serif;
                font-size: 11;
                
            }
            .f4 {
                color:antiquewhite;
                font-style:normal;
                font-family: arial, helvetica, sans-serif;
                font-size: 11;
            }
        </style>
</head>
<body>
       <div border="1" align="center" width="300" heigth="200" class="bc" >
<?php 
$Sexo = isset ($_GET['sexo'])?$_GET['sexo']:'';
$Peso = isset ($_GET['peso'])?$_GET['peso']:'1';
$Altura = isset ($_GET['altura'])?$_GET['altura']:'1.0';
?>
<form action="imc.php" method="get">
    <label>Mulher </label><input type="radio" name="sexo" value="1" >  
    <label>Homem </label><input type="radio" name="sexo" value="2" ><br>   
<label>Qual o seu peso?</label><input type="number" name="peso" value="<?= $Peso; ?>"><br>
<label>Qual a sua altura?</label><input type="text" name="altura" value="<?= $Altura; ?>"><br>
<input type="submit" value="enviar">
</form>

<?php 
$objIMC = new VerIMC();
$IMCFinal = $objIMC-> calcImc($Peso,$Altura); 
if ($IMCFinal == 1){?> 
 <div class="f4">
<?="Seu IMC: ".$IMCFinal;?>
 </div>        
<?php }
else{?>
<div class="f1">
<?="Seu IMC: ".$IMCFinal;?>
 </div> 
   
<?php }	
switch ($Sexo) {
    case 1:
            if ($IMCFinal < 19 )  {?>
               <div class="f3" >
                    <?='Muito abaixo do peso!';?>
                    </div>
            <?php
            }
            elseif (($IMCFinal >= 19 )&&($IMCFinal <= 23.9)){?>
                <div class="f1">
                    <?='Peso Ideal!';?>
                    </div>
            <?php 
            }
            elseif (($IMCFinal >= 23.9 )&&($IMCFinal <= 28.9)){?>
                    <div class="f1">
                    <?='Levemente acima do peso!';?>
                    </div>
            <?php 
            }
            elseif (($IMCFinal >= 28.9 )&&($IMCFinal <= 34.9)){ ?>
                    <div class="f2">
                    <?='Obesidade grau 1!';?>
                    </div>
            <?php 
            }
            elseif (($IMCFinal >= 34.9 )&&($IMCFinal <= 39.9)){ ?>
                    <div class="f3">
                    <?='Obesidade grau 2!';?>
                    </div>
            <?php
            }
            else{ ?>
                    <div class="f3">
                    <?="Cuidado, Obesidade Morbida!";?>
                    </div>
            <?php 
            }
            break;
    case 2:
        if ($IMCFinal < 20 )  {?>
               <div class="f3" >
                    <?='Muito abaixo do peso!';?>
                    </div>
            <?php
            }
            elseif (($IMCFinal >= 20 )&&($IMCFinal <= 24.9)){?>
                <div class="f1">
                    <?='Peso Ideal!';?>
                    </div>
            <?php 
            }
            elseif (($IMCFinal >= 24.9 )&&($IMCFinal <= 29.9)){?>
                    <div class="f1">
                    <?='Levemente acima do peso!';?>
                    </div>
            <?php 
            }
            elseif (($IMCFinal >= 29.9 )&&($IMCFinal <= 34.9)){ ?>
                    <div class="f1">
                    <?='Obesidade grau 1!';?>
                    </div>
            <?php 
            }
            elseif (($IMCFinal >= 34.9 )&&($IMCFinal <= 39.9)){ ?>
                    <div class="f3">
                    <?='Obesidade grau 2!';?>
                    </div>
            <?php
            }
            else{ ?>
                    <div class="f3">
                    <?="Cuidado, Obesidade Morbida!";?>
                    </div>
            <?php 
            }
             break;
    }
?>
    </div>
</body>
</html>
