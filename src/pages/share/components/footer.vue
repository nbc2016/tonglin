<template>
  <div class="footer">
    <div class="main">
      <div class="fl">
        <h1>铜陵学院互动平台</h1>
        <p>铜陵学院互动平台立志为同学们提供最便捷的校园生活服务;</p>
        <p>网站由铜陵学院数学与计算机学院物联网工程木木同学开发, </p>
        <p>非常欢迎有兴趣的同学前来加入，</p>
        <p>大家一起进步！</p>
      </div>
      <div class="fr">
        <p>QQ :&nbsp;&nbsp;1234567890</p>
        <div class="link">
          友情链接 :&nbsp;&nbsp;<a href="http://www.tlu.edu.cn/" target="_blank">铜陵学院官网</a>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: 'ShareFooter'
}
</script>
<style lang="less" scoped>
  .footer {
    width: 100%;
    height: 180px;
    background-color: #1b9a9e;
    margin-top: 40px;
    padding-top: 25px;
    .main {
      width: 1024px;
      height: 150px;
      margin: 0 auto;
      padding-right: 60px;
      color: #fff;
      h1 {
        line-height: 40px;
      }
      p {
        line-height: 24px;
        font-weight: bold;
        font-size: 14px;
      }
      .fr {
        margin-top: 40px;
        .link {
          line-height: 36px;
          font-size: 14px;
          a {
            color: #fff;
            font-weight: bold;
          }
          a:hover {
            color: #fd2626;
          }
        }
      }
    }
  }
</style>
