<template>
    <div>
     <div class="bg-white-card" >
<div class="loader"></div>
</div>
    </div>
</template>

<script>
export default {

}
</script>


<style scoped>
label {
    font-size:0.7rem;
    text-transform:uppercase;
    color: gray;
    font-weight: bolder;
}
.is-invalid{
border-color: #b22222;
background-image: none;
}

 .bg-white-card{
    position: fixed; /* Sit on top of the page content */
        width: 100%; /* Full width (cover the whole page) */
        height: 100%;/* Full height (cover the whole page) */

        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(255, 255, 255); /* Black background with opacity */
        z-index: 2;
     flex-wrap: wrap;
     justify-content: center;
    align-items: center;
    transition: all .5s ease-in-out;
}
.loader {
  margin: auto;
  border: 20px solid #EAF0F6;
  border-radius: 50%;
  border-top: 20px solid #1E5DA8;
  width: 200px;
  height: 200px;
  animation: spinner 4s linear infinite;
}

@keyframes spinner {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
