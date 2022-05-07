<template>
    <div class="mt-3">
        

            <h3 class="h5 mt-4 font-weight-bold theme-color"> طريقة البناء </h3>
            <small class=" text-primary">
        <i class="fas fa-check-circle"></i>
            
 

     
            <span class="mr-2" v-if="typeBuild==1">  قرض</span>
   

           
            <span class="mr-2" v-if="typeBuild==2">  منحة</span>
     
    
   
           
    </small>
<div v-if="priceGrant">
    <h3 class="h5 mt-4 font-weight-bold theme-color"> قيمة القرض </h3>

    {{priceGrant}}
</div>
            <h3 class="h5 mt-4 font-weight-bold theme-color"> الجهة المقدمة للمنحة </h3>
    <small class=" text-primary">
        <i class="fas fa-check-circle"></i>
            <span class="" v-if="Provider==1">برنامج الشيخ زايد للاسكان</span>
 

     
            <span class="mr-4 ml-4" v-if="Provider==2">برنامج الشيخ محمد بن راشد للاسكان</span>
   

           
            <span class="mr-4 ml-4" v-if="Provider==3">برنامج ابوظبي للاسكان</span>
     
    
   
            <span class="mr-4 ml-4" v-if="Provider==4">برنامج الشارقة للاسكان</span>
    

            <span class="mr-4 ml-4" v-if="Provider==5">برنامج الشارقة للاسكان اسناد</span>

            <span class="mr-4 ml-4" v-if="Provider==6">  الديوان</span>
    </small>
<div v-if="BankProvider">
    <h3 class="h5 mt-4 font-weight-bold theme-color"> البنك الممول للمنحة </h3>

    {{BankProvider}}
</div>

    </div>
</template>

<script>
export default {
    props:{Provider:Number,typeBuild:Number,priceGrant:String,BankProvider:String}

    
}
</script>