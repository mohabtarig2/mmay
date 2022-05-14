<template>
    <div class=" mb-4 container mt-5">
 <div class=" mb-4 row" :dir="$t('directions')" :class="$t('text_align')">

      <div v-for="(offers,index) in recents" :key="index" v-bind="recent" class="col-md-4 col-sm-12">

<div class="single-recent-property" v-for="offer ,index in offers.saved_villa " :key="index">
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

                                        <div class="property-ratting-save saved" >
											<a class="theme-color"><i class="fa fa-heart">saved</i></a>
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
                                    <a @click="undosaved(offer.id)"  class="btn btn-download"><small>إزالة من الفضلة </small></a>
								</div>
							</div>

       </div>

       </div>
    </div>
</template>

</<script>
export default {
data() {
    return {
        recents:null
    }
},
methods: {

    undosaved(event){
        let data = new FormData();
        data.append('villa_id',event)

          axios.post('api/villa/delete',data).then(res=>{
              this.savedid=res.data;
              this.villa()
          });
    },
    villa(){
        axios.get('api/saved/villa').then(res=>{
            this.recents=res.data.data;
        })
    }
},
created() {


    this.villa();
},
}
</script>
