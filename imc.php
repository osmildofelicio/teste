<?php 
class VerIMC {
	public function calcImc ($massa,$medidas){
		$imc = $massa/($medidas * $medidas);
		return $imc;
	}
	
}
 

?>

<html>
<head>
<title>IMC
</title>
         <style>
            .f1 {
                color:#0000ff;
                font-weight: bold;
            }
            .f2 {
                color:#cc0000;
                font-weight: bold;
            }
        
        </style>
</head>
<body>
<?php 
$Peso = isset ($_GET['peso'])?$_GET['peso']:'0';
$Altura = isset ($_GET['altura'])?$_GET['altura']:'0';
?>
<form action="imc.php" method="get">
<label>Qual o seu peso?</label><input type="number" name="peso" value="<?= $Peso; ?>"><br>
<label>Qual a sua altura?</label><input type="text" name="altura" value="<?= $Altura; ?>"><br>
<input type="submit" value="enviar">
</form>

<?php 

$objIMC = new VerIMC();
$IMCFinal = $objIMC-> calcImc($Peso,$Altura);?>
<div class"f1">
<?="Seu IMC é:".$IMCFinal;?>
</div>
<?php
if ($IMCFinal < 18.5 ){?>
   <div class"f1">
	<?='Muito abaixo do peso!';?>
	</div>
<?php
}
elseif (($IMCFinal >= 18.6 )&&($IMCFinal <= 24.9)){?>
    <div class"f1">
	<?='Peso Ideal!';?>
	</div>
<?php 
}
elseif (($IMCFinal >= 25 )&&($IMCFinal <= 29.9)){?>
	<div class"f1">
	<?='Levemente acima do peso!';?>
	</div>
<?php 
}
elseif (($IMCFinal >= 30 )&&($IMCFinal <= 34.9)){ ?>
	<div class"f1">
	<?='Obesidade grau 1!';?>
	</div>
<?php 
}
elseif (($IMCFinal >= 35 )&&($IMCFinal <= 39.9)){ ?>
	<div class"f1">
	<?='Obesidade grau 2!';?>
	</div>
<?php
}
else{ ?>
	<div class"f1">
	<?="Cuidado, você está em Obesidade Mórbida!";?>
	</div>
<?php 
}
?>
</body>
</html>