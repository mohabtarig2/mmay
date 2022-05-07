<template>


   <div class="container">


   <div class=" mt-5 container  " :dir="$t('directions')"  >



<h3 class=" h3 font-weight-bold text-uppercase  mr-3 d-block" :class="$t('text_align')">{{$t('offer_villa')}}  </h3>

        </div>

<div class="form-group">
<select  class="form-control" id="exampleFormControlSelect1" v-model="searchoffer" :dir="$t('directions')">

                <option value="all">{{$t('all')}}</option>
                <option value=7>{{$t('abu_dabhi')}}</option>
                <option value=1>{{$t('dubai')}}</option>
                <option value=5>{{$t('sharja')}}</option>
                <option value=6>{{$t('ajman')}}</option>
                <option value=4>{{$t('um_alqwin')}}</option>
                <option value=3>{{$t('ras_alkhima')}}</option>
                <option value=2>{{$t('fujairah')}}</option>



    </select>
</div>


<div class="row"  v-if="allOffershow.length">

   <div  v-for="offer,index in allOffershow " :key="index" :dir="$t('directions')" :class="$t('text_align')"  class="col-md-4 col-sm-12 mt-4">

 <router-link :to ="{path:'/offer/details/'+offer.id}" class="link text-dark" style="text-decoration: none;">
        <div class="property-listing property-2">

				<div class="listing-img-wrapper">
						<div class="_exlio_125">أفضل عرض  </div>
                              <div class="list-img-slide">
								<div class="click slick-initialized slick-slider slick-dotted" role="toolbar">
								<div aria-live="polite" class="slick-list draggable">
                                     <div class="slick-track" role="listbox" style="width: 990px;">

             <span v-for="image,i in offer.villa_image " :key="i" >
                        <span v-if="i==0" >
<img class=" img-fluid" :src="image.path"
                  data-toggle="modal" data-target="#exampleModal">


                    </span>
                    </span>


                </div></div>

</div>
									</div>

								</div>

								<div class="listing-detail-wrapper">
									<div class="listing-short-detail-wrap">
										<div class="_card_list_flex mb-2">
											<div class="_card_flex_01">
												<span class="_list_blickes _netork">

                     <span v-if="offer.Emirates==7">{{$t('abu_dabhi')}}</span>
                    <span v-if="offer.Emirates==6">{{$t('ajman')}}</span>
                    <span v-if="offer.Emirates==5">{{$t('sharja')}}</span>
                    <span v-if="offer.Emirates==4">{{$t('um_alqwin')}}</span>
                    <span v-if="offer.Emirates==3">{{$t('ras_alkhima')}}</span>
                    <span v-if="offer.Emirates==2">{{$t('fujairah')}}</span>
                    <span v-if="offer.Emirates==1">{{$t('dubai')}}</span>
                                                </span>
												<span class="_list_blickes types">
                                                     <span   class="" :dir="$t('directions')" v-if="offer.type_villa==1">
                                                 {{$t('classic')}} </span>
                                                  <span   :dir="$t('directions')"  v-if="offer.type_villa==2">{{$t('modern')}} </span>

                                                </span>
											</div>
											<div class="_card_flex_last">
												<div class="prt_saveed_12lk">
													<label class="toggler toggler-danger"><input type="checkbox"><i class="ti-heart"></i></label>
												</div>
											</div>
										</div>
										<div class="_card_list_flex">
											<div class="_card_flex_01">
												<h4 class="listing-name verified"><a href="single-property-1.html" class="prt-link-detail">
                                                   {{offer.title}}</a></h4>
											</div>
										</div>
									</div>
								</div>

								<div class="price-features-wrapper">
									<div class="list-fx-features">
										<div class="listing-card-info-icon">
											<div class="inc-fleat-icon"><img src="assets/img/bedtest.svg" width="13" alt=""></div>{{offer.rooms}} {{$t('rooms')}}
										</div>
										<div class="listing-card-info-icon">
											<div class="inc-fleat-icon"><img src="assets/img/bathtub.svg" width="13" alt=""></div>  {{offer.floors}}   {{$t('bathroom')}}
										</div>
										<div class="listing-card-info-icon">
											<div class="inc-fleat-icon"><img src="assets/img/move.svg" width="13" alt=""></div>800 sqft
										</div>
									</div>
								</div>

								<div class="listing-detail-footer">
									<div class="footer-first">
										<h6 class="listing-card-info-price mb-0 p-0 main-color"> <span> {{offer.price}} </span> <span>  {{$t('aed')}} </span></h6>
									</div>
									<div class="footer-flex">
										<a href="property-detail.html" class="prt-view">View Detail</a>
									</div>
								</div>

</div>
 </router-link>

            </div>




</div>

<button type="button" class="btn btn-primary d-block mx-auto font-weight-bold mt-5 mb-5"  :dir="$t('directions')">{{$t('show_more')}} <span class="fa fa-arrow-down"></span></button>


















    </div>
</template>

<script>

import carousel from 'vue-owl-carousel';
export default {
 components: { carousel },
 data(){
     return{
         allOffershow : null,
         searchoffer:'',
         issearch:false,
         page:'',
         images: [
                    "https://i.wifegeek.com/200426/f9459c52.jpg",
                    "https://i.wifegeek.com/200426/5ce1e1c7.jpg",
                    "https://i.wifegeek.com/200426/5fa51df3.jpg",
                    "https://i.wifegeek.com/200426/663181fe.jpg",
                    "https://i.wifegeek.com/200426/2d110780.jpg",
                    "https://i.wifegeek.com/200426/e73cd3fa.jpg",
                    "https://i.wifegeek.com/200426/15160d6e.jpg",
                    "https://i.wifegeek.com/200426/d0c881ae.jpg",
                    "https://i.wifegeek.com/200426/a154fc3d.jpg",
                    "https://i.wifegeek.com/200426/71d3aa60.jpg",
                    "https://i.wifegeek.com/200426/d17ce9a0.jpg",
                    "https://i.wifegeek.com/200426/7c4deca9.jpg",
                    "https://i.wifegeek.com/200426/64672676.jpg",
                    "https://i.wifegeek.com/200426/de6ab9c6.jpg",
                    "https://i.wifegeek.com/200426/d8bcb6a7.jpg",
                    "https://i.wifegeek.com/200426/4085d03b.jpg",
                    "https://i.wifegeek.com/200426/177ef44c.jpg",
                    "https://i.wifegeek.com/200426/d74d9040.jpg",
                    "https://i.wifegeek.com/200426/81e24a47.jpg",
                    "https://i.wifegeek.com/200426/43e2e8bb.jpg"

                ],

     }
 },
   watch:{
             searchoffer(query){

                 if(query =='all'){
 let opldpost = JSON.parse(localStorage.getItem('showAlloffer'));

                        this.allOffershow = opldpost;

         } else{
                 if(query.length > 0 && query.length !=='' &&  query.length !==null){
                      this.issearch = true ;
                     console.log(query);
                     axios.get('/api/searchoffer/'+query).then(res=>{

                        this.allOffershow = res.data.data;




                       // setInterval(function(){ this.issearch = true ;}, 200);


                     });


                 }


                 }


             }
        },
 methods:{
     showOffer(){
         axios.get('api/ads/justshowOffer').then(res=>{
             this.allOffershow = res.data.data;
             localStorage.setItem('showAlloffer',JSON.stringify(this.allOffershow))
             this.page = this.allOffershow.length


         })
     },


 },created(){
     this.showOffer();
 }
}
</script>

<style scoped>
.card:hover{
    background:#eee  ;
}
 .link{
    text-decoration: none;
}

.card-p{
    margin-bottom: -5px;
}

.image-icon{

    width: 22px !important;
    display: inline-block !important;

}
.image-icon1{

    width: 14px !important;
    display: inline-block !important;

}
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
.card-img-top{
    height: 200px;
}

textarea:focus,
textarea.form-control:focus,
input.form-control:focus,
input[type=text]:focus,
input[type=password]:focus,
input[type=email]:focus,
input[type=number]:focus,
[type=text].form-control:focus,
[type=password].form-control:focus,
[type=email].form-control:focus,
[type=tel].form-control:focus,
[contenteditable].form-control:focus {
  box-shadow: inset 0 -1px 0 #EB3349;

}
 .form-group .form-control{
     border-top:0;
     padding: 0;
     border-left:0;
     border-right:0;
     border-bottom:1px solid #c7c6c6;
         border-bottom-right-radius: 0;
     border-bottom-left-radius: 0;
     font-size: 14px;
 }
 .lb-item{
     width: 100%;
     height: 100%;
 }

</style>
<style scoped>
/*-------- Property Style: Property Style 2 ---------*/
.property-listing {
    position: relative;
    width: 100%;
    border-radius:0.5rem;
    overflow: hidden;
    background: #ffffff;
    margin-bottom:30px;
    border:none;
    box-shadow:0 0 20px 0 rgba(62,28,131,0.1);
    -webkit-box-shadow: 0 0 20px 0 rgba(62,28,131,0.1);
}
.property-listing.shadow-none {
	box-shadow:none;
	-webkit-box-shadow:none;
}
.property-listing.property-2 .listing-img-wrapper {
    overflow: hidden;
	position:relative;
	min-height: 240px;
    max-height: 240px;
}
.list-img-slide {
    overflow: hidden;
    position: relative;
    min-height: 240px;
    max-height: 240px;
}
.property-listing.property-2 .listing-img-wrapper>a {
    position: relative;
    display: block;
    width: 100%;
	transition:all ease 0.4s;
}
.property-listing.property-2 .listing-img-wrapper>a:before {
    position: absolute;
    content: "";
    height: 100%;
    width: 100%;
    left: 0;
    right: 0;
    top: 0;
    background:linear-gradient(to bottom, transparent 25%, #1e2a4c);
    display: block;
    bottom: 0;
}
.property-listing.property-2 .listing-img-wrapper img{
	max-height: 240px;
    min-height: 240px;
    width: 372px;


}

.property-listing.property-2 .listing-img-wrapper img:hover{
	max-height: 240px;
    min-height: 240px;
    width: 372px;
    transform: scale(1.1);
    cursor: pointer;


}

.property-listing.property-2 .listing-detail-wrapper {
    padding:1rem 1.5rem;
    width: 100%;
    display: flex;
    vertical-align: middle;
    align-items: center;
}
.property-listing.property-2 .listing-short-detail{
	flex:1;
}
.property-listing.property-2 .listing-name {
    font-size: 17px;
    position: relative;
    margin-bottom: 0px;
    font-weight: 600;
    line-height: 1.4;
}

.property-listing.property-2 .listing-location{
    font-size:14.5px;
    margin-bottom: 2px;
}
.property-listing.property-2 .list-status {
    position: relative;
    margin-left: 10px;
    top: -3px;
    z-index: 2;
    width: 20px;
    height: 20px;
    background: #0ac186;
    text-align: center;
    border-radius: 50%;
    font-size: 9px;
    line-height: 22px;
    color: #ffffff;
    box-shadow: none;
    display: inline-block;
}
.property-listing.property-2 .listing-location i{
	margin-right:5px;
}
.property-listing.property-2 .listing-features-info ul {
    margin: 0;
	display:table;
	width:100%;
    padding:0.5rem 1rem 1.5rem;
}
.property-listing.property-2 .listing-features-info ul li{
	display:inline-block;
	width:33.333333%;
	list-style:none;
}
.property-listing.property-2 .listing-features-info ul li:last-child{
	border-right:none;
}
.property-listing.property-2 .listing-features-info ul li strong{
	font-weight:600;
	margin-right:5px;
}
.property-listing.property-2 .listing-footer-wrapper{
	padding:0.5rem 1rem;
	border-top: 1px solid #e5e9ec;
	width: 100%;
    display: flex;
    vertical-align: middle;
    align-items: center;
}
.property-listing.property-2 .listing-footer-wrapper .listing-like{
	flex:1;
	color:#0ac1a7;
}
.property-listing.property-2 .like-btn {
    background: #f3f4f7;
    border: 1px solid #edeff3;
    width: 36px;
    height: 36px;
    line-height: 38px;
    text-align: center;
    display: inline-block;
    border-radius: 50%;
	transition:all ease 0.4s;
}
.property-listing.property-2 .listing-price, .property-listing.property-2 .listing-contact-info{
    position: absolute;
    left: 20px;
    bottom: 20px;
	z-index: 1;
}
.property-listing.property-2 .listing-price .list-pr,
.property-listing.property-2 .listing-price > *,
.property-listing.property-2 .listing-contact-info > *{
	color:#ffffff;
	margin:0;
}
.property-listing.property-2 .listing-detail-btn .more-btn{
	padding:6px 15px;
	color:#ffffff;
	border:1px solid #ff9800;
	background:#ff9800;
	border-radius:2px;
}
.rate-btn {
    font-weight: 800;
    color: #FF9800;
    font-size: 18px;
}
.property-listing.property-2 .list-rating i {
    color: #ffffff;
    width: 30px;
    height: 30px;
    line-height: 26px;
    border-radius: 50%;
    display: inline-block;
    text-align: center;
    font-size: 14px;
    background: #ff9800;
    border: 1px solid #ff9800;
    margin-right: 3px;
}
.property-listing.property-2 .list-save i {
    color: #ffffff;
    width: 38px;
    height: 38px;
    line-height: 36px;
    border-radius: 50%;
    display: inline-block;
    text-align: center;
    font-size: 18px;
    background: #fe3e67;
    border:1px solid #fe3e67;
    margin-right: 3px;
}
.property-listing.property-2 .list-save-top{
	position:absolute;
	top:20px;
	right:20px;
}
.property-listing.property-2 .list-save-top i {
    color: #fe3e67;
    width: 38px;
    height: 38px;
    line-height: 40px;
    border-radius: 50%;
    display: inline-block;
    text-align: center;
    font-size: 18px;
    background: rgba(255, 255, 255, 1);
    -webkit-box-shadow: 0px 0px 0px 3px rgba(255,255,255,0.2);
    box-shadow: 0px 0px 0px 3px rgba(255,255,255,0.2);
    margin-right: 3px;
}
.property-listing.property-2 .listing-category {
    position: absolute;
    right: 20px;
    bottom: 25px;
    background: rgba(255,255,255,0.1);
    color: #ffffff;
    padding: 5px 15px;
    border-radius: 50px;
    font-size: 14px;
    text-transform:capitalize;
	-webkit-box-shadow:0px 0px 0px 5px rgba(255,255,255,0.2);
	box-shadow:0px 0px 0px 5px rgba(255,255,255,0.2);
}
.list-featured {
    position: absolute;
    left: 15px;
    top: 15px;
    background: #ffffff;
    padding: 7px 20px;
    border-radius: 50px;
	color: #4c5871;
}
.list-featured i {
    margin-right: 5px;
    color: #ff9802;
}
.property-listing.property-2 .listing-post-status i {
    margin-right: 7px;
    position: relative;
    top: 1px;
}
.property-listing.property-2 .listing-img-wrapper>a:hover:before, .property-listing.property-2 .listing-img-wrapper>a:focus:before{
	background:linear-gradient(to bottom, transparent 5%, #1e2a4c);
}
.property-listing.property-2:hover .like-btn, .property-listing.property-2:focus .like-btn{
	background:#ff9800;
	color:#ffffff;
	border-color:#ff9800;
}
.price-features-wrapper {
    padding: 0.1rem 1.5rem 0.6rem;
    display: flex;
    flex-wrap: wrap;
}
.price-features-wrapper .listing-price-fx{
	flex:1;
}
.inc-fleat {
    margin-left:15px;
	color:#72809D;
}
.list-fx-features {
    margin-top: 5px;
    display: flex;
    width: 100%;
    position: relative;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
}
.listing-card-info-icon {
    display: inline-block;
    padding-left: 0px;
    position: relative;
    vertical-align: top;
    width: 33.333333%;
    flex: 0 0 33.333333%;
    margin-bottom: 0rem;
    font-size: 14px;
    color: #616e96;
    font-weight: 600;
}
.property-type {
    font-size: 14px;
    margin: 0;
}
.listing-short-detail-wrap {
    position: relative;
    display: flex;
    align-items: flex-start;
    width: 100%;
    flex-direction: column;
}
._card_list_flex {
    display: flex;
    align-items: center;
    width: 100%;
}
._card_flex_01 {
    flex: 1;
}
span._list_blickes {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    height: 28px;
    padding: 0 15px;
    font-weight: 600;
    font-size: 13px;
    text-align: center;
    background: #f4f5f7;
    border-radius: 4px;
}
span._list_blickes._netork {
    background: rgba(255, 87, 34,0.1);
    color: #ff5722;
}
span._list_blickes.types {
    background:rgba(37, 181, 121,0.1);
    color: #25b579;
}
.inc-fleat-icon {
	margin-right:5px;
    display:inline-flex;
    align-items: center;
    justify-content: center;
    /* border: 2px solid #e0e4ef; */
}

.listing-card-info-price {
    font-weight:700;
	position:relative;
    font-size:18px;
	line-height:1.4;
	padding-left: 0.35em;
}
.price-prefix:before {
    content: '$';
    position: absolute;
    left: 0;
    top:0em;
    font-size: 0.6em;
    color: inherit;
}
.listing-price-fx .price-suffix {
    font-size: 14px;
    color: #72809D;
    font-weight: 400;
}
.modern-pro-wrap {
    position: absolute;
    top:30px;
    left:30px;
}
.property-listing.property-2.modern .property-type {
    position:relative;
	background:#323d50;
    right:0;
    bottom:0;
}
.property-listing.property-2.modern .modern-pro-wrap span {
    position: relative;
    padding: 8px 20px;
    z-index: 1;
    margin-right: 10px;
    font-size: 14px;
    border-radius: 4px;
    color: #ffffff;
	box-shadow:none;
	text-transform:capitalize;
}
.listing-price-with-compare {
    position: absolute;
    left:0;
    bottom: 20px;
    z-index: 1;
    display: flex;
    align-items: center;
    width: 100%;
    padding: 0 25px;
    flex-wrap: wrap;
}
.listing-price-with-compare h4 {
    margin: 0;
    flex: 1;
    color: #ffffff;
    font-weight: 500;
}
.listing-price-with-compare .lpc-right a {
    width: 40px;
    height: 36px;
    margin-left: 10px;
    display: inline-block;
    background: rgba(0, 0, 0,0.3);
    line-height: 36px;
    text-align: center;
    color: #ffffff;
    border-radius: 0.2rem;
}
.property-listing.property-2.modern .list-img-slide {
    overflow: hidden;
    position: relative;
    min-height: auto;
    max-height: 100%;
    border-radius: 0.5rem;
}
.property-listing.property-2.modern .listing-img-wrapper img {
    object-fit: cover;
    height: 100%;
    width: 100%;
	min-height: auto;
    max-height: 100%;
	margin-bottom:-2px;
}
.property-listing.property-2.modern .listing-img-wrapper {
    padding: 10px;
    padding-bottom: 0
}
.property-listing.property-2.modern .property-locations{
	font-size:14px;
}
.property-listing.property-2.modern .property-locations i {
    margin-right:4px;
}
.property-listing.property-2.modern .price-features-wrapper {
    padding:1rem 1.5rem 0rem;
    display: flex;
    flex-wrap: wrap;
}
.property-listing.property-2.modern .listing-card-info-icon {
    width: 33.333333%;
    flex: 0 0 33.333333%;
}
.property-listing.property-2.modern .home-type.theme-cl {
    font-size: 13px;
	margin-bottom:5px;
}
.property-listing.property-2.modern .listing-name {
    margin-bottom: 5px;
}
.modern-property-footer{
    padding:0.5rem 1.5rem;
    width: 100%;
    display: flex;
    vertical-align: middle;
    align-items: center;
	border-top: 1px solid #f0f1f5;
}
.property-author {
    flex: 1;
}
.property-author .path-img {
    max-width:35px;
    width:35x;
    display: inline-block;
    float: left;
    border-radius: 50%;
    overflow: hidden;
    margin-right: 10px;
}
.property-author .path-img img {
    border-radius: 50%;
    max-width:35px;
}
.property-author h5 {
    margin: 0;
    margin-top:7px;
    font-size: 14px;
    font-weight: 500;
}
.property-author h5 a {
    color: #808fa0;
}
.modern-property-footer .property-pulish-date {
    font-size: 13px;
	color: #808fa0;
}
.listing-detail-footer {
    padding: 1rem 1.5rem;
    margin-top: 1rem;
    border-top: 1px solid #e4e8f3;
    display: flex;
    align-items: center;
    width: 100%;
    justify-content: flex-start;
    min-height: 60px;
	max-height:60px;
}
.footer-first{
	flex:1;
}
.property-reviews {
    display: flex;
    align-items: center;
    position: relative;
    color: #c6cce0;
    font-size: 10px;
    letter-spacing: 4px;
}

.property-reviews i.filled{
    color:#fd9428;
}
.foot-location {
    font-size: 15px;
    display: flex;
    align-items: center;
}
.foot-location img{
    margin-right:5px;
	float: left;
}
.footer-flex .prt-view {
    padding: 4px 18px;
    color: #ffffff !important;
    background: #00bc8c;
    border-radius:0.2rem;
    height: 42px;
	font-weight: 600;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}
.call-view{
    padding: 4px 18px;
    background:#eceef3;
	color:#626c8a;
    border-radius:0.2rem;
    height: 42px;
	font-weight: 600;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}
ul.selio_style {
    padding: 0;
    margin: 0;
}
ul.selio_style li {
    display: inline-block;
    list-style: none;
    margin-right: 5px;
}
ul.selio_style li:last-child{
    margin-right:0px;
}
ul.selio_style li .prt_saveed_12lk {
    width: 40px;
    height: 40px;
    align-items: center;
    justify-content: center;
    display: inline-flex;
    border: 2px solid #ced5e4;
    border-radius: 50%;
    font-size: 13px;
}
ul.selio_style li .prt_saveed_12lk a {
    color: #75839e;
}
ul.selio_style li .prt_saveed_12lk .toggler{
	color: #75839e;
	font-size: 14px;
}
.author-box {
    width: 75px;
    height: 75px;
    border-radius: 50%;
	display:flex;
	align-items:center;
	position:relative;
	justify-content:center;
    padding:2px;
	background: #e9eef7;
}
.author-box img{
    border-radius: 50%;
}
.author-box:before {
    content: "";
    width: 1px;
    height: 80%;
    background: #d9dfef;
    right:-20%;
    position: absolute;
}
.listing-short-detail-flex.fl-2 {
    flex: 2;
}
.property-listing.property-2 .listing-name .prt-link-detail{
	position:relative;
}

.list-img-slide .slick-dots li {
    width:10px;
    height:10px;
    margin: 0 3px;
}
.list-img-slide .slick-dots {
    position: absolute;
    bottom: 9px;
}
.list-img-slide .slick-dots li button:before {
    width:6px;
    height:6px;
    background:rgba(255, 255, 255,0.8);
    box-shadow:0px 0px 0px 2px rgb(255 255 255 / 20%);
    -webkit-box-shadow:0px 0px 0px 2px rgb(255 255 255 / 20%);
}
.list-img-slide .slick-dots li.slick-active button:before{
	width:6px;
    height:6px;
}
a._calss_tyui {
    font-weight: 600;
    font-size: 16px;
    color:#27ae60;
}
.like_unlike_prt {
    width: 35px;
    height: 35px;
    background: rgba(0,0,0,0.2);
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    right:15px;
    top:15px;
    font-size: 12px;
    z-index: 1;
}
.like_unlike_prt .toggler{
    color:#ffffff;
    cursor: pointer;
    font-size:16px;
    margin-bottom: 0;
    line-height: 1;
}
.like_unlike_prt [type=checkbox]:checked, .like_unlike_prt [type=checkbox]:not(:checked) {
    position: absolute;
    left: -9999px;
    opacity: 0;
}
.like_unlike_prt input:checked + i {
    color:#ff5722;
}

/*----------------- Property List View -------------*/
.property-listing.list_view {
    padding: 0.8rem;
    display: flex;
    align-items: flex-start;
}
.property-listing.list_view .listing-img-wrapper {
    flex: 1;
	position:relative;
    min-width: 250px;
}
.property-listing.list_view .list-img-slide .slick-dotted.slick-slider {
    margin-bottom: 0;
}
.property-listing.list_view .list-img-slide {
    overflow: hidden;
    position: relative;
    min-height:200px;
    max-height:200px;
	border-radius: 4px;
}
.property-listing.list_view .slick-slide img, .property-listing.list_view .list-img-slide img {
    height: 200px;
    width: 100%;
    object-fit: cover;
}
.property-listing.list_view .list_view_flex {
    padding-left: 15px;
}
.property-listing.list_view .listing-name {
    font-size: 15px;
    line-height: 1.4;
	max-width: 375px;
}
.property-listing.list_view .price-features-wrapper {
    padding: 0.1rem 0rem 0.6rem;
    display: flex;
    flex-wrap: wrap;
}
.property-listing.list_view .listing-detail-footer {
    border: none;
    padding: 1rem 0.4rem;
}
.property-listing.list_view .foot-rates {
    display: flex;
    align-items: center;
    justify-content: flex-start;
}
.foot-rates span.elio_rate{
    width: auto;
    padding: 2px 8px;
    background: #e42d29;
    border-radius: 4px;
    font-size: 13px;
    font-weight: 700;
    color: #ffffff;
    margin-right: 5px;
}
span.elio_rate.good {
    background: rgba(33, 150, 243,0.1);
    color: #2196f3;
}
span.elio_rate.perfect {
    background: rgba(0, 150, 129,0.1);
    color: #009681;
}
span.elio_rate.poor {
    background: rgba(222, 27, 23,0.1);
    color: #de1b17;
}
._rate_stio {
    display: flex;
    align-items: center;
    letter-spacing: 3px;
    font-size: 10px;
    color: #ff9800;
	position: relative;
    top: -2px;
}

/*----------------- Price Ration Into Design ---------------*/
.tab_exclusive {
    padding: 2rem 1.5rem;
    margin: 2rem 0;
    background: #ffffff;
    border-radius: 8px;
}
a.btn.exliou {
    padding: 14px 30px;
    border-radius: 4px;
	color:#ffffff;
}
.tags-1 {
    width: 80px;
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255, 152, 0,0.1);
    margin-bottom: 20px;
    border-radius: 4% 50%;
    color: #ff9800;
    font-size: 28px;
    font-weight: 700;
}
.tags-2 {
    width: 80px;
    height: 80px;
    display: table;
    text-align: center;
    line-height: 80px;
    background: rgba(7, 173, 89,0.1);
    margin-bottom: 20px;
    border-radius: 4% 50%;
    color: #07ad59;
    font-size: 28px;
    font-weight: 700;
    margin: 0 0 20px 85%;
}
.eplios_tags.right {
    text-align: right;
}

ul.eplios_list {
    margin: 0;
    padding: 0;
    display: flex;
    margin-top: 1rem;
    max-width: 500px;
    flex-wrap: wrap;
}
ul.eplios_list li {
    list-style: none;
    display: inline-block;
    flex: 0 0 50%;
    padding-left:20px;
	margin-bottom:15px;
	position:relative;
}
ul.eplios_list li:before {
    content: "\e64c";
    position: absolute;
    font-family: 'themify';
    width: 15px;
    height: 15px;
    background: rgb(76, 175, 80,0.2);
    color: #4caf50;
    left: 0;
    top: 3px;
    border-radius: 50%;
    font-size: 7px;
    display: flex;
    align-items: center;
    justify-content: center;
}

/*--------------- New Update ------------------*/
.prt_saveed_12lk .toggler {
    color:#bec7d8;
    cursor: pointer;
    font-size: 20px;
    margin-bottom: 0;
    line-height: 1;
}
.prt_saveed_12lk .toggler [type=checkbox]:checked, .toggler [type=checkbox]:not(:checked) {
    position: absolute;
    left: -9999px;
    opacity: 0;
}
.prt_saveed_12lk .toggler [type=checkbox]:checked, .toggler [type=checkbox]:not(:checked) {
    position: absolute;
    left: -9999px;
    opacity: 0;
}
input[type=checkbox], input[type=radio] {
    box-sizing: border-box;
    padding: 0;
}
[class*=" ti-"], [class^=ti-] {
    font-family: themify;
    speak: none;
    font-style: normal;
    font-weight: 400;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.prt_saveed_12lk .toggler input:checked + i {
    color:#ff5722;
}
._exlio_125 {
    position: absolute;
    left: 15px;
    top: 20px;
    z-index: 1;
    background:#fc7651;
    height: 38px;
    padding: 0 18px;
    font-size: 16px;
    font-weight: 700;
    color: #ffffff;
    align-items: center;
    justify-content: center;
    display: inline-flex;
    border-radius: 50px;
    box-shadow: 0px 0px 0px 5px rgb(255 255 255 / 20%);
	-webkit-box-shadow: 0px 0px 0px 5px rgb(255 255 255 / 20%);
}


</style>
