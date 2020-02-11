<template>
<div class="pr-5">
    <div class="field">
      <div class="control">
        <input class="input" type="text" placeholder="山田太郎" name="name" v-model="form.name">
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
    export default {
      created() {

      },
      data:function () {
        return {
          form: {
            name: null,
            first_image: null,
            first_image_name: "---",
            second_image: null,
            second_image_name: "---",
          },
        }

      },
      methods: {
        onFileChange(e) {
        console.log(e.target.files[0]);
          const file = e.target.files[0]
          const form_name = e.target.name
          if (form_name == "first_image") {

            this.form.first_image = file
            this.form.first_image_name = file.name
          }
          if (form_name == "second_image") {
            this.form.second_image = file
            this.form.second_image_name = file.name
          }
        },
        submit() {

          const formData = new FormData()
          for(let key in this.form) {
            formData.append(key, this.form[key])
          }

          // コンソールで確認


          // axiosで送信処理を書く
          // axios.post(apiUrl, formData)
        }
      }
    }
</script>
