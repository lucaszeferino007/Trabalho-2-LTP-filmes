CREATE DATABASE IF NOT EXISTS `filmes_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `filmes_db`;

CREATE TABLE IF NOT EXISTS `generos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `filmes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(255) NOT NULL,
  `sinopse` TEXT,
  `ano` INT(4) NOT NULL,
  `duracao` INT(11) DEFAULT NULL,
  `genero_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`genero_id`) REFERENCES `generos`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `generos` (`nome`) VALUES
('Ação'), ('Drama'), ('Comédia'), ('Ficção Científica');

INSERT INTO `filmes` (`titulo`, `sinopse`, `ano`, `duracao`, `genero_id`) VALUES
('Corrida Final', 'Um piloto luta pelo título em uma temporada perigosa.', 2019, 125, 1),
('A Última Carta', 'Drama sobre família e segredos enterrados.', 2021, 110, 2),
('Rindo Alto', 'Comédia irreverente sobre um grupo de amigos.', 2018, 98, 3),
('Entre Estrelas', 'Tripulação espacial enfrenta dilemas éticos.', 2023, 142, 4);
