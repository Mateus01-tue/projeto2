"use strict";

const ESTOQUE_CRITICO = 5;

async function carregarDados() {
    const resposta = await fetch('api/dashboard.php');
    if (!resposta.ok) {
        throw new Error(`Falha ao buscar dados: HTTP ${resposta.status}`);
    }
    const dados = await resposta.json();
    return dados;
}

function produtosEstoqueCritico(produtos) {
    return produtos.filter((p) => p.estoque <= ESTOQUE_CRITICO);
}
function produtosPorCategoria(produtos, categoria) {
    return produtos.filter((p) => p.categoria === categoria);
}

function renderizarLista(elementId, produtos) {
    const container = document.getElementById(elementId);
    if (container === null) {
        return;
    }
    if (produtos.length === 0) {
        container.innerHTML = '<li class="list-group-item text-muted">Nenhum dado registrado.</li>';
        return;
    }
    let html = '';
    for (const p of produtos) {
        html += `<li class="list-group-item d-flex justify-content-between">
            <span>${p.nome}</span>
            <span>Estoque: ${p.estoque}</span>
        </li>`;
    }
    container.innerHTML = html;
}
function renderizarDashboard(dados) {
    const criticos = produtosEstoqueCritico(dados.produtos);
    renderizarLista('lista-estoque-critico', criticos);
    const celulares = produtosPorCategoria(dados.produtos, 'Celulares');
    renderizarLista('lista-celulares', celulares);
}

async function iniciarDashboard() {
    try {
        const dados = await carregarDados();
        renderizarDashboard(dados);
    }
    catch (erro) {
        console.error('Erro ao carregar a dashboard:', erro);
        const aviso = document.getElementById('erro-dashboard');
        if (aviso !== null) {
            aviso.textContent = 'Erro ao carregar dados.';
        }
    }
}
document.addEventListener('DOMContentLoaded', () => {
    void iniciarDashboard();
});
