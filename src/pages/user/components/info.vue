<template>
  <div class="userinfo clearfix">
    <p class="title">个人中心</p>
    <div class="left fl">
      <img :src="user.img" alt="">
      <label for="avatar">点击修改头像</label>
      <input class="file" name="avatar" type="file" id="avatar" accept="image/png,image/gif,image/jpeg" @change="update"/>

    </div>
    <div class="right fr">
      <div class="email clearfix">
        <p class="fl">邮箱: </p>
        <el-input
          v-model="user.email"
          :disabled="true"></el-input>
      </div>
      <div class="name">
        用户名: <span v-show="flag">{{user.username}}</span>
      </div>
      <el-input v-model="username" v-show="!flag"></el-input>
      <el-button type="primary" v-show="flag" @click="flag = !flag">修改用户名</el-button>
      <div class="change">
        <el-button type="warning" v-show="!flag" @click="changename">确认修改</el-button>
        <el-button type="info" v-show="!flag" @click="giveup">放弃修改</el-button>
      </div>
      <el-button type="danger" plain v-show="!passwordflag" @click="passwordflag = !passwordflag">修改密码</el-button>
      <div class="change" v-show="passwordflag">
        旧密码:
        <el-input v-model="pwd.oldpassword"></el-input>
        新密码:
        <el-input v-model="pwd.newpassword"></el-input>
        <el-button type="warning"  @click="changepwd">确认修改</el-button>
        <el-button type="info"  @click="giveuppwd">放弃修改</el-button>
      </div>
    </div>
  </div>
</template>
<script>
import qs from 'qs'
export default {
  name: 'Info',
  data () {
    return {
      user: {
        img: '',
        email: '',
        username: ''
      },
      username: '',
      flag: true,
      passwordflag: false,
      pwd: {
        oldpassword: '',
        newpassword: ''
      }
    }
  },
  methods: {
    update (e) {
      let file = e.target.files[0]
      let param = new FormData()
      param.append('avatar', file)
      this.$http.post('http://localhost:80/school/api/userchange.php', param).then(res => {
        const {code} = res.data
        if (code === 1) {
          this.$message({
            message: '修改头像成功',
            type: 'success',
            duration: 800
          })
          this.user.img = res.data.img
        } else {
          this.$message.error('修改头像失败')
        }
      })
    },
    getUserInfo () {
      this.$http.get('http://localhost:80/school/api/userinfo.php').then(res => {
        const {code} = res.data
        if (code === 1) {
          this.user.img = res.data.user.img
          this.user.email = res.data.user.email
          this.user.username = res.data.user.username
          this.username = res.data.user.username
        } else {
          this.$router.push('/user/login')
        }
      })
    },
    changename () {
      this.$http.post('http://localhost:80/school/api/userchange.php', qs.stringify({username: this.username})).then(res => {
        const {code} = res.data
        this.flag = true
        if (code === 1) {
          this.$message({
            message: '修改用户名成功',
            type: 'success'
          })
          this.user.username = this.username
        } else {
          this.$message.error('修改用户名失败')
          this.username = this.user.username
        }
      })
    },
    giveup () {
      this.username = this.user.username
      this.flag = true
    },
    changepwd () {
      this.$http.post('http://localhost:80/school/api/userchange.php', qs.stringify(this.pwd)).then(res => {
        const {code} = res.data
        this.passwordflag = false
        this.pwd.newpassword = ''
        this.pwd.oldpassword = ''
        if (code === 1) {
          this.$message({
            message: '修改密码成功',
            type: 'success'
          })
        } else {
          this.$message.error('修改密码失败')
        }
      })
    },
    giveuppwd () {
      this.passwordflag = false
      this.pwd.newpassword = ''
      this.pwd.oldpassword = ''
    }
  },
  mounted () {
    this.getUserInfo()
  }
}
</script>

<style scoped lang="less">
  .userinfo {
    width: 1024px;
    background-color: rgb(210, 233, 231);
    border-radius: 10px;
    padding: 20px 50px 30px;
    margin: 100px auto;
    margin-bottom: 150px;
    .title {
      line-height: 60px;
      font-size: 30px;
      text-align: center;
      color: #1b9a9e;
      margin-bottom: 60px;
      border-bottom: 2px solid #3fa8ac;
    }
    .left {
      width: 340px;
      height: 100%;
      text-align: center;
      img{
        width: 200px;
        height: 200px;
        border-radius: 50%;
        margin: 20px auto;
        margin-bottom: 60px;
        display: block;
      }
      label {
        line-height: 80px;
        padding: 10px 18px;
        font-size: 24px;
        color: #fff;
        border-radius: 10px;
        background-color:  rgb(95, 194, 194);
        cursor: pointer;
      }
      label:hover {
        background-color: rgb(76, 167, 167);
      }
      #avatar {
        display: none;
      }
    }
    .right {
      width: 560px;
      padding: 10px;
      height: 100%;
      font-size: 16px;
      .email {
        margin: 20px 0;
        p {
          font-weight: bold;
          margin-top: 20px;
        }
        .el-input {
          width: 480px;
          float: right;
        }
      }
      .name {
        line-height: 30px;
        font-weight: bold;
        margin: 20px 0;
        span {
          margin-left: 20px;
        }
      }
      .el-input {
        margin: 10px;
      }
      .change {
        margin: 20px 0;
      }
    }
  }
</style>
