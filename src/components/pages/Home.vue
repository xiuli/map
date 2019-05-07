<template>
<div class="home">
  <Head></Head>
  <!-- elment UI 轮播图 -->
  <div class="block">
    <el-carousel trigger="click" height="300px">
      <el-carousel-item v-for="item in img_arrs" :key="item.id" class="img_box">
        <img :src='item.img' alt="">
      </el-carousel-item>
    </el-carousel>
  </div>

  <div class="message">
    <div class="left_mes">
      <h3 class="titl">地铁新闻</h3>
      <ul class="mes_list">
        <li v-for="item in msg_dt_arrs" :key="item.id">
          <a :href="item.href" target="_blank">{{item.xx}}</a>
        </li>
      </ul>
    </div>
    <div class="right_mes">
      <h3 class="titl">出行引导</h3>
      <ul class="mes_list">
        <li v-for="arr in msg_cx_arrs" :key="arr.id">
          <a :href="arr.href" target="_blank">{{arr.xx}}</a>
        </li>

      </ul>
    </div>
  </div>
  <Bottom></Bottom>
</div>

</template>

<script>
import Head from "../common/Head";
import Bottom from '../common/Bottom'
import img01 from "../../assets/images/banner_01.png";
import img02 from '../../assets/images/banner_02.png';
import img03 from '../../assets/images/banner_03.png';
export default {
  name: "home",
  data() {
    return {
      img_arrs: [
        {
          id: "001",
          img: img01,
        },
        {
          id: "002",
          img: img02
        },
        {
          id: "003",
          img: img03
        }
      ],
      msg_cx_arrs:[
        {
          id:'001',
          xx:'2018年5月15日至5月18日奥林匹克公园站封口、5月15日奥体中心站封站提示',
          href:'https://www.bjsubway.com/support/cxyd/cxts/2018-05-15/129099.html'
        },{
          id:'002',
          xx:'2018年5月6日奥体中心站封站、北土城封口提示',
          href:'https://www.bjsubway.com/support/cxyd/cxts/2018-05-07/129081.html'
        },{
          id:'003',
          xx:'2018年4月1日、4月5日天安门西、天安门东、前门三站临时封站提示',
          href:'https://www.bjsubway.com/support/cxyd/cxts/2018-03-29/129027.html'
        },{
          id:'004',
          xx:'2月17日至2月20日虎坊桥站临时封闭信息',
          href:'https://www.bjsubway.com/support/cxyd/cxts/2018-02-17/128970.html'
        }
      ],
       msg_dt_arrs:[
        {
          id:'001',
          xx:'时隔一年9号线、房山线再次提升运力',
          href:'https://www.bjsubway.com/news/qyxw/yyzd/2019-04-18/129327.html'
        },{
          id:'002',
          xx:'北京地铁公司全力做好清明运输工作',
          href:'https://www.bjsubway.com/news/qyxw/yyzd/2019-03-28/129317.html'
        },{
          id:'003',
          xx:'地铁公司春节期间运送乘客2260万人次',
          href:'https://www.bjsubway.com/news/qyxw/yyzd/2019-02-11/129301.html'
        },{
          id:'004',
          xx:'地铁公司多措并举保障13号线拨线工程施工期间运营稳定',
          href:'https://www.bjsubway.com/news/qyxw/yyzd/2019-01-28/129295.html'
        }
      ]
    };
  },
  components: {
    Head,
    Bottom
  }
};
</script>

<style scoped>
.img_box{
  text-align: center;
}
.message{
  display: flex;
  justify-content: space-between;
  width: 1200px;
  margin: 0 auto;
}
.titl{
  height: 75px;
  line-height: 75px;
  font-size: 18px;
  color: #04c3b3;
  font-weight: bold;
}
.mes_list li{
  height: 40px;
  line-height: 40px;
  width: 580px;
  padding-left: 10px;
  border-bottom: 1px dotted #ccc;
}
.mes_list li a{

  color:#333;
}


</style>
