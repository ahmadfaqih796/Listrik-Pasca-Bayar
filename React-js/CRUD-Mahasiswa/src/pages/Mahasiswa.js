import React, { useState } from "react";
import { MahasiswaForm, MahasiswaTable } from "../components/Mahasiswa.component";

function Mahasiswa() {
  const [mahasiswa, setMahasiswa] = useState({});
  const data = {
    jurusan: [
      "Informatika",
      "Sistem Informasi",
      "Teknik Komputer",
      "Teknik Elektro",
    ],
    status: ["Aktif", "Tidak aktif"],
  };
  const [mahasiswaList, setMahasiswaList] = useState([]);
  const [isEdit, setIsEdit] = useState(false);
  const [currentId, setCurrentId] = useState(null);

  const handleChange = (e) => {
    const key = e.target.name;
    const value = e.target.value;

    if (key === "nik") {
      const re = /^[0-9\b]+$/;
      if (value === "" || re.test(value)) {
        setMahasiswa((values) => ({ ...values, [key]: value }));
      }
    } else {
      setMahasiswa((values) => ({ ...values, [key]: value }));
    }
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    if (isEdit) {
      let updatedMahasiswa = [...mahasiswaList];
      updatedMahasiswa[currentId] = mahasiswa;
      setMahasiswaList(updatedMahasiswa);

      setIsEdit(false);
      setMahasiswa({});
      setCurrentId(null);
    } else {
      setMahasiswaList((values) => [...values, mahasiswa]);
      setMahasiswa({});
    }
  };

  const getMahasiswa = (mahasiswa, index) => {
    setMahasiswa(mahasiswa);
    setIsEdit(true);
    setCurrentId(index);
  };

  const handleCancelEdit = () => {
    setIsEdit(false);
    setMahasiswa({});
  };

  const handleRemove = (e) => {
    let removedMahasiswa = [...mahasiswaList];
    removedMahasiswa.splice(currentId, 1);
    setMahasiswaList(removedMahasiswa);
    setIsEdit(false);
    setCurrentId(null);
  };

  return (
    <>
      <div className="container mt-5">
        <div className="row">
          <div className="col-md-6">
            <MahasiswaForm
              mahasiswa={mahasiswa}
              handleChange={handleChange}
              handleSubmit={handleSubmit}
              isEdit={isEdit}
              handleCancelEdit={handleCancelEdit}
              handleRemove={handleRemove}
              data={data}
            />
          </div>
          <div className="col-md-6">
            <MahasiswaTable
              mahasiswaList={mahasiswaList}
              getMahasiswa={getMahasiswa}
            />
          </div>
        </div>
      </div>
    </>
  );
}

export default Mahasiswa;
