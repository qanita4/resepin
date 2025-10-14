<template>
    <div class="relative mx-auto max-w-2xl">
        <div class="relative">
            <div
                class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3"
            >
                <svg
                    class="h-5 w-5 text-gray-400"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                    />
                </svg>
            </div>
            <input
                v-model="searchQuery"
                type="text"
                placeholder="Cari resep favorit kamu..."
                class="block w-full rounded-xl border border-gray-300 py-3 pr-4 pl-10 text-gray-900 placeholder-gray-500 transition-all duration-200 focus:border-transparent focus:ring-2"
                :style="{ 'focus:ring-color': 'var(--resepin-tomato)' }"
                @input="handleSearch"
                @keyup.enter="handleEnter"
            />
            <div
                v-if="searchQuery"
                class="absolute inset-y-0 right-0 flex items-center pr-3"
            >
                <button
                    @click="clearSearch"
                    class="text-gray-400 transition-colors hover:text-gray-600"
                >
                    <svg
                        class="h-5 w-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Search Suggestions (Optional) -->
        <div
            v-if="showSuggestions && suggestions.length > 0"
            class="absolute z-10 mt-2 w-full overflow-hidden rounded-xl border border-gray-200 bg-white shadow-lg"
        >
            <ul class="max-h-60 overflow-y-auto">
                <li
                    v-for="suggestion in suggestions"
                    :key="suggestion"
                    class="cursor-pointer px-4 py-3 transition-colors hover:bg-gray-50"
                    @click="selectSuggestion(suggestion)"
                >
                    <div class="flex items-center gap-3">
                        <svg
                            class="h-4 w-4 text-gray-400"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                            />
                        </svg>
                        <span class="text-gray-700">{{ suggestion }}</span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script setup lang="ts">
import { computed, ref } from 'vue';

const props = defineProps<{
    placeholder?: string;
    modelValue?: string;
}>();

const emit = defineEmits<{
    'update:modelValue': [value: string];
    search: [query: string];
    enter: [query: string];
}>();

const searchQuery = ref(props.modelValue || '');
const showSuggestions = ref(false);

// Mock suggestions - bisa diganti dengan data dari API
const allSuggestions = [
    'Nasi Goreng',
    'Rendang',
    'Gado-gado',
    'Soto Ayam',
    'Bakso',
    'Gudeg',
    'Ayam Bakar',
    'Ikan Bakar',
    'Sambal Matah',
    'Es Cendol',
];

const suggestions = computed(() => {
    if (!searchQuery.value || searchQuery.value.length < 2) return [];
    return allSuggestions
        .filter((item) =>
            item.toLowerCase().includes(searchQuery.value.toLowerCase()),
        )
        .slice(0, 5);
});

const handleSearch = () => {
    emit('update:modelValue', searchQuery.value);
    emit('search', searchQuery.value);
    showSuggestions.value = searchQuery.value.length >= 2;
};

const handleEnter = () => {
    emit('enter', searchQuery.value);
    showSuggestions.value = false;
};

const clearSearch = () => {
    searchQuery.value = '';
    emit('update:modelValue', '');
    emit('search', '');
    showSuggestions.value = false;
};

const selectSuggestion = (suggestion: string) => {
    searchQuery.value = suggestion;
    emit('update:modelValue', suggestion);
    emit('search', suggestion);
    showSuggestions.value = false;
};

// Hide suggestions when clicking outside
const hideSuggestions = () => {
    setTimeout(() => {
        showSuggestions.value = false;
    }, 200);
};
</script>

<style scoped>
input:focus {
    ring-color: var(--resepin-tomato);
}
</style>
