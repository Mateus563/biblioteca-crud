<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Empréstimos</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 32px auto; padding: 0 16px; }
        h2 { margin-bottom: 8px; }
        label { display: inline-block; margin: 4px 0 2px; font-size: 0.85rem; }
        input { display: block; padding: 6px 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px; width: 100%; }
        button { padding: 7px 16px; margin-right: 6px; cursor: pointer; border: 1px solid #999; border-radius: 4px; background: #f5f5f5; }
        table { width: 100%; border-collapse: collapse; margin-top: 32px; }
        th, td { padding: 9px 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #f5f5f5; }
    </style>
</head>
<body>

    <h2>Empréstimos</h2>
    <p>Consumindo: <code id="apiUrl"></code></p>

    <form id="form" style="max-width: 400px; margin-top: 16px">
        <input type="hidden" id="editId">

        <label>ID Leitor</label>
        <input id="leitor_id" placeholder="Ex: 1" required>

        <label>ID Livro</label>
        <input id="livro_id" placeholder="Ex: 1" required>

        <label>Data de Locação</label>
        <input id="data_locacao" type="date" required>

        <label>Data de Devolução</label>
        <input id="data_devolucao" type="date" required>

        <button type="submit">Salvar</button>
        <button type="button" id="btnCancelar" style="display:none" onclick="cancelarEdicao()">Cancelar</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Leitor</th>
                <th>ID Livro</th>
                <th>Data de Locação</th>
                <th>Data de Devolução</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody id="lista"></tbody>
    </table>

    <p style="margin-top:24px"><a href="../index.php">Voltar ao início</a></p>

    <script>
        const API = "https://6a41b6a07602860e65206683.mockapi.io/emprestimo/emprestimo";
        document.getElementById("apiUrl").textContent = API;

        const $ = id => document.getElementById(id);

        async function carregar() {
            const resp = await fetch(API);
            const emprestimos = await resp.json();

            let html = "";
            for (const e of emprestimos) {
                html += `
                    <tr>
                        <td>${e.id}</td>
                        <td>${e.leitor_id ?? ""}</td>
                        <td>${e.livro_id ?? ""}</td>
                        <td>${e.data_locacao ?? ""}</td>
                        <td>${e.data_devolucao ?? ""}</td>
                        <td>
                            <button type="button" onclick="editar('${e.id}')">Editar</button>
                            <button type="button" onclick="deletar('${e.id}')">Excluir</button>
                        </td>
                    </tr>`;
            }
            $("lista").innerHTML = html || `<tr><td colspan="6">Nenhum empréstimo cadastrado.</td></tr>`;
        }

        function cancelarEdicao() {
            $("editId").value = "";
            $("btnCancelar").style.display = "none";
            $("form").reset();
        }

        $("form").addEventListener("submit", async (event) => {
            event.preventDefault();

            const id = $("editId").value;
            const dados = {
                leitor_id: $("leitor_id").value,
                livro_id: $("livro_id").value,
                data_locacao: $("data_locacao").value,
                data_devolucao: $("data_devolucao").value
            };

            if (id) {
                await fetch(`${API}/${id}`, {
                    method: "PUT",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify(dados)
                });
            } else {
                await fetch(API, {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify(dados)
                });
            }

            cancelarEdicao();
            carregar();
        });

        async function editar(id) {
            const resp = await fetch(`${API}/${id}`);
            const e = await resp.json();

            $("editId").value = e.id;
            $("leitor_id").value = e.leitor_id ?? "";
            $("livro_id").value = e.livro_id ?? "";
            $("data_locacao").value = e.data_locacao ?? "";
            $("data_devolucao").value = e.data_devolucao ?? "";
            $("btnCancelar").style.display = "inline";
        }

        async function deletar(id) {
            if (!confirm("Excluir este empréstimo?")) return;
            await fetch(`${API}/${id}`, { method: "DELETE" });
            carregar();
        }

        carregar();
    </script>

</body>
</html>
