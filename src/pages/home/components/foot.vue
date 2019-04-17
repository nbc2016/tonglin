<template>
  <div class="foot">
    <div class="foot_center">
      <p>
        铜陵学院互动平台立志为同学们提供最便捷的校园生活服务;
        网站由铜陵学院数学与计算机学院物联网工程木木同学开发,
        非常欢迎有兴趣的同学前来加入，大家一起进步！
      </p>
      <p>友情链接：<a href="http://www.tlu.edu.cn/" target="_blank">铜陵学院官网</a></p>
    </div>
  </div>
</template>

<script>
export default {
  name: 'HomeFoot'
}
</script>

<style lang="less" scoped>
  .foot {
    width: 100%;
    height: 100px;
    margin-top: 20px;
    padding-top: 15px;
    background-color: #1b9a9e;
    .foot_center {
      width: 1235px;
      height: 60px;
      margin: 0 auto;
      p {
        color: #fff;
        font-size: 14px;
        line-height: 30px;
        text-align: center;
        a {
          color: #fff;
          font-size: 14px;
          font-weight: bold;
        }
        a:hover {
          color: #fd2626;
        }
      }
    }
  }
</style>
