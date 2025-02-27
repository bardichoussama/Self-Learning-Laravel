<template>
    <div>
        <h1>Products list</h1>
        <ul>
            <li v-for="product in products" :key="product.id">
                {{ product.name }} - ${{ product.price }}
                <button 
          @click="deleteProduct(product.id)" 
          class="mt-2 bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
        >
          Delete
        </button>
            </li>
        </ul>

        <div>
            <form @submit.prevent="addProduct" class="mb-8">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Name</label>
                        <input v-model="newProduct.name" type="text"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea v-model="newProduct.description"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Price</label>
                        <input v-model.number="newProduct.price" type="number" step="0.01"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Add Product
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import apiClient from '../axios';

const products = ref([]);
const newProduct = ref({
    name: '',
    description: '',
    price: ''
})

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
        await apiClient.post('/products', newProduct.value)
        await getProducts()
        newProduct.value = { name: '', description: '', price: '' }
    } catch (error) {
        console.error('Error adding product:', error)
    }
}

const deleteProduct = async (id) => {
    try {
        await apiClient.delete(`/products/${id}`)
        await getProducts()
    } catch (error) {
        console.error('Error deleting product:', error)
    }
}


</script>