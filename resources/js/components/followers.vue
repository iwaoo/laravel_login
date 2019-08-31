<template>
    <div class="pr-5">
        <a title="" :href="`/follower_list/${usernoid}`"><strong>{{ count_followers }}</strong>followers</a>
    </div>
</template>

<script>
    export default {
        props: ['usernoid', 'followers_count'],

        mounted() {
        },
        beforeMount() {
          if(this.$store.state.followers_count == 'followers_count') {

            this.$store.state.followers_count = this.followers_count;
          }
        },
        computed: {
          count_followers () {
            return this.$store.state.followers_count
          }
        },
    }
</script>
