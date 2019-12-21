import store from "~/store";

export default (to, from, next) => {
  if (
    store.getters["auth/user"].role !== 1 ||
    store.getters["auth/user"].role !== 2
  ) {
    next({ name: "home" });
  } else {
    next();
  }
};
