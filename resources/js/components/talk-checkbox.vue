<template>
    <div class="pr-5">

      <ul>
          <li v-for="talk in reverTalks">
              <label><input type="radio" v-model="checkNames" v-bind:value="talk.id">{{ talk.name }}</label>
              <p>{{ talk.listen }}</p>
              <p>{{ talk.talk }}</p>
          </li>
      </ul>
      <p>{{ checkNames }}</p>
      <button v-on:click="handleClick">送信</button>

    </div>

</template>

<script>
    export default {
      props: ['talks'],
      created() {
        console.log(this.talks)
      },
      data:function () {
        return {
          checkNames: [],
        }

      },
      computed: {
        // 算出 getter 関数
        reverTalks: function () {
          // `this` は vm インスタンスを指します
          return JSON.parse(this.talks);
        },
      },
      methods: {
        handleClick: function () {
          console.log(this.checkNames);
          axios.post('/connect/' + this.checkNames)
            .then(response => {
                window.location.reload();
            })
            .catch(errors => {
                if (errors.response.status == 401) {
                    window.location = '/login';
                }
            });
        }
      },

      mounted() {

      },
    }
</script>
