-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2016 a las 03:01:10
-- Versión del servidor: 5.6.14
-- Versión de PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `libros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE IF NOT EXISTS `autor` (
  `idAu` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `nombre` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `bio` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `libros` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `popular` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idAu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`idAu`, `imagen`, `nombre`, `bio`, `libros`, `popular`) VALUES
(1, 'agatha.jpg', 'Agatha Mary Clarissa Miller (Agatha Christie)', 'Fue una escritora británica especializada en el género policial, por cuyo trabajo tuvo reconocimiento a nivel internacional. Además de 66 novelas policiales, también publicó seis novelas rosas y 14 historias cortas bajo el seudónimo de Mary Westmacott , e incursionó exitosamente como autora teatral, con obras como La ratonera o Testigo de cargo.', 'Novelas / Policial / Detectives', 'El asesinato de Roger Ackroyd, Asesinato en el Orient Express, Diez negritos, Se anuncia un asesinato, La ratonera'),
(2, 'austin.jpg', 'Jane Austen', 'ue una destacada novelista británica que vivió durante el período de la Regencia. La ironía que emplea para dotar de comicidad a sus novelas hace que Jane Austen sea considerada entre los «clásicos» de la novela inglesa, a la vez que su recepción va, incluso en la actualidad, más allá del interés académico, siendo sus obras leídas por un público más amplio.', 'novelas', 'Sentido y sensibilidad / Orgullo y prejuicio / Persuasión ...'),
(3, 'danielle.jpg', 'Danielle Fernande Dominique Schuelein -Steel (Danielle Steel)', 'Nació el 14 de agosto de 1947 en la ciudad de Nueva York. Habla bien inglés, francés e italiano, y un poco de español, alemán, finlandés y japonés. Nunca se graduó. Dejó la Universidad de Nueva York cuatro meses antes de terminar sus estudios de literatura francesa e italiano.Su primera novela fue Going Home y se publicó en 1973. ', 'literartura', 'Power Play / 	\r\nWinners / 	\r\nFirst Sight / Leap of Faith (Salto de confianza), junio 2001\r\n- Lone Eagle (El águila solitaria), abril 2001\r\n- Journey (Viaje), octubre 2000 '),
(4, 'john.jpg', 'John Grisham', 'Novelista estadounidense, destacado autor de best sellers. Tras licenciarse en Derecho por la Mississippi State University en 1981 y cursar estudios en la Ole Miss Law School, ejerció como abogado criminalista en ese estado. También fue miembro de la Mississippi House of Representatives durante dos legislaturas', ' novela de intriga jurídica', 'The firm, 1991  / The Chamber, 1994, / en Tiempo de matar (A Time to Kill, 1992) /  The Client.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `critica`
--

CREATE TABLE IF NOT EXISTS `critica` (
  `idCritica` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(600) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `comentario` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idCritica`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `idEvento` int(11) NOT NULL AUTO_INCREMENT,
  `contenido` varchar(600) COLLATE utf8_bin NOT NULL,
  `fecha` date NOT NULL,
  `lugar` varchar(600) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idEvento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE IF NOT EXISTS `libro` (
  `isbn` varchar(13) COLLATE utf8_bin NOT NULL,
  `autor` varchar(60) COLLATE utf8_bin NOT NULL,
  `titulo` varchar(70) COLLATE utf8_bin NOT NULL,
  `tipo` varchar(50) COLLATE utf8_bin NOT NULL,
  `descripcion` text COLLATE utf8_bin NOT NULL,
  `imagen` varchar(100) COLLATE utf8_bin NOT NULL,
  KEY `isbn` (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`isbn`, `autor`, `titulo`, `tipo`, `descripcion`, `imagen`) VALUES
('9780345547897', 'Jessica Brockmole', 'At the Edge of Summer', 'arte', '        In the wake of her father''s death and her mother''s disappearance, fifteen-year-old Clare Ross is sent away from her home in Scotland to Mille Mots, the idyllic château of the Crépet family in France. There she finds solace in a friendship with Luc, the only son of the Crépets, who teaches her to draw out in the rambling garden of the château. But with the return of her grandfather, a scholar who never stays in one place for long, Clare is forced to leave the comforts of Mille Mots. Devastated by her departure, Luc''s letters and the memory of that one summer keep her grounded as she moves with her grandfather from Portugal to Africa and everywhere in between.\r\nYears later, a war rages across Europe, and Luc and Clare have drifted apart, Clare to the Glasgow School of Art, Luc to the bloody First Battle of the Aisne in 1914. Clare decides to help the war effort by volunteering in a Paris studio, making facial prosthetics for injured French soldiers. When a particularly surly young man comes through the clinic, his face is unrecognizable to Clare, but there''s something very familiar about him. In the midst of war, and after so many years apart, will Luc and Clare be able to recapture the connection they had that first summer together?', 'arte.jpg'),
('123654789', 'Paulo Coelho ', 'The Alchemist ', 'novela', '        is a novel by Brazilian author Paulo Coelho first published in 1988. Originally written in Portuguese, it has been translated into at least 67 languages as of October 2009. An allegorical novel, The Alchemist follows a young Andalusian shepherd named Santiago in his journey to Egypt, after having a recurring dream of finding treasure there.\r\n\r\nThe book is an international bestseller. According to AFP, it has sold more than 65 million copies in 56 different languages, becoming one of the best-selling books in history and setting the Guinness World Record for most translated book by a living author.', 'alc.jpg'),
('', 'Agatha Christie', 'The a.b.c Murders', 'novela', 'The book features the characters of Hercule Poirot, Arthur Hastings and Chief Inspector Japp. The form of the novel is unusual, combining first- and third-person narrative. This approach was famously pioneered by Charles Dickens in Bleak House, and was tried by Agatha Christie in The Man in the Brown Suit. What is unusual in The A.B.C. Murders is that the third-person narrative is supposedly reconstructed by the first-person narrator, Hastings. This approach shows Christie''s commitment to experimenting with point of view, famously exemplified by The Murder of Roger Ackroyd.\r\n\r\nThe novel was well received in the UK and the US when it was published. One reviewer said it was "a baffler of the first water," while another remarked on Christie''s ingenuity in the plot. A reviewer in 1990 said it was "A classic, still fresh story, beautifully worked out', 'h.jpg'),
('', 'John Guy', 'Elizabeth: The Forgotten Years', 'historia', 'A groundbreaking reconsideration of our favorite Tudor queen, "Elizabeth" is an intimate and surprising biography that shows her at the height of her power by the bestselling, Whitbread Award-winning author of "Queen of Scots." \r\nElizabeth was crowned at twenty-five after a tempestuous childhood as a bastard and an outcast, but it was only when she reached fifty and all hopes of a royal marriage were dashed that she began to wield real power in her own right. For twenty-five years she had struggled to assert her authority over advisers who pressed her to marry and settle the succession; now, she was determined not only to reign but also to rule. In this magisterial biography of England''s most ambitious Tudor queen, John Guy introduces us to a woman who is refreshingly unfamiliar: at once powerful and vulnerable, willful and afraid. In these essential and misunderstood forgotten years, Elizabeth confronts challenges at home and abroad: war against the Catholic powers of France and Spain, revolt in Ireland, an economic crisis that triggered riots in the streets of London, and a conspiracy to place her cousin Mary Queen of Scots on her throne. For a while she was smitten by a much younger man, but could she allow herself to act on that passion and still keep her throne? \r\nFor the better part of a decade John Guy mined long-overlooked archives, scouring court documents and handwritten letters to sweep away myths and rumors. This prodigious historical detective work has made it possible to reveal for the first time the woman behind the polished veneer: wracked by insecurity, often too anxious to sleep alone, voicing her own distinctive and surprisingly resonant concerns. Guy writes like a dream, and this combination of groundbreaking research and propulsive narrative puts him in a class of his own.', 'eliz.jpg'),
('', 'Agatha Christie', 'The a.b.c Murders', 'novela', 'The book features the characters of Hercule Poirot, Arthur Hastings and Chief Inspector Japp. The form of the novel is unusual, combining first- and third-person narrative. This approach was famously pioneered by Charles Dickens in Bleak House, and was tried by Agatha Christie in The Man in the Brown Suit. What is unusual in The A.B.C. Murders is that the third-person narrative is supposedly reconstructed by the first-person narrator, Hastings. This approach shows Christie''s commitment to experimenting with point of view, famously exemplified by The Murder of Roger Ackroyd.\r\n\r\nThe novel was well received in the UK and the US when it was published. One reviewer said it was "a baffler of the first water," while another remarked on Christie''s ingenuity in the plot. A reviewer in 1990 said it was "A classic, still fresh story, beautifully worked out', 'h.jpg'),
('', 'John Guy', 'Elizabeth: The Forgotten Years', 'historia', 'A groundbreaking reconsideration of our favorite Tudor queen, "Elizabeth" is an intimate and surprising biography that shows her at the height of her power by the bestselling, Whitbread Award-winning author of "Queen of Scots." \r\nElizabeth was crowned at twenty-five after a tempestuous childhood as a bastard and an outcast, but it was only when she reached fifty and all hopes of a royal marriage were dashed that she began to wield real power in her own right. For twenty-five years she had struggled to assert her authority over advisers who pressed her to marry and settle the succession; now, she was determined not only to reign but also to rule. In this magisterial biography of England''s most ambitious Tudor queen, John Guy introduces us to a woman who is refreshingly unfamiliar: at once powerful and vulnerable, willful and afraid. In these essential and misunderstood forgotten years, Elizabeth confronts challenges at home and abroad: war against the Catholic powers of France and Spain, revolt in Ireland, an economic crisis that triggered riots in the streets of London, and a conspiracy to place her cousin Mary Queen of Scots on her throne. For a while she was smitten by a much younger man, but could she allow herself to act on that passion and still keep her throne? \r\nFor the better part of a decade John Guy mined long-overlooked archives, scouring court documents and handwritten letters to sweep away myths and rumors. This prodigious historical detective work has made it possible to reveal for the first time the woman behind the polished veneer: wracked by insecurity, often too anxious to sleep alone, voicing her own distinctive and surprisingly resonant concerns. Guy writes like a dream, and this combination of groundbreaking research and propulsive narrative puts him in a class of his own.', 'eliz.jpg'),
('9781421584423', 'Akira Higashiyama', 'Sakura Hiden: Thoughts of Love, Riding Upon a Spring Breeze', 'ficcion', '        Sakura Haruno reflects on some moments she''s had with Sasuke Uchiha: when she unintentionally insulted him shortly after the formation of Team 7; when she tried to stop him from defecting to Orochimaru; when he left Konoha to wander the world, but promised to see her again. Sakura wonders where he is now.', 'Sakura.png'),
('789654123', 'Guillaume Musso', 'Girl on paper ', 'literatura', '        Can fiction influence real life? \r\n“She appeared on my terrace on a stormy night, soaking wet and stark naked:\r\n- Where did you come from?\r\n- I fell…\r\n- Fell out of what?\r\n- Fell out of your book. You know, out of your story!”\r\nTom Boyd, a famous writer who’s suffering from writer’s block, meets one day the heroin of his novels. She’s pretty, desperate, and tells him she will die if he stops writing.\r\nImpossible? And yet…\r\nTom and Billie will embark together on an adventure where reality and fiction are intricately intertwined, constantly shifting in a seductive and potentially deadly game…\r\nThis page is made available for non French speakers interested in Guillame Musso’s work.  To find out more about the English language edition of this book, please visit Gallic Books.', 'filleDu.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(65) NOT NULL,
  `contrasena` varchar(65) NOT NULL,
  `email` varchar(200) NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `contrasena`, `email`) VALUES
(2, 'jih', '333fb15fef4ee36cc0a8c7665e18bed1', 'jih@h.co');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
