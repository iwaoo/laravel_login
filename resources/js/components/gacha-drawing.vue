<template>

<div class="pr-5">
    <div class="form-group row">
        <label for="a_word" class="col-md-4 col-form-label">一言</label>
        <input class="input" type="text" placeholder="" name="a_word" v-model="form.a_word">
    </div>

    <div class="form-group row">
        <label for="a_word" class="col-md-4 col-form-label">説明</label>
        <input class="input" type="text" placeholder="" name="description" v-model="form.description">
    </div>

    <div class="file has-name">
      <label class="file-label">
        <input class="file-input" type="file" name="background_image1" @change="onFileChange">
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
        <input class="file-input" type="file" name="background_image2" @change="onFileChange">
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

    <div class="file has-name">
      <label class="file-label">
        <input class="file-input" type="file" name="background_image3" @change="onFileChange">
        <span class="file-cta">
          <span class="file-label">
            画像を選択してください
          </span>
        </span>
        <span class="file-name">
          {{ form.third_image_name }}
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
      a_word: '',
      description: '',
      background_image1: '',
      first_image_name: "---",
      background_image2: '',
      second_image_name: "---",
      background_image3: '',
      third_image_name: "---",

    };
    export default {
      created() {

      },
      data:function () {
        return {
          form: {
            a_word: '',
            description: '',

          },



        }

      },
      methods: {
        onFileChange(e) {
          const file = e.target.files[0]
          const form_name = e.target.name

          form_data_list.a_word = this.form.a_word
          form_data_list.description = this.form.description

          if (form_name == "background_image1") {

            form_data_list.background_image1 = file
            form_data_list.first_image_name = file.name

          }
          if (form_name == "background_image2") {
            form_data_list.background_image2 = file
            form_data_list.second_image_name = file.name
          }
          if (form_name == "background_image3") {
            form_data_list.background_image3 = file
            form_data_list.third_image_name = file.name
          }
        },
        submit: function () {

          let formData = new FormData()
          for(let key in form_data_list) {
            formData.append(key, form_data_list[key])
          }

          // axiosで送信処理を書く
      //     axios.post('/gacha_drawing', formData)
        }
      }
    }
</script>
