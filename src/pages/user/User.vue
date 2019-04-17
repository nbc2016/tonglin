<template>
  <div>
    <user-header></user-header>
    <user-content v-if="$route.path !== '/user'"></user-content>
    <UserInfo v-else></UserInfo>
    <share-footer></share-footer>
  </div>
</template>
<script>
import UserHeader from './components/header'
import UserContent from './components/content'
import UserInfo from './components/info'
import ShareFooter from '../share/components/footer'
export default {
  name: 'User',
  components: {
    UserHeader,
    UserContent,
    UserInfo,
    ShareFooter
  }
}
</script>

<style lang="less" scoped>
  div {
    background-color: #fff;
  }
</style>
