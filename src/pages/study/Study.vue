<template>
  <div>
    <home-header></home-header>
    <study-banner></study-banner>
    <study-all></study-all>
    <home-foot></home-foot>
  </div>
</template>
<script>
import HomeHeader from '../home/components/header'
import StudyBanner from './components/banner'
import StudyAll from './components/allStudy'
import HomeFoot from '../home/components/foot'
export default {
  name: 'Study',
  components: {
    HomeHeader,
    StudyBanner,
    StudyAll,
    HomeFoot
  }
}
</script>

<style lang="less" scoped>

</style>
