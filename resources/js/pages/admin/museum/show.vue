<template>
  <div>
    <!-- <h2>{{ show.name }}</h2> -->
    <!-- <hr /> -->
    <!-- <a :href="show.address_url" target="_blank" rel="noopener noreferrer">Google Map</a> -->

    <div class="card p-3" style="border:none;">
      <div class="clearfix">
        <router-link to="/admin/museums" class="float-left">
          <img src="/icon/left-arrow.png" width="40" style="margin-top:10px;" />
        </router-link>
        <h1 class="float-left ml-4">{{ show.name }}</h1>
      </div>
      <hr />
      <div>
        <div class="row">
          <div class="col-md-8">
            <table class="mm-table">
              <tbody>
                <tr>
                  <td class="label">Name</td>
                  <td class="text">{{show.name}}</td>
                </tr>
                <tr>
                  <td class="label">Locate Url</td>
                  <td class="text">{{show.address_url}}</td>
                </tr>
                <tr>
                  <td class="label">Phone number</td>
                  <td class="text">{{show.phonenumber}}</td>
                </tr>
                <tr>
                  <td class="label">Email</td>
                  <td class="text">{{show.email}}</td>
                </tr>
                <tr>
                  <td class="label">Facebook</td>
                  <td class="text">{{show.facebook}}</td>
                </tr>
                <tr>
                  <td class="label">Instragram</td>
                  <td class="text">{{show.instagram}}</td>
                </tr>
                <tr>
                  <td class="label">Description</td>
                  <td class="text">{{show.description}}</td>
                </tr>
                <tr>
                  <td class="label">Language support</td>
                  <td class="text">
                    <button class="btnlang active">
                      <img src="https://sv1.picz.in.th/images/2019/12/19/iniVWR.png" />
                    </button>
                    <button class="btnlang">
                      <img src="https://sv1.picz.in.th/images/2019/12/19/inirxz.png" />
                    </button>
                    <button class="btnlang">
                      <img src="https://sv1.picz.in.th/images/2019/12/19/inipeZ.png" />
                    </button>
                  </td>
                </tr>
                <tr>
                  <td class="label">Expire Date</td>
                  <td class="text">{{show.expried_date}}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-md-4">
            <img :src="show.image_url" class="w-50" />
          </div>
          <div class="col-12 mt-2 clearfix">
            <div class="float-right">
              <el-button type="danger" round>Reject</el-button>
              <el-button type="success" round>Approve</el-button>
            </div>
          </div>
        </div>
      </div>

      <hr />

      <table style="width:100%">
        <tr>
          <th>Name</th>
          <th style="color:white">created at</th>
          <th>Action</th>

          <th>Created at</th>
        </tr>
        <tr>
          <td>
            <div v-for="floor in show.floors" :key="floor.id">
              <router-link :to="{ name: 'admin.floors.show', params: { id: floor.id } }">
                <p>{{ floor.name }}</p>
              </router-link>
            </div>
          </td>
          <td></td>
          <td>
            <div v-for="floor in show.floors" :key="floor.id">
              <router-link :to="{ name: 'admin.floors.show', params: { id: floor.id } }">
                <p class="btn btn-warning">Edit</p>
              </router-link>
            </div>
          </td>

          <td>
            <div v-for="floor in show.floors" :key="floor.id">
              <router-link :to="{ name: 'admin.floors.show', params: { id: floor.id } }">
                <p>15 - 12 - 62</p>
              </router-link>
            </div>
          </td>
        </tr>
      </table>
    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
  computed: {
    ...mapGetters({
      show: "museum/show"
    }),
    id() {
      return parseInt(this.$route.params.id);
    }
  },
  methods: {
    ...mapActions({
      fetch: "museum/show",
      del: "museum/del"
    })
  },
  created() {
    this.fetch(this.id);
  }
};
</script>


