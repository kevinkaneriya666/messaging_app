<template>
    <div v-if="hideShow">This is second Vue component</div>
    <button @click="takeAction">Hide/Show</button>
</template>
<script>
    export default {
        name: 'second',
        props: [],
        data() {
            return {
                hideShow: true
            }
        },
        methods: {
            takeAction(event){
                if(this.hideShow == false){
                    this.hideShow = true;
                } else{
                    this.hideShow = false;
                }                
            }
        },
        mounted() {
           

        }
    }
</script>