<template>
  <div class="main">
    <h1 class="txt-one">{{info.message_tittle}}</h1>
    <div class="content clearfix">
      <div class="fl">
        <img :src="info.img" alt="">
      </div>
      <div class="fl">
        <p>发布时间:&nbsp;&nbsp;{{info.time | dataFilter}}</p>
        <p>发布者:&nbsp;&nbsp;{{info.username}}</p>
        <p>点击数:&nbsp;&nbsp;{{info.look}}</p>
        <p>评论数:&nbsp;&nbsp;{{info.comment}}</p>
        <p>详细过程:&nbsp;&nbsp;{{info.message_more}}</p>
        <p>地点:&nbsp;&nbsp;{{info.message_address}}</p>
        <p>QQ:&nbsp;&nbsp;{{info.qq}}</p>
        <p>tel:&nbsp;&nbsp;{{info.tel}}</p>
      </div>
    </div>
    <hr>
    <Emoji :comment="comment" @addone="addone"/>
  </div>
</template>

<script>
import Emoji from '../../emoji/index'
export default {
  name: 'LastMain',
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
        message_address: '',
        time: '',
        qq: '',
        tel: ''
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
        this.info.message_address = data.message_address
        this.info.qq = data.qq
        this.info.tel = data.tel
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
    width: 960px;
    margin: 0 auto;
    h1 {
      margin-bottom: 10px;
      text-align: center;
      line-height: 40px;
    }
    .content {
      padding: 20px;
      img {
        width: 300px;
        height: 300px;
        margin-right: 50px;
      }
      p {
        line-height: 36px;
        font-size: 16px;
      }
    }
  }
</style>
