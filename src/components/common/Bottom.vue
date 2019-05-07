<template>
<div class="bottom ver">
  <div>地铁服务热线：010-96165</div>
  <div>版权所有 北京市地铁运营有限公司 京ICP备12042668号-1</div>
  <div>网站建设：北京市艺彩昭和企业形象设计有限责任公司</div>
</div>
</template>

<script>
export default {
  name:'bottom'
}
</script>

<style scoped>
.ver{
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}
.bottom{
  width: 1200px;
  height: 150px;
  margin: 10px auto;
  background: #2cada3;
}
div{
  color:#fff;
  font-size: 16px;
  height: 30px;
  line-height: 30px;
}

</style>


