<template>
    <div>
        <div class="pr-5"><strong>{{ followers }}</strong> followers</div>
    </div>
</template>

<script>
    export default {
        props: ['followers_count'],

        mounted() {

        },
        beforeMount() {
          if(this.$store.state.followers_count == 'followers_count') {
            this.$store.state.followers_count = this.followers_count;
          }
        },
        computed: {
          followers () {
            return this.$store.state.followers_count
          }
        },
    }
</script>
