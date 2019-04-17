<template>
  <div class="header">
    <div class="main clearfix">
      <router-link to="/"><div class="logo fl"></div></router-link>
      <h1 class="fl">欢迎同学们加入铜陵学院互动平台!</h1>
    </div>
  </div>
</template>

<script>
export default {
  name: 'UserHeader'
}
</script>

<style lang="less" scoped>
  .header {
    width: 100%;
    height: 80px;
    background-color: #009999;
    .main {
      width: 1024px;
      height: 100px;
      margin: 0 auto;
      .logo {
        width: 200px;
        height: 60px;
        margin-top: 10px;
        margin-right: 100px;
        background: url('../../../assets/images/logo.png');
        background-size: contain;
      }
      h1 {
        line-height: 80px;
        color: #fff;
        font-size: 32px;
        font-family: '楷体';
      }
    }
  }
</style>
