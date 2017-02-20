
-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 07-02-2017 a las 15:24:54
-- Servidor: localhost
-- Versión de PHP: 5.6.15


-- --------------------------------------------------------
--
-- Volcado de datos para la tabla `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`) VALUES
(1, 'admin', 'admin', 'segundo@kiupa.com', 'segundo@kiupa.com', 1, 'iq1wk3hdko0kk8sgwgcwckoow0cosgo', '$2y$13$iq1wk3hdko0kk8sgwgcwceWqlvl.Q12bdCEBHb1JVGnxbhzCrqcR6', '2017-02-01 19:17:32', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL),
(2, 'user', 'user', 'segundo@kiupa.es', 'segundo@kiupa.es', 1, '985rnqowqz8cc04o4g080cwokg0gswg', '$2y$13$985rnqowqz8cc04o4g080Oqa7if6QOYyrT69Fh6HihO1jXRh3.0TK', '2017-01-30 23:54:50', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL);


-- --------------------------------------------------------
--
-- Volcado de datos para la tabla `tipocomercio`
--

INSERT INTO `tipocomercio` (`id`, `nombre`) VALUES
(8, 'Abogados'),
(1, 'Bares'),
(6, 'Floristerías'),
(7, 'Fontanería'),
(5, 'Modas'),
(3, 'Panaderías'),
(2, 'Pinturas'),
(4, 'Zapaterías');


-- --------------------------------------------------------
--
-- Volcado de datos para la tabla `tipoanuncio`
--

INSERT INTO `tipoanuncio` (`id`, `nombre`) VALUES
(1, 'Ayuntamiento'),
(3, 'Deportes'),
(2, 'Fallas'),
(5, 'Navidad'),
(4, 'Policía Local'),
(6, 'Sin Clasificar');


-- --------------------------------------------------------
--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nombre`, `apellido`, `edad`, `telefono`, `email`, `genero`, `catarroja`) VALUES
(1, 'Antonio', 'Galvez', 41, 961272584, 'galvez@gmail.com', 'm', 1),
(2, 'Manuel', 'Molinos', 53, 961261264, 'manuel.molinos@gmail.com', 'm', 1),
(3, 'No', 'Asignado', 0, 0, 'null@null.null', 'm', 0),
(4, 'Maruja', 'Pérez', 60, 961265837, 'panaderiaqmaru@maru.com', 'f', 0);


INSERT INTO `buscar` (`id`, `tipoanuncio_id`, `criterio`, `fecha`) VALUES
(7, 2, 'Pinturas', '04-01-2017'),
(8, 1, 'Bares', '04-01-2017'),
(9, 1, 'Bares', '08-01-2017'),
(10, 5, 'Modas', '08-01-2017'),
(11, 1, 'Bares', '08-01-2017'),
(12, 2, 'Pinturas', '08-01-2017'),
(13, 3, 'Panaderías', '08-01-2017'),
(14, 2, 'Pinturas', '08-01-2017'),
(15, 6, 'Floristerías', '08-01-2017'),
(16, 8, 'Abogados', '08-01-2017'),
(17, 1, 'Bares', '08-01-2017'),
(18, 1, 'Bares', '28-01-2017'),
(19, 3, 'Panaderías', '28-01-2017'),
(20, 2, 'Pinturas', '28-01-2017'),
(21, 3, 'Panaderías', '28-01-2017'),
(22, 3, 'Panaderías', '30-01-2017'),
(23, 3, 'Panaderías', '30-01-2017'),
(24, 1, 'Bares', '30-01-2017'),
(25, 3, 'Panaderías', '30-01-2017'),
(26, 3, 'Panaderías', '30-01-2017');


INSERT INTO `anuncio` (`id`, `tipoanuncio_id`, `persona_id`, `fecha`, `titulo`, `texto`) VALUES
(1, 1, NULL, '2017-02-01', 'Presentaciones de comisiones Falleras', 'En estos días se abre el plazo de inscripción de todos los falleros y falleras que quieran participar en este evento. Acudir al Ayuntamiento en horario de oficina para realizar el trámite. Es recomendable no dejarlo para último momento.'),
(2, 4, NULL, '2017-03-01', 'Calles cortadas por Fallas', 'ATENCIÓN, Las calles del centro de la población estará cortadas de forma gradual por motivo de la instalación de los monumentos falleros, así como las carpas de algunos casales falleros. Desde la Policía Local les deseamos que disfruten de las fiestas. Seguiremos informando.'),
(4, 5, NULL, '05-01-2017', 'Cabalgata de sus Majestades Los Reyes Magos.', 'Con motivo de la Cabalgata de sus Majestades Los Reyes Magos, se aconseja asistir a la misma en transporte público o caminando, a fin de no colapsar las calles. Esperemos que os dejen lo que les habéis pedido, y que os porteis bien.'),
(5, 3, NULL, '06-01-2017', 'Partido de futbol en el polideportivo', 'El próximo domingo día 8 de enero de 2017, se celebrará un partido de futbol entre los colegios San José y Sant Pere. La entrada será de tan solo un Euro y lo recaudado será donado íntegramente a Cáritas. Esperamos su asistencia.');


-- --------------------------------------------------------
--
-- Volcado de datos para la tabla `comercio`
--

INSERT INTO `comercio` (`id`, `tipocomercio_id`, `persona_id`, `posicion`, `nombre`, `direccion`, `telefono`, `web`, `mapa`, `foto`, `email`) VALUES
(1, 1, 1, 1, 'Bocatería Gálvez', 'Av. Rambleta, 45', 961272584, 'http://www.galvez.com', '961272584', '961272584', 'galvez@gmail.com'),
(2, 2, NULL, 1, 'Pinturas Sergio Bou', 'Av. Rambleta, 55', 961844121, 'http://wwwpinturassergio.com', '961844121', '961844121', 'pinturassergio@gmail.com'),
(3, 1, NULL, 2, 'Bar Toni', 'C/ Torrente, 4', 987654321, 'http://www.bartoni.com', '987654321', '987654321', 'toni@gmail.com'),
(4, 1, NULL, 3, 'Bar Tívoli', 'Camí Real, 102', 321654987, 'http://www.bartivoli.es', '321654987', '321654987', 'bartivoli@gamil.com'),
(5, 1, NULL, 4, 'Bar Trini', 'C/ Museros, 10', 369258741, 'http://www.bartrini.es', '369258741', '369258741', 'bartrini@gmail.com'),
(6, 1, NULL, 5, 'Bar Prueba', 'C/ Prueba, 3', 369874521, 'http://www.barprueba.com', '369874521', '369874521', 'barprueba@kiupa.com'),
(7, 8, 1, 10, 'prueba10', 'Calle pruenba 10', 963326860, 'http://www.kiupa.com', '963326860', '963326860', 'segundo@kiupa.es'),
(9, 8, 1, 15, 'Prueba_15', 'C/ Prueba_15', 363346860, 'http://www.kiupa.com', '363346860', '363346860', 'qwerty@qwerty'),
(10, 3, 2, 1, 'Horno Bolleria Manuel Molinos', 'Carrer Constitució, 9, 46470 Catarroja, València', 961261264, 'http://www.hornomanuelmolinos.es', '961261264', '961261264', 'manuel.molinos@gmail.com'),
(11, 3, 4, 2, 'Horno Pasteleria Maru', 'Pl. Mestre Iturbi, 9. 46470. CATARROJA, VALENCIA', 961265837, 'http://www.kiupa.com', '961265837', '961265837', 'panaderiaqmaru@maru.com');