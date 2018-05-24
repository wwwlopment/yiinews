-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Час створення: Трв 24 2018 р., 17:06
-- Версія сервера: 5.7.22-0ubuntu0.16.04.1
-- Версія PHP: 7.1.17-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `yiinews`
--

-- --------------------------------------------------------

--
-- Структура таблиці `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `news_id` int(11) DEFAULT NULL,
  `comment` text,
  `date` date DEFAULT NULL,
  `author_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `comments`
--

INSERT INTO `comments` (`id`, `news_id`, `comment`, `date`, `author_name`) VALUES
(1, 2, '«Колеги раніше вже бували в АТО, та й я знав, куди я їду, який об’єм допомоги надають у мобільному госпіталі…', '2018-05-24', 'лейтенант '),
(2, 2, 'Може нікого не бути, якщо все спокійно. ', '2018-05-24', ' Медик');

-- --------------------------------------------------------

--
-- Структура таблиці `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1527170279),
('m180522_194543_create_news_table', 1527170281),
('m180522_194614_create_comments_table', 1527170281);

-- --------------------------------------------------------

--
-- Структура таблиці `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `teaser` varchar(255) DEFAULT NULL,
  `content` text,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `news`
--

INSERT INTO `news` (`id`, `title`, `picture`, `teaser`, `content`, `date`) VALUES
(1, 'Волинська «молодіжка» розгромила львів\'ян з рахунком 10:0', '68b938d582d6ae5a0fc252734d2c86fb.jpg', 'Молодіжна збірна ФК «Волинь» перемогла своїх суперників з винниківського «Руху» з рахунком 10:0.', 'Молодіжна збірна ФК «Волинь» перемогла своїх суперників з винниківського «Руху» з рахунком 10:0.\r\n\r\nПро це пише прес-служба футбольного клубу.\r\n\r\nЯк і у першому колі, у матчі луцьких футболістів та гостей з Винників було забито десять голів. \r\n\r\nЩоправда, цього разу забивали лише підопічні Володимира Фігеля, які з початку поєдинку показали суперникам з «Руха», хто на полі господарі. При цьому перший тайм став справжнім «парадом невикористаних моментів» у виконанні волинян. \r\n\r\nВідкрити рахунок вдалося аж у середині тайму – Богданові Гладуну вдався потужний та прицільний удар у ближній верхній кут воріт суперника з лінії штрафного майданчика. Не використавши ще декілька вбивчих можливостей для гола, гравці «Волині» таки довели до перерви свою перевагу до розгромної зусиллями того ж таки Гладуна та Назарія Нича – 3:0.\r\n\r\nУ «антракті» Володимир Фігель використав усі свої заміни, однак волинян було вже не зупинити. Назарій Нич, якому потрібно забивати для успіху в суперечці бомбардирів чемпіонату, до фінального свистка довів свій доробок до «хет-трика», а наприкінці матчу отримав пошкодження та достроково завершив гру. \r\n\r\nА «свіжий» Микола Кухаревич узагалі відзначився аж чотирма голами усього за тайм! «Каре» бомбардира ДЮФЛУ (Микола забив чимало і у чемпіонаті U-17), а також гол Михайла Жука у підсумку сформували просто нищівний рахунок на користь «Волині» – 10:0.\r\n\r\nТепер гравці нашої команди очікують на першого суперника по стикових іграх за «фінал чотирьох» чемпіонату U-19. Другим з них та домашнім для нас точно стане команда «Колос» U-19 з Ковалівки. А до другої команди ще однієї зони уже наприкінці тижня наші хлопці поїдуть на виїзд.\r\n\r\nБажаєте дізнаватися головні новини Луцька та Волині першими? Приєднуйтеся до нашого каналу в Telegram! Також за нашим сайтом можна стежити у Twitter, Google+ та Instagram.', '2018-05-24'),
(2, 'Часом 10 поранених, часом – жодного: волинський лікар розповів про будні в АТО', '32187d2e9b84d35036c24d058a8aca85.jpg', 'Старший лейтенант медичної служби та старший ординатор травматологічного відділення Луцького військового госпіталя Дмитро Земба 4 місяці пробув у зоні АТО, де опанував техніку артроскопії.', 'Старший лейтенант медичної служби та старший ординатор травматологічного відділення Луцького військового госпіталя Дмитро Земба 4 місяці пробув у зоні АТО, де опанував техніку артроскопії.\r\n\r\nМедик перебував у Донецькій області протягом серпня-грудня 2017 року на базі 66 військово-мобільного госпіталю у місті Покровськ, де надавав допомогу військовослужбовцям. Мобільний госпіталь облаштували на базі місцевої лікарні, тож половина лікарів – цивільні, а решта приїжджають на ротації із військових госпіталів західного регіону.\r\n\r\nЛікар розповідає, що протягом першого місяця доводилося частіше виїжджати на «передок» до стабілізаційного пункту в Авдіївці. \r\n\r\n«У госпіталя є передові пункти, які розміщені ближче до лінії фронту, аби швидше надати допомогу пораненим на полі бою… З передових пунктів одразу ж повідомляють про вид травм та те, куди везуть пораненого. \r\n\r\nСистема налагоджена, бригада має зв’язок по рації і вже чекає на пораненого. А далі - рентгени, УЗД, лабораторія. Залежно від виду та ступеня поранення чи травми пацієнта направляють в оглядову чи протишокову, де стабілізують, та подають в операційну», - пояснив медик.\r\n\r\nЗемба розповів, що у госпіталі було чимало лікарів із Західної України, тож спрацюватися вдалося легко і швидко. \r\n\r\n«Колеги раніше вже бували в АТО, та й я знав, куди я їду, який об’єм допомоги надають у мобільному госпіталі… Є тільки організаційні моменти – не знаєш обстановки в госпіталі, та за тиждень звикаєш. \r\n\r\nКількість поранених залежить від періоду, а сягає рекордних показників під час обстрілів. Може бути по 10 людей за день, може бути двоє травмованих. Може нікого не бути, якщо все спокійно.\r\n\r\nВ основному це вогнепальні і осколкові поранення, дуже багато саме осколкових поранень. Якщо травми, зазвичай хтось або під час бігу впав і пошкодив коліно, або ж зіскакував із військової техніки та зламав ногу - саме такі травми бували найчастіше», - резюмував медик.\r\n\r\nНайкритичнішим випадком, за спогадами лікаря, був військовий із важкими опіками тіла. \r\n', '2018-05-24'),
(3, 'У Володимирі відкрили пам\'ятну дошку атовцю. ', '7cbc24abe61f78b625efd66f9edaabd7.jpg', 'У Володимирі-Волинському сьогодні, 22 травня, у НВК №3 відбулося відкриття меморіальної дошки учаснику АТО та колишньому учневі цього навчального закладу Ігорю Балабоскіну.', 'У Володимирі-Волинському сьогодні, 22 травня, у НВК №3 відбулося відкриття меморіальної дошки учаснику АТО та колишньому учневі цього навчального закладу Ігорю Балабоскіну.\r\n\r\nУ серпні 2015 року Ігор Балабоскін добровольцем був мобілізований до лав Збройних Сил України. Служив заступником командира батареї по роботі з особовим складом 128-ї окремої гірсько-піхотної бригади. З жовтня 2015 року брав участь в антитерористичній операції на сході України.\r\n\r\n4 листопада 2015 року молодший лейтенант Балабоскін помер внаслідок відриву тромбу під час виконання бойового завдання в районі селища міського типу Станиця Луганська Луганської області. 8 листопада 2015 року похований на Алеї Слави Центрального кладовища міста Чернівці, де проживав з дружиною та двома синами.\r\n\r\nНа відкриття пам’ятної дошки завітали представники влади, духовенства і громадськість міста. Теплі слова звучали від першої учительки бійця, котра зауважила, що Ігор Балабоскін запам’ятався їй щирим, товариським та старанним хлопчиком з білим комірцем. І дуже шкода, що війна забирає найкращих. Опісля учні школи поклали квіти до меморіальної дошки.', '2018-05-24'),
(4, 'У Луцьку біля входу в парк просять встановити світлофор', 'f5ad8d31f264c2c73ed8b2f80df23f43.jpg', 'У Луцьку, на вулиці Глушець, просять встановити світлофор.\r\nВідповідну петицію зареєстрував Павло Іващенко.', 'У Луцьку, на вулиці Глушець, просять встановити світлофор.\r\n\r\nВідповідну петицію зареєстрував Павло Іващенко.\r\n\r\n«Прошу встановити світлофор на переході через вул. Глушець на центральному вході в парк ім. Лесі Українки. Він буде працювати лише у святкові та вихідні дні», - йдеться у тексті звернення.\r\n\r\n«Великий потік пішоходів, що створює затор в обидві сторони по \r\nвул. Глушець», - пояснює причину написання петиції лучанин.', '2018-05-24'),
(5, 'Савченко дав доручення розібратися із підмором бджіл', 'b415432af84a451e8f902e5fe9cc25f3.jpg', 'Голова Волинської облдержадміністрації Олександр Савченко дав доручення задля з\'ясування ситуації, пов\'язаної із загибеллю бджіл у Турійському районі Волині. \r\nВідповідний документ очільник області підписав 24 травня. ', 'Голова Волинської облдержадміністрації Олександр Савченко дав доручення задля з\'ясування ситуації, пов\'язаної із загибеллю бджіл у Турійському районі Волині. \r\n\r\nВідповідний документ очільник області підписав 24 травня. \r\n\r\nНим Олександр Савченко доручив затвердити склад робочої групи з координації контролю за ситуацією, пов\'язаною з підмором бджіл у результаті застосування мінеральних добрив. До того ж, управлінню Держпродспоживслужби голова ОДА доручив негайно направити спеціалістів, аби ті відібрали зразки рослин та усього необхідного для здійснення токсологічних досліджень. \r\n\r\nРезультати ж досліджень мають направити поліцейським для відповідного реагування. \r\n\r\nОкрім того, Савченко доручив визначити уповноважену особу серед поліцейських, яка б виїхала у села Турійського району та з\'яcувала ситуацію. \r\n\r\nНагадаємо, у селах Літин та Новий двір Турійського району масово загинули бджоли. З’ясували, що напередодні на полях у цьому районі проводилося оприскування культури ріпаку. Правоохоронці встановили, що загалом загинуло близько 400 сімей бджіл.', '2018-05-24'),
(6, 'День Героїв у Луцьку: вулична виставка та воїни в одностроях. ', '0c51b7a063b411727cf114a75ee479e7.jpg', 'У Луцьку відзначили День Героїв – свято, встановлене на честь українських вояків – борців за волю України. \r\nВиставку та реконструкцію образів воїнів різних епох влаштували з цієї нагоди 23 травня на вулиці Лесі Українки. ', 'У Луцьку відзначили День Героїв – свято, встановлене на честь українських вояків – борців за волю України. \r\n\r\nВиставку та реконструкцію образів воїнів різних епох влаштували з цієї нагоди 23 травня на вулиці Лесі Українки. \r\n\r\nЕкспозицію «Воїни. Історія українського війська», яку розмістили на головній пішохідній вулиці міста, підготував Український інститут національної пам’яті. Окрім того, експозицію супроводжували історичні лекції, які проводив спеціаліст КЗ «Центр національно-патріотичного виховання дітей та молоді у місті Луцьк» Максим Каширець.\r\n\r\nОкрім того, на вулиці Лесі Українки активісти ГО «ВМР «Національний Альянс» реконструювали образи українських воїнів різних історичних періодів: вулицею гуляли лицар, козак, воїн УПА та воїн АТО. Усі охочі мали нагоду ознайомитись з одностроями українських вояків та зробити фото на згадку.\r\n\r\nДо слова, з нагоди Дня Героїв у Луцьку влаштували також патріотичний квест та флеш-моб. \r\n\r\nЗаходи організовував КЗ «Центр національно-патріотичного виховання дітей та молоді у місті Луцьк» спільно з НСОУ «ПЛАСТ» та ГО «ВМР «Національний Альянс».', '2018-05-24');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Індекси таблиці `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблиці `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;