<template>
    <div>
        <div class="container">

            <div class="row">
                <div class="col-md-4 col-sm-12 mt-5" >


                	<div class="s-blog-sidebar sidebar-categories mt-4">
							<h4 class="b-sidebar-title">المناقصات</h4>
							<ul class="s-categories-list list-none">
								<li v-if="IsUser==10 || IsUser==1">
                                    <router-link :to="{name:'ConslTenders'}"><i class="fa fa-angle-right"></i>
                                 مناقصة استشارات هندسية
                                <span>0</span></router-link></li>
								<li v-if="IsUser==10 || IsUser==1 || IsUser==6"><router-link :to="{name:'constrtenders'}">
                                    <i class="fa fa-angle-right"></i> مناقصة مقاولات

                                     <span>0</span></router-link></li>
										<li v-if="IsUser==10 "><router-link :to="{name:'HvacTenders'}"><i class="fa fa-angle-right"></i>مناقصة تكييف<span>
                                           0</span></router-link></li>

                   <li v-if="IsUser==10 "><router-link :to="{name:'StoneTenders'}">
                                    <i class="fa fa-angle-right"></i> مناقصة الحجر <span>
                                   0</span>
                                    </router-link>
                                    </li>

                                    <li v-if="IsUser==10 ">
                                        <router-link :to="{name:'InteriorTenders'}">
                                            <i class="fa fa-angle-right"></i> ديكور داخلي  <span>
                                   0</span>
                                    </router-link></li>

							</ul>
						</div>


                </div>
                <div class="col-md-8 col-sm-12" v-if="IsUser==10">
                 <router-view></router-view>

                </div>

                    <div class="col-md-8 col-sm-12" v-if="IsUser!=10">
                        <h1 class="text-center mt-2">
                        {{$route.name=="request_consulte" ? 'مناقصة استشارات ' :null}}
                        {{$route.name=="requestcConstructions" ? 'مناقصة مقاولات ' :null}}
                        {{$route.name=="requestHvac" ? 'مناقصة تكييف ' :null}}
                        {{$route.name=="requestStone" ? 'مناقصة حجر ' :null}}

                        </h1>
                 <router-view></router-view>

                </div>

            </div>

         </div>

    </div>
</template>



<script>
import { mapState, mapGetters } from "vuex";
export default {
    data(){
        return{
            id:null,
        }
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
 methods: {
            redirectToConstructions(){
                if(this.IsUser==6){
                            this.$router.push({ name: "requestcConstructions" });
                }
                if(this.IsUser==6){
                            this.$router.push({ name: "requestcConstructions" });
                }
                if(this.IsUser==1){
                            this.$router.push({ name: "request_consulte" });
                }


            },
            },
            created() {
                this.redirectToConstructions();
                consloe.log('hi'+this.$store.getters.IsUser)

            },



}
</script>

<style scoped>
.card{
    padding:20px;
}
.card a{
    margin-top:10px;
    font-size:  14px;
    /* border-bottom: 1px solid #eee; */
    padding: 10px
}
.card a:hover{
      font-size:  14px;
    margin-top:10px;
   font-weight: bold;
   cursor: pointer;
}
.comming{
    color:rgb(144, 144, 144);
}
.comming::after{
   content: "(comming soon)";
   font-size: 10px;
}
</style>
