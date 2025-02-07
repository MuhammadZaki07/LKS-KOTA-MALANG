const Header = () => {
  return (
    <div className="flex justify-between gap-52 items-center">
      <div className="w-1/2 space-y-5">
        <h1 className="text-5xl font-bold">
          Selamat Datang di Portal Resmi Pemilihan Umum 2025
        </h1>
        <p className="font-normal text-lg">
          Suara Anda, Masa Depan Indonesia Portal ini adalah pusat informasi
          resmi seputar Pemilihan Presiden, Dewan Perwakilan Rakyat <b>DPR</b>,
          dan Dewan Perwakilan Daerah <b>DPD</b> tahun 2025. Temukan semua yang
          Anda butuhkan untuk membuat keputusan yang tepat: mulai dari profil
          para calon, visi dan misi mereka, hingga program kerja yang
          ditawarkan. <b>#Pemilu2025 #SuaraRakyatSuaraBangsa
          #AyoMemilih</b>
        </p>
      </div>
      <div className="mx-auto left-52">
        <img
          src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/46/KPU_Logo.svg/1200px-KPU_Logo.svg.png"
          className="w-80"
          alt="KPU"
        />
      </div>
    </div>
  );
};

export default Header;
