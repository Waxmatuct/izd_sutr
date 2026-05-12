import translations from "@/assets/translations.json";

export function matches(text, filter) {
    const matchExists = text.toLowerCase().includes(filter.value.toLowerCase());
    if (!matchExists) return text;

    const re = new RegExp(filter.value, "ig");
    return text.replace(
        re,
        (matchedText) => `<span style=\"color: red\">${matchedText}</span>`,
    );
}

export function filteredBooks(books, filter) {
    return books.value.filter((book) => {
        const author = book.author.toString().toLowerCase();
        const searchTerm = filter.value.toLowerCase();
        const item = book.item.toString();
        return author.includes(searchTerm) || item.includes(searchTerm);
    });
}

export function getBooks(books, year, all = false) {
    let url = all === true ? `/api/all/plan-${year}` : `/api/plan-${year}`;
    axios.get(url).then((response) => {
        books.value = response.data;
    });
}

export function useTextTranslator() {
    const translate = (text) => {
        let result = text;
        const sortedKeys = Object.keys(translations).sort(
            (a, b) => b.length - a.length,
        );

        sortedKeys.forEach((word) => {
            const regex = new RegExp(`\\b${word}\\b`, "gi");
            result = result.replace(regex, (match) => {
                const translated = translations[word];
                if (match[0] === match[0].toUpperCase()) {
                    return (
                        translated.charAt(0).toUpperCase() + translated.slice(1)
                    );
                }
                return translated;
            });
        });

        return result;
    };

    return { translate };
}
