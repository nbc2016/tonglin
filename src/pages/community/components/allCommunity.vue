<template>
  <div class="all">
    <h1>校园话题</h1>
    <ul class="items clearfix">
      <li v-for="item in communitys" :key="item.id">
        <router-link :to="'/message/community/'+item.id">
          <img :src="item.img" alt="">
          <h2 class="txt-one">【话题】{{item.message_tittle}}</h2>
          <p class="txt-thr">
            {{item.message_more | delHtmlTag}}
          </p>
          <div class="bottom clearfix">
              <p>浏览: <span>{{item.look}}</span></p>
              <p>评论: <span>{{item.comment}}</span></p>
          </div>
        </router-link>
      </li>
    </ul>
    <el-pagination
        background
        layout="prev, pager, next"
        @current-change="currentChange"
        :page-size="6"
        :total="total">
    </el-pagination>
  </div>
</template>
<script>
export default {
  name: 'CommunityAll',
  data () {
    return {
      pageNum: 1,
      total: 0,
      communitys: []
    }
  },
  methods: {
    getCommunity () {
      this.$http.get('http://localhost:80/school/api/pages.php',
        {
          params: {
            pageNum: this.pageNum - 1,
            type: 'community'
          }
        }
      ).then((res) => {
        const {data, total} = res.data
        this.total = total
        this.communitys = data
      })
    },
    currentChange (index) {
      this.pageNum = index
      this.getCommunity()
    }
  },
  mounted () {
    this.getCommunity()
  }
}
</script>
<style lang="less" scoped>
  .all {
    width: 100%;
    // height: 980px;
    margin-top: 30px;
    position: relative;
    padding-bottom: 50px;
    h1 {
      width: 400px;
      height: 80px;
      line-height: 80px;
      text-align: center;
      margin: 0 auto;
      color: #F56C6C;
      border-bottom: 2px solid #666;
    }
    .items {
      width: 1024px;
      margin: 0 auto;
      margin-top: 60px;
      li {
        float: left;
        margin: 10px;
        width: 320px;
        height: 320px;
        padding: 10px;
        background-color: #fff;
        border: 1px solid #fff;
        img {
          width: 300px;
          height: 100px;
          margin: 10px auto
        }
        h2 {
          font-size: 20px;
          line-height: 38px;
          width: 260px;
        }
        p {
          font-size: 14px;
          line-height: 32px;
        }
        .bottom {
          margin-top: 20px;
          border-top: 1px dashed #666;
          p {
            float: left;
            margin-right: 10px;
            line-height: 40px;
          }
        }
      }
    }
     .el-pagination {
      position: absolute;
      transform: translateX(-50%);
      left: 50%;
      bottom: 0;
    }
  }
</style>
