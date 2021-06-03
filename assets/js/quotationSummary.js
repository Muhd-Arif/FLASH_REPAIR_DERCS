// get form values
const custName = localStorage.getItem("name");
const phone = localStorage.getItem("phone");
const deviceType = localStorage.getItem("deviceType");
const damageType = localStorage.getItem("damageType");
const damageInfo = localStorage.getItem("damageInfo");

document.getElementById("name").value = custName;
document.getElementById("name").setAttribute("placeholder", custName);

document.getElementById("phone").value = phone;
document.getElementById("phone").setAttribute("placeholder", custName);

document.getElementById("deviceType").value = deviceType;
document.getElementById("deviceType").setAttribute("placeholder", deviceType);

document.getElementById("damageType").value = damageType;
document.getElementById("damageType").setAttribute("placeholder", damageType);

document.getElementById("damageInfo").value = damageInfo;
document.getElementById("damageInfo").setAttribute("placeholder", damageInfo);

document.getElementById("edit").addEventListener("click", () => {
  localStorage.removeItem("name");
  localStorage.removeItem("phone");
  localStorage.removeItem("deviceType");
  localStorage.removeItem("damageType");
  localStorage.removeItem("damageInfo");

  window.location = `requestQuotationForm.php?`;
});
