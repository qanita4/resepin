<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

// Simple form data
const form = ref({
  title: '',
  description: '',
  cookingTime: ''
});

const isSubmitting = ref(false);

// Submit form
const submitRecipe = async () => {
  isSubmitting.value = true;
  
  try {
    if (!form.value.title || !form.value.description || !form.value.cookingTime) {
      alert('Mohon lengkapi semua field yang wajib diisi');
      return;
    }
    
    alert('Resep berhasil ditambahkan!');
    console.log('Recipe data:', form.value);
    
    // Reset form
    form.value.title = '';
    form.value.description = '';
    form.value.cookingTime = '';
    
  } catch (error) {
    console.error('Error:', error);
    alert('Terjadi kesalahan');
  } finally {
    isSubmitting.value = false;
  }
};

// Go back to dashboard
const goBack = () => {
  window.location.href = '/dashboard';
};
</script>

<template>
  <Head title="Tambah Resep - Resepin" />
  
  <div class="min-h-screen bg-orange-50">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-gray-200">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
          <div class="flex items-center gap-4">
            <!-- Back Button -->
            <button 
              @click="goBack"
              class="p-2 rounded-lg hover:bg-gray-100 transition-colors"
            >
              <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
              </svg>
            </button>
            
            <!-- Logo -->
            <div class="flex items-center gap-3">
              <div class="w-10 h-10 rounded-lg bg-red-500 flex items-center justify-center text-white font-bold text-xl">
                R
              </div>
              <h1 class="text-xl font-bold text-gray-900">Resepin</h1>
            </div>
          </div>
          
          <h2 class="text-lg font-semibold text-gray-900">Tambah Resep Baru</h2>
        </div>
      </div>
    </header>
    
    <!-- Main Content -->
    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
      <div class="bg-white rounded-xl shadow-md p-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Form Tambah Resep</h2>
        
        <form @submit.prevent="submitRecipe" class="space-y-6">
          
          <!-- Recipe Title -->
          <div>
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
              Nama Resep *
            </label>
            <input
              id="title"
              v-model="form.title"
              type="text"
              required
              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
              placeholder="Contoh: Nasi Goreng Seafood Spesial"
            />
          </div>
          
          <!-- Recipe Description -->
          <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
              Deskripsi Resep *
            </label>
            <textarea
              id="description"
              v-model="form.description"
              required
              rows="4"
              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
              placeholder="Ceritakan tentang resep ini, apa yang membuatnya istimewa..."
            ></textarea>
          </div>
          
          <!-- Waktu Memasak -->
          <div>
            <label for="cookingTime" class="block text-sm font-medium text-gray-700 mb-2">
              Waktu Memasak (menit) *
            </label>
            <input
              id="cookingTime"
              v-model="form.cookingTime"
              type="number"
              required
              min="1"
              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
              placeholder="30"
            />
          </div>
          
          <!-- Submit Buttons -->
          <div class="flex gap-4 pt-6">
            <button
              type="button"
              @click="goBack"
              class="flex-1 py-3 px-4 border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-50 transition-colors"
            >
              Batal
            </button>
            <button
              type="submit"
              :disabled="isSubmitting"
              class="flex-1 py-3 px-4 bg-red-500 text-white rounded-lg font-medium hover:bg-red-600 transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
            >
              {{ isSubmitting ? 'Menyimpan...' : 'Simpan Resep' }}
            </button>
          </div>
        </form>
      </div>
    </main>
  </div>
</template>