<template>
  <div class="container" >
    <textarea class="text"  v-model="content" ></textarea>
      <el-button type="success" round class="submit-box" @click="addcomment">发送评论</el-button>
    <div class="bqbox">
      <emotion @emotion="handleEmotion" :height="130" ></emotion>
    </div>
    <ul class="text-place">
      <li v-for="item of comment" :key="item.id">
        <img :src="item.img" alt="">
        <span class="username">{{item.username}}</span>
        <span>{{item.time}}</span>
        <el-button class="fr" type="text" @click="add(item.username)">回复</el-button>
        <br>
        <div class="clearfix">
          <span class="content fl" v-html="item.message.replace(/\#[\u4E00-\u9FA5]{1,3}\;/gi, emotion)"></span>
        </div>
        <div class="fairy"></div>
      </li>
    </ul>
    <div v-if="content.length">暂无评论</div>
  </div>
</template>

<script>
import Emotion from './Emotion/index'
import qs from 'qs'
export default {
  props: {
    comment: {
      type: Array,
      require: true
    }
  },
  data () {
    return {
      content: ''
    }
  },
  methods: {
    handleEmotion (i) {
      this.content += i
    },
    // 将匹配结果替换表情图片
    emotion (res) {
      let word = res.replace(/#|;/gi, '')
      const list = ['微笑', '撇嘴', '色', '发呆', '得意', '流泪', '害羞', '闭嘴', '睡', '大哭', '尴尬', '发怒', '调皮', '呲牙', '惊讶', '难过', '酷', '冷汗', '抓狂', '吐', '偷笑', '可爱', '白眼', '傲慢', '饥饿', '困', '惊恐', '流汗', '憨笑', '大兵', '奋斗', '咒骂', '疑问', '嘘', '晕', '折磨', '衰', '骷髅', '敲打', '再见', '擦汗', '抠鼻', '鼓掌', '糗大了', '坏笑', '左哼哼', '右哼哼', '哈欠', '鄙视', '委屈', '快哭了', '阴险', '亲亲', '吓', '可怜', '菜刀', '西瓜', '啤酒', '篮球', '乒乓', '咖啡', '饭', '猪头', '玫瑰', '凋谢', '示爱', '爱心', '心碎', '蛋糕', '闪电', '炸弹', '刀', '足球', '瓢虫', '便便', '月亮', '太阳', '礼物', '拥抱', '强', '弱', '握手', '胜利', '抱拳', '勾引', '拳头', '差劲', '爱你', 'NO', 'OK', '爱情', '飞吻', '跳跳', '发抖', '怄火', '转圈', '磕头', '回头', '跳绳', '挥手', '激动', '街舞', '献吻', '左太极', '右太极']
      let index = list.indexOf(word)
      return `<img src="https://res.wx.qq.com/mpres/htmledition/images/icon/emotion/${index}.gif" align="middle">`
    },
    addcomment () {
      if (this.content.trim().length === 0) {
        this.content = ''
        return
      }
      let arr = this.$route.path.split('/')
      let type = arr[2]
      let id = arr[3]
      this.$http.post('http://localhost:80/school/api/addcomment.php',
        qs.stringify({
          type: type,
          message_id: id,
          message: this.content
        })).then((res) => {
        console.log(res)
        const {code} = res.data
        if (code === 1) {
          this.content = ''
          this.$message({
            message: '发送评论成功',
            type: 'success'
          })
          this.comment.unshift(res.data.comment)
          this.$emit('addone')
        } else {
          this.$message.error('发送评论失败,请确认是否登录!')
        }
      })
    },
    add (username) {
      this.content = '回复 ' + username + ': '
    }
  },
  components: {
    Emotion
  }
}
</script>
<style scoped lang="less">
  .container {
    margin: 0 auto;
    margin-top: 20px;
    width: 800px;
    position: relative;
  }
  .submit-box {
    position: absolute;
    top: 159px;
    right: 0;
  }
  .text {
    display: block;
    margin: 0 auto;
    margin-bottom: 10px;
    width: 800px;
    resize: none;
    box-sizing: border-box;
    height:200px;
    padding: 5px 10px;
    border-radius: 8px;
    border: 1px solid #ccc;
  }
      .el-button.is-round {
        border-radius: 8px;
      }
  .text-place {
    box-sizing: border-box;
    padding: 5px 10px;
    border-radius: 8px;
    li {
      padding: 10px;
      padding-bottom: 0;
      font-size: 16px;
      border-bottom: 1px dashed rgb(197, 197, 197);
      img {
        display: inline-block;
        width: 40px;
        height: 40px;
        border-radius: 20px;
        margin-bottom: 30px;
        margin-top: 20px;
      }
      .username {
        font-weight: bold;
        color: #018383;
        margin-right: 10px;
      }
      .fr {
        font-size: 16px;
        font-weight: bold;
        margin-right: 100px;
        margin-top: 20px;
      }
      .content {
        display: flex;
        height: 24px;
        line-height: 24px;
        margin-left: 10px;
        border-radius: 8px;
        padding: 8px;
        padding-left: 12px;
        background-color: #60BFBF;;
      }
      .fairy {
        width: 1px;
        height: 1px;
        border: 15px solid transparent;
        border-left: 15px solid #60BFBF;
        position: relative;
        top: -52px;
        left: 18px;
      }
    }
  }
</style>
