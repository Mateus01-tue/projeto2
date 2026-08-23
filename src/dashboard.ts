// ============================================================
// dashboard.ts — Sprint atual: consumo de API + filtros + edge case
// (reduce, ranking e formatação em map ficam para uma sprint futura)
// ============================================================

interface Produto {
    id: number;
    nome: string;
    categoria: string;
    categoriaId: number;
    preco: number;
    estoque: number;
    imagem: string;
}

interface DashboardData {
    produtos: Produto[];
}

const ESTOQUE_CRITICO = 5;

// ---------- Busca de dados (fetch + async/await + try/catch fica em iniciarDashboard) ----------

async function carregarDados(): Promise<DashboardData> {
    const resposta = await fetch('api/dashboard.php');

    if (!resposta.ok) {
        throw new Error(`Falha ao buscar dados: HTTP ${resposta.status}`);
    }

    const dados: DashboardData = await resposta.json();
    return dados;
}

// ---------- Segmentação e filtros de negócio ----------

function produtosEstoqueCritico(produtos: Produto[]): Produto[] {
    return produtos.filter((p: Produto): boolean => p.estoque <= ESTOQUE_CRITICO);
}

function produtosPorCategoria(produtos: Produto[], categoria: string): Produto[] {
    return produtos.filter((p: Produto): boolean => p.categoria === categoria);
}

// ---------- Renderização (com tratamento de cenário vazio) ----------

function renderizarLista(elementId: string, produtos: Produto[]): void {
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

function renderizarDashboard(dados: DashboardData): void {
    const criticos = produtosEstoqueCritico(dados.produtos);
    renderizarLista('lista-estoque-critico', criticos);

    const celulares = produtosPorCategoria(dados.produtos, 'Celulares');
    renderizarLista('lista-celulares', celulares);
}

// ---------- Inicialização (async/await + try/catch) ----------

async function iniciarDashboard(): Promise<void> {
    try {
        const dados = await carregarDados();
        renderizarDashboard(dados);
    } catch (erro) {
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
