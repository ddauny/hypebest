-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 27, 2022 alle 17:17
-- Versione del server: 10.4.22-MariaDB
-- Versione PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hypebest`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `commenti`
--

CREATE TABLE `commenti` (
  `ID` int(11) NOT NULL,
  `IDUtente` int(11) NOT NULL,
  `IDPost` int(11) NOT NULL,
  `testo` varchar(256) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `interesse`
--

CREATE TABLE `interesse` (
  `ID` int(11) NOT NULL,
  `interesse` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `likes`
--

CREATE TABLE `likes` (
  `ID` int(11) NOT NULL,
  `IDUtente` int(11) NOT NULL,
  `IDPost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `possiede`
--

CREATE TABLE `possiede` (
  `ID` int(11) NOT NULL,
  `IDUtente` int(11) NOT NULL,
  `IDInteresse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `post`
--

CREATE TABLE `post` (
  `ID` int(11) NOT NULL,
  `IDUtente` int(11) NOT NULL,
  `colori` varchar(64) NOT NULL,
  `img` varchar(256) NOT NULL,
  `descrizione` varchar(256) NOT NULL,
  `sesso` int(11) NOT NULL,
  `situazione` varchar(10) NOT NULL,
  `data` datetime NOT NULL,
  `pubblicato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `presenta`
--

CREATE TABLE `presenta` (
  `ID` int(11) NOT NULL,
  `IDPost` int(11) NOT NULL,
  `IDTag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `salva`
--

CREATE TABLE `salva` (
  `ID` int(11) NOT NULL,
  `IDUtente` int(11) NOT NULL,
  `IDPost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `segue`
--

CREATE TABLE `segue` (
  `ID` int(11) NOT NULL,
  `IDSeguace` int(11) NOT NULL,
  `IDSeguito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `tag`
--

CREATE TABLE `tag` (
  `ID` int(11) NOT NULL,
  `link` varchar(256) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `ID` int(11) NOT NULL,
  `nome` varchar(15) NOT NULL,
  `cognome` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `dataNascita` date NOT NULL,
  `sesso` int(11) NOT NULL,
  `img` varchar(256) NOT NULL,
  `bio` varchar(256) NOT NULL,
  `ruolo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `commenti`
--
ALTER TABLE `commenti`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `utenteCommento` (`IDUtente`),
  ADD KEY `postCommento` (`IDPost`);

--
-- Indici per le tabelle `interesse`
--
ALTER TABLE `interesse`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `utenteLikes` (`IDUtente`),
  ADD KEY `postLikes` (`IDPost`);

--
-- Indici per le tabelle `possiede`
--
ALTER TABLE `possiede`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `utentePossiede` (`IDUtente`),
  ADD KEY `interessePossiede` (`IDInteresse`);

--
-- Indici per le tabelle `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `utentePost` (`IDUtente`);

--
-- Indici per le tabelle `presenta`
--
ALTER TABLE `presenta`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `postPresenta` (`IDPost`),
  ADD KEY `tagPresenta` (`IDTag`);

--
-- Indici per le tabelle `salva`
--
ALTER TABLE `salva`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `utenteSalva` (`IDUtente`),
  ADD KEY `postSalva` (`IDPost`);

--
-- Indici per le tabelle `segue`
--
ALTER TABLE `segue`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `seguaceSegue` (`IDSeguace`),
  ADD KEY `seguitoSegue` (`IDSeguito`);

--
-- Indici per le tabelle `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `commenti`
--
ALTER TABLE `commenti`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `interesse`
--
ALTER TABLE `interesse`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `likes`
--
ALTER TABLE `likes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `possiede`
--
ALTER TABLE `possiede`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `post`
--
ALTER TABLE `post`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `presenta`
--
ALTER TABLE `presenta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `salva`
--
ALTER TABLE `salva`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `segue`
--
ALTER TABLE `segue`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `tag`
--
ALTER TABLE `tag`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `commenti`
--
ALTER TABLE `commenti`
  ADD CONSTRAINT `postCommento` FOREIGN KEY (`IDPost`) REFERENCES `post` (`ID`),
  ADD CONSTRAINT `utenteCommento` FOREIGN KEY (`IDUtente`) REFERENCES `utente` (`ID`);

--
-- Limiti per la tabella `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `postLikes` FOREIGN KEY (`IDPost`) REFERENCES `post` (`ID`),
  ADD CONSTRAINT `utenteLikes` FOREIGN KEY (`IDUtente`) REFERENCES `utente` (`ID`);

--
-- Limiti per la tabella `possiede`
--
ALTER TABLE `possiede`
  ADD CONSTRAINT `interessePossiede` FOREIGN KEY (`IDInteresse`) REFERENCES `interesse` (`ID`),
  ADD CONSTRAINT `utentePossiede` FOREIGN KEY (`IDUtente`) REFERENCES `utente` (`ID`);

--
-- Limiti per la tabella `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `utentePost` FOREIGN KEY (`IDUtente`) REFERENCES `utente` (`ID`);

--
-- Limiti per la tabella `presenta`
--
ALTER TABLE `presenta`
  ADD CONSTRAINT `postPresenta` FOREIGN KEY (`IDPost`) REFERENCES `post` (`ID`),
  ADD CONSTRAINT `tagPresenta` FOREIGN KEY (`IDTag`) REFERENCES `tag` (`ID`);

--
-- Limiti per la tabella `salva`
--
ALTER TABLE `salva`
  ADD CONSTRAINT `postSalva` FOREIGN KEY (`IDPost`) REFERENCES `post` (`ID`),
  ADD CONSTRAINT `utenteSalva` FOREIGN KEY (`IDUtente`) REFERENCES `utente` (`ID`);

--
-- Limiti per la tabella `segue`
--
ALTER TABLE `segue`
  ADD CONSTRAINT `seguaceSegue` FOREIGN KEY (`IDSeguace`) REFERENCES `utente` (`ID`),
  ADD CONSTRAINT `seguitoSegue` FOREIGN KEY (`IDSeguito`) REFERENCES `utente` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
