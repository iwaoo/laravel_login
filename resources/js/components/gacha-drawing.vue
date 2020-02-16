<template>

<div class="pr-5">
    <div class="field">
      <div class="control">
        <input class="input" type="text" placeholder="" name="name" v-model="form.name">
      </div>
    </div>

    <div class="file has-name">
      <label class="file-label">
        <input class="file-input" type="file" name="first_image" @change="onFileChange">
        <span class="file-cta">
          <span class="file-label">
            画像を選択してください
          </span>
        </span>
        <span class="file-name">
          {{ form.first_image_name }}
        </span>
      </label>
    </div>

    <div class="file has-name">
      <label class="file-label">
        <input class="file-input" type="file" name="second_image" @change="onFileChange">
        <span class="file-cta">
          <span class="file-label">
            画像を選択してください
          </span>
        </span>
        <span class="file-name">
          {{ form.second_image_name }}
        </span>
      </label>
    </div>

    <div class="control">
      <button class="button is-primary" @click="submit">Submit</button>
    </div>
</div>
</template>

<script>
    let form_data_list = {
      name: '',
      first_image: '',
      first_image_name: "---",
      second_image: '',
      second_image_name: "---",
    };
    export default {
      created() {

      },
      data:function () {
        return {
          form: {
            name: 'テスト',

          },



        }

      },
      methods: {
        onFileChange(e) {
          const file = e.target.files[0]
          const form_name = e.target.name
          form_data_list.name = this.form.name
          if (form_name == "first_image") {

            form_data_list.first_image = file
            form_data_list.first_image_name = file.name

          }
          if (form_name == "second_image") {
            form_data_list.second_image = file
            form_data_list.second_image_name = file.name
          }
        },
        submit: function () {

          let formData = new FormData()
          for(let key in form_data_list) {
            formData.append(key, form_data_list[key])
          }

          // コンソールで確認
          for(let item of formData){
            console.log(item);
          }

          // axiosで送信処理を書く
          // axios.post(apiUrl, formData)
        }
      }
    }
</script>
