<template>
  <div class="header">
    <div class="main clearfix">
      <div class="top">
        <router-link to="/" exact><div class="logo fl"></div></router-link>
        <ul class="list clearfix">
          <li><router-link to="/share/community">分享话题</router-link></li>
          <li><router-link to="/share/essay">发表文章</router-link></li>
          <li><router-link to="/share/study">分享学习</router-link></li>
        </ul>
      </div>
      <div class="bottom">
        <router-view/>
      </div>
    </div>
  </div>
</template>
<script>

export default {
  name: 'ShareHeader'
}
</script>
<style lang="less" scoped>
  .header {
    width: 100%;
    height: 200px;
    .main {
      width: 100%;
      height: 80px;
      background-color: #60BFBF;
      .top {
        width: 1024px;
        margin: 0 auto;
        .logo {
          width: 200px;
          height: 60px;
          margin-top: 10px;
          margin-right: 80px;
          background: url('../../../assets/images/logo.png');
          background-size: contain;
        }
        .list li {
          float: left;
          height: 80px;
          margin: 0 20px;
          text-align: center;
          a {
            display: block;
            padding: 0 8px;
            height: 38px;
            line-height: 36px;
            margin-top: 25px;
            border-radius: 5px;
            color: #fff;
            font-size: 20px;
            font-weight:bold;
          }
          a:hover,
          a.light {
            background-color: #0b717a;
          }
        }
      }
    }
    .bottom {
      width: 1024px;
      margin: 0 auto;
    }
  }
</style>
