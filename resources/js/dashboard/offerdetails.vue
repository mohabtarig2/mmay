<template>
<div class="container">
<construction-offer-detials  v-if="IsUser==6 || IsUser==4 || IsUser==3 || IsUser==5"></construction-offer-detials>
    <div v-if="IsUser==1">
    <a @click="$router.go(-1)" style="cursor:pointer" class="text-dark"><i class="fa fa-arrow-left  mb-3 fa-1x"></i></a>
     <div id="editPostModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
<img :src="src">
            <a :href="src" download class="text-center font-weight-bold text-dark"><i class="fa fa-arrow-down"></i> donwload</a>

        </div>
      </div>
    </div>


<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" >
  <div class="carousel-inner">
<span v-for="ads , index in adss" :key="index" v-bind="ads">

    <div class="card container">
        <div class="card-body">
        <p class="h2 main-color">{{ads.title}}</p>

 <div class="flex-container" >



    <div v-for="image , i in ads.villa_image " :key="i" >

              <a href="#editPostModal"  data-toggle="modal" @click="pick(image.path)">
        <img :src="image.path" class=" w-100 diispaly"  style="cursor:pointer" id="#editPostModal">
              </a>

    </div>

    </div>

     <p class="font-weight-bold">Description</p>
        {{ads.Description}}
        </div>
    </div>
</span>
  </div>
</div>

  </div>
</div>

</template>


<script>
import constructionOfferDetials from './constructionOfferDetials.vue';
export default {
  components: { constructionOfferDetials },
data(){
    return{
     ads_Id :this.$route.params.id,
     adss:null,
     src:null,
    }
},
    created() {
        axios.get('/api/ads/details/'+this.$route.params.id).then(res=>{
            this.adss = res.data;
        })
    },
    methods: {
        pick(src){

            this.src=src;

        }
    },
      computed: {

     IsUser(){
            return this.$store.getters.IsUser
        },

  },

}

</script>

<style  scoped>
.flex-container {
  display: flex;
  flex-wrap: nowrap;

}

.flex-container > div {
  width: 100%;
  margin: 10px;
  text-align: center;
}
.diispaly{
    width: 200px;
}
</style>
