const Click = (e) => {
  // var InputUsia = document.getElementById('usia');
  var InputTinggi = document.getElementById('tinggi');
  var InputBerat = document.getElementById('berat');
  var Berat = parseFloat(InputBerat);
  var Tinggi = parseFloat(InputTinggi);
  var Total = Berat / (Tinggi * Tinggi);
  alert("berat = "+ Berat +" tinggi = "+Tinggi + " maka hasilnya "  +Total);
}
function Create(){
  return(
    <>
    <label>Usia Anda ?</label>
    <input type="number" id="usia" placeholder="usia ?"/>
    <label>Tinggi Anda ?</label>
    <input type="number" id="tinggi" placeholder="tinggi ?"/>
    <label>Berat badan anda ?</label>
    <input type="number" id="berat" placeholder="berat ?"/>
    <button id="submit" onClick={Click}>Submit</button>
    </>
  )
}
export default Create;