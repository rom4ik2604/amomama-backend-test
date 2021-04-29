<template>
  <el-container>
    <el-header>
      <div style="margin-top: 15px;">
        <el-input placeholder="Enter text" v-model="input" @keyup.enter.native="search" class="input-with-select">
          <el-button slot="append" icon="el-icon-search" @click="search"></el-button>
        </el-input>
      </div>
    </el-header>
    <el-main>
      <clients :clients="clients" :loading="!loaded"></clients>
    </el-main>
  </el-container>
</template>

<script>
import links from '../linsk';
import Clients from "./Clients";

export default {
  name: "Home",
  components: {Clients},
  data() {
    return {
      input: '',
      clients: [],
      loaded: false
    }
  },
  methods: {
    search() {
      this.loaded = false;
      this.searchClients().then((response) => {
        this.clients = response;
        this.loaded = true;
      })
    },
    async getClients() {
      return (await fetch(links.all)).json()
    },
    async searchClients() {
      return (await fetch(links.search + this.input)).json()
    }
  },
  created() {
    this.loaded = false;
    this.getClients().then((response) => {
      this.clients = response;
      this.loaded = true;
    })
  }
}
</script>

<style>

</style>