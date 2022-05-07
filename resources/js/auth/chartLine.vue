


<script>
import { Bar } from 'vue-chartjs'

export default {
  extends: Bar,
props:{
    label:{
        type:Object
    },
    charDate:{
        type:Array
    },
     options:{
        type:String
    },
},
mounted() {
const offers= this.charDate.map(d=>d.offers).revers();


this.renderChart({
labels:offers,
datasets:[{
    label:this.label,
    date:totals,

}]
},
this.options
);
},
}

</script>
