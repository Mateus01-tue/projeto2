<?php

$conexao = mysqli_connect("localhost", "root", "", "adaltocell");

if (!$conexao) {
    die("Erro: " . mysqli_connect_error());
}