-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 10, 2021 alle 20:41
-- Versione del server: 10.4.14-MariaDB
-- Versione PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enoteca-online`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `bottiglie`
--

CREATE TABLE `bottiglie` (
  `id` int(11) NOT NULL,
  `prezzo` decimal(7,2) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `litri` decimal(5,2) NOT NULL,
  `annata` int(11) NOT NULL,
  `descrizione` text DEFAULT NULL,
  `immagine` varchar(45) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `idCantina` int(11) DEFAULT NULL,
  `idVenditore` int(11) NOT NULL,
  `quantitàDisponibile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `bottiglie`
--

INSERT INTO `bottiglie` (`id`, `prezzo`, `nome`, `litri`, `annata`, `descrizione`, `immagine`, `idCategoria`, `idCantina`, `idVenditore`, `quantitàDisponibile`) VALUES
(1, '8.90', 'Sangiovese Castelluccio Le More', '0.50', 2018, '', 'castelluccio-le-more.jpg', 1, 1, 24, 0),
(2, '5.50', 'Sangiovese Fico Grande', '0.50', 2019, '', 'fico-grande-poderi-dal-nespoli.jpg', 1, 2, 24, 1),
(3, '6.50', 'Sangiovese Superiore La Battagliona', '0.50', 2018, '', 'la-battagliona.jpg', 1, 1, 24, 6),
(4, '13.00', 'Ferrari Perlè', '0.50', 2018, '', 'ferrari-perle.jpg', 2, 4, 24, 8),
(5, '15.00', 'Ferrari Perlè Trento Doc', '0.50', 2018, '', 'ferrari-perle-trento-doc.jpg', 2, 4, 24, 10),
(6, '26.00', 'Bellavista Gran Curvè Brut', '0.50', 2017, '', 'bellavista-gran-cuvé-brut-alma.jpg', 2, 5, 24, 10),
(7, '700.00', 'Dom Perignon Rosè Vintage', '0.50', 2007, '', 'dom-perignon-rose.jpg', 3, 6, 24, 10),
(8, '40.00', 'Gin Mare', '0.70', 2020, '', 'gin-mare.jpg', 4, 7, 24, 10),
(9, '200.00', 'Dom Perignon Rosè Vintage', '0.50', 2008, '', 'dom-perignon-vintage.jpg', 2, 6, 24, 9),
(10, '12.00', 'Chianti Cecchi', '0.50', 2018, '', 'chianti-cecchi.jpg', 1, 2, 24, 10),
(11, '10.00', 'Chianti Classico Piccini', '0.50', 2019, '', 'chianti-classico-piccini.jpg', 1, 2, 24, 10),
(31, '12.00', 'Bombay', '0.75', 2017, 'gin ottimo', 'bombay.jpg', 4, 7, 24, 10),
(41, '22.00', 'Gin Hendrick\'s', '1.00', 2020, 'buon gin, un classico', 'hendricks.jpg', 4, 7, 22, 10),
(42, '17.00', 'Bellini Rosè', '1.00', 2019, 'Ottimo rosé', 'bellini.jpg', 3, 12, 22, 7),
(43, '29.00', 'Ca\' Del Bosco', '0.75', 2018, 'Ottimo vino bianco.', 'franciacorta-ca-del-bosco.jpg', 2, 8, 22, 0),
(44, '15.00', 'Friulano Bastianich', '1.00', 2018, 'Ottimo vino bianco.', 'friulano-bastianich.jpg', 2, 9, 22, 10),
(45, '5.00', 'Lambrusco Ceci', '0.75', 2019, 'Ottimo vino rosso.', 'ceci-lambrusco.jpg', 1, 11, 22, 10),
(46, '12.00', ' Otello Nero di Lambrusco', '1.00', 2018, 'Ottimo vino rosso.', 'Otello-NerodiLambrusco.jpg', 1, 11, 22, 7),
(47, '22.00', 'Bertani Amarone', '0.75', 2016, 'Ottimo vino rosso.', 'bertani-amarone.jpg', 1, 10, 22, 6),
(48, '16.00', ' Bertani Valpolicella', '0.75', 2017, 'Ottimo vino rosso.', 'bertani-valpolicella.jpg', 1, 10, 22, 10);

-- --------------------------------------------------------

--
-- Struttura della tabella `cantine`
--

CREATE TABLE `cantine` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `regione` varchar(45) DEFAULT NULL,
  `immagine` varchar(45) DEFAULT NULL,
  `cantinecol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `cantine`
--

INSERT INTO `cantine` (`id`, `nome`, `regione`, `immagine`, `cantinecol`) VALUES
(1, 'Sangiovese', 'Emilia Romagna', 'sangiovese-logo.jpg', NULL),
(2, 'Chianti', 'Toscana', 'chianti-logo.jpg', NULL),
(4, 'Ferrari', 'Friuli Venezia Giulia', 'Ferrari-logo.jpg', NULL),
(5, 'Bellavista', 'Friuli Venezia Giulia', 'Bellavista-logo.jpg', NULL),
(6, 'Dom Perignon', 'Francia', 'Dom-perignon-logo.jpg', NULL),
(7, 'Mediterranean Gin', 'Spagna', 'Mediterranean-gin-logo.jpg', NULL),
(8, 'Merlot', 'Francia', 'merlot-logo.jpg', NULL),
(9, 'Bastianich', 'Friuli Venezia Giulia', 'bastianich-logo.jpg', NULL),
(10, 'Bertani', 'Veneto', 'bertani-logo.jpg', NULL),
(11, 'Ceci', 'Emilia-Romagna', 'ceci-logo.jpg', NULL),
(12, 'Allegrini', 'Veneto', 'allegrini-logo.jpg', NULL),
(13, 'Bollinger', 'Veneto', 'bollinger-logo.jpg', NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `carrello`
--

CREATE TABLE `carrello` (
  `id` int(11) NOT NULL,
  `quantità` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idBottiglia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `carrello`
--

INSERT INTO `carrello` (`id`, `quantità`, `idCliente`, `idBottiglia`) VALUES
(174, 6, 24, 31),
(210, 1, 23, 4),
(214, 1, 23, 44);

-- --------------------------------------------------------

--
-- Struttura della tabella `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `immagine` varchar(45) NOT NULL,
  `descrizione` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `categorie`
--

INSERT INTO `categorie` (`id`, `nome`, `immagine`, `descrizione`) VALUES
(1, 'Vini Rossi', 'vino-rosso.jpg', ''),
(2, 'Vini Bianchi', 'vino-bianco.jpg', ''),
(3, 'Vini Rosè', 'vino-rose.jpg', ''),
(4, 'Gin', 'gin.jpg', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `notifiche`
--

CREATE TABLE `notifiche` (
  `id` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `visualizzata` tinyint(1) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idTipoNotifica` int(11) NOT NULL,
  `idOrdine` int(11) DEFAULT NULL,
  `idBottiglia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `ordini`
--

CREATE TABLE `ordini` (
  `id` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `stato` enum('confermato','spedito','in viaggio','consegnato') NOT NULL,
  `idCliente` int(11) NOT NULL,
  `dataConsegna` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `ordini`
--

INSERT INTO `ordini` (`id`, `data`, `stato`, `idCliente`, `dataConsegna`) VALUES
(30, '2021-02-10 16:54:22', 'consegnato', 23, '2021-02-10 16:57:44'),
(31, '2021-02-10 16:58:25', 'consegnato', 23, '2021-02-10 17:00:35'),
(32, '2021-02-10 17:02:10', 'consegnato', 23, '2021-02-10 20:08:20'),
(33, '2021-02-10 20:05:33', 'consegnato', 23, '2021-02-10 20:08:17'),
(34, '2021-02-10 20:12:23', 'confermato', 23, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `righe_ordine`
--

CREATE TABLE `righe_ordine` (
  `id` int(11) NOT NULL,
  `quantità` varchar(45) NOT NULL,
  `totale` varchar(45) NOT NULL,
  `idBottiglia` int(11) NOT NULL,
  `idOrdine` int(11) NOT NULL,
  `stato_riga` enum('confermato','spedito') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `righe_ordine`
--

INSERT INTO `righe_ordine` (`id`, `quantità`, `totale`, `idBottiglia`, `idOrdine`, `stato_riga`) VALUES
(35, '7', '38.5', 2, 30, 'spedito'),
(36, '4', '26', 3, 30, 'spedito'),
(37, '3', '66', 47, 30, 'spedito'),
(38, '3', '26.700000000000003', 1, 31, 'spedito'),
(39, '2', '11', 2, 31, 'spedito'),
(40, '3', '36', 46, 31, 'spedito'),
(41, '7', '62.300000000000004', 1, 32, 'spedito'),
(42, '3', '51', 42, 33, 'spedito'),
(43, '1', '29', 43, 33, 'spedito'),
(44, '1', '13', 4, 33, 'spedito'),
(45, '9', '261', 43, 34, 'confermato'),
(46, '1', '200', 9, 34, 'confermato'),
(47, '1', '13', 4, 34, 'confermato'),
(48, '1', '22', 47, 34, 'confermato');

-- --------------------------------------------------------

--
-- Struttura della tabella `tipo_notifica`
--

CREATE TABLE `tipo_notifica` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `descrizione` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `tipo_notifica`
--

INSERT INTO `tipo_notifica` (`id`, `nome`, `descrizione`) VALUES
(1, 'ordine confermato', 'il tuo ordine è stato preso in considerazione dal venditore'),
(2, 'ordine spedito', 'il tuo ordine è stato spedito, ora è in viaggio'),
(3, 'ordine ricevuto', 'il tuo ordine è stato consegnato'),
(4, 'prodotto esaurito', 'le scorte in magazzino di un prodotto sono esaurite'),
(5, 'nuovo ordine', 'hai preso in carico un nuovo ordine, spediscilo al cliente'),
(6, 'registrazione', 'Benvenuto nella Bottega di Bacco!');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `ruolo` enum('cliente','venditore') NOT NULL,
  `nome` varchar(45) NOT NULL,
  `cognome` varchar(45) NOT NULL,
  `indirizzo` varchar(45) DEFAULT NULL,
  `nazione` varchar(45) DEFAULT NULL,
  `CAP` varchar(5) DEFAULT NULL,
  `città` varchar(50) NOT NULL,
  `provincia` varchar(50) NOT NULL,
  `cellulare` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id`, `username`, `password`, `ruolo`, `nome`, `cognome`, `indirizzo`, `nazione`, `CAP`, `città`, `provincia`, `cellulare`) VALUES
(22, 'riccardo.marconi2@studio.unibo.it', '237c1c905d56046f024a112bcbed1d0e7979d21b', 'venditore', 'Riccardo', 'Marconi', 'via Matteotti n. 20', 'IT', '47030', 'San Mauro Pascoli', 'FC', '3334565765'),
(23, 'ginopino@blogtw.com', '237c1c905d56046f024a112bcbed1d0e7979d21b', 'cliente', 'Riccardo', 'Marconi', 'via Matteotti n. 20', 'IT', '47030', 'Cesena', 'FC', '3934599965'),
(24, 'michele.prencipe5@studio.unibo.it', '237c1c905d56046f024a112bcbed1d0e7979d21b', 'venditore', 'Michele', 'prencipe', 'Giovanni Vendemini 18/b', 'IT', '47039', 'Savignano Sul Rubicone', 'FC', '3667884345'),
(27, 'cippalippa@blogtw.com', '237c1c905d56046f024a112bcbed1d0e7979d21b', 'cliente', 'Michele', 'prencipe', 'Giovanni Vendemini 18/b', 'IT', '47039', 'Savignano', 'FC', '3339965694'),
(28, 'roberh99@gmail.com', '237c1c905d56046f024a112bcbed1d0e7979d21b', 'cliente', 'Riccardo', 'Marconi', 'via Matteotti n. 20', 'IT', '47030', 'San Mauro Pascoli', 'FC', '3924761013'),
(30, 'michtor99', '237c1c905d56046f024a112bcbed1d0e7979d21b', 'cliente', 'Michele', 'prencipe', 'Giovanni Vendemini 18/b', 'IT', '47039', 'Savignano', 'Savignano', '3270105245');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `bottiglie`
--
ALTER TABLE `bottiglie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcategoria_bottiglie` (`idCategoria`),
  ADD KEY `idcantina_bottiglie` (`idCantina`),
  ADD KEY `fk_venditore_bottiglie` (`idVenditore`);

--
-- Indici per le tabelle `cantine`
--
ALTER TABLE `cantine`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `carrello`
--
ALTER TABLE `carrello`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idCliente` (`idCliente`,`idBottiglia`),
  ADD KEY `idcarrellobottiglia` (`idBottiglia`);

--
-- Indici per le tabelle `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `notifiche`
--
ALTER TABLE `notifiche`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcliente_notifiche` (`idCliente`),
  ADD KEY `idtiponotifica` (`idTipoNotifica`),
  ADD KEY `idordine_notifiche` (`idOrdine`),
  ADD KEY `idBottiglia` (`idBottiglia`);

--
-- Indici per le tabelle `ordini`
--
ALTER TABLE `ordini`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcliente_ordine` (`idCliente`);

--
-- Indici per le tabelle `righe_ordine`
--
ALTER TABLE `righe_ordine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idbottiglia_righe` (`idBottiglia`),
  ADD KEY `idordine_righe` (`idOrdine`);

--
-- Indici per le tabelle `tipo_notifica`
--
ALTER TABLE `tipo_notifica`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `bottiglie`
--
ALTER TABLE `bottiglie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT per la tabella `cantine`
--
ALTER TABLE `cantine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT per la tabella `carrello`
--
ALTER TABLE `carrello`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT per la tabella `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `notifiche`
--
ALTER TABLE `notifiche`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=312;

--
-- AUTO_INCREMENT per la tabella `ordini`
--
ALTER TABLE `ordini`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT per la tabella `righe_ordine`
--
ALTER TABLE `righe_ordine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT per la tabella `tipo_notifica`
--
ALTER TABLE `tipo_notifica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `bottiglie`
--
ALTER TABLE `bottiglie`
  ADD CONSTRAINT `fk_venditore_bottiglie` FOREIGN KEY (`idVenditore`) REFERENCES `utenti` (`id`),
  ADD CONSTRAINT `idcantina_bottiglie` FOREIGN KEY (`idCantina`) REFERENCES `cantine` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `carrello`
--
ALTER TABLE `carrello`
  ADD CONSTRAINT `idcarrellobottiglia` FOREIGN KEY (`idBottiglia`) REFERENCES `bottiglie` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idcarrellocliente` FOREIGN KEY (`idCliente`) REFERENCES `utenti` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `notifiche`
--
ALTER TABLE `notifiche`
  ADD CONSTRAINT `idBottiglia` FOREIGN KEY (`idBottiglia`) REFERENCES `bottiglie` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idcliente_notifiche` FOREIGN KEY (`idCliente`) REFERENCES `utenti` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idordine_notifiche` FOREIGN KEY (`idOrdine`) REFERENCES `ordini` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idtiponotifica` FOREIGN KEY (`idTipoNotifica`) REFERENCES `tipo_notifica` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `ordini`
--
ALTER TABLE `ordini`
  ADD CONSTRAINT `idcliente_ordine` FOREIGN KEY (`idCliente`) REFERENCES `utenti` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `righe_ordine`
--
ALTER TABLE `righe_ordine`
  ADD CONSTRAINT `idbottiglia_righe` FOREIGN KEY (`idBottiglia`) REFERENCES `bottiglie` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idordine_righe` FOREIGN KEY (`idOrdine`) REFERENCES `ordini` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
