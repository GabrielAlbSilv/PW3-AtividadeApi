
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
(2, 'Pão Doce', 'Doce', 'R$ 1,00', 'Padaria Estrada Nova');

ALTER TABLE `Paes`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `Paes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

