import { Outlet } from "react-router-dom"
import Navbar from "../components/Navbar"

const DefaultLayout = () => {
  return (
    <div>
        <Navbar/>
        <main className="container mx-auto py-20">
        <Outlet/>
        </main>
    </div>
  )
}

export default DefaultLayout