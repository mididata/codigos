<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>DPaginação</title>
</head>

<body>
<?php require_once ("conecta-pdo.php"); ?>

<?php
$vPgAtual = $_GET['pagina'];
$vItensPP = 4;
$vItensPula = $vPgAtual * $vItensPP;
$vRegIni = $vItensPula - $vItensPP;

$vQuery = "SELECT cod, nome_completo FROM candidatos LIMIT $vRegIni, $vItensPP";
$listaEmpregados = $pdo->query($vQuery)->fetchAll();
echo $vQuery;
echo "<br />";
foreach ($listaEmpregados as $reg){ ?>
<p><?php echo $reg['cod'] . ' - ' . $reg['nome_completo']; ?></p>
<?php }
?>


<?php
$vLinkAnt = $vPgAtual - 1;
//Checa se há próximo link
$vRegIniProx = $vRegIni + $vItensPP;
$vChecaProx = "SELECT cod, nome_completo FROM candidatos LIMIT $vRegIniProx, $vItensPP";
$vListaChecaProx = $pdo->query($vChecaProx)->fetchAll();
if ($vListaChecaProx) {
$vLinkProx = $vPgAtual + 1;
} else {
$vLinkProx='';	
}
echo "<br />";
echo $vChecaProx;
echo "<br />";

?>
<table><tr>

<td><?php if ($vPgAtual>1) { ?><a href="a-testapaginacao.php?pagina=<?php echo $vLinkAnt; ?>">Ant</a> <?php } ?></td>
<td>Página Atual: <?php echo $vPgAtual; ?></td>
<td><?php if ($vLinkProx!='') { ?><a href="a-testapaginacao.php?pagina=<?php echo $vLinkProx; ?>">Próx</a> <?php } ?></td>



</tr>


</table>


</body>
</html>