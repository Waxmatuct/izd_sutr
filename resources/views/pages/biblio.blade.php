@extends('layouts.base')

@section('title', 'РИЦ :: Примеры оформления библиографических ссылок')
@section('description', 'Примеры оформления библиографических ссылок')


@section('main')

    <section class="body-font">
        <div class="flex flex-col w-full px-5 mb-10">
            <h1 class="sm:text-4xl text-center text-3xl font-bold mb-6 sm:mb-12">
                Примеры оформления библиографических ссылок
            </h1>
            <div class="entry-content space-y-4 lg:w-3/4 mx-auto text-left leading-normal sm:text-lg">

                <p><strong>Один автор</strong><br>
                    Семёнов В. В. Защита окружающей среды. Оценка распространения за-грязняющих примесей в водной среде :
                    учеб. пособие. — СПб. : Изд-во Поли-техн. ун-та, 2006. — 88 с.</p>
                <p><strong>Два, три автора</strong><br>
                    Семёнов В. В., Гаврикова Т. А., Зыков В. А. Защита окружающей среды. Оценка распространения загрязняющих
                    примесей в водной среде : учеб. посо-бие. — СПб. : Изд-во Политехн. ун-та, 2006. — 88 с.</p>
                <p><strong>Четыре и более авторов</strong><br>
                    Защита окружающей среды. Оценка распространения загрязняющих примесей в водной среде : учеб. пособие /
                    В.
                    В. Семёнов [и др.]. — СПб. : Изд-во Политехн. ун-та, 2006. — 88 с.</p>
                <p><strong>Под редакцией</strong><br>
                    Защита окружающей среды. Оценка распространения загрязняющих примесей в водной среде : учеб. пособие /
                    В.
                    В. Семёнов [и др.] ; под общ. ред. С. В. Белова. — СПб. : Изд-во Политехн. ун-та, 2006. — 88 с.</p>
                <p><strong>Второе и последующие издания</strong><br>
                    Защита окружающей среды. Оценка распространения загрязняющих примесей в водной среде : учеб. пособие /
                    В.
                    В. Семёнов [и др.] ; под общ. ред. С. В. Белова. — 2-е изд., перераб. и доп. — СПб. : Изд-во Политехн.
                    ун-та, 2006. — 88 с.</p>
                <p><strong>Сериальное книжное издание</strong><br>
                    Защита окружающей среды. Оценка распространения загрязняющих примесей в водной среде : учеб. пособие /
                    В.
                    В. Семёнов [и др.] ; под общ. ред. С. В. Белова. — СПб. : Изд-во Политехн. ун-та, 2006. — 88 с. —
                    (Экология в Политехническом университете).</p>
                <p><strong>Переводное издание</strong><br>
                    • без указания переводчиков:<br>
                    Перроун П. Защита окружающей среды. Оценка распространения загряз-няющих примесей в водной среде : учеб.
                    пособие : [пер. с англ.]. — СПб. : Изд-во Политехн. ун-та, 2006. — 88 с.</p>
                <p>• с указанием переводчиков:<br>
                    Перроун П. Защита окружающей среды. Оценка распространения загряз-няющих примесей в водной среде : учеб.
                    пособие ; пер. с англ. Д. Джойс. — СПб. : Изд-во Политехн. ун-та, 2006. — 88 с.</p>
                <p><strong>Издания по повторности выпуска</strong><br>
                    Быстро и легко осваиваем работу на компьютере: учеб. пособие / под ред. Ф. А. Резникова. — 7-е изд. —
                    М.:
                    Лучшие кн., 2002. — 475 с.</p>
                <p><strong>Методические указания</strong><br>
                    Защита окружающей среды. Оценка распространения загрязняющих примесей в водной среде : метод. указания /
                    сост. В. В. Семёнов. — СПб. : Изд-во Политехн. ун-та, 2006. — 48 с.</p>
                <p><strong>Один автор, несколько мест издания</strong><br>
                    Семёнов В. В. Защита окружающей среды. Оценка распространения за-грязняющих примесей в водной среде :
                    учебник. — М. ; СПб. : Наука, 2006. — 388 с.</p>
                <p><strong>Один автор, несколько издательств</strong><br>
                    Семёнов В. В. Защита окружающей среды. Оценка распространения за-грязняющих примесей в водной среде :
                    учебник. — СПб. : Наука : Изд-во По-литехн. ун-та, 2006. — 388 с.</p>
                <p><strong>Многотомные издания</strong><br>
                    • Гиппиус З. Н. Сочинения : в 2 т. — СПб. : Наука, 2006. — 388 с. — (Золотая проза серебряного
                    века).<br>
                    • Гиппиус З. Н. Сочинения. В 2 т. Т. 1. Стихи. — СПб. : Наука, 2006. — 388 с. — (Золотая проза
                    серебряного века).</p>

                <div>
                    <h2 class="text-xl sm:text-2xl font-bold mt-10">Составная часть издания</h2>
                </div>

                <p><strong>Статья из авторского сборника</strong><br>
                    Семёнов В. В. Защита окружающей среды. Оценка распространения за-грязняющих примесей в водной среде //
                    Семёнов В. В. Окружающая среда : сб. науч. тр. — СПб. : Изд-во Политехн. ун-та, 2006. — С. 104—110.</p>
                <p><strong>Статья из коллективного сборника</strong><br>
                    Семёнов В. В. Защита окружающей среды. Оценка распространения за-грязняющих примесей в водной среде //
                    Экобалтика-96 : сб. науч. тр. — СПб. : Изд-во Политехн. ун-та, 2006. — С. 104—110.</p>
                <p><strong>Статья из коллективного сборника с нумерованными выпусками (тома-ми и пр.)</strong><br>
                    Семёнов В. В. Защита окружающей среды. Оценка распространения за-грязняющих примесей в водной среде //
                    Проблемы окружающей среды : Севе-ро-Кавказские чтения : материалы всерос. науч. конф. — Ростов н/Д,
                    1996. — Вып. 1. — С. 150.</p>
                <p><strong>Статья из газеты </strong><br>
                    Семёнов В. В. Защита окружающей среды. Оценка распространения за-грязняющих примесей в водной среде //
                    Комсомольская правда. — 1995. —24 сент.</p>
                <p><strong>Статья из журнала</strong><br>
                    Семёнов В. В. Защита окружающей среды. Оценка распространения за-грязняющих примесей в водной среде //
                    Региональная экология. — 2006. — № 4. Вып. 5. — С. 8.</p>
                <p><strong>Статья из энциклопедии</strong><br>
                    Сикорский М. Н. Книговедение // БСЭ. — 3-е изд. — 1976. — Т. 10. —Стб. 79—81.</p>

                <div>
                    <h2 class="text-xl sm:text-2xl font-bold mt-10">Депонированные научные работы</h2>
                </div>

                <p>Семёнов В. В. Защита окружающей среды. Оценка распространения за-грязняющих примесей в водной среде /
                    Ин-т экономики города. — М., 2002. — 110 с. — Деп. в ВИНИТИ 13.06.02, № 145432.</p>

                <h2>Патентные документы</h2>

                <p>• Приёмопередающее устройство : пат. 3472091 Рос. Федерации : МПК H 04 B 1/38, H 04 J 13/00 / В. И.
                    Чугаева ; заявитель и патентообладатель Воро-неж. науч.-исслед. ин-т связи. — № 7609326578/09 ; заявл.
                    18.12.02 ; опубл. 20.01.03, Бюл. № 23 (II ч.). — 3 с.</p>
                <p>• Устройство для захвата неориентированных деталей типа валов : а. с. 7523096 СССР, МКИ3 B 23 J 15/00 /
                    В. С. Ваулин, В. Г. Кемайкин (СССР). — № 5549871/25-08 ; заявл. 23.11.81 ; опубл. 30.03.83, Бюл. № 12.
                </p>

                <div>
                    <h2 class="text-xl sm:text-2xl font-bold mt-10">Стандарты</h2>
                </div>

                <p>Система стандартов безопасности труда : сб. — М. : Изд-во стандартов, 2006. — 124 с.</p>

                <div>
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-700 mt-10">Неопубликованные документы</h2>
                </div>

                <p><strong>Отчёты о НИР</strong><br>
                    Состояние и перспективы развития статистики печати РФ : отчёт о НИР (заключ.) / Рос. кн. палата ; рук.
                    В. А. Попов. — М., 2007. — № ГР 01840051145. — Инв. № 756600.</p>
                <p><strong>Диссертации</strong><br>
                    Семёнов В. В. Защита окружающей среды. Оценка распространения загрязняющих примесей в водной среде :
                    дис. … д-ра техн. наук : 08.00.13 : защищена 12.02.02 : утв. 24.06.02. — М. : Наука, 2006. — 388 с. —
                    04200204433.</p>

                <div>
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-700 mt-10">Законодательные материалы</h2>
                </div>

                <p>• Российская Федерация. Законы. Гражданский кодекс Российской Феде-рации. Ч. III : Федеральный закон от
                    26 ноября 2001 г. № 146-ФЗ // Собр. законодательства Российской Федерации. — 2001. — № 34. — Ст. 1759.
                </p>
                <p>• О правительственной комиссии по проведению административной реформы : Постановление Правительства РФ от
                    31 июля 2003 г. № 451 // Собр. законодательства Российской Федерации. — 2003. — № 31. — Ст. 3150.</p>

                <div>
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-700 mt-10">Правила</h2>
                </div>

                <p>Правила безопасной эксплуатации подъёмников : ПБ 10-256-98. — СПб. : ДЕАН, 2001.</p>

                <div>
                    <h2 class="text-xl sm:text-2xl font-bold mt-10">Электронные ресурсы</h2>
                </div>

                <p>• Жизнь прекрасна, жизнь трагична… : 1917 год в письмах А. В. Луначар-ского А. А. Луначарской / отв.
                    сост. Л. Роговая ; сост. Н. Антонова ; Ин-т «От-крытое о-во». — М., 2001. — URL:
                    http://www.auditorium.ru/books/473/ (дата обращения: 17.04.2006).</p>
                <p>• Члиянц Г. Создание телевидения // QRZ.RU : сервер радиолюбителей России. — 2004. — URL:
                    http://www.grz.ru/articles/article260.html (дата обра-щения: 21.02.2006).</p>
                <p>• Жилищное право: актуальные вопросы законодательства : электрон. журн. — 2007. — № 1. — URL:
                    http://www.gilpravo.ru (дата обращения: 20.08.2007).</p>

                <div>
                    <h2 class="text-xl sm:text-2xl font-bold mt-10">Архивные документы</h2>
                </div>

                <p>• Полторацкий С. Д. Материалы к «Словарю русских псевдонимов» // ОР РГБ. — Ф. 223 (С. Д. Полторацкий). —
                    Картон 79. — Ед. хр. 122.</p>
                <p>• Гущин Б. П. Журнальный ключ : ст. // ПФА РАН. — Ф. 900. — Оп. 1. — Ед. хр. 23 л.</p>
                <p>• АОАГС. — Ф. Р-348. — Оп. 1. — Д. 12. — Л. 4—6.</p>
                <p>• ГАКК. — Ф. 729. — Оп. 1. — Д. 2. — Л. 1.</p>
            </div>
        </div>

    </section>
@endsection
