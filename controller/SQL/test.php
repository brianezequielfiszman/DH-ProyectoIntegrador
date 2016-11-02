<?php
const DB_DSN  = 'mysql:host=localhost;dbname=test;charset=utf8mb4;port:3306';
const DB_USER = 'root';
const DB_PASS = 'as time goes by';

$db = new PDO(DB_DSN, DB_USER, DB_PASS);
// $createMovies = 'CREATE TABLE pelicula(id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, nombre VARCHAR(30) NOT NULL, rating VARCHAR NOT NULL, fecha_de_estreno DATETIME NOT NULL)';

$queryGen = $db->prepare('SELECT id, nombre FROM pelicula');
$queryGen->execute();
$resultsGen = $queryGen->fetchAll(PDO::FETCH_ASSOC);
print_r($resultsGen);
// echo "<pre>";
// var_dump($resultsGen);
// echo "</pre>";
if(!empty($_POST)){

	$queryTit = $db->prepare('SELECT id FROM pelicula WHERE nombre = :nombre');
	$queryTit->execute([
		':nombre' => $_POST['titulo']
	]);

	var_dump($queryTit);

	$fecha_de_estreno = $_POST['anio'].'-'.$_POST['mes'].'-'.$_POST['dia'];

	if($queryTit->rowCount()){
		$arrayPeli = $queryTit->fetch(PDO::FETCH_ASSOC);
		$query = $db->prepare('UPDATE pelicula SET rating = :rating, premios = :premios, duracion = :duracion, fecha_de_estreno = :fecha_de_estreno, id_genero = :id_genero WHERE id = :id');
		$query->execute([
			':id' => $arrayPeli['id'],
			':rating' => $_POST['rating'],
			':fecha_de_estreno' => $fecha_de_estreno,
		]);
		var_dump($query->execute());
	} else {
	  $sql  = "INSERT INTO pelicula (nombre, rating, fecha_de_estreno) ";
	  $sql .= "VALUES (:nombre, :rating, :fecha_de_estreno)";

	  $query = $db->prepare($sql);
	  $query->bindParam(':nombre', $_POST['titulo']);
	  $query->bindParam(':rating', $_POST['rating']);
	  $query->bindParam(':fecha_de_estreno', $fecha_de_estreno);

	  // ejecuta y hace var_dump
	  var_dump($query->execute());
	}
}
?>
<html>
    <head>
        <title>Agregar Pelicula</title>
    </head>
    <body>
        <form id="agregarPelicula" name="agregarPelicula" method="POST">
            <div>
                <label for="titulo">Titulo</label>
                <input type="text" name="titulo" id="titulo"/>
            </div>
            <div>
                <label for="rating">Rating</label>
                <input type="text" name="rating" id="rating"/>
            </div>
            <div>
                <label for="premios">Premios</label>
                <input type="text" name="premios" id="premios"/>
            </div>
            <div>
                <label for="duracion">Duracion</label>
                <input type="text" name="duracion" id="duracion"/>
            </div>

				<div>
                <label>Genero</label>
                <select name="genero">
                    <option value="">Seleccione</option>
						  <?php foreach ($resultsGen as $arrayGen) { ?>
							  <option value="<?= $arrayGen['id']; ?>"><?= $arrayGen['nombre']; ?></option>
						  <?php } ?>
                </select>
            </div>

            <div>
                <label>Fecha de Estreno</label>
                <select name="dia">
                    <option value="">Dia</option>
                    <?php for ($i=1; $i < 32; $i++) { ?>
                        <option value="<?php echo $i; ?>"><?= $i; ?></option>
                    <?php } ?>
                </select>
                <select name="mes">
                    <option value="">Mes</option>
                    <?php for ($i=1; $i < 13; $i++) { ?>
                        <option value="<?php echo $i; ?>"><?= $i; ?></option>
                    <?php } ?>
                </select>
                <select name="anio">
                    <option value="">Anio</option>
                    <?php for ($i=1900; $i < 2017; $i++) { ?>
                        <option value="<?= $i; ?>"><?= $i; ?></option>
                    <?php } ?>
                </select>
            </div>


            <input type="submit" value="Agregar Pelicula" name="submit"/>
        </form>
    </body>
</html>
