<template>
<div>
    <div class="row mt-5">

<div class="col-md-6 col-md-6 col-sm-12">

        <div class="s-blog-sidebar" >


                               <div class="  h5 font-weight-bold text-dark pr-single m-0" :dir="$t('directions')" :class="$t('text_align')">


										<div class="pr-icon"><i class="fas fa-th main-color"></i></div>
										<div class="pr-desc">
											<span>                اخر مناقصات المقاولات
                                            </span>


										</div>

                           </div>



        <span v-for="consr , index in letestTenders.consr" :key="index" class="container">

            <div>
               <span class="font-weight-bold"> {{consr.title}}</span>
                     <status :status="consr.status"></status>
               <small class="float-right"> {{consr.added_at}}</small>
            </div>






									<!-- Single Property Detail -->
								 <div class="pr-single m-0">
										<div class="pr-icon"><i class="fa fa-map-marker-alt"></i></div>
										<div class="pr-desc">
											<span>       <all-uae :emirates="consr.emirates"></all-uae></span>


										</div>
									</div>
									<!-- End Single Property Detail -->


                <button class=" d-block  theme-btn  " @click="ToredictConsle(consr.id)">{{$t('more')}}</button>

        </span>
                           </div>

                              <div class="s-blog-sidebar " >
        <div class="  h5 font-weight-bold text-dark pr-single  " :dir="$t('directions')" :class="$t('text_align')">


										<div class="pr-icon"><i class="bx bxs-building-house main-color"></i></div>
										<div class="pr-desc">
											<span>              اخر مناقصات الاستشارات الهندسية
                                            </span>


										</div>

                           </div>

        <div v-for="tender , index in letestTenders.consulting" :key="index" class="mt-3 box-consulte  container">
            <div>
               <span class="font-weight-bold main-color mb-3"> {{tender.title}}</span>
                <status :status="tender.status"></status>
               <small class="float-right"> {{tender.added_at}}</small>

            </div>
               <!-- <p> {{tender.note.substr(0,90 )}}.. </p> -->

               <div class=" pro-details">

						<div class="pr-details-main">
							<div class="row">
								<div class="col-xl-3 col-md-4 col-12">
									<!-- Single Property Detail -->
								 <div class="pr-single m-0">
										<div class="pr-icon"><i class="fa fa-map-marker-alt"></i></div>
										<div class="pr-desc">
											<span><all-uae :emirates="tender.emirats"></all-uae></span>


										</div>
									</div>
									<!-- End Single Property Detail -->
								</div>

                                <div class="col-xl-3 col-md-4 col-12">
									<!-- Single Property Detail -->
								  <div class="pr-single m-0">
										<div class="pr-icon"><i class="fa fa-bath"></i></div>
										<div class="pr-desc">
											<span>
                                               {{tender.bathroom}}
                                            </span>


										</div>
									</div>
									<!-- End Single Property Detail -->
								</div>

                                <div class="col-xl-3 col-md-4 col-12">
                                             <div class="pr-single m-0">
										<div class="pr-icon"><i class="fa fa-bed"></i></div>
										<div class="pr-desc">
											<span>
                                               {{tender.bedroom}}
                                            </span>


										</div>
									</div>
                                </div>

                            </div>
                        </div>
               </div>






 <router-link class="   theme-btn mt-3  " :to="{name:'project',params:{id:tender.id}}">{{$t('more')}}</router-link>




        </div>
                           </div>
</div>


<div class="col-md-6 col-sm-12">

        <div class="s-blog-sidebar" >


                               <div class="  h5 font-weight-bold text-dark pr-single m-0" :dir="$t('directions')" :class="$t('text_align')">


										<div class="pr-icon"><i class="fas fa-th main-color"></i></div>
										<div class="pr-desc">
											<span>
                                                    اخر مناقصات الحجر
                                            </span>


										</div>

                           </div>



        <span v-for="consr , index in letestTenders.hvac" :key="index" class="container">

            <div>
               <span class="font-weight-bold"> {{consr.title}}</span>
                     <status :status="consr.status"></status>
               <small class="float-right"> {{consr.added_at}}</small>
            </div>






									<!-- Single Property Detail -->
								 <div class="pr-single m-0">
										<div class="pr-icon"><i class="fa fa-map-marker-alt"></i></div>
										<div class="pr-desc">
											<span>       <all-uae :emirates="consr.emirates"></all-uae></span>


										</div>
									</div>
									<!-- End Single Property Detail -->

    <div class="mt-3" >
                <router-link class="  theme-btn  " :to="{name:'StoneDetails',params:{id:consr.id}}">{{$t('more')}}</router-link>
    </div>

        </span>
                           </div>


        <div class="s-blog-sidebar" >


                               <div class="  h5 font-weight-bold text-dark pr-single m-0" :dir="$t('directions')" :class="$t('text_align')">


										<div class="pr-icon"><i class="fas fa-th main-color"></i></div>
										<div class="pr-desc">
											<span>
                                                    اخر مناقصات التكييف
                                            </span>


										</div>

                           </div>



        <span v-for="consr , index in letestTenders.stone" :key="index" class="container">

            <div>
               <span class="font-weight-bold"> {{consr.title}}</span>
                     <status :status="consr.status"></status>
               <small class="float-right"> {{consr.added_at}}</small>
            </div>






									<!-- Single Property Detail -->
								 <div class="pr-single m-0">
										<div class="pr-icon"><i class="fa fa-map-marker-alt"></i></div>
										<div class="pr-desc">
											<span>       <all-uae :emirates="consr.emirates"></all-uae></span>


										</div>
									</div>
									<!-- End Single Property Detail -->

            <div class="mt-3">
                <router-link class="   theme-btn  " :to="{name:'HvacDetails',params:{id:consr.id}}">{{$t('more')}}</router-link>
            </div>

        </span>
                           </div>

                            <div class="s-blog-sidebar" >


                               <div class="  h5 font-weight-bold text-dark pr-single m-0" :dir="$t('directions')" :class="$t('text_align')">


										<div class="pr-icon"><i class="fas fa-th main-color"></i></div>
										<div class="pr-desc">
											<span>
                                                    اخر مناقصات الديكور
                                            </span>


										</div>

                           </div>



        <span v-for="interior , index in letestTenders.interior" :key="index" class="container">

            <div>
               <span class="font-weight-bold"> {{interior.title}}</span>
                     <status :status="interior.status"></status>
               <small class="float-right"> {{interior.added_at}}</small>
            </div>






									<!-- Single Property Detail -->
								 <div class="pr-single m-0">
										<div class="pr-icon"><i class="fa fa-map-marker-alt"></i></div>
										<div class="pr-desc">
											<span>       <all-uae :emirates="interior.emirates"></all-uae></span>


										</div>
									</div>
									<!-- End Single Property Detail -->

            <div class="mt-3">
                <router-link class="   theme-btn  " :to="{name:'InteriorDetails',params:{id:interior.id}}">{{$t('more')}}</router-link>
            </div>

        </span>
                           </div>
</div>
    </div>
</div>
</template>

<script >
import status from '../admin/status.vue';
import AllUae from '../auth/AllUae.vue';


export default {
  components: { status, AllUae },

    data(){
        return{
            letestTenders: null,

            consulte:null,
            consr:null,
        }
    },
    computed:{
  IsUser(){
            return this.$store.getters.IsUser
        },
    },
    methods: {
         Toredict(id){
          console.log(id);

           this.$router.push({ path: `/mytenders/ConslTender/${id}`});
      },
        ToredictConsle(id){
          console.log(id);
           this.$router.push({ path: `/tenders/construction/${id}`});
      },

      alltenders(){
          axios.get('letsttenders').then(res=>{
                this.letestTenders=res.data;
          })
      },
      activex(value){
          this.active=value;

          if(this.active==1){


                this.consr="main-color font-weight-bold";
                this.consulte=" ";
          }

          if(this.active==0){
                this.consulte="main-color font-weight-bold";
                this.consr=" ";
          }
          console.log(this.active)
      }
    },
    created(){


          if(this.active==0){
                this.consulte="main-color font-weight-bold";
                this.consr=" ";

          }

            this.alltenders();
    }

}
</script>


<style scoped>


.theme-btn {

    padding: 8px 15px;
}
.box-consulte{
    border-bottom: 1px solid #eee;
    padding: 10px;
}
.s-blog-sidebar {
overflow: hidden;
}
</style>
