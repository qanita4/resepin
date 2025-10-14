<template>
    <div
        class="overflow-hidden rounded-xl bg-white shadow-md transition-shadow duration-300 hover:shadow-lg cursor-pointer"
        role="button"
        tabindex="0"
        @click="$emit('view-recipe', recipe)"
        @keydown.enter="$emit('view-recipe', recipe)"
        :aria-label="`Lihat resep ${recipe.title}`"
    >
        <!-- Recipe Image -->
        <div class="relative aspect-[4/3] overflow-hidden">
            <img
                :src="recipe.image"
                :alt="recipe.title"
                loading="lazy"
                class="h-full w-full object-cover transition-transform duration-300 hover:scale-105"
            />
        </div>

        <!-- Recipe Info -->
        <div class="p-4">
            <h3 class="mb-2 line-clamp-2 text-lg font-semibold text-gray-900">
                {{ recipe.title }}
            </h3>

            <div class="mb-4 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <img
                        :src="recipe.author.avatar || 'https://via.placeholder.com/40?text=U'"
                        :alt="recipe.author.name"
                        loading="lazy"
                        class="h-6 w-6 rounded-full object-cover"
                    />
                    <span class="text-sm text-gray-600">{{
                        recipe.author.name
                    }}</span>
                </div>
                <div class="flex items-center gap-1 text-yellow-500">
                    <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                        />
                    </svg>
                    <span class="text-sm font-medium text-gray-700">{{
                        recipe.rating
                    }}</span>
                </div>
            </div>

            <!-- Action Button -->
            <button
                class="w-full rounded-lg px-4 py-2 font-medium text-white transition-all duration-200 hover:scale-105 hover:transform hover:opacity-90 bg-resepin-tomato"
                style="background-color: var(--resepin-tomato)"
                @click.stop="$emit('view-recipe', recipe)"
                aria-label="Lihat resep {{ recipe.title }}"
            >
                Lihat
            </button>
        </div>
    </div>
</template>

<script setup lang="ts">
interface Author {
    name: string;
    avatar: string;
}

interface Recipe {
    id: number;
    title: string;
    image: string;
    rating: number;
    author: Author;
}

defineProps<{
    recipe: Recipe;
}>();

defineEmits<{
    'view-recipe': [recipe: Recipe];
}>();
</script>

<style scoped>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
