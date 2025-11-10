<?php
/******************************************************************************
Curso: Engenharia de Software
Disciplina: Linguagem e Técnicas de Programação
Professor: José Carlos Domingues Flores
Turma: ESOFT-2A
Componentes: 
             25148436-2 - Carlos Eduardo Galdino Sousa 
             25001132-2 - Cauã Chaerki Bobato
             25161143-2 - Gabriel Hikari Uchida Requião 
             25229817-2 - Guilherme Garcia Da Cruz 
             25201449-2 - Luan Raio Amorim 
             25119616-2 - Lucas Henrique Zeferino
             25165588-2 - Maikon V. Duarte dos Santos
             25178371-2 - Pedro Henrique Santos Sinhuk
Data: Novembro de 2025
Descritivo: Sistema CRUD em PHP com MySQL (Filmes e Gêneros)
******************************************************************************/

class Filme {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function all() {
        $sql = "SELECT f.*, g.nome AS genero FROM filmes f JOIN generos g ON f.genero_id = g.id ORDER BY f.id DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    public function find($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM filmes WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data) {
        $stmt = $this->pdo->prepare("INSERT INTO filmes (titulo, sinopse, ano, duracao, genero_id) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$data['titulo'], $data['sinopse'], $data['ano'], $data['duracao'], $data['genero_id']]);
    }

    public function update($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE filmes SET titulo = ?, sinopse = ?, ano = ?, duracao = ?, genero_id = ? WHERE id = ?");
        return $stmt->execute([$data['titulo'], $data['sinopse'], $data['ano'], $data['duracao'], $data['genero_id'], $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM filmes WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
