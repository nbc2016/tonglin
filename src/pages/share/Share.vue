<template>
  <div class="share">
    <share-header></share-header>
    <share-info></share-info>
    <share-footer></share-footer>
  </div>
</template>
<script>
import ShareHeader from './components/header'
import ShareInfo from './components/info'
import ShareFooter from './components/footer'
export default {
  name: 'Share',
  components: {
    ShareHeader,
    ShareInfo,
    ShareFooter
  }
}
</script>
<style lang="less" scoped>
  .share {
    height: 100%;
    background-color: #ccc;
  }
</style>
