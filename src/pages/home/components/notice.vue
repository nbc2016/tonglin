<template>
  <div class="notice clearfix">
    <div class="item fl">
      <div class="title clearfix">
        <div class="title1 fl">失物招领</div>
        <div class="title2 fl"></div>
      </div>
      <ul class="clearfix pic">
        <li v-for="item in lost" :key="item.id">
          <router-link :to="'/message/lost/'+item.id">
            <img :src="item.img" alt="">
          </router-link>
        </li>
      </ul>
      <ol class="info">
        <li v-for="(item,index) in lost" :key="item.id">
          <router-link :to="'/message/lost/'+item.id">
            <div class="num fl">{{index+1}}</div>
            <p class="txt-one fl">最新失物招领：{{item.message_more}}</p>
            <div class="fr">
              <span>评论: {{item.comment}}</span>
              <span>浏览: {{item.look}}</span>
            </div>
          </router-link>
        </li>
      </ol>
    </div>
    <div class="item fr">
      <div class="title clearfix">
        <div class="title1 fl">寻物启事</div>
        <div class="title2 fl"></div>
      </div>
      <ul class="clearfix pic">
        <li v-for="item in find" :key="item.id">
          <router-link :to="'/message/find/'+item.id">
            <img :src="item.img" alt="">
          </router-link>
        </li>
      </ul>
      <ol class="info">
        <li v-for="(item,index) in find" :key="item.id">
          <router-link :to="'/message/find/'+item.id">
            <div class="num fl">{{index+1}}</div>
            <p class="txt-one fl">最新寻物启事：{{item.message_more}}</p>
            <div class="fr">
              <span>评论: {{item.comment}}</span>
              <span>浏览: {{item.look}}</span>
            </div>
          </router-link>
        </li>
      </ol>
    </div>
  </div>
</template>

<script>
export default {
  name: 'HomeNotice',
  props: {
    find: {
      type: Array,
      require: true
    },
    lost: {
      type: Array,
      require: true
    }
  }
}
</script>

<style lang="less" scoped>
  .notice {
    width: 1250px;
    height: 460px;
    margin:0 auto;
    margin-top: 20px;
    .item {
      width: 600px;
      height: 460px;
      background-color: #fff;
      .title {
      padding-left: 15px;
      .title1 {
        width: 80px;
        font-size: 18px;
        height: 43px;
        text-align: center;
        line-height: 43px;
        color: #009999;
        border-bottom: 3px solid #1b9a9e;
        }
      .title2 {
        height: 43px;
        width: 480px;
        border-bottom: 3px solid #ddd;
        }
      }
      .pic li {
        margin-left: 15px;
        margin-top: 10px;
        float: left;
        img {
          width: 180px;
          height: 180px;
        }
      }
      .info li {
        height: 65px;
        border-bottom: 1px dashed #ccc;
        line-height: 65px;
        font-size: 16px;
        padding-right: 40px;
        .num {
          width: 30px;
          height: 30px;
          line-height: 30px;
          text-align: center;
          margin: 17px;
          border-radius: 50%;
          background-color: #1b9a9e;
          color: #fff;
        }
        p {
          width: 350px;
        }
      }
    }
  }
</style>
