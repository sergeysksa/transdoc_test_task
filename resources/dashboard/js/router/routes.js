import Dashboard from "@/components/Dashboard";
import taskEditShow from "@/components/tasks/taskEditShow";
import NotFound from "@/components/NotFound";

export default [
    {
        path: '/dashboard',
        component: Dashboard,
        name: 'dashboard'
    },
    {
        path: '/dashboard/tasks/:id?',
        component: taskEditShow,
        name: 'taskEdit'
    },
    {
        path: "/:catchAll(.*)",
        component: NotFound,
    },
]
