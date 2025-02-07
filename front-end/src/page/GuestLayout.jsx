import { Outlet } from "react-router-dom";
import Navbar from "../components/Navbar";

const GuestLayout = () => {
  return (
    <>
      <div>
        <Navbar />
        <main className="container px-40 mx-auto">
          <Outlet />
        </main>
      </div>
    </>
  );
};

export default GuestLayout;
