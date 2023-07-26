import {createRouter, createWebHistory} from "vue-router";
import ListUsersView from "@/views/users/ListUsersView.vue";
import UserInfoView from "@/views/users/UserInfoView.vue";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: "/",
            name: "home",
            component: ListUsersView,
        },
        {
            path: "/users/:id",
            name: "users.info",
            component: UserInfoView
        }
    ],
});

export default router;
