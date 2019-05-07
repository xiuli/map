<template>
<div class="head_box">
  <div class="head">
    <div class="img_wrap">
      <img class="img_inner" src="../../assets/images/logo.png" alt="">
    </div>
    <div class="user">
     <img class="user_inner" src="../../assets/images/user.png" alt="">
     <div @click="show">
       <span class="user_name">欢迎您,</span>
       <span class="user_name desc">tianlei</span>
       <i class="iconfont lit_arrow">&#xe64a;</i>
     </div>
    </div>
  </div>
  <div class="drop_down">
       <ul :class="bflag? 'user_list' : 'isNone'">
         <li>首页</li>
         <li>退出</li>
       </ul>
  </div>
  <nav class="navigt">
    <ul class="nav_list">
      <li>
        <a href="#">地铁查询</a>
        <i class="iconfont">&#xe64a;</i>
        <ul class="lit_meun">
          <li @click="mapSearch">路线图查询</li>
          <li @click="siteInfor">站点及周边信息</li>
        </ul>
      </li>
      <li>
        <a href="#">乘客服务</a>
        <i class="iconfont">&#xe64a;</i>
        <ul class="lit_meun">
          <li>首末班时间</li>
        </ul>
      </li>
      <li>
        <a href="#">地铁文化</a>
        <i class="iconfont">&#xe64a;</i>
        <ul class="lit_meun">
          <li>地铁知识</li>
          <li>地铁新闻</li>
          <li>地铁大事件</li>
        </ul>
      </li>
      <li>
        <a href="#">延误通告</a>
      </li>
    </ul>
  </nav>
</div>
</template>

<script>
export default {
  name:'Head',
  data(){
    return{
      bflag:false
    }
  },
  methods:{
    show(){
      this.bflag=!this.bflag;
    },
    mapSearch(){
      this.$router.push('./Map');
    },
    siteInfor(){
      this.$router.push('./SiteInfor');
    }
  }

}
</script>

<style scoped>
.head_box{
  position: relative;
}
.head{
  width: 100%;
  height: 120px;
  background:#04c3b3;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding:0 60px;
  box-sizing: border-box;
}
.user{
  width: 180px;
  height: 40px;
  display: flex;
  align-items: center;
  background: #2cada3;
  cursor: pointer;
}
.user_inner{
  height: 100%;
  margin-right: 10px;
}
.isNone{
  display: none;
}
.desc{
  margin-right: 8px;
}
.lit_arrow{
  color:#ccc;
}
.drop_down{
  width: 138px;
  position: absolute;
  right:60px;
  top:80px;
}
.user_list{
  opacity: .8;
  background: #3aaaa1;
}
.user_list li{
  height: 40px;
  text-align: center;
  line-height: 40px;
  font-size: 20px;
  color:#fff;
  border-top: 1px solid #fff;
  cursor: pointer;
}
.navigt{
  width: 100%;
}
.nav_list{
  display: flex;
  justify-content: space-around;
  background: #2cada3;
}
.nav_list>li{
  width: 25%;
  border-right: 1px solid #eee;
  font-size: 18px;
  color:#fff;
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
}
.nav_list>li:last-child{
  border-right:0;
}
.nav_list>li>a{
  color:#fff;
  display: block;
  height: 50px;
  line-height: 50px;
}
.lit_meun{
  z-index: 10;
  position: absolute;
  top:50px;
  cursor: pointer;
  display: none;
}
.lit_meun>li{
  width: 100%;
  height: 50px;
  background: #ccc;
  line-height: 50px;
  border-bottom: 1px solid #fff;
  text-align: center;
  opacity: .9;
  color:#000;
}
.nav_list>li:hover ul {
  display: block;
}
</style>
