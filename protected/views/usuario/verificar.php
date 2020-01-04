<?php
$this->breadcrumbs=array(
	'Verificar E-mail de Usuarios',
);

?>

<h1>Enhorabuena! ha verificado su dirección de correo electrónico correctamente!</h1>
<?php
if ($dataProvider == Null)
{
?>
El Enlace que está usando para verificar su dirección de correo electrónico ya ha sido usado,
en consecuencia, la dirección de correo ya se encuentra verificada.
<?php }

else
{
?>
La Dirección de e-mail ha sido verificada como válida.
<?php }


?>

