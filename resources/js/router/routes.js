function page(path) {
  return () =>
    import(/* webpackChunkName: '' */ `~/pages/${path}`).then(
      m => m.default || m
    );
}

export default [
  // { path: "/", name: "welcome", component: page("welcome.vue") },

  { path: "/", name: "login", component: page("auth/login.vue") },
  { path: "/register", name: "register", component: page("auth/register.vue") },
  {
    path: "/password/reset",
    name: "password.request",
    component: page("auth/password/email.vue")
  },
  {
    path: "/password/reset/:token",
    name: "password.reset",
    component: page("auth/password/reset.vue")
  },
  {
    path: "/email/verify/:id",
    name: "verification.verify",
    component: page("auth/verification/verify.vue")
  },
  {
    path: "/email/resend",
    name: "verification.resend",
    component: page("auth/verification/resend.vue")
  },

  { path: "/home", name: "home", component: page("home.vue") },
  {
    path: "/settings",
    component: page("settings/index.vue"),
    children: [
      { path: "", redirect: { name: "settings.profile" } },
      {
        path: "profile",
        name: "settings.profile",
        component: page("settings/profile.vue")
      },
      {
        path: "password",
        name: "settings.password",
        component: page("settings/password.vue")
      }
    ]
  },

  {
    path: "/admin",
    component: page("admin/index.vue"),
    children: [
      {
        path: "customer",
        name: "admin.muse.dashboard",
        component: page("admin/muse/index.vue")
      },
      {
        path: "user",
        name: "admin.user",
        component: page("admin/user/index.vue")
      },
      {
        path: "user/log",
        name: "admin.user.log",
        component: page("admin/user/log.vue")
      },
      {
        path: "howtopay",
        name: "admin.pay.howto",
        component: page("admin/pay/howto.vue")
      },
      {
        path: "payment",
        name: "admin.pay",
        component: page("admin/pay/confirm.vue")
      },
      {
        path: "museums/create",
        name: "admin.museums.create",
        component: page("admin/museum/form.vue")
      },
      {
        path: "museums",
        name: "admin.museums",
        component: page("admin/museum/index.vue")
      },
      {
        path: "museums/:id",
        name: "admin.museums.show",
        component: page("admin/museum/show.vue")
      },
      {
        path: "museum/:id/edit",
        name: "admin.museum.edit",
        component: page("admin/museum/form.vue")
      },
      {
        path: "floors",
        name: "admin.floors",
        component: page("admin/floors/index.vue")
      },
      {
        path: "floors/create",
        name: "admin.floors.create",
        component: page("admin/floors/form.vue")
      },
      {
        path: "floors/:id",
        name: "admin.floors.show",
        component: page("admin/floors/show.vue")
      },
      {
        path: "floor/:id/edit",
        name: "admin.floor.edit",
        component: page("admin/floors/form.vue")
      },
      {
        path: "room",
        name: "admin.room",
        component: page("admin/room/index.vue")
      },
      {
        path: "room/create",
        name: "admin.room.create",
        component: page("admin/room/form.vue")
      },
      {
        path: "room/:id",
        name: "admin.room.show",
        component: page("admin/room/show.vue")
      },
      {
        path: "room/:id/edit",
        name: "admin.room.edit",
        component: page("admin/room/form.vue")
      },
      // {
      //   path: "items",
      //   name: "admin.room.show",
      //   component: page("admin/room/show.vue")
      // },
      {
        path: "item",
        name: "admin.item",
        component: page("admin/item/index.vue")
      },
      {
        path: "item/create",
        name: "admin.item.create",
        component: page("admin/item/form.vue")
      },
      {
        path: "item/:id",
        name: "admin.item.show",
        component: page("admin/item/show.vue")
      },

      {
        path: "item/:id/edit",
        name: "admin.item.edit",
        component: page("admin/item/form.vue")
      }
    ]
  },
  {
    path: "/customer",
    component: page("customer/index.vue"),
    children: [
      {
        path: "museums",
        name: "customer.museums",
        component: page("customer/museum/index.vue")
      },
      {
        path: "museums/:id",
        name: "admin.museums.show",
        component: page("admin/museum/show.vue")
      },
      {
        path: "floors",
        name: "admin.floors",
        component: page("admin/floors/index.vue")
      },
      {
        path: "floors/:id",
        name: "admin.floors.show",
        component: page("admin/floors/show.vue")
      },
      {
        path: "room",
        name: "admin.room",
        component: page("admin/room/index.vue")
      },
      {
        path: "room/:id",
        name: "admin.room.show",
        component: page("admin/room/show.vue")
      },
      {
        path: "room/:id",
        name: "admin.room.create",
        component: page("admin/room/form.vue")
      },
      {
        path: "item",
        name: "admin.item",
        component: page("admin/item/index.vue")
      },
      {
        path: "item/:id",
        name: "admin.item.show",
        component: page("admin/item/show.vue")
      },
      {
        path: "item/create",
        name: "admin.item.create",
        component: page("admin/item/form.vue")
      },
      {
        path: "item/:id/edit",
        name: "admin.item.edit",
        component: page("admin/item/form.vue")
      }
    ]
  },
  { path: "/item/:id", name: "item.show", component: page("item/show.vue") },

  { path: "*", component: page("errors/404.vue") }
];
