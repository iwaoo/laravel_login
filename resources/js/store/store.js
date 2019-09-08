import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
  state: {
    count: 0,
    followers_count:'followers_count',
    following_count: 'following_count'
  },
  mutations: {
  	increment: state => state.count++,
    decrement: state => state.count--,
    followUser(state, userId) {
      axios.post('/follow/' + userId)
        .then(response => {
          return true;
        })
        .catch(errors => {
            if (errors.response.status == 401) {
                window.location = '/login';
            }
        })
        .then(function(data) {
          if (data) {
            console.log(data);
            axios.get('/follow_couont/' + userId)
              .then(response => {
                  state.followers_count = response.data.followersCount;
                  state.following_count = response.data.followingCount;
              })
              .catch(errors => {
                  if (errors.response.status == 401) {
                      window.location = '/login';
                  }
              });
          }
      })
    }
  },
})

// ストアをエクスポート
export default store
