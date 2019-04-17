<template>
  <div>
    <home-header></home-header>
    <home-banner :community="community"></home-banner>
    <home-essay :essay="essay"></home-essay>
    <home-notice :lost="lost" :find="find"></home-notice>
    <home-share></home-share>
    <home-foot></home-foot>
  </div>
</template>

<script>
import HomeHeader from './components/header'
import HomeBanner from './components/banner'
import HomeEssay from './components/essay'
import HomeNotice from './components/notice'
import HomeShare from './components/share'
import HomeFoot from './components/foot'
export default {
  name: 'Home',
  data () {
    return {
      community: [],
      essay: [],
      find: [],
      lost: [],
      study: []
    }
  },
  components: {
    HomeHeader,
    HomeBanner,
    HomeEssay,
    HomeNotice,
    HomeShare,
    HomeFoot
  },
  methods: {
    getAll () {
      this.$http.get('http://localhost:80/school/api/index.php').then((res) => {
        console.log(res)
        const data = res.data
        this.community = data.community
        this.essay = data.essay
        this.lost = data.lost
        this.find = data.find
      })
    }
  },
  mounted () {
    this.getAll()
  }
}
</script>

<style lang="less" scoped>

</style>
