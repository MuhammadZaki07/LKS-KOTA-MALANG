import { Link } from "react-router-dom"

const SelectDPD = () => {
    return (
      <>
      <h1 className="font-bold text-4xl">Dewan Perwakilan Daerah</h1>
      <div className="grid grid-cols-3 gap-10 mt-10">
        {[1,2,3].map((item,index) => (
        <Link to={`#`} key={item} className="bg-white border border-slate-300/[0.5] rounded-xl">
           <div className="rounded-t-xl overflow-hidden">
           <img src={`/assets/DPR/${index + 1}/${index + 1}.png`} alt="Photo" />
           </div>
        </Link>
        ))}
      </div>
    </>
    )
  }
  
  export default SelectDPD