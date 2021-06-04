// Event: Add quotation
document.getElementById("quotationForm").addEventListener("submit", (e) => {
  e.preventDefault();

  // get form values
  const name = document.getElementById("name").value;
  const phone = document.getElementById("phone").value;
  const deviceType = document.getElementById("deviceType").value;
  const damageType = document.getElementById("damageType").value;
  const damageInfo = document.getElementById("damageInfo").value;
  const c_id = document.getElementById("c_id").value;

  if (
    name === "" ||
    phone === "" ||
    deviceType === "" ||
    damageType === "" ||
    damageInfo === ""
  ) {
    const div = document.createElement("div");
    div.className = `alert alert-danger mt-5`;
    div.appendChild(document.createTextNode("Please fill all information"));
    const container = document.querySelector("#container");
    const form = document.querySelector("#quotationForm");
    container.insertBefore(div, form);
    // Vanish in 2 seconds
    setTimeout(() => {
      document.querySelector(".alert").remove();
      location.reload();
      return false;
    }, 2000);
  } else {
    // instatiatie book
    localStorage.setItem("name", name);
    localStorage.setItem("phone", phone);
    localStorage.setItem("deviceType", deviceType);
    localStorage.setItem("damageType", damageType);
    localStorage.setItem("damageInfo", damageInfo);

    window.location = `requestQuotationSummary.php`;
  }
});
