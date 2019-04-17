<template>
  <div class="banner">
    <div class="pic"></div>
    <div class="nav">
      <el-breadcrumb separator-class="el-icon-arrow-right">
        <el-breadcrumb-item :to="{ path: '/' }">首页</el-breadcrumb-item>
        <el-breadcrumb-item :to="{path: '/find'}">寻物启事</el-breadcrumb-item>
      </el-breadcrumb>
    </div>
    <div class="info_release">
      <div class="left fl">
        <h1>寻物启事</h1>
        <p class="txt-one">在这里你可以查看最新的寻物信息;在这里你也可以发布最新的寻物启事信息，但确保信息的真实性;</p>
      </div>
      <el-row class="fr">
        <el-button type="danger" @click="$router.push('/release/find')">发布</el-button>
      </el-row>
    </div>
  </div>
</template>
<script>
export default {
  name: 'FindBanner'
}
</script>
<style lang="less" scoped>
  .pic {
    height: 300px;
    background: url('../../../assets/images/school_info_img.jpg') center;
  }
  .nav {
    width: 1024px;
    height: 40px;
    margin: 0 auto;
    margin-top: 35px;
    background-color: #fff;
    border: 1px solid #ccc;
    .el-breadcrumb {
      width: 100%;
      height: 40px;
      padding-left: 30px;
      font-size: 16px;
      line-height: 40px;
    }
  }
  .info_release {
    width: 1024px;
    height: 100px;
    margin: 0 auto;
    margin-top: 40px;
    padding: 20px;
    background-color: rgb(219, 219, 219);
    h1 {
      line-height: 34px;
      color: #F56C6C;
    }
    p {
      font-size: 14px;
      font-weight: bold;
      line-height: 28px;
    }
    .fr {
      margin-top: 10px;
    }
  }
</style>
