# Ajustes — Biblioteca CRUD

Registro das correções feitas no código do projeto.

## Correções de bugs

| Arquivo | Problema | Correção |
|---|---|---|
| `dao/LivroDao.php` | `require '../Livro.php'` | `require '../model/Livro.php'` |
| `dao/LeitorDao.php` | `require '../Leitor.php'` | `require '../model/Leitor.php'` |
| `dao/LivroDao.php` | `stmt->execute(...)` (sem `$`) em `salvar` | `$stmt->execute(...)` |
| `dao/LivroDao.php` | vírgula faltando antes de `$row['id']` em `listar` | vírgula adicionada (erro de sintaxe) |
| `dao/LeitorDao.php` | vírgula faltando antes de `$row['id']` em `buscarporId` | vírgula adicionada (erro de sintaxe) |
| `dao/LeitorDao.php` | `cep` ausente no INSERT/SELECT; sem método `atualizar` | `cep` incluído e método `atualizar` adicionado (controller chamava e não existia) |
| `model/Livro.php` | propriedade `nome`/`getNome` | renomeada para `titulo`/`getTitulo` (alinhado ao schema e às views) |
| `controller/LivroController.php` | bloco duplicado quebrado após a classe; campos `isbn`/`ano_publicacao` | bloco removido; campos trocados para `editora`/`data_publicacao`/`quantidade` |
| `viewLivro/cadastra.php` | campos `isbn`/`ano_publicacao` | `editora`/`data_publicacao`/`quantidade` |
| `viewLivro/lista.php` | faltava `?>` após `if(...):`; getters `getIsbn`/`getAnoPublicacao` inexistentes | `?>` adicionado; getters corrigidos para `getEditora`/`getDataPublicacao`/`getQuantidade` |
| `viewLivro/editar.php` → `viewLivro/edita.php` | nome do arquivo não batia com o link da listagem (`edita.php`) | renomeado; campos/getters corrigidos |
| `viewLivro/deleta.php` | arquivo vazio (deleção não funcionava) | criado |
| `viewLeitor/lista.php` | faltava `?>` após `if(...):` (HTML caía dentro do PHP) | `?>` adicionado |
| `viewLeitor/cadastra.php` | form quebrado: `corprincipal`, `cep` sem `name`, sem telefone/email | corrigido mantendo a busca ViaCEP |

## Decisão de schema

Havia dois esquemas conflitantes no código: o banco (`creates.sql`) usa
`titulo/autor/editora/data_publicacao/quantidade` para Livro, enquanto parte das
views/controller usava `isbn/ano_publicacao`. Tudo foi **alinhado ao schema do
`creates.sql`**. Para usar `isbn/ano_publicacao` seria necessário também alterar
a tabela `livro`.
