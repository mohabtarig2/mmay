<template>
    <div class="container"  :dir="$t('directions')" :class="$t('text_align')">
        <h1 class="h3 mt-5"> Products ({{offers.length}}) </h1>

<div class="card mt-3" v-for="offer ,index in offers" :key="index">
     <a @click="offerredirct(offer.id)">
<div class="title h5 font-weight-bold " >
{{offer.villa.title}}
</div>
<div class="items mt-3">
<span class=" text-muted "  > <i class="fa fa-user" ></i> {{offer.company.name}}  </span>
<span class=" text-muted  "><i class="far fa-clock"></i> {{offer.added}}  </span>
</div>
   </a>

   <span class=" text-muted " v-if="offer.buyer.length>0"  >

      <span class="badge badge-light mt-3">   Open by company <i class="text-success fas fa-check-double" style=""></i> </span>
   </span>
    </div>

    </div>
</template>

<script>


export default {

data(){
    return{
        offers:null
    }
},
methods: {
  getOffers(){
      axios.get('/getoffersclients').then(res=>{
          this.offers= res.data;
      });
  },
offerredirct(id){
     this.$router.push({ name: "productsDetails" ,params:{id}});
}

},
created(){
    this.getOffers();
}
}
</script>

<style scoped>
a{
    text-decoration: none;
}
.items i{
    font-size:10px;
}
.card{
    border:none;
    padding:20px;

    cursor: pointer;
}
</style>
