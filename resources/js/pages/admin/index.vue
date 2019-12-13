<template>
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <card title="Admin" class="settings-card">
          <ul class="nav flex-column nav-pills">
            <li v-for="tab in tabs" :key="tab.route" class="nav-item">
              <router-link
                :to="{ name: tab.route }"
                class="nav-link"
                active-class="active"
              >
                <img :src="'/icon/' + tab.icon" alt="" width="24" />
                {{ tab.name }}
              </router-link>
            </li>
          </ul>
        </card>
      </div>

      <div class="col-md-9">
        <transition name="fade" mode="out-in">
          <div class="card p-3">
            <router-view />
          </div>
        </transition>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  computed: {
    tabs() {
      return [
        {
          icon: "exhibition.svg",
          name: "Museum",
          route: "admin.museums"
        },
        {
          icon: "exhibition.svg",
          name: "Floor",
          route: "admin.floors"
        },
        {
          icon: "exhibition.svg",
          name: "Room",
          route: "admin.room"
        },
        {
          icon: "exhibition.svg",
          name: "Item",
          route: "admin.item"
        }
      ];
    }
  }
};
</script>

<style></style>
