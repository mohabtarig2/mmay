<template>
    <div>


        <span v-if="rating==1">
            <ul class="reply-in-rating list-none">
            <li><i class="bx bxs-star"></i></li>
            <li><i class="bx bx-star"></i></li>
            <li><i class="bx bx-star"></i></li>
            <li><i class="bx bx-star"></i></li>
            <li><i class="bx bx-star"></i></li>
            </ul>
        </span>
        <span v-if="rating==2">
            <ul class="reply-in-rating list-none">
            <li><i class="bx bxs-star"></i></li>
            <li><i class="bx bxs-star"></i></li>
            <li><i class="bx bx-star"></i></li>
            <li><i class="bx bx-star"></i></li>
            <li><i class="bx bx-star"></i></li>
            </ul>
        </span>

          <span v-if="rating==3">
              <ul class="reply-in-rating list-none">
            <li><i class="bx bxs-star"></i></li>
            <li><i class="bx bxs-star"></i></li>
            <li><i class="bx bxs-star"></i></li>
            <li><i class="bx bx-star"></i></li>
            <li><i class="bx bx-star"></i></li>
              </ul>
        </span>

        <span v-if="rating==4">
            <ul class="reply-in-rating list-none">
            <li><i class="bx bxs-star"></i></li>
            <li><i class="bx bxs-star"></i></li>
            <li><i class="bx bxs-star"></i></li>
            <li><i class="bx bxs-star"></i></li>
            <li><i class="bx bx-star"></i></li>
            </ul>
        </span>

        <span v-if="rating==5">
            <ul class="reply-in-rating list-none">
            <li><i class="bx bxs-star"></i></li>
            <li><i class="bx bxs-star"></i></li>
            <li><i class="bx bxs-star"></i></li>
            <li><i class="bx bxs-star"></i></li>
            <li><i class="bx bxs-star"></i></li>
            </ul>
        </span>



    </div>
</template>

<script>
export default {
  props:{rating:Number}
}
</script>

