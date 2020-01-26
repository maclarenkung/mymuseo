<template>
  <div class>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <div class="sidenav">
      <h3 style="color: white; margin-top:100px" class="text-center">MINDMUSE</h3>

      <h5 style="color:white;" class="text-center">Welcome</h5>

      <div class="manage">
        <div class="w3-sidebar w3-bar-block">
          <h5
            class="w3-bar-item text-center"
            style="color:white!important;"
            v-if="user.role == 1"
          >Museum Management</h5>
          <ul class="nav flex-column nav-pills pt-2" id="ab" v-if="user.role == 1">
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

            <li class="nav-item">
              <router-link :to="{ name: 'admin.muse.dashboard' }" class="nav-link">
                <img :src="'/icon/Home.png'" alt width="24" />
                Home
              </router-link>
            </li>
            <li class="nav-item">
              <router-link to="/admin/museums/1" class="nav-link">
                <img :src="'/icon/stairs.png'" alt width="24" />
                Floor
              </router-link>
            </li>

            <li class="nav-item">
              <router-link to="/admin/floors/1" class="nav-link">
                <img :src="'/icon/door.png'" alt width="24" />
                Room
              </router-link>
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

            <hr />

            <li>
              <b>Payment</b>
            </li>
            <li class="nav-item">
              <router-link to="/admin/howtopay" class="nav-link">
                <img :src="'/icon/pay.png'" alt width="24" />
                How to pay
              </router-link>
              <router-link to="/admin/payment" class="nav-link">
                <img :src="'/icon/check.png'" alt width="24" />
                Confirm
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
      <div class="col-md-10 offset-2">
        <div class="container mt-5">
          <router-view />
        </div>
      </div>
    </div>
    <!-- <div class="col-md-10 offset-2">
      <div class="card">
        <div class="w3 mt-3">
          <div class="row"></div>

          <div class="col-md-12" style="padding-left: 0px!important;">
            <div class>
              <transition name="fade" mode="out-in">
                <div
                  class="card p-3 ml-1"
                  style="overflow-y:scroll;"
                  :style="`height:750px`"
                >

                  <div></div>
                </div>
              </transition>
            </div>
          </div>
        </div>
      </div>
    </div>-->
  </div>

  <!-- </div> -->
</template>

<script>
export default {
  middleware: "auth",

  computed: {
    tabs() {
      return [
        {
          icon: "exhibition-w.png",
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

/* Toggling the sidebar header content, hide the big heading [h3] and showing the small heading [strong] and vice versa*/
// #sidebar .sidebar-header strong {
//   display: none;
// }
// #sidebar.active .sidebar-header h3 {
//   display: none;
// }
// #sidebar.active .sidebar-header strong {
//   display: block;
// }

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
.sidenav {
  height: 100%;
  width: 250px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #3e7a63;
  overflow-x: hidden;
  padding-top: 20px;
  border-radius: 0px 100px 0px 0px;
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
