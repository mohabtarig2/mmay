<template>
<div>
        <!-- <div class="preloader">
        <div class="loading">
            <div class="loader-line"></div>
            <div class="loader-line"></div>
            <div class="loader-line"></div>
            <div class="loader-line"></div>
            <div class="loader-line"></div>
            <div class="loader-line"></div>
            <div class="loader-line"></div>
            <div class="loader-line"></div>
        </div>
    </div> -->
    <!-- End Preloader -->

	<!-- End Header Area -->

	<!-- Breadcrumbs Area -->

	<section class="breadcrumbs-area" style="background-image:url('img/breadcrumbs-bg.jpg');">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Breadcrumbs Content -->
					<div class="breadcrumbs-content">
						<h1 class="b-content-title m-0"></h1>
						<ul class="breadcrumbs-menu list-none">
							<li></li>
							<li><a href=""></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Breadcrumbs Area -->
	<villa-finder :emirats="location" :bed="bed" :type="type"></villa-finder>



	<!-- Property List -->
	<div v-if="loading">
<loading></loading>
	</div>
	<section class="property-list-area section-padding" v-else>
		<div class="container">
			<div class="row">
				<div class=" col-12" :class="{'col-lg-8':row=='row','col-lg-8':row==''}">
					<!-- Property Filter -->
					<div class="list-filter property-filter">
						<!-- Property Filter Title -->
						<h4 class="l-filter-title m-0"> {{tender.length}}: النتائج </h4>
						<ul class="filter-item-list list-none">
							<!-- <li class="filter-save"><a href="#"><i class="fa fa-heart"></i>Save Search</a></li> -->
							<li class="filter-grid visible-xs" :class="{'active':row=='row'}"><a @click="grid"><i class="fa fa-th"></i></a></li>
							<li class=" filter-grid " :class="{'active':row==''}"><a @click="list"><i class="fa fa-list"></i></a></li>
							<li class="filter-sort">
							
							</li>
						</ul>
					</div>
					<!-- End Property Filter -->
					<!-- Single Recent Property -->
					<div v-show="row=='row'">
				<div class="row" v-for="row in rows" :key="'row'+row">
					<div class="col" v-for="(offer,column) in OfferRow(row)" :key="'row'+row+column">
	
						
			
					<div class="single-recent-property  m-b-30" :class="s_property_list" >
						<div class="single-r-property-top">
							<!-- Recent Property Img -->
							<div class="single-r-property-img" v-for="image , i in offer.villa_image" :key='i' x>
								<router-link  :to="{name:'pageDetails',params:{id:offer.id}}">
								<img :src="image.path" v-if="i==0" alt="#"  style="width:370px; height:280px !important">
								</router-link>
							</div>
							<div class="property-for-sale">
								<ul class="list-none">
									<li><a href="#">Hot</a></li>
									<li class="active">
                                       <a href="#">{{offer.type_villa==1 ? $t('classic')  : $t('modern')}}</a></li>
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
										<!-- <span>2 Comment</span> -->
									</div>
								</div>
									<div class="property-ratting-save" v-if="offer.saved_villa==null">
											<a @click="saved(offer.id)" ><i class="fa fa-heart"></i><span class="visible-xs">
												{{$t('save')}}</span></a>
										</div>
                                        <div class="property-ratting-save saved" v-else>
											<a @click="undosaved(offer.id)" class="theme-color"><i class="fa fa-heart"></i>
											{{$t('Saved')}}</a>
										</div>
							</div>
						</div>
						<!-- Single Recent Content -->
						<div class="s-property-content">
							<h3 class="srp-title hs-4"><router-link  :to="{name:'pageDetails',params:{id:offer.id}}">
                                        {{offer.title}}</router-link></h3>
							<p class="property-location mb-0"><i class="fa fa-map-marker-alt">
                                </i>     <all-uae :emirates="offer.Emirates"></all-uae></p>
							<div class="single-r-property-bed">
								<ul class="single-bed-property list-none">
									<li><b>{{offer.rooms}}</b><span><i class="fa fa-bed"></i></span></li>
									<li><b>{{offer.bathroom}}</b><span><i class="fa fa-shower"></i></span></li>
									<li><b>{{offer.floors}}</b><span><i class="fa fa-warehouse"></i></span></li>
								</ul>
							</div>
							<!-- Property User -->
							<div class="property-user" v-for="company , index in offer.company" :key='index'>
								<div class="property-user-left">
									                                            <router-link :to="{name:'CompanyProfile',params:{id:company.id,type:'consulting'}}">

									<img :src="company.avatar" class="rounded-circle" alt="#" width="40" height="40">
									<div class="property-user-title">
										<p class="at-title mb-0 hs-6" >
                                                {{company.company.company_en}}
											</p>
										
									</div>
									</router-link>
								</div>
								<div class="property-user-price">
									<p>{{offer.price}}</p>
								</div>
							</div>
						</div>
					</div>
						
					</div>
								<div class="col" v-for="p in placeHolder(row)" :key="'placeholder'+row+p"></div>


				</div>

</div>
					
					<div v-for="offer , index in tender " :key="index"  v-show="row==''">
						
			
					<div class="single-recent-property  m-b-30" :class="s_property_list" >
						<div class="single-r-property-top">
							<!-- Recent Property Img -->
							<div class="single-r-property-img" v-for="image , i in offer.villa_image" :key='i' >
								<router-link  :to="{name:'pageDetails',params:{id:offer.id}}">
								<img :src="image.path" v-if="i==0" alt="#"  style="width:370px; height:280px !important">
								</router-link>
							</div>
							<div class="property-for-sale">
								<ul class="list-none">
									<li><a href="#">Hot</a></li>
									<li class="active">
                                       <a href="#">{{offer.type_villa==1 ? $t('classic')  : $t('modern')}}</a></li>
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
								<div class="property-ratting-save" v-if="offer.saved_villa==null">
											<a @click="saved(offer.id)" ><i class="fa fa-heart"></i><span class="visible-xs">
												{{$t('save')}}</span></a>
										</div>
                                        <div class="property-ratting-save saved" v-else>
											<a @click="undosaved(offer.id)" class="theme-color"><i class="fa fa-heart"></i>
											{{$t('saved')}}</a>
										</div>
							</div>
						</div>
						<!-- Single Recent Content -->
						<div class="s-property-content">
							<h3 class="srp-title hs-4"><router-link  :to="{name:'pageDetails',params:{id:offer.id}}">
                                        {{offer.title}}</router-link></h3>
							<p class="property-location mb-0"><i class="fa fa-map-marker-alt">
                                </i>     <all-uae :emirates="offer.Emirates"></all-uae></p>
							<div class="single-r-property-bed">
								<ul class="single-bed-property list-none">
									<li><b>{{offer.rooms}}</b><span><i class="fa fa-bed"></i></span></li>
									<li><b>{{offer.bathroom}}</b><span><i class="fa fa-shower"></i></span></li>
									<li><b>{{offer.floors}}</b><span><i class="fa fa-warehouse"></i></span></li>
								</ul>
							</div>
							<!-- Property User -->
							<div class="property-user" v-for="company , index in offer.company" :key='index'>
								<div class="property-user-left">
									<router-link :to="{name:'CompanyProfile',params:{id:company.id,type:'consulting'}}">
									<img :src="company.avatar" class="rounded-circle" alt="#" width="40" height="40">
									<div class="property-user-title">
										<p class="at-title mb-0 hs-6" >
                                               
									{{company.company.company_en}}
                                              
                                              </p>
											  

										
									</div>
									</router-link>
								</div>
								<div class="property-user-price">
									<p>{{offer.price}}</p>
								</div>
							</div>
						</div>
					</div>
						
					</div>
					
				

				
					<!-- End Single Recent Property -->
					<!-- Single Recent Property -->

					<!-- End Single Recent Property -->
					<div class="col-12">
					<!-- Start Pagination -->
				           <pagination :data="tender" @pagination-change-page="getVillas"></pagination>

					<!-- End Pagination -->
				</div>
				</div>
				<div class="col-lg-4 col-12" :class="none">
					<!-- Property Sidebar -->
					<div class="properties-sidebar">
						<!-- Property Sidebar Widget -->
						<div class="properties-s-widget m-b-30"  >
							<h4 class="p-sidebar-title">Unique Ads</h4>

							<slick :v-bind="settings" class="properties-s-slider" v-if="randomOffers.length">
								<!-- Sidebar Slider Widget -->
								<div class="sidebar-s-widget"  v-for="offer , index in randomOffers " :key="index">
										<router-link  :to="{name:'pageDetails',params:{id:offer.id}}" style="cursror:pointer">
									 <span v-for="image , i in offer.villa_image" :key="i">
										
									<img :src="image.path" alt="#" v-if="i==0" class="uinque-image">
                                    </span>
									<div class="property-for-sale">
										<ul class="list-none">
											<li><a href="#">Hot</a></li>
											<li class="active"><a href="#">ads</a></li>
										</ul>
									</div>
									<h4 class="p-sidebar-price m-0">{{offer.price}}</h4>
									</router-link>

								</div>
								<!-- Sidebar Slider Widget -->

							</slick>

						</div>
						<!-- Property Sidebar Widget -->
						<div class="properties-s-widget">
							<h4 class="p-sidebar-title">ads </h4>
							<div class="r-view-inner" v-for="ads , index in randomOffers " :key="index">
								<!-- Sidebar Recent View -->
								<router-link  :to="{name:'pageDetails',params:{id:ads.id}}" style="cursror:pointer">

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
								</router-link>

							</div>
						</div>
						<!-- End Property Sidebar Widget -->
					</div>
					<!-- End Property Sidebar -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Property List -->
			<div class='content d-none'>

<div class="alert alert-success alert-white rounded">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <div class="icon"><i class="fa fa-check"></i></div>
    <strong>تم الحفظ بنجاح</strong>
</div>

</div>

	<!-- Call To Action Area -->

</div>
</template>

<script>
import AllUae from './AllUae.vue';
import Slick from 'vue-slick-carousel';
import Loading from './loading.vue';
import VillaFinder from '../VillaFinder.vue';
export default {
components:{Slick , AllUae, Loading, VillaFinder},
data() {
    return {
		loading:true,
		s_property_list:'s-property-list',
		col:'',
		row:'',
		none:'',
		columns:3,
          settings:{


dots: true,
arrows:false,
  fade: true,
  infinite: true,
speed: 500,
  slidesToShow: 1,
    slidesToScroll: 1
          },
        location :this.$route.params.location,
        type :this.$route.params.type,
        bed :this.$route.params.bed,
         bath :this.$route.params.bath,
         tender:null,
         randomOffers:null,
		 savedid:null,
    }
},
computed:{
rows(){
return this.tender===null?0:Math.ceil(this.tender.length / this.columns)
}
},
methods:{
	    saved(event){
        let data = new FormData();
        data.append('villa_id',event)
          axios.post('api/villa/saved',data).then(res=>{
              this.savedid=res.data;
			         $('.content').removeClass('d-none');

				setInterval(function ()
				 {
					 $('.content').addClass('d-none');
					 },
				  3000);
              this.getVillas()
			
          });
    },
    undosaved(event){
        let data = new FormData();
        data.append('villa_id',event)

          axios.post('api/villa/delete',data).then(res=>{
              this.savedid=res.data;
              this.getVillas()
          });
    },
	OfferRow(row){
		return this.tender.slice((row-1) *  this.columns , row * this.columns)
	},
	placeHolder(row){
		return this.columns - this.OfferRow(row).length;
	},
	grid(){
		this.row="row"
		this.col='col-lg-4 col-md-6 col-12'
		this.s_property_list=''
		this.none="d-none"
	},
	list(){
			this.row=""
		this.col=''
		this.s_property_list='s-property-list'
		this.none=""
	},
    getVillas(page=1){


    axios.get(`api/filterOffers/${this.location}/${this.type}/${this.bed}?page ='${page}`).then(res=>{
        this.tender=res.data.data;
    })


    },
    getrandomOffers(){
        axios.get('api/randomOffers').then(res=>{
            this.randomOffers=res.data;
        })
    }
},
  mounted() {
                $('.header-inner').removeClass('d-none');
              // $('.header-inner').addClass('d-block');
  $('#exampleModalCenter').modal('hide');
	$('.modal-backdrop').css('display','none');

        },
created() {
	this.loading=false,
    this.getVillas();
    this.getrandomOffers();
},
}
</script>


<style >
.slick-slide {

    float: left;
    height: auto !important;
    min-height: 1px;
}
.filter-grid a {

    display: flex;
    justify-content: center;
    align-items: center;
}
.uinque-image{
    width:290px;height:250px !important;
}
.content {
    padding:0;
	top:5%;
	left:1%;
	position: fixed;
	z-index: 6;
}

.close {
    float: right;
    font-size: 21px;
    font-weight: bold;
    line-height: 1;
    color: #000;
    text-shadow: 0 1px 0 #fff;
    opacity: .2;
}

.content {
    padding:0;
	top:5%;
	left:1%;
	position: fixed;
	z-index: 6;
}

.close {
    float: right;
    font-size: 21px;
    font-weight: bold;
    line-height: 1;
    color: #000;
    text-shadow: 0 1px 0 #fff;
    opacity: .2;
}

.close:hover,.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
    opacity: .5;
}

button.close {
    padding: 0;
    cursor: pointer;
    background: transparent;
    border: 0;
    -webkit-appearance: none;
}

.alert {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
}

.alert h4 {
    margin-top: 0;
    color: inherit;
}

.alert .alert-link {
    font-weight: bold;
}

.alert>p,.alert>ul {
    margin-bottom: 0;
}

.alert>p+p {
    margin-top: 5px;
}

.alert-dismissable {
    padding-right: 35px;
}

.alert-dismissable .close {
    position: relative;
    top: -2px;
    right: -21px;
    color: inherit;
}

.alert-success {
    background-color: #dff0d8;
    border-color: #d6e9c6;
    color: #3c763d;
}

.alert-success hr {
    border-top-color: #c9e2b3;
}

.alert-success .alert-link {
    color: #2b542c;
}

.alert-info {
    background-color: #d9edf7;
    border-color: #bce8f1;
    color: #31708f;
}

.alert-info hr {
    border-top-color: #a6e1ec;
}

.alert-info .alert-link {
    color: #245269;
}

.alert-warning {
    background-color: #fcf8e3;
    border-color: #faebcc;
    color: #8a6d3b;
}

.alert-warning hr {
    border-top-color: #f7e1b5;
}

.alert-warning .alert-link {
    color: #66512c;
}

.alert-danger {
    background-color: #f2dede;
    border-color: #ebccd1;
    color: #a94442;
}

.alert-danger hr {
    border-top-color: #e4b9c0;
}

.alert-danger .alert-link {
    color: #843534;
}

.alert {
    border-radius: 0;
    -webkit-border-radius: 0;
    box-shadow: 0 1px 2px rgba(0,0,0,0.11);
}

.alert .sign {
    font-size: 20px;
    vertical-align: middle;
    margin-right: 5px;
    text-align: center;
    width: 25px;
    display: inline-block;
}

.alert-success {
    background-color: #dbf6d3;
    border-color: #aed4a5;
    color: #569745;
}

.alert-info {
    background-color: #d9edf7;
    border-color: #98cce6;
    color: #3a87ad;
}

.alert-warning {
    background-color: #fcf8e3;
    border-color: #f1daab;
    color: #c09853;
}

.alert-danger {
    background-color: #f2dede;
    border-color: #e0b1b8;
    color: #b94a48;
}

.alert-white {
    background-image: linear-gradient(to bottom,#FFFFFF,#F9F9F9);
    border-top-color: #d8d8d8;
    border-bottom-color: #bdbdbd;
    border-left-color: #cacaca;
    border-right-color: #cacaca;
    color: #404040;
    padding-left: 61px;
    position: relative;
}

.alert-white .icon {
    text-align: center;
    width: 45px;
    height: 100%;
    position: absolute;
    top: -1px;
    left: -1px;
    border: 1px solid #bdbdbd;
}

.alert-white .icon:after {
    -webkit-transform: rotate(45deg);
    -moz-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    -o-transform: rotate(45deg);
    -webkit-transform: rotate(45deg);
    display: block;
    content: '';
    width: 10px;
    height: 10px;
    border: 1px solid #bdbdbd;
    position: absolute;
    border-left: 0;
    border-bottom: 0;
    top: 50%;
    right: -6px;
    margin-top: -5px;
    background: #fff;
}

.alert-white.rounded {
    border-radius: 3px;
    -webkit-border-radius: 3px;
}

.alert-white.rounded .icon {
    border-radius: 3px 0 0 3px;
    -webkit-border-radius: 3px 0 0 3px;
}
.alert-white .icon i {
    font-size: 20px;
    color: #FFF;
    left: 12px;
    margin-top: -10px;
    position: absolute;
    top: 50%;
}

.alert-white.alert-danger .icon,.alert-white.alert-danger .icon:after {
    border-color: #ca452e;
    background: #da4932;
}

.alert-white.alert-info .icon,.alert-white.alert-info .icon:after {
    border-color: #3a8ace;
    background: #4d90fd;
}

.alert-white.alert-warning .icon,.alert-white.alert-warning .icon:after {
    border-color: #d68000;
    background: #fc9700;
}

.alert-white.alert-success .icon,.alert-white.alert-success .icon:after {
    border-color: #54a754;
    background: #60c060;
}

</style>
