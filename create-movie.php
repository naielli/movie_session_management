<?php
session_start();
require 'dbcon.php';

$query2 = mysqli_query($con, "SELECT iddiretor, nomediretor FROM diretores");
$query3 = mysqli_query($con, "SELECT idpais,nomepais FROM paises");
$query4 = mysqli_query($con, "SELECT idgenero,nomegenero FROM generos");
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
                <div class="card">
                    <div class="card-header">
                        <h4> Novo Filme
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="country-create.php" class="btn btn btn-outline-secondary ">Cadastrar País</a>
                                <a href="director-create.php" class="btn btn btn-outline-secondary ">Cadastrar Diretor</a>
                                <a href="index.php" class="btn btn-danger me-md-2">BACK</a>
                        </h4>

                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <div class="mb-3">
                                <label>Titulo em Português</label>
                                <input type="varchar" id="titulopt" name="titulopt" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Titulo em Inglês</label>
                                <input type="varchar" id="tituloen" name="tituloen" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Ano de lançamento</label>
                                <input type="int" id="anolancamento" name="anolancamento" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Sinopse</label>
                                <input type="varchar" id="sinopse" name="sinopse" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Duração</label>
                                <input type="time" id="duracao" name="duracao" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Classificação</label>
                                <input type="varchar" id="classificacao" name="classificacao" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Data de início</label>
                                <input type="date" id="datain" name="datain" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Data de fim</label>
                                <input type="date" id="dataf" name="dataf" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Diretor</label>
                                <select class="form-select" id="iddiretor" name="iddiretor" aria-label="Default select example">
                                    <option>Selecione...</option>
                                    <?php while ($diretor = mysqli_fetch_array($query2)) { ?>
                                        <option value="<?php echo $diretor['iddiretor'] ?>"><?php echo $diretor['nomediretor'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>País</label>
                                <select class="form-select" id="idpais" name="idpais" aria-label="Default select example">
                                    <option>Selecione...</option>
                                    <?php while ($pais = mysqli_fetch_array($query3)) { ?>
                                        <option value="<?php echo $pais['idpais'] ?>"><?php echo $pais['nomepais'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="mb-3 ">
                                <button type="submit" name="save_movie" class="btn btn-primary">Salvar Filme</button>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>





</body>

</html>