<template>
    <!-- Property Tab Area -->
	<div class="property-details-area">
		<div class="container-fluid">
			<div class="property-tab-top">
				<div class="row mx-0">
					<div class="col-12" data-aos="fade-up" data-aos-delay="100">
						<!-- Property Tab Inner -->
						<div class="property-tab-inner">
							<div class="row">
								<div class="col-12">
									<!-- Property Tab Menu -->
									<div class="property-tab-menu">
										<div class="list-group" id="list-tab" role="tablist">
											<!-- <a class="list-group-item" data-bs-toggle="list" href="#list-rent" role="tab">Rent</a> -->
											<a class="list-group-item active" data-bs-toggle="list" href="#list-buy" role="tab">عروض الفلل</a>
											<!-- <a class="list-group-item" data-bs-toggle="list" href="#list-sell" role="tab">Sell</a> -->
										</div>
									</div>
								</div>
                                
								<div class="col-12">
									<!-- Property Tab Details -->
									<div class="property-tab-details">
										<div class="tab-content" id="nav-tabContent">
											<!-- Property Tab One -->
											<div class="tab-pane fade show active" id="list-rent" role="tabpanel">
												<div class="property-tab-d-inner">
													<form >
														<div class="row">
															<div class="col-xl-3 col-md-4 col-12">

																<div class="single-property-details">
																	<label>{{$t('Emirates')}} </label>
                                                                    <div class="nice-select " :class="open_select" tabindex="0" @click="open('emirates')">
                                                                        <span class="current">


                                                                            <all-uae :emirates="emirates_selected">
                                                                                
                                                                            </all-uae>





                                                                            </span><ul class="list">
                                                                                <li data-value="1" class="option " @click="emirates(7)">
                                                                                  {{$t('abu_dabhi')}}</li>
                                                                                    <li data-value="2" class="option" @click="emirates(1)">
                                                                                      {{$t('dubai')}}
                                                                                        </li>
                                                                             <li data-value="3" class="option"  @click="emirates(5)">{{$t('sharja')}}</li>
                                                                             <li data-value="3" class="option"  @click="emirates(6)">{{$t('ajman')}}</li>
                                                                             <li data-value="3" class="option"  @click="emirates(4)">{{$t('um_alqwin')}} </li>
                                                                             <li data-value="3" class="option"  @click="emirates(3)"> {{$t('ras_alkhima')}}</li>
                                                                             <li data-value="3" class="option"  @click="emirates(2)">{{$t('fujairah')}} </li>
                                                                                        </ul>
                                                                                </div>

																</div>

															</div>



                                                        <div class="col-xl-3 col-md-4 col-12">

                                                        <div class="single-property-details">
                                                            <label>{{$t('Type_Of_Villa')}}</label>
                                                            <div class="nice-select" :class="open_type_select" tabindex="0" @click="open('type')">
                                                                <span class="current" v-if="type_villa == 'classic'">{{$t('classic')}}</span>
                                                                <span class="current" v-if="type_villa == 'modern'">{{$t('modern')}}</span>
                                                                    <ul class="list">
                                                                        <li data-value="1" class="option " @click="villType('classic')">
                                                                            {{$t('classic')}}</li>
                                                                            <li data-value="2" class="option" @click="villType('modern')">
                                                                                  {{$t('modern')}}
                                                                                </li>

                                                                                </ul>
                                                                        </div>

                                                        </div>

                                                    </div>
                                <div class="col-xl-3 col-md-6 col-12">

                            <div class="single-property-details">
                                <label>{{$t('bed_rooms')}}</label>
                                <div class="nice-select" :class="open_bedrooms_select" tabindex="0" @click="open('bedrooms')">
                                    <span class="current" v-if="bedrooms_numbers">{{bedrooms_numbers}} {{$t('bed_rooms')}}
                                        </span>
                                        <ul class="list">
                                            <li data-value="1" class="option " @click="bedrooms(2)">
                                                2</li>
                                                <li data-value="2" class="option" @click="bedrooms(3)">
                                                    3 
                                                    </li>
                                                    <li data-value="2" class="option" @click="bedrooms(4)">
                                                    4 
                                                    </li>
                                                    <li data-value="2" class="option" @click="bedrooms(5)">
                                                    5 
                                                    </li>
                                                    <li data-value="2" class="option" @click="bedrooms(6)">
                                                    6 
                                                    </li>
                                                    <li data-value="2" class="option" @click="bedrooms(7)">
                                                    7 
                                                    </li>

                                                    <li data-value="2" class="option" @click="bedrooms('  +8 bedrooms')">
                                                        +7 
                                                    </li>

                                                    </ul>
                                            </div>

                            </div>

                        </div>
															                     <!-- <div class="col-xl-2 col-md-4 col-12"> -->

                            <!-- <div class="single-property-details">
                                <label>{{$t('bathroom')}}</label>
                                <div class="nice-select " :class="open_bathrooms_select" tabindex="0" @click="open('Bathrooms')">
                                    <span class="current" v-if="Bathrooms_numbers">{{Bathrooms_numbers}} {{$t('bathroom')}}
                                        </span><ul class="list">
                                            <li data-value="1" class="option " @click="Bathrooms(2)">
                                                2 {{$t('bathroom')}}</li>
                                                <li data-value="2" class="option" @click="Bathrooms(3)">
                                                    3 {{$t('bathroom')}}
                                                    </li>
                                                    <li data-value="2" class="option" @click="Bathrooms( 4 )">
                                                    4 {{$t('bathroom')}}
                                                    </li>
                                                    <li data-value="2" class="option" @click="Bathrooms( 5 )">
                                                    5 {{$t('bathroom')}}
                                                    </li>
                                                    <li data-value="2" class="option" @click="Bathrooms( 6 )">
                                                    6 {{$t('bathroom')}}
                                                    </li>
                                                    <li data-value="2" class="option" @click="Bathrooms( 7 )">
                                                    7 {{$t('bathroom')}}
                                                    </li>



                                                    </ul>
                                            </div>

                            </div> -->

                        <!-- </div> -->
															<!-- <div class="col-xl-2 col-md-4 col-12"> -->
																<!-- Price Range -->
																<!-- <div class="single-property-details price-range range">
																	<label>Price Range</label>
																	<div class="price-filter">
																		<div class="label-input">
																			<input type="text" id="amount-one" name="price" placeholder="Add Your Price"/>
																		</div>
																		<div class="price-filter-inner">
																			<div id="slider-range-one" class="slider-range"></div>
																				<div class="price_slider_amount">
																			</div>
																		</div>
																	</div>
																</div> -->
																<!-- End Price Range -->
															<!-- </div> -->
															<div class="col-xl-3 col-md-4 col-12">
																<div class="single-property-btn">
																	<button class="button theme-btn"
																	 @click.prevent="filterVilla">
																		<i class="fa fa-search"></i>{{$t('search')}}</button>
																</div>
															</div>
														</div>
													</form>
												</div>
											</div>

										</div>
									</div>
									<!-- End Property Tab Details -->
								</div>
							</div>
						</div>
						<!-- End Property Tab Inner -->
					</div>
				</div>
			</div>
		</div>
        
	</div>
	<!-- End Property Tab Area -->
</template>


<script>
import AllUae from './auth/AllUae.vue';

export default {
          components: { AllUae},
          props:{bathroom:Number,dining_room:Number,bedroom:Number}, 

   data(){
       return{
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
          savedid:null,
          number1:0,
       }
   },
   mounted(){

   },
   methods:{
  open(event){
        if(event=='emirates'){
             this.open_type_select=''
		   this.open_bedrooms_select=''
		   this.open_bathrooms_select=''
          this.open_select=="open" ? this.open_select='' : this.open_select="open"
		  
    }
    if(event=='type'){
this.open_select=''
		  this.open_bathrooms_select=''
		  this.open_bedrooms_select=''
          this.open_type_select=="open" ? this.open_type_select='' : this.open_type_select="open"
		  
    }
    if(event=='bedrooms'){
         this.open_select=''
		  this.open_bathrooms_select=''
		  this.open_type_select=''
          this.open_bedrooms_select=="open" ? this.open_bedrooms_select='' : this.open_bedrooms_select="open"
		 
	
    }

    //   if(event=='Bathrooms'){
    //       this.open_select=''
	// 	   this.open_bedrooms_select=''
	// 	  this.open_type_select=''
    //       this.open_bathrooms_select=="open" ? this.open_bathrooms_select='' : this.open_bathrooms_select="open"
		   
    // }


    },
    emirates(e){
        this.emirates_selected=e;
         $(this.open_select).remove();
    },
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

   }
}
</script>