<template>
    <div>
            <div class="container mt-5  ">
<h1 class="main-color text-center mb-3 mt-5"> {{$t('e_tenders')}} </h1>
                    <div class="row">
                        <div class="col-md-4 mb-2 ">
                            <router-link :to="{name:'consultances'}">

                                      		<div class="single-process">
							<div class="process-icon">
								<i class="bx bxs-home-smile"></i>
							</div>
							<div class="process-content">
								<h3 class="process-title hs-4">{{$t('consulting_company')}}</h3>
								<p>
                                        {{$t('message_the_right_offer')}}
                                   </p>
							</div>
						</div>

                            </router-link>

                        </div>
                        <div class="col-md-4 mb-2 ">
                            <router-link :to="{name:'constructionTender'}">


                                                		<div class="single-process">
							<div class="process-icon">
								<i class="fas fa-hard-hat"></i>
							</div>
							<div class="process-content">
								<h3 class="process-title hs-4">{{$t('construcion_company')}}</h3>
								<p>
                                        {{$t('message_the_right_offer')}}
                                   </p>
							</div>
						</div>
                            </router-link>

                        </div>

                              <div class="col-md-4 mb-3 ">
                    <router-link :to="{name:'hvac'}">

                                      	<div class="single-process">
							<div class="process-icon">
								<i class="fa fa-fan"></i>
							</div>
							<div class="process-content">
								<h3 class="process-title hs-4">{{$t('HVAC_companies')}}</h3>
								<p>
                                        {{$t('message_the_right_offer')}}
                                   </p>
							</div>
						</div>


                    </router-link>
                        </div>


                    </div>



                    <div class="row">
                          <div class="col-md-4 mb-3 ">

                               <router-link :to="{name:'StoneTender'}">



        	<div class="single-process">
							<div class="process-icon">
								<i class="fas fa-igloo"></i>
							</div>
							<div class="process-content">
								<h3 class="process-title hs-4">{{$t('Stone_companies')}}</h3>
								<p>
                                        {{$t('message_the_right_offer')}}
                                   </p>
							</div>
						</div>
                               </router-link>
                        </div>

                        <div class="col-md-4 mb-2 ">

                 <router-link :to="{name:'interiorTender'}">

                                    	<div class="single-process">
							<div class="process-icon">
								<i class="fas fa-couch"></i>
							</div>
							<div class="process-content">
								<h3 class="process-title hs-4">{{$t('interior_decoration')}}</h3>
								<p>
                                        {{$t('message_the_right_offer')}}
                                   </p>
							</div>
						</div>
                 </router-link>
                        </div>

                        <div class="col-md-4 mb-3 ">



                                    	<div class="single-process">
							<div class="process-icon">
								<i class="fas fa-toolbox"></i>
							</div>
							<div class="process-content">
								<h3 class="process-title hs-4">{{$t('maintenance')}}</h3>
								<p>
                                        {{$t('message_the_right_offer')}}
                                   </p>
							</div>
						</div>
                        </div>

                    </div>










            </div>
    </div>
</template>

<script>
export default {
    data() {
     return{

    }
    },

}
</script>


<style lang="scss" scoped>



.centerlize{
    display: flex;
justify-content: center;
align-items: center;
}
.icon-tender{
    width: 50px !important;
    height: 50px;
   background:#3454d1;
   border-radius: 50%;

display: flex;
justify-content: center;
align-items: center;

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
a{
 text-decoration: none;
}
.card{
    color:#3454d1;
}
.card-disable{
    color:#8a8a8a;
    background:#dddcdc;
}

.icon-tender-disable{

   background:#8a8a8a;


}
.animate:hover {
background:#3454d1;
color: #fff;
transition:all 0.5s ease-in-out;
cursor: pointer;
 transform: scale(1.08);
.diispaly{
color: #fff;
}
}


</style>
