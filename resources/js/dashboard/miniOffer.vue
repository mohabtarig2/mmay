<template>
     <div >



    <!-- <a @click="$router.go(-1)" style="cursor:pointer" class="text-dark"><i class="fa fa-arrow-left  mb-3 fa-1x"></i></a> -->




<h1 class="  mb-2 text-center mt-3  mb-0">اخر اعلانات تمت اضافتها  </h1>

 <div class=" mb-4 row" :dir="$t('directions')" :class="$t('text_align')">
      <div v-for="(offer,index) in recents.data" :key="index" v-bind="recent" class="col-md-4 col-sm-12">

    <!-- <div class="links">



 <a @click="directTo(recent.id)" >

        <div class="h5 font-weight-bold ">{{recent.title}}
        <sup v-if="recent.confirmed==0" class="badge badge-dark"></sup>
        <sup v-if="recent.confirmed==1" class="badge badge-success"></sup>
        <sup v-if="recent.confirmed==2" class="badge badge-danger"></sup>
         </div >

<!--  -->

<div class="single-recent-property">
								<div class="single-r-property-top">
									<!-- Recent Property Img -->
									<div class="single-r-property-img" v-for="image , i in offer.villa_image" :key="i">
										<img :src="image.path" alt="#"  class="image_villa"  v-if="i==0">
									</div>
									<div class="property-for-sale">
                                        <status :status="offer.confirmed"></status>
										<ul class="list-none">
											<li><a >{{offer.type_villa==1 ? $t('classic')  : $t('modern')}}</a></li>
											<li class="unique "  ><a href="#" >{{$t('unique')}}</a></li>

										</ul>
									</div>
									<!-- Property Ratting -->
									<div class="property-ratting">
										<div class="property-ratting-left">
											<span class="p-ratting-point">4.5</span>
											<div class="p-ratting-details">
												<ul class="ratting-details-star list-none">
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star-half-alt"></i></li>
												</ul>
												<span>2 Comment</span>
											</div>
										</div>
										<div class="property-ratting-save" >
											<a @click="saved(offer.id)"><i class="fa fa-heart"></i>Save</a>
										</div>
									</div>
								</div>
								<!-- Single Recent Content -->
								<div class="s-property-content">
									<h3 class="srp-title hs-4"><router-link :to="{name:'pageDetails',params:{id:offer.id}}">{{offer.title}}</router-link></h3>
									<p class="property-location mb-0"><i class="fa fa-map-marker-alt"></i>
                                    <all-uae :emirates="offer.Emirates"></all-uae></p>

									<div class="single-r-property-bed">
										<ul class="single-bed-property list-none">
											<li>
                                                <a @click="Singlefillter('room',offer.type_villa)">
                                                <b>{{offer.rooms}}</b>
                                                <span><i class="bx bxs-bed"></i></span>
                                                </a>
                                                 </li>
											<li><a @click="Singlefillter('bath',offer.bathroom)"><b>{{offer.bathroom}}</b>
                                            <span><i class="bx bxs-bath"></i></span>
                                            </a>
                                            </li>
											<li><b>{{offer.sqft}}</b><span><i class="fas fa-arrows-alt"></i></span></li>
										</ul>
									</div>
									<!-- Property User -->
									<div class="property-user"  v-for="company , index in offer.company "
                                                :key="index">
										<div class="property-user-left">
											<img :src="company.avatar" alt="#" class="rounded-circle" width="40" height="40">
											<div class="property-user-title">
												<p class="at-title mb-0 hs-6"><a href="#">{{company.name}}</a></p>
												<span>company</span>
											</div>
										</div>
										<div class="property-user-price">
											<small><p>{{offer.price}}</p></small>
										</div>
									</div>
								</div>
							</div>

       </div>
       <router-link class="theme-btn primary mx-auto mt-3 d-block mb-3" :to="{name:'alloffers'}"> {{$t('all')}} </router-link>
       </div>



 </div>



</template>


<script>
import Status from '../admin/status.vue';
import AllUae from '../auth/AllUae.vue';
import recent from '../v-dash/recent.vue';
import Listproject from './listproject.vue';
export default {
  components: { recent, Listproject, AllUae, Status },

    data () {

        return {
            form:{
                title: '',
                desc: '',
                Emirates: '',
                villa: '',


              },

              photo:'',
              loading:false,
              ret:null,
              status:null,
              errors:null,
              recents:null,
             successPost: false,
             alert:'d-none',
             isDragging:false,
             counter:0,
            files:[],
            images:[],
            FileNotAllowd:'',
            Post:'Post',
            }
    },
    created(){

        this.detailsTender();


    },
    methods:{
        directTo(id){

 this.$router.push({ path: `/myads/details/${id}`});
        },

 detailsTender(page ){
          axios.get("/api/Ads_mini?page="+page).then(response=>{
        this.recents = response.data;
        this.loading = false;
         })
         },
    }
}
</script>
<style scoped>
.page-link {
    z-index: 2;
    color: #dc3545;
    text-decoration: none;
    background-color: #e9ecef;
    border-color: #dee2e6;
}
.page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #dc3545 !important;
    border-color: #dc3545 !important;
}

</style>

<style  scoped>
    .links{
        cursor:pointer;
        padding: 20px;
    }
    .links:hover{
        background: #eee;
        cursor:pointer;
        width: 100%;
    }
    .badge-success {

    background-color: #38c172;

         height:10px;
  width: 10px;
  border-radius: 50%;
  display: inline-block;
}
   .badge-danger {

    background-color: #e91919;

         height:10px;
  width: 10px;
  border-radius: 50%;
  display: inline-block;
}

 .badge-warning {

    background-color: #fda430;

         height:10px;
  width: 10px;
  border-radius: 50%;
  display: inline-block;
}

</style>
