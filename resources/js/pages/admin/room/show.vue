<template>
  <div v-if="show">
    <!-- <pre>{{ show }} </pre> -->

    <div class="col-12">
      <div class="col-12"></div>
    </div>
    <div class="row">
      <div class="col-6">
      <span class="head-muse">พิพิธภัณฑ์ชาวบางกอก</span>
      <!-- <span class="head-muse">/ ชั้น 1</span> -->

      <!-- <span class="head-muse"> / {{ show.name }}</span> -->
      <span class="head-muse" style="color:#3641FB">/ Item</span>
    </div>
    <div class="col-6 text-right" style="margin-left: -24px;">
         <router-link :to="{
              name: 'admin.item.create'
            }">
            <button class="add-room">
              <i class="flaticon-add"></i> ADD ITEM
            </button>
          </router-link>
    </div>
    </div>

    <br />
    <div class="col-12">
      <div class="card table-room">
        <table>
          <thead class="mm-thead" style="font-size:20px; font-weight:600;">
            <tr>
              <td style="width:50%;">Name</td>
              <td class="text-center" style="width: 30%">Action</td>
              <td class="text-center">Created At</td>
            </tr>
          </thead>
          <tbody class="mm-tbody">
            <tr v-for="item in show" :key="id" style="border-top: 1px solid #cac6c6;">
              <td>
                <router-link
                  :to="{
                    name: 'admin.item.show',
                    params: { id: item.id }
                  }"
                >{{ item.translation.name }}</router-link>
              </td>
              <td class="text-center">
                <router-link
                  :to="{
                    name: 'admin.item.edit',
                    params: { id: item.id }
                  }"
                >
                  <el-button type="warning" round><i class="fas fa-pencil-alt"></i> &nbsp;Edit</el-button>
                </router-link>
              </td>
              <td>{{ item.translation.created_at }}</td>
            </tr>
          </tbody>
        </table>
       
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
  computed: {
    ...mapGetters({
      show: "item/items"
    })
  },
  methods: {
    ...mapActions({
      fetch: "item/fetch",
      del: "item/del"
    })
  },
  created() {
    this.fetch();
    console.log(this.show);
  }
};
</script>

<style>
.table-room {
  border: none;
  border-radius: 20px;
  padding: 20px 50px;
  background-color: white;
}
.head-muse {
      margin-left: 40px;
  font-size: 25px;
}
.add-room {
  background-color: #ff6e6e;
  color: whitesmoke;
  padding: 10px 15px;
  border-radius: 10px;
}
.setting {
  right: 0;
  position: absolute;
  background-color: #3631c4;
  color: whitesmoke;
  padding: 10px 15px;
  border-radius: 10px;
}
.el-button.is-round {
  border-radius: 9px !important;
  padding: 12px 35px !important;
}
</style>
