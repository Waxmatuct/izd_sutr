<script>
import { ref, onMounted, computed } from "vue";

export default {
    props: ['year'],

    setup(props) {
        const books = ref([]);
        const filter = ref("");

        const highlightMatches = text => {
            const matchExists = text.toLowerCase().includes(filter.value.toLowerCase());
            if (!matchExists) return text;

            const re = new RegExp(filter.value, "ig");
            return text.replace(re, (matchedText) =>
                `<span style=\"color: red\">${matchedText}</span>`
            );
        };

        onMounted(() => {
            getBooks();
        })

        const getBooks = () => {
            axios.get("/api/plan-" + props.year).then((response) => {
                books.value = response.data;
            });
        }

        const filteredRows = computed(() => {
            return books.value.filter((book) => {
                const author = book.author.toString().toLowerCase();
                const searchTerm = filter.value.toLowerCase();

                return author.includes(searchTerm);
            })
        });

        return { books, highlightMatches, filteredRows, filter }
    }
}
</script>

<template>
    <div>
        <div class="mx-auto lg:w-3/4 lg:px-4">
            <input
                class="mb-5 rounded border-gray-400 bg-gray-200 px-5 py-2 text-gray-700 focus:ring-primary-200 focus:border-primary-500 focus:ring-2"
                type="text" placeholder="Быстрый поиск по автору" v-model="filter" />
        </div>
        <div class="mx-auto w-full overflow-auto rounded-lg shadow-xl">
            <table class="w-full table-auto bg-white text-xs">
                <thead class="bg-gray-300 text-xs text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                    <tr>
                        <th scope="col" class="px-4 py-3 text-center">
                            № в плане
                        </th>
                        <th scope="col" class="px-4 py-3 text-center">
                            Стр.<br />подразделение
                        </th>
                        <th scope="col" class="px-4 py-3 text-center">
                            Авторы
                        </th>
                        <th scope="col" class="px-4 py-3 text-center">
                            Наименование рукописи
                        </th>
                        <th scope="col" class="px-4 py-3 text-center">
                            Вид издания
                        </th>
                        <th scope="col" class="px-4 py-3 text-center">
                            Дисциплина
                        </th>
                        <th scope="col" class="px-4 py-3 text-center">
                            Объем, уч.изд. л
                        </th>
                        <th scope="col" class="px-4 py-3 text-center">Тираж</th>
                        <th scope="col" class="px-4 py-3 text-center">
                            Срок сдачи
                        </th>
                        <th scope="col" class="px-4 py-3 text-center">
                            Принято к изданию
                        </th>
                        <th scope="col" class="px-4 py-3 text-center">
                            Статус **
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(book, index) in filteredRows" :key="book.id" class="hover:bg-primary-100" :class="{
                        'bg-white': index % 2 === 0,
                        'bg-gray-100': index % 2 !== 0,
                    }" id="">
                        <td class="px-4 py-3 text-center font-bold">
                            {{ book.item }}
                        </td>
                        <td class="px-4 py-3 text-center font-normal">
                            {{ book.faculty.short_title }}
                        </td>
                        <td class="px-4 py-3 text-center font-normal" v-html="highlightMatches(book.author)"></td>
                        <td class="px-4 py-3 text-center font-normal">
                            {{ book.title }}
                        </td>
                        <td class="px-4 py-3 text-center font-normal">
                            {{ book.type.title }}
                        </td>
                        <td class="px-4 py-3 text-center font-normal">
                            {{ book.disciple }}
                        </td>
                        <td class="px-4 py-3 text-center font-normal">
                            {{ book.size }}
                        </td>
                        <td class="px-4 py-3 text-center font-normal">
                            {{ book.amount }}
                        </td>
                        <td class="px-4 py-3 text-center font-normal">
                            {{ book.month }}
                        </td>
                        <td class="px-4 py-3 text-center font-normal">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-5 w-5 text-secondary-500"
                                viewBox="0 0 20 20" fill="currentColor" v-if="book.is_handed">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </td>
                        <td class="px-4 py-3 text-center font-normal">
                            <span v-if="book.is_handed">
                                {{ book.status }}
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<style scoped>
input {
    width: 320px;
}
</style>
