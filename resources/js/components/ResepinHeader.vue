<template>
    <header class="border-b border-gray-200 bg-white shadow-sm">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <!-- Logo -->
                <div class="flex items-center gap-3">
                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-lg text-xl font-bold text-white"
                        style="background-color: var(--resepin-tomato)"
                    >
                        R
                    </div>
                    <h1 class="text-xl font-bold text-gray-900">Resepin</h1>
                </div>

                <!-- Navigation Menu -->
                <nav class="hidden space-x-8 md:flex">
                    <a
                        href="#"
                        class="rounded-md px-3 py-2 text-sm font-medium transition-colors"
                        :class="
                            activeMenu === 'home'
                                ? 'text-white'
                                : 'text-gray-700 hover:text-gray-900'
                        "
                        :style="
                            activeMenu === 'home'
                                ? 'background-color: var(--resepin-tomato)'
                                : ''
                        "
                        @click="$emit('menu-change', 'home')"
                    >
                        Home
                    </a>
                    <a
                        href="#"
                        class="rounded-md px-3 py-2 text-sm font-medium transition-colors"
                        :class="
                            activeMenu === 'community'
                                ? 'text-white'
                                : 'text-gray-700 hover:text-gray-900'
                        "
                        :style="
                            activeMenu === 'community'
                                ? 'background-color: var(--resepin-tomato)'
                                : ''
                        "
                        @click="$emit('menu-change', 'community')"
                    >
                        Komunitas
                    </a>
                </nav>

                <!-- User Profile -->
                <div class="flex items-center gap-4">
                    <button
                        class="rounded-full p-2 transition-colors hover:bg-gray-100"
                        @click="$emit('profile-click')"
                    >
                        <img
                            :src="user.avatar"
                            :alt="user.name"
                            class="h-8 w-8 rounded-full object-cover"
                        />
                    </button>
                </div>
            </div>
        </div>
    </header>
</template>

<script setup lang="ts">
interface User {
    name: string;
    avatar: string;
}

defineProps<{
    user: User;
    activeMenu?: string;
}>();

defineEmits<{
    'menu-change': [menu: string];
    'profile-click': [];
}>();
</script>
