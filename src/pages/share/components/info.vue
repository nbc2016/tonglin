<template>
  <div class="info">
    <div class="fl">
      <el-upload
        class="avatar-uploader"
        action="http://localhost:80/school/api/img.php"
        :show-file-list="false"
        :on-success="handleAvatarSuccess"
        :before-upload="beforeAvatarUpload">
        <img v-if="imageUrl" :src="imageUrl" class="avatar">
        <i v-else class="el-icon-plus avatar-uploader-icon"></i>
      </el-upload>
      <h2>添加图片</h2>
      <p>你可以添加一张好看的封面图片</p>
      <p>这样你的话题可能会呈现在主页哦</p>
    </div>
    <div class="fr">
        <input class="title" type="text" placeholder="标题" v-model="message.message_tittle">
        <quill-editor v-model="message.message_more" :options="editorOption"></quill-editor>
        <input class="submit" type="button" @click="addmessage" value="提交">
    </div>
  </div>
</template>
<script>
import 'quill/dist/quill.core.css'
import 'quill/dist/quill.snow.css'
import 'quill/dist/quill.bubble.css'
import qs from 'qs'
import { quillEditor } from 'vue-quill-editor'
export default {
  name: 'ShareInfo',
  components: {
    quillEditor
  },
  data () {
    return {
      imageUrl: '',
      message: {
        type: this.$route.path,
        img: '',
        message_tittle: '',
        message_more: ''
      },
      editorOption: {
        placeholder: '在这里输入您想发表的内容 ...'
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
        message_more: ''
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
      if (this.message.message_tittle.trim().length === 0 || this.message.message_more.trim().length === 0) {
        return
      }
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
  .info {
    width: 1024px;
    height: 550px;
    margin: 30px auto;
    /deep/ .fl {
      width: 270px;
      height: 550px;
      background-color: #fff;
      .avatar-uploader .el-upload {
        border: 3px dashed #d9d9d9;
        border-radius: 6px;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        margin-top: 30px;
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
        font-size: 28px;
        font-weight: normal;
        text-align: center;
        line-height: 80px;
        color: rgb(90, 185, 185);
      }
      p {
        text-align: center;
        font-size: 14px;
        line-height: 36px;
      }
    }
    .fr {
      width: 750px;
      height: 550px;
      background-color: #fff;
      .title {
        display: block;
        width: 300px;
        height: 60px;
        font-size: 32px;
        margin: 0 auto;
        margin-bottom: 10px;
        text-align: center;
        line-height: 60px;
        border-bottom: 2px solid #666;
      }
      /deep/ .ql-container {
        height: 370px;
      }
      .submit {
        text-align: center;
        width: 100%;
        height: 40px;
        font-size: 16px;
        font-weight: bold;
        background-color: #fff;
        border: 1px solid #ccc;
        margin-top: 3px;
      }
      .submit:hover {
        background-color: #e0e0e0;
      }
    }
  }
</style>
