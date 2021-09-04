@extends('layouts.base')

@section('title', 'РИЦ :: Краткий словарь издательских терминов')

@section('main')

    <section class="body-font">
        <div class="flex flex-col w-full mb-10">
            <h1 class="sm:text-4xl text-center text-3xl font-bold mb-6 sm:mb-12">
                Краткий словарь издательских терминов
            </h1>
            <div class="entry-content space-y-4 lg:w-3/4 mx-auto text-left leading-normal sm:text-lg">
                <p><strong>Авторский знак</strong> — один из основных элементов выходных сведений печатного издания. Введен
                    известным специалистом библиотечного дела Л. Б. Хавкиной в 1916 г.</p>
                <p>Авторский знак состоит из первой буквы фамилии автора (первого автора, если в издании не более трех
                    авторов) или первой буквы первого слога заглавия (если авторов более трех или авторы отсутствуют) и
                    двузначного числа, соответствующего начальным буквам этой фамилии или заглавия.</p>
                <p>Этот знак определяет местонахождение книги на библиотечной полке. Вместе с классификационными индексами
                    он составляет шифр хранения издания. Квалифицированную помощь в определении этого знака можно получить в
                    библиотеке.</p>
                <p><strong>Авторский</strong> (учетно-издательский) <strong>лист (а. л.)</strong> — 1) единица объема
                    литературного произведения, равная 40 000 печатных знаков (буквы, цифры, знаки препинания, пробелы между
                    словами и считая неполные концевые строки за полные), т. е. примерно 22 страницам машинописного текста,
                    700 строкам стихотворного текста или 3000 см2 иллюстративного материала; 2) единица измерения объема
                    авторского оригинала, созданных авторов текстов, таблиц, изобразительных оригиналов.</p>
                <p><strong>Аннотация</strong> — краткая характеристика документа с точки зрения его назначения, содержания,
                    вида, формы и т. д. Включает данные о задачах, целях, характере издания, а также информацию о кратком
                    содержании книги, ее отличительных особенностях, перечень специальностей, для которых предназначено
                    пособие. Аннотация помещается на обороте титульного листа, подписывается автором.</p>
                <p><strong>Аппарат издания</strong> — сведения справочного, научного или пояснительного характера. Дополняет
                    основной текст, помогает и облегчает пользование книгой. Включает оглавление (содержание), аннотацию,
                    методические рекомендации, предисловие, заключение, указатели и т. д.</p>
                <p><strong>ББК (Библиотечно-библиографическая классификация)</strong> — комбинационная система библиотечной
                    классификации изданий, предназначенная для организации библиотечных фондов, систематических каталогов и
                    картотек.</p>
                <p>Индексы ББК признаны основными элементами выходных сведений, т. е. являются обязательными и должны быть
                    указаны на обороте титульного листа изданий вверху слева под индексом УДК (отдельной строкой) и в макете
                    аннотированной каталожной карточки. Книга «Библиотечно-библиографическая классификация: Рабочие таблицы
                    для массовых библиотек» является источником индексов ББК.</p>
                <p><strong>Выделения в тексте</strong> — буквы, знаки, слова, предложения, набранные иначе, чем основной
                    текст (шрифт с наклоном, увеличенным расстоянием между буквами в слове и т. д.). Часто используется в
                    учебных книгах, чтобы графически разграничить части и элементы текста по значимости, структуре или
                    передать дополнительный смысл без помощи слов.</p>
                <p>Выделения упрощают чтение, помогают лучше понять и запомнить в нем главное при просмотре, избавляют от
                    необходимости вводить отдельные рубрики новых ступеней.</p>
                <p><strong>Выпускная квалификационная работа</strong> — один из видов самостоятельной работы студентов,
                    представляет собой дипломную работу (проект) и выясняет уровень подготовки выпускника для
                    самостоятельного выполнения профессиональных задач в соответствии с полученной квалификацией.</p>
                <p><strong>Выпускные данные</strong> — составная часть выходных сведений, включающая сведения о прохождении
                    издания в производстве (дата сдачи издательского оригинала в набор, дата подписания в печать), формат
                    бумаги и долю листа, сорт и номер бумаги, гарнитуру шрифта, способ печати, объем издания, тираж, номер
                    заказа полиграфического предприятия и его почтовый адрес.</p>
                <p>Располагают выпускные данные на концевой полосе или обороте титульного листа.</p>
                <p><strong>Выходные сведения</strong> — совокупность данных, всесторонне характеризующих издание и
                    предназначенных для информирования потребителей, библиографической обработки и статистического учета
                    изданий.</p>
                <p>Выходные данные включают: сведения о лицах, участвующих в создании издания (авторах, составителях,
                    переводчиках, редакторах, художниках); заглавие (название) издания; надзаголовочные данные;
                    подзаголовочные, номера томов; выходные данные; выпускные данные; международный стандартный номер;
                    штрих-код; знак охраны авторского права.</p>
                <p><strong>Глава</strong> — структурная часть текста издания, ступень деления текста на рубрикационные
                    структурно-композиционные единицы, имеющая, как правило, самостоятельный номер и заголовок.</p>
                <p>В учебной литературе глава обычно соответствует теме лекции или занятия. Главы объединяются нередко в
                    части или разделы. Например, в учебнике по физике часть «Электричество» состоит из нескольких глав:
                    «Сила тока», «Напряжение» «Мощность» и т. д.</p>
                <p>Главы могут быть разбиты на параграфы, а также быть единственной ступенью разделения текста.</p>
                <p><strong>График</strong> — геометрическое изображение функциональной зависимости при помощи линии на
                    плоскости. График может быть построен в любой системе координат:</p>
                <p>— прямоугольной;</p>
                <p>— полярной и т. д.</p>
                <p>Оси координат вычерчивают сплошными толстыми ординарными линиями. Стрелки на концах осей вычерчивать не
                    следует. Если необходимо показать не только характер зависимости (зависимостей), но и числовые значения
                    для отдельных точек кривой (кривых), то на осях строят шкалы (равномерные, логарифмические и т. д.).</p>
                <p>Масштабы шкал по осям (как правило, разные) следует выбирать из условия максимального использования всей
                    площади графика. Цифры шкал наносят слева от оси ординат и под осью абсцисс.</p>
                <p>Если на графике небольшое число кривых (2—3), то их вычерчивают разными линиями (сплошной, штриховой,
                    штрих-пунктирной и т. д.). При большом числе кривых их нумеруют (в необходимых случаях — с выносками).
                </p>
                <p>Надписей на графике должно быть минимум. Все пояснения, указания выносятся в подрисуночные подписи.</p>
                <p>Наименования величин, значения которых откладываются на шкалах осей, во всех случаях необходимо заменять
                    буквенным обозначением, объясняемым в подписи. Единицу измерения этих величин следует указывать только
                    при наличии шкалы.</p>
                <p>Буквенное обозначение и единицу величины пишут над числом шкалы оси ординат и под осью абсцисс, справа,
                    вместо последнего числа шкалы. Надписи, как правило, не должны выходить за пределы графика.</p>
                <p>Количество знаков (цифр) в числах шкалы должно быть минимальным, для чего используют приставки для
                    обозначения кратных или дольных единиц. В тех случаях, когда дробные числа шкалы (часто у безразмерных
                    величин) многозначны, целесообразно вводить у наименования величины постоянный множитель 10 в степени.
                </p>
                <p><strong>Гриф</strong> (издательский) — название организации или учреждения в надзаголовочных данных. Для
                    учебной литературы это текст, помещаемый на титульном листе под заглавием издания о рекомендации книги в
                    качестве учебника или учебного пособия для студентов или учащихся, обучающихся по соответствующим
                    специальностям или направлениям высшего образования.</p>
                <p>Гриф может быть выдан советом высшего учебного заведения, научно-методическим советом,
                    учебно-методическим объединением, ассоциацией и, наконец, государственным органом управления
                    образования.</p>
                <p><strong>Диаграмма</strong> — графическое изображение зависимости между величинами. Для их построения
                    пользуются линиями, плоскостями, геометрическими фигурами. Диаграммы бывают линейные, плоскостные,
                    состояния, состав — свойства и т. д.</p>
                <p>В учебной литературе по общественным наукам, экономике, статистике часто используются линейные диаграммы.
                    Их построение ведется в координатном поле. По своей сути они являются графиками, но в отличие от
                    последних имеют текстовые надписи. Поскольку такие диаграммы должны быть наглядными, на них часто даются
                    полные надписи или цифровые обозначения с расшифровкой в подписи.</p>
                <p>Используются также плоскостные диаграммы: столбиковые (ленточные) и секторные. На столбиковых диаграммах
                    данные изображаются в виде прямоугольников одинаковой ширины, расположенных вертикально и горизонтально.
                    Высота (длина) прямоугольника пропорциональна изображаемым значениям величин. Секторные диаграммы
                    представляют круг, разделенный на секторы. Площади (или центральные углы) секторов пропорциональны
                    изображаемым значениям величин. На поле секторов приводят надписи. Для наглядности каждый сектор
                    штрихуется либо окрашивается в разные цвета.</p>
                <p>Для графического изображения зависимости между параметрами состояния физико-химической системы либо между
                    ними и составом системы используют диаграммы состояния и состав — свойства. Они представляют собой
                    график с координатной сеткой. В отличие от графика на них дают все надписи, позволяющие без чтения
                    текста определять характер и состояние системы в любой точке площади диаграммы.</p>
                <p>Использование рисунков (изображение предметов) на столбиках или в секторах диаграммы, применение
                    нескольких красок обеспечивают их высокую наглядность, а часто и автономность по отношению к тексту.</p>
                <p><strong>Дипломная работа</strong> — документ, представляющий собой итоговую квалификационную работу,
                    содержащую результаты самостоятельного научного исследования по определенной теме.</p>
                <p><strong>Дипломный проект</strong> — документ, представляющий собой итоговую квалификационную работу,
                    содержащую результаты проектирования по определенной теме, включающую аналитическую, графическую и
                    расчетную части.</p>
                <p><strong>Заключение</strong> — структурная часть основного текста издания, в которой подводятся итоги,
                    делаются выводы, выделяются главные проблемы и направления решения вопросов, изложенных в книге.</p>
                <p>В учебной литературе заключение обычно выполняет важную методическую роль по обеспечению непрерывности
                    отдельных видов обучения, междисциплинарных связей.</p>
                <p><strong>Знак охраны авторского права</strong> (копирайт) — знак, которым по Закону РФ «Об авторском праве
                    и смежным правам» обладатель исключительных авторских прав оповещает о своих правах и который печатается
                    на каждом экземпляре произведения. Копирайт — профессиональное издательское название этого знака,
                    удобное своей краткостью.</p>
                <p>Знак состоит из трёх элементов:</p>
                <p>1) латинской буквы C в окружности: ©;</p>
                <p>2) имени (наименования) обладателя исключительных авторских прав;</p>
                <p>3) года первого опубликования произведения.</p>
                <p>Например: © Павлов Н. А., 2013</p>
                <p><strong>Колонтитул</strong> — справочная строка над текстом страницы (иногда сбоку от него, изредка под
                    ним), указывающая на её содержание: в сборнике — какое произведение какого автора на ней напечатано, в
                    моноиздании — к какому параграфу какой главы она относится и, следовательно, какую тему освещает.</p>
                <p><strong>Колонцифра</strong> — порядковый цифровой номер страницы издания или столбца (при нумерации по
                    столбцам).</p>
                <p><strong>Контрольная работа</strong> — 1) один из видов самостоятельной работы студентов в вузе,
                    направленный на выявление уровня усвоения учебного материала по определенной теме конкретной учебной
                    дисциплины за определенный период обучения; 2) документ, представляющий собой форму отчетности по
                    самостоятельной работе студента в процессе изучения конкретной учебной дисциплины.</p>
                <p><strong>Курсив</strong> — начертание типографического шрифта, характеризующееся наклоном буквы примерно
                    на 15 градусов
                    (обычно вправо) и в некоторой степени имитирующее рукописный шрифт.</p>
                <p><strong>Курсовая работа</strong> — 1) один из видов самостоятельной работы студентов в вузе, направленной
                    на закрепление, углубление и обобщение знаний по учебным дисциплинам профессиональной подготовки,
                    овладение методами научных исследований, формирование навыков решения творческих задач в ходе научного
                    исследования, художественного творчества по определенной теме; 2) документ, представляющий собой форму
                    отчетности о самостоятельной работе студента, содержащий систематизированные знания по определенной
                    теме.</p>
                <p><strong>Легенда</strong> — в учебной литературе обычно текст, поясняющий значение символов и условных
                    знаков на географических картах, иллюстрациях, в формулах. В технике термин «легенда» соответствует
                    термину «экспликация».</p>
                <p><strong>Международный стандартный номер книги (ISBN)</strong> — уникальный идентификатор книги,
                    обязательный элемент выходных сведений издания.</p>
                <p>Международный стандартный номер книги состоит из аббревиатуры ISBN, независимо от языка издания, и
                    последующих десяти цифр.</p>
                <p>Для цифровой части ISBN применяют арабские цифры от 0 до 9. Последняя (контрольная) цифра может быть
                    римской цифрой X, используемой для обозначения числа 10.</p>
                <p>Цифровая часть номера состоит из четырёх групп цифр различной длины, отделяемых друг от друга дефисом.
                    Аббревиатура ISBN и первая цифра разделяются пробелом.</p>
                <p>Четыре группы цифр ISBN располагают в следующей последовательности:</p>
                <p>— идентификатор группы;</p>
                <p>— идентификатор издателя или производителя;</p>
                <p>— порядковый идентификатор книги;</p>
                <p>— контрольная цифра.</p>
                <p>Пример структуры ISBN:</p>
                <p>5-87818-228-9,</p>
                <p>где 5 — идентификатор группы;</p>
                <p>87818 — идентификатор издателя;</p>
                <p>228 — порядковый идентификатор книги;</p>
                <p>9 — контрольная цифра.</p>
                <p>Приводя такую нумерацию, издатель идентифицирует каждую книгу, что в дальнейшем упрощает ее поиск в базе
                    данных, сбор заказов на книгу, каталогизацию, межбиблиотечный обмен.</p>
                <p><strong>Надзаголовочные данные</strong> — элемент выходных сведений издания, помещаемый в верхней части
                    титульного листа над фамилией автора и заглавием и включающий: название организации, от имени которого
                    выходит издание; заглавие серии; инициалы и фамилию редактора всей серии, номер выпуска серии и др.</p>
                <p><strong>Оригинал-макет</strong> — издательский оригинал, каждая страница которого совпадает со страницей
                    будущей книги.</p>
                <p><strong>Параграф</strong> — степень деления текста книги на части, имеющие специальное условное
                    обозначение (знак §), самостоятельный номер и (или) заголовок. Из параграфов состоят главы, разделы или
                    части.</p>
                <p><strong>План-проспект издания</strong> — представляемый автором документ, в котором кратко раскрыты
                    содержание и структура планируемой к выпуску книги, с указанием объема отдельных частей и всего издания
                    в авторских листах.</p>
                <p>На основании рассмотрения полученного плана-проспекта издательство заключает договор с автором.</p>
                <p><strong>Подзаголовочные данные</strong> — элемент выходных сведений, помещаемый на титульном листе или
                    его обороте под заглавием и включающий уточнение заглавия, сведения об особенностях издания,
                    читательском назначении, лицах, принимавших участие в создании книги, сведения о повторности издания,
                    для учебных книг текста грифа о рекомендации издания в качестве учебника или пособия для студентов
                    конкретных специальностей или направлений высшего образования.</p>
                <p><strong>Подписи к иллюстрациям</strong> — графики, диаграммы, рисунки, схемы, чертежи — составная часть
                    авторского текстового оригинала. Это текст под иллюстрацией, определяющий тему, поясняющий содержание и
                    связывающий ее номером с текстом, к которому она относится. Подпись не приводят, если изображение
                    понятно читателю без слов и помещено рядом с текстом, к которому относится, а также в тех случаях, когда
                    иллюстрация единственная в рубрике, и тема обозначена в ее заголовке.</p>
                <p>Подписи должны быть точными и ясными для читателей, краткими, соответствовать тексту (но не повторять
                    его).</p>
                <p><strong>Предмет</strong> — специально отобранные в определенном объеме и адаптированные в соответствии с
                    читательским адресом теоретические и прикладные знания.</p>
                <p><strong>Прикладные знания</strong> — отражают базовую информацию о профессиональной деятельности в
                    определенной сфере.</p>
                <p><strong>Раздел</strong> — одна из структурных частей текста книги, имеющая самостоятельный номер и (или)
                    заголовок, подчиняющая себе главы и части. Раздел может быть единственной ступенью деления текста книги.
                </p>
                <p><strong>Рецензия</strong> — произведение, содержащее анализ и аргументированную оценку авторского
                    оригинала или вышедшего в свет издания.</p>
                <p><strong>Рубрикация</strong> — система рубрик (частей) произведения, в которой выявлена их связь и
                    соподчиненность. В рубрикации находит отражение композиция издания.</p>
                <p><strong>Сноска</strong> — элемент аппарата издания, содержащий вспомогательный текст пояснительного или
                    справочного характера (библиографические ссылки, примечания и т. д.), помещаемый внизу полосы и
                    снабженный для связи с текстом знаком сноски с соответствующим цифровым номером либо астериском (*).</p>
                <p><strong>Сокращения в тексте</strong> — элементы текста, представляющие собой сокращенные слова и
                    словосочетания. Различают
                    аббревиатуры (буквенные, слоговые, словосокращенные слова), сокращения-усечения (напр., проф.,
                    учеб.-метод.), сокращения-вырывки (д-р, ун-т) и образованные путем отбрасывания всех гласных (млн,
                    млрд).</p>
                <p><strong>Список сокращений</strong> — составная часть аппарата издания, представляющая собой перечень
                    сокращений, принятых для данного издания с их расшифровкой, и помещаемая в начале или в конце книги.</p>
                <p><strong>Справочное издание</strong> — издание, содержащее краткие сведения научного, учебного,
                    практического характера, расположенные в порядке, удобном для их быстрого поиска, не предназначенные для
                    сплошного чтения.</p>
                <p><strong>Структура издания</strong> — расположение, взаимосвязь и согласованность материальных элементов
                    издания (страниц, титульного листа, форзаца и др.) как функционального целого, а также деление текста
                    издания на основной, дополнительный и
                    пояснительный, их взаимосвязь и взаимодействие.</p>
                <p><strong>Схема</strong> — иллюстрация, передающая с помощью условных графических средств и обозначений
                    устройство, взаимоотношение (связи) частей, структуру описываемого объекта. Схемы бывают общего
                    назначения и технические.</p>
                <p>Схемы общего назначения используют в книгах по экономике, организации и управлению, юридической
                    литературе и т. п. Они представляют собой чертежи, на которых плоские фигуры (круги, прямоугольники,
                    треугольники и др.) соединены линиями (связями). Внутри фигур помещают надписи (обозначения частей),
                    цифры или буквы. Цифры или буквы расшифровывают в тексте или в подписях к иллюстрациям. Количество
                    текста в фигуре следует ограничивать — он должен быть удобочитаем.</p>
                <p><strong>Таблицы</strong> в книгах позволяют читателю устанавливать графическую смысловую зависимость
                    понятия, объединяющего материал в строку, от понятия, объединяющего материал в графу. Эта связь легко
                    воспринимается читателем без мысленного перевода в словесную форму. Таблица благодаря особенностям формы
                    позволяет сократить текст, намного упрощает и ускоряет анализ того содержания, которое она передает.</p>
                <p>Основное требование к форме и построению таблицы — доходчивость, выразительность и комплектность
                    содержания по сравнению с текстом, графиком, диаграммой.</p>
                <p>Нецелесообразно прибегать к таблице ради нескольких чисел, если для этого потребуется строить большую
                    многоярусную графу, занимающую много места, а читателю разобраться в ней сложнее, чем прочитать текст.
                </p>
                <p>Если при изложении материала необходимо наглядно продемонстрировать характер протекания процесса,
                    показать соотношение частей целого, выявить структуру объекта или явления, то таблицу целесообразно
                    заменить графиком или диаграммой. Таблицы нумеруют в тех случаях, когда нужны ссылки на них в тексте.
                </p>
                <p><strong>Теоретические знания</strong> — знания, касающиеся основ науки.</p>
                <p><strong>Термин</strong> — слово (или сочетание слов), являющееся точным обозначением определенного
                    понятия какой-либо специальной области науки, техники и т. п.</p>
                <p><strong>Титульный лист</strong> учебной книги содержит следующие сведения: фамилию автора, заглавие,
                    подзаголовочные данные, выходные данные. В учебниках и учебных пособиях, выпускаемых
                    редакционно-издательскими отделами вузов, приводятся дополнительно надзаголовочные данные (название
                    выпускающей организации).</p>
                <p>Сведения об авторах включают имя автора (авторов). Под именем понимается фамилия и инициалы. Имя автора
                    приводится в той форме и полноте, которая установлена автором. Сначала указывают инициалы или имя, затем
                    фамилию. Имена авторов на титульном листе приводятся независимо от их числа. Если авторов четыре и
                    более, то по усмотрению издательства допускается помещать их имена на обороте титульного листа.
                    Последовательность приведения имен авторы определяют сами. Сведения о почетном звании, ученой степени и
                    т. д. помещают после имени автора.</p>
                <p>Заглавие книги устанавливает автор и оно может быть изменено только с его согласия. Сокращать заглавие на
                    титульном листе не допускается.</p>
                <p>Под заглавием книги помещается рекомендация (гриф) об использовании книги в качестве учебника или
                    учебного пособия, а также указывается, студентам какой (каких) специальности она необходима.</p>
                <p>Выходные данные включают место выпуска книги, название издательства и год выпуска.</p>
                <p><strong>УДК (Универсальная десятичная классификация)</strong> — система классификации информации,
                    используемая во всем мире для систематизации произведений науки, литературы и искусства, периодической
                    печати, различных документов и организации картотек.</p>
                <p>Центральной частью УДК являются основные таблицы, охватывающие всю совокупность знаний и построенные по
                    иерархическому принципу деления от общего к частному с использованием цифрового десятичного кода. Индекс
                    УДК — обязательный элемент выходных сведений издания, помещаемый в верхнем левом углу оборота титульного
                    листа.</p>
                <p><strong>Учетно-издательский</strong> (авторский) <strong>лист (уч.-изд. л.)</strong> в соответствии с
                    «Инструкцией по исчислению произведения в авторских листах» равен 40 000 знакам, включая пробелы, знаки
                    препинания и считая неполную строку за полную.</p>
                <p><strong>Хрестоматия</strong> — учебное пособие, содержащее литературно-художественные, исторические и
                    иные произведения или отрывки из них, составляющие объект изучения той или иной учебной дисциплины.</p>
                <p><strong>Цитаты</strong> в учебных книгах стимулируют обучающегося к работе с первоисточниками. Цитировать
                    других авторов следует только по их произведениям (изданиям) в полном соответствии с источником.
                    Допустимы лишь следующие отклонения: приведение орфографии и пунктуации к современным правилам, если
                    написание слов и расстановка знаков препинания не являются индивидуальной особенностью стиля автора, не
                    выражают характерных признаков языка эпохи. Допустимо развертывание произвольно сокращенных слов до
                    полных с заключением дополненной части слова в прямые скобки, а также пропуск отдельных слов,
                    словосочетаний, фраз в цитате при условии, что, во-первых, мысль автора не будет искажена пропуском,
                    во-вторых, этот пропуск будет обозначен многоточием или многоточием в угловых скобках взамен одной или
                    нескольких фраз.</p>
                <p><strong>Часть</strong> — ступень деления текста издания, имеющая, как правило, самостоятельный номер и
                    (или) заглавие, которая делится на разделы; может быть единственной ступенью деления текста.</p>
                <p><strong>Экспликация</strong> — 1) составная часть подписи к иллюстрации, содержащая расшифровку условных
                    обозначений деталей и частей изображения; 2) расшифровка буквенных обозначений величин, употреблённых в
                    математической формуле: размещается только после формулы, от которой отделяется запятой; начинается со
                    слова «где». Символы надо располагать в определенной последовательности.</p>
            </div>
        </div>

    </section>
@endsection
