<template>
  <div class="admin-container">
    <h1>Add Product</h1>

    <form @submit.prevent="submitProduct">
      <input v-model="form.name" placeholder="Product Name" required />
      <input v-model="form.description" placeholder="Description" />
      <input v-model="form.price" type="number" placeholder="Price" required />
      <input v-model="form.stock" type="number" placeholder="Stock" required />
      <input v-model="form.sku" placeholder="SKU" required />
      <input v-model="form.image" placeholder="Image URL" />
      <input v-model="form.category_id" type="number" placeholder="Category ID" required />

      <button type="submit">Save Product</button>
    </form>

    <p v-if="message">{{ message }}</p>
  </div>
</template>

<script setup>
import { reactive, ref } from 'vue'
import axios from 'axios'

const message = ref('')

const form = reactive({
  name: '',
  description: '',
  price: '',
  stock: '',
  sku: '',
  image: '',
  category_id: ''
})

const submitProduct = async () => {
  try {
    await axios.post('/api/products', form)

    message.value = 'Product saved successfully!'

    form.name = ''
    form.description = ''
    form.price = ''
    form.stock = ''
    form.sku = ''
    form.image = ''
    form.category_id = ''
  } catch (error) {
    console.error(error)
    message.value = 'Error saving product'
  }
}
</script>

<style>
.admin-container {
  max-width: 500px;
  margin: 40px auto;
  font-family: Arial;
}

input {
  width: 100%;
  padding: 12px;
  margin-bottom: 12px;
}

button {
  padding: 12px 20px;
  cursor: pointer;
}
</style>