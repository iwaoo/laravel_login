<template>
    <div class="pr-5">
        <a title="" :href="`/following_list/${usernoid}`"><strong>{{ count_following }}</strong>followers</a>
    </div>
</template>

<script>
    export default {
        props: ['usernoid', 'following_count'],

        mounted() {

        },
        beforeMount() {
          if(this.$store.state.following_count == 'following_count') {
            this.$store.state.following_count = this.following_count;
          }
        },
        computed: {
          count_following () {
            return this.$store.state.following_count
          }
        },
    }
</script>
