import { Link } from "react-router-dom";

const SelectPresident = () => {
  return (
    <>
      <h1 className="font-bold text-4xl">President</h1>
      <div className="grid grid-cols-3 gap-10 mt-10">
        {[1,2,3].map((item,index) => (
        <Link to={`#`} key={item} className="bg-white border border-slate-300/[0.5] rounded-xl">
           <div className="rounded-t-xl overflow-hidden">
           <img src={`/assets/presidents/${index + 1}/Presiden.png`} alt="Photo" />
           </div>
           <div className="p-5">
            <h1 className="font-bold text-4xl text-center">{index + 1}</h1>
           </div>
           <div className="flex justify-end p-2 gap-5">
            <img src={`/assets/presidents/${index + 1}/${index + 1}.png`} className="w-10 h-10" alt="Photo" />
            <button className="bg-blue-400 rounded-lg border-none text-white py-2 px-10 hover:bg-blue-700 cursor-pointer">Pilih</button>
           </div>
        </Link>
        ))}
      </div>
    </>
  );
};

export default SelectPresident;
