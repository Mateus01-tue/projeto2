<?php
header('Content-Type: application/json; charset=utf-8');
include '../conexao.php';

$produtos = [];
$res = mysqli_query($conexao, "SELECT * FROM vw_produtos_completo ORDER BY nome");
while ($row = mysqli_fetch_assoc($res)) {
    $produtos[] = [
        'id'          => (int)$row['id'],
        'nome'        => $row['nome'],
        'categoria'   => $row['categoria_nome'],
        'categoriaId' => (int)$row['categoria_id'],
        'preco'       => (float)$row['preco'],
        'estoque'     => (int)$row['estoque'],
        'imagem'      => $row['imagem'],
    ];
}

echo json_encode(['produtos' => $produtos], JSON_UNESCAPED_UNICODE);
