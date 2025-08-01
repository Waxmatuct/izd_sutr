<script setup>
import { ref, onMounted, computed } from "vue";
import { filteredBooks, getBooks, matches } from "../functions";

const props = defineProps({
    year: Number,
})

const statuses = [
    "В работе",
    "В печати",
    "Отпечатано",
    "На калькуляции",
    "Издано",
]
const newStatus = ref("")

const books = ref([]);
onMounted(() => getBooks(books, props.year, true))

const filter = ref("");
const highlightMatches = text => matches(text, filter);
const filteredRows = computed(() => filteredBooks(books, filter))

const deleteBook = id => {
    axios
        .delete("/api/book/delete/" + `${id}`)
        .then((response) => {
            getBooks(books, props.year, true);
        })
        .catch((error) => alert("Ошибка"));
}

const restoreBook = id => {
    axios
        .get("/api/book/restore/" + `${id}`)
        .then((response) => {
            getBooks(books, props.year, true);
        })
        .catch((error) => alert("Ошибка"));
}

const patchStatus = id => {
    axios
        .patch("/api/book/" + `${id}` + "/patch", {
            newStatus: newStatus.value,
        })
        .then((response) => {
            newStatus.value = "";
            getBooks(books, props.year, true);
            // console.log(response);
        })
        .catch((error) => alert("Ошибка"));
}

</script>

<template>
    <div class="mx-auto w-full rounded-lg bg-gray-100 text-gray-700">
        <div class="mx-auto text-center lg:w-3/4 lg:px-4">
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
                            Факультет
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
                            Месяц сдачи
                        </th>
                        <th scope="col" class="px-4 py-3 text-center">Сдано</th>
                        <th scope="col" class="whitespace-nowrap px-4 py-3 text-center">
                            Статус
                        </th>
                        <th scope="col" class="whitespace-nowrap px-4 py-3 text-center">
                            Удал.
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(book, index) in filteredRows" :key="book.id" class="hover:bg-primary-100" :class="{
                        'bg-white': index % 2 === 0,
                        'bg-gray-100': index % 2 !== 0,
                        'text-red-400': book['deleted_at'] != null,
                    }">
                        <td class="px-4 py-3 text-center font-bold">
                            <a :href="'/dashboard/book/' + book.id + '/edit'" title="Правка">
                                {{ book.item }}
                            </a>
                        </td>
                        <td class="px-4 py-3 text-center font-normal">
                            {{ book["faculty"]["short_title"] }}
                        </td>
                        <td class="px-4 py-3 text-center font-normal" v-html="highlightMatches(book.author)"></td>
                        <td class="px-4 py-3 text-center font-normal">
                            {{ book.title }}
                        </td>
                        <td class="px-4 py-3 text-center font-normal">
                            {{ book.type.title }}
                        </td>
                        <td class="px-4 py-3 text-center font-normal">
                            {{ book["disciple"] }}
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
                            <span v-if="book['is_handed']">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-5 w-5 text-secondary-500"
                                    viewBox="0 0 20 20" fill="currentColor" v-if="book['is_handed']">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </td>
                        <td class="px-4 py-3 text-center font-normal">
                            <select v-if="book['is_handed']" v-model="newStatus" class="select-css"
                                @change="patchStatus(book.id)">
                                <option value="" disabled>
                                    {{ book.status }}
                                </option>
                                <option v-for="status in statuses" :key="status.key" :value="status">
                                    {{ status }}
                                </option>
                            </select>
                        </td>
                        <td class="px-4 py-3 text-center font-normal">
                            <div v-if="book['deleted_at'] == null">
                                <button class="text-red-300 delete-btn hover:text-red-600" title="Удалить запись"
                                    @click="deleteBook(book.id)" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                            <div v-else>
                                <button class="text-green-300 delete-btn hover:text-green-600"
                                    title="Восстановить запись" @click="restoreBook(book.id)" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 15l-6 6m0 0l-6-6m6 6V9a6 6 0 0112 0v3" />
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

<style scoped>
input {
    width: 320px;
}

.select-css {
    font-size: 0.85rem;
    padding: 0.25rem;
}
</style>
