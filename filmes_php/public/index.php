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

require_once __DIR__ . '/../config/database.php';
$pdo = Database::getInstance();

spl_autoload_register(function($class){
    $paths = [__DIR__ . '/../controllers/', __DIR__ . '/../models/'];
    foreach ($paths as $p) {
        $file = $p . $class . '.php';
        if (file_exists($file)) require_once $file;
    }
});

$page = $_GET['page'] ?? 'filmes';
$action = $_GET['action'] ?? 'index';

switch($page) {
    case 'generos':
        $ctrl = new GeneroController($pdo);
        break;
    case 'filmes':
    default:
        $ctrl = new FilmeController($pdo);
        break;
}

if (method_exists($ctrl, $action)) {
    $ctrl->{$action}();
} else {
    $ctrl->index();
}
?>