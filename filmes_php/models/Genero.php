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

class Genero {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function all() {
        $stmt = $this->pdo->query("SELECT * FROM generos ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public function find($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM generos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($nome) {
        $stmt = $this->pdo->prepare("INSERT INTO generos (nome) VALUES (?)");
        return $stmt->execute([$nome]);
    }

    public function update($id, $nome) {
        $stmt = $this->pdo->prepare("UPDATE generos SET nome = ? WHERE id = ?");
        return $stmt->execute([$nome, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM generos WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
