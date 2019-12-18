<template>
  <div class="container">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <div class="w3-sidebar w3-bar-block" style="width:15%" id="sidebar1">
      <h3 class="w3-bar-item" style="color:white;">Manage</h3>
      <ul class="nav flex-column nav-pills" id="ab">
        <li v-for="tab in tabs" :key="tab.route" class="nav-item">
          <router-link :to="{ name: tab.route }" class="nav-link" active-class="active">
            <img :src="'/icon/' + tab.icon" alt width="24" />
            {{ tab.name }}
          </router-link>
        </li>
        <li v-for="tab in tabs" :key="tab.route" class="nav-item">
          <router-link :to="{ name: tab.route }" class="nav-link">
            <img :src="'/icon/' + tab.icon" alt width="24" />
            User
          </router-link>
        </li>
        <li v-for="tab in tabs" :key="tab.route" class="nav-item">
          <router-link :to="{ name: tab.route }" class="nav-link">
            <img :src="'/icon/' + tab.icon" alt width="24" />
            User Log
          </router-link>
        </li>
      </ul>
    </div>

    <div class="w3-container">
      <div class="row">
        <div class="col-md-9 offset-3">
          <transition name="fade" mode="out-in">
            <div class="card p-3">
              <router-view />
            </div>
          </transition>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <!-- <card title="Manage" class="settings-card">
          <ul class="nav flex-column nav-pills">
            <li v-for="tab in tabs" :key="tab.route" class="nav-item">
              <router-link :to="{ name: tab.route }" class="nav-link" active-class="active">
                <img :src="'/icon/' + tab.icon" alt width="24" />
                {{ tab.name }}
              </router-link>
            </li>
            <li v-for="tab in tabs" :key="tab.route" class="nav-item">
              <router-link :to="{ name: tab.route }" class="nav-link">
                <img :src="'/icon/' + tab.icon" alt width="24" />
                User
              </router-link>
            </li>
            <li v-for="tab in tabs" :key="tab.route" class="nav-item">
              <router-link :to="{ name: tab.route }" class="nav-link">
                <img :src="'/icon/' + tab.icon" alt width="24" />
                User Log
              </router-link>
            </li>
          </ul>
        </card>-->
      </div>

      <!-- <div class="col-md-9">
        <transition name="fade" mode="out-in">
          <div class="card p-3">
            <router-view />
          </div>
        </transition>
      </div>-->
      <!-- <div class="col-md-9 offset-3">
        <transition name="fade" mode="out-in">
          <div class="card p-3">
            <router-view />
          </div>
        </transition>
      </div>-->
    </div>
  </div>
</template>

<script>
export default {
  middleware: "admin",

  computed: {
    tabs() {
      return [
        {
          icon: "exhibition.svg",
          name: "Museum",
          route: "admin.museums"
        }
        // {
        //   icon: "exhibition.svg",
        //   name: "Floor",
        //   route: "admin.floors"
        // },
        // {
        //   icon: "exhibition.svg",
        //   name: "Room",
        //   route: "admin.room"
        // },
        // {
        //   icon: "exhibition.svg",
        //   name: "Item",
        //   route: "admin.item"
        // }
      ];
    }
  }
};
</script>


<style lang="scss">
#sidebar1 {
  background-color: #9cc3ff;
}
#ab {
  margin-left: 35px;
}
#sidebar.active {
  border-radius: 20px;
  min-width: 80px;
  max-width: 80px;
  text-align: center;
}

/* Toggling the sidebar header content, hide the big heading [h3] and showing the small heading [strong] and vice versa*/
#sidebar .sidebar-header strong {
  display: none;
}
#sidebar.active .sidebar-header h3 {
  display: none;
}
#sidebar.active .sidebar-header strong {
  display: block;
}

#sidebar ul li a {
  text-align: left;
}

#sidebar.active ul li a {
  padding: 20px 10px;
  text-align: center;
  font-size: 0.85em;
}

#sidebar.active ul li a i {
  margin-right: 0;
  display: block;
  font-size: 1.8em;
  margin-bottom: 5px;
}

/* Same dropdown links padding*/
#sidebar.active ul ul a {
  padding: 10px !important;
}

/* Changing the arrow position to bottom center position,
   translateX(50%) works with right: 50%
   to accurately  center the arrow */
#sidebar.active .dropdown-toggle::after {
  top: auto;
  bottom: 10px;
  right: 50%;
  -webkit-transform: translateX(50%);
  -ms-transform: translateX(50%);
  transform: translateX(50%);
}
@media (max-width: 768px) {
  /* 80px and its content aligned to centre. Pushing it off the screen with the
       negative left margin
    */
  #sidebar.active {
    min-width: 80px;
    max-width: 80px;
    text-align: center;
    margin-left: -80px !important;
  }

  /* Reappearing the sidebar on toggle button click */
  #sidebar {
    margin-left: 0;
  }

  /* Toggling the sidebar header content,
       hide the big heading [h3] and showing the small heading [strong] and vice versa
    */
  #sidebar .sidebar-header strong {
    display: none;
  }
  #sidebar.active .sidebar-header h3 {
    display: none;
  }
  #sidebar.active .sidebar-header strong {
    display: block;
  }

  /* Downsize the navigation links font size */
  #sidebar.active ul li a {
    padding: 20px 10px;
    font-size: 0.85em;
  }

  #sidebar.active ul li a i {
    margin-right: 0;
    display: block;
    font-size: 1.8em;
    margin-bottom: 5px;
  }

  /* Adjust the dropdown links padding*/
  #sidebar.active ul ul a {
    padding: 10px !important;
  }

  /* Changing the arrow position to bottom center position,
      translateX(50%) works with right: 50%
      to accurately  center the arrow */
  .dropdown-toggle::after {
    top: auto;
    bottom: 10px;
    right: 50%;
    -webkit-transform: translateX(50%);
    -ms-transform: translateX(50%);
    transform: translateX(50%);
  }
}
</style>
