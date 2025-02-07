import GuestLayout from "./page/GuestLayout";

import { createBrowserRouter } from "react-router-dom";
import DefaultLayout from "./page/DefaultLayout";
import Login from "./page/Auth/login";
import Register from "./page/Auth/Register";
import NotFound from "./NotFound";
import Index from "./page";
import SelectPresident from "./page/Presidents";
import SelectDPR from "./page/DPR";
import SelectDPD from "./page/DPD";

const router = createBrowserRouter([
  {
    path: "/",
    element: <DefaultLayout />,
    children: [
      {
        path: "/",
        element: <Index />,
      },
      {
        path: "/select-presdents",
        element: <SelectPresident />,
      },
      {
        path: "/select-DPR",
        element: <SelectDPR />,
      },
      {
        path: "/select-DPD",
        element: <SelectDPD />,
      },
    ],
  },
  {
    path: "/",
    element: <GuestLayout />,
    children: [
      {
        path: "/login",
        element: <Login />,
      },
      {
        path: "/register",
        element: <Register />,
      },
    ],
  },
  {
    path: "*",
    element: <NotFound />,
  },
]);

export default router;
