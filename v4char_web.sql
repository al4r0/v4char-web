-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 13, 2016 at 04:39 PM
-- Server version: 5.5.49-0+deb8u1
-- PHP Version: 5.6.20-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `v4char_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `consultas`
--

CREATE TABLE IF NOT EXISTS `consultas` (
`id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `asunto` varchar(100) NOT NULL,
  `consulta` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultas`
--

INSERT INTO `consultas` (`id`, `email`, `asunto`, `consulta`) VALUES
(1, 'sd', 'ad', 'sadas'),
(2, 'as', '', 'as'),
(3, 'yt', 'ty', 'ty'),
(4, 'aas@as.com', 'as', 'asasasasaadsfdfssdfsdf'),
(5, 'as', 'sas', 'sasas'),
(6, 'LOl', 'LOL', 'LOOOLLO');

-- --------------------------------------------------------

--
-- Table structure for table `dic`
--

CREATE TABLE IF NOT EXISTS `dic` (
`id` int(25) NOT NULL,
  `title` varchar(255) NOT NULL,
  `archivo` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dic`
--

INSERT INTO `dic` (`id`, `title`, `archivo`) VALUES
(2, 'Las peores 500 contraseñas', 'http://v4char.com/archivos/500-worst-passwords.zip'),
(3, 'Wifi VodafoneXXXX', 'http://v4char.com/archivos/vodafoneXXXX.zip'),
(4, 'Rock You', 'http://v4char.com/archivos/rockyou.zip'),
(5, 'Cain & Abel', 'http://v4char.com/archivos/cain.zip'),
(6, 'PHPbb', 'http://v4char.com/archivos/phpbb.zip'),
(7, 'Base de datos PIN WPS', 'http://v4char.com/archivos/wps.txt'),
(8, 'GoyscriptWPS PINs', 'http://v4char.com/archivos/goyscript_pins.txt'),
(9, 'BSSIDs vulnerables WEP', 'http://v4char.com/archivos/BSSIDs_vulnerables_WEP.txt'),
(10, 'BSSIDs vulnerables WPA', 'http://v4char.com/archivos/BSSIDs_vulnerables_WPA.txt');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
`id` int(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `refer` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `useragent` varchar(255) NOT NULL,
  `fecha` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`id` int(10) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nombre`, `url`) VALUES
(1, 'Inicio', '/'),
(2, 'Noticias', '/noticias'),
(3, 'Hacking', '/hacking'),
(5, 'Diccionarios', '/diccionarios'),
(6, 'Webs de interés', '/webs'),
(7, 'Contacta', '/contacta');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
`id` int(255) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `cat` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `fecha`, `cat`, `url`, `title`, `text`) VALUES
(5, '0000-00-00 00:00:00', 'hacking', 'hackear-claves-wep', 'Hackear claves WEP', '<p>Hoy traigo un peque&ntilde;o tutorial donde ense&ntilde;are a entrar en Wifis con clave WEP, ya se que la clave WEP es poco com&uacute;n pero es sencillo y hay que empezar por algo.</p>\r\n<center><img id="irc_mi" class="img-responsive" src="http://i0.wp.com/hackpuntes.com/wp-content/uploads/2015/04/wifiwebno.jpg" alt="" /></center>\r\n<p style="text-align: left;">La clave WEP es la clave m&aacute;s vulnerable ( sin contar el no tener clave, pero es casi lo mismo ) , para entrar en una clave WEP lo &uacute;nico que necesitamos es:</p>\r\n<ul>\r\n<li>La suit aircrack-ng que esta disponible para casi todos los sistemas operativos</li>\r\n<li>Una tarjeta de red con sus respectivos drivers y que pueda inyectar</li>\r\n<li>5 minutos libres que es lo que tardas en sacar la clave</li>\r\n</ul>\r\n<p>Lo primero que tenemos que hacer es cerrar los procesos que puedan entorpecer el ataque:</p>\r\n<p>&nbsp;</p>\r\n<p><code># airmon-ng check kill</code></p>\r\n<p>Una vez realizado esto pongamos la tarjeta de red en modo monitor</p>\r\n<p><code># airmon-ng start </code></p>\r\n<p>Donde yo pongo wlan0 tienes que poner el nombre de la tarjeta de red pero lo normal es que sea wlan0 pero cosas m&aacute;s raras he visto, ojo no hace falta poner los ''&lt; &gt;'', esto nos crea una ''tarjeta de red'' nueva llamada mon0 que es la que usaremos a partir de ahora, ahora vamos a buscar nuestro objetivo</p>\r\n<p><code># airodump-ng mon0</code></p>\r\n<p>Cuando queramos pararemos presionando Ctrl+C&nbsp; ahora buscamos una que tenga clave WEP y procedemos a realizar el ataque</p>\r\n<p><code># airodump-ng -c -w --bssid mon0</code></p>\r\n<p>Con esto estamos capturando el tr&aacute;fico, ahora procedemos a asociar con la otra red (utilizar otra terminal)</p>\r\n<p><code># aireplay-ng -1 0 -a -h -e mon0</code></p>\r\n<p>Ahora solo tenemos que inyectar tr&aacute;fico (en otra terminal tambien)</p>\r\n<p><code># aireplay-ng -3 -b -h mon0</code></p>\r\n<p>Ya est&aacute; todo ahora solo tenemos que ir a la primera terminal y cuando tengamos los suficientes Datas probamos a obtener la clave (esto tambi&eacute;n en otra terminal)</p>\r\n<p><code># aircrack-ng </code></p>\r\n<p>Y esto no dara la clave, pero en hexadecimal y solo con esto ya tenemos la clave de la red wifi.</p>\r\n<p>&nbsp;</p>'),
(8, '0000-00-00 00:00:00', 'hacking', 'AXIS-XSS', 'AXIS Network Camera XSS persistente', '<p>Hace unos días, encontré una vulnerabilidad en las cámaras Axis de XSS (Cross-site scripting). Para quien no sepa que es esto del XSS consiste en poder inyectar código html en una web, ya sea de forma persistente, como puede ser un comentario, en el que en vez de dejar un texto dejes código html, o bien de forma no persistente como puede ser en una url, lo que buscamos con esto más que inyectar código html es conseguir meter un javascript y ya a a partir de ahí robar cookies o formularios, pero es más avanzado y ya lo veremos más adelante</p><br>\r\n<center><img class="img-responsive" src="http://www.networkwebcams.com/media/catalog/product/cache/5/image/c8e7b2922fe3ed24d8af6a33b961dcd4/a/x/axis_p3343.jpg"></center>\r\n<br>\r\n<p>Una vez que sabemos todo esto procedamos al ataque, antes de nada he de decir que debes tener acceso a la webcam, es decir la clave del admin y la contraseña, pero por si no la tienes suele ser <b>Usuario: root -> Contraseña: root</b>, y si no te funciona eso como siempre digo más adelante subire tutoriales.</p><br>\r\n<p>Ahora estamos dentro del panel de administración, solo tenemos que ir a <b>Live View Config</b></p>\r\n<br><center><img src="http://s12.postimg.org/lofb90za5/Pantallazo_Live_View_Config_Layout_AXIS_210_Ne.png" class="img-responsive"></center><br>\r\n<p>Ahora estamos viendo <b>User Defined Links</b> marcamos uno cualquiera para mostrar y donde no pide que pongamos el nombre vamos a poner código html</p><br><code>Hola ''"/>&lt;h1&gt;hola&lt;/h1&gt;</code><br>\r\n<p>Lo que hacemos con esto es escapar del cuadro de texto y meter nuestro código html que en este caso es mostrar hola en grande pero eso no nos vale para nada lo que necesitamos es meter javascript, muchos no dejan meter javascript pero este si.</p><br>\r\n<code>Hola ''"/>&lt;script&gt;alert(String.fromCharCode(72,97,99,107,101,100))&lt;/script&gt;</code><br>\r\n<center><img src="http://s15.postimg.org/ln3t1gky3/Pantallazo_Live_view_AXIS_210_Network_Camera.png" class="img-responsive"></center><br>\r\n<p>Ahora solo tienes que entrar en la url principal de la webcam y veras el mensaje "hacked", y porque uso String.fromCharCode(72,97,99,107,101,100) en vez de poner "hacked" por que la cámara tiene un filtro que quita las comillas y con esto nos lo saltamos, lo que hace String.fromCharCode() es escribir la letra de su valor en ASCII y con eso esta todo.'),
(9, '0000-00-00 00:00:00', 'noticias', 'buscador-de-servicios', 'Buscador de servicios', '<p>Hace un tiempo empeze con un mini-proyecto, más o menos consiste en un <a target="_blank" href="https://www.shodan.io/">shodan</a>, obiamente la herramienta no es tan buena como shodan, aunque ya le dedicaré capítulos a ello.<br><br>\r\nPara quien no este metido en el "mundillo" shodan es como el google de los servicios, donde puedes encontrar desde cámaras hasta gasolineras pasando por impresoras.<br>\r\n<center><img class="img-responsive" src="http://iotevent.eu/wp-content/uploads/2015/03/Shodan_logo.png"></center><br>Pero vamos a explicar como funciona el que he programado yo, es simple, consta de dos partes:<br><br>\r\n-La primera parte es el buscador de servicios, programado en python, a groso modo lo que hace es tomar una ip al azar del rango público y hacer una conexión a un puerto al azar de la lista, si en ese puerto hay un servicio lo guarda en la base de datos.<br><br>\r\n-Y la segunda parte es la interfaz web donde puedes buscar los banner de los distintos servicios como por ejemplo SSH con versión 3, como puedes comprobar yo y CSS no somos muy amigos pero el código PHP funciona.<br>\r\nPodeis encontrar el código en <a target="_blank" href="https://github.com/v4char/Escaner-de-servicios">mi Github</a>.<br><br><br>\r\n\r\nPero he montado yo uno donde ya tengo una gran base de datos, solo tienes que ir a Recursos -> Buscador de servicios o entrar aquí <a target="_blank" href="http://scan.v4char.com">http://scan.v4char.com</a><br><br>\r\n<center><img class="img-responsive" src="http://s30.postimg.org/wqtcvfrc1/Pantallazo_v4search_server_Iceweasel.png"></center><br>\r\n</p>'),
(10, '0000-00-00 00:00:00', 'hacking', 'atacar-servidores-mediante-fuerza-bruta', 'Atacar servidores mediante fuerza bruta', '<p>Los ataques de fuerza bruta (brute force) consisten en realizar múltiples conexiones a cualquier tipo de servidor con claves y usuarios distintos hasta encontrar uno válido.<br><center><img class="img-responsive" src="http://www.hacking.pl/wp-content/uploads/2016/02/xhydra.png" class></center><br>En este tutorial usaré medusa, es una de las mejores pero hay unas cuantas más como por ejemplo hydra.<br>\r\nLo que necesitamos es un servidor FTP el cual atacaremos y un diccionario, que puedes encontrar en la pestaña recursos. La sintaxis de medusa es simple usaremos <code>medusa</code> con los siguientes parámetros :<br><br>\r\n<code>-h (ip/host)<br>\r\n-u (usuario) o también puedes usar -U (lista de usuarios.txt)<br>\r\n-p (contraseña) o tambien puedes usar -P (diccionario.txt)<br>\r\n-M (servicio) en este caso ftp pero puedes hay otros como ssh o http<br>\r\n-f este parámetro se usa para que pare cuando encuentre un usuario y una contraseña válidos<br>\r\n-O (log.txt) recomiendo usar este comando para que te guarde los resultados en txt<br>\r\n-t (número de intentos simultáneos) lo que haces con esto es hacer mayor número de intentos simultáneos lo que reduce la velocidad pero el servidor te puede bloquear es recomendable no poner demasiados<br>\r\n-n (puerto) este parámetro se usa para atacar el puerto deseado</code><br><br>\r\n<p>Una vez visto esto pongamos un pequeño ejemplo de uso:<br></p>\r\n<code>medusa -h google.es -u root -P rockyou.txt -M ftp -f -O log.txt -t 50 -n 21</code><br><br>\r\n<p>Con esto es todo por ahora, pero los ataques pueden ser mucho más avanzados recomiendo que uses <code>man medusa</code> para ver todas la utilidades.</p>\r\n</p>');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `user`, `pass`) VALUES
(1, 'admin', 'D6350504EC65EA8486F4C309EBCF43B3FD4AE9140E95A5F2011C2D8C12295B484E46C44EF9382AF151FCAFC56429E895DB20F0CA44D0A73DE7F2EAFFCF0648D1');

-- --------------------------------------------------------

--
-- Table structure for table `webs`
--

CREATE TABLE IF NOT EXISTS `webs` (
`id` int(25) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `webs`
--

INSERT INTO `webs` (`id`, `title`, `url`) VALUES
(1, 'Hack & Crack ', 'https://foro.hackxcrack.net/'),
(2, 'ElHacker.net', 'http://foro.elhacker.net/'),
(3, 'Underc0de', 'https://underc0de.org/foro/'),
(4, 'Seguridad wireless', 'http://foro.seguridadwireless.net');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consultas`
--
ALTER TABLE `consultas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dic`
--
ALTER TABLE `dic`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webs`
--
ALTER TABLE `webs`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consultas`
--
ALTER TABLE `consultas`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `dic`
--
ALTER TABLE `dic`
MODIFY `id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `webs`
--
ALTER TABLE `webs`
MODIFY `id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
