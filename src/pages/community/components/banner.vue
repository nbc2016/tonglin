<template>
  <div class="banner">
    <div class="pic"></div>
    <div class="nav">
      <el-breadcrumb separator-class="el-icon-arrow-right">
        <el-breadcrumb-item :to="{ path: '/' }">首页</el-breadcrumb-item>
        <el-breadcrumb-item :to="{path: '/community'}">校园话题</el-breadcrumb-item>
      </el-breadcrumb>
    </div>
    <div class="info_release">
      <div class="left fl">
        <h1>校园话题</h1>
        <p class="txt-one">这是一个属于我们自己的交流平台，您可以在这里分享您感兴趣的话题，但也要注意不当的言行哦。(＾－＾)~</p>
      </div>
      <el-row class="fr">
        <el-button type="danger" @click="$router.push('./share/community')">分享</el-button>
      </el-row>
    </div>
  </div>
</template>
<script>
export default {
  name: 'CommunityBanner'
}
</script>
<style lang="less" scoped>
  .pic {
    height: 300px;
    background: url('../../../assets/images/banner.jpg') center;
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
