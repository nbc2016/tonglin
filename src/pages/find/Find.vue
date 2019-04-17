<template>
  <div>
    <home-header></home-header>
    <find-banner></find-banner>
    <find-all></find-all>
    <home-foot></home-foot>
  </div>
</template>
<script>
import HomeHeader from '../home/components/header'
import FindBanner from './components/banner'
import FindAll from './components/allFind'
import HomeFoot from '../home/components/foot'
export default {
  name: 'Find',
  components: {
    HomeHeader,
    FindBanner,
    FindAll,
    HomeFoot
  }
}
</script>

<style lang="less" scoped>

</style>
