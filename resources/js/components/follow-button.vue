<template>
    <div>
        <button class="btn btn-primary ml-4" @click="followUser" v-text="buttonText"></button>
    </div>

</template>

<script>
    export default {
        props: ['userId', 'follows'],

        mounted() {

        },

        data: function () {
            return {
                status: this.follows,
            }
        },

        methods: {
            followUser() {
                this.status = !this.status;
                this.$store.commit('followUser',this.userId);
            }
        },

        computed: {
            buttonText() {
                return (this.status) ? 'Unfollow' : 'Follow';
            }
        }
    }
</script>
