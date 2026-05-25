<template>
  <div class="dashboard-wrapper">
    <!-- Sidebar -->
    <aside class="sidebar">
      <div class="logo">KUVUO Admin</div>

      <nav class="nav-menu">
        <a href="#">Dashboard</a>
        <a href="#" class="active">Products</a>
        <a href="#">Import Products</a>
        <a href="#">Orders</a>
        <a href="#">Customers</a>
        <a href="#">Reports</a>
        <a href="#">Settings</a>
      </nav>
    </aside>

    <!-- Main -->
    <main class="main-content">
      <!-- Header -->
      <div class="header">
        <div>
          <h1>Products Management</h1>
          <p>Manage heavy machinery inventory professionally</p>
        </div>

        <div class="header-actions">
          <button class="import-btn">📁 Import Products</button>
          <button class="save-btn">+ Add Product</button>
        </div>
      </div>

      <!-- Form Grid -->
      <div class="form-grid">

        <!-- Basic Info -->
        <div class="card">
          <h2>Basic Information</h2>

          <input v-model="form.name" placeholder="Product Name" />
          <input v-model="form.sku" placeholder="SKU" />

          <select v-model="form.category">
            <option disabled value="">Select Category</option>
            <option>Mini Excavator</option>
            <option>Excavator</option>
            <option>Road Roller</option>
            <option>Wheel Loader</option>
            <option>Skid Steer Loader</option>
            <option>Forklift</option>
            <option>Scissor Lift</option>
            <option>Boom Lift</option>
            <option>Attachments</option>
            <option>Spare Parts</option>
          </select>
        </div>

        <!-- Pricing -->
        <div class="card">
          <h2>Pricing & Inventory</h2>

          <input v-model="form.price" type="number" placeholder="Price" />
          <input v-model="form.stock" type="number" placeholder="Stock" />

          <select v-model="form.availability">
            <option>In Stock</option>
            <option>Out of Stock</option>
            <option>Pre Order</option>
          </select>
        </div>

        <!-- Media -->
        <div class="card full-width">
          <h2>Product Media</h2>

          <input type="file" />

          <div class="upload-box">
            Upload machinery image here
          </div>
        </div>

        <!-- Description -->
        <div class="card full-width">
          <h2>Description</h2>

          <textarea
            v-model="form.description"
            placeholder="Enter product description..."
          ></textarea>
        </div>

        <!-- Save -->
        <div class="full-width action-row">
          <button class="save-btn big-btn">Save Product</button>
        </div>

      </div>
    </main>
  </div>
</template>

<script setup>
import { reactive } from 'vue'

const form = reactive({
  name: '',
  sku: '',
  category: '',
  price: '',
  stock: '',
  availability: 'In Stock',
  description: ''
})
</script>

<style scoped>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial, sans-serif;
}

.dashboard-wrapper {
  display: flex;
  min-height: 100vh;
  background: #f6f7f3;
}

/* Sidebar */
.sidebar {
  width: 260px;
  background: #5d694c;
  color: white;
  padding: 30px;
}

.logo {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 40px;
}

.nav-menu {
  display: flex;
  flex-direction: column;
  gap: 18px;
}

.nav-menu a {
  color: white;
  text-decoration: none;
  padding: 12px 14px;
  border-radius: 12px;
  transition: 0.3s;
}

.nav-menu a:hover,
.nav-menu .active {
  background: rgba(255,255,255,0.15);
}

/* Main */
.main-content {
  flex: 1;
  padding: 40px;
}

.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 35px;
}

.header h1 {
  margin: 0;
  font-size: 32px;
  color: #1f1f1f;
}

.header p {
  color: #777;
  margin-top: 8px;
}

.header-actions {
  display: flex;
  gap: 12px;
}

.import-btn {
  background: white;
  color: #5d694c;
  border: 1px solid #d9ddd1;
  padding: 12px 18px;
  border-radius: 14px;
  cursor: pointer;
  font-weight: 600;
}

.save-btn {
  background: #5d694c;
  color: white;
  border: none;
  padding: 12px 18px;
  border-radius: 14px;
  cursor: pointer;
  font-weight: 600;
}

/* Cards */
.form-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 24px;
}

.card {
  background: white;
  padding: 28px;
  border-radius: 20px;
  box-shadow: 0 10px 30px rgba(0,0,0,0.05);
}

.card h2 {
  margin-bottom: 18px;
  color: #1f1f1f;
}

.full-width {
  grid-column: span 2;
}

input,
select,
textarea {
  width: 100%;
  padding: 14px;
  margin-bottom: 14px;
  border: 1px solid #ddd;
  border-radius: 12px;
  font-size: 15px;
}

textarea {
  min-height: 140px;
  resize: none;
}

.upload-box {
  padding: 50px;
  border: 2px dashed #d8ddcf;
  border-radius: 16px;
  text-align: center;
  color: #888;
}

.action-row {
  text-align: right;
}

.big-btn {
  padding: 14px 28px;
}
</style>