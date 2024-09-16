-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Сен 16 2024 г., 10:26
-- Версия сервера: 11.5.2-MariaDB
-- Версия PHP: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `message_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `user_id`, `message`, `message_time`) VALUES
(145, 3, '333', 1725112060),
(146, 3, 'asdasd', 1725113275),
(147, 3, '333', 1725113277),
(148, 3, 'фывфыв', 1725113279),
(149, 3, '123123', 1725113879),
(150, 3, '123123', 1725113882),
(151, 3, '5555', 1725113899),
(152, 4, '6666', 1725113906),
(153, 3, '66666', 1725113918),
(154, 4, '7777', 1725113924),
(155, 3, '888', 1725113928),
(156, 4, '9999', 1725114012),
(157, 3, '123123', 1725114118),
(158, 3, '555', 1725114436),
(159, 3, '123', 1725115065),
(160, 3, '5555', 1725115067),
(161, 4, '666', 1725115072),
(162, 1, '777', 1725115188),
(163, 3, 'привет я тут', 1725115798),
(164, 1, 'я тоже тут', 1725115802),
(165, 4, 'алоха лохам', 1725131180),
(166, 3, '?', 1725131206),
(167, 3, 'почему я не вижу комментарий', 1725131221),
(168, 4, 'какой', 1725131225),
(169, 4, 'алоха лохам', 1725131245),
(170, 3, '?', 1725131266),
(171, 3, '*', 1725131316),
(172, 4, 'дада', 1725131818),
(173, 3, 'фыв', 1725131830),
(174, 3, 'aaa', 1725248232),
(175, 1, 'aa', 1725248258);

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `comment_date` int(10) UNSIGNED NOT NULL,
  `status` enum('approved','pending','rejected') NOT NULL DEFAULT 'pending'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `text`, `comment_date`, `status`) VALUES
(3, 1, 30, 'Какой то комментарий ', 1231231231, 'rejected'),
(4, 2, 30, 'Comment in english ', 555555, 'rejected'),
(5, 3, 30, 'asdasdasd', 1724839417, 'approved'),
(6, 3, 30, 'comment for check', 1724840243, 'approved'),
(7, 3, 30, 'comment for check 2', 1724841386, 'approved'),
(8, 3, 30, 'аыываываыва', 1725005449, 'approved'),
(9, 3, 30, 'аыываываыва', 1725005460, 'approved'),
(10, 3, 30, 'аыываываыва', 1725005465, 'approved'),
(11, 3, 30, 'аыываываывафффффф', 1725005469, 'approved'),
(12, 3, 30, 'ваыаыва', 1725127064, 'approved'),
(13, 3, 30, 'sdf', 1725129309, 'approved'),
(14, 1, 30, 'ddd', 1725129363, 'approved'),
(15, 4, 5, 'апрувни этот коммент\r\n', 1725139938, 'approved'),
(16, 4, 5, 'test', 1725140405, 'approved'),
(17, 4, 5, 'test2', 1725140507, 'approved'),
(18, 4, 5, 'test3', 1725140556, 'approved'),
(19, 4, 5, 'test4', 1725140641, 'approved');

-- --------------------------------------------------------

--
-- Структура таблицы `favorite_posts`
--

CREATE TABLE `favorite_posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `favorite_posts`
--

INSERT INTO `favorite_posts` (`id`, `user_id`, `post_id`) VALUES
(58, 3, 5),
(77, 3, 30),
(59, 3, 6),
(60, 3, 4),
(83, 1, 30),
(79, 4, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `post_text` text NOT NULL,
  `post_date` int(10) UNSIGNED NOT NULL,
  `author` varchar(255) NOT NULL,
  `author_id` int(11) NOT NULL,
  `view_count` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `post_text`, `post_date`, `author`, `author_id`, `view_count`) VALUES
(2, '2 Револьвер: Психологический триллер с глубоким смыслом', '\"Револьвер\" – фильм, который привлекает внимание своей оригинальностью и многослойностью. Режиссёр Гай Ричи создал захватывающий триллер, который не оставляет зрителя равнодушным. В центре сюжета – история о талантливом игроке, Джейкобе, который оказывается втянут в сложные манипуляции и внутренние конфликты.\r\n\r\nФильм погружает нас в мир психологии и философии, поднимая вопросы о личной свободе, внутренней борьбе и искуплении. Ричи использует нестандартные приёмы повествования, чтобы создать напряжение и интригу, и зрителю приходится постоянно держать ум в напряжении, чтобы понять, что же происходит на самом деле.', 213123213, 'я', 0, 1),
(3, '3 Обзор фильма «Лeон»', '\"Леон\" – фильм, который оставляет глубокое впечатление своим необычным сочетанием жанров и яркой стилистикой. Режиссёр Люк Бессон создал трогательную и одновременно напряжённую историю о неординарной дружбе между убийцей наёмником и молодой девушкой.\r\nГлавный герой, Леон, представляет собой сложный и многослойный персонаж, чья жизнь меняется после того, как он спасает 12-летнюю Матильду. Фильм мастерски балансирует между драмой и экшеном, погружая зрителя в мир насилия и искупления. Отношения между Леоном и Матильдой, наполненные искренностью и человечностью, становятся сердцем этой истории.', 123123123, 'опять я', 0, 1),
(4, '4 Покидая Лас-Вегас: Эмоциональная драма о жизни на грани', '\"Покидая Лас-Вегас\" – фильм, который глубоко затрагивает вопросы самоуничтожения и искупления. Режиссёр Майк Фиггис создал мощную драму, основанную на реальных событиях, где трагедия и надежда переплетаются в одной истории.\r\n\r\nВ центре сюжета – персонаж Бена Сандерсона, сыгранный Николасом Кейджем, который решает выпить свою жизнь до конца в Лас-Вегасе, сбежав от всех проблем. Его встреча с проституткой Сейдж, исполненной Элизабет Шу, становится поворотным моментом в его разрушительной жизни. Вместе они пытаются найти утешение и понимание в мире, который, кажется, отверг их обоих.\r\n\r\nФильм выделяется своей честностью и глубиной, предоставляя зрителю возможность увидеть сложные эмоциональные и психологические нюансы героев. Превосходная игра актёров и сильный сценарий делают \"Покидая Лас-Вегас\" произведением, которое вызывает сильные эмоции и оставляет долгий след в сознании.', 123123123, 'я', 0, 2),
(5, '5 Город Ангелов: Романтическая драма о любви и жертве', '\"Город Ангелов\" – фильм, который привлекает своей трогательной историей о любви и жертве. Режиссёр Брэд Силберлинг создал уникальную романтическую драму, где ангелы и люди переплетаются в сложном танце эмоций и судьбы.\r\n\r\nВ центре сюжета – история ангела Сета, сыгранного Николасом Кейджем, который наблюдает за жизнью людей и помогает им в трудные моменты. Его жизнь кардинально меняется, когда он влюбляется в хирурга Мэгги, в исполнении Мег Райан. Сет решает отказаться от своей бессмертной сущности, чтобы быть с Мэгги, несмотря на все последствия этого выбора.\r\n\r\nФильм впечатляет своей атмосферной визуализацией и эмоциональной глубиной. \"Город Ангелов\" затрагивает темы любви, жертвенности и человечности, оставляя зрителя с размышлениями о том, что значит быть человеком и что мы готовы сделать ради настоящей любви.', 213123123, 'я', 0, 3),
(6, '6Сериал Рим: Эпическая драма о могуществе и предательстве', '\"Рим\" – сериал, который завораживает своей масштабностью и исторической точностью. Созданный по сценарию Бруно Хеллером, этот эпический проект погружает зрителей в мир древнего Рима, раскрывая сложные политические и личные интриги.\r\n\r\nСюжет сериала охватывает ключевые моменты римской истории, начиная с падения Римской Республики и заканчивая восходом Империи. В центре внимания оказываются два персонажа – Лукулл и Верс, чьи судьбы пересекаются с историческими фигурами, такими как Юлий Цезарь, Марк Антоний и Октавиан Август.\r\n\r\n\"Рим\" выделяется своей детализированной реконструкцией исторического контекста и глубокой проработкой персонажей. Сериал удачно сочетает элементы драмы, политики и военных действий, создавая захватывающее повествование о борьбе за власть, предательстве и судьбе империи.', 123123123, 'я', 0, 2),
(14, '14 window.location.href = \'/\'; window.location.href = \'/\';', ' window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\';', 123123123, 'я', 0, 1),
(15, '15 window.location.href = \'/\'; window.location.href = \'/\';', ' window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\';', 123123123, 'я', 0, 0),
(16, '16  window.location.href = \'/\'; window.location.href = \'/\';', ' window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\'; window.location.href = \'/\';', 123123123, 'я', 0, 0),
(18, '18 asdasd', 'asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasd\r\nasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasd', 1724303393, 'Anonymous', 0, 25),
(20, '20 123123фывфывфывasdad', '123123123123123123123123123123123123123123123123123123фывфывфыв', 1724303704, 'пока нет куков', 0, 0),
(23, '23asdasdasdasdasdasdasdasdasdasdasdasdasdasdasd', 'asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasd\r\nasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdv\r\nasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdvvv\r\nasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdvvvv\r\nasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasd', 1724305974, 'пока нет куков', 0, 1),
(25, '25asdasd1111', 'asdad1111', 1724368341, 'пока нет куков', 0, 2),
(29, '29asdasda', 'asdasdaasdasdaasdasdaasdasdav asdasda asdasda asdasda asdasda asdasda', 1724748893, '123', 3, 3),
(30, '30пост о посте1122233', 'контент поста в посту контент поста в посту контент поста в посту контент поста в посту контент поста в посту контент поста в посту контент поста в посту контент поста в посту контент поста в посту контент поста в посту контент поста в посту контент поста в посту контент поста в посту контент поста в посту контент поста в посту контент поста в посту контент поста в посту контент поста в посту контент поста в посту контент поста в посту контент поста в посту контент поста в посту контент поста в посту  контент поста в посту контент поста в посту контент поста в посту', 1724829188, '123', 3, 38);

-- --------------------------------------------------------

--
-- Структура таблицы `post_views`
--

CREATE TABLE `post_views` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `view_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_uca1400_ai_ci;

--
-- Дамп данных таблицы `post_views`
--

INSERT INTO `post_views` (`id`, `post_id`, `ip_address`, `view_date`) VALUES
(1, 30, '::1', '2024-09-01 02:43:08'),
(2, 30, '127.0.0.1', '2024-09-01 02:43:18'),
(3, 29, '::1', '2024-09-01 02:51:02'),
(4, 4, '::1', '2024-09-01 03:31:15'),
(5, 2, '::1', '2024-09-01 03:31:20'),
(6, 14, '127.0.0.1', '2024-09-01 04:00:55'),
(7, 18, '::1', '2024-09-01 04:30:48'),
(8, 6, '::1', '2024-09-01 04:30:54'),
(9, 5, '::1', '2024-09-01 04:31:36'),
(10, 5, '127.0.0.1', '2024-09-01 04:31:58'),
(11, 23, '::1', '2024-09-02 08:24:55'),
(12, 31, '::1', '2024-09-02 10:57:27'),
(13, 3, '::1', '2024-09-02 11:31:07');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('user','admin','editor','guest') NOT NULL DEFAULT 'guest'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `role`) VALUES
(1, 'din9xtr', '$2y$10$flwZRfpgwVWSAzmpQ2lgiu3bE1Ch4fFv2M8mowlLxtPzu2PvxgaV2', 'ASAS@gmail.com', 'admin'),
(2, 'asdasd', '$2y$10$w1JTYrATXIoG/Z60hqRJ0O7v.OXP/968v0McEkLOORKRwp9.ajg.a', 'asdasd@asdasd', 'guest'),
(3, '123', '$2y$10$/2twrNVCNJhCk3FMDRCcK.KAnvLw5Lj4GAOyOAm48wGcQ1p0cFTuC', '123@123', 'admin'),
(4, '321', '$2y$10$67k3LrzKI/L/Fp1IXd1kfOrrEKrkNhe5MndMStpsB9OHICtudBOC.', '321@321.com', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `favorite_posts`
--
ALTER TABLE `favorite_posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`post_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`);

--
-- Индексы таблицы `post_views`
--
ALTER TABLE `post_views`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `favorite_posts`
--
ALTER TABLE `favorite_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `post_views`
--
ALTER TABLE `post_views`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
