<template>
  <div class="header">
    <div class="main clearfix">
      <router-link to="/" exact><div class="logo fl"></div></router-link>
      <ul class="list">
        <li><router-link to="/lost">失物招领</router-link></li>
        <li><router-link to="/find">寻物启事</router-link></li>
        <li><router-link to="/community">校园话题</router-link></li>
        <li><router-link to="/essay">文章/随笔</router-link></li>
        <li><router-link to="/study">学习分享</router-link></li>

      </ul>
      <div class="login fl">
        <div class="user" @click="handelClick">
          <img :src="user.img" alt="">
        </div>
        <ul class="clearfix"  :style="{height:height+'px'}" v-show="!user.username">
          <router-link to="/user/login"><li>登录</li></router-link>
          <router-link to="/user/regist"><li>注册</li></router-link>
          <router-link to="/our"><li>关于我们</li></router-link>
        </ul>
        <ul class="clearfix"  :style="{height:height+'px'}" v-show="user.username">
          <router-link to="/user"><li>个人中心</li></router-link>
          <router-link to="/"><li @click="loginout">退出登录</li></router-link>
          <router-link to="/our"><li>关于我们</li></router-link>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'HomeHeader',
  data () {
    return {
      height: 0,
      user: {
        username: '',
        img: 'http://localhost/school/uploads/login.jpg'
      }
    }
  },
  methods: {
    handelClick: function () {
      this.height = this.height === 0 ? 150 : 0
    },
    getuser () {
      this.$http.get('http://localhost:80/school/api/getuser.php').then((res) => {
        const {user, code} = res.data
        if (code === 1) {
          this.user = user
        }
      })
    },
    loginout () {
      this.$http.get('http://localhost:80/school/api/loginout.php')
      this.user = {
        username: '',
        img: 'http://localhost/school/uploads/login.jpg'
      }
    }
  },
  mounted () {
    this.getuser()
  }
}
</script>

<style lang="less" scoped>
  .header {
    width: 100%;
    height: 100px;
    background-color: #1b9a9e;
    .main {
      width: 1024px;
      height: 100px;
      margin: 0 auto;
      .logo {
        width: 282px;
        height: 83px;
        margin-top: 8px;
        margin-right: 50px;
        background: url('../../../assets/images/logo.png')
      }
      .list li {
        float: left;
        height: 100px;
        margin: 0 5px;
        text-align: center;
        a {
          display: block;
          padding: 0 8px;
          height: 38px;
          line-height: 36px;
          margin-top: 35px;
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
      .login {
        width: 150px;
        height: 100px;
        margin-right: 0;
        position: relative;

        .user {
          height: 100px;
          img {
            position: absolute;
            top: 25px;
            left: 50px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
          }
        }
        ul {
          position: absolute;
          left: 0;
          top: 100px;
          z-index: 2;
          overflow: hidden;
          transition: all .8s;
          a {
           display: block;
           width: 150px;
           height: 50px;
           line-height: 50px;
           text-align: center;
           color: #fff;
           font-size: 16px;
           background-color: #1b9a9e;
         }
        }
      }
    }
  }
</style>
