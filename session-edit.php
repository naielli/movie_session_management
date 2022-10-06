<?php
session_start();
require 'dbcon.php';

$query2 = mysqli_query($con, "SELECT idfilme, titulopt FROM filmes");
$query3 = mysqli_query($con, "SELECT distinct sigla FROM sessoes");
$query4 = mysqli_query($con, "SELECT idsala, nomesala FROM salas");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  <title>UDESC Cine</title>
</head>

<body class="bg-dark bg-gradient">

  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/index.php">UDESCine</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="create-session.php">Nova Sessão</a>
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

    <?php include('message.php'); ?>

    <div class="row">
      <div class="col-md-12">
        <div class="card card bg-dark text-white">
          <div class="card-header">
            <h4> Editar Sessão
              <a href="index.php" class="btn btn-danger float-end">BACK</a>
            </h4>
          </div>
          <div class="card-body">

            <?php
            if (isset($_GET['idsessao'])) {
              $id_sessao = mysqli_real_escape_string($con, $_GET['idsessao']);
              $query = "SELECT  * 
                            FROM sessoes
                            left join filmes on sessoes.idfilme = filmes.idfilme  
                            Join salas on sessoes.idsala = salas.idsala
                            join horarios on sessoes.idhorario = horarios.idhorario
                             where sessoes.idsessao ='$id_sessao' ";
              $query_run = mysqli_query($con, $query);

              if (mysqli_num_rows($query_run) > 0) {
                $sessoes = mysqli_fetch_array($query_run);
            ?>

                <form action="code.php" method="POST">

                  <input type="hidden" id="idsessao" name="idsessao" value="<?= $sessoes['idsessao']; ?>">

                  <div class="mb-3">
                    <label for="idsala">Sala da Sessão</label>
                    <select class="form-select" id="idsala" name="idsala" aria-label="Default select example">
                      <option selected value="<?= $sessoes['idsala']; ?>"><?php echo $sessoes['nomesala'] ?></option>
                      <?php while ($sala = mysqli_fetch_array($query4)) { ?>
                        <option value="<?php echo $sala['idsala'] ?>"><?php echo $sala['nomesala'] ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="mb-3">
                    <label>Tipo da Sessão</label>
                    <input type="text" id="tiposessao" name="tiposessao" value="<?= $sessoes['tiposessao']; ?>" class="form-control">
                  </div>

                  <div class="mb-3">
                    <label for="idfilme">Filme da Sessão</label>
                    <select class="form-select" id="idfilme" name="idfilme" aria-label="Default select example">
                      <option selected value="<?= $sessoes['idfilme']; ?>"><?php echo $sessoes['titulopt'] ?></option>
                      <?php while ($prod = mysqli_fetch_array($query2)) { ?>
                        <option value="<?php echo $prod['idfilme'] ?>"><?php echo $prod['titulopt'] ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="mb-3">
                    <label for="sigla">Sigla</label>
                    <select class="form-select" id="sigla" name="sigla" aria-label="Default select example">
                      <option selected value="<?= $sessoes['sigla']; ?>"><?php echo $sessoes['sigla'] ?></option>
                      <?php while ($sigla = mysqli_fetch_array($query3)) { ?>
                        <option value="<?php echo $sigla['sigla'] ?>"><?php echo $sigla['sigla'] ?></option>
                      <?php } ?>
                    </select>
                  </div>


                  <div class="mb-3">
                    <label>Data Sessão</label>
                    <input type="date" id="datasessao" value="<?= $sessoes['datasessao']; ?>" class="form-control">
                  </div>

                  <div class="mb-3">
                    <label>Horário da Sessão</label>
                    <input type="time" id="horario" name="horario" value="<?= $sessoes['horario']; ?>" class="form-control">
                  </div>
                  <div class="mb-3">
                    <button type="submit" name="update_sessao" class="btn btn-primary">
                      Atualizar Sessão
                    </button>
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