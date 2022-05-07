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
	<!-- End Breadcrumbs Area -->

<!-- <div id="ad-pop-img">
	<div class="pop-inner">
	<a href="#">
		<img src="https://shop.naturalwellness.com/images/banners/banner-cmv-50-off-top.jpg" class="pop-banner">
	</a>
	<a class="pop-close"><img src="https://shop.naturalwellness.com/images/promo/close_window_x.png" /></a>
	</div>
</div> -->

        <section class="agent-area agent-grid section-padding">
		<div class="container">

			<div class="row">
				<div class="col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="200"
                v-for="(user, index) in companines" :key="index" v-if="user.company"
                >
					<!-- Single Agent -->
					
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
							<h3 class="agent-title hs-4">
								<router-link :to="{name:'CompanyProfile',params:{id:user.id,type:type}}">
									{{user.company.company_en}}</router-link>
								</h3>
							<!-- <p class="theme-color">Co-Founder</p> -->
						</div>
					</div>
				</div>

			</div>
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
export default {
data(){
    return{

        type: this.$route.params.type,
        companines:null
    }
},
  mounted() {

           

             
                $('.header-inner').removeClass('d-none');
                // $('.header-inner').addClass('d-block');
        },
methods:{
    async getCompany(){
      await  axios.get(`getTypeCompanies/${this.type}`).then(res=>{
            this.companines=res.data;
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
	    width: 270px;
    height: 270px !important;
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
