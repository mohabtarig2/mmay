<template>
    <div>




<!-- Modal -->



   <div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <div class="text-center"><i class='bx bxs-check-circle text-success'></i></div>
        <div class="text-center font-weight-bold">.تم ارسال طلبك بنجاح سيتم التواصل معكم قريباُ </div>

      </div>

    </div>
  </div>
</div>



	   <span  v-for="offer,index in offers " :key="index">

	<!-- Breadcrumbs Area -->
	<section class="breadcrumbs-area" style="background-image:url('img/breadcrumbs-bg.jpg');height:5rem" >
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Breadcrumbs Content -->
					<div class="breadcrumbs-content">
						<h1 class="b-content-title m-0"></h1>
						<!-- <ul class="breadcrumbs-menu list-none">
							<li><i class="fa fa-home"></i><a href="\">{{$t('home')}}</a></li>
						</ul> -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Breadcrumbs Area -->


	<section class="property-details p-top-150">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="top-head-inner">
						<div class="row">
							<div class="col-lg-8 col-md-7 col-12">
								<div class="property-top-head">
									<div class="pt-list">
										<!-- <div class="single-pt">
											<a href="#">Hot</a>
											<a href="#">Sale</a>
										</div> -->
										<div class="single-pt rating">
											<review :rating="offer.rating"></review>
										</div>
									</div>
									<h2 class="p-single-title hs-2">{{offer.title}}</h2>
									<p class="pr-location m-0"><i class="fa fa-map-marker-alt">
                                        </i><all-uae :emirates="offer.Emirates"></all-uae></p>

								</div>
							</div>
							<div class="col-lg-4 col-md-5 col-12">
								<div class="p-single-pr m-t-50">
									<div class="price-amount">
										<span>درهم</span><b class="theme-color">{{offer.price}}</b></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12">
					<div class="top-head-bottom">
						<div class="row">
							<div class="col-lg-8 col-md-8 col-12">
						
							</div>
							<div class="col-lg-4 col-md-4 col-12" v-if="isLoggedIn && IsUser==10">
								<div class="print-react">
									<ul class="p-react-list list-none">
										<li><router-link class="btnsVilla btn-dark" 
										:to="{name:'FromOffers',id:ads_id}">
										<i class="bx bxs-home-smile text-light"></i
										>
										  {{$t('edit_on_offer')}}
										</router-link></li>
										<li>
											<a data-toggle="modal" data-target="#exampleModalCenter" v-if="IsUser==10"
										class=" btnsVilla btn-download"
										 :to="{name:'FromOffers',id:ads_id}">
										 <i class="bx bxs-home-smile text-light"></i
										>
										  {{$t('submit_an_app')}}
										</a></li>
										
										<li>
										<a class="fa fa-heart "
										v-if="offer.saved_villa==null"
										 @click="saved"
										style="cursor:pointer"
										></a>
										<a class="fa fa-heart  theme-color"
										v-else
										 @click="undosaved"
										style="cursor:pointer"
										></a>
										</li>
										
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row" >
				<div class="col-12" >

                    <div  class="property-gallery-slider">

						<div class="property-slider">

					<!-- Property Gallery Slider -->

					  <div class="" >
                <slick :v-bind="settings" v-if="offer.villa_image.length>0" >
                    <span v-for="image,i in offer.villa_image " :key="i" >

  <img :src="image.path" alt="Card image cap" width="100%" class="img_ads img-fluid">
                    </span>
                </slick>
                <span v-else>
                       <span v-for="image,i in offer.image " :key="i" >

  <img :src="image.path" alt="Card image cap" width="100%" class="img_ads">
                    </span>
                </span>
					  </div>



                        </div>


                    </div>

					<!-- End Property Gallery Slider -->
				</div>
			</div>
		</div>
	</section>





	<section class="p-description-area m-t-40 " > 
		<div class="container">
			<div class="row" >
				<div class="col-lg-4 l-12">
					<!-- Property Sidebar -->
					<div class="properties-sidebar">
						<!-- Property Sidebar Widget -->
						<unique></unique>
						<!-- Property Sidebar Widget -->
						<div class="properties-s-widget mb-5">
							<h4 class="p-sidebar-title text-center">  المعلن	</h4>
						<form class="p-schedule-tour">
								<div class="row">


									<div class="col-12">
										<div  v-for="company , index in offer.company" :key="index">

												<div class="single-agent m-b-50">
						<div class="agent-head">
							<div class="agent-img">
								<img :src="company.avatar" alt="#" >
							</div>
					
						</div>
						<div class="agent-content" >
							<h3 class="agent-title hs-4">
								<router-link :to="{name:'CompanyProfile'
							,params:{id:company.id,type:'consulting'}}">{{company.company.company_en}}</router-link></h3>
							<p class="theme-color">{{$t('consulting')}}</p>
              <small>{{company.name_eng}}</small>

						</div>
					</div>

										</div>

										 
									</div>
								</div>
							</form>
						</div>
						<!-- Property Sidebar Widget -->
						<!-- <div class="properties-s-widget">
							<h4 class="p-sidebar-title">Mortgage Calculator</h4>
							<form class="p-schedule-tour m-calculator" method="post" action="#">
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<input name="name" type="text" placeholder="Mortgage Amount (USD)" required="required">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">

											<input name="name" type="number" placeholder="Interest Rate (%)" required="required" >
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<input name="name" type="text" placeholder="Mortgage Term (Year)" required="required">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<input name="name" type="text" placeholder="Deposit (USD)" required="required">
										</div>
									</div>
									<div class="col-12">
										<div class="schedule-tour-btn">
											<button class="theme-btn">Calculate</button>
										</div>
									</div>
								</div>
							</form>
						</div> -->
						<!-- End Property Sidebar Widget -->
					</div>
					<!-- End Property Sidebar -->
				</div>
				<div class="col-lg-8 col-12" >
					<!-- Descreption Box -->
					<div class="p-descrip-box">
						
						<div class="p-des-box-title">
							<span class="request-view theme-color"><i class="fa fa-check-circle"></i></span>
							<h4 class="pr-d-title" :dir="$t('directions')" :class="$t('text_align')">{{$t('Desgin_Descrpition')}}</h4>

						</div>
						<p :dir="$t('directions')" :class="$t('text_align')">
                            {{offer.Description}}
    </p>
					</div>
					<!-- End Descreption Box -->
					<!-- Property Details -->
					<div class="p-descrip-box pro-details">
						<h4 class="pr-d-title"  :dir="$t('directions')" :class="$t('text_align')">{{$t('Desgin_Details')}}</h4>
						<div class="pr-details-main">
							<div class="row"  >
								<div class="col-xl-3 col-md-4 col-12">
									<!-- Single Property Detail -->
									<div class="pr-single m-0" :dir="$t('directions')" :class="$t('text_align')">
										
										<div class="pr-desc">
											<span>{{$t('Type_Of_Villa')}}</span>
											<p class="pr-des-title m-0">{{offer.type==1? 
												$t('classic'):$t('modern')}}</p>
										</div>
										<div class="pr-icon"><i class="fa fa-home"></i></div>
									</div>
									<!-- End Single Property Detail -->
								</div>
								<div class="col-xl-3 col-md-4 col-12">
									<!-- Single Property Detail -->
									<div class="pr-single m-0" :dir="$t('directions')" :class="$t('text_align')">
										<div class="pr-desc">
											<span>{{$t('floors')}}</span>
											<p class="pr-des-title m-0">  {{offer.floors}}</p>
										</div>
										<div class="pr-icon"><i class="fa fa-warehouse"></i></div>

									</div>
									<!-- End Single Property Detail -->
								</div>
								<div class="col-xl-3 col-md-4 col-12">
									<!-- Single Property Detail -->
									<div class="pr-single m-0" :dir="$t('directions')" :class="$t('text_align')">
										
										<div class="pr-desc">
											<span>{{$t('total_area_build')}}</span>
											<p class="pr-des-title m-0">{{offer.sqft}} ft</p>
										</div>
										<div class="pr-icon"><i class="fa fa-map"></i></div>
									</div>
									<!-- End Single Property Detail -->
								</div>
								<div class="col-xl-3 col-md-4 col-12">
									<!-- Single Property Detail -->
									<div class="pr-single m-0" :dir="$t('directions')" :class="$t('text_align')">
										<div class="pr-desc">
											<span>{{$t('bed_rooms')}}</span>
											<p class="pr-des-title m-0">{{offer.rooms}}</p>
										</div>
							<div class="pr-icon"><i class="fa fa-bed"></i></div>

									</div>
									<!-- End Single Property Detail -->
								</div>
								<div class="col-xl-3 col-md-4 col-12">
									<!-- Single Property Detail -->
									<div class="pr-single"  :dir="$t('directions')" :class="$t('text_align')">
										<div class="pr-desc">
											<span>{{$t('master_rooms')}}</span>
											<p class="pr-des-title m-0">{{offer.room_master}}</p>
										</div>
											<div class="pr-icon"><i class="fa fa-bed"></i></div>

									</div>
									<!-- End Single Property Detail -->
								</div>
								<div class="col-xl-3 col-md-4 col-12">
									<!-- Single Property Detail -->
									<div class="pr-single"  :dir="$t('directions')" :class="$t('text_align')">
										
										<div class="pr-desc">
											<span>{{$t('bathroom')}}</span>
											<p class="pr-des-title m-0">{{offer.bathroom}}</p>
										</div>
										<div class="pr-icon"><i class="fa fa-toilet"></i></div>

									</div>
									<!-- End Single Property Detail -->
								</div>

                                	<div class="col-xl-3 col-md-4 col-12">
									<!-- Single Property Detail -->
									<div class="pr-single"  :dir="$t('directions')" :class="$t('text_align')">
										<div class="pr-desc">
											<span>{{$t('majlis')}}</span>
											<p class="pr-des-title m-0">  {{offer.majlis}}</p>
										</div>
										<div class="pr-icon"><i class="fas fa-utensils"></i></div>

									</div>
									<!-- End Single Property Detail -->
								</div>
								<div class="col-xl-3 col-md-4 col-12">
									<!-- Single Property Detail -->
									<div class="pr-single"  :dir="$t('directions')" :class="$t('text_align')">
										<div class="pr-desc">
											<span>{{$t('kitchen')}}</span>
											<p class="pr-des-title m-0">{{offer.kitchen}}</p>
										</div>
							<div class="pr-icon"><i class="fas fa-utensils"></i></div>

									</div>
									<!-- End Single Property Detail -->
								</div>
								<div class="col-xl-3 col-md-4 col-12">
									<!-- Single Property Detail -->
									<div class="pr-single"  :dir="$t('directions')" :class="$t('text_align')">
										
										<div class="pr-desc">
											<span>{{$t('dining')}}</span>
											<p class="pr-des-title m-0">
                                                {{offer.dining}}
                                            </p>
										</div>
										<div class="pr-icon">
                                            <i class="fas fa-hamburger"></i></div>
									</div>
									<!-- End Single Property Detail -->
								</div>

                                	<div class="col-xl-3 col-md-4 col-12">
									<!-- Single Property Detail -->
									<div class="pr-single"  :dir="$t('directions')" :class="$t('text_align')">
										
										<div class="pr-desc">
											<span>
                                                {{$t('Service_room_placement')}}
                                            </span>

            <p class="pr-des-title m-0">
                   {{offer.Service_room_placement ==1 ? offer.Service_room_placement=$t('inside'):$t('outside')}}

                                            </p>
										</div>
										<div class="pr-icon">
                                            <i class="fas fa-map-marked"></i></div>
									</div>
									<!-- End Single Property Detail -->
								</div>

							

									   	<div class="col-xl-3 col-md-4 col-12">
									<!-- Single Property Detail -->
									<div class="pr-single"  :dir="$t('directions')" :class="$t('text_align')">
										
										<div class="pr-desc">
											<span>
                                                {{$t('villa_design')}}
                                            </span>

            <p class="pr-des-title m-0">
                   {{offer.design}} 

                                            </p>
										</div>
										<div class="pr-icon">
                                            <i class="fas fa-map-marked"></i></div>
									</div>
									<!-- End Single Property Detail -->
								</div>

									   	<div class="col-xl-3 col-md-4 col-12">
									<!-- Single Property Detail -->
									<div class="pr-single"  :dir="$t('directions')" :class="$t('text_align')">
										
										<div class="pr-desc">
											<span>
                                                {{$t('supervision')}}
                                            </span>

            <p class="pr-des-title m-0">
                   {{offer.supervision}} 

                                            </p>
										</div>
										<div class="pr-icon">
                                            <i class="fas fa-user"></i></div>
									</div>
									<!-- End Single Property Detail -->
								</div>


								
							</div>
						</div>
					</div>
					<!-- End Property Details -->

					<!-- Property Features -->
					<div class="p-descrip-box pro-features text-right" >
						<h4 class="pr-d-title">{{$t('price_include')}}</h4>
							
						<ul class="single-pro-f list-none">
							<li>{{$t('Consultant_fee')}}    <span v-show="offer.CostGov"> + 
                  {{$t('CostGov')}} </span><i class="fas fa-check" :class="{'text-muted':offer.Consultant_fee!='true'}"></i></li>
					<!-- <li>
          
            {{$t('CostGov')}}<i class="fas fa-check" :class="{'text-muted':offer.CostGov!='true'}"></i></li> -->

							<li>{{$t('gypsum')}}<i class="fas fa-check" :class="{'text-muted':offer.gypsum!='true'}"></i></li>
							<li>{{$t('the_fence')}}<i class="fas fa-check" :class="{'text-muted':offer.the_fence!='true'}"></i></li>
	<li>{{$t('conditioning')}}<i class="fas fa-check" :class="{'text-muted':offer.conditioning!='true'}"></i></li>



						</ul>
						<ul class="single-pro-f list-none">
                          
						    <li>{{$t('electric_pendants')}}<i class="fas fa-check" :class="{'text-muted':offer.electric_pendants!='true'}"></i></li>
                            <li>{{$t('tabCost')}}<i class="fas fa-check" :class="{'text-muted':offer.tabCost!='true'}"></i></li>
							<li>{{$t('Bedroom_wardrobes')}}<i class="fas fa-check" :class="{'text-muted':offer.Bedroom_wardrobes!='true'}"></i></li>
							<li>{{$t('Kitchen_Cabinets')}}<i class="fas fa-check" :class="{'text-muted':offer.Kitchen_Cabinets!='true'}"></i></li>

						</ul>
						<ul class="single-pro-f list-none">
					<li>{{$t('the_elevator')}}<i class="fas fa-check" :class="{'text-muted':offer.the_elevator!='true'}"></i></li>
					<li>{{$t('interior_decoration')}}<i class="fas fa-check" :class="{'text-muted':offer.interior_decoration!='true'}"></i></li>
                    <li>{{$t('garden_design')}}<i class="fas fa-check" :class="{'text-muted':offer.garden_design!='true'}"></i></li>
					<li>{{$t('pelvis')}}<i class="fas fa-check" :class="{'text-muted':offer.pelvis!='true'}"></i></li>

						</ul>
						
					
					</div>
							<a data-toggle="modal" data-target="#exampleModalCenter" v-if="IsUser==10"
										class="  theme-btn mb-3">
										 <i class="bx bxs-home-smile text-light"></i
										>
										  {{$t('submit_an_app')}}
										</a>
                                        	<a  v-else-if="IsUser!=10"
										class="  theme-btn mb-3">
										 <i class="bx bxs-home-smile text-light"></i
										>
										 سجل دخول كمستخدم للطلب
										</a>
                                        <a href="#/login" v-else
										class="  theme-btn mb-3">
										 <i class="bx bxs-home-smile text-light"></i
										>
										  {{$t('submit_an_app')}} / عليك تسجل الدخول اولا
										</a>
					<!-- End Property Features -->
					<!-- Property Features -->




					<!-- Propery Features -->
					<div class="p-descrip-box rating">
						<h4 class="pr-d-title">التقييم </h4>
						<div class="rating-reviews-main">
							<div class="rating-r-top">
							
							</div>
							<div class="review-add">
								<h4 class="review-add-title fs-20">{{offer.rating}} Review</h4>
								<div class="review-add-main "  v-for="review , index in offer.review" :key="index">
									<div class="review-img">
										<img :src="review.user.avatar" alt="#" style="width:126 !important; height:126px !important">
									</div>
									<div class="review-content">
										<div class="review-conent-top">
											<h4 class="fs-20">{{review.user.name}}</h4>
											<div class="reply-rating">
												<review :rating="review.rating"></review>
											
											</div>
										</div>
										<p>{{review.content}}</p>
										
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End Property Features -->
					<!-- Similar Property -->
					<div class="similar-property">
						<h4 class="similar-property-title">بحث ذات صلة</h4>
						<div class="row">
							<div class="col-12">
								<slick class="similar-property-slider" v-bind="ralted" v-if="smilirs.length">
									<div class="similar-property-main" v-for="offer , index in smilirs " :key="index">
										<!-- Single Recent Property -->
										<div class="single-recent-property">
								<div class="single-r-property-top">
									<!-- Recent Property Img -->
									<div class="single-r-property-img" v-for="image , i in offer.villa_image" :key="i">
										<img :src="image.path" alt="#" v-if="i==0" class="image_villa">
									</div>
									<div class="property-for-sale">
										<ul class="list-none">
											<li><a href="#">{{offer.type_villa==1 ? $t('classic')  : $t('modern')}}</a></li>
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
										<div class="property-ratting-save">
											<a href="#"><i class="fa fa-heart"></i>Save</a>
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
											<li><b>{{offer.rooms}}</b><span><i class="fa fa-bed"></i></span></li>
											<li><b>{{offer.bathroom}}</b><span><i class="fa fa-shower"></i></span></li>
											<li><b>{{offer.floors}}</b><span><i class="fa fa-warehouse"></i></span></li>
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

										<!-- End Single Recent Property -->
									</div>

									<!-- End Single Recent Property -->
								</slick>
							</div>
						</div>
					</div>
					<!-- End Similar Property -->
				</div>
				
			</div>
		</div>
	</section>
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      	<div class=" m-b-30 model-contact">
							<h4 class="p-sidebar-title">طلب التصميم</h4>
							<form class="p-schedule-tour">
								<div class="row">


									<div class="col-12">


<div v-if='success!=null'>
<div class="alert alert-success">
{{$t('request')}} <i class="fa fa-check-circle-o"></i>
</div>
</div>
      <div class="card-body">
        <form >

<div class="form-group">
<p class="theme-color text-right font-weight-bold">     اضف ملاحظات</p>
<textarea v-model="notes" placeholder="ملاحظاتك" required="required"></textarea>
</div>
<div class="form-group">
    <p class="theme-color text-right font-weight-bold">       رقم الموبايل</p>

  <input type="text" class="form-control" placeholder="Mob : (971) - XXX-XXXXXX" v-model="phone" >
                
</div>

<div class="form-group">
    <p class="theme-color text-right font-weight-bold">       رقم الواتساب</p>

  <input type="text" class="form-control" placeholder="Whatsapp : (971) - XXX-XXXXXX" v-model="whatsapp">
                
</div>

            <div class="form-group">
             <label class="form-control">
                  <span class="btn btn-light" @click="$refs.fileinput" v-if="passport==null"><i class="fas fa-images" ></i></span>
                <span class="btn btn-light " @click="$refs.fileinput" v-else><i class="text-success fas fa-images" ></i></span>
                      {{$t('Emirates_id')}}   <small class=" text-danger font-weight-bold" v-if="FileNotpassportAllowd!=null">{{FileNotpassportAllowd}}</small>

                <img v-if="passport!=null" :src="url1" style="width:50; height:50px;border-radius: 10px;">


                <input type="file" class="form-control"  @change="filePassport" style="display:none" ref="fileinput">
		
              





            </label>


            <div class="progress" v-if="progress">
  <div class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progress" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
            </div>
<div class="form-group">
             <label class="d-block form-control">
                 <span class="btn btn-light" @click="$refs.fileinput2.click()" v-if="map==null"><i class="fas fa-images" ></i></span>
                <span class="btn btn-light text-success" @click="$refs.fileinput2" v-else><i class="fas fa-images" ></i></span>
                {{$t('land_map')}}
                <input type="file" class="form-control"  @change="fileMap" style="display:none" ref="fileinput2">
               <div class=" text-danger" v-if="FileNotMapAllowd!=null">{{FileNotMapAllowd}}</div>


                 <img v-if="map!=null" :src="url2" style="width:50; height:50px;border-radius: 10px;">
            </label>
<div class="progress" v-if="progress2" style="hieght:10px !important">
  <div class="progress-bar  progress-bar-striped bg-success" role="progressbar" :style="'width:'+progress2+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>

</div>
<!-- <div class="form-group">
            <label>
                {{$t('notes')}}
                <textarea class="form-control"> </textarea>
            </label>
</div> -->

            <div class="text-right form-group" dir="rtl">
            <p class="font-weight-bold theme-color"> {{$t('build_by')}}</p>

        <label class="checkbox d-bolck" :dir="$t('directions')" >
            <input type="radio"  value="1" name="typeBuild"  v-model="typeBuild">
            <span class="check" style="border-radius:10px"></span>
            <span class="mr-4 ml-4">{{$t('Loan')}}</span>
         </label>
             <label class="checkbox d-bolck" :dir="$t('directions')" >
            
           <input type="radio" value="Grant"  name="typeBuild"  v-model="typeBuild">
            <span class="check" style="border-radius:10px"></span>
            <span class="mr-4 ml-4">{{$t('Grant')}}</span>
             </label>
</div>
            

            <div class="form-group">
                <div class="text-right font-weight-bold theme-color" dir="rtl">
أذكر  قيمة القرض
<sup class="text-danger"> (اختياري)</sup>
                </div>
  <input type="text" class="form-control" placeholder="" v-model="priceGrant">
                
</div>


        <div class="text-right form-group" dir="rtl">
<p class=" font-weight-bold theme-color">الجهة المقدمة للمنحة </p>

             
    <label class="checkbox d-bolck" :dir="$t('directions')" >
            <input type="radio"  value="1" name="Provider" aria-label="Checkbox for following text input" v-model="Provider">
            <span class="check" style="border-radius:10px"></span>
            <span class="mr-4 ml-4">برنامج الشيخ زايد للاسكان</span>
    </label>
     <label class="checkbox d-bolck" :dir="$t('directions')" >
            <input type="radio"  value="2" name="Provider" aria-label="Checkbox for following text input" v-model="Provider">
            <span class="check" style="border-radius:10px"></span>
            <span class="mr-4 ml-4">برنامج الشيخ محمد بن راشد للاسكان</span>
     </label>
     <label class="checkbox d-bolck" :dir="$t('directions')" >
            <input type="radio"  value="3" name="Provider" aria-label="Checkbox for following text input" v-model="Provider">
            <span class="check" style="border-radius:10px"></span>
            <span class="mr-4 ml-4">برنامج ابوظبي للاسكان</span>
     </label>
      <label class="checkbox d-bolck" :dir="$t('directions')" >
            <input type="radio"  value="4" name="Provider" aria-label="Checkbox for following text input" v-model="Provider">
            <span class="check" style="border-radius:10px"></span>
            <span class="mr-4 ml-4">برنامج الشارقة للاسكان</span>
      </label>

      <label class="checkbox d-bolck" :dir="$t('directions')" >
            <input type="radio"  value="5" name="Provider" aria-label="Checkbox for following text input" v-model="Provider">
            <span class="check" style="border-radius:10px"></span>
            <span class="mr-4 ml-4">برنامج الشارقة للاسكان اسناد</span>
      </label>
   <label class="checkbox d-bolck" :dir="$t('directions')" >
            <input type="radio"  value="6" name="Provider" aria-label="Checkbox for following text input" v-model="Provider">
            <span class="check" style="border-radius:10px"></span>
            <span class="mr-4 ml-4">  الديوان</span>
   </label>

        </div>

        <div class="text-right">

    <p class="theme-color font-weight-bold">البنك الممول اللمنحة  
<sup class="text-danger"> (اختياري)</sup>
    </p>
<div class="form-group">
<input type="text" class="form-control" placeholder="" v-model="BankProvider">
</div>
        </div>



  



        </form>
      </div>

	<div class="schedule-tour-btn">
				<button class="theme-btn" @click.prevent="payForm(offer)"
			>ارسال</button>
			</div>
		</div>
	</div>
</form>
</div>

    </div>
  </div>
</div>
    </span>
	<div class='content d-none'>

<div class="alert alert-success alert-white rounded">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <div class="icon"><i class="fa fa-check"></i></div>
    <strong>Success!</strong> Changes has been saved successfully!
</div>

</div>
    </div>
</template>


<script>
import { mapState, mapGetters } from "vuex";
 import slick from 'vue-slick-carousel';
import AllUae from './AllUae.vue';
import Unique from './unique.vue';
import Review from '../dashboard/review.vue';


export default {
 components: { slick ,AllUae, Unique, Review },
 data() {
     return {
         priceGrant:null,
         BankProvider:null,
         Provider:null,
         grant:null,
         typeBuild:null,
         c1:null,
         c2:null,
         offers:null,
         uniques:null,
         payment:'',
      form:{
        EmiratesId:null,
        passport:null,
        map:null,
      },
        slides:null,
           active: 1,
        passport:null,
        map:null,
        notes:null,
        filePassportName:null,
        url1:null,
        url2:null,
        progress:0,
        progress2:0,
        bank:null,
        mbr:null,
        szp:null,
        Special_grant:null,
        other:null,
        success:null,
        FileNotMapAllowd:null,
          map:null,
        FileNotpassportAllowd:null,
        userid:null,
        smilirs:null,
        phone:null,
        whatsapp:null,
        ads_id:this.$route.params.id,
		  settings:{
         dots: true,
         lazyLoad: "ondemand",
    infinite  : true,
    initialSlide  : 2,
    speed  : 500,
    slidesToShow  : 1,
    slidesToScroll  : 1,
    swipeToSlide  : true
     },
		ralted: {
  dots: true,
  infinite: false,
  speed: 500,
  slidesToShow: 2,
  slidesToScroll: 4,
  initialSlide: 0,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
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
        slidesToShow: 1,
        slidesToScroll: 1,
 		dots: true

		
      }
    }
  ]
},


        }

    },
	  mounted() {

                $('.header-inner').removeClass('d-none');
                $('.header-inner').addClass('d-block');
        },
watch:{
 phone() {
        var x = this.phone.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,6})/);
  this.phone = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
    },
	 whatsapp() {
        var x = this.whatsapp.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,6})/);
  this.whatsapp = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
    },
    priceGrant(newValue){
            const result = newValue.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
     this.priceGrant = result;
    }
},
    methods:{


    saved(event){
        let data = new FormData();
        data.append('villa_id',event)
          axios.post('api/villa/saved',data).then(res=>{
              this.savedid=res.data;
              this.showOffer()
          });
    },
    undosaved(event){
        let data = new FormData();
        data.append('villa_id',event)

          axios.post('api/villa/delete',data).then(res=>{
              this.savedid=res.data;
              this.showOffer()
          });
    },
      ridirct(event){
axios.get('/api/ads/details/'+event).then(res=>{
            this.offers = res.data;
                       this.$router.push({ name:'pageDetails',params:{id:event}});
                       location.reload();

});
      },

       filePassport(event){
         this.passport=event.target.files[0];
         this.filePassportName = this.passport.name;
          if(!this.passport.type.match('image.*') ){
              this.passport=null
              this.progress=null
              this.progres2=null
                   this.FileNotpassportAllowd =`should be Jpg Or Png `;
                    return ;
                }

          let data = new FormData();
          data.append("passport",this.passport,this.passport.name);
         this.url1 = URL.createObjectURL(this.passport);
  const config = {
                    onUploadProgress:uploadEvent=>{
                    this.progress =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                    // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                 }
                }


                axios.post('sucess',data,config).then(res=>{
                    this.FileNotpassportAllowd=null
                });




       },
       fileMap(event){
           this.map=event.target.files[0];

             if(! this.map.type.match('image.*') ){
                   this.FileNotMapAllowd =`should be Jpg Or Png `;
                    return ;
                }
           this.url2 = URL.createObjectURL(this.map);

                 let data = new FormData();
          data.append("map",this.map,this.map.name);

  const config = {
                    onUploadProgress:uploadEvent=>{
                    this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                    // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                 }
                }


                axios.post('sucess',data,config).then(res=>{
                    this.FileNotMapAllowd=null
                });




       },

	       saved(event){

		
                $('.content').removeClass('d-none');

				setInterval(function ()
				 {
					 $('.content').addClass('d-none');
					 },
				  3000);
        let data = new FormData();
        data.append('villa_id',this.ads_id)
          axios.post('api/villa/saved',data).then(res=>{
            //   this.savedid=res.data;
              this.VillaDetails()
          });
    },
    undosaved(event){
        let data = new FormData();
        data.append('villa_id',this.ads_id)

          axios.post('api/villa/delete',data).then(res=>{
              this.savedid=res.data;
              this.VillaDetails()
          });
    },

    succesAlert(){
        $('#success').modal('show');
                $('.modal-backdrop').css('display','block');
                
    },
        payForm(offer){
		  console.log(offer);
		  
         let title = '';
         let masterRoom = '';
         let rooms ='';
         let living_room = '';
         let majlis = '';
         let kitchen = '';
         let dining	 = '';
         let bathroom	 = '';
         let Description	 = '';
         let floors	 = '';
         let TypeVilla	 = '';
         let Emirates	 = '';

		let Consultant_fee = '';
		let conditioning = '';
		let gypsum = '';
		let electric_pendants = '';
		let Bedroom_wardrobes = '';
		let Kitchen_Cabinets = '';
		let the_elevator = '';
		let pelvis = '';
		let interior_decoration = '';	
		let garden_design = '';
		let the_fence = '';
		let price = '';

		let Phone_Eng = '';
		let Name_eng = '';
		let supervision = '';
		let tab = '';
		let design = '';

		
				
          
      
      
          title = offer.title;
          masterRoom = offer.room_master;
          rooms =offer.rooms;
          living_room = offer.living_room;
          majlis = offer.majlis;
          kitchen = offer.kitchen;
          dining	 = offer.dining;
          bathroom	 = offer.bathroom;
          Description	 = offer.Description;
          floors	 = offer.floors;
          TypeVilla	 = offer.type_villa;
          Emirates	 = offer.Emirates;

		  //additional info 
          Consultant_fee	 = offer.Consultant_fee;
          conditioning	 = offer.conditioning;
          gypsum	 = offer.gypsum;
		  electric_pendants = offer.electric_pendants
          Bedroom_wardrobes	 = offer.Bedroom_wardrobes;
          Kitchen_Cabinets	 = offer.Kitchen_Cabinets;
          the_elevator	 = offer.the_elevator;
          pelvis	 = offer.pelvis;
          interior_decoration		 = offer.interior_decoration	;
          garden_design		 = offer.garden_design	;
          the_fence		 = offer.the_fence	;
          price		 = offer.price	;

		   	Phone_Eng =offer.phone;
		 	Name_eng = offer.name_eng;
		 	supervision = offer.supervision;
			tab = offer.sqft;
			design = offer.design;

		  


		  let images = offer.villa_image;
          
          
      

             let data = new FormData();

			  images.forEach(image =>{
            data.append('images[]',image.name)
        })


      data.append("com_id", this.com_id);
      data.append("villa_type", TypeVilla);
      data.append("floor", floors);
      data.append("position", this.position);

      data.append("mastar_room", masterRoom);
      data.append("rooms", rooms);
      data.append("living_room", living_room);
      data.append("majlis", majlis);
      data.append("kitchen", kitchen);
      data.append("bathroom", bathroom);
      data.append("dining_room", dining);
      data.append("emirates", Emirates);
      data.append("title",title);
      data.append("Description", Description);

	  //additional info 
      data.append("Consultant_fee", Consultant_fee);
      data.append("conditioning", conditioning);
      data.append("gypsum", gypsum);
      data.append("electric_pendants", electric_pendants);
      data.append("Bedroom_wardrobes", Bedroom_wardrobes);
      data.append("Kitchen_Cabinets", Kitchen_Cabinets);
      data.append("the_elevator", the_elevator);
      data.append("interior_decoration", interior_decoration);
      data.append("garden_design", garden_design);
      data.append("the_fence", the_fence);
      data.append("price", price);

      data.append("phones", Phone_Eng);
      data.append("Name_eng", Name_eng);
      data.append("supervision", supervision);
      data.append("tab", tab);
      data.append("design", design);


      data.append("c_id", offer.c_id);
      data.append("sqft", offer.sqft);

	     	


		      data.append("position", offer.Service_room_placement);
	





      
      data.append("notes", this.notes);
      data.append("priceGrant", this.priceGrant);
      data.append("BankProvider", this.BankProvider);
      data.append("Provider", this.Provider);
  
      data.append("typeBuild", this.typeBuild);

      data.append("phone", this.phone);
      data.append("whatsapp", this.whatsapp);
      data.append("other", this.other);
      data.append("Special_grant", this.Special_grant);
      data.append("ads_id", this.ads_id);
      data.append("passport",this.passport,this.passport.name);
      data.append("map",this.map,this.map.name);
      

 axios.post('paymentOffer',data).then(res=>{

$('#exampleModalCenter').modal('hide');
   $('.modal-backdrop').css('display','block');

   this.succesAlert();
                
 this.success = res.data;



        this.bank=false;
        this.mbr=false;
        this.szp=false
        this.other=false
        this.success=false
        this.passport=null
        this.Special_grant=false;
        this.map=null
        this.url1=null
        this.url2=null
        this.progress=null
        this.progress2=null
        this.notes=null
        this.phone=null
        this.whatsapp=null


                })
        
	  },
		VillaDetails(){
			    axios.get('/api/ads/details/'+this.$route.params.id).then(res=>{
            this.offers = res.data;
                this.offers.forEach(offer =>{

            this.emiratsSmilir(offer.Emirates);


        })
        });

		},
            emiratsSmilir(event){

        axios.get('/api/ads/similir/'+event).then(res=>{
                this.smilirs=res.data;
                });
            // })
        },
    },
 mounted() {
    this.c1 = this.$refs.c1;
    this.c2 = this.$refs.c2;

  },



  created() {
   this.VillaDetails();
            // console.log(this.offers.Emirates);




  },
computed:{
  IsUser(){
            return this.$store.getters.IsUser
        },
        user(){
             return this.$store.getters.user
        },
         ...mapState({

      isLoggedIn: "isLoggedIn",

    }),
    ...mapGetters({

    }),
}
}
</script>

<style scoped>
.page-center{
	    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    text-align: center;

}
.image_villa{
    width:370px !important;  height:280px !important;
}
#bx-pager img{
    width:182px;
    height:130px;
}
.btnsVilla{
	padding: 10px;
}


 .btnsVilla .bx{
	font-size:12px;
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

.agent-img{
	width: 150px !important;
	cursor: pointer;
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
  .img_ads{
        min-width: 100%;
    min-height: 100%;
    position: relative;
    left: 50%;
    -webkit-transform: translate(-50%);
    transform: translate(-50%);
}
.pr-single .pr-desc {
    margin-right: 10px I !important;
}
.pr-single {
    display: inline-flex;
    align-items: center;
    margin-top: 20px;
     flex-direction: row-reverse; 
}
.pr-single{
	float: right;
}
.pr-desc span{
    font-weight: bold;
}
</style>
<style lang="scss" scoped>

 

  .checkbox ,radio {
    display: block;
    position: relative;
    padding-left: 30px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 14px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;

    /* this hide the default checkbox */
    input {
      position: absolute;
      opacity: 0;
      cursor: pointer;
      height: 0;
      width: 0;

      &:checked ~ .check {
        background-color: #2343f8;

        &:after {
          display: block;
        }
      }
    }

    .check {
      position: absolute;
      top: 7px;
      height: 14px;
      width: 14px;
      background-color: white;
      border: 2px solid #2343f8;
      border-radius:5px;

      &:after {
        content: "";
        position: absolute;
        display: none;

        left: 3px;
        top: 1px;
        width: 4px;
        height: 7px;
        border: 3px solid white;
        border-width: 0 1.5px 1.5px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
      }
    }
  }




</style>