const API_BASE = "./api/";

function register() {
  const name = document.getElementById("regName").value;
  const email = document.getElementById("regEmail").value;
  const password = document.getElementById("regPassword").value;

  fetch(API_BASE + "register.php", {
    method: "POST",
    body: new URLSearchParams({ name, email, password })
  })
    .then(res => res.text())
    .then(alert);
}

function login() {
  const email = document.getElementById("loginEmail").value;
  const password = document.getElementById("loginPassword").value;

  fetch(API_BASE + "login.php", {
    method: "POST",
    body: new URLSearchParams({ email, password })
  })
    .then(res => res.json())
    .then(data => {
      if (data.success) {
        localStorage.setItem("user", JSON.stringify(data.user));
        window.location.href = "home.html";
      } else {
        alert("Login gagal");
      }
    });
}

function simpanData() {
  const user = JSON.parse(localStorage.getItem("user"));
  const nama = document.getElementById("inputNama").value;
  const umur = document.getElementById("inputUmur").value;
  const tinggi = document.getElementById("inputTinggi").value;
  const foto = document.getElementById("inputFoto").files[0];

  const formData = new FormData();
  formData.append("email", user.email);
  formData.append("nama", nama);
  formData.append("umur", umur);
  formData.append("tinggi", tinggi);
  formData.append("foto", foto);

  fetch(API_BASE + "submit_data.php", {
    method: "POST",
    body: formData
  })
    .then(res => res.text())
    .then(alert);
}

function getData() {
  const user = JSON.parse(localStorage.getItem("user"));
  const filterWaktu = document.getElementById("filterWaktu").value;
  const filterUmur = document.getElementById("filterUmur").value;

  fetch(`${API_BASE}get_data.php?email=${user.email}&role=${user.role}&waktu=${filterWaktu}&umur=${filterUmur}`)
    .then(res => res.json())
    .then(data => {
      const tbody = document.querySelector("#tabelHasil tbody");
      tbody.innerHTML = "";
      data.forEach(item => {
        tbody.innerHTML += \`
          <tr>
            <td>\${item.nama}</td>
            <td>\${item.umur}</td>
            <td>\${item.tinggi}</td>
            <td><img src="\${API_BASE}uploads/\${item.foto}" width="50"></td>
            <td>\${user.role === "admin" ? item.input_by : ""}</td>
          </tr>\`;
      });
    });
}

if (window.location.pathname.includes("home.html")) {
  window.onload = getData;
}