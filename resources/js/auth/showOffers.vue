<template>
    <div>

    <section class="home " id="home">
                    <div class="text-center header-text mb-2">
                     <h2 class=" font-weight-bold text-dark mb-2" > {{$t('header')}} </h2>


            <div class="input-group container " :dir="$t('directions')">
            <select class="custom-select " id="inputGroupSelect04" >
                <option selected>{{$t('choose_emirats')}}</option>
                <option value="0">{{$t('all')}}</option>
                <option value="0">{{$t('abu_dabhi')}}</option>
                <option value="0">{{$t('dubai')}}</option>
                <option value="0">{{$t('sharja')}}</option>
                <option value="0">{{$t('ajman')}}</option>
                <option value="0">{{$t('um_alqwin')}}</option>
                <option value="0">{{$t('ras_alkhima')}}</option>
                <option value="0">{{$t('fujairah')}}</option>
            </select>

                <button class="btn btn-dark text-light" type="button" ><i class="fas fa-search"></i></button>

            </div>



                    </div>




                </section>


    <div class="container visible-xs"  :dir="$t('directions')" :class="$t('text_align')">

        <div class="   text-success mb-3 font-weight-bold" >{{$t('add_Your_ads')}}</div>
<div class="row ">


    <div class="col-md-6">
                     <div class="container">
     <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img :src="'assets/img/BOOKING-ADS.jpg'" class="d-block " alt="...">
      </div>
      <div class="carousel-item">
        <img :src="'assets/img/FLIGHT.jpg'" class="d-block " alt="...">
      </div>
    </div>

  </div>

</div>
    </div>

     <div class="col-md-6">
                     <div class="container">
     <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img :src="'assets/img/AMAZON-ADS.jpg'" class="d-block " alt="...">
      </div>
      <div class="carousel-item">
        <img :src="'assets/img/LAPTOPP.jpg'" class="d-block " alt="...">
      </div>
    </div>

  </div>

</div>
    </div>

    </div>
</div>













  <div class=" mt-5  " :dir="$t('directions')"  >



<span class=" h3 font-weight-bold text-uppercase text-right mr-3 d-block" dir="">{{$t('offer_villa')}} </span>
            <a class=" h3 text-muted   d-block" style="cursor:pointer;font-size:14px" :dir="$t('directions')"  >{{$t('see_All')}}</a>




        </div>

 <carousel :autoplay="true" v-if="allOffershow.length" :nav="true" items="4" class="visible-xs" >

 <div class="row">



<div class="col-md-3 col-sm-12 mb-3" v-for="offer,index in allOffershow " :key="index">
     <router-link :to ="{path:'/offer/details/'+offer.id}" class="link text-dark">
             <div class="card" style="width: 22rem;border: 1px solid #d1cfcf;cursor:pointer"     >
                    <span v-for="image,i in offer.villa_image " :key="i" >
                        <span v-if="i==0" >
                <img class="card-img-top img-fluid" :src="image.path"    alt="Card image cap"
                style="border-radius:10px 10px 0 0; height:200px"
                  data-toggle="modal" data-target="#exampleModal">
                    </span>
                    </span>



                <div class="card-body" style="padding: 5px" :class="$t('text_align')">
                    <p class="card-text font-weight-bold card-p mb-2 " > {{offer.title}}</p>
                      <small class="ml-4 mr-4 mt-2"  :dir="$t('directions')" >
                          <img src="assets/img/maps-and-flags.svg" width="8" class="mr-1  image-icon1">
                     <span v-if="offer.Emirates==7">{{$t('abu_dabhi')}}</span>
                    <span v-if="offer.Emirates==6">{{$t('ajman')}}</span>
                    <span v-if="offer.Emirates==5">{{$t('sharja')}}</span>
                    <span v-if="offer.Emirates==4">{{$t('um_alqwin')}}</span>
                    <span v-if="offer.Emirates==3">{{$t('ras_alkhima')}}</span>
                    <span v-if="offer.Emirates==2">{{$t('fujairah')}}</span>
                    <span v-if="offer.Emirates==1">{{$t('dubai')}}</span>



                    </small>
                    <p class="  main-color  font-weight-bold mt-0" :dir="$t('directions')">
                     <span > {{offer.price}} </span>   {{$t('aed')}}
                    </p>


</div>







                <div class="card-footer" style="background-color: #f7f7f7;
                 border-top:none;font-size:14px;border-radius:0px 0px 19px 19px;align-items: center;
    display: flex;" :dir="$t('directions')"  >

                    <span  class="mr-4" :dir="$t('directions')" ><img src="assets/img/bed.svg" width="22" class="mr-1 image-icon"> {{offer.rooms}} {{$t('rooms')}} </span>
                    <span   class="mr-4"  :dir="$t('directions')"><img src="assets/img/HomeFloors.svg" width="22" class="mr-1 image-icon">{{offer.floors}}  {{$t('floors')}} </span>
                    <span   class="mr-4 " :dir="$t('directions')" v-if="offer.type_villa==1"><i  class="fa fa-home main-color" style="font-size:22px"></i>  {{$t('classic')}} </span>
                    <span   class="mr-4"  :dir="$t('directions')" v-if="offer.type_villa==2"><i  class="fa fa-home main-color" style="font-size:22px"></i> {{$t('modern')}} </span>





            </div>

             </div>
     </router-link>
</div>


 </div>

           </carousel>


             <div class=" mt-5 " :dir="$t('directions')" >



<span class=" h3 font-weight-bold text-uppercase text-right mr-3 d-block" dir="">{{$t('modern_villa')}} </span>
            <a class=" h3 text-muted  text-left d-block" style="cursor:pointer;font-size:14px" >{{$t('see_All')}}</a>





        </div>

<div class="row">

<div class="col-md-3 col-sm-12 mb-3">
   <div class="card mx-auto" style="width: 21rem;border: 1px solid #d1cfcf;cursor:pointer"    >

                <img class="card-img-top img-fluid" src="assets/img/villa.jpg"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; height:200px;width:100%"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body" style="padding: 5px" :class="$t('text_align')">
                    <p class="card-text font-weight-bold card-p mb-2 " > title</p>
                      <small class="ml-4 mr-4 mt-2"  :dir="$t('directions')" ><img src="assets/img/maps-and-flags.svg"
                      width="8" class="mr-1  image-icon1">
                     <span >{{$t('abu_dabhi')}}</span>




                    </small>
                    <p class="  main-color  font-weight-bold mt-0" :class="$t('text_align')" :dir="$t('directions')">
                     <span> 2222 </span> <span>  {{$t('aed')}} </span>
                    </p>


</div>







                <div class="card-footer"
                 style="background-color: #f7f7f7; border-top:none;font-size:14px;border-radius:0px 0px 19px 19px;align-items: center;
    display: flex;" :dir="$t('directions')"  >

                    <span  class="mr-4" :dir="$t('directions')" ><img src="assets/img/bed.svg" width="22" class="mr-1 image-icon">     {{$t('rooms')}} </span>
                    <span   class="mr-4"  :dir="$t('directions')"><img src="assets/img/HomeFloors.svg" width="22" class="mr-1 image-icon"> {{$t('floors')}} </span>
                    <span   class="mr-4 " :dir="$t('directions')">
                        <i  class="fa fa-home main-color" style="font-size:22px"></i>  {{$t('classic')}} </span>







            </div>

             </div>
    </div>
    <div class="col-md-3 col-sm-12 mb-3">
   <div class="card  mx-auto" style="width: 21rem;border: 1px solid #d1cfcf;cursor:pointer"    >

                <img class="card-img-top img-fluid" src="assets/img/villa.jpg"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; height:200px;width:100%"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body" style="padding: 5px" :class="$t('text_align')">
                    <p class="card-text font-weight-bold card-p mb-2 " > title</p>
                      <small class="ml-4 mr-4 mt-2"  :dir="$t('directions')" ><img src="assets/img/maps-and-flags.svg"
                      width="8" class="mr-1  image-icon1">
                     <span >{{$t('abu_dabhi')}}</span>




                    </small>
                    <p class="  main-color  font-weight-bold mt-0" :class="$t('text_align')" :dir="$t('directions')">
                     <span> 2222 </span> <span>  {{$t('aed')}} </span>
                    </p>


</div>







                <div class="card-footer"
                 style="background-color: #f7f7f7; border-top:none;font-size:14px;border-radius:0px 0px 19px 19px;align-items: center;
    display: flex;" :dir="$t('directions')"  >

                    <span  class="mr-4" :dir="$t('directions')" ><img src="assets/img/bed.svg" width="22" class="mr-1 image-icon">     {{$t('rooms')}} </span>
                    <span   class="mr-4"  :dir="$t('directions')"><img src="assets/img/HomeFloors.svg" width="22" class="mr-1 image-icon"> {{$t('floors')}} </span>
                    <span   class="mr-4 " :dir="$t('directions')">
                        <i  class="fa fa-home main-color" style="font-size:22px"></i>  {{$t('classic')}} </span>







            </div>

             </div>
    </div>

    <div class="col-md-3 col-sm-12  mb-3">
   <div class="card mx-auto" style="width: 21rem;cursor:pointer"    >

                <img class="card-img-top img-fluid" src="assets/img/villa.jpg"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; height:200px;width:100%"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body" style="padding: 5px" :class="$t('text_align')">
                    <p class="card-text font-weight-bold card-p mb-2 " > title</p>
                      <small class="ml-4 mr-4 mt-2"  :dir="$t('directions')" ><img src="assets/img/maps-and-flags.svg"
                      width="8" class="mr-1  image-icon1">
                     <span >{{$t('abu_dabhi')}}</span>




                    </small>
                    <p class="  main-color  font-weight-bold mt-0" :class="$t('text_align')" :dir="$t('directions')">
                     <span> 2222 </span> <span>  {{$t('aed')}} </span>
                    </p>


</div>







                <div class="card-footer"
                 style="background-color: #f7f7f7; border-top:none;font-size:14px;border-radius:0px 0px 19px 19px;align-items: center;
    display: flex;" :dir="$t('directions')"  >

                    <span  class="mr-4" :dir="$t('directions')" ><img src="assets/img/bed.svg" width="22" class="mr-1 image-icon">     {{$t('rooms')}} </span>
                    <span   class="mr-4"  :dir="$t('directions')"><img src="assets/img/HomeFloors.svg" width="22" class="mr-1 image-icon"> {{$t('floors')}} </span>
                    <span   class="mr-4 " :dir="$t('directions')">
                        <i  class="fa fa-home main-color" style="font-size:22px"></i>  {{$t('classic')}} </span>







            </div>

             </div>
    </div>
    <div class="col-md-3 col-sm-12  mb-3">
   <div class="card mx-auto" style="width: 21rem;cursor:pointer"    >

                <img class="card-img-top img-fluid" src="assets/img/villa.jpg"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; height:200px;width:100%"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body" style="padding: 5px" :class="$t('text_align')">
                    <p class="card-text font-weight-bold card-p mb-2 " > title</p>
                      <small class="ml-4 mr-4 mt-2"  :dir="$t('directions')" ><img src="assets/img/maps-and-flags.svg"
                      width="8" class="mr-1  image-icon1">
                     <span >{{$t('abu_dabhi')}}</span>




                    </small>
                    <p class="  main-color  font-weight-bold mt-0" :class="$t('text_align')" :dir="$t('directions')">
                     <span> 2222 </span> <span>  {{$t('aed')}} </span>
                    </p>


</div>







                <div class="card-footer"
                 style="background-color: #f7f7f7; border-top:none;font-size:14px;border-radius:0px 0px 19px 19px;align-items: center;
    display: flex;" :dir="$t('directions')"  >

                    <span  class="mr-4" :dir="$t('directions')" ><img src="assets/img/bed.svg" width="22" class="mr-1 image-icon">     {{$t('rooms')}} </span>
                    <span   class="mr-4"  :dir="$t('directions')"><img src="assets/img/HomeFloors.svg" width="22" class="mr-1 image-icon"> {{$t('floors')}} </span>
                    <span   class="mr-4 " :dir="$t('directions')">
                        <i  class="fa fa-home main-color" style="font-size:22px"></i>  {{$t('classic')}} </span>







            </div>

             </div>
    </div>


</div>


  <div class=" mt-5 " :dir="$t('directions')" >



<span class=" h3 font-weight-bold text-uppercase text-right mr-3 d-block" dir="">{{$t('classic_villa')}} </span>
            <a class=" h3 text-muted  text-left d-block" style="cursor:pointer;font-size:14px" >{{$t('see_All')}}</a>




        </div>

        <div class="row">

<div class="col-md-3 col-sm-12 mb-3">
   <div class="card mx-auto" style="width: 21rem;border: 1px solid #d1cfcf;cursor:pointer"    >

                <img class="card-img-top img-fluid" src="assets/img/villa.jpg"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; height:200px;width:100%"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body" style="padding: 5px" :class="$t('text_align')">
                    <p class="card-text font-weight-bold card-p mb-2 " > title</p>
                      <small class="ml-4 mr-4 mt-2"  :dir="$t('directions')" ><img src="assets/img/maps-and-flags.svg"
                      width="8" class="mr-1  image-icon1">
                     <span >{{$t('abu_dabhi')}}</span>




                    </small>
                    <p class="  main-color  font-weight-bold mt-0" :class="$t('text_align')" :dir="$t('directions')">
                     <span> 2222 </span> <span>  {{$t('aed')}} </span>
                    </p>


</div>







                <div class="card-footer"
                 style="background-color: #f7f7f7; border-top:none;font-size:14px;border-radius:0px 0px 19px 19px;align-items: center;
    display: flex;" :dir="$t('directions')"  >

                    <span  class="mr-4" :dir="$t('directions')" ><img src="assets/img/bed.svg" width="22" class="mr-1 image-icon">     {{$t('rooms')}} </span>
                    <span   class="mr-4"  :dir="$t('directions')"><img src="assets/img/HomeFloors.svg" width="22" class="mr-1 image-icon"> {{$t('floors')}} </span>
                    <span   class="mr-4 " :dir="$t('directions')">
                        <i  class="fa fa-home main-color" style="font-size:22px"></i>  {{$t('classic')}} </span>







            </div>

             </div>
    </div>
    <div class="col-md-3 col-sm-12 mb-3">
   <div class="card mx-auto" style="width: 21rem;border: 1px solid #d1cfcf;cursor:pointer"    >

                <img class="card-img-top img-fluid" src="assets/img/villa.jpg"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; height:200px;width:100%"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body" style="padding: 5px" :class="$t('text_align')">
                    <p class="card-text font-weight-bold card-p mb-2 " > title</p>
                      <small class="ml-4 mr-4 mt-2"  :dir="$t('directions')" ><img src="assets/img/maps-and-flags.svg"
                      width="8" class="mr-1  image-icon1">
                     <span >{{$t('abu_dabhi')}}</span>




                    </small>
                    <p class="  main-color  font-weight-bold mt-0" :class="$t('text_align')" :dir="$t('directions')">
                     <span> 2222 </span> <span>  {{$t('aed')}} </span>
                    </p>


</div>







                <div class="card-footer"
                 style="background-color: #f7f7f7; border-top:none;font-size:14px;border-radius:0px 0px 19px 19px;align-items: center;
    display: flex;" :dir="$t('directions')"  >

                    <span  class="mr-4" :dir="$t('directions')" ><img src="assets/img/bed.svg" width="22" class="mr-1 image-icon">     {{$t('rooms')}} </span>
                    <span   class="mr-4"  :dir="$t('directions')"><img src="assets/img/HomeFloors.svg" width="22" class="mr-1 image-icon"> {{$t('floors')}} </span>
                    <span   class="mr-4 " :dir="$t('directions')">
                        <i  class="fa fa-home main-color" style="font-size:22px"></i>  {{$t('classic')}} </span>







            </div>

             </div>
    </div>

    <div class="col-md-3 col-sm-12 mb-3">
   <div class="card mx-auto" style="width: 21rem;border: 1px solid #d1cfcf;cursor:pointer"    >

                <img class="card-img-top img-fluid" src="assets/img/villa.jpg"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; height:200px;width:100%"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body" style="padding: 5px" :class="$t('text_align')">
                    <p class="card-text font-weight-bold card-p mb-2 " > title</p>
                      <small class="ml-4 mr-4 mt-2"  :dir="$t('directions')" ><img src="assets/img/maps-and-flags.svg"
                      width="8" class="mr-1  image-icon1">
                     <span >{{$t('abu_dabhi')}}</span>




                    </small>
                    <p class="  main-color  font-weight-bold mt-0" :class="$t('text_align')" :dir="$t('directions')">
                     <span> 2222 </span> <span>  {{$t('aed')}} </span>
                    </p>


</div>







                <div class="card-footer"
                 style="background-color: #f7f7f7; border-top:none;font-size:14px;border-radius:0px 0px 19px 19px;align-items: center;
    display: flex;" :dir="$t('directions')"  >

                    <span  class="mr-4" :dir="$t('directions')" ><img src="assets/img/bed.svg" width="22" class="mr-1 image-icon">     {{$t('rooms')}} </span>
                    <span   class="mr-4"  :dir="$t('directions')"><img src="assets/img/HomeFloors.svg" width="22" class="mr-1 image-icon"> {{$t('floors')}} </span>
                    <span   class="mr-4 " :dir="$t('directions')">
                        <i  class="fa fa-home main-color" style="font-size:22px"></i>  {{$t('classic')}} </span>







            </div>

             </div>
    </div>

      <div class="col-md-3 col-sm-12 mb-3">
   <div class="card mx-auto" style="width: 21rem;border: 1px solid #d1cfcf;cursor:pointer"    >

                <img class="card-img-top img-fluid" src="assets/img/villa.jpg"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; height:200px;width:100%"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body" style="padding: 5px" :class="$t('text_align')">
                    <p class="card-text font-weight-bold card-p mb-2 " > title</p>
                      <small class="ml-4 mr-4 mt-2"  :dir="$t('directions')" ><img src="assets/img/maps-and-flags.svg"
                      width="8" class="mr-1  image-icon1">
                     <span >{{$t('abu_dabhi')}}</span>




                    </small>
                    <p class="  main-color  font-weight-bold mt-0" :class="$t('text_align')" :dir="$t('directions')">
                     <span> 2222 </span> <span>  {{$t('aed')}} </span>
                    </p>


</div>







                <div class="card-footer"
                 style="background-color: #f7f7f7; border-top:none;font-size:14px;border-radius:0px 0px 19px 19px;align-items: center;
    display: flex;" :dir="$t('directions')"  >

                    <span  class="mr-4" :dir="$t('directions')" ><img src="assets/img/bed.svg" width="22" class="mr-1 image-icon">     {{$t('rooms')}} </span>
                    <span   class="mr-4"  :dir="$t('directions')"><img src="assets/img/HomeFloors.svg" width="22" class="mr-1 image-icon"> {{$t('floors')}} </span>
                    <span   class="mr-4 " :dir="$t('directions')">
                        <i  class="fa fa-home main-color" style="font-size:22px"></i>  {{$t('classic')}} </span>







            </div>

             </div>
    </div>
</div>

    <section class="work-with-us ng-scope"  >



            <div class="" >
                <h3 class=" mr-3 "  :class="$t('text_align')" >
                    {{$t('our_services')}}
                </h3>


    <div class="row" :dir="$t('directions')">

  <div class="col-md-3 col-sm-12 mb-3">
                 <div class="card mx-auto" style="width: 21rem;cursor:pointer"    >

                <span  class="icon-tender mx-auto mt-3">
                <img class="card-img-top img-fluid mx-auto " src="assets/img/blueprint (1).svg  "     alt="Card image cap">

               </span>
                   <h1 class="text-center h4  mt-2 "> {{$t('consulting_company')}}</h1>
                    <span  class="d-block text-center">{{$t('tender')}}</span>




                <div class="card-body"  :class="$t('text_align')">

 <a class="btn bg-orange-outline text-light   d-block mx-auto font-weight-bold " style="padding:4px 40px; font-size:20px">{{$t('start')}}</a>
</div>



             </div>
              </div>



  <div class="col-md-3 col-sm-12 mb-3">
                 <div class="card mx-auto" style="width: 21rem;cursor:pointer"    >

                <span  class="icon-tender mx-auto mt-3">
                <img class="card-img-top img-fluid mx-auto " src="assets/img/sketch.svg"     alt="Card image cap">

               </span>
                   <h1 class="text-center h4  mt-2 "> {{$t('construcion_company')}}</h1>
                    <span  class="d-block text-center">{{$t('tender')}}</span>




                <div class="card-body" :class="$t('text_align')">

 <a class="btn bg-orange-outline text-light   d-block mx-auto font-weight-bold " style="padding:4px 40px; font-size:20px">{{$t('start')}}</a>
</div>



             </div>
              </div>









  <div class="col-md-3 col-sm-12 mb-3">
                 <div class="card mx-auto" style="width: 21rem;cursor:pointer"    >

                <span  class="icon-tender mx-auto mt-3">
                <img class="card-img-top img-fluid mx-auto " src="assets/img/interior-design (3).svg"     alt="Card image cap">

               </span>
                   <h1 class="text-center h4  mt-2 "> {{$t('interior_design')}}</h1>
                    <span  class="d-block text-center">{{$t('tender')}}</span>




                <div class="card-body"  :class="$t('text_align')">

 <a class="btn bg-orange-outline text-light   d-block mx-auto font-weight-bold " style="padding:4px 40px; font-size:20px">{{$t('start')}}</a>
</div>



             </div>
              </div>
  <div class="col-md-3  col-sm-12 mb-3 ">
                 <div class="card mx-auto" style="width: 21rem;cursor:pointer"    >

                <span  class="icon-tender mx-auto mt-3">
                <img class="card-img-top img-fluid mx-auto " src="assets/img/parquet.svg"     alt="Card image cap">

               </span>
                   <h1 class="text-center h4  mt-2 "> {{$t('Stone_companies')}}</h1>
                    <span  class="d-block text-center">{{$t('tender')}}</span>




                <div class="card-body" :class="$t('text_align')">

 <a class="btn bg-orange-outline text-light   d-block mx-auto font-weight-bold " style="padding:4px 40px; font-size:20px">{{$t('start')}}</a>
</div>



             </div>
              </div>






    </div>

    <div class="row mt-3" :dir="$t('directions')" >




<div class="col-md-3"></div>
<div class="col-md-3 col-sm-12 mb-3">
                 <div class="card mx-auto" style="width: 21rem;cursor:pointer"    >

                <span  class="icon-tender mx-auto mt-3">
                <img class="card-img-top img-fluid mx-auto " src="assets/img/fan.svg"     alt="Card image cap">

               </span>
                   <h1 class="text-center h4  mt-2 "> {{$t('HVAC_companies')}}</h1>
                    <span  class="d-block text-center">{{$t('tender')}}</span>




                <div class="card-body"  :class="$t('text_align')">

 <a class="btn bg-orange-outline text-light   d-block mx-auto font-weight-bold " style="padding:4px 40px; font-size:20px">{{$t('start')}}</a>
</div>



             </div>
              </div>
  <div class="col-md-3  col-sm-12 mb-3">
                 <div class="card mx-auto" style="width: 21rem;cursor:pointer"    >

                <span  class="icon-tender mx-auto mt-3">
                <img class="card-img-top img-fluid mx-auto " src="assets/img/furnitures.svg"     alt="Card image cap">

               </span>
                   <h1 class="text-center h4  mt-2 "> {{$t('Furniture')}}</h1>
                    <span  class="d-block text-center">{{$t('tender')}}</span>




                <div class="card-body"  :class="$t('text_align')">

 <a class="btn bg-orange-outline text-light   d-block mx-auto font-weight-bold " style="padding:4px 40px; font-size:20px">{{$t('start')}}</a>
</div>



             </div>
              </div>



              <div class="col-md-3"></div>


    </div>


            </div>



</section>


<section class="Company_Consulting">
<h1 class="text-center main-color"> {{$t('our_partner')}}</h1>
  <div class=" mt-3 " :dir="$t('directions')" >


             <span v-if="lang=='ar'">
<span class=" h3 font-weight-bold text-uppercase text-right mr-3 d-block" dir="">{{$t('consulting_company')}} </span>
            <a class=" h3 text-muted  text-left d-block" style="cursor:pointer;font-size:14px" >{{$t('see_All')}}</a>
      </span>

      <span v-else>
<span class=" h3 font-weight-bold text-left d-block text-uppercase">{{$t('consulting_company')}} </span>
            <a class=" h3 text-muted  text-right d-block " style="cursor:pointer;font-size:14px" >{{$t('see_All')}}</a>
      </span>


        </div>

          <div class="row">
               <div class="col-md-2 col-sm-12">
                 <div class="card" style="
cursor:pointer"    >

                <img class="card-img-top img-fluid mx-auto " src="assets/img/vision.png"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; width:80"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body"  :class="$t('text_align')" style="padding:0">
                    <h1 class="text-center h3 "> الرؤية الذكية</h1>
                    <p class="text-center">للاستشارات الهندسية</p>


</div>









             </div>
              </div>
               <div class="col-md-2 col-sm-12">
                 <div class="card" style="
cursor:pointer"    >

                <img class="card-img-top img-fluid mx-auto " src="assets/img/vision.png"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; width:80"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body"  :class="$t('text_align')">
                    <h1 class="text-center h3 "> الرؤية الذكية</h1>
                    <p class="text-center">للاستشارات الهندسية</p>


</div>









             </div>
              </div>
              <div class="col-md-2 col-sm-12">
                 <div class="card" style="
cursor:pointer"    >

                <img class="card-img-top img-fluid mx-auto " src="assets/img/vision.png"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; width:80"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body"  :class="$t('text_align')">
                    <h1 class="text-center h3 "> الرؤية الذكية</h1>
                    <p class="text-center">للاستشارات الهندسية</p>


</div>









             </div>
              </div>

              <div class="col-md-2 col-sm-12">
                 <div class="card" style="
cursor:pointer"    >

                <img class="card-img-top img-fluid mx-auto " src="assets/img/logo-diyar.png"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; ;width:80px"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body"  :class="$t('text_align')">
                    <h1 class="text-center h3 "> ديار الحديثة </h1>
                    <p class="text-center">للاستشارات الهندسية</p>


</div>









             </div>
              </div>

                <div class="col-md-2 col-sm-12">
                 <div class="card" style="
cursor:pointer"    >

                <img class="card-img-top img-fluid mx-auto " src="assets/img/vision.png"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; width:80px"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body"  :class="$t('text_align')">
                    <h1 class="text-center h3 "> الرؤية الذكية</h1>
                    <p class="text-center">للاستشارات الهندسية</p>


</div>









             </div>
              </div>

              <div class="col-md-2 col-sm-12">
                 <div class="card" style="
cursor:pointer"    >

                <img class="card-img-top img-fluid mx-auto " src="assets/img/sha_consluting.jpg"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; ;width:100px"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body"  :class="$t('text_align')">
                    <h1 class="text-center h3 "> الشارقة   </h1>
                    <p class="text-center">للاستشارات الهندسية</p>


</div>









             </div>
              </div>
          </div>


</section>

<!-- start Company_construcion -->
<section class="Company_construcion">
  <div class=" mt-3 " :dir="$t('directions')" >


             <span v-if="lang=='ar'">
<span class=" h3 font-weight-bold text-uppercase text-right mr-3 d-block" dir="">{{$t('construcion_company')}} </span>
            <a class=" h3 text-muted  text-left d-block" style="cursor:pointer;font-size:14px" >{{$t('see_All')}}</a>
      </span>

      <span v-else>
<span class=" h3 font-weight-bold text-left d-block text-uppercase">{{$t('construcion_company')}} </span>
            <a class=" h3 text-muted  text-right d-block " style="cursor:pointer;font-size:14px" >{{$t('see_All')}}</a>
      </span>


        </div>

          <div class="row">
              <div class="col-md-2 col-sm-12">
                 <div class="card" style="
cursor:pointer"    >

                <img class="card-img-top img-fluid mx-auto " src="assets/img/alsarh.jpg"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; width:80"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body"  :class="$t('text_align')">
                    <h1 class="text-center h3 "> الصرح الكبير</h1>
                    <p class="text-center"> مقاولات</p>


</div>









             </div>
              </div>

              <div class="col-md-2 col-sm-12">
                 <div class="card" style="
cursor:pointer"    >

               <img class="card-img-top img-fluid mx-auto " src="assets/img/logo-diyar.png"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; ;width:80px"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body"  :class="$t('text_align')">
                    <h1 class="text-center h3 "> الشارقة</h1>
                    <p class="text-center"> مقاولات</p>


</div>









             </div>
              </div>

                <div class="col-md-2 col-sm-12">
                 <div class="card" style="
cursor:pointer"    >

                <img class="card-img-top img-fluid mx-auto " src="assets/img/vision.png"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; width:80px"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body"  :class="$t('text_align')">
                    <h1 class="text-center h3 "> الرؤية الذكية</h1>
                    <p class="text-center"> مقاولات</p>


</div>









             </div>
              </div>

              <div class="col-md-2 col-sm-12">
                 <div class="card" style="
cursor:pointer"    >

                <img class="card-img-top img-fluid mx-auto " src="assets/img/sha_consluting.jpg"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; ;width:100px"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body" :class="$t('text_align')">
                    <h1 class="text-center h3 "> الشارقة   </h1>
                    <p class="text-center"> مقاولات</p>


</div>









             </div>
              </div>

                 <div class="col-md-2 col-sm-12">
                 <div class="card" style="
cursor:pointer"    >

                <img class="card-img-top img-fluid mx-auto " src="assets/img/vision.png"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; width:80px"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body"  :class="$t('text_align')">
                    <h1 class="text-center h3 "> الرؤية الذكية</h1>
                    <p class="text-center"> مقاولات</p>


</div>









             </div>
              </div>

              <div class="col-md-2 col-sm-12">
                 <div class="card" style="
cursor:pointer"    >

                <img class="card-img-top img-fluid mx-auto " src="assets/img/sha_consluting.jpg"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; ;width:100px"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body" :class="$t('text_align')">
                    <h1 class="text-center h3 "> الشارقة   </h1>
                    <p class="text-center"> مقاولات</p>


</div>









             </div>
              </div>
          </div>

</section>
<!-- End Company_construcion -->


<!-- start interior design -->
<section class="interior_design ">
  <div class=" mt-3 " :dir="$t('directions')" >


             <span v-if="lang=='ar'">
<span class=" h3 font-weight-bold text-uppercase text-right mr-3 d-block" dir="">{{$t('interior_design')}} </span>
            <a class=" h3 text-muted  text-left d-block" style="cursor:pointer;font-size:14px" >{{$t('see_All')}}</a>
      </span>

      <span v-else>
<span class=" h3 font-weight-bold text-left d-block text-uppercase">{{$t('interior_design')}} </span>
            <a class=" h3 text-muted  text-right d-block " style="cursor:pointer;font-size:14px" >{{$t('see_All')}}</a>
      </span>


        </div>

          <div class="row">
              <div class="col-md-2 col-sm-12">
                 <div class="card" style="
cursor:pointer"    >

                <img class="card-img-top img-fluid mx-auto " src="assets/img/alsarh.jpg"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; "
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body"  :class="$t('text_align')">
                    <h1 class="text-center h3 "> الصرح الكبير</h1>
                    <p class="text-center"> مقاولات</p>


</div>


             </div>
              </div>

              <div class="col-md-2 col-sm-12">
                 <div class="card" style="
cursor:pointer"    >

                <img class="card-img-top img-fluid mx-auto " src="assets/img/sharjah_consrtuction.png"     alt="Card image cap"
>





                <div class="card-body"  :class="$t('text_align')">
                    <h1 class="text-center h3 "> الشارقة</h1>
                    <p class="text-center"> مقاولات</p>


</div>

             </div>
              </div>

                <div class="col-md-2 col-sm-12">
                 <div class="card" style="
cursor:pointer"    >

                <img class="card-img-top img-fluid mx-auto " src="assets/img/vision.png"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; width:80px"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body"  :class="$t('text_align')">
                    <h1 class="text-center h3 "> الرؤية الذكية</h1>
                    <p class="text-center"> مقاولات</p>


</div>









             </div>
              </div>

              <div class="col-md-2 col-sm-12">
                 <div class="card" style="
cursor:pointer"    >

                <img class="card-img-top img-fluid mx-auto " src="assets/img/sha_consluting.jpg"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; ;width:100px"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body" :class="$t('text_align')">
                    <h1 class="text-center h3 "> الشارقة   </h1>
                    <p class="text-center"> مقاولات</p>


</div>









             </div>
              </div>
                    <div class="col-md-2 col-sm-12">
                 <div class="card" style="
cursor:pointer"    >

                <img class="card-img-top img-fluid mx-auto " src="assets/img/sha_consluting.jpg"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; ;width:100px"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body" :class="$t('text_align')">
                    <h1 class="text-center h3 "> الشارقة   </h1>
                    <p class="text-center"> مقاولات</p>


</div>









             </div>
              </div>

                    <div class="col-md-2 col-sm-12">
                 <div class="card" style="
cursor:pointer"    >

                <img class="card-img-top img-fluid mx-auto " src="assets/img/sha_consluting.jpg"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; ;width:100px"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body" :class="$t('text_align')">
                    <h1 class="text-center h3 "> الشارقة   </h1>
                    <p class="text-center"> مقاولات</p>


</div>









             </div>
              </div>
          </div>

</section>

<!-- End interior_design  -->


<!-- start HVAC companies  -->
<section class="HVAC_companies ">
  <div class=" mt-3 " :dir="$t('directions')" >


             <span v-if="lang=='ar'">
<span class=" h3 font-weight-bold text-uppercase text-right mr-3 d-block" dir="">{{$t('HVAC_companies')}} </span>
            <a class=" h3 text-muted  text-left d-block" style="cursor:pointer;font-size:14px" >{{$t('see_All')}}</a>
      </span>

      <span v-else>
<span class=" h3 font-weight-bold text-left d-block text-uppercase">{{$t('HVAC_companies')}} </span>
            <a class=" h3 text-muted  text-right d-block " style="cursor:pointer;font-size:14px" >{{$t('see_All')}}</a>
      </span>


        </div>

          <div class="row">
              <div class="col-md-2 col-sm-12">
                 <div class="card" style="
cursor:pointer"    >

                <img class="card-img-top img-fluid mx-auto " src="assets/img/alsarh.jpg"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; width:80"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body"  :class="$t('text_align')">
                    <h1 class="text-center h3 "> الصرح الكبير</h1>
                    <p class="text-center"> مقاولات</p>


</div>









             </div>
              </div>

              <div class="col-md-2 col-sm-12">
                 <div class="card" style="
cursor:pointer"    >

                <img class="card-img-top img-fluid mx-auto " src="assets/img/sharjah_consrtuction.png"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; ;width:80px"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body"  :class="$t('text_align')">
                    <h1 class="text-center h3 "> الشارقة</h1>
                    <p class="text-center"> مقاولات</p>


</div>









             </div>
              </div>

                <div class="col-md-2 col-sm-12">
                 <div class="card" style="
cursor:pointer"    >

                <img class="card-img-top img-fluid mx-auto " src="assets/img/vision.png"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; width:80px"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body"  :class="$t('text_align')">
                    <h1 class="text-center h3 "> الرؤية الذكية</h1>
                    <p class="text-center"> مقاولات</p>


</div>









             </div>
              </div>

              <div class="col-md-2 col-sm-12">
                 <div class="card" style="
cursor:pointer"    >

                <img class="card-img-top img-fluid mx-auto " src="assets/img/sha_consluting.jpg"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; ;width:100px"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body"  :class="$t('text_align')">
                    <h1 class="text-center h3 "> الشارقة   </h1>
                    <p class="text-center"> مقاولات</p>


</div>









             </div>
              </div>

              <div class="col-md-2 col-sm-12">
                 <div class="card" style="
cursor:pointer"    >

                <img class="card-img-top img-fluid mx-auto " src="assets/img/sha_consluting.jpg"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; ;width:100px"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body"  :class="$t('text_align')">
                    <h1 class="text-center h3 "> الشارقة   </h1>
                    <p class="text-center"> مقاولات</p>


</div>









             </div>
              </div>

              <div class="col-md-2 col-sm-12">
                 <div class="card" style="
cursor:pointer"    >

                <img class="card-img-top img-fluid mx-auto " src="assets/img/sha_consluting.jpg"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; ;width:100px"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body"  :class="$t('text_align')">
                    <h1 class="text-center h3 "> الشارقة   </h1>
                    <p class="text-center"> مقاولات</p>


</div>









             </div>
              </div>
          </div>

</section>
<section class="Furnitur ">
  <div class=" mt-3 " :dir="$t('directions')" >


             <span v-if="lang=='ar'">
<span class=" h3 font-weight-bold text-uppercase text-right mr-3 d-block" dir="">{{$t('Furniture')}} </span>
            <a class=" h3 text-muted  text-left d-block" style="cursor:pointer;font-size:14px" >{{$t('see_All')}}</a>
      </span>

      <span v-else>
<span class=" h3 font-weight-bold text-left d-block text-uppercase">{{$t('Furniture')}} </span>
            <a class=" h3 text-muted  text-right d-block " style="cursor:pointer;font-size:14px" >{{$t('see_All')}}</a>
      </span>


        </div>

          <div class="row">
              <div class="col-md-2 col-sm-12">
                 <div class="card" style="
cursor:pointer"    >

                <img class="card-img-top img-fluid mx-auto " src="assets/img/alsarh.jpg"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; width:80"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body"  :class="$t('text_align')">
                    <h1 class="text-center h3 "> الصرح الكبير</h1>
                    <p class="text-center"> مقاولات</p>


</div>









             </div>
              </div>

              <div class="col-md-2 col-sm-12">
                 <div class="card" style="
cursor:pointer"    >

                <img class="card-img-top img-fluid mx-auto " src="assets/img/sharjah_consrtuction.png"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; ;width:80px"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body"  :class="$t('text_align')">
                    <h1 class="text-center h3 "> الشارقة</h1>
                    <p class="text-center"> مقاولات</p>


</div>









             </div>
              </div>

                <div class="col-md-2 col-sm-12">
                 <div class="card" style="
cursor:pointer"    >

                <img class="card-img-top img-fluid mx-auto " src="assets/img/vision.png"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; width:80px"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body"  :class="$t('text_align')">
                    <h1 class="text-center h3 "> الرؤية الذكية</h1>
                    <p class="text-center"> مقاولات</p>


</div>









             </div>
              </div>

              <div class="col-md-2 col-sm-12">
                 <div class="card" style="
cursor:pointer"    >

                <img class="card-img-top img-fluid mx-auto " src="assets/img/sha_consluting.jpg"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; ;width:100px"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body col-sm-12"  :class="$t('text_align')">
                    <h1 class="text-center h3 "> الشارقة   </h1>
                    <p class="text-center"> مقاولات</p>


</div>









             </div>
              </div>
               <div class="col-md-2 col-sm-12">
                 <div class="card" style="
cursor:pointer"    >

                <img class="card-img-top img-fluid mx-auto " src="assets/img/sha_consluting.jpg"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; ;width:100px"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body col-sm-12"  :class="$t('text_align')">
                    <h1 class="text-center h3 "> الشارقة   </h1>
                    <p class="text-center"> مقاولات</p>


</div>









             </div>
              </div>
               <div class="col-md-2 col-sm-12">
                 <div class="card" style="
cursor:pointer"    >

                <img class="card-img-top img-fluid mx-auto " src="assets/img/sha_consluting.jpg"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; ;width:100px"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body col-sm-12"  :class="$t('text_align')">
                    <h1 class="text-center h3 "> الشارقة   </h1>
                    <p class="text-center"> مقاولات</p>


</div>









             </div>
              </div>
          </div>

</section>

<!-- End Furniture companies  -->

<!-- start Stone companies  -->
<section class="Stone_companies ">
<div class=" mt-5 " :dir="$t('directions')" >


             <span v-if="lang=='ar'">
<span class=" h3 font-weight-bold text-uppercase text-right mr-3 d-block" dir="">{{$t('Stone_companies')}} </span>
            <a class=" h3 text-muted  text-left d-block" style="cursor:pointer;font-size:14px" >{{$t('see_All')}}</a>
      </span>

      <span v-else>
<span class=" h3 font-weight-bold text-left d-block text-uppercase">{{$t('Stone_companies')}} </span>
            <a class=" h3 text-muted  text-right d-block " style="cursor:pointer;font-size:14px" >{{$t('see_All')}}</a>
      </span>


        </div>
      <div class="container">
          <div class="row">
              <div class="col-md-3 col-sm-12">
                 <div class="card" style="
cursor:pointer"    >

                <img class="card-img-top img-fluid mx-auto " src="assets/img/alsarh.jpg"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; width:80"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body"  :class="$t('text_align')">
                    <h1 class="text-center h3 "> الصرح الكبير</h1>
                    <p class="text-center"> مقاولات</p>


</div>









             </div>
              </div>

              <div class="col-md-3 col-sm-12">
                 <div class="card" style="
cursor:pointer"    >

                <img class="card-img-top img-fluid mx-auto " src="assets/img/sharjah_consrtuction.png"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; ;width:80px"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body" :class="$t('text_align')">
                    <h1 class="text-center h3 "> الشارقة</h1>
                    <p class="text-center"> مقاولات</p>


</div>









             </div>
              </div>

                <div class="col-md-3 col-sm-12">
                 <div class="card" style="
cursor:pointer"    >

                <img class="card-img-top img-fluid mx-auto " src="assets/img/vision.png"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; width:80px"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body"  :class="$t('text_align')">
                    <h1 class="text-center h3 "> الرؤية الذكية</h1>
                    <p class="text-center"> مقاولات</p>


</div>









             </div>
              </div>

              <div class="col-md-3 col-sm-12">
                 <div class="card" style="
cursor:pointer"    >

                <img class="card-img-top img-fluid mx-auto " src="assets/img/sha_consluting.jpg"     alt="Card image cap"
                style="border-radius:10px 10px 0 0; ;width:100px"
                  data-toggle="modal" data-target="#exampleModal">





                <div class="card-body"  :class="$t('text_align')">
                    <h1 class="text-center h3 "> الشارقة   </h1>
                    <p class="text-center"> مقاولات</p>


</div>









             </div>
              </div>
          </div>
      </div>
</section>

   <h1 class="text-center text-weight-bold main-color mt-5" id="how"><b>{{$t('how_it_work')}}</b></h1>
    <div class="how_it_work mt-5 card " style="position: relative;background:#eee">

            <div class="row   " :dir="$t('directions')" >


                  <div class="col-md-6 col-sm-12 visible-xs" >
                    <div class="">
                    <img :src="'assets/img/phonebg.png'" class="img-fluid mx-auto d-block" width="80%" style="position: absolute;bottom:0;left:10px;right: 10px;">
                    </div>

                </div>
                 <div class="col-md-6 col-sm-12 steps" :dir="$t('directions')" :class="$t('text_align')">

                   <h1 class="h4 main-color mt-5"> <i class="fa fa-check-circle"></i>{{$t('Add_Project')}} </h1>

            <p class="text-muted">{{$t('message_add_project')}} </p>

            <h1 class="h4 main-color"> <i class="fa fa-check-circle"></i> {{$t('Choose_the_right_offer')}}</h1>

            <p class="text-muted">
               {{$t('message_the_right_offer')}}

            </p>

            <h1 class="h4 main-color"> <i class="fa fa-check-circle"></i> {{$t('Execute_the_project')}} </h1>

            <p class="text-muted">{{$t('message_Execute_the_project')}} </p>



                </div>

            </div>



    </div>


    <section class="area-seaction mt-5 mb-5" id="Become-Partner">
         <div class="container">

                     <h1 class="text-center "><b class="main-color" >
           {{$t('join_us')}}

            </b></h1>
        <p class="text-center">

          {{$t('amb_story')}}
        </p>


        <div class="row">
            <div class="col-md-6 text-center">
                    <div class="mx-auto bus-icon mt-5 mb-2">
                    <i class="fa fa-briefcase fa-2x text-light"></i>
                    </div>
                    <h1 class=" h3 font-weight-bold">
                     {{$t('Become_Partner')}}
                    </h1>
                    <p class="text-muted">
                        {{$t('reach')}}
                    </p>
                        <a  href="/partner" class="btn btn-bus  mt-4   text-light"  target="_blank">

                        <span class="font-weight-bold">  {{$t('join_us')}}</span>

                        </a>



            </div>


            <div class="col-md-6 text-center">
                <div class="mx-auto user-icon mt-5 mb-2">
                <i class="fa fa-user fa-2x text-light"></i>
                </div>
                <h1 class=" h3 font-weight-bold">
                    {{$t('Build_your_Design')}}
                </h1>
                <p class="text-muted">
                    {{$t('team_partner')}}
                </p>
                    <a  href="/register" class="btn btn-user mt-4 text-light">

                    <span class="font-weight-bold">   {{$t('join_us')}}</span>

                    </a>



        </div>


        </div>
         </div>

    </section>







    </div>
</template>

<script>

import carousel from 'vue-owl-carousel';
import Login from './login.vue';

export default {

 components: { carousel,Login },

 data(){
       const lang = localStorage.getItem('lang') || 'ar';
     return{

         allOffershow : null,





     };
 },
 methods:{
     showOffer(){
         axios.get('api/ads/showOffer').then(res=>{
             this.allOffershow = res.data;
             console.log('successs show all offer')
         })
     },


 },created(){

     this.showOffer();

 },

}

</script>

<style scoped>
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
    width: 100%;
}
.card{
    border: 2px solid #eee;

}
.icon-tender{
    width: 50px !important;
    height: 50px;

   border-radius: 20%;


display: flex;
justify-content: center;
align-items: center;

}
.bg-orange-outline{

    background: #0d5e93;
    color: #fff;
    border-radius: 29px;
}
</style>



<style scoped>
.Company_Consulting img , .Company_construcion img
, .interior_design img, .HVAC_companies img , .Furnitur img , .Stone_companies img{
    width: 80px;
    height: 80px;
    margin-top: 20px;
}
.btn-bus {

    padding:20px 50px !important;
    text-align: center;
    text-transform: uppercase;
    transition: 0.5s;
    background-size: 200% auto;
    color: white;
    box-shadow: 0 0 20px #eee;
    border-radius: 10px;
    display: block;
 }
 .btn-user {


    padding:20px 50px !important;
    text-align: center;
    text-transform: uppercase;
    transition: 0.5s;
    background-size: 200% auto;
    color: white;
    box-shadow: 0 0 20px #eee;
    border-radius: 10px;
    display: block;
  }
</style>
