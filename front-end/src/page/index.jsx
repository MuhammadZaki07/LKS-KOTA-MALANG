import Header from "../components/Header";
import President from "../components/Quick-Qount/Presdent";
import DPR from "../components/Quick-Qount/DPR";
import DPD from "../components/Quick-Qount/DPD";

const Index = () => {
  return (
    <>
      <Header />
      <div className="py-32">
        <h1 className="text-center font-bold text-5xl">Live Count</h1>
        <President />
        <DPR />
        <DPD />
      </div>
    </>
  );
};

export default Index;
