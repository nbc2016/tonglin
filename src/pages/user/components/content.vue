<template>
  <div class="content">
    <div class="title">
        <router-link class="tip" to="/user/login">登录&nbsp;&nbsp;</router-link>
        ·
        <router-link class="tip" to="/user/regist">&nbsp;&nbsp;注册</router-link>
    </div>
    <router-view/>
  </div>
</template>

<script>
import Login from './login'
import Regist from './regist'
export default {
  name: 'UserContent',
  components: {
    Login,
    Regist
  }
}
</script>

<style lang="less" scoped>
  .light {
    color: #444 !important;
  }
  .content {
    width: 1024px;
    height: 450px;
    border-top: 1px solid #ccc;
    margin: 0 auto;
    margin-top: 200px;
    .title {
      width: 200px;
      height: 70px;
      line-height: 70px;
      text-align: center;
      font-size: 26px;
      font-weight: bold;
      color: #444;
      background-color: #fff;
      margin: 0 auto;
      position: relative;
      top: -35px;
      .tip {
        color: #ccc;
      }
    }
  }
</style>
