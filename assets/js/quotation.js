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

  localStorage.setItem("name", name);
  localStorage.setItem("phone", phone);
  localStorage.setItem("deviceType", deviceType);
  localStorage.setItem("damageType", damageType);
  localStorage.setItem("damageInfo", damageInfo);

  window.location = `requestQuotationSummary.php`;
});
