CREATE TABLE leitor (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100),
    cpf VARCHAR(14),
    cep VARCHAR(10),
    rua VARCHAR(100),
    bairro VARCHAR(100),
    cidade VARCHAR(100),
    telefone VARCHAR(20),
    email VARCHAR(100)
);

CREATE TABLE livro (
    id SERIAL PRIMARY KEY,
    titulo VARCHAR(150),
    autor VARCHAR(100),
    editora VARCHAR(100),
    data_publicacao DATE,
    quantidade INT
);

CREATE TABLE emprestimo (
    id SERIAL PRIMARY KEY,
    id_leitor Int,
    id_livro int,
    data_locacao DATE,
    data_devolucao DATE,
    devolvido VARCHAR(3) DEFAULT 'Nao',

        CONSTRAINT fk_emprestimo_leitor
        FOREIGN KEY (id_leitor)
        REFERENCES leitor(id),

    CONSTRAINT fk_emprestimo_livro
        FOREIGN KEY (id_livro)
        REFERENCES livro(id)
);