<template>
<div class="d-inline">
     <span class="project-state" v-if="status==0">
                          <span class="badge badge-warning">تحت المراجعة</span>
                      </span>
  <span class="project-state" v-else-if="status==1">
                          <span class="badge badge-success">مفتوح</span>
             </span>


                       <span class="project-state" v-else-if="status==2">
                          <span class="badge badge-success">قيد التنفيذ</span>
                      </span>

                       <span class="project-state" v-else-if="status==3">
                          <span class="badge badge-success">اكتمال</span>
                      </span>

                        <span class="project-state" v-else-if="status==4">
                          <span class="badge badge-secondary">مسودة</span>
                      </span>
                       <span class="project-state" v-else-if="status==5">
                          <span class="badge badge-secondary">مغلق</span>


</span>

<span class="project-state" v-else-if="status==6">
                          <span class="badge badge-danger">مرفوض</span>


</span>
</div>

</template>
<script>
export default {
props:{status:Number}
}
</script>

<style scoped>


.progressbar {
      counter-reset: step;
  }
  .progressbar li {
      list-style-type: none;
      width: 33%;
      float: left;
      font-size: 12px;
      position: relative;
      text-align: center;
      text-transform: uppercase;
      color: #7d7d7d;
  }
  .progressbar li:before {
      width: 30px;
      height: 30px;
      content: counter(step);
      counter-increment: step;
      line-height: 30px;
      border: 2px solid #1d67cb;
      display: block;
      text-align: center;
      margin: 0 auto 10px auto;
      border-radius: 50%;
      background-color: white;
      z-index: 1;
  }

  .progressbar li:after {
      width: 100%;
      height: 2px;
      content: '';
      position: absolute;
      background-color: #1d67cb;
      top: 15px;
      left: -50%;

  }
  .progressbar li:first-child:after {
      content: none;
  }
  .progressbar li.active {
      color: #1d67cb;
  }
  .progressbar li.active:before {
       background-color: #1d67cb;
    color: #fff;
  }
  .progressbar li.active + li:after {
      background-color: #1d67cb;
  }



.list-group-flush > .list-group-item:last-child {
    border-bottom-width: 0;
    z-index: 0;
}



</style>
