import { Link } from "react-router-dom";

const Navbar = () => {
  return (
    <div className="w-full bg-white py-10 px-52">
      <div className="flex justify-between gap-5 container">
        <div className="">
          <Link to={`/`} className="text-4xl font-bold text-black">Logo</Link>
        </div>
        <div className="flex justify-between gap-20">
          <Link to={`/select-presdents`} className="font-semibold text-black text-xl">Pilih President</Link>
          <Link to={`/select-DPR`} className="font-semibold text-black text-xl">Pilih DPR</Link>
          <Link to={`/select-DPD`} className="font-semibold text-black text-xl">Pilih DPD</Link>
          <h1 className="font-semibold text-black text-xl">Logout</h1>
        </div>
      </div>
    </div>
  );
};

export default Navbar;
