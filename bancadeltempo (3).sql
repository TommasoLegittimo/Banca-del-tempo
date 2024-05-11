-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 11, 2024 alle 01:14
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bancadeltempo`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `categoriaprestazioni`
--

CREATE TABLE `categoriaprestazioni` (
  `codiceMansione` int(5) NOT NULL,
  `codicePrestazione` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `categoriaprestazioni`
--

INSERT INTO `categoriaprestazioni` (`codiceMansione`, `codicePrestazione`) VALUES
(1, 1),
(1, 3),
(1, 6),
(4, 8),
(5, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `codici`
--

CREATE TABLE `codici` (
  `codiceAmministratore` char(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `codici`
--

INSERT INTO `codici` (`codiceAmministratore`) VALUES
('e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855');

-- --------------------------------------------------------

--
-- Struttura della tabella `iscrizioni`
--

CREATE TABLE `iscrizioni` (
  `codiceSede` int(5) NOT NULL,
  `codiceSocio` int(5) NOT NULL,
  `codiceIscrizione` int(5) NOT NULL,
  `DataIscrizione` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `iscrizioni`
--

INSERT INTO `iscrizioni` (`codiceSede`, `codiceSocio`, `codiceIscrizione`, `DataIscrizione`) VALUES
(1, 1, 1, '0000-00-00'),
(2, 2, 1, '0000-00-00'),
(3, 3, 2, '0000-00-00'),
(4, 4, 3, '0000-00-00'),
(5, 5, 4, '0000-00-00'),
(1, 6, 5, '0000-00-00'),
(2, 7, 6, '0000-00-00'),
(3, 8, 7, '0000-00-00'),
(4, 9, 8, '0000-00-00'),
(5, 10, 9, '0000-00-00'),
(1, 11, 10, '0000-00-00'),
(2, 12, 11, '0000-00-00'),
(3, 13, 12, '0000-00-00'),
(4, 14, 13, '0000-00-00'),
(5, 15, 14, '0000-00-00'),
(1, 16, 15, '0000-00-00'),
(2, 17, 16, '0000-00-00'),
(3, 18, 17, '0000-00-00'),
(4, 19, 18, '0000-00-00'),
(5, 20, 19, '0000-00-00');

-- --------------------------------------------------------

--
-- Struttura della tabella `mansioni`
--

CREATE TABLE `mansioni` (
  `codiceMansione` int(5) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `descrizione` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `mansioni`
--

INSERT INTO `mansioni` (`codiceMansione`, `categoria`, `descrizione`) VALUES
(1, 'Segreteria', 'Si occupa della gesione di alcuni aspetti amministrativi di privati e aziende'),
(2, 'Cucina', 'Si occupa di cucinare dolci, salati, antipasti, e tutto cio che riguarda l\'alimentare'),
(3, 'Idraulica', 'Si occupa degli impianti idraulici: caldaie, condizionatori ecc.'),
(4, 'Elettricistica', 'Si occupa degli impianti elettrici e di uso comune come: lavatrice, frigorifero, lavastoviglie ecc.'),
(5, 'Tecnologica', 'Si occupa di consulenza e aiuto manuale per dispositivi elettronici'),
(6, 'Babysitter', 'So occupa di tenere compagnia e vigilare sui propri figli'),
(7, 'Dogsytter', 'Si occupa di portare a spasso i propri cani'),
(8, 'Consulenze economichie', 'Si occupa in generale di fornire consulti finanziari ed economici'),
(9, 'Consulenze manageriali', 'Si occupa in generale di fornire consulti imprenditoriali e manageriali'),
(10, 'Consulenze sul lavoro', 'Si occupa in generale di fornire consulti lavorativi');

-- --------------------------------------------------------

--
-- Struttura della tabella `possiedono`
--

CREATE TABLE `possiedono` (
  `codiceMansione` int(5) NOT NULL,
  `codiceSocio` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `possiedono`
--

INSERT INTO `possiedono` (`codiceMansione`, `codiceSocio`) VALUES
(1, 1),
(1, 6),
(1, 11),
(1, 16),
(2, 1),
(2, 6),
(2, 11),
(2, 16),
(3, 2),
(3, 7),
(3, 12),
(3, 17),
(4, 2),
(4, 7),
(4, 12),
(4, 17),
(5, 3),
(5, 8),
(5, 13),
(5, 18),
(6, 3),
(6, 8),
(6, 13),
(6, 18),
(7, 4),
(7, 9),
(7, 14),
(7, 19),
(8, 4),
(8, 9),
(8, 14),
(8, 19),
(9, 5),
(9, 10),
(9, 15),
(9, 20),
(10, 5),
(10, 10),
(10, 15),
(10, 20);

-- --------------------------------------------------------

--
-- Struttura della tabella `prestazioni`
--

CREATE TABLE `prestazioni` (
  `codiceRicevente` int(5) NOT NULL,
  `codicePrestante` int(5) NOT NULL,
  `codicePrestazione` int(5) NOT NULL,
  `numOre` int(5) NOT NULL,
  `dataPrestazione` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `prestazioni`
--

INSERT INTO `prestazioni` (`codiceRicevente`, `codicePrestante`, `codicePrestazione`, `numOre`, `dataPrestazione`) VALUES
(1, 2, 1, 4, '0000-00-00'),
(2, 3, 2, 2, '0000-00-00'),
(3, 4, 3, 9, '0000-00-00'),
(4, 5, 4, 2, '0000-00-00'),
(5, 6, 5, 6, '0000-00-00'),
(6, 7, 6, 1, '0000-00-00'),
(8, 9, 7, 7, '0000-00-00'),
(9, 10, 8, 9, '0000-00-00'),
(11, 13, 9, 2, '0000-00-00'),
(12, 10, 10, 4, '0000-00-00'),
(13, 5, 11, 8, '0000-00-00'),
(15, 1, 12, 2, '0000-00-00'),
(16, 17, 13, 7, '0000-00-00'),
(17, 12, 14, 6, '0000-00-00'),
(18, 10, 15, 8, '0000-00-00'),
(19, 6, 16, 9, '0000-00-00'),
(20, 3, 17, 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Struttura della tabella `sedi`
--

CREATE TABLE `sedi` (
  `codiceSede` int(5) NOT NULL,
  `citta` varchar(50) NOT NULL,
  `zona` varchar(50) NOT NULL,
  `provincia` varchar(50) NOT NULL,
  `regione` varchar(50) NOT NULL,
  `mappa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `sedi`
--

INSERT INTO `sedi` (`codiceSede`, `citta`, `zona`, `provincia`, `regione`, `mappa`) VALUES
(1, 'Torino', 'Crocette', 'TO', 'Piemonte', 'https://www.google.com/maps/place/Crocetta,+Torino+TO/@45.1126053,7.680771,13.5z/data=!4m6!3m5!1s0x4'),
(2, 'Roma', 'Tufello', 'RM', 'Lazio', 'https://www.google.com/maps/place/00139+Tufello+RM/@41.9476185,12.536619,15z/data=!3m1!4b1!4m6!3m5!1'),
(3, 'Venezia', 'Cannareggio', 'VE', 'Veneto', 'https://www.google.com/maps/place/Cannaregio,+30100+Venezia+VE/@45.4438421,12.3275081,15z/data=!3m1!'),
(4, 'Milano', 'Navigli', 'MI', 'Lombardia', 'https://www.google.com/maps/place/Navigli,+Milano+MI/data=!4m2!3m1!1s0x4786c3f1a5f7e6b5:0x2a0208c635'),
(5, 'Ascoli Piceno', 'San Benedetto del Tronto', 'AP', 'Marche', 'https://google.com/maps/place/63074+San+Benedetto+del+Tronto+AP/@42.9301217,13.8787193,13z/data=!3m1');

-- --------------------------------------------------------

--
-- Struttura della tabella `soci`
--

CREATE TABLE `soci` (
  `codiceSocio` int(5) NOT NULL,
  `numTelefono` varchar(20) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `indirizzo` varchar(50) NOT NULL,
  `orePrestate` int(5) NOT NULL,
  `oreRicevute` int(5) NOT NULL,
  `password` varchar(64) NOT NULL,
  `username` varchar(20) NOT NULL,
  `amministratore` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `soci`
--

INSERT INTO `soci` (`codiceSocio`, `numTelefono`, `nome`, `cognome`, `indirizzo`, `orePrestate`, `oreRicevute`, `password`, `username`, `amministratore`) VALUES
(1, '3899833939', 'Mattia', 'De Giorgi', 'Via Padova 39', 236, 50, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'oden', 1),
(2, '3462359484', 'Giovanni', 'Ligori', 'Via Genova 45', 1, 43, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'katakuri', 0),
(3, '6453526367', 'Tommaso', 'Legittimo', 'Via Petrose 59', 0, 21, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'jimbe', 0),
(4, '1232143234', 'Mattia', 'Paglialonga', 'Via Pascoli 43', 0, 21, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'robin', 0),
(5, '2423342671', 'Luca', 'Pierri', 'Via Giannelli 11', 0, 87, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'brook', 0),
(6, '7297492763', 'Giovanni', 'Pierri', 'Via Acquerelli 76', 1, 43, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'king', 0),
(7, '9423423721', 'Aldo', 'Cervellera', 'Via Lugano', 0, 32, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'roger', 0),
(8, '9238764328', 'Erminio', 'Uzziccato', 'Via Pessinetto 12', 0, 22, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'mihawk', 0),
(9, '7489372834', 'Andrea', 'Barone', 'Via Toscanelli 32', 0, 12, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'doflamingo', 0),
(10, '4323423443', 'Paolo', 'Cannone', 'Via Remo 15', 0, 200, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'trafalgar', 0),
(11, '2138239449', 'Luca', 'Brizzante', 'Via Melissano 121', 0, 23, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'kizaru', 0),
(12, '2781432889', 'Giammarco', 'Tocco', 'Via canarie 321', 0, 321, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'zoro', 0),
(13, '1239829394', 'Salvatore', 'Grana', 'Via Milano 57', 0, 231, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'sanji', 0),
(14, '1936432922', 'Stefano', 'Lepri', 'Via Fisco 12', 0, 111, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'luffy', 0),
(15, '6218423672', 'Mirko', 'Alessandrini', 'Via Paguro 89', 0, 0, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'nami', 0),
(16, '1232131223', 'Luca', 'Catone', 'Via Del Mare 92', 0, 112, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'usopp', 0),
(17, '9372746281', 'Flavio', 'Briatore', 'Via Remo 67', 0, 203, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'reyleigh', 0),
(18, '1287412399', 'Flavia', 'Roma', 'Via Svizzera 21', 0, 76, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'shanks', 0),
(19, '9126349948', 'Erica', 'Ricchioni', 'Via Re Dei 5', 0, 12, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'ace', 0),
(20, '1910237134', 'Sandra', 'Faustina', 'Via Dei Colli', 0, 123, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'garp', 0),
(22, '33333333', 'tommaso', 'legittimo', 'via G.Deledda', 0, 0, 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 'tommy', 1),
(26, 'asdfsad', 'fasdfasf', 'fasdf', 'asdfasdfas', 0, 0, '41a7ed1ba26217cf70059964c74665d0a9c364a4078f69a3ca6d1e2623b0679f', 'dasfasdfdsa', 0),
(28, '33333333', 'mattia', 'paglialonga', 'via G.Deledda', 0, 0, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'microtis', 0),
(29, '', '', '', '', 0, 0, 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', '', 0);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `categoriaprestazioni`
--
ALTER TABLE `categoriaprestazioni`
  ADD PRIMARY KEY (`codiceMansione`,`codicePrestazione`),
  ADD KEY `codicePrestazione` (`codicePrestazione`);

--
-- Indici per le tabelle `codici`
--
ALTER TABLE `codici`
  ADD PRIMARY KEY (`codiceAmministratore`);

--
-- Indici per le tabelle `iscrizioni`
--
ALTER TABLE `iscrizioni`
  ADD PRIMARY KEY (`codiceIscrizione`,`codiceSocio`),
  ADD KEY `codiceSede` (`codiceSede`),
  ADD KEY `codiceSocio` (`codiceSocio`);

--
-- Indici per le tabelle `mansioni`
--
ALTER TABLE `mansioni`
  ADD PRIMARY KEY (`codiceMansione`);

--
-- Indici per le tabelle `possiedono`
--
ALTER TABLE `possiedono`
  ADD PRIMARY KEY (`codiceMansione`,`codiceSocio`),
  ADD KEY `codiceSocio` (`codiceSocio`);

--
-- Indici per le tabelle `prestazioni`
--
ALTER TABLE `prestazioni`
  ADD PRIMARY KEY (`codicePrestazione`),
  ADD KEY `codiceRicevente` (`codiceRicevente`),
  ADD KEY `codicePrestante` (`codicePrestante`);

--
-- Indici per le tabelle `sedi`
--
ALTER TABLE `sedi`
  ADD PRIMARY KEY (`codiceSede`);

--
-- Indici per le tabelle `soci`
--
ALTER TABLE `soci`
  ADD PRIMARY KEY (`codiceSocio`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `iscrizioni`
--
ALTER TABLE `iscrizioni`
  MODIFY `codiceIscrizione` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT per la tabella `mansioni`
--
ALTER TABLE `mansioni`
  MODIFY `codiceMansione` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `prestazioni`
--
ALTER TABLE `prestazioni`
  MODIFY `codicePrestazione` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT per la tabella `sedi`
--
ALTER TABLE `sedi`
  MODIFY `codiceSede` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `soci`
--
ALTER TABLE `soci`
  MODIFY `codiceSocio` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `categoriaprestazioni`
--
ALTER TABLE `categoriaprestazioni`
  ADD CONSTRAINT `categoriaprestazioni_ibfk_1` FOREIGN KEY (`codiceMansione`) REFERENCES `mansioni` (`codiceMansione`),
  ADD CONSTRAINT `categoriaprestazioni_ibfk_2` FOREIGN KEY (`codicePrestazione`) REFERENCES `prestazioni` (`codicePrestazione`);

--
-- Limiti per la tabella `iscrizioni`
--
ALTER TABLE `iscrizioni`
  ADD CONSTRAINT `iscrizioni_ibfk_1` FOREIGN KEY (`codiceSede`) REFERENCES `sedi` (`codiceSede`),
  ADD CONSTRAINT `iscrizioni_ibfk_2` FOREIGN KEY (`codiceSocio`) REFERENCES `soci` (`codiceSocio`);

--
-- Limiti per la tabella `possiedono`
--
ALTER TABLE `possiedono`
  ADD CONSTRAINT `possiedono_ibfk_1` FOREIGN KEY (`codiceMansione`) REFERENCES `mansioni` (`codiceMansione`),
  ADD CONSTRAINT `possiedono_ibfk_2` FOREIGN KEY (`codiceSocio`) REFERENCES `soci` (`codiceSocio`);

--
-- Limiti per la tabella `prestazioni`
--
ALTER TABLE `prestazioni`
  ADD CONSTRAINT `prestazioni_ibfk_1` FOREIGN KEY (`codiceRicevente`) REFERENCES `soci` (`codiceSocio`),
  ADD CONSTRAINT `prestazioni_ibfk_2` FOREIGN KEY (`codicePrestante`) REFERENCES `soci` (`codiceSocio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
