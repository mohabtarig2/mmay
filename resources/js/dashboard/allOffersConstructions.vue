<template>
    <div>
     <div class="row">
<div class="offset-md-2">

</div>
                <div class="col-md-8">


                    <div class=" container  h2 mt-2 text-right text-dark"> كل الاعلانات</div>
          <div v-for="(project,index) in projects.data" :key="index" v-bind="project">
              <div class="p-descrip-box mt-3 container">

<div class="ml-3">
         <div class="font-weight-bold theme-color   ml-2 ">
             {{project.title}}<status :status="project.status"></status></div>


    <div class="mt-2 text-muted ml-2">
            <span class=" d-block">
            <small class="fa fa-history text-muted " style="font-size:12px"></small><small>
                 <!-- {{created_at | luxon({ input: "server" }) }} -->
                 {{project.added_at}}
                  </small>
            <small class="fa  fa-ticket text-muted" ></small>



            </span>
    </div>



            <div class="mt-3 " style="padding:0 20px">
              <span v-if="project.description.length >  100">
             {{project.description.substr(0,80 )}}...
              </span>

              <div class="row mt-3">






              </div>
              <router-link class="  theme-btn" :to="{name:'offerdetails',params:{id:project.id} }">تفاصيل اكتر </router-link>
               <div  class="container-image">
             <div v-for="image , index in project.image" :key="index">

                 <img :src="image.path" class="image-flex">

             </div>
             </div>
                 </div>


        </div>



</div>
          </div>





      </div>

      <div class="offset-md-2">

      </div>



        </div>
    </div>
</template>

<script>
import Status from '../admin/status.vue';
import listproject from "./listproject.vue";
export default {
  components: { listproject, Status },

  data() {
    return {
      projects: null,
      users: null,
      tenders: [],
      count: null,
    };
  },
  methods:{

      detailsTender(page=1){
//   this.loading = true;


      
        const request = axios.get("/service/ads/all?page="+page).then((response) => {
          this.projects = response.data.data;
          this.loading = false;
        });
     




      },
      Toredict(id){
          if(this.IsUser== 6) {
          console.log(id);
           this.$router.push({ name:'consrDetails',params:{id}});
          }

      }

  },
  created() {

      this.detailsTender();

  },
     computed: {

     IsUser(){
            return this.$store.getters.IsUser
        },

  },
};
</script>


<style scoped>
.container-image {
 display: flex;
     flex-wrap: wrap;
     padding: 5px;
     justify-content: flex-end;
}

.image-flex{
    width: 70px !important;
    height: 70px !important;
     margin: 5px;
}
</style>
