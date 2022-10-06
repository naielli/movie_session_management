<?php
session_start();
require 'dbcon.php';
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <title>Sessão View</title>
</head>

<body class="bg-dark bg-gradient">

  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">UDESCine</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="session-create.php">Nova Sessão</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="movie.php">Filmes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="room-view.php">Salas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="rank.php">Ranking</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <div class="container mt-5">

    <div class=" row">
      <div class="col-md-12">
        <div class="card bg-dark text-white mb-3">
          <div class="card-header">
            <h4>Filmes Detalhes
              <a href="movie.php" class="btn btn-danger float-end">BACK</a>
            </h4>
          </div>
          <div class="card-body">

            <?php
            if (isset($_GET['idfilme'])) {
              $idfilme = mysqli_real_escape_string($con, $_GET['idfilme']);
              $query = "SELECT titulopt,tituloen,classificacao,duracao, sinopse, nomediretor, 
              nomepais,nomegenero,elenco
                            FROM filmes
                            JOIN diretores on diretores.iddiretor = filmes.iddiretor
                            JOIN paises ON paises.idpais = filmes.idpais 
                            left join generos on filmes.idgenero = generos.idgenero
                            where filmes.idfilme = '$idfilme'";
              $query_run = mysqli_query($con, $query);


              if (mysqli_num_rows($query_run) > 0) {
                $sessoes = mysqli_fetch_array($query_run);
            ?>

                <div class="mb-3 row">
                  <div class="mb-3 col-3">
                    <img src="https://th.bing.com/th/id/OIP.k6g7Q5L0zHbn1llMloQmQgHaLu?w=198&h=314&c=7&r=0&o=5&pid=1.7" alt="">
                  </div>
                  <div class="mb-3 col-5">
                    <p class=" h3"><?= $sessoes['titulopt']; ?></p>

                    <p class="badge bg-warning"><?= $sessoes['classificacao']; ?></p>
                    <p class="badge bg-warning"><?= $sessoes['nomegenero']; ?></p>
                    <p class="badge bg-warning">Duração :<?= $sessoes['duracao']; ?></p>
                    <p class="text-justify"><?= $sessoes['sinopse']; ?></p>
                  </div>
                </div>

                <div class="row ps-5">

                  <p class="col-4 ms-1">
                    <label class=" row">Titulo Original</label>
                    <?= $sessoes['tituloen']; ?>
                  </p>
                  <p class="col-4 ms-1">
                    <label class="row">Elenco</label>
                    <?= $sessoes['elenco'] ?>
                  </p>
                  <p class="col-4 ms-1 ">
                    <label class="row">Diretor</label>
                    <?= $sessoes['nomediretor']; ?>
                  </p>
                  <p class="col-3 ms-1">
                    <label class="row">País Origem</label>
                    <?= $sessoes['nomepais']; ?>
                  </p>

                </div>
          </div>

      <?php
              } else {
                echo "<h4>No Such Id Found</h4>";
              }
            }
      ?>
        </div>
      </div>
    </div>
  </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>