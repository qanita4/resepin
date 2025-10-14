<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Test - Tambah Resep" />
  
  <div class="min-h-screen bg-orange-50 p-8">
    <div class="max-w-4xl mx-auto">
      <h1 class="text-3xl font-bold text-gray-900 mb-4">
        Halaman Tambah Resep
      </h1>
      <p class="text-gray-600 mb-8">
        Ini adalah halaman untuk menambah resep baru.
      </p>
      
      <div class="bg-white rounded-lg p-6 shadow-md">
        <h2 class="text-xl font-semibold mb-4">Form Tambah Resep</h2>
        <p class="text-gray-600">
          Form akan ditampilkan di sini...
        </p>
        
        <div class="mt-6">
          <a 
            href="/dashboard" 
            class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition-colors"
          >
            Kembali ke Dashboard
          </a>
        </div>
      </div>
    </div>
  </div>
</template>