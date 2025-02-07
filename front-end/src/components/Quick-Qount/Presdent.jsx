const Presdent = () => {
  return (
    <div className="py-10">
      <h1 className="font-bold text-black text-3xl text-left"># President</h1>
      <div className="grid grid-cols-3 gap-5 mt-10">
        {[1, 2, 3].map((a, index) => (
          <>
            <div className="bg-white w-full rounded-xl p-5 space-y-3.5 border border-slate-400/[0.5]">
              <h1 className="text-center text-slate-600">
                President Urut {index + 1}
              </h1>
              <h1 className="font-bold text-4xl text-black text-center">
                1.546.230
              </h1>
            </div>
          </>
        ))}
      </div>
    </div>
  );
};

export default Presdent;
