<template>
    <div class="w-full mx-auto rounded-lg bg-gray-100 text-gray-700">
        <div class="lg:w-3/4 lg:px-4 mx-auto text-center">
            <input
                class="mb-5 px-5 py-2 text-gray-700 bg-gray-200 rounded border-gray-400 focus:ring-2 focus:ring-primary-200 focus:border-primary-500"
                type="text"
                placeholder="Быстрый поиск по автору"
                v-model="filter"
            />
        </div>
        <div class="w-full mx-auto overflow-auto rounded-lg shadow-xl">
            <table class="table-auto w-full bg-white text-xs">
                <thead
                    class="bg-gray-300 text-gray-800 dark:text-gray-300 dark:bg-gray-700 text-xs"
                >
                    <tr>
                        <th scope="col" class="text-center py-3 px-4">
                            № в плане
                        </th>
                        <th scope="col" class="text-center py-3 px-4">
                            Факультет
                        </th>
                        <th scope="col" class="text-center py-3 px-4">
                            Авторы
                        </th>
                        <th scope="col" class="text-center py-3 px-4">
                            Наименование рукописи
                        </th>
                        <th scope="col" class="text-center py-3 px-4">
                            Вид издания
                        </th>
                        <th scope="col" class="text-center py-3 px-4">
                            Дисциплина
                        </th>
                        <th scope="col" class="text-center py-3 px-4">
                            Объем, уч.изд. л
                        </th>
                        <th scope="col" class="text-center py-3 px-4">Тираж</th>
                        <th scope="col" class="text-center py-3 px-4">
                            Месяц сдачи
                        </th>
                        <th scope="col" class="text-center py-3 px-4">
                            Когда сдано
                        </th>
                        <th scope="col" class="text-center py-3 px-4">Сдано</th>
                        <th
                            scope="col"
                            class="text-center py-3 px-4 whitespace-nowrap"
                        >
                            Статус
                        </th>
                        <th
                            scope="col"
                            class="text-center py-3 px-4 whitespace-nowrap"
                        >
                            Нов. статус
                        </th>
                        <th
                            scope="col"
                            class="text-center py-3 px-4 whitespace-nowrap"
                        >
                            Удал.
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="(book, index) in filteredRows"
                        :key="book.id"
                        class="hover:bg-primary-100"
                        :class="{
                            'bg-white': index % 2 === 0,
                            'bg-gray-100': index % 2 !== 0,
                            'text-red-400': book.deleted_at != null,
                        }"
                    >
                        <td class="text-center py-3 px-4 font-bold">
                            <a
                                :href="'/dashboard/book/' + book.id + '/edit'"
                                title="Правка"
                            >
                                {{ book.item }}
                            </a>
                        </td>
                        <td class="text-center py-3 px-4 font-normal">
                            {{ book.faculty.short_title }}
                        </td>
                        <td
                            class="text-center py-3 px-4 font-normal"
                            v-html="highlightMatches(book.author)"
                        >
                            {{ book.author }}
                        </td>
                        <td class="text-center py-3 px-4 font-normal">
                            {{ book.title }}
                        </td>
                        <td class="text-center py-3 px-4 font-normal">
                            {{ book.type.title }}
                        </td>
                        <td class="text-center py-3 px-4 font-normal">
                            {{ book.disciple }}
                        </td>
                        <td class="text-center py-3 px-4 font-normal">
                            {{ book.size }}
                        </td>
                        <td class="text-center py-3 px-4 font-normal">
                            {{ book.amount }}
                        </td>
                        <td class="text-center py-3 px-4 font-normal">
                            {{ book.month.name }}
                        </td>
                        <td class="text-center py-3 px-4 font-normal">
                            <span v-if="book.is_handed == 1">
                                {{ formatMonth(book.handed_in) }}
                            </span>
                        </td>
                        <td class="text-center py-3 px-4 font-normal">
                            <span v-if="book.is_handed == 1">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="text-secondary-500 h-5 w-5 mx-auto"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                    v-if="book.is_handed == 1"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"
                                    ></path>
                                </svg>
                            </span>
                        </td>
                        <td class="text-center py-3 px-4 font-normal">
                            <span v-if="book.is_handed == 1">
                                {{ book.status }}
                            </span>
                        </td>
                        <td class="text-center py-3 px-4 font-normal">
                            <form @change="patchStatus(book.id)">
                                <select
                                    v-if="book.is_handed == 1"
                                    v-model="newStatus"
                                    class="select-css"
                                >
                                    <option
                                        v-for="status in statuses"
                                        :key="status.key"
                                        :value="status"
                                    >
                                        {{ status }}
                                    </option>
                                </select>
                            </form>
                        </td>
                        <td class="text-center py-3 px-4 font-normal">
                            <div v-if="book.deleted_at == null">
                                <button
                                    class="delete-btn text-red-300 hover:text-red-600"
                                    title="Удалить запись"
                                    @click="deleteBook(book.id)"
                                    type="button"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                        />
                                    </svg>
                                </button>
                            </div>
                            <div v-else>
                                <button
                                    class="delete-btn text-green-300 hover:text-green-600"
                                    title="Восстановить запись"
                                    @click="restoreBook(book.id)"
                                    type="button"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="w-5 h-5"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M15 15l-6 6m0 0l-6-6m6 6V9a6 6 0 0112 0v3"
                                        />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import moment from "moment";
export default {
    props: ["year"],
    data: function () {
        return {
            books: [],
            filter: "",
            moment: moment,
            statuses: [
                "В работе",
                "В печати",
                "Отпечатано",
                "На калькуляции",
                "Издано",
            ],
            newStatus: "",
        };
    },
    mounted() {
        this.getBooks();
    },
    methods: {
        getBooks() {
            axios.get("/api/all/plan-" + `${this.year}`).then((response) => {
                this.books = response.data.book;
            });
        },
        highlightMatches(text) {
            const matchExists = text
                .toLowerCase()
                .includes(this.filter.toLowerCase());
            if (!matchExists) return text;

            const re = new RegExp(this.filter, "ig");
            return text.replace(
                re,
                (matchedText) =>
                    `<span style=\"color: red\">${matchedText}</span>`
            );
        },
        deleteBook(id) {
            axios
                .delete("/api/book/delete/" + `${id}`)
                .then((response) => {
                    this.getBooks();
                    // console.log(response);
                })
                .catch((error) => alert("Ошибка"));
        },
        restoreBook(id) {
            axios
                .get("/api/book/restore/" + `${id}`)
                .then((response) => {
                    this.getBooks();
                    // console.log(response);
                })
                .catch((error) => alert("Ошибка"));
        },
        patchStatus(id) {
            axios
                .patch("/api/book/" + `${id}` + "/patch", {
                    newStatus: this.newStatus,
                })
                .then((response) => {
                    this.newStatus = "";
                    this.getBooks();
                    // console.log(response);
                })
                .catch((error) => alert("Ошибка"));
        },
        formatMonth(month) {
            moment.updateLocale("ru", {
                months: [
                    "Январь",
                    "Февраль",
                    "Март",
                    "Апрель",
                    "Май",
                    "Июнь",
                    "Июль",
                    "Август",
                    "Сентябрь",
                    "Октябрь",
                    "Ноябрь",
                    "Декабрь",
                ],
            });
            return moment(month, "MM").locale("ru").format("MMMM");
        },
    },
    computed: {
        filteredRows() {
            return this.books.filter((book) => {
                const author = book.author.toString().toLowerCase();
                const item = book.item.toString();
                const searchTerm = this.filter.toLowerCase();

                return author.includes(searchTerm) || item.includes(searchTerm);
            });
        },
    },
};
</script>

<style scoped>
input {
    width: 320px;
}
.select-css {
    font-size: 0.85rem;
    padding: 0.25rem;
}
</style>
