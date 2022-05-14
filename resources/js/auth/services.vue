<template>
    <div>
			<!-- Breadcrumbs Area -->
	<section class="breadcrumbs-area" style="background-image:url('img/breadcrumbs-bg.jpg');">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Breadcrumbs Content -->

					<div class="breadcrumbs-content">
						<h1 class="b-content-title m-0">
								{{type=="consulting" ? $t('consulting_company'):''}}
                                {{type=="construction" ? $t('construcion_company'):''}}
                                {{type=="hvac" ? $t('HVAC_companies'):''}}
                                {{type=="stone" ? $t('Stone_companies'):''}}
                                {{type=="interior" ? $t('interior_companies'):''}}
							 </h1>
						<ul class="breadcrumbs-menu list-none">
						
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="blog-area section-padding">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
					<div class="section-title">
						<span class="sub-heading">خدمات</span>
						<h2 class="heading-title">
							
							خدمات 
							{{type=="consulting" ? $t('consulting_company'):''}}
                                {{type=="construction" ? $t('construcion_company'):''}}
                                {{type=="hvac" ? $t('HVAC_companies'):''}}
                                {{type=="stone" ? $t('Stone_companies'):''}}
                                {{type=="interior" ? $t('interior_companies'):''}}
							
							</h2>
					</div>
				</div>
			</div>
			

			
<!-- {{more}}{{count}} -->
			<div class="row" v-for="row in rows" :key="'row'+row">
				
					<div class="col" v-for="(ads,column) in OfferRow(row)" :key="'row'+row+column">
					<div class="blog-slider" >
						<!-- Single Blog -->
						<div class="single-blog">
							<div class="blog-img" v-for="image , i in ads.image" :key="i">
									
					<img  :src="image.path"  v-if="i==0" >
				
		
							</div>
							<div class="blog-content">
								<div class="blog-meta">
									<!-- <a href="#"><i class="fa fa-calendar-alt"></i>05 Jan,2021</a> -->
									<a href="#"><i class="fa fa-tag"></i>{{ads.title}}</a>
								</div>
								<p class="blog-title fs-18">
									<router-link :to="{name:'CompanyAdsDetails',params:{type:type,id:ads.id}}">
									
									{{ads.description.substr(0,70 )}}...
									</router-link>
									</p> 
								<div class="blog-admin"  >
									<img :src="ads.company.avatar" alt="#" style="width:45px;height:45px">
									<div class="blog-admin-title">
										<span class="theme-color">نشر بواسطة</span>
										<p class="author-title hs-6 mb-0">
											<router-link :to="{name:'CompanyProfile',params:{id:ads.company.id,type:type}}">
																				{{ads.company.name}}
									</router-link>
											
										</p>
									</div>
								</div>
							</div>
						</div>
			
						</div>
			
				</div>
				<div class="col" v-for="p in placeHolder(row)" :key="'placeholder'+row+p"></div>
			</div>

<center class="mt-3">
			<div class="theme-btn text-center " @click="moreLoad(more)" v-show="count >= more" :disabled="loading">أكثر </div>
</center>			
		</div>

	</section>

				<section class="agent-area agent-grid section-padding">
			<div class="container">
					<h5 class="text-right">
 
{{type=="consulting" ? $t('consulting_company'):''}}
                                {{type=="construction" ? $t('construcion_company'):''}}
                                {{type=="hvac" ? $t('HVAC_companies'):''}}
                                {{type=="stone" ? $t('Stone_companies'):''}}
                                {{type=="interior" ? $t('interior_companies'):''}}
								
	</h5>
	
						<div class="text-left">
												<router-link :to="{name:'agents',params:{type:type}}"
												 class="theme-color all" style="cursor:pointer">الكل </router-link>
												

						</div>
					<slick v-bind="settingsTeam" v-if="users.length" class="agents-slider" >
				
					<div v-for="(user, index) in users" :key="index">
<router-link :to="{name:'CompanyProfile',params:{id:user.id,type:type}}">
									
						<div class="single-agent m-b-50">
							<div class="agent-head">

									<div class="agent-img" v-if="user.avatar==null">
									<img src="img/person-icon.png" alt="#" >
									
								</div>
								<div class="agent-img" v-else>
									<img :src="user.avatar" alt="#" >
									
								</div>
							
					
							</div>
							<div class="agent-content" >
								<h3 class="agent-title hs-6" v-if="user.company">
									<!-- <router-link :to="{name:'CompanyProfile',params:{id:user.id,type:type}}"> -->
										{{user.company.company_en}}
										<!-- </router-link> -->
									</h3>
									<h3 class="agent-title hs-6" v-else>
									<!-- <router-link :to="{name:'CompanyProfile',params:{id:user.id,type:type}}"> -->
										{{user.name}}
										<!-- </router-link> -->
									</h3>
							
							</div>
						</div>
						</router-link>
					</div>

			
				
					</slick>
						</div>
		</section>

	


  <!-- <div id="ad-pop-img">
	<div class="pop-inner">
	<a href="#">
		<img src="https://shop.naturalwellness.com/images/banners/banner-cmv-50-off-top.jpg" class="pop-banner">
	</a>
	<a class="pop-close"><img src="https://shop.naturalwellness.com/images/promo/close_window_x.png" /></a>
	</div>
</div> -->


    </div>
</template>

<script>
import Slick from 'vue-slick-carousel';

export default {
	components: { Slick},
data(){
    return{

        type: this.$route.params.type,
        adsense:null,
		col:'',
		row:'',
		none:'',
		columns:3,
		more:3,
		users:null,
		loading:false,
		settingsTeam: {
  dots: true,
  infinite: false,
  speed: 500,
  slidesToShow: 4,
  slidesToScroll: 4,
  initialSlide: 0,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        initialSlide: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 4,
 		dots: true

		
      }
    }
  ]
},
    }
},
computed:{
	rows(){
return this.adsense===null?0:Math.ceil(this.adsense.length / this.columns)

}
},

  mounted() {

                $('.header-inner').removeClass('d-none');
                // $('.header-inner').addClass('d-block');
        },
methods:{
		OfferRow(row){
		return this.adsense.slice((row-1) *  this.columns , row * this.columns)
	},
	placeHolder(row){
		return this.columns - this.OfferRow(row).length;
	},
		grid(){
		this.row="row"
		this.col='col-lg-4 col-md-6 col-12'
	
	},
	moreLoad(more){
		 more = this.more+= 6;
	this.getCompany(more)
	},
    async getCompany(more){
		more = this.more
		this.loading = true;
      await  axios.get(`getTypeService/${this.type}/${more}`).then(res=>{
            this.adsense=res.data.ads;
            this.count=res.data.count;
            this.users=res.data.user;
					this.loading = false;

        })
    },
},
    created() {
        this.getCompany();
    },
}
</script>


<style scoped>
.single-agent:hover .agent-img::before, .single-agent:hover .agent-img::after {
    opacity: 1;
    visibility: visible;
    width: 50%;
  }

  .single-agent:hover .agent-img img {
    webkit-filter: brightness(105%) grayscale(100%);
    filter: brightness(105%) grayscale(100%);
  }

  .agent-head {
    position: relative;
  }

  .agent-img {
    position: relative;
    transition: all 0.4s ease;
    border-radius: 100%;
    overflow: hidden;
    max-width: 270px;
    margin: auto;
  }

  .agent-img::before {
    position: absolute;
    content: "";
    width: 0;
    height: 100%;
    background: rgba(0, 0, 0, 0.43);
    opacity: 0;
    visibility: hidden;
    transition: all 0.4s ease;
    z-index: 1;
    right: 0;
  }

  .agent-img::after {
    position: absolute;
    content: "";
    width: 0;
    height: 100%;
    background: rgba(0, 0, 0, 0.43);
    opacity: 0;
    visibility: hidden;
    transition: all 0.4s ease;
    z-index: 1;
    left: 0;
    top: 0;
  }

   .agent-img img {
    border-radius: 100%;
    width: 100px;
    height: 100px !important;
  }

</style>

<style lang="scss">
// @import "lesshat";

#ad-pop-img {
	position:relative;
	bottom:0;
	left:0;
	width:100%;
	/* font-family:Arial, Helvetica, sans-serif; */
	text-align:center;
	overflow:visible;
	display:block;
	
	.pop-inner {
		display:inline-block;
		position:relative;
		background:#FF0000;
	}
	.pop-banner {
		//display:inline-block;
		display:block;
		max-width:100%;
		height:auto;
		/*
		@media (min-width: @screen-md-min) {
			margin-left:15px;
			margin-right:15px;
		}
		*/
	}
	.pop-close {
		position:absolute;
		top:-15px;
		right:0;
		margin-left:200px;
		width:32px;
		height:32px;
		cursor:pointer;
		//transform:translateX(-50%);
		/*
		@media (min-width: 500px) {
			margin-left:419px;
		}
		*/
	}
	&.shown {
		display:block;
	}
}
</style>
