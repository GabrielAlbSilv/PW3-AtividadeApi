
create database Paes;

use Paes;

CREATE TABLE `Paes` (
  `id` int NOT NULL,
  `nome` varchar(200) NOT NULL,
  `sabor` varchar(40) NOT NULL,
  `preco` varchar (50) NOT NULL,
  `padaria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `Paes` (`id`, `nome`, `sabor`, `preco`, `padaria`)
VALUES (1, 'Pão Francês', 'Salgado', 'R$ 00,30', 'Sr Euclides'),
(2, 'Pão de Açúcar', 'Doce', 'R$ 1,00', 'Padaria Estrada Nova'),
(3, 'Pão de Queijo Grande', 'Salgado', 'R$ 2,50', 'Império do Pão de Queijo'),
(4, 'Baguete', 'Salgado', 'R$ 2,98', 'Padaria Estrada Velha'),
(5, 'Bisnaga', 'Doce', 'R$ 1,80', 'Sr Onófrio'),
(6, 'Brioche', 'Doce', 'R$ 3,00', 'Switchif™'),
(7, 'Pão Recheado', 'Calabresa', 'R$ 5,00', 'Switchif™'),
(8, 'Pão Recheado Doce', 'Doce', 'R$ 4,00', 'Switchif™'),
(42, 'Pão da Vida', 'A Verdade', 'R$ 500,00', 'Switchif™');

ALTER TABLE `Paes`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `Paes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

