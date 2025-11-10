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

require_once __DIR__ . '/../models/Filme.php';
require_once __DIR__ . '/../models/Genero.php';

class FilmeController {
    private $filme;
    private $genero;
    public function __construct($pdo) {
        $this->filme = new Filme($pdo);
        $this->genero = new Genero($pdo);
    }

    public function index() {
        $films = $this->filme->all();
        include __DIR__ . '/../views/filmes/index_filme.php';
    }

    public function create() {
        $gens = $this->genero->all();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'titulo' => trim($_POST['titulo'] ?? ''),
                'sinopse' => trim($_POST['sinopse'] ?? ''),
                'ano' => intval($_POST['ano'] ?? 0),
                'duracao' => intval($_POST['duracao'] ?? 0),
                'genero_id' => intval($_POST['genero_id'] ?? 0),
            ];
            $this->filme->create($data);
            header('Location: index.php?page=filmes');
            exit;
        }
        include __DIR__ . '/../views/filmes/create_filme.php';
    }

    public function edit() {
        $id = $_GET['id'] ?? null;
        if (!$id) { header('Location: index.php?page=filmes'); exit; }
        $gens = $this->genero->all();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'titulo' => trim($_POST['titulo'] ?? ''),
                'sinopse' => trim($_POST['sinopse'] ?? ''),
                'ano' => intval($_POST['ano'] ?? 0),
                'duracao' => intval($_POST['duracao'] ?? 0),
                'genero_id' => intval($_POST['genero_id'] ?? 0),
            ];
            $this->filme->update($id, $data);
            header('Location: index.php?page=filmes');
            exit;
        }
        $film = $this->filme->find($id);
        include __DIR__ . '/../views/filmes/edit_filme.php';
    }

    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) $this->filme->delete($id);
        header('Location: index.php?page=filmes');
        exit;
    }
}
?>
