<template>
  <div class="add">
    <div class="img">
      <el-upload
          class="avatar-uploader"
          action="http://localhost:80/school/api/img.php"
          :show-file-list="false"
          :on-success="handleAvatarSuccess"
          :before-upload="beforeAvatarUpload">
        <img v-if="imageUrl" :src="imageUrl" class="avatar">
        <i v-else class="el-icon-plus avatar-uploader-icon"></i>
      </el-upload>
      <h2>添加物品图片</h2>
    </div>
    <input class="title" type="text" placeholder="标题" v-model="message.message_tittle">
    <div class="info">
      <div class="clearfix">
        <p>地点: </p><el-input v-model="message.message_address" placeholder="请输入丢失/拾取地点"></el-input>
      </div>
      <div class="clearfix">
        <p>过程: </p>
        <el-input
            type="textarea"
            :rows="5"
            placeholder="请输入丢失/拾取的详细过程"
            v-model="message.message_more">
        </el-input>
      </div>
      <div class="clearfix">
        <p>手机: </p>
        <el-input v-model="message.tel" placeholder="请输入手机号码"></el-input>
      </div>
      <div class="clearfix">
        <p>QQ: </p>
        <el-input v-model="message.qq" placeholder="请输入联系QQ"></el-input>
      </div>
      <input class="submit" type="button" @click="addmessage" value="发布">
    </div>
  </div>
</template>
<script>
import qs from 'qs'
export default {
  data () {
    return {
      imageUrl: '',
      message: {
        type: this.$route.path,
        img: '',
        message_tittle: '',
        message_more: '',
        message_address: '',
        tel: '',
        qq: ''
      }
    }
  },
  watch: {
    $route () {
      this.imageUrl = ''
      this.message = {
        type: this.$route.path,
        img: '',
        message_tittle: '',
        message_more: '',
        message_address: '',
        tel: '',
        qq: ''
      }
    }
  },
  methods: {
    handleAvatarSuccess (res, file) {
      this.message.img = res.img
      this.imageUrl = URL.createObjectURL(file.raw)
    },
    beforeAvatarUpload (file) {
      const isJPG = file.type === 'image/jpeg'
      const isLt2M = file.size / 1024 / 1024 < 2

      if (!isJPG) {
        this.$message.error('上传图片只能是 JPG 格式!')
      }
      if (!isLt2M) {
        this.$message.error('上传图片大小不能超过 2MB!')
      }
      return isJPG && isLt2M
    },
    addmessage () {
      let type = this.message.type
      type = type.split('/')[2]
      this.message.type = type
      this.$http.post('http://localhost:80/school/api/message.php', qs.stringify(this.message)).then(res => {
        const {code, data} = res.data
        if (code === 1) {
          this.$router.push('/message/' + data.type + '/' + data.id)
        } else {
          this.$message.error('发布失败,请确认是否登录!')
        }
      })
    }
  }
}
</script>
<style lang="less" scoped>
  .add {
    width: 1024px;
    // height: 800px;
    border-radius: 10px;
    margin: 20px auto;
    background-color: #fff;
    /deep/.img {
      .avatar-uploader .el-upload {
        border: 3px dashed #d9d9d9;
        border-radius: 6px;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        margin-top: 50px;
      }
      .avatar-uploader {
        text-align: center;
      }
      .avatar-uploader .el-upload:hover {
        border-color: #409EFF;
      }
      .avatar-uploader-icon {
        font-size: 40px;
        color: #8c939d;
        width: 200px;
        height: 200px;
        line-height: 200px;
        text-align: center;
      }
      .avatar {
        width: 200px;
        height: 200px;
        display: block;
      }
      h2 {
        text-align: center;
        font-size: 26px;
        font-weight: normal;
        line-height: 36px;
        color: #5ab9b9;
      }
    }
    .title {
      display: block;
      width: 300px;
      height: 60px;
      font-size: 32px;
      margin: 30px auto;
      text-align: center;
      line-height: 60px;
      border-bottom: 2px solid #666;
    }
    .info {
      width: 700px;
      margin: 10px auto;
      div {
        padding: 0 5px;
        p {
          font-size: 18px;
          font-weight: bold;
          float: left;
          margin-top: 10px;
          margin-left: 10px;
        }
        .el-input {
          margin-bottom: 50px;
          width: 550px;
          float: right;
        }
        .el-textarea {
          margin-bottom: 50px;
          width: 550px;
          float: right;
        }
      }
      .submit {
        text-align: center;
        width: 100%;
        height: 40px;
        font-size: 18px;
        font-weight: bold;
        color: #fff;
        background-color: #5ab9b9;
        border-radius: 8px;
        border: 1px solid #ccc;
        margin-bottom: 50px;
      }
      .submit:hover {
        background-color: #3f9c9c;
      }
    }
  }
</style>
