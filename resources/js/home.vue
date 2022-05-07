
	<template>

	<div>
	<!--[if IE]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

	<!-- Preloader -->
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



	<!-- Hero Area -->

    <!-- <VueSlickCarousel :v-bind="settings" >
<div>1</div>
      <div>2</div>
      <div>3</div>
      <div>4</div>
    </VueSlickCarousel> -->


	<section class="hero-area bg-image bg-left" style="background-image:url('img/hero-bg.jpg')">
		<div class="container hero-container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12">
					<!-- Hero Content -->
					<div class="hero-content">
						<!-- <a href="#" class="hero-play-btn"><i class="fas fa-play"></i></a> -->
						<span class="hero-subtitle">{{$t('Going')}}</span>
						<h1 class="hero-title">{{$t('header_title1')}} <span>{{$t('header_title_part')}}</span></h1>
						<div class="hero-icon-box">
							<div class="icon"><i class="far fa-comments"></i></div>
							<div class="media-body">
								<span>{{$t('Get_Support')}}</span>
								<h4 class="mb-0"><a href="mailto:Info@example.com">Info@ambtender.com</a></h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<!--
		<div class="hero-thumb-wrap">
			<div class="hero-thumb " data-nav-for=".hero-slider" data-slide-go="0">
				<img src="img/hero-slider/hero-thumb-1-1.jpg" alt="hero Image">
			</div>
			<div class="hero-thumb" data-nav-for=".hero-slider" data-slide-go="1">
				<img src="img/hero-slider/hero-thumb-1-2.jpg" alt="hero Image">
			</div>
			<div class="hero-thumb" data-nav-for=".hero-slider" data-slide-go="2">
				<img src="img/hero-slider/hero-thumb-1-3.jpg" alt="hero Image">
			</div>
		</div> -->

<div class="hero-slider" >

			<!-- Single Hero Slider -->

			<div class="single-h-slider" style="background-image:url('img/hero-slider/01.jpg'); "  aria-hidden="false">

			</div>
			<!-- Single Hero Slider -->
			<!-- <div class="single-h-slider" style="background-image:url('img/hero-slider/02.jpg');" aria-hidden="true">

			</div> -->
			<!-- Single Hero Slider -->
			<!-- <div class="single-h-slider" style="background-image:url('img/hero-slider/033.jpg');"  aria-hidden="true">

			</div> -->
			<!-- End Single Hero Slider -->

</div>
	</section>
	<!-- End Hero Area -->

	<villa-finder></villa-finder>

	<section class="about-area section-padding">
		<div class="bg-image bg-img-bottom" style="background-image:url('img/about/about-shape.png')"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-12 order-class">
					<!-- About Content -->
					<div class="about-content">
						<div class="about-top-content">
							<span class="small-title">{{$t('uniqueServices')}}</span>
							<h2 class="about-title hs-1">{{$t('uniqueServicesDesc1')}} <span class="theme-color">{{$t('uniqueServicesDesc2')}}</span></h2>
							<p  class="mb-0">
                                  {{$t('uniqueServicesDesc3')}}
                                  .</p>
						</div>



													                                      
						<!-- About Content Bottom -->
						<div class="about-content-bottom">
							<div class="row gx-1 g-lg-4">
								<div class="col-lg-4 col-md-4 col-auto" data-aos="fade-up" data-aos-delay="200">
									<div class="about-content-widget">
										<router-link :to="{name:'consultances'}">

									
										<i class='bx bxs-home-smile'></i>
                                        <span>{{$t('tender')}}</span>
										<h6 class="mt-3">{{$t('consulting_company')}}</h6>
										</router-link>
									</div>
                                    <div class="about-content-widget">
										
										<i class="fas fa-couch"></i>

                                        <span class="">{{$t('tender')}}</span>
										<h6 class="mt-3">{{$t('Soil_testing')}}</h6>
									</div>
                                    <div class="about-content-widget">
											<router-link :to="{name:'interiorTender'}">
										<i class="fas fa-couch"></i>
                                        <span>{{$t('tender')}}</span>
										<h6 class="mt-3">{{$t('interior_decoration')}}</h6>
											</router-link>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-4 col-auto" data-aos="fade-up" data-aos-delay="300">
									<div class="about-content-widget">
										<router-link :to="{name:'constructionTender'}">
										<i class="fas fa-hard-hat"></i>
                                        <span>{{$t('tender')}}</span>
										<h6 class="mt-3">{{$t('construcion_company')}}</h6>
										</router-link>
									</div>

                                    <div class="about-content-widget">
										<router-link :to="{name:'StoneTender'}">
										<i class="fas fa-igloo"></i>
                                        <span>{{$t('tender')}}</span>
										<h6 class="mt-3">{{$t('Stone_companies')}}</h6>
										</router-link>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-auto" data-aos="fade-up" data-aos-delay="400">
                                    <div class="about-content-widget">
									<router-link :to="{name:'hvac'}">
										<i class="fa fa-fan"></i>
                                        <span>{{$t('tender')}}</span>
										<h6 class="mt-3">{{$t('HVAC_companies')}}</h6>
									</router-link>
									</div>

                                    <div class="about-content-widget">
										<i class="fas fa-toolbox"></i>
                                        <span>{{$t('tender')}}</span>
											<h6 class="mt-3">{{$t('maintenance')}}</h6>
									</div>

								</div>
							</div>
                            <!-- <div class="row gx-1 g-lg-4">
								<div class="col-lg-4 col-md-4 col-auto" data-aos="fade-up" data-aos-delay="200">
									<div class="about-content-widget">
										<i class="fa fa-house-user"></i>
										<span>Safe Life</span>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-auto" data-aos="fade-up" data-aos-delay="300">
									<div class="about-content-widget">
										<i class="fa fa-user-secret"></i>
										<span>Office</span>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-auto" data-aos="fade-up" data-aos-delay="400">
									<div class="about-content-widget">
										<i class="fa fa-building"></i>
										<span>Apartment</span>
									</div>
								</div>
							</div> -->
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-12">
					<!-- About Image -->
					<div class="about-img-area">
						<div class="about-img">
							<div class="row">
								<div class="col-lg-6 col-md-6 col-12">
									<div class="about-img-one">
										<img src="img/about/02.jpg" alt="#">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="about-img-two">
										<img src="img/about/03.jpg" alt="#">
									</div>
								</div>
							</div>
						</div>
						<!-- About Property Details -->
						<div class="about-property-details" data-aos="fade-up" data-aos-delay="600">
							<div class="a-property-price">
								<h3 class="price-title fs-40"> {{$t('start_project')}}</h3>

								<p  class="mb-0">{{$t('Get_imagination')}}</p>
								
							</div>
							<div class="a-property-btn">
							<router-link :to="{name:'tenders'}" class="theme-btn">{{$t('start')}}</router-link>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- End About Area -->
    <div class="row">
        <div class="col-md-6">
                    <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src=" img/1_lEyU2zS2TBaOl_fbXqPChA.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/Mobile_AD_FORMATS3-1.png" alt="Second slide">
    </div>

  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls1" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls1" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

        </div>



              <div class="col-md-6">

                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/Mobile_AD_FORMATS3-1.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/1_lEyU2zS2TBaOl_fbXqPChA.png" alt="Second slide">
    </div>
    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
        </div>



    </div>


	<!-- Recent Property Area -->
	<section class="recent-property-area section-padding">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
					<div class="section-title">
						<span class="sub-heading">{{$t('villa')}}</span>
						<h2 class="heading-title">{{$t('Recently_Added')}}</h2>
						<p>
                            {{$t('Villa_offer_describe')}}</p>
					</div>
				</div>
			</div>
			<div class="row">

				<div class="col-12">

	<h4 class="text-right">
							فلل مميزة
						</h4>

						<div class="text-left">
						<a @click="Singlefillter('type','all')" style="cursor:pointer" class="all">الكل </a>
						</div>
                    <slick   v-if="allOffershow.length" v-bind="settings"  class="recent-property-slider  ">
					

                        <div class="single-p-slider" v-for="offer , index in allOffershow " :key="index">
<div class="single-recent-property">
								<div class="single-r-property-top">
									<!-- Recent Property Img -->
									<div class="single-r-property-img" v-for="image , i in offer.villa_image" :key="i">
									<router-link :to="{name:'pageDetails',params:{id:offer.id}}">	
										<img :src="image.path" alt="#" v-if="i==0" class="image_villa">
									</router-link>
									</div>
									<div class="property-for-sale visible-xs">
										<ul class="list-none ">
											<li><a >{{offer.type_villa==1 ? $t('classic')  : $t('modern')}}</a></li>
											<li class="unique  "  ><a href="#" >{{$t('unique')}}</a></li>
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
											</div>
										</div>
										<div class="property-ratting-save" v-if="offer.saved_villa==null">
											<a @click="saved(offer.id)" ><i class="fa fa-heart"></i><b class="visible-xs">Save</b></a>
										</div>
                                        <div class="property-ratting-save saved" v-else>
											<a @click="undosaved(offer.id)" class="theme-color"><i class="fa fa-heart"></i><b class="visible-xs">
												{{$t('saveed')}}</b></a>
										</div>
									</div>
								</div>
								<!-- Single Recent Content -->
								<div class="s-property-content">
									<h3 class="srp-title hs-4"><router-link :to="{name:'pageDetails',params:{id:offer.id}}">
										{{offer.title}}</router-link></h3>
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
									<div class="property-user"  v-for="company , index in offer.company "
                                                :key="index">
										<div class="property-user-left visible-xs">
											<img :src="company.avatar" alt="#" class="rounded-circle visible-xs	" width="40" height="40">
											<div class="property-user-title">
												<p class="at-title mb-0 hs-6">
													<router-link :to="{name:'CompanyProfile',params:{id:company.id,type:'consulting'}}">
														{{company.name}}</router-link>
														</p>
												<span>استشارات هندسية</span>
											</div>
										</div>
										<div class="property-user-price">
											<small><p>{{offer.price}}</p></small>
										</div>
									</div>
								</div>
							</div>
                    </div>


                    </slick>
				</div>
                <div class="col-12 mt-5">

<h4 class="text-right">
							فلل كلاسيك
						</h4>

						<div class="text-left">
												<a @click="Singlefillter('type',1)" class="all" style="cursor:pointer">الكل </a>

						</div>
                    <slick   v-if="classic.length" v-bind="settings"  class="recent-property-slider  ">

                        <div class="single-p-slider" v-for="offer , index in classic " :key="index">
<div class="single-recent-property">
								<div class="single-r-property-top">
									<!-- Recent Property Img -->
									<div class="single-r-property-img" v-for="image , i in offer.villa_image" :key="i">
									<router-link :to="{name:'pageDetails',params:{id:offer.id}}">	
										<img :src="image.path" alt="#" v-if="i==0" class="image_villa">
									</router-link>
									</div>
									<div class="property-for-sale visible-xs">
										<ul class="list-none">
											<li><a href="#">{{offer.type_villa==1 ?offer.type =  $t('classic')  : offer.type=  $t('modern')}}</a></li>

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
											</div>
										</div>

										<div class="property-ratting-save" v-if="offer.saved_villa==null">
											<a @click="saved(offer.id)" ><i class="fa fa-heart"></i>{{$t('save')}}</a>
										</div>
                                        <div class="property-ratting-save saved" v-else>
											<a @click="undosaved(offer.id)" class="theme-color"><i class="fa fa-heart"></i>Saveed</a>
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
											<li class="visible-xs"><b>{{offer.tab}}</b><span><i class="fas fa-arrows-alt"></i></span></li>
										</ul>
									</div>
									<!-- Property User -->
									<div class="property-user"  v-for="company , index in offer.company "
                                                :key="index">
										<div class="property-user-left visible-xs">
											<img :src="company.avatar" alt="#" class="rounded-circle" width="40" height="40">
											<div class="property-user-title">
												<p class="at-title mb-0 hs-6"><router-link :to="{name:'CompanyProfile',params:{id:company.id,type:'consulting'}}">
														{{company.name}}</router-link></p>
												<span>شركة إستشارات</span>
											</div>
										</div>
										<div class="property-user-price">
											<small><p>{{offer.price}}</p></small>
										</div>
									</div>
								</div>
							</div>
                    </div>


                    </slick>
				</div>
                    <div class="col-12 mt-5">


<h4 class="text-right">
							فلل حديثة
						</h4>

						<div class="text-left">
							<a @click="Singlefillter('type',2)" class="all" style="cursor:pointer">الكل </a>

						</div>
                    <slick   v-if="modern.length" v-bind="settings"  class="recent-property-slider  ">

                        <div class="single-p-slider" v-for="offer , index in modern " :key="index">
<div class="single-recent-property">
								<div class="single-r-property-top">
									<!-- Recent Property Img -->
									<div class="single-r-property-img" v-for="image , i in offer.villa_image" :key="i">
									<router-link :to="{name:'pageDetails',params:{id:offer.id}}">
											<img :src="image.path" alt="#" v-if="i==0" class="imaige_villa">
									</router-link>
									</div>
									<div class="property-for-sale visible-xs">
										<ul class="list-none">
											<li><a href="#">{{offer.type_villa==1 ?offer.type =  $t('classic')  : offer.type=  $t('modern')}}</a></li>

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
												<span>4  Comment</span>
											</div>
										</div>
										<div class="property-ratting-save" v-if="offer.saved_villa==null">
											<a @click="saved(offer.id)" ><i class="fa fa-heart"></i><span class="visible-xs">
												{{$t('save')}}</span></a>
										</div>
                                        <div class="property-ratting-save saved" v-else>
											<a @click="undosaved(offer.id)" class="theme-color"><i class="fa fa-heart"></i>{{$t('Saveed')}}</a>
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

											<li class="visible-xs"><b>{{offer.tab}}</b><span><i class="fas fa-arrows-alt"></i></span></li>
										</ul>
									</div>
									<!-- Property User -->
									<div class="property-user"  v-for="company , index in offer.company "
                                                :key="index">
										<div class="property-user-left visible-xs" >
											<img :src="company.avatar" alt="#" class="rounded-circle" width="40" height="40">
											<div class="property-user-title">
												<p class="at-title mb-0 hs-6">
													<router-link :to="{name:'CompanyProfile',params:{id:company.id,type:'consulting'}}">
														{{company.name}}</router-link></p>
												<span>{{$t('company')}}</span>
											</div>
										</div>
										<div class="property-user-price">
											<small><p>{{offer.price}}</p></small>
										</div>
									</div>
								</div>
							</div>
                    </div>


                    </slick>
				</div>
			</div>
		</div>
	</section>
	<!-- End Recent Property Area -->

	<!-- Work Process Area -->
	<section class="work-process-area section-padding">
		<div class="bg-image bg-img-top" style="background-image:url('img/work-process/work-process-bg.png')"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
					<div class="section-title">
						<span class="sub-heading">{{$t('Find Out')}}</span>
						<h2 class="heading-title">{{$t('how_it_work')}}</h2>
						<p>
                            {{$t('how_it_work_qoute')}}
                             </p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<slick class="work-process-slider"  v-bind="seetingsWork">
						<!-- Single Process -->
						<div class="single-process">
							<div class="process-icon">
								<i class="fa fa-home"></i>
							</div>
							<div class="process-content">
								<h3 class="process-title hs-4">{{$t('Choose_tender')}}</h3>
								<p>
                                    {{$t('message_Type_Tender')}}
                                   </p>
							</div>
						</div>
						<!-- Single Process -->
						<div class="single-process">
							<div class="process-icon">
								<i class='bx bxs-send'></i>
							</div>
							<div class="process-content">
								<h3 class="process-title hs-4">{{$t('Add_Project')}}</h3>
								<p>
                                        {{$t('message_add_project')}}
                                        </p>
							</div>
						</div>
						<!-- Single Process -->
						<div class="single-process">
							<div class="process-icon">
								<i class="fa fa-mouse"></i>
							</div>
							<div class="process-content">
								<h3 class="process-title hs-4">{{$t('Choose_the_right_offer')}}</h3>
								<p>
                                        {{$t('message_the_right_offer')}}
                                   </p>
							</div>
						</div>
						<!-- Single Process -->
						<div class="single-process">
							<div class="process-icon">
								<i class='bx bxs-home-heart'></i>
							</div>
							<div class="process-content">
								<h3 class="process-title hs-4">{{$t('Execute_the_project')}}</h3>
								<p>
                                    {{$t('message_Execute_the_project')}}
                                    </p>
							</div>
						</div>

					</slick>
				</div>
			</div>
		</div>
	</section>
	<!-- End Work Process Area -->

	<!-- Portfolio Area -->

	<!-- End Portfolio Area -->

	<!-- Testimonials Area -->



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width: 800px;margin: 30px auto;">
    <div class="modal-content">


      <div class="modal-body " style="position:relative;padding:0px;">

       <button type="button" class="close" data-dismiss="modal" aria-label="Close"
style="position:absolute;
  right:-30px;
  top:0;
  z-index:999;
  font-size:2rem;
  font-weight: normal;
  color:#fff;
  opacity:1;">
          <span aria-hidden="true">&times;</span>
        </button>
        <!-- 16:9 aspect ratio -->
<div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/PimNyy606M4" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
</div>


      </div>

    </div>
  </div>
</div>








	<div id="testimonials" class="testimonials section">
		<div class="testimonial-video" style="background-image:url(img/testimonial/testimonial-bg.jpg)">
			<div class="video-main">
				<!-- Promo-Video -->
				<div class="promo-video">
					<div class="waves-block">
						<div class="waves wave-1"></div>
						<div class="waves wave-2"></div>
						<div class="waves wave-3"></div>
					</div>
				</div>

 <button  class="video video-btn video-popup mfp-iframe"  data-toggle="modal" data-target="#myModal" @click="OpenVideo()">
     <i class="item-center fa fa-play"></i>
     </button>


			</div>
		</div>
		<div class="container" :dir="$t('direactions')" :class="$t('text_align')">
			<div class="row g-0">
				<div class="col-lg-6 offset-lg-6 col-12">
					<!-- Testimonial Main -->
					<div class="testimonial-main-content">
						<div class="row">
							<div class="col-12">
								<div class="testimonial-content" >
									<!-- Single Testimonial Content -->
									<div class="single-content">
										<p class="t-title">{{$t('our_goals')}}</p>
										<p class="">{{$t('goal1')}}</p>
                						<p class="">{{$t('goal2')}}</p>
									    <p class="">{{$t('goal3')}}</p>
                                        <p class="">{{$t('goal4')}}</p>
                						<p class="">{{$t('goal5')}}</p>

									</div>
									<!-- Single Testimonial Content -->

									<!-- End Single Testimonial Content -->
								</div>
							</div>
						</div>

					</div>
					<!-- End Testimonial Main -->
				</div>
			</div>
		</div>
	</div>
	<!-- End Testimonials Area -->

	<!-- Agent Area -->
		<section class="agent-area p-top-150 p-btm-100">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
					<div class="section-title">
						<span class="sub-heading">{{$t('team_tender')}}</span>
						<h2 class="heading-title">{{$t('team')}} </h2>
						<p>
                           {{$t('team_goals')}}
                           </p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<slick v-bind="settingsTeam" class="agents-slider" >
						<!-- Single Agent -->
						<div class="single-agent">
							<div class="agent-head">
								<div class="agent-img">
									<img src="img/agent/01.png" alt="#">
								</div>
								<div class="agent-social">
									<a class="plus"><i class="fa fa-plus item-center"></i></a>
									<ul class="agent-social-hover list-none">
										<li><a href="#"><i class="fab fa-facebook-f item-center"></i></a></li>
										<li><a href="#"><i class="fab fa-twitter item-center"></i></a></li>
										<li><a href="#"><i class="fab fa-dribbble item-center"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="agent-content">
								<h3 class="agent-title hs-4"><a href="agents-details.html">Mohamed alhubaishi </a></h3>
								<p class="theme-color">CEO & Founder</p>
							</div>
						</div>
						<!-- Single Agent -->
						<div class="single-agent">
							<div class="agent-head">
								<div class="agent-img">
									<img src="img/agent/02.png" alt="#">
								</div>
								<div class="agent-social">
									<a class="plus"><i class="fa fa-plus item-center"></i></a>
									<ul class="agent-social-hover list-none">
										<li><a href="#"><i class="fab fa-facebook-f item-center"></i></a></li>
										<li><a href="#"><i class="fab fa-twitter item-center"></i></a></li>
										<li><a href="#"><i class="fab fa-dribbble item-center"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="agent-content">
								<h3 class="agent-title hs-4"><a href="agents-details.html">Dr.Hajar alhubsiahi</a></h3>
								<p class="theme-color">Founder</p>
							</div>
						</div>
						<!-- Single Agent -->
						<div class="single-agent">
							<div class="agent-head">
								<div class="agent-img">
									<img src="img/agent/03.png" alt="#">
								</div>
								<div class="agent-social">
									<a class="plus"><i class="fa fa-plus item-center"></i></a>
									<ul class="agent-social-hover list-none">
										<li><a href="#"><i class="fab fa-facebook-f item-center"></i></a></li>
										<li><a href="#"><i class="fab fa-twitter item-center"></i></a></li>
										<li><a href="#"><i class="fab fa-dribbble item-center"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="agent-content">
								<h3 class="agent-title hs-4"><a href="agents-details.html">Hamad  alhubaishi</a></h3>
								<p class="theme-color">Founder</p>
							</div>
						</div>
						<!-- Single Agent -->
						<div class="single-agent">
							<div class="agent-head">
								<div class="agent-img">
									<img src="img/agent/1." alt="#">
								</div>
								<div class="agent-social">
									<a class="plus"><i class="fa fa-plus item-center"></i></a>
									<ul class="agent-social-hover list-none">
										<li><a href="#"><i class="fab fa-facebook-f item-center"></i></a></li>
										<li><a href="#"><i class="fab fa-twitter item-center"></i></a></li>
										<li><a href="#"><i class="fab fa-dribbble item-center"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="agent-content">
								<h3 class="agent-title hs-4"><a href="agents-details.html">Mohab Tarig</a></h3>
								<p class="theme-color">IT administrator</p>
							</div>
						</div>
		
				
			
					</slick>
				</div>
			</div>
		</div>
	</section>
	<!-- End Agent Area -->

	<!-- Call To Action Area -->
	<section class="call-action-area r-padding">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="call-action-inner">
						<div class="row">
							<div class="col-lg-6 col-12 align-self-end" data-aos="fade-right" data-aos-delay="200">
								<!-- Call To Action Img -->
								<div class="call-action-img mb-5">
									<img src="img/call-action-img.png" alt="#">
								</div>
							</div>
							<div class="col-lg-6 col-12" data-aos="fade-left" data-aos-delay="300">
								<!-- Call To Action Content -->
								<div class="call-action-content">
									<span class="small-title">{{$t('Become_Partner')}}</span>
									<h2 class="c-a-title mb-0">{{$t('team_partner')}}</h2>
									<div class="call-action-btn">
										<a href="/login" class="theme-btn">
                                            <i class='bx bx-log-in' v-if="isLoggedIn"></i>{{$t('login')}}</a>
										<a href="/partner" class="theme-btn primary">{{$t('join_us')}}</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


    <section class="fact-area p-btm-140">
		<div class="container">
			<div class="row g-0 justify-content-between nums">
				<div class="col-xl-auto col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="100" >
					<!-- Single Fact -->
					<div class="single-fact">
						<i class="fa fa-home"></i>
						<div class="fact-content">
							<h3 class="fact-c-title"><span class="counter" data-goal="140000">{{number1}}</span>+</h3>
							<p class="m-0">{{$t('villa_excuted')}}</p>
						</div>
					</div>
				</div>
				<div class="col-xl-auto col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="200" >
					<!-- Single Fact -->
					<div class="single-fact">
						<i class="fa fa-users"></i>
						<div class="fact-content">
							<h3 class="fact-c-title"><span class="counter" data-goal="10">10</span>M</h3>
							<p class="m-0">{{$t('Visitors')}}</p>
						</div>
					</div>
				</div>
				<div class="col-xl-auto col-lg-3 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="300" >
					<!-- Single Fact -->
					<div class="single-fact">
						<i class="fa fa-clock"></i>
						<div class="fact-content">
							<h3 class="fact-c-title">{{$t('aed')}}<span class="counter" data-goal="1850000">1850000</span></h3>
							<p class="m-0">{{$t('Average')}}</p>
						</div>
					</div>
				</div>
				<div class="col-xl-auto col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="400" >
					<!-- Single Fact -->
					<div class="single-fact">
						<i class="fas fa-arrows-alt"></i>
						<div class="fact-content">
							<h3 class="fact-c-title"><span class="counter" data-goal="4300">4300</span>+</h3>
							<p class="m-0">{{$t('Resource')}}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Call To Action Area -->

    <!-- <section class="partner-logo">


        <slick v-bind="logoTeam" >
            <div class="1">1</div>
            <div class="1">2</div>
            <div class="1">3</div>
            <div class="1">4</div>

        </slick>


    </section> -->

	<!-- Blog Area -->

	<!-- End Blog Area -->





</div>
</template>



<script>
import { mapState, mapGetters } from "vuex";
import Slick from 'vue-slick-carousel';
import carousel from 'vue-owl-carousel';



  import 'vue-slick-carousel/dist/vue-slick-carousel.css'
  // optional style for arrows & dots
  import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'
import AllUae from './auth/AllUae.vue';
import NotificationBar from './notificationBar.vue';
import VillaFinder from './VillaFinder.vue';





export default {
      components: {  carousel,Slick,AllUae, NotificationBar, VillaFinder },

data(){
     const lang = localStorage.getItem('lang') || 'ar';
    return {

            options: ['mohammed','ali'],
            logoTeam:{
            arrows: false,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            speed: 2000,
            autoplaySpeed: 2000,
            cssEase: "linear"
            },
            homeSlider:{
            arrows: false,
            infinite: true,
            slidesToShow: 1,

            slidesToScroll: 1,
            vertical: true,
            verticalSwiping: true
            },
    slickOptions: {
                slidesToShow: 3,
                autoplay:true,
                 arrows: false,

    },
    sets:{
 slidesToShow: 3,

    },

  settings:{

prevArrow: false,
    nextArrow: false,
  infinite: true,
  speed: 500,
  slidesToShow: 3,

 arrows:false,

responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,

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
        slidesToScroll: 1
      }
    }
  ]
  

  },
seetingsWork: {
  dots: true,
  infinite: false,
  speed: 500,
  slidesToShow: 3,
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

        open_select:null,
        emirates_selected:null,
        open_type_select:null,
        type_villa:null,
        bedrooms_numbers:null,
        bedrooms_selected:null,
        Bathrooms_numbers:null,
        Bathrooms_selected:null,
        open_bedrooms_select:null,
        open_bathrooms_select:null,
		EmiratsFilterd : null,
		 villaFilterd: null,
         allOffershow:null,
         savedid:null,
          number1:0,


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
    countArea(){
    let count =   setInterval(()=>{

            // this.number1+
            this.number1+=20

            if(this.number1==14000){
                clearInterval(count)
            }

        },10 );


    },
    showOffer(){
         axios.get('api/ads/showOffer').then(res=>{

             this.allOffershow = res.data.offers;
                        this.classic = res.data.classic  ;
                        this.modern = res.data.modern  ;
                        localStorage.setItem('offer',JSON.stringify(this.allOffershow))
                        localStorage.setItem('classic',JSON.stringify(this.classic))
                        localStorage.setItem('modern',JSON.stringify(this.modern))

         })
     },
        reInit() {
            // Helpful if you have to deal with v-for to update dynamic lists
            this.$nextTick(() => {
                this.$refs.slick.reSlick();
            });
        },
    open(event){
        if(event=='emirates'){

          this.open_select=="open" ? this.open_select='' : this.open_select="open"
		   this.open_type_select=''
		   this.open_bedrooms_select=''
		   this.open_bathrooms_select=''
    }
    if(event=='type'){

          this.open_type_select=="open" ? this.open_type_select='' : this.open_type_select="open"
		  this.open_select=''
		  this.open_bathrooms_select=''
		  this.open_bedrooms_select=''
    }
    if(event=='bedrooms'){

          this.open_bedrooms_select=="open" ? this.open_bedrooms_select='' : this.open_bedrooms_select="open"
		  this.open_select=''
		  this.open_bathrooms_select=''
		  this.open_type_select=''
	
    }

      if(event=='Bathrooms'){

          this.open_bathrooms_select=="open" ? this.open_bathrooms_select='' : this.open_bathrooms_select="open"
		   this.open_select=''
		   this.open_bedrooms_select=''
		  this.open_type_select=''
    }


    },
    emirates(e){
        this.emirates_selected=e;
         $(this.open_select).remove();
    },

// </div>
    bedrooms(e){
             this.bedrooms_numbers=e;

         $(this.open_bedrooms_select).remove();


    },
    villType(event){
         this.type_villa=event;

         $(this.open_type_select).remove();
    },
    Bathrooms(event){
         this.Bathrooms_numbers=event;

         $(this.open_bathrooms_select).remove();
    },

    Singlefillter(type , value){


if(type=="room"){
    this.bedrooms_numbers=value;
}

if(type=="bath"){
    this.Bathrooms_numbers=value;
}
if(type=="type"){
    this.villaFilterd=value;
}

if(this.EmiratsFilterd==null  ){
    this.EmiratsFilterd='all'
}
if(this.villaFilterd==null){
    this.villaFilterd='all'
}
if(this.bedrooms_numbers==null){
    this.bedrooms_selected='all'
}
if(this.Bathrooms_numbers==null){
   this.Bathrooms_selected='all'
}

let EmiratsFilterd = this.EmiratsFilterd
let villaFilterd = this.villaFilterd
let Bathrooms_numbers = this.Bathrooms_numbers == null ? this.Bathrooms_selected : this.Bathrooms_numbers;
let bedrooms_numbers = this.bedrooms_numbers == null ? this.bedrooms_selected : this.bedrooms_numbers;



                       this.$router.push({ name:'property',params:{
                           location:EmiratsFilterd,
                           type:villaFilterd,
                           bed:bedrooms_numbers,
                           bath:Bathrooms_numbers
                           }
                        });
    },
	filterVilla(){

        if(this.emirates_selected==7){
            this.EmiratsFilterd=7
        }
         if(this.emirates_selected==1){
            this.EmiratsFilterd=1
        }
          if(this.emirates_selected==6){
            this.EmiratsFilterd=6
        }
         if(this.emirates_selected==4){
            this.EmiratsFilterd=4
        }
         if(this.emirates_selected==1){
            this.EmiratsFilterd=2
        }
        if(this.emirates_selected==3){
            this.EmiratsFilterd=3
        }
         if(this.emirates_selected==5){
            this.EmiratsFilterd=5
        }

        if(this.type_villa=='classic'){
               this.villaFilterd=1
        }
         if(this.type_villa=='modern'){
               this.villaFilterd=2
        }
        console.log(this.EmiratsFilterd);
        console.log(this.villaFilterd);
        console.log(this.Bathrooms_numbers);
        console.log(this.bedrooms_numbers);

        // let data =new FormData();

        // data.append('emirats',this.EmiratsFilterd);
        // data.append('villa',this.villaFilterd);
        // data.append('Bathrooms',this.Bathrooms_numbers);
        // data.append('bedrooms',this.bedrooms_numbers);


if(this.EmiratsFilterd==null  ){
    this.EmiratsFilterd='all'
}
if(this.villaFilterd==null){
    this.villaFilterd='all'
}
if(this.bedrooms_numbers==null){
    this.bedrooms_selected='all'
}
if(this.Bathrooms_numbers==null){
   this.Bathrooms_selected='all'
}

let EmiratsFilterd = this.EmiratsFilterd
let villaFilterd = this.villaFilterd
let Bathrooms_numbers = this.Bathrooms_numbers == null ? this.Bathrooms_selected : this.Bathrooms_numbers;
let bedrooms_numbers = this.bedrooms_numbers == null ? this.bedrooms_selected : this.bedrooms_numbers;



                       this.$router.push({ name:'property',params:{
                           location:EmiratsFilterd,
                           type:villaFilterd,
                           bed:bedrooms_numbers,
                           bath:Bathrooms_numbers
                           }
                        });


	},


ShowBox(){

      // popupSarchBox('.popup-search-box', '.searchBoxTggler', '.searchClose', 'show');
		// function popupSarchBox($searchBox, $searchOpen, $searchCls, $toggleCls) {
$('.searchBoxTggler').on('click', function (e) {
				e.preventDefault();
				$('.popup-search-box').addClass('show');
			});


			// $($searchBox).find('form').on('click', function (e) {
			// 	e.stopPropagation();
			// 	$($searchBox).addClass($toggleCls);
			// });
			// $($searchCls).on('click', function (e) {
			// 	e.preventDefault();
			// 	e.stopPropagation();
			// 	$($searchBox).removeClass($toggleCls);
			// });


},
        hideBox(){

                        $('.popup-search-box ').removeClass('show');

        },
    Stiky(){
        $(window).on('load', function (event) {
		$('.preloader').delay(800).fadeOut(500);
	});


		$("#offcanvas-menu a").on("click", function () {
			var link = $(this);
			var closestUl = link.closest("ul");
			var activeLinks = closestUl.find(".active");
			var closestLi = link.closest("li");
			var linkStatus = closestLi.hasClass("active");
			var count = 0;

			closestUl.find("ul").slideUp(function () {
				if (++count == closestUl.find("ul").length)
					activeLinks.removeClass("active");
			});
			if (!linkStatus) {
				closestLi.children("ul").slideDown();
				closestLi.addClass("active");
			}
		});



		// /*====================================
		// 	Maginific Popup JS
		// ======================================*/
		// $('.popup-gallery').magnificPopup({
		// 	delegate: 'a',
		// 	type: 'image',
		// 	tLoading: 'Loading image #%curr%...',
		// 	mainClass: 'mfp-img-mobile',
		// 	gallery: {
		// 		enabled: true,
		// 		navigateByImgClick: true,
		// 		preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
		// 	},
		// });

        // popupSarchBox('.popup-search-box', '.searchBoxTggler', '.searchClose', 'show');
		// function popupSarchBox($searchBox, $searchOpen, $searchCls, $toggleCls) {




		$(window).on("scroll", function () {



			if ($(window).scrollTop() < 200) {
				$("#active-sticky").removeClass("is-sticky");
			} else {
				$("#active-sticky").addClass("is-sticky");
			}
		});





    },


},


created() {
	   $('#offcanvas-modal').modal('hide');
             $('#offcanvas-modal').css('display','none');
             $('.modal-backdrop').css('display','none');
this.countArea();
       this.showOffer();
    this.Stiky();

	window.addEventListener("click", function(event) {
		if(this.open_select=="open") {
		  this.open_select=null;
		  }
	});
	 $('#exampleModalCenter').modal('hide');
	$('.modal-backdrop').css('display','none');
	$(document).click(function (e) {

		this.open_select=''
        this.open_type_select='';
     this.open_bedrooms_select='';

           this.open_bathrooms_select='' ;
  
});

         
    
// this.open_type_select
// this.open_bedrooms_select


    
    // this.sliderTest();
    // this.niceSelect();


},
  mounted() {

     

             
                $('.header-inner').removeClass('d-none');
                // $('.header-inner').addClass('d-block');
        },
computed: {
    ...mapState({

      isLoggedIn: "isLoggedIn"
    }),
    ...mapGetters({

    }),
     IsUser(){
            return this.$store.getters.IsUser
        },

  },
}
</script>

<style>

@media screen and (min-width: 350px) and (max-width: 768px) {

    .visible-xs{
       display: none !important;
    }

}
.all:hover{
	color:blue;
	
}
</style>