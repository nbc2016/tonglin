<template>
  <div>
    <home-header></home-header>
    <lost-banner></lost-banner>
    <lost-all></lost-all>
    <home-foot></home-foot>
  </div>
</template>
<script>
import HomeHeader from '../home/components/header'
import LostBanner from './components/banner'
import LostAll from './components/allLose'
import HomeFoot from '../home/components/foot'
export default {
  name: 'Lost',
  components: {
    HomeHeader,
    LostBanner,
    LostAll,
    HomeFoot
  }
}
</script>

<style lang="less" scoped>

</style>
