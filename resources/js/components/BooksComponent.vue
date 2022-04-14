<template>
    <div>
        <input
            class="mb-5 px-5 py-2 text-gray-700 bg-gray-200 rounded border-gray-400 focus:ring-2 focus:ring-primary-200 focus:border-primary-500"
            type="text"
            placeholder="Быстрый поиск по автору"
            v-model="filter"
        />
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
                            Срок сдачи
                        </th>
                        <th scope="col" class="text-center py-3 px-4">
                            Принято к изданию
                        </th>
                        <th scope="col" class="text-center py-3 px-4">
                            Статус **
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
                        }"
                        id=""
                    >
                        <td class="text-center py-3 px-4 font-bold">
                            {{ book.item }}
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
                        </td>
                        <td class="text-center py-3 px-4 font-normal">
                            <span v-if="book.is_handed == 1">
                                {{ book.status }}
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    props: ["year"],
    data: function () {
        return {
            books: [],
            filter: "",
        };
    },
    mounted() {
        this.getBooks();
    },
    methods: {
        getBooks() {
            axios.get("/api/plan-" + `${this.year}`).then((response) => {
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
    },
    computed: {
        filteredRows() {
            return this.books.filter((book) => {
                const author = book.author.toString().toLowerCase();
                // const title = book.title.toLowerCase();
                const searchTerm = this.filter.toLowerCase();

                return author.includes(searchTerm);
            });
        },
    },
};
</script>

<style scoped>
input {
    width: 320px;
}
</style>
