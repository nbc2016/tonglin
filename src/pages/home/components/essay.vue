<template>
  <div class="essay">
    <div class="title">
      <div class="title1 fl">校园最新文章</div>
      <div class="title2 fl"></div>
    </div>
    <ul class="clearfix">
      <li class="item" v-for="item in essay" :key="item.id">
        <router-link :to="'/message/essay/'+item.id">
          <img :src="item.img" alt="">
          <p class="tip txt-one">{{item.message_tittle}}</p>
          <p class="info txt-thr">{{item.message_more | delHtmlTag}}</p>
          <div class="foot fr">
            <span>评论: {{item.comment}}</span>
            <span>浏览: {{item.look}}</span>
          </div>
        </router-link>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: 'HomeEassy',
  props: {
    essay: {
      type: Array,
      require: true
    }
  }
}
</script>

<style lang="less" scoped>
  .essay {
    width: 1250px;
    height: 320px;
    margin:0 auto;
    margin-top: 20px;
    padding-left: 15px;
    background-color: #fff;
    .title1 {
      width: 120px;
      font-size: 18px;
      height: 43px;
      text-align: center;
      line-height: 43px;
      color: #009999;
      border-bottom: 3px solid #1b9a9e;
    }
    .title2 {
      height: 43px;
      width: 1090px;
      border-bottom: 3px solid #ddd;
    }
    .item {
      float: left;
      width: 280px;
      height: 250px;
      padding: 12px 0;
      margin-top: 20px;
      margin-left: 8px;
      margin-right: 20px;
      border: 1px dashed #ccc;
      img {
        margin: 0 auto;
        width: 260px;
        height: 87px;
      }
      .tip {
        font-size: 16px;
        font-weight: bold;
        padding-left: 8px;
        line-height: 30px;
        margin-bottom: 5px;
      }
      .info {
        line-height: 22px;
        font-size: 14px;
        padding-left: 8px;
      }
      .foot {
        margin-top: 20px;
        font-size: 14px;
        span {
          margin-right: 30px;
        }
      }
    }
  }
</style>
