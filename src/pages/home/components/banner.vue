<template>
<div class="banner">
  <div class="pic"></div>
  <div class="content clearfix">
    <div class="content_left fl"  v-if="community.length">
      <router-link :to="'/message/community/'+community[0].id">
        <img :src="community[0].img" class="fl">
        <h1 class="txt-one">{{community[0].message_tittle}}</h1>
        <p class="txt-five">{{community[0].message_more | delHtmlTag}}
        </p>
        <div class="bottom">
          <span class="more">查看详情</span>
          <span>评论: {{community[0].comment}}</span>
          <span>浏览: {{community[0].look}}</span>
        </div>
      </router-link>
    </div>
    <div class="content_right fr" v-if="community.length">
      <div class="message">
        <router-link :to="'/message/community/'+community[1].id">
          <div class="left fl">
            <h1 class="txt-one">{{community[1].message_tittle}}</h1>
            <p class="txt-thr">{{community[1].message_more | delHtmlTag}}
            </p>
            <div class="bottom">
              <span>查看详情</span>
            </div>
          </div>
          <img :src="community[1].img" class="fr">
        </router-link>
      </div>
      <div class="message">
        <router-link :to="'/message/community/'+community[2].id">
          <div class="left fl">
            <h1 class="txt-one">{{community[2].message_tittle}}</h1>
            <p class="txt-thr">{{community[2].message_more | delHtmlTag}}
            </p>
            <div class="bottom">
              <span>查看详情</span>
            </div>
          </div>
          <img :src="community[2].img" class="fr">
        </router-link>
      </div>
    </div>
  </div>
</div>
</template>

<script>
export default {
  name: 'HomeBanner',
  props: {
    community: {
      type: Array,
      require: true
    }
  }
}
</script>

<style lang="less" scoped>
  .pic {
    height: 270px;
    background: url('../../../assets/images/school.jpg') center;
  }
  .content {
    width: 1250px;
    height: 300px;
    margin:0 auto;
    margin-top: 20px;
    .content_left {
      width: 830px;
      height: 100%;
      font-size: 14px;
      padding-right: 10px;
      background-color: #fff;
      img {
        width: 500px;
        height: 250px;
        margin: 25px;
        margin-right: 15px;
      }
      h1 {
        color: #1b9a9e;
        font-size: 26px;
        line-height: 32px;
        margin-top: 20px;
        margin-bottom: 12px;
      }
      p {
        height: 160px;
        line-height: 32px;
      }
      .bottom {
        margin-top: 36px;
        .more {
          font-weight: bold;
        }
        span {
          margin-right: 45px;
        }
      }
    }
    .content_right {
      width: 400px;
      height: 100%;
      background-color: #fff;
      .message {
        width: 380px;
        height: 140px;
        margin-top: 5px;
        margin-left: 10px;
        .left {
          width: 140px;
          padding-right: 10px;
          h1 {
            margin: 10px auto;
            color: #1b9a9e;
            font-size: 16px;
          }
          p {
            line-height: 20px;
          }
          .bottom {
            margin-top: 10px;
            font-weight: bold;
          }
        }
        img {
          width: 240px;
          height: 120px;
          margin-top: 5px;
        }
      }
    }
  }
</style>
