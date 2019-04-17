<template>
  <div>
    <home-header></home-header>
    <community-banner></community-banner>
    <community-all></community-all>
    <home-foot></home-foot>
  </div>
</template>
<script>
import HomeHeader from '../home/components/header'
import CommunityBanner from './components/banner'
import CommunityAll from './components/allCommunity'
import HomeFoot from '../home/components/foot'
export default {
  name: 'Community',
  components: {
    HomeHeader,
    CommunityBanner,
    CommunityAll,
    HomeFoot
  }
}
</script>

<style lang="less" scoped>

</style>
