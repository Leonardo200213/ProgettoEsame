-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 08, 2021 alle 13:06
-- Versione del server: 10.4.17-MariaDB
-- Versione PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catalogo`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `cap`
--

CREATE TABLE `cap` (
  `id_CAP` int(11) NOT NULL,
  `id_comune` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `comune`
--

CREATE TABLE `comune` (
  `id_comune` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `id_nazione` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `credenziali`
--

CREATE TABLE `credenziali` (
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `id_utente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `nazione`
--

CREATE TABLE `nazione` (
  `id_nazione` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `nazione`
--

INSERT INTO `nazione` (`id_nazione`, `nome`) VALUES
(1, 'Austria'),
(2, 'Belgio'),
(3, 'Bulgaria'),
(4, 'Danimarca'),
(5, 'Estonia'),
(6, 'Finlandia'),
(7, 'Francia'),
(8, 'Germania'),
(9, 'Grecia'),
(10, 'Islanda'),
(11, 'Italia'),
(12, 'Lettonia'),
(13, 'Liechtenstein'),
(14, 'Lituania'),
(15, 'Lussemburgo'),
(16, 'Malta'),
(17, 'Norvegia'),
(18, 'Paesi Bassi'),
(19, 'Polonia'),
(20, 'Portogallo'),
(21, 'Republica Ceca'),
(22, 'Romania'),
(23, 'San Marino'),
(24, 'Slovacchia'),
(25, 'Slovenia'),
(26, 'Spagna'),
(27, 'Svezia'),
(28, 'Ungheria'),
(29, 'Svizzera');

-- --------------------------------------------------------

--
-- Struttura della tabella `ordini`
--

CREATE TABLE `ordini` (
  `num_ordini` int(11) NOT NULL,
  `descrizione` varchar(45) NOT NULL,
  `data_inizio` date NOT NULL,
  `data_fine` date NOT NULL,
  `num_utente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotto`
--

CREATE TABLE `prodotto` (
  `id_prodotto` int(11) NOT NULL,
  `descrizione` varchar(45) NOT NULL,
  `id_ordine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `id_utente` int(11) NOT NULL,
  `cognome` varchar(45) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `età` int(11) NOT NULL,
  `sesso` varchar(11) NOT NULL,
  `indirizzo` varchar(45) NOT NULL,
  `telefono` int(11) NOT NULL,
  `id_cap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;





CREATE TABLE `vendita` (
  `id_prodotto` int(11) NOT NULL,
  `descrizione` varchar(45) NOT NULL,
  `tipo_prodotto` varchar(45) NOT NULL,
  `id_utente` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `cap`
--
ALTER TABLE `vendita`
  ADD PRIMARY KEY (`id_prodotto`),
  ADD KEY `id_utente` (`id_utente`);
  
  

ALTER TABLE `cap`
  ADD PRIMARY KEY (`id_CAP`),
  ADD KEY `id_comune` (`id_comune`);

--
-- Indici per le tabelle `comune`
--
ALTER TABLE `comune`
  ADD PRIMARY KEY (`id_comune`),
  ADD KEY `id_nazione` (`id_nazione`);

--
-- Indici per le tabelle `credenziali`
--
ALTER TABLE `credenziali`
  ADD PRIMARY KEY (`email`),
  ADD KEY `id_utente` (`id_utente`);

--
-- Indici per le tabelle `nazione`
--
ALTER TABLE `nazione`
  ADD PRIMARY KEY (`id_nazione`);

--
-- Indici per le tabelle `ordini`
--
ALTER TABLE `ordini`
  ADD PRIMARY KEY (`num_ordini`),
  ADD KEY `num_utente` (`num_utente`);

--
-- Indici per le tabelle `prodotto`
--
ALTER TABLE `prodotto`
  ADD PRIMARY KEY (`id_prodotto`),
  ADD KEY `id_ordine` (`id_ordine`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id_utente`),
  ADD KEY `id_cap` (`id_cap`);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `cap`
--
ALTER TABLE `cap`
  ADD CONSTRAINT `id_comune` FOREIGN KEY (`id_comune`) REFERENCES `comune` (`id_comune`);

--
-- Limiti per la tabella `comune`
--
ALTER TABLE `comune`
  ADD CONSTRAINT `id_nazione` FOREIGN KEY (`id_nazione`) REFERENCES `nazione` (`id_nazione`);

--
-- Limiti per la tabella `credenziali`
--
ALTER TABLE `credenziali`
  ADD CONSTRAINT `id_utente` FOREIGN KEY (`id_utente`) REFERENCES `utente` (`id_utente`);

--
-- Limiti per la tabella `ordini`
--
ALTER TABLE `ordini`
  ADD CONSTRAINT `num_utente` FOREIGN KEY (`num_utente`) REFERENCES `utente` (`id_utente`);

--
-- Limiti per la tabella `prodotto`
--
ALTER TABLE `prodotto`
  ADD CONSTRAINT `id_ordine` FOREIGN KEY (`id_ordine`) REFERENCES `ordini` (`num_ordini`);

--
-- Limiti per la tabella `utente`
--
ALTER TABLE `utente`
  ADD CONSTRAINT `id_cap` FOREIGN KEY (`id_cap`) REFERENCES `cap` (`id_CAP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
