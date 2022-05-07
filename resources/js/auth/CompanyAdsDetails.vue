<template>
    <div class="service_ads">
        
 
         <span  v-for="offer,index in ads " :key="index">
               <section class="breadcrumbs-area" style="background-image:url('img/breadcrumbs-bg.jpg');">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Breadcrumbs Content -->
					<div class="breadcrumbs-content">
						<h1 class="b-content-title m-0">{{offer.title}}</h1>
						<!-- <ul class="breadcrumbs-menu list-none">
							<li><i class="fa fa-home"></i><a href="\">{{$t('home')}}</a></li>
						</ul> -->
					</div>
				</div>
			</div>
		</div>
	</section>

<div class="container">
<div class="row mt-3 "  >

  <div class="col-md-4 col-sm-12">
        <div class="properties-s-widget page-center " >

            	<div class="single-rr overall-rating">
                   
											<h5> التقييم الكلي </h5>
											<div class="main-rating-line">
												<p class="main-r-title fs-40 m-0">{{FinalReivew}}</p>
												<Review :rating="TruncatedReivew"></Review>
												
											</div>
									
								
                                		</div>
                                        <div>
            <h5>صاحب الخدمة </h5>


            <span v-if="offer.company.avatar">
            <img :src="offer.company.avatar"  class="rounded-circle" style="width:50px !important; height:50px !important; ">
            
            </span>
            <span v-else>
                 <img src="img/person-icon.png"  class="rounded-circle" style="width:100px !important; height:100px !important; ">
                 
            </span>
             <div><router-link  class="theme-color" :to="{name:'CompanyProfile',params:{id:offer.company.id,type:type}}">
                 {{offer.company.company.company_en}}
                 </router-link>
             </div>
                 <div>
                 <span>{{type=="stone" ? 'حجر ': ''}} </span>
                 <span>{{type=="interior" ? 'ديكور داخلي ': ''}} </span>
                 <span>{{type=="hvac" ? 'تكييف ': ''}} </span>
                 <span>{{type=="consulting" ? 'الاستشارات الهندسية ': ''}} </span>
                 <span>{{type=="construction" ? ' المقاولات ': ''}} </span>
                 </div>
                                        </div>


                                        <div class="contact">
                                                <h5> التواصل</h5>
                                                <a  class="btn btn-download" :href="'tel:'+offer.company.company.phone"> 
                                                    
                                                    {{offer.company.company.phone}}
                                                    <i class="fa fa-phone"> </i>
                                                </a>

                                        </div>



           


        </div>
    </div>
    <div class="col-md-8 col-sm-12">
            <div class="properties-s-widget" >
                <slick :v-bind="settings" v-if="offer.image.length>0" >
                    <span v-for="image,i in offer.image " :key="i" >

  <img :src="image.path" alt="Card image cap" width="100%" class="img_ads">
                    </span>
                </slick>
                <span v-else>
                       <span v-for="image,i in offer.image " :key="i" >

  <img :src="image.path" alt="Card image cap" width="100%" class="img_ads">
                    </span>
                </span>
  <div class="card-body">
    <h5 class="card-title">{{offer.title}}</h5>
    <p class="card-text">{{offer.description}}</p>
  </div>
</div>

   <div  v-if="Myview==1">
<button    class="theme-btn  text-right confirm" data-toggle="modal" data-target="#Review"
 ><i class="bx bxs-star" ></i>اضف تقييم</button>


<div class="modal fade" id="Review" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center theme-color">({{reveiw}})قيم الخدمة   </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="">
          <div class="d-flex star-rating mx-auto">
                <i class='bx bx-star bxs-star text-warning' :class="start1" @click="Rating(1)"></i>
                <i class='bx bx-star' :class="start2"  @click="Rating(2)"></i>
                <i class='bx bx-star' :class="start3"  @click="Rating(3)"></i>
                <i class='bx bx-star' :class="start4" @click="Rating(4)"></i>
                <i class='bx bx-star' :class="start5" @click="Rating(5)"></i>


          </div>
     <div class=" form-group mt-3">
                  <label for="exampleFormControlTextarea1 theme-color"></label>
                  <textarea
                  style="background:#fff"
                    class="form-control"
                    id="exampleFormControlTextarea1"
                    rows="6"
                    v-model="ReviewContent"

                      placeholder=" رأيك   "

                  ></textarea>
                  <!-- <div
                    class="invalid-feedback"
                    v-for="(error, index) in this.errorFor('notes')"
                    :key="'notes' + index"
                  >{{ error }}</div> -->
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="theme-btn primary" data-dismiss="modal">إغلاق</button>
        <button type="button" class="theme-btn" @click.prevent="SubmiitReview(offer.user_id,offer.com_id,offer.id)">إرسال </button>
      </div>
    </div>
  </div>
</div>
</div>

<div v-for="review, index in offer.review" :key="index">


<div v-if="review" >
    
  	<div class="p-descrip-box rating mt-5" >
						<h4 class="pr-d-title"> تقييم الخدمة </h4>
						<div class="rating-reviews-main">
							<div class="review-add">
								<h4 class="review-add-title fs-20">{{offer.CountReview}} مراجعة</h4>
								<div class="review-add-main">
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



												<Review :rating="review.rating"></Review>

											</div>
										</div>
										<p>{{review.content}}</p>
										<span v-if="review_added_at">{{review_added_at}}</span>
									</div>
								</div>
							</div>
						</div>
					</div>


</div>
</div>
    </div>
  
</div>

</div>
             
                  




         </span>

    </div>
</template>

<script>
 import Slick from 'vue-slick-carousel';
import Review from '../dashboard/review.vue';



export default {
 components: { Slick,Review },
 data(){
     return{
     ads:null,
     type: this.$route.params.type,
     id: this.$route.params.id,
     settings:{
         dots: true,
    infinite  : true,
    initialSlide  : 2,
    speed  : 500,
    slidesToShow  : 1,
    slidesToScroll  : 1,
    swipeToSlide  : true
     },
         start1:null,
        start2:null,
        start3:null,
        start4:null,
        start5:null,
        reveiw:1,
        FinalReivew:null,
        TruncatedReivew:null
     
 }
 },

 methods:{

     Adsoffer(){
         axios.get(`AdsOfferCompany/${this.type}/${this.id}`).then(res=>{
             this.ads=res.data;

                 this.ads.forEach((ads) => {
                     var num = ads.rating;
                       this.FinalReivew= num.toFixed(1);
                       this.TruncatedReivew= Math.trunc(num);
      });
       
           
         })
     },
        SubmiitReview(   ){
            let data = new FormData();

            data.append('rating', this.reveiw);
            data.append('content', this.ReviewContent);
            data.append('type', this.type);
            data.append('ads_id', this.id);


             axios.post('review_ads',data).then(res=>{
                         this.Adsoffer()
                 $('#Review').modal('hide');
                  $('.modal-backdrop').css('display','none');


             })


    },
       Rating(event){

        if(event==1){

            this.start1='bxs-star text-warning'
        this.start2=null
        this.start3=null
        this.start4=null
        this.start5=null
        }
         if(event==2){
            this.start1='bxs-star text-warning'
        this.start2='bxs-star text-warning'
        this.start3=null
        this.start4=null
        this.start5=null
        }
         if(event==3){
            this.start1='bxs-star text-warning'
        this.start2='bxs-star text-warning'
        this.start3='bxs-star text-warning'
        this.start4=null
        this.start5=null
        }
         if(event==4){
            this.start1='bxs-star text-warning'
        this.start2='bxs-star text-warning'
        this.start3='bxs-star text-warning'
        this.start4='bxs-star text-warning'
        this.start5=null
        }
         if(event==5){
            this.start1='bxs-star text-warning'
        this.start2='bxs-star text-warning'
        this.start3='bxs-star text-warning'
        this.start4='bxs-star text-warning'
        this.start5='bxs-star text-warning'
        }

       this.reveiw=event;
       console.log(this.reveiw)

    },
 },
 created() {
     this.Adsoffer();
 },

}
</script>


<style scoped>
.img_ads{
    height: 500px !important;
}

.slick-prev:hover, .slick-prev:focus, .slick-next:hover, .slick-next:focus {
    color: transparent !important;
    outline: none !important;
    background: transparent  !important
}
  .slick-next {
    right: 8px  !important;
    z-index: 2 !important;

  }
  .slick-prev {
    
    left: 8px !important;
    z-index: 2 !important;

  }
  .page-center {
    
    align-items: center;
    justify-content: center;
    text-align: center;
  }
  .star-rating .bx-star{
    font-size: 2rem;
    cursor: pointer;
    margin: 5px;
}

</style>