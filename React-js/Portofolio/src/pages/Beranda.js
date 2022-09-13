import { useSearchParams, useNavigate } from "react-router-dom"

function Beranda() {
  const [qParams, setQParams] = useSearchParams()
  const navigator = useNavigate();

  const redirect = (e) => {
    navigator(`/about/${qParams.get('nama')}/${qParams.get('umur')}`)
  }

  let nama = qParams.get("nama")
  return <>
    <h1 className="d-flex justify-content-center"
      onClick={redirect}
    >Selamat datang di website saya!</h1>
    <p>Nama: {qParams.get("nama")}</p>
    <p
      onClick={(e) => setQParams({umur: 19, nama: nama})}
    >Umur: {qParams.get("umur")}</p>


  </>
}

export default Beranda