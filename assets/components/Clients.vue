<template>
  <el-table
      :data="clients"
      stripe
      style="width: 100%"
      v-loading="loading"
      :default-sort = "{prop: 'firstName', order: 'ascending'}">
    <el-table-column
        type="index"
        width="50">
    </el-table-column>
    <el-table-column
        prop="firstName"
        label="First name"
        sortable
        width="300">
    </el-table-column>
    <el-table-column
        prop="lastName"
        label="Last name"
        sortable
        width="300">
    </el-table-column>
    <el-table-column
        label="Phone numbers"
        align="right">
      <template slot-scope="scope">
        <span style="margin-left: 10px">{{ scope.row.phoneNumbers.join(' | ') }}</span>
      </template>
    </el-table-column>
  </el-table>
</template>

<script>
export default {
  name: "Clients",
  props: ['clients', 'loading']
}
</script>

<style>

</style>