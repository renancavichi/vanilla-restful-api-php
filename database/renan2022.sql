-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Out-2022 às 21:27
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `renan2022`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `token` varchar(256) NOT NULL,
  `client` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `session`
--

INSERT INTO `session` (`id`, `id_user`, `token`, `client`) VALUES
(2, 1, '19c52475a677767d1082a3afd25d203cf2a844ce', 'Thunder Client (https://www.thunderclient.com)'),
(3, 1, 'c98cfefef61d52c46f21393f553c6a64419aa377', 'Thunder Client (https://www.thunderclient.com)'),
(4, 1, '17349d888520034bca36790651ee6df4074bf9b2', 'Thunder Client (https://www.thunderclient.com)'),
(5, 1, '366cab793cbaa04bb4c1a99bfa4d0fa1ee259fd6', 'Thunder Client (https://www.thunderclient.com)'),
(6, 1, '900a09e49e0ec103f092d70ce880e18532b24ebb', 'Thunder Client (https://www.thunderclient.com)'),
(7, 1, 'f041028eea56ad8b59fb6c80e650b490c340ac22', 'Thunder Client (https://www.thunderclient.com)'),
(8, 3, 'dd88c04c69256cb64dd5f8e54c44330897e00c54', 'Thunder Client (https://www.thunderclient.com)'),
(9, 3, '9e4ef4d29dedefa0b8c36d6cc1ca7db7c7fb3c33', 'Thunder Client (https://www.thunderclient.com)'),
(10, 1, '07858f5a8e9d16ec4baa798dc35db2f5b2db9dd7', 'Thunder Client (https://www.thunderclient.com)');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `avatar` varchar(400) NOT NULL,
  `role` varchar(15) NOT NULL DEFAULT 'client'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `avatar`, `role`) VALUES
(1, 'Renan', 'renancavichi-teste@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', 'https://avatars.githubusercontent.com/u/4259630?v=4', 'client, admin'),
(3, 'Allan José Gabriel', 'allan@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', 'https://avatars.githubusercontent.com/u/104521672?v=4', 'client'),
(4, 'Breno', 'breno@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', 'https://avatars.githubusercontent.com/u/101892969?v=4', 'client'),
(7, 'Micaella', 'micaella@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', 'https://avatars.githubusercontent.com/u/110495667?v=4', 'client'),
(55, 'Renan Cavichi', 'asdasd asda as d', '85136c79cbf9fe36bb9d05d0639c70c265c18d37', 'asdasd', 'client');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_session_id_user` (`id_user`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `id_user_session_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
