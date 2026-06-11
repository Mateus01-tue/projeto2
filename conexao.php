<?php

$conexao = mysqli_connect("192.168.56.101", "root", "", "adaltocell");

if (!$conexao) {
    die("Erro ao conectar na Máquina Virtual: " . mysqli_connect_error());
}