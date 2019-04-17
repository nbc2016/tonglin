<template>
  <div class="regist">
    <form action="">
      <ul>
          <li><span class="iconfont icon-youxiang"></span><input type="text" placeholder="邮箱" name="email" v-model="userInfo.email" /><br/></li>
          <li><span class="iconfont icon-aixin"></span><input type="text" placeholder="用户名" name="username" v-model="userInfo.username" /><br/></li>
          <li><span class="iconfont icon-mimaffffffpx"></span><input type="password" placeholder="密码" name="password" v-model="userInfo.password"/><br/> </li>
          <input class="submit" type="button" value="提交" @click="register" /><br><br>
      </ul>
    </form>
  </div>
</template>

<script>
import qs from 'qs'
export default {
  name: 'Regist',
  data () {
    return {
      userInfo: {
        email: '',
        username: '',
        password: ''
      }
    }
  },
  methods: {
    register () {
      this.$http.post('http://localhost:80/school/api/register.php', qs.stringify(this.userInfo)).then((res) => {
        const {code, msg} = res.data
        if (code === 1) {
          this.$router.push('/')
        } else {
          this.$message.error(msg)
        }
      })
    }
  }
}
</script>

<style lang="less" scoped>
  .regist {

    ul li {
      width: 302px;
      height: 52px;
      margin: 0 auto;
      margin-top: 20px;
      border: 1px solid #60BFBF;
      border-radius: 5px;
      overflow: hidden;
      span {
        width: 50px;
        height: 51px;
        background-color: #60BFBF;
        line-height: 50px;
        text-align: center;
        float: left;
        color: #fff;
      }
      input {
        width: 250px;
        height: 50px;
        float: right;
        border: 0px;
        font-size: 14px;
        outline-style: none;
        padding-left: 20px;
      }
    }
    .submit {
      display: block;
      width: 302px;
      height: 50px;
      margin: 0 auto;
      margin-top: 20px;
      color: #fff;
      font-size: 20px;
      border-radius: 5px;
      border: 0px;
      outline-style: none;
      background-color: #60BFBF;
    }
    .submit:hover {
      background-color: #009966;
    }
  }
</style>
