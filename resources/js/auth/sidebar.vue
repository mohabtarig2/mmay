<template>

</template>


<script>
export default {

}
</script>
<style>

:root{
    --sidebar-bg-color:#ffffff;
    --sidebar-item-hover:#38a169;
    --sidebar-item-active:#276749;
}

</style>

<style scoped>
.sidebar {
    color:rgb(34, 34, 34);
    background-color: var(--sidebar-bg-color);
    float: left;
    position: fixed;
    z-index: 1;
    top:72px;
    left: 0;
    bottom: 0;
        padding: 1.5em;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
}
.sidebar a{
    padding: 10px;
}
.sidebar a:hover{
    background: #eee;
    border-radius: 20px;
    cursor: pointer;
}
</style>
