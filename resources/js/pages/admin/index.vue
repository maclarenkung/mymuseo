<template>
  <div class>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <div id="mySidenav" class="sidenav">
      <h3 style="color: white; margin-top:70px" class="text-center">
       <route-link to="/admin/customer">MINDMUSE</route-link> 
      </h3>

      <h5 style="color:white;" class="text-center">Welcome</h5>

      <div class="manage" style="height:100%">
        <div class="more">
          <i class="fas fa-chevron-right"></i>
        </div>
        <div class="more2">
          <i class="fas fa-chevron-right"></i>
        </div>
        <div class="">
          <h5
            class="w3-bar-item text-center"
            style="color:white!important;"
            v-if="user.role == 1"
          >
            Museum Management
          </h5>
          <ul
            class="nav flex-column nav-pills pt-2"
            id="ab"
            v-if="user.role == 1"
          >
            <li v-for="tab in tabs" :key="tab.route" class="nav-item">
              <router-link :to="{ name: tab.route }" class="nav-link">
                <img :src="'/icon/' + tab.icon" alt width="24" />
                {{ tab.name }}
              </router-link>
            </li>
            <li class="nav-item">
              <router-link to="/admin/user" class="nav-link">
                <img :src="'/icon/user.png'" alt width="24" />
                User
              </router-link>
            </li>
            <li class="nav-item">
              <router-link to="/admin/user/log" class="nav-link">
                <img :src="'/icon/info.png'" alt width="24" />
                User Log
              </router-link>
            </li>
          </ul>

          <ul class="nav flex-column nav-pills" id="ab" v-if="user.role == 2">
            <li>
              <b>Museum</b>
            </li>
            <!-- <li class="active">
              <a
                href="#homeSubmenu"
                data-toggle="collapse"
                aria-expanded="false"
                class="dropdown-toggle"
              >Home</a>
              <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                  <a href="#">Home 1</a>
                </li>
                <li>
                  <a href="#">Home 2</a>
                </li>
                <li>
                  <a href="#">Home 3</a>
                </li>
              </ul>
            </li>-->
            <li class="nav-item">
              <FilterMuseum />
            </li>
            <li class="nav-item">
              <router-link
                :to="{ name: 'admin.muse.dashboard' }"
                class="nav-link"
              >
                <img :src="'/icon/Home.png'" alt width="24" />
                Home
              </router-link>
            </li>
            <li class="nav-item active">
              <router-link to="/admin/museums/1" class="nav-link">
                <img :src="'/icon/stairs.png'" alt width="24" /> Floor
                <span
                  href="#homeSubmenu"
                  data-toggle="collapse"
                  aria-expanded="false"
                  class="dropdown-toggle"
                ></span>
              </router-link>
              <ul
                class="collapse list-unstyled"
                id="homeSubmenu"
                v-for="floor in filterFloor(show)"
                :key="floor.id"
              >
                <li>
                  <router-link
                    :to="{
                      name: 'admin.floors.show',
                      params: { id: floor.id },
                    }"
                  >
                    <p>{{ floor.translation.name }}</p>
                  </router-link>
                </li>
               
              </ul>
            </li>

            

            <li class="nav-item">
              <router-link to="/admin/items" class="nav-link">
                <img :src="'/icon/to-do.png'" alt width="24" />
                Item
              </router-link>
            </li>
            <hr />

            <li>
              <b>User</b>
            </li>
            <li class="nav-item">
              <router-link to="/admin/user" class="nav-link">
                <img :src="'/icon/user.png'" alt width="24" />
                User
              </router-link>
            </li>
            <li class="nav-item">
              <router-link to="/admin/user/log" class="nav-link">
                <img :src="'/icon/info.png'" alt width="24" />
                User Log
              </router-link>
            </li>

            <hr />

            <li>
              <b>Social Management</b>
            </li>
            <li class="nav-item">
              <router-link to="#" class="nav-link">
                <img :src="'/icon/foo.svg'" alt width="24" />
                Footer
              </router-link>
            </li>

          
          </ul>
        </div>
      </div>
      <div class="museum">
        <p></p>
      </div>
      <a href="#about">About</a>
      <a href="#services">Services</a>
      <a href="#clients">Clients</a>
      <a href="#contact">Contact</a>
    </div>

    <div class="content">
      <div class="col-md-12 ">
        <div class="container mt-5">
          <router-view />
        </div>
      </div>
    </div>
    
  </div>

  <!-- </div> -->
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import FilterMuseum from "~/components/FilterMuseum";
export default {
  middleware: "auth",
  components: {
    FilterMuseum,
  },
  computed: {
    tabs() {
      return [
        {
          icon: "exhibition-w.png",
          name: "Museum",
          route: "admin.museums",
        },
      ];
    },
  },
  computed: {
    ...mapGetters({
      show: "floor/items",

      museum_active: "museum/museum_active",
    }),

    id() {
      return parseInt(this.$route.params.id);
    },
  },
  methods: {
    filterFloor(array) {
      console.log(array);
      console.log(this.active);

      return array.filter((el) => el.museum_id == this.museum_active);
    },
    ...mapActions({
      fetch: "floor/fetch",
      // del: "museum/del"
      setMuseumActive: "museum/setMuseumActive",
    }),
  },
  created() {
    this.fetch();
  },
};
</script>

<style lang="scss">
.more {
  font-size: 50px;
  position: absolute;
  right: -53px;
  top: 330px;
  color: #3e7a63;
  transition: 1s;
}
.more2 {
  font-size: 50px;
  position: absolute;
  right: -35px;
  top: 330px;
  color: #3e7a639c;
  transition: 1.5s;
}
.triangle {
  width: 0;
  height: 0;
  border-left: 100px solid transparent;
  border-right: 100px solid transparent;
  border-bottom: 100px solid #aaa;
}

#mySidenav {
  top: 0;
  position: fixed;
  left: -250px;
  transition: 0.5s;
  // padding: 15px;
  width: 100%;
  max-width: 270px;
  text-decoration: none;
  font-size: 20px;
  color: white;
  border-radius: 0 5px 5px 0;

  height: 100%;
  z-index: 1;
  background-color: #3e7a63;
  // padding-top: 20px;
  border-radius: 0px 100px 0px 0px;
}
#mySidenav:hover {
  left: 0;
  .more,
  .more2 {
    transition: 1s;
    opacity: 0;
  }
}
#ab {
  margin-left: 20px;
  margin-right: 20px;
}

.logo-mind {
  display: none;
}
body {
  font-family: "Mitr", sans-serif !important;
}
.a {
  color: #2dcd7a;
}
.b {
  color: #ffc107;
}
.c {
  color: #ed5f5f;
}

.nav-pills .nav-link.active {
  background-color: #ffcc57;
  opacity: 33%;
}
#ab {
  li {
    margin-left: 15px;
    margin-top: 10px;
    a {
      padding-left: 60px;
      margin-left: -16px;
    }
  }
}
#sidebar.active {
  border-radius: 20px;
  min-width: 80px;
  max-width: 80px;
  text-align: center;
}
#createbtn {
  border-radius: 99px;
  border-color: #305a9a;
  height: 40px;
  color: #305a9a;
  font-size: 10px;
}
.content{
  padding-bottom: 40px;
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

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: white;
  display: block;
}

.sidenav a:hover {
  color: white;
}
.w3-sidebar {
  background-color: #3e7a63 !important;
  width: 250px !important;
  color: white !important;
}
</style>
