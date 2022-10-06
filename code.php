<?php
session_start();
require 'dbcon.php';


if (isset($_POST['delete_sessao'])) {

    $id_sessao = mysqli_real_escape_string($con, $_POST['delete_sessao']);

    $query = "DELETE FROM Sessoes WHERE idsessao='$id_sessao '";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Sessao Deletada com Sucesso!";
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Sessao Não Deletado";
        header("Location: index.php");
        exit(0);
    }
}

if (isset($_POST['delete_room'])) {

    $id_room = mysqli_real_escape_string($con, $_POST['delete_room']);

    $query = "DELETE FROM salas WHERE idsala='$id_room '";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Sala Deletada com Sucesso!";
        header("Location: room-view.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Sala Não Deletad";
        header("Location: room-view.php");
        exit(0);
    }
}

if (isset($_POST['update_sessao'])) {

    $idsessao = mysqli_real_escape_string($con, $_POST['idsessao']);

    $idsala = mysqli_real_escape_string($con, $_POST['idsala']);
    $tiposessao = mysqli_real_escape_string($con,  $_POST['tiposessao']);
    $sigla = mysqli_real_escape_string($con, $_POST['sigla']);
    $idfilme = mysqli_real_escape_string($con,  $_POST['idfilme']);
    $horario = mysqli_real_escape_string($con,  $_POST['horario']);
    $datasessao = mysqli_real_escape_string($con, $_POST['datasessao']);

    $query = "UPDATE sessoes SET idsala='$idsala', 
    tiposessao='$tiposessao', idfilme='$idfilme', idhorario='$horario', 
    datasessao='$datasessao', sigla='$sigla' WHERE idsessao='$idsessao' ";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {

        $_SESSION['message'] = "Sessão atualizada com sucesso!";
        header("Location: index.php");
        exit(0);
    } else {

        $_SESSION['message'] = "Sessão não atualizada";
        header("Location: index.php");
        exit(0);
    }
}

if (isset($_POST['create_session'])) {

    $idsala = mysqli_real_escape_string($con, $_POST['idsala']);
    $tiposessao = mysqli_real_escape_string($con, $_POST['tiposessao']);
    $sigla = mysqli_real_escape_string($con, $_POST['sigla']);
    $idfilme = mysqli_real_escape_string($con, $_POST['idfilme']);
    $idhorario = mysqli_real_escape_string($con, $_POST['idhorario']);
    $datasessao = mysqli_real_escape_string($con, $_POST['datasessao']);

    $query = "INSERT INTO sessoes (tiposessao, sigla, idfilme, idhorario, datasessao) VALUES ('$tiposessao','$sigla','$idfilme','$idhorario','$datasessao')";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Sessão criada com sucesso!";
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Sessão não foi criada";
        header("Location: index.php");
        exit(0);
    }
}



if (isset($_POST['save_movie'])) {


    $titulopt = mysqli_real_escape_string($con, $_POST['titulopt']);
    $tituloen = mysqli_real_escape_string($con, $_POST['tituloen']);
    $anolancamento = mysqli_real_escape_string($con, $_POST['anolancamento']);
    $sinopse = mysqli_real_escape_string($con, $_POST['sinopse']);
    $duracao = mysqli_real_escape_string($con, $_POST['duracao']);
    $datain = mysqli_real_escape_string($con, $_POST['datain']);
    $dataf = mysqli_real_escape_string($con, $_POST['dataf']);
    $classificacao = mysqli_real_escape_string($con, $_POST['classificacao']);
    $iddiretor = mysqli_real_escape_string($con, $_POST['iddiretor']);
    $idpais = mysqli_real_escape_string($con, $_POST['idpais']);

    $query = "INSERT INTO Filmes (titulopt, tituloen, anolancamento, sinopse, duracao, datain, dataf, classificacao, iddiretor, idpais)
    VALUES ('$titulopt','$tituloen','$anolancamento','$sinopse','$duracao','$datain','$dataf','$classificacao','$iddiretor','$idpais')";

    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['message'] = "Filme Created Successfully";
        header("Location: create-movie.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Filme Not Created";
        header("Location: create-movie.php");
        exit(0);
    }
}

if (isset($_POST['save_sala'])) {

    $nomesala = mysqli_real_escape_string($con, $_POST['nomesala']);
    $capacidade = mysqli_real_escape_string($con, $_POST['capacidade']);

    $query = "INSERT INTO salas (nomesala,capacidade)
    VALUES ('$nomesala','$capacidade')";

    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['message'] = "Sala Criada com Sucesso";
        header("Location: room-view.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Sala não criada";
        header("Location: room-view.php");
        exit(0);
    }
}
if (isset($_POST['save_country'])) {

    $nomepais = mysqli_real_escape_string($con, $_POST['nomepais']);

    $query = "INSERT INTO paises (nomepais)
    VALUES ('$nomepais')";

    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['message'] = "País Cadastrado com Sucesso";
        header("Location: create-movie.php");
        exit(0);
    } else {
        $_SESSION['message'] = "País não cadastrado";
        header("Location: create-movie.php");
        exit(0);
    }
}

if (isset($_POST['save_director'])) {

    $nomediretor = mysqli_real_escape_string($con, $_POST['nomediretor']);

    $query = "INSERT INTO diretores (nomediretor)
    VALUES ('$nomediretor')";

    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['message'] = "Diretor Cadastrado com Sucesso";
        header("Location: create-movie.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Diretor não cadastrado";
        header("Location: create-movie.php");
        exit(0);
    }
}
