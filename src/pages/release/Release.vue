<template>
  <div>
    <release-header></release-header>
    <release-add></release-add>
    <share-footer></share-footer>
  </div>
</template>
<script>
import ReleaseHeader from './components/header'
import ReleaseAdd from './components/addinfo'
import ShareFooter from '../share/components/footer'
export default {
  name: 'Release',
  components: {
    ReleaseHeader,
    ReleaseAdd,
    ShareFooter
  }
}
</script>
<style lang="less" scoped>

</style>
