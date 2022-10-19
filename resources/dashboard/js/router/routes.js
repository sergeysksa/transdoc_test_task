import Dashboard from "@/components/Dashboard";
import NotFound from "@/components/NotFound";

export default [
    {
        path: '/dashboard',
        component: Dashboard,
        name: 'dashboard'
    },
    {
        path: "/:catchAll(.*)",
        component: NotFound,
    },
]
