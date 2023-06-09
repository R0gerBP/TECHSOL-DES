<?php

	require_once("../../config/conexion.php");
	if(isset($_SESSION["id_usu"])){

?>
<!DOCTYPE html>
<html>
        <?php require_once("../MainHead/head.php");?>
        <title>TECHSOL</>::home</title>
</head>
<body class="with-side-menu">

        <?php require_once("../MainHeader/header.php");?>

	<div class="mobile-menu-left-overlay"></div>

         <?php require_once("../MainNav/nav.php");?>


	<div class="page-content">
		<div class="container-fluid">
			<header class="section-header">
				<div class="tbl"></div>
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>Nuevo Ticket</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Home</a></li>
								<li class="active">Nuevo Ticket</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">

				<h5 class="m-t-lg with-border">Ingresar Requerimiento</h5>

				<div class="row">
					<form method="post" id="ticket_from">

						<input type="hidden" id="id_usu" name="id_usu" value="<?php echo $_SESSION["id_usu"] ?>">

						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="id_cat">Categoria</label>
								<select id="id_cat" name="id_cat" class="form-control"></select>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="tick_titulo">Titulo</label>
								<input type="text" class="form-control" id="tick_titulo" name="tick_titulo" placeholder="Ingrese Titulo">
							</fieldset>
						</div>
						<div class="col-lg-12">
							<fieldset class="form-group">
								<label class="form-label semibold" for="tick_descrip">Descripción</label>
								<div class="summernote-theme-1">
									<textarea id="tick_descrip" name="tick_descrip" class="summernote" name="name"> </textarea>
								</div>		
							</fieldset>
						</div>
						<div class="col-lg-12">
							<button type="submit" name="acction" value="add" class="btn btn-rounded btn-inline btn-primary">Guardar</button>
						</div>
					</form>
				</div><!--.row-->

			</div>
		</div>
	</div>
		
	<?php require_once("../MainJS/js.php");?>
	<script type="text/javascript" src="nuevoticket.js"></script>

</body>
</html>

<?php
}else{
	header("Location:".Conectar::ruta()."index.php");
}
?>