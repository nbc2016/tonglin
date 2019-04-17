import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/pages/home/Home'
import User from '@/pages/user/User'
import Message from '@/pages/message/Message'
import FirstMain from '@/pages/message/components/FirstMain'
import LastMain from '@/pages/message/components/LastMain'
import Login from '@/pages/user/components/login'
import Regist from '@/pages/user/components/regist'
import Lost from '@/pages/lost/Lost'
import Find from '@/pages/find/Find'
import Study from '@/pages/study/Study'
import Community from '@/pages/community/Community'
import Essay from '@/pages/essay/Essay'
import Share from '@/pages/share/Share'
import ShareCommunity from '@/pages/share/components/community'
import ShareEssay from '@/pages/share/components/essay'
import ShareStudy from '@/pages/share/components/study'
import Release from '@/pages/release/Release'
import ReleaseLost from '@/pages/release/components/lost'
import ReleaseFind from '@/pages/release/components/find'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/user',
      name: 'User',
      component: User,
      children: [
        {
          path: '/user/login',
          name: 'Login',
          component: Login
        },
        {
          path: '/user/regist',
          name: 'Regist',
          component: Regist
        }
      ]
    },
    {
      path: '/lost',
      name: 'Lost',
      component: Lost
    },
    {
      path: '/find',
      name: 'Find',
      component: Find
    },
    {
      path: '/community',
      name: 'Community',
      component: Community
    },
    {
      path: '/essay',
      name: 'Essay',
      component: Essay
    },
    {
      path: '/study',
      name: 'Study',
      component: Study
    },
    {
      path: '/share',
      name: 'Share',
      component: Share,
      children: [
        {
          path: '/share/community',
          name: 'ShareCommunity',
          component: ShareCommunity
        },
        {
          path: '/share/essay',
          name: 'ShareEssay',
          component: ShareEssay
        },
        {
          path: '/share/study',
          name: 'ShareStudy',
          component: ShareStudy
        }
      ]
    },
    {
      path: '/release',
      name: 'Release',
      component: Release,
      children: [
        {
          path: '/release/lost',
          name: 'ReleaseLost',
          component: ReleaseLost
        },
        {
          path: '/release/find',
          name: 'ReleaseFind',
          component: ReleaseFind
        }
      ]
    },
    {
      path: '/message',
      name: 'Message',
      component: Message,
      children: [
        {
          path: '/message/lost/:id',
          name: 'MessageLost',
          component: LastMain
        },
        {
          path: '/message/find/:id',
          name: 'MessageFind',
          component: LastMain
        },
        {
          path: '/message/essay/:id',
          name: 'MessageEssay',
          component: FirstMain
        },
        {
          path: '/message/community/:id',
          name: 'MessageCommunity',
          component: FirstMain
        },
        {
          path: '/message/study/:id',
          name: 'MessageStudy',
          component: FirstMain
        }
      ]
    }
  ],
  linkActiveClass: 'light',
  scrollBehavior (to, from, savedPosition) {
    if (savedPosition) {
      return savedPosition
    }
    return {x: 0, y: 0}
  }
})
