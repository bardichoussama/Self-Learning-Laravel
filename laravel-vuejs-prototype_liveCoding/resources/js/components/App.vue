<template>
    <div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-bold mb-4">Products List</h1>
        <ul class="space-y-3">
            <li v-for="product in products" :key="product.id" class="p-4 bg-gray-100 rounded flex justify-between items-center">
                <div>
                    <h2 class="text-lg font-semibold">{{ product.name }}</h2>
                    <p class="text-gray-600">{{ product.description }}</p>
                    <p class="text-green-500 font-bold">${{ product.price }}</p>
                </div>
                <button 
                    @click="deleteProduct(product.id)" 
                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                >
                    Delete
                </button>
            </li>
        </ul>

        <button @click="showModal = true" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Add Product
        </button>
    
        <!-- Modal -->
        <div v-if="showModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                <h2 class="text-xl font-bold mb-4">Add Product</h2>
                <form @submit.prevent="addProduct" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Name</label>
                        <input v-model="newProduct.name" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea v-model="newProduct.description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Price</label>
                        <input v-model.number="newProduct.price" type="number" step="0.01" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button type="button" @click="showModal = false" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                            Cancel
                        </button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Add
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import apiClient from '../axios';

const products = ref([]);
const showModal = ref(false);
const newProduct = ref({ name: '', description: '', price: '' });

onMounted(async () => {
    getProducts();
});

const getProducts = async () => {
    try {
        const response = await apiClient.get('/products');
        products.value = response.data;
    } catch (err) {
        console.error('Error fetching products:', err);
    }
};

const addProduct = async () => {
    try {
        await apiClient.post('/products', newProduct.value);
        await getProducts();
        newProduct.value = { name: '', description: '', price: '' };
        showModal.value = false;
    } catch (error) {
        console.error('Error adding product:', error);
    }
};

const deleteProduct = async (id) => {
    try {
        await apiClient.delete(`/products/${id}`);
        await getProducts();
    } catch (error) {
        console.error('Error deleting product:', error);
    }
};
</script>
