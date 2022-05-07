<template>
<div>
<!-- agent Detail Area  -->

<div v-for="user , index in company" :key="index">
  <section class="breadcrumbs-area" style="background-image:url('img/breadcrumbs-bg.jpg');">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Breadcrumbs Content -->
					<div class="breadcrumbs-content">
						<h1 class="b-content-title m-0">{{user.company.company_en}}</h1>
						<!-- <ul class="breadcrumbs-menu list-none">
							<li><i class="fa fa-home"></i><a href="\">{{$t('home')}}</a></li>
						</ul> -->
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="agent-details-area" >

		<div class="container">
			<div class="agent-d-inner section-padding">
				<div class="row g-0 align-items-center">
					<div class="col-lg-5 col-12" data-aos="fade-right" data-aos-delay="200">
						<!-- agent Detail Image  -->
						<div class="agent-d-img">
							<img :src="user.avatar" alt="#" v-if="user.avatar">
							<img src="img/person-icon.png" alt="#" v-else>

							
						</div>
					</div>
					<div class="col-lg-7 col-12" data-aos="fade-left" data-aos-delay="300">
						<!-- agent Detail Content  -->
						<div class="s-blog-sidebar sidebar-tags">
						<div class="agent-details-content">
							<h2 class="agent-d-title">{{user.company.company_en}}</h2>
							<span>
                                {{type=="consulting" ? $t('consulting_company'):''}}
                                {{type=="construcion" ? $t('construcion_company'):''}}
                                {{type=="hvac" ? $t('HVAC_companies'):''}}
                                {{type=="stone" ? $t('Stone_companies'):''}}

                            </span>
							<ul class="agent-d-list list-none">
							
								
								<li><i class="fa fa-layer-group"></i>since {{user.company.date_create}}</li>
								<li><i class="fa fa-phone"></i>{{user.company.phone}}</li>
								<li><a href="#"><i class="fa fa-envelope"></i>{{user.email}}</a></li>
								<!-- <li><a href="#"><i class="fa fa-globe"></i>www.gear-house.com</a></li> -->
							</ul>
							<div class="agent-d-about">
								<h4 class="t-about-title">حول </h4>
								<p class="m-0">
                                    {{user.company.about_us}}
                                    </p>
								

							</div>
							

										 				 
							<h4 class="b-sidebar-title">فرع رئيسي شركة  </h4>
							<ul class="s-tags-inner list-none mb-3"  >
								<li ><a style="background:#3454d1; color:#fff">
												<all-uae :emirates="user.company.emirates"></all-uae>
									</a>
									</li>
				
							</ul>
				
							<h4 class="b-sidebar-title">فروع شركة  </h4>
							<ul class="s-tags-inner list-none" >
								<li v-for="branch , index in user.branch" :key="index"><a>
									<all-uae :emirates="branch.emirates"></all-uae></a></li>
				
							</ul>
						</div>
						</div>
					</div>
				</div>
			</div>




		</div>
	</section>
    <section class="Achivment container">
<div  >
	
  	<div class="p-descrip-box rating" >

                        <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " :class="{ 'active'  : active1}" @click="tabs(1)" >ملفات الشرك</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" :class="{ 'active'  : active2}" @click="tabs(2)">
      المراجعات & التقيم</a>
  </li>


</ul>
						<div class="rating-reviews-main">
							<div class="review-add" v-if="active2==true">
								<h4 class="review-add-title fs-20">{{user.review.length}} Review</h4>
								<div class="review-add-main"  v-for="review ,index in user.review" :key="index" v-if="review">
									<div class="review-img">
										<img :src="review.user.avatar" alt="#" width="126" height="126" style="
                                        width:126px !important;  height:126px !important;">
									</div>
									<div class="review-content">
										<div class="review-conent-top">
											<h4 class="fs-20" >
                                                {{review.user.name}}

                                            </h4>

											<div class="reply-rating">



												<review :rating="review.rating"></review>

											</div>
										</div>
										<p>{{review.content}}</p>
										<span v-if="review_added_at">{{review_added_at}}</span>
									</div>
                                    <hr>
								</div>
							</div>
                            	<div class="review-add" v-if="active1==true">

								<div class="review-add-main"  >




                        <div class="timeline-item">
							


                          <h5 class="timeline-header"><a href="#">رخصة تجارية </a> </h5>

                          <div class="timeline-body">
                           <a :href="user.companyfile.path" class="btn btn-primary btn-sm" target="_blank">فتح</a>
                          </div>
                          <div class="timeline-footer">
                            


		
                          </div>
                        </div>

                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>


                        <div class="timeline-item">
							
										
														



                          <h5 class="timeline-header text-success"><a href="#">رخصة الانجازات </a> </h5>

                          <div class="timeline-body">
                          
							 <a :href="user.achivement_file.path" class="btn btn-success btn-sm" target="_blank">فتح</a>
                          </div>
                          <div class="timeline-footer">
                           

                          </div>
                        </div>

						<div>عدد الانجاز منذ التأسيس <span class="badge badge-dark text-light"> 	
{{user.achivement_file.AchiveSinceCreate}}</span></div>
<div>عدد الانجازات اخر ثلاث سنين   <span class="badge badge-dark text-light"> 
{{user.achivement_file.AchiveThreeYears}}</span></div>

                      </div>



                                    <hr>
								</div>
							</div>


						</div>

					</div>
          
          <h1> اعلانات </h1>


<div v-if="type!='consulting'" class="mb-3 mt-3">
 <a class="mr-3" :class="{'theme-color font-weight-bolde':TypeService==1}" @click="switchServicdes(1)">خدمات  </a>
 <a class="mr-3" :class="{'theme-color font-weight-bold':TypeService==2}" @click="switchServicdes(2)">  معرض الاعمال </a>
</div>
<div v-if="type!='consulting'" class="row">


                      
			<div class="col-md-4" v-for="ads , index in user.service_ads" :key="index" v-bind="ads" v-if="TypeService==1">
			<div class="card" style="width: 18rem;">
				<span v-for="image , i in ads.image" :key="i">
					<img class="card-img-top" :src="image.path" alt="Card image cap" v-if="i==0"
					style="width:1">
				</span>

            <div class="card-body">
                <h5 class="card-title">{{ads.title}}</h5>
                <p class="card-text"> {{ads.description.substr(0,90 )}}...</p>
                <router-link :to="{name:'CompanyAdsDetails',params:{type:type,id:ads.id}}" class="theme-btn">تفاصيل</router-link>
            </div>
            
 </div>
				</div>

				                   
			<div class="col-md-4" v-for="ads , index in user.works" :key="index" v-bind="ads" v-if="TypeService==2">
			<div class="card" style="width: 18rem;">
				<span v-for="image , i in ads.image" :key="i">
					<img class="card-img-top" :src="image.path" alt="Card image cap" v-if="i==0"
					style="width:1">
				</span>

            <div class="card-body">
                <h5 class="card-title">{{ads.title}}</h5>
                <p class="card-text"> {{ads.description.substr(0,90 )}}...</p>
                <router-link :to="{name:'CompanyAdsDetails',params:{type:type,id:ads.id}}" class="theme-btn">تفاصيل</router-link>
            </div>
            
 </div>
				</div>
                              
               
				
</div>

<div v-else class="row">

  
      <div class="single-p-slider col-md-4" v-for="offer , index in user.villa " :key="index">
<div class="single-recent-property">
								<div class="single-r-property-top">
									<!-- Recent Property Img -->
									<div class="single-r-property-img" v-for="image , i in offer.villa_image" :key="i">
										<img :src="image.path" alt="#" v-if="i==0" class="image_villa">
									</div>
									<div class="property-for-sale">
										<ul class="list-none">
											<li><a >{{offer.type_villa==1 ? $t('classic')  : $t('modern')}}</a></li>
											<li class="unique "  ><a href="#" >{{$t('unique')}}</a></li>
										</ul>
									</div>
									<!-- Property Ratting -->
									<div class="property-ratting">
										<div class="property-ratting-left visible-xs">
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
										<!-- <div class="property-ratting-save" v-if="offer.saved_villa==null">
											<a @click="saved(offer.id)" ><i class="fa fa-heart"></i><b class="visible-xs">Save</b></a>
										</div>
                                        <div class="property-ratting-save saved" v-else>
											<a @click="undosaved(offer.id)" class="theme-color"><i class="fa fa-heart"></i><b class="visible-xs">
												Saveed</b></a>
										</div> -->
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
											<span class="visible-xs">
											<li class="visible-xs"><b>
												{{offer.tab}}</b><span><i class="fas fa-arrows-alt"></i></span></li>
											</span>
										</ul>
									</div>
									<!-- Property User -->
									<div class="property-user" >
										<div class="property-user-left visible-xs">
											<img :src="user.avatar" alt="#" class="rounded-circle visible-xs	" width="40" height="40">
											<div class="property-user-title">
												<p class="at-title mb-0 hs-6"><a href="#">{{user.name}}</a></p>
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
</div>



</div>

    </section>
</div>
	<!-- End Agent Detail Area  -->
</div>
</template>

<script>
import review from '../dashboard/review.vue'
import AllUae from './AllUae.vue'
export default {
  components: { review, AllUae },
data(){
    return{

        type: this.$route.params.type,
        id: this.$route.params.id,
        company:null,
        active1:true,
        active2:false,
        active3:false,
		TypeService:1,
    }
},
watch:{
    mountType(){
this.type=this.$route.params.type
    }
},
	  
methods:{
	switchServicdes(e){
		this.TypeService=e
	},
    tabs(event){
        if(event==1){
            this.active1=true
             this.active2=false
             this.active3=false
        }

         if(event==2){
            this.active1=false
             this.active2=true
             this.active3=false
        }
         if(event==3){
            this.active1=false
             this.active2=false
             this.active3=true
        }

    },

    getCompany(){
        axios.get(`getTypeCompany/${this.id}/${this.type}`).then(res=>{
            this.company=res.data;
        })
    },
},
    created() {
        this.getCompany();
    },
}
</script>

<style>
.card-img-top
{
    width: 300px !important;
    height: 250px !important;

}
.agent-d-img img{
	width: 469px !important; 
	height:  500px !important;
}
</style>
