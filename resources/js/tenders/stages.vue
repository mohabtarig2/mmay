<template>

            <div class="p-descrip-box" >
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
         <ul class="progressbar">
             <span v-if="stage==0" :dir="$t('directions')">
               <li class="active" style="background">استقبال العروض</li>
                <li>مرحلة التنفيذ </li>
          <li>اكتمال التنفيذ </li>
         
            

             </span>
             <span v-if="stage==1">
                  <li class="active" style="background">استقبال العروض</li>
                   <li class="active">مرحلة التنفيذ </li>
              <li>اكتمال التنفيذ </li>
         
         

             </span>

            <span v-if="stage==2">
                <li class="active" style="background">استقبال العروض</li>
          <li class="active">مرحلة التنفيذ </li>
           
             <li class="active">اكتمال التنفيذ </li>
             </span>
              <span v-if="stage==3">
                 <li class="active" style="background">استقبال العروض</li>
                    <li class="active">مرحلة التنفيذ </li>
                <li class="active">اكتمال التنفيذ </li>
       
           
             </span>



  </ul>
        </li>
  </ul>
</div>

</template>
<script>
export default {
props:{stage:Number}
}
</script>

<style scoped>


.progressbar {
      counter-reset: step;
      direction: rtl;
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
      border: 2px solid #34d195 ;
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
      background-color: #34d195 ;
      top: 15px;
      left: -50%;
          z-index: -1;


  }
  .progressbar li:first-child:after {
      content: none;
  }
  .progressbar li.active {
      color: #34d195 ;
  }
  .progressbar li.active:before {
       background-color: #34d195 ;
    color: #fff;
  }
  .progressbar li.active + li:after {
      background-color: #34d195 ;
  }



.list-group-flush > .list-group-item:last-child {
    border-bottom-width: 0;
    z-index: 0;
}



</style>
