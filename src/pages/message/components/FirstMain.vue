<template>
  <div class="main">
    <div class="content">
      <h1 class="txt-one">{{info.message_tittle}}</h1>
      <p>
        <span>时间:{{info.time}}</span>
        <span>作者:{{info.username}}</span>
        <span>点击: {{info.look}}次</span>
        <span>评论: {{info.comment}}次</span>
      </p>
      <img :src="info.img" alt="">
      <div class="more" v-html="info.message_more"></div>
    </div>
    <hr>
    <Emoji :comment="comment" @addone="addone"/>
  </div>
</template>

<script>
import Emoji from '../../emoji/index'
export default {
  name: 'FirstMain',
  components: {
    Emoji: Emoji
  },
  data () {
    return {
      info: {
        img: '',
        username: '',
        comment: '',
        look: '',
        message_tittle: '',
        message_more: '',
        time: ''
      },
      comment: []
    }
  },
  methods: {
    getpageinfo () {
      const id = this.$route.params.id
      const type = this.$route.path.split('/')[2]
      this.$http.get('http://localhost:80/school/api/pageInfo.php', {
        params: {id: id, type: type}
      }).then((res) => {
        const {data, comment} = res.data
        this.info.img = data.img
        this.info.username = data.username
        this.info.comment = data.comment
        this.info.look = data.look
        this.info.message_tittle = data.message_tittle
        this.info.message_more = data.message_more
        this.info.time = data.time
        this.comment = comment
      })
    },
    addone () {
      this.info.comment = parseInt(this.info.comment) + 1
    }
  },
  mounted () {
    this.getpageinfo()
  }
}
</script>

<style scoped lang="less">

  .main {
    width: 1024px;
    margin: 0 auto;
    background-color: #fff;
    .content {
      width: 750px;
      margin: 0 auto;
      padding: 20px 0;
      h1 {
        font-family: "黑体";
        font-size: 36px;
        margin: 20px 0;
        line-height: 50px;
        text-align: center;
      }
      p {
        text-align: center;
        line-height: 26px;
        span {
          margin-right: 20px;
        }
      }
      img {
        width: 700px;
        margin: 20px auto;
      }
      .more {
        line-height: 30px;
        font-size: 14px;
      }
    }
  }
</style>
