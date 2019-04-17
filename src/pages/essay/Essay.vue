<template>
  <div>
    <home-header></home-header>
    <essay-banner></essay-banner>
    <essay-all></essay-all>
    <home-foot></home-foot>
  </div>
</template>
<script>
import HomeHeader from '../home/components/header'
import EssayBanner from './components/banner'
import EssayAll from './components/allEssay'
import HomeFoot from '../home/components/foot'
export default {
  name: 'Essay',
  components: {
    HomeHeader,
    EssayBanner,
    EssayAll,
    HomeFoot
  }
}
</script>

<style lang="less" scoped>

</style>
