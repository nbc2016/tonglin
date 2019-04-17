<template>
  <div>
    <div class="nav">
      <el-breadcrumb separator-class="el-icon-arrow-right">
        <el-breadcrumb-item :to="{ path: '/' }">首页</el-breadcrumb-item>
        <el-breadcrumb-item :to="{path: '/community'}">校园话题</el-breadcrumb-item>
        <el-breadcrumb-item>分享话题</el-breadcrumb-item>
      </el-breadcrumb>
    </div>
  </div>
</template>
<script>
export default {
  name: 'ShareCommunity'
}
</script>
<style lang="less" scoped>
  .nav {
    width: 100%;
    height: 40px;
    margin-top: 35px;
    background-color: #fff;
    border: 1px solid #ccc;
    // border-bottom: 1px solid #ccc;
    .el-breadcrumb {
      width: 1024px;
      height: 40px;
      padding-left: 30px;
      font-size: 16px;
      line-height: 40px;
      margin: 0 auto;
    }
  }
</style>
