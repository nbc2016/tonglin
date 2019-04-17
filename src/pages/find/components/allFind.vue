<template>
  <div class="all">
    <h1>全部寻物启事</h1>
    <ul class="items clearfix">
      <li v-for="item in finds" :key="item.id">
        <router-link :to="'/message/find/'+item.id">
          <img :src="item.img" alt="">
          <h2>{{item.message_tittle}}</h2>
          <p>丢失地点:&nbsp;&nbsp;<span>{{item.message_address}}</span></p>
          <p>电话:&nbsp;&nbsp;<span>{{item.tel}}</span></p>
          <p>QQ:&nbsp;&nbsp;<span>{{item.qq}}</span></p>
          <div class="bottom clearfix">
            <div class="fl">
              <p class="fl glance">浏览: <span>{{item.look}}</span></p>
              <p class="fl">评论: <span>{{item.comment}}</span></p>
            </div>
            <div class="fr">
              <p>{{item.time}}</p>
            </div>
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
  name: 'FindAll',
  data () {
    return {
      pageNum: 1,
      total: 0,
      finds: []
    }
  },
  methods: {
    getFind () {
      this.$http.get('http://localhost:80/school/api/pages.php',
        {
          params: {
            pageNum: this.pageNum - 1,
            type: 'find'
          }
        }
      ).then((res) => {
        const {data, total} = res.data
        this.total = total
        this.finds = data
      })
    },
    currentChange (index) {
      this.pageNum = index
      this.getFind()
    }
  },
  mounted () {
    this.getFind()
  }
}
</script>
<style lang="less" scoped>
   .all {
    width: 100%;
    // height: 980px;
    margin-top: 30px;
    padding-bottom: 50px;
    position: relative;
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
        margin-right: 20px;
        margin-bottom: 20px;
        width: 320px;
        height: 420px;
        padding: 25px;
        border-radius: 10px;
        overflow: hidden;
        background-color: #fff;
        border: 1px solid #fff;
        box-sizing: border-box;
        img {
          margin: 0 auto;
          width: 260px;
          height: 260px;
        }
        h2 {
          line-height: 28px;
        }
        p {
          line-height: 22px;
          font-size: 14px;
        }
        .bottom {
          margin-top: 6px;
          border-top: 1px dashed #666;
          .glance {
            margin-right: 6px;
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
