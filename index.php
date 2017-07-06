<?php
	function __autoload($class_name){
		require_once '_classes/' . $class_name . '.php';

	}

?>

<!DOCTYPE html>
<html lang="=pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device=width, initial-scale=1"/>
		<title>Loja</title>
	<meta name="description" content="Loja"/>
	<meta name="robots" content="index, follow"/>
	<meta name="author" content="Luke Barros"/>
	
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">




</head>
<body>

	<div class="container">

		<?php

		$usuario = new usuarios();

		if(isset($_POST['cadastrar'])):

			$email = $_POST['email'];
			$senha = $_POST['senha'];

			$usuario->setEmail($email);
			$usuario->setSenha($senha);

			if($usuario->insert()){
				echo "Inserido com sucesso!!";
			
			}endif;

		?>





		<header class="masthead">
			<h1 class="muted">Loja</h1>
			<nav class="navbar">
				<div class="navbar-inner">
					<div class="container">
						<ul class="nav">
							<li class="active"><a href="index.php">Página inicial</a></li>
						</ul>	
					</div>
				</div>
			</nav>
		</header>

		<?php 
		if(isset($_POST['atualizar'])):



			$id =    $_POST['id'];
			$email = $_POST['email'];
			$senha = $_POST['senha'];

			$usuario->setId($id);
			$usuario->setEmail($email);
			$usuario->setSenha($senha);
			

			foreach($usuario as $key => $value) {
    			print "$key => $value\n";
			}

			if ($usuario->update($id)) {
				echo "Atualizado com sucesso! $id $email $senha ";
				
			}


			endif;
		 ?>

		<?php 
		if(isset($_GET['acao']) && $_GET['acao'] == 'deletar'):

			$id = (int)$_GET['id'];
			if ($usuario->delete($id)) {
				echo "Deletado com sucesso!";
			}

			endif;
		 ?>

		<?php 
		if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){

			$id = (int)$_GET['id'];
			$resultado = $usuario->find($id);


		?>

		<form method="post" action "">
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="email" placeholder="E-mail:" value="<?php echo $resultado->email; ?>" />
			</div>

			<div class="input-prepend">
				<span class="add-on"><i class="icon-asterisk"></i></span>
				<input type="text" name="senha" placeholder="Senha:" value="<?php echo $resultado->senha; ?>"/>

			</div>
			<input type="text" name="id" value="<?php echo $resultado->id; ?>">
			<br />
			<input type="submit" name="atualizar" class="btn btn-primary" value="Atualizar dados">

			<?php }else {?>


		<form method="post" action "">
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="email" placeholder="E-mail:" />
			</div>

			<div class="input-prepend">
				<span class="add-on"><i class="icon-asterisk"></i></span>
				<input type="password" name="senha" placeholder="Senha:"/>

			</div>
			<br />
			<input type="submit" name="cadastrar" class="btn btn-primary" value="Cadastrar dados">
		</form>

		<?php } ?>
		<table class="table table-hover">


			<thead>
				<tr>
					<th>#</th>
					<th>E-mail:</th>
					<th>Senha:</th>
					<th>Acoes:</th>

				</tr>
			</thead>

			<?php 
				foreach ($usuario->findAll() as $key => $value): ?>

			<tbody>
				<tr>
					<td><?php echo $value->id; ?></td>
					<td><?php echo $value->email; ?></td>
					<td><?php echo $value->senha; ?></td>				
					<td>
						<?php echo "<a href='index.php?acao=editar&id=" .  $value->id . "'>Editar</a>"; ?>
						<?php echo "<a href='index.php?acao=deletar&id=" . $value->id . "'onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
					</td>
				</tr>
			</tbody>

		<?php endforeach; ?>



	</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="jhttps://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>