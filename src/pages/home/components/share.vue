<template>
  <div class="share clearfix">
      <div class="main fl">
        <img class="pic" src="../../../assets/images/shar.jpg" alt="">
        <h1>分享</h1>
        <p>同学们可以在这里分享你们的学习经验</p>
      </div>
      <div class="box fr">

      </div>
  </div>
</template>

<script>
export default {
  name: 'HomeShare'
}
</script>

<style lang="less" scoped>
  .share {
    width: 1250px;
    height: 420px;
    margin:0 auto;
    padding: 10px 20px;
    margin-top: 20px;
    background-color: #fff;
    .main {
      color: #fff;
      width: 200px;
      height: 400px;
      text-align: center;
      margin-right: 20px;
      background-color: #1b9a9e;
      img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        margin: 0 auto;
        margin-top: 25px;
      }
      h1 {
        font-size: 32px;
        height: 30px;
        line-height: 30px;
        margin-top: 15px;
      }
      p {
        width: 135px;
        line-height: 30px;
        margin: 0 auto;
        margin-top: 30px;
        font-size: 14px;
        border-top: 3px solid #fff;
      }
    }
    .box {
      width: 980px;
      height: 400px;
      background-color: pink;
    }
  }

</style>
