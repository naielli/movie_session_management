<?php
session_start();
require 'dbcon.php';

$query2 = mysqli_query($con, "SELECT idfilme, titulopt FROM filmes");
$query3 = mysqli_query($con, "SELECT distinct sigla FROM sessoes");
$query4 = mysqli_query($con, "SELECT idsala, nomesala FROM salas");
$query5 = mysqli_query($con, "SELECT idhorario, horario FROM horarios");
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

<body class="bg-success ">

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

    <div class="row ">
      <div class="col-md-12">
        <div class="card bg-dark text-white">
          <div class="card-header">
            <h4>Criar Sessão
              <a href="index.php" class="btn btn-danger float-end">BACK</a>
            </h4>
          </div>
          <div class="card-body ms-3">
            <form action="code.php" method="POST">

              <div class="mb-3  ">
                <label>Sala da Sessão</label>
                <select class="form-select" id="idsala" name="idsala" aria-label="Default select example">
                  <option>Selecione...</option>
                  <?php while ($sala = mysqli_fetch_array($query4)) { ?>
                    <option value="<?php echo $sala['idsala'] ?>"><?php echo $sala['nomesala'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="mb-3 ">
                <label>Tipo Sessão</label>
                <input type="varchar" id="tiposessao" name="tiposessao" class="form-control">
              </div>
              <div class="mb-3  ">
                <label>Filme da Sessão</label> <select class="form-select" id="idfilme" name="idfilme" aria-label="Default select example">
                  <option>Selecione...</option>
                  <?php while ($prod = mysqli_fetch_array($query2)) { ?>
                    <option value="<?php echo $prod['idfilme'] ?>"><?php echo $prod['titulopt'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="mb-3 ">
                <label>Sigla</label>
                <select class="form-select" id="sigla" name="sigla" aria-label="Default select example">
                  <option>Selecione...</option>
                  <?php while ($sigla = mysqli_fetch_array($query3)) { ?>
                    <option value="<?php echo $sigla['sigla'] ?>"><?php echo $sigla['sigla'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="mb-3 ">
                <label>Data Sessão</label>
                <input type="date" id="datasessao" name="datasessao" class="form-control">
              </div>

              <div class="mb-3 ">
                <label>Horário Sessão</label>
                <select class="form-select" id="idhorario" name="idhorario" aria-label="Default select example">
                  <option>Selecione...</option>
                  <?php while ($horario = mysqli_fetch_array($query5)) { ?>
                    <option value="<?php echo $horario['idhorario'] ?>"><?php echo $horario['horario'] ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="mb-3">
                <button type="submit" name="create_session" class="btn btn-primary">Salvar Sessão</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>