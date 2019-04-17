a<template>
  <div class="detail">
    <div class="header">
      <div class="main clearfix">
        <div class="top">
          <router-link to="/" exact><div class="logo fl"></div></router-link>
          <h1>{{title}}详情</h1>
        </div>
      </div>
    </div>
    <div class="banner">
      <div class="nav">
        <el-breadcrumb separator-class="el-icon-arrow-right">
          <el-breadcrumb-item :to="{ path: '/' }">首页</el-breadcrumb-item>
          <el-breadcrumb-item :to="{path: path}">{{title}}</el-breadcrumb-item>
          <el-breadcrumb-item>详情内容</el-breadcrumb-item>
        </el-breadcrumb>
      </div>
    </div>
    <div class="mains">
      <router-view/>
    </div>
    <div class="footer">
      <div class="main">
        <div class="fl">
          <h1>铜陵学院互动平台</h1>
          <p>铜陵学院互动平台立志为同学们提供最便捷的校园生活服务;</p>
          <p>网站由铜陵学院数学与计算机学院物联网工程木木同学开发, </p>
          <p>非常欢迎有兴趣的同学前来加入，</p>
          <p>大家一起进步！</p>
        </div>
        <div class="fr">
          <p>QQ :&nbsp;&nbsp;1234567890</p>
          <div class="link">
            友情链接 :&nbsp;&nbsp;<a href="http://www.tlu.edu.cn/" target="_blank">铜陵学院官网</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Message',
  data () {
    return {
      title: '',
      path: ''
    }
  },
  methods: {
    initall () {
      let path = this.$route.path.split('/')
      path = '/' + path[1] + '/' + path[2]
      switch (path) {
        case '/message/lost':
          this.title = '失物招领'
          this.path = '/lost'
          break
        case '/message/find':
          this.title = '寻物启事'
          this.path = '/find'
          break
        case '/message/essay':
          this.title = '文章随笔'
          this.path = '/essay'
          break
        case '/message/community':
          this.title = '校园话题'
          this.path = '/community'
          break
        case '/message/study':
          this.title = '学习分享'
          this.path = '/study'
          break
        default:
          break
      }
    }
  },
  watch: {
    $route (to) {
      let path = to.path.split('/')
      path = '/' + path[1] + '/' + path[2]
      switch (path) {
        case '/message/lost':
          this.title = '失物招领'
          this.path = '/lost'
          break
        case '/message/find':
          this.title = '寻物启事'
          this.path = '/find'
          break
        case '/message/essay':
          this.title = '文章随笔'
          this.path = '/essay'
          break
        case '/message/community':
          this.title = '校园话题'
          this.path = '/community'
          break
        case '/message/study':
          this.title = '学习分享'
          this.path = '/study'
          break
        default:
          break
      }
    }
  },
  created () {
    this.initall()
  }

}
</script>

<style scoped lang="less">
  .mains {
    margin-top: 20px;
  }
  .header {
    width: 100%;
    height: 80px;
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
          margin-right: 220px;
          background: url('../../assets/images/logo.png');
          background-size: contain;
        }
        h1 {
          line-height: 80px;
          font-weight: normal;
          font-family: "楷体";
          color: #fff;
          font-size: 38px;
        }
      }
    }
  }
  .banner .nav {
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
  .footer {
    width: 100%;
    height: 180px;
    background-color: #1b9a9e;
    margin-top: 40px;
    padding-top: 25px;
    .main {
      width: 1024px;
      height: 150px;
      margin: 0 auto;
      padding-right: 60px;
      color: #fff;
      h1 {
        line-height: 40px;
      }
      p {
        line-height: 24px;
        font-weight: bold;
        font-size: 14px;
      }
      .fr {
        margin-top: 40px;
        .link {
          line-height: 36px;
          font-size: 14px;
          a {
            color: #fff;
            font-weight: bold;
          }
          a:hover {
            color: #fd2626;
          }
        }
      }
    }
  }
</style>
