<template>
  <div>
    <h1 class="title">Product List</h1>
    <router-link :to="{ name: 'AddProduct' }" class="button is-primary"
      >Add New</router-link
    >
    <table class="table is-striped is-fullwidth">
      <thead>
        <tr>
          <th>Title</th>
          <th>Price</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="product in products" :key="product.id_products">
          <td>{{ product.title }}</td>
          <td>{{ product.price }}</td>
          <td>
            <router-link
              :to="{
                name: 'EditProduct',
                params: { id_products: product.id_products },
              }"
              class="button is-info is-small mr-2"
              >Edit</router-link
            >
            <button
              class="button is-danger is-small"
              @click="deleteProduct(product.id_products)"
            >
              Delete
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "Product",
  data() {
    return {
      products: [],
    };
  },
  created() {
    this.getProducts();
  },
  methods: {
    async getProducts() {
      try {
        const response = await axios.get("product");
        this.products = response.data;
      } catch (error) {
        console.log(error);
      }
    },
    async deleteProduct(id) {
      try {
        await axios.delete(`product/drop/${id}`);
        this.getProducts();
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>

<style>
</style>