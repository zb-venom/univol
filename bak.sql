-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Сен 14 2019 г., 05:34
-- Версия сервера: 5.7.17-log
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `univol`
--

-- --------------------------------------------------------

--
-- Структура таблицы `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `id_org` int(11) NOT NULL,
  `event` text NOT NULL,
  `about` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `city` text NOT NULL,
  `link` text NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`id`, `id_org`, `event`, `about`, `email`, `phone`, `city`, `link`, `category`) VALUES
(5, 19, 'TUSUR', '6 сентября наши волонтеры станут частью ежегодной конференции \"Город IT\".\n?Помочь на регистрации? \n?Проследить за таймингом на секции? Помочь с микрофонами, презентациями и видеороликами? \nНу и конечно, подготовить площадку конференции и выполнить еще много другой работы на конференции нашим ребятам тоже под силу ????', 'tusur@tusur.ru', '+79539151117', 'Томск', 'tusur.ru', 'Подработка'),
(6, 18, 'Организация Дня Томича', 'Требуются волонтеры для установки сцены, работы за кулисами, помощь сотрудникам полиции и просто хорошие и веселые ребята. Не стесняемся! ', 'zb.tyoma@gmail.com', '89526831579', 'Томск', 'vk.com/zb.venom', 'Общение'),
(7, 34, 'Найдем хороший дом', 'Животных, над которыми издеваются, необходимо забрать от злых людей. Подобрать бродячих братьев наших меньших и отмыть и откормить их. Нужны добрые и хорошие люди', 'cat@gmail.com', '89234229785', 'Томск', 'cat@gmail.com', 'Работа с животными'),
(8, 29, 'День открытых дверей', 'Нужны ответственные волонтеры которые будут стоять на стендах и участвовать в организации мероприятия. Тяжелой работы не будет - только ответы на вопросы и работа с расходниками', 'crk-news@mail.ru', '89985673412', 'Томск', 'crk-news@mail.ru', 'организация общение'),
(9, 29, 'Сбор статистики', 'Нужны общительные молодые люди, которые бы собирали статистику на улицах, сняли несколько роликов. При этом популяризируя практику донорства', 'crk-quesr@mail.ru', '9312345632', 'Томск', 'crk-quesr@mail.ru', 'подработка общение донорство'),
(10, 28, 'Защитим буревестник', 'Большая акция против загрязнения. Нужны люди для общения с людьми и стоять на стендах, раздавать экологически чистые сумки для продуктов', 'green@mail.ru', '87675456090', 'Томск', 'green@mail.ru', 'волонтерство общение'),
(11, 38, 'Поиск пропавшего в лесу', 'Грибник ушел и не вернулся. Точка начала поисков уточняется, в районе Томской области', 'lizaalert@lizaalert.com', '89526831579', 'Томск', 'lizaalert.com', 'Поиск'),
(12, 0, 'default', 'default', 'default', 'default', 'default', 'default', 'default'),
(13, 34, 'Давай \"уничтожим мир\"', 'Браконьеры убивают животных из красной книги! Что за беспредел!!!! Просто возмутитель!!!! Ищем волонтеров, чтобы отлавливать и садить этих убийц за решетку. Подойдут любые, даже те кто будет сдавать своих же!', 'cat@mail.ru', '89456324596', 'Томск', 'cat@mail.ru', 'Животные');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL,
  `salt` text NOT NULL,
  `cookie` text NOT NULL,
  `type` text NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `link` text NOT NULL,
  `email` text NOT NULL,
  `about` text NOT NULL,
  `valid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `salt`, `cookie`, `type`, `name`, `phone`, `link`, `email`, `about`, `valid`) VALUES
(1, 'Venom', '756c0eee0743d74fc549dea19e731c00', 'j$HU%v%!', '', 'volunteer', 'Заборских Артём Фёдорович', '89526831579', 'vk.com/zb.venom', 'zb.tyoma@gmail.com', 'Я крутой чувак', 0),
(3, 'root', '89e879d2b5b9ce6bfe44b1c253029070', '>WXdtekm', '', 'admin', 'root root root', '89526831579', 'Ссылок нет!', 'zb.tyoma@gmail.com', 'Описания нет!', 1),
(4, 'log', '8e22287e76e196e506c9a3d23451f082', 'DW4@k@{@', '', 'volunteer', 'a a a', '+79539151117', 'Ссылок нет!', 'nog@mail.ru', 'Описания нет!', 0),
(5, 'хуй', '3259ecce0d6cb12b82eb74a0c97ac7bd', '$?S5BY\"g', '', 'volunteer', 'хуй хуй хуй', 'хуй', 'Ссылок нет!', 'хуй', 'Описания нет!', 0),
(17, 'free_man', 'c597959274f4e68a2680907317e1485d', '^GDV)7G[', '', 'volunteer', 'Иванчук Кирилл Григорьевич', '89239535940', 'Ссылок нет!', 'ivanchchyk@mail.ru', 'Описания нет!', 0),
(18, 'Limba', 'e82ac3e78ff79b2f131412c87dbd3cae', '~@3dKac^', '', 'org', 'Limba inc.', '89997561234', 'vk.com/limba', 'limba@limba.ru', 'Компания занимается организацией городских мероприятий!', 0),
(19, 'Univol', '7995296bcb5f085ccf2fdbc7bb551d38', 'c\"3^>~Sm', '', 'org', 'Univol', '+79999999999', 'Univol', 'tsu@ru.ru', 'Univol', 1),
(22, 'Gosha', 'df83d25f139aa79228bdd77635293516', '9{5/&I=]', '', 'volunteer', 'Петриченко Георгий Владимирович', '+79539151117', 'Ссылок нет!', 'noggin.home@gmail.com', 'Описания нет!', 0),
(24, 'sever', '93231d91b94d601997a8ca6823a23fad', 'XEE#;@Ei', '', 'volunteer', 'Репьюк Наталья Сергеевна', '89234528574', 'Ссылок нет!', 'sever@mail.ru', 'Описания нет!', 0),
(26, 'hgs', '828e27f662efd721ed15dc5d409b3a47', 'vN/]S+ZM', '', 'volunteer', 'h g s', '123', 'Ссылок нет!', 'hgs', 'Описания нет!', 0),
(27, 'crab', 'da2c5ed1e14ebbe8cc8d4c5fbb413411', '3q^4v(=~', '', 'volunteer', 'Иванов Сергей Михайлович', '89524187542', 'Ссылок нет!', 'crab@mail.ru', 'Описания нет!', 0),
(28, 'green_planet', 'da610073d104bd6caf74f507a70b5f45', 'Y1?<.wm)', '', 'org', 'Зеленая планета', '88005553535', 'anpha.net', '666@mail.ru', 'Боремся с загрязнением планеты, выступаем с благотворительными акциями и проектами. Проводим различные конференции. ', 1),
(29, 'CRK', '3208b4e4e12d3cf3fbd605c2bd601957', 'Iahu|j[M', '', 'org', 'Сентр Редкой Крови', '89004545565', 'crk.ru', 'crk@mail.ru', 'Мы занимаемся организацией взаимной помощи людям с редкими группами крови. Наша организация помогает людям помогать друг другу не смотря на неприятные обстоятельства. Мы всегда нуждаемся в ответственных донорах ', 1),
(31, 'centr', '59294dafa6d541144ee344188cad9edd', '|yq}|EAE', '', 'org', 'Кошкин дом', '89234551296', 'cot@mail.ru', 'cot@mail.ru', 'Мы помогаем бездомным животным. ', 0),
(32, 'soc_help', '41ce1008490351dec566f8bd642547ef', 'Eo]HA]bh', '', 'org', 'Социальная Помощь', '8909087878', 'soc_help@mail.ru', 'soc_help@mail.ru', 'soc_help@mail.ru\nОбеспечиваем социальную адаптацию', 1),
(33, '2-T prod', '038fd3d6802a669f14ab52a4d4ce8bd8', '_mtuuzfN', '', 'org', '2-T prod', '89526831579', 'vk.com/2tprod', '2tprod@gmail.com', 'Музыкальная организация', 0),
(34, 'cat', 'a4f04b2121ccd79de58fe9d0afff5718', 'O^KmLKue', '', 'org', 'Кошкин дом', '89234551278', 'cat@gmail.com', 'cat@gmail.com', 'Мы помогаем домашним животным', 1),
(35, 'molly_yop', 'd0f8b69c4690f11800440ac60b9e11d6', 'yl{|I~g', '', 'volunteer', 'Архипова Лариса Сергеевна', '89340909678', 'Ссылок нет!', 'https://vk.com/id12dfv', 'Описания нет!', 0),
(36, 'indi', '2c1bb809177549134ab0f49e49965add', 'YYIjG`SQ', '', 'volunteer', 'Лапутов Илья Илларионович', '89006787823', 'Ссылок нет!', 'indi@mail.ru', 'Описания нет!', 0),
(38, 'lizaalert', '9ca78769ed314b803fa3d406ab22377f', 'RhYdthm_', '', 'org', 'Liza Alert', '123', 'liza alert site stub', 'q123', 'liza alert stub', 1),
(39, 'green', '14ef05e79a2de0bc4ab6e7e437b3991c', 'XIfodVkp', '', 'org', 'Зеленый лес', '891234567496', 'green@gmail.com', 'green@gmail.com', 'Защитим природу', 1),
(40, 'crot', '433e0378fa9afdc41dc7d954051f2842', 'y[uECoFM', '', 'volunteer', 'Ламонов  Геннадий Андреевич', '89742354165', 'Ссылок нет!', 'crot@mail.ru', 'Описания нет!', 0),
(41, 'qwerty', '8de322163fb9b8490d24b50bf2f58426', 'KSvs[lI[', '', 'org', 'qwerty', 'qwerty', 'qwerty', 'qwerty', 'qwerty', 0),
(43, '1', '7dbbb1552566106705b54333dd5fec47', 'eUeGlfs', '', 'org', '1', '1', '1', '1', '1', 0),
(45, 'akrl', 'ec56b094e9c6428b90339f6c314dce8b', 'sjVEhiNl', '', 'volunteer', 'Юсупова Антонина Сергеевна', '9087822345', 'Ссылок нет!', 'new_mail_akrl@mail.ru', 'Описания нет!', 0),
(46, 'ераноп', 'ac8d740a7e119fe02ebb2190fb246dfc', 'BKwA_nDL', '', 'volunteer', 'аап аа аа', 'аа', 'Ссылок нет!', 'ааа', 'Описания нет!', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `volunteers`
--

CREATE TABLE `volunteers` (
  `id` int(11) NOT NULL,
  `id_volunteer` int(11) NOT NULL,
  `id_org` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `name` text NOT NULL,
  `about` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `city` text NOT NULL,
  `link` text NOT NULL,
  `valid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `volunteers`
--

INSERT INTO `volunteers` (`id`, `id_volunteer`, `id_org`, `id_event`, `name`, `about`, `email`, `phone`, `city`, `link`, `valid`) VALUES
(26, 1, 0, 12, 'Заборских Артём Фёдорович', 'Теперь точно готов к труду и обороне', 'zb.tyoma@gmail.com', '89526831579', 'Томск', 'vk.com/zb.venom', 0),
(27, 27, 28, 10, 'Иванов Сергей Михайлович', 'Я просто человек по жизни)', 'crab@mail.ru', '89524187542', 'Томск', 'crab@mail.ru', 0),
(28, 27, 38, 11, 'Иванов Сергей Михайлович', 'Я просто человек по жизни)', 'crab@mail.ru', '89524187542', 'Томск', 'crab@mail.ru', 0),
(29, 27, 0, 12, 'Иванов Сергей Михайлович', 'Я просто человек по жизни)', 'crab@mail.ru', '89524187542', 'Томск', 'crab@mail.ru', 0),
(30, 27, 34, 7, 'Иванов Сергей Михайлович', 'Просто помогу)', 'crab@mail.ru', '89524187542', 'Томск', 'crab@mail.ru', 0),
(31, 27, 18, 6, 'Иванов Сергей Михайлович', 'Хочу поучаствовать', 'crab@mail.ru', '89524187542', 'Томск', 'crab@mail.ru', 0),
(32, 24, 38, 11, 'Репьюк Наталья Сергеевна', 'Хороший человек пропал, хочу помочь', 'sever@mail.ru', '89234528574', 'Томск', 'sever@mail.ru', 0),
(33, 24, 29, 9, 'Репьюк Наталья Сергеевна', 'Могу помочь)', 'sever@mail.ru', '89234528574', 'Томск', 'sever@mail.ru', 0),
(34, 24, 29, 8, 'Репьюк Наталья Сергеевна', 'Это интересно', 'sever@mail.ru', '89234528574', 'Томск', 'sever@mail.ru', 1),
(35, 24, 18, 6, 'Репьюк Наталья Сергеевна', 'Хочу полиции помочь))', 'sever@mail.ru', '89234528574', 'Томск', 'sever@mail.ru', 0),
(36, 40, 38, 11, 'Ламонов  Геннадий Андреевич', 'Нужно просто помогать людям', 'crot@mail.ru', '89742354165', 'Томск', 'crot@mail.ru', 0),
(37, 40, 0, 12, 'Ламонов  Геннадий Андреевич', 'Я просто веселый фотограф)', 'crot@mail.ru', '89742354165', 'Томск', 'crot@mail.ru', 0),
(38, 40, 28, 10, 'Ламонов  Геннадий Андреевич', 'Мне не все равно', 'crot@mail.ru', '89742354165', 'Томск', 'crot@mail.ru', 0),
(39, 1, 38, 11, 'Заборских Артём Фёдорович', 'Готов помочь', 'zb.tyoma@gmail.com', '89526831579', 'Томск', 'vk.com/zb.venom', 0),
(40, 40, 29, 9, 'Ламонов  Геннадий Андреевич', 'Помогу и пофоткать могу)', 'crot@mail.ru', '89742354165', 'Томск', 'crot@mail.ru', 0),
(41, 40, 29, 8, 'Ламонов  Геннадий Андреевич', 'Могу помочь', 'crot@mail.ru', '89742354165', 'Томск', 'crot@mail.ru', 0),
(42, 40, 34, 7, 'Ламонов  Геннадий Андреевич', 'Мне не все равно', 'crot@mail.ru', '89742354165', 'Томск', 'crot@mail.ru', 1),
(43, 1, 28, 10, 'Заборских Артём Фёдорович', 'Давайте', 'zb.tyoma@gmail.com', '89526831579', 'Томск', 'vk.com/zb.venom', 0),
(44, 36, 0, 12, 'Лапутов Илья Илларионович', 'Очень приветливый и коммуникабельный. Исполнительный.\nЕсть опыт в волонтерской студенческой организации. ', 'indi@mail.ru', '89006787823', 'Северск', 'https://vk.com/id387390493', 0),
(45, 17, 0, 12, 'Иванчук Кирилл Григорьевич', 'Могу принять участие в любом проекте. Есть опыт ведения мероприятий', 'ivanchchyk@mail.ru', '89239535940', 'Томск', 'https://vk.com/ivanchchyk', 0),
(46, 24, 0, 12, 'Репьюк Наталья Сергеевна', 'Я просто лапочка и все)', 'sever@mail.ru', '89234528574', 'Томск', 'https://vk.com/id131901555', 0),
(47, 24, 28, 10, 'Репьюк Наталья Сергеевна', 'Я просто хочу помочь', 'sever@mail.ru', '89234528574', 'Томск', 'https://vk.com/id131901555', 0),
(48, 22, 18, 6, 'Петриченко Георгий Владимирович', 'Я ВАЛЕРА ТУРУРУРУРУ', 'noggin.home@gmail.com', '+79539151117', 'Томск', 'vk.com/g_petrichenko', 0),
(49, 4, 38, 11, 'Петриченко Георгий Владимирович', 'Помощь людям наше всё!', 'noggin.home@gmail.com', '+79539151117', 'Томск', 'vk.com/g_petrichenko', 0),
(50, 4, 38, 11, 'Петриченко Георгий Владимирович', 'Помощь людям наше всё!', 'noggin.home@gmail.com', '+79539151117', 'Томск', 'vk.com/g_petrichenko', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `volunteers`
--
ALTER TABLE `volunteers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT для таблицы `volunteers`
--
ALTER TABLE `volunteers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
