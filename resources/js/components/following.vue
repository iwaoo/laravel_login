<template>
    <div>
        <div class="pr-5"><strong>{{ following }}</strong> following</div>
    </div>
</template>

<script>
    export default {
        props: ['following_count'],

        mounted() {

        },
        beforeMount() {
          if(this.$store.state.following_count == 'following_count') {
            this.$store.state.following_count = this.following_count;
          }
        },
        computed: {
          following () {
            return this.$store.state.following_count
          }
        },
    }
</script>
