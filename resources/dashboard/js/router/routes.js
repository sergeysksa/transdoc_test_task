import Dashboard from "@/components/Dashboard";
import taskEditShow from "@/components/tasks/taskEditShow";
// import ThirdParameter from "@/components/ThirdParameter";
// import FourthParameter from "@/components/FourthParameter";
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
    // {
    //     path: '/dashboard/tasks/:id?/:p1',
    //     component: ThirdParameter
    // },
    // {
    //     path: '/dashboard/tasks/:id?/:p1/:p2',
    //     component: FourthParameter
    // },
    {
        path: "/:catchAll(.*)",
        component: NotFound,
    },
]
