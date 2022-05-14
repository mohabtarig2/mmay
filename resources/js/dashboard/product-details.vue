<template>
<div>
<div class="container"  :dir="$t('directions')" :class="$t('text_align')">
    <div class="card" v-for="request , index in requests" :key="index">
        <div class=" h5 mb-3 title">
          <router-link :to="'/offer/details/'+request.villa.id"> {{request.villa.title}}</router-link>
        </div>
        <div class="list-item">
        <span><i  class="fa fa-bookmark grey"></i>   رقم الطلب : {{request.id}}</span>
        <span><i  class="fa fa-user grey"></i>    البائع : {{request.company.name}}</span>

        <span><i  class="fa fa-money grey"></i>  الفيلا : {{request.villa.price}}{{$t('aed')}}</span>
        <span> <i  class="fa fa-clock grey"></i>وقت الطلب :{{request.added_at}}</span>
        <div class="card-body ">

            <div class="h5">الملفات </div>
            <span class="image-container">
                   <label> الهوية</label>
            <img :src="request.passport_path" width="50" >
            <a  class="btn btn-light" :href="request.passport_path" download> <i class="fa fa-arrow-down"></i> </a>

             <label> خارطة الارض </label>


            <img :src="request.map_path" width="50">
            <a :href="request.map_path" download class="btn btn-light"> <i class="fa fa-arrow-down"></i> </a>

            </span>

            <div class="h5 mt-4"> طريقة الدفع</div>
            <div>
                <span class="badge green-badge" v-if="request.bank =='true'">
                    <i class=" fa fa-check-circle-o"></i>
                    {{$t('bank')}}

                </span>

                 <span class="badge green-badge" v-if="request.spicel_agent =='true'">
                     <i class=" fa fa-check-circle-o"></i>
                     {{$t('spicel_agent')}}
                    \
                </span>
                <span class="badge green-badge" v-if="request.Program =='true'">
<i class=" fa fa-check-circle-o"></i>
                    {{$t('mbr')}}
                </span>

                 <span class="badge green-badge" v-if="request.shiekh =='true'">
                            <i class=" fa fa-check-circle-o"></i>
                                        {{$t('szp')}}

                </span>

                    <span class="badge green-badge" v-if="request.other =='true'">
                        <i class=" fa fa-check-circle-o"></i>
                     {{$t('other')}}
                </span>


            </div>

              <div class="h5 mt-4">  التواصل</div>
              <div class="contact">
                  <span class="btn btn-light">{{request.user.email}}</span>
                  <span class="btn btn-light" @click="visible(request.user.mobile,request.user.id)">{{request.user.mobile}}</span>

              </div>



        </div>

        </div>
    </div>
</div>
</div>
</template>

<script>
export default {
data(){
    return{
        request_id :this.$route.params.id,
        requests:null,
        number:'+971 xx xxx x xx xx'
    }
},
methods:{

    getRequester(){
        axios.get('requesterclients/'+this.request_id).then(res=>{
        this.requests = res.data;
        })
    }
},
created(){
    this.getRequester();
}
}
</script>

<style scoped>
.card{
    padding: 20px;
}
.grey{
    color: #ccd1e1;
}
.list-item span{
padding: 10;
}

.image-container {

display: block;
position: relative;
border: 1px solid #eee;





}
.image-container img{
     width: 6.25rem;
    height: 6.25rem;
    overflow: hidden;

}
.green-badge{
background: rgba(37, 181, 121,0.1);
    color: #25b579;
}
/* .image-container .after {
 position: absolute;
  display: none;
    justify-content: center;
    align-items: center;
      top: 0;
    left: 0;
    right: 0;

    width: 6.25rem;
    height: 6.25rem;

    color: #FFF;
    transition: all 0.5s ease-in-out ;
}
.image-container:hover .after {
    display: flex;
    background: rgba(86, 71, 71, 0.5);
    transition: all 0.5s ease-in-out ;
    cursor: pointer;

} */
</style>
