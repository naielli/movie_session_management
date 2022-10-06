<?php
    session_start();
    require 'dbcon.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <title>UDESC CINE</title>
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
      


  <div class="card-body">

    <img src="img/eternals.jpg" class="img-fluid"  alt="...">
    <h5 class="p-3 mb-2 bg-dark text-white"></h5>

      <div class="container-lg">
        <div class="row">
          <div class="card text-white bg-dark mb-3">

          <?php include('message.php'); ?>
          <div class="card-header">Sessões</div>
            <div class="card-body">
              <table class="table table-dark table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                      <th>Sala</th>
                      <th>Tipo de Sessão</th>
                      <th>Sigla</th>
                      <th>Filme</th>
                      <th>Classificação</th>
                      <th>Horario</th>
                      <th>Duração</th>
                      <th>Data</th>
                      <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
            
                    $query = "SELECT idsessao, nomesala, tiposessao, sigla, titulopt, classificacao, horario, duracao, datasessao  FROM sessoes, filmes, salas, horarios  where sessoes.idfilme = filmes.idfilme and sessoes.idsala = salas.idsala and sessoes.idhorario = horarios.idhorario order by idsessao";
                    $query_run = mysqli_query($con, $query);

                    if(mysqli_num_rows($query_run) > 0){

                      foreach($query_run as $sessoes){

                      ?>

                      <tr>
                          <td><?= $sessoes['idsessao']; ?></td>
                          <td><?= $sessoes['nomesala']; ?></td>
                          <td><?= $sessoes['tiposessao']; ?></td>
                          <td><?= $sessoes['sigla']; ?></td>
                          <td><?= $sessoes['titulopt']; ?></td>
                          <td><?= $sessoes['classificacao']; ?></td>
                          <td><?= $sessoes['horario']; ?></td>
                          <td><?= $sessoes['duracao']; ?></td>
                          <td><?= $sessoes['datasessao']; ?></td>
                          <td>                                           
                          
                            <a href="session-view.php?idsessao=<?= $sessoes['idsessao']; ?>" class="btn btn-info btn-sm">View</a>
                            <a href="session-edit.php?idsessao=<?= $sessoes['idsessao']; ?>" class="btn btn-success btn-sm">Edit</a>
                            <form action="code.php" method="POST" class="d-inline">
                                <button type="submit" name="delete_sessao" value="<?=$sessoes['idsessao'];?>" class="btn btn-danger btn-sm">Delete</button>
                            </form>

                          </td>
                      </tr>
                      <?php

                    }} else {
                        echo "<h5> No Record Found </h5>";
                      }
                  ?>
                </tbody>
              </table>



            </div>
  </body>
</html>