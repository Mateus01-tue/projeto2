-- ============================================================
-- sprint_banco.sql
-- Contém SOMENTE o que esta Sprint pede:
--   - CTE e Views analíticas
--   - Trigger BEFORE UPDATE
-- NÃO inclui: stored procedures, function, tabela de usuários/login
-- (ficam para uma sprint futura).
-- ============================================================

USE `adaltocell`;

-- ------------------------------------------------------------
-- 0. Coluna de estoque (necessária para o filtro de "estoque
--    crítico" que a Sprint também pede na parte de TypeScript)
-- ------------------------------------------------------------
ALTER TABLE `produtos`
  ADD COLUMN `estoque` INT NOT NULL DEFAULT 10 AFTER `preco`;

UPDATE `produtos` SET `estoque` = 15 WHERE `id` = 1;
UPDATE `produtos` SET `estoque` = 3  WHERE `id` = 2; -- estoque crítico
UPDATE `produtos` SET `estoque` = 8  WHERE `id` = 3;
UPDATE `produtos` SET `estoque` = 20 WHERE `id` = 4;
UPDATE `produtos` SET `estoque` = 2  WHERE `id` = 5; -- estoque crítico
UPDATE `produtos` SET `estoque` = 12 WHERE `id` = 6;
UPDATE `produtos` SET `estoque` = 6  WHERE `id` = 7;
UPDATE `produtos` SET `estoque` = 4  WHERE `id` = 9; -- estoque crítico

-- ------------------------------------------------------------
-- 1. Dados de exemplo em pedidos/pedido_produto, necessários
--    só para a VIEW com CTE ter algo pra calcular (a Sprint não
--    pede sistema de pedidos, só a view analítica em si)
-- ------------------------------------------------------------
INSERT INTO `clientes` (`nome`, `telefone`, `email`) VALUES
('Ana Souza',  '(44) 99111-2233', 'ana.souza@email.com'),
('Bruno Lima', '(44) 99222-3344', 'bruno.lima@email.com');

INSERT INTO `pedidos` (`cliente_id`, `data_pedido`) VALUES
(1, '2026-07-10'),
(2, '2026-07-15');

INSERT INTO `pedido_produto` (`pedido_id`, `produto_id`, `quantidade`) VALUES
(1, 1, 1),
(1, 5, 2),
(2, 2, 1);

-- ------------------------------------------------------------
-- 2. VIEW simples: produtos já com o nome da categoria
-- ------------------------------------------------------------
CREATE OR REPLACE VIEW `vw_produtos_completo` AS
SELECT
    p.id,
    p.nome,
    p.descricao,
    p.preco,
    p.estoque,
    p.imagem,
    c.id   AS categoria_id,
    c.nome AS categoria_nome
FROM produtos p
LEFT JOIN categorias c ON c.id = p.categoria_id;

-- ------------------------------------------------------------
-- 3. VIEW analítica com CTE: faturamento por categoria
-- ------------------------------------------------------------
CREATE OR REPLACE VIEW `vw_faturamento_por_categoria` AS
WITH vendas AS (
    SELECT
        pr.categoria_id,
        (pr.preco * pp.quantidade) AS subtotal
    FROM pedido_produto pp
    JOIN produtos pr ON pr.id = pp.produto_id
)
SELECT
    c.id   AS categoria_id,
    c.nome AS categoria,
    COALESCE(SUM(v.subtotal), 0) AS faturamento_total
FROM categorias c
LEFT JOIN vendas v ON v.categoria_id = c.id
GROUP BY c.id, c.nome;

-- ------------------------------------------------------------
-- 4. TRIGGER BEFORE UPDATE: padroniza valores positivos
-- ------------------------------------------------------------
DROP TRIGGER IF EXISTS `trg_produtos_valores_positivos`;
DELIMITER $$
CREATE TRIGGER `trg_produtos_valores_positivos`
BEFORE UPDATE ON `produtos`
FOR EACH ROW
BEGIN
    IF NEW.preco IS NULL OR NEW.preco <= 0 THEN
        SET NEW.preco = OLD.preco;
    END IF;

    IF NEW.estoque IS NULL OR NEW.estoque < 0 THEN
        SET NEW.estoque = 0;
    END IF;
END$$
DELIMITER ;
