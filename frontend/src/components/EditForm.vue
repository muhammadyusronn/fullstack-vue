<template>
  <div>
    <h1 class="title">Update Product</h1>
    <form @submit.prevent="updateProduct">
      <div class="field">
        <label for="title" class="label">Title Product</label>
        <div class="control">
          <input
            type="text"
            v-model="title"
            class="input"
            placeholder="Title Product"
          />
        </div>
      </div>
      <div class="field">
        <label for="price" class="label">Price Product</label>
        <div class="control">
          <input
            type="text"
            v-model="price"
            class="input"
            placeholder="Price Product"
          />
        </div>
      </div>
      <div class="field">
        <div class="control">
          <button class="button is-primary">Update</button>
          <router-link
            :to="{ name: 'ProductList' }"
            class="button is-warning ml-2"
            >Back</router-link
          >
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "EditForm",
  data() {
    return {
      title: "",
      price: "",
    };
  },
  created() {
    this.getProductById();
  },
  methods: {
    async getProductById() {
      try {
        const response = await axios.get(
          `product/detail/${this.$route.params.id_products}`
        );
        this.title = response.data.title;
        this.price = response.data.price;
      } catch (error) {
        console.log(error);
      }
    },
    async updateProduct() {
      try {
        await axios.put(`product/update/${this.$route.params.id_products}`, {
          title: this.title,
          price: this.price,
        });
        (this.title = ""), (this.price = ""), this.$router.push("/");
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>

<style>
</style>