<template>
    <div class="mb-5">
<div class="properties-s-widget">
							<h4 class="p-sidebar-title">ads </h4>
							<div class="r-view-inner" v-for="ads , index in uniques " :key="index">
								<!-- Sidebar Recent View -->
								<div class="single-r-view">
                                    <span v-for="image , i in ads.villa_image" :key="i">
									<img :src="image.path" alt="#" v-if="i==0" style="width:90px;height:85px">
                                    </span>
									<div class="r-view-content">
										<ul class="r-view-ratting list-none">
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star-half-alt"></i></li>
										</ul>
										<!-- <h5 class="r-view-title"><a  @click="ridirct(ads.id)" :to="{name:'pageDetails',params:{id:ads.id}}"> -->
										<h5 class="r-view-title"><a  @click="ridirct(ads.id)">
                                            {{ads.title}} <span class="badge badge-secondary">ads</span>
                                            </a> </h5>
										<p class="m-0">{{ads.price}}</p>

									</div>
								</div>

							</div>
						</div>
    </div>
</template>


<script>
export default {
data() {
    return {
        uniques:null,
    }
},
methods:{
      uniqeAds(){

      axios.get('api/ads/unique/details').then(res=>{
            this.uniques = res.data;
});
  },
        ridirct(event){
axios.get('/api/ads/details/'+event).then(res=>{
            this.offers = res.data;
                       this.$router.push({ name:'pageDetails',params:{id:event}});
                       location.reload();

});
      },
},
created() {
    this.uniqeAds();
},
}
</script>
