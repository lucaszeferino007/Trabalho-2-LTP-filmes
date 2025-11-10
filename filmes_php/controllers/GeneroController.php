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

require_once __DIR__ . '/../models/Genero.php';

class GeneroController {
    private $genero;
    public function __construct($pdo) {
        $this->genero = new Genero($pdo);
    }

    public function index() {
        $gens = $this->genero->all();
        include __DIR__ . '/../views/generos/index_gen.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = trim($_POST['nome'] ?? '');
            $this->genero->create($nome);
            header('Location: index.php?page=generos');
            exit;
        }
        include __DIR__ . '/../views/generos/create_gen.php';
    }

    public function edit() {
        $id = $_GET['id'] ?? null;
        if (!$id) { header('Location: index.php?page=generos'); exit; }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = trim($_POST['nome'] ?? '');
            $this->genero->update($id, $nome);
            header('Location: index.php?page=generos');
            exit;
        }
        $gen = $this->genero->find($id);
        include __DIR__ . '/../views/generos/edit_gen.php';
    }

    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) $this->genero->delete($id);
        header('Location: index.php?page=generos');
        exit;
    }
}
?>
