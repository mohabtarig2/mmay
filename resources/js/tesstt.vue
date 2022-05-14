<template>
    <div>



<div class="col-md-6 col-sm-12">
                <div class="font-weight-bold h6 mt-3 text-right thm-color">     شكل تصميم الفيلا</div>

 <div class="form-group shapeVilla" style="display: flex;">
   <h4  @click="VillaShape('H')" :class="{'checked':square=='H'}">
     H
     
   </h4>

   <h4 @click="VillaShape('L')" :class="{'checked':square=='L'}"> L</h4>
   <h4 @click="VillaShape('U')" :class="{'checked':square=='U'}"> U</h4>
   <h4 @click="VillaShape('F')" :class="{'checked':square=='F'}"> F</h4>
   <h4 @click="VillaShape('square')" :class="{'checked':square=='square'}"
   ><p class="square" :class="{'checked':square==4}"></p></h4>
   <br>
<!-- <div>
    <small @click="VillaShape('other')" class="btn btn-download "
     :class="{'checked':square=='other'}"> نوع اخر</small>

<br>
    <input v-model="other" v-show="square=='other'" placeholder='اكتب شكل الفيلا'>
   

</div> -->



  </div>

</div>



    </div>
</template>



<script>
export default {
  data:{
    return:{
      square:'H',  
    }
  },
    mounted() {

           

             
                $('.header-inner').addClass('d-none');
                // $('.header-inner').addClass('d-block');
        },
    methods:{
		   VillaShape(event){
      this.square=event
      console.log(this.square)
    },
	}
}
</script>


<style scoped>
@import url(https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap);body {
  font-family: "Roboto", sans-serif;
  background: #EFF1F3;
  min-height: 100vh;
  position: relative;
}

.section-50 {
  padding: 50px 0;
}

.m-b-50 {
  margin-bottom: 50px;
}

.dark-link {
  color: #333;
}

.heading-line {
  position: relative;
  padding-bottom: 5px;
}

.heading-line:after {
  content: "";
  height: 4px;
  width: 75px;
  background-color: #29B6F6;
  position: absolute;
  bottom: 0;
  left: 0;
}

.notification-ui_dd-content {
  margin-bottom: 30px;
}

.notification-list {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
      -ms-flex-pack: justify;
          justify-content: space-between;
  padding: 20px;
  margin-bottom: 7px;
  background: #fff;
  -webkit-box-shadow: 0 3px 10px rgba(0, 0, 0, 0.06);
          box-shadow: 0 3px 10px rgba(0, 0, 0, 0.06);
}

.notification-list--unread {
  border-left: 2px solid #29B6F6;
}

.notification-list .notification-list_content {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
}

.notification-list .notification-list_content .notification-list_img img {
  height: 48px;
  width: 48px;
  border-radius: 50px;
  margin-right: 20px;
}

.notification-list .notification-list_content .notification-list_detail p {
  margin-bottom: 5px;
  line-height: 1.2;
}

.notification-list .notification-list_feature-img img {
  height: 48px;
  width: 48px;
  border-radius: 5px;
  margin-left: 20px;
}

.shapeVilla h4{
  
  padding: 5px;
  margin-left: 5px;
  margin-right: 5px;
  border:1px solid rgb(155, 155, 155);
  background: #fff;
  border-radius: 10px;
  cursor: pointer;
}
.shapeVilla h4.checked , p.checked{

  border:1px #0ed678 solid;
  color: #0ed678;

}
.square {

    height: 20px;
    width: 20px;
    border: 2px solid black;
    border-radius: 5px;

}


</style>