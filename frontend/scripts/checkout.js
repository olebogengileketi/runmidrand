
//City population
const citiesByProvince = {
  "Eastern Cape": ["Port Elizabeth", "East London", "Mthatha", "Grahamstown", "Butterworth", "Dikeni", "Gqeberha", "Graaff-Reinet", "Kariega", "Komani", "Makhanda", "Qonce", "Zwelitsha"],
  "Free State": ["Bloemfontein", "Welkom", "Kroonstad", "Sasolburg", "Bethlehem", "Jagersfontein", "Odendaalsrus", "Parys", "Phuthaditjhaba", "Virginia"],
  "Gauteng": ["Johannesburg", "Pretoria", "Soweto", "Sandton", "Midrand", "Benoni", "Boksburg", "Brakpan", "Carletonville", "Germiston", "Krugersdorp", "Randburg", "Randfontein", "Roodepoort", "Springs", "Vanderbijlpark", "Vereeniging"],
  "KwaZulu-Natal": ["Durban", "Pietermaritzburg", "Richards Bay", "Newcastle", "Empangeni", "Pinetown", "Ulundi", "Umlazi", "uMnambithi"],
  "Limpopo": ["Polokwane", "Tzaneen", "Thohoyandou", "Mokopane", "Giyani", "Lebowakgomo", "Musina", "Phalaborwa", "Seshego", "Sibasa", "Thabazimbi"],
  "Mpumalanga": ["Nelspruit", "Witbank", "Secunda", "Barberton", "Emalahleni", "Mbombela"],
  "North West": ["Mahikeng", "Klerksdorp", "Rustenburg", "Potchefstroom", "Mmabatho"],
  "Northern Cape": ["Kimberley", "Upington", "Springbok", "De Aar", "Kuruman", "Port Nolloth"],
  "Western Cape": ["Cape Town", "Stellenbosch", "George", "Paarl", "Bellville", "Constantia", "Hopefield", "Oudtshoorn", "Simon’s Town", "Swellendam", "Worcester"]
};

const provinceSelect = document.getElementById("province");
const citySelect = document.getElementById("city");

provinceSelect.addEventListener("change", function() {
  const selectedProvince = this.value;
  citySelect.innerHTML = '<option value="">Select City*</option>';
  if (selectedProvince && citiesByProvince[selectedProvince]) {
    citiesByProvince[selectedProvince].forEach(city => {
      const option = document.createElement("option");
      option.value = city;
      option.textContent = city;
      citySelect.appendChild(option);
    });
  }
});
    const deliverySelect = document.getElementById("deliveryMethod");
  const addressSection = document.getElementById("addressSection");
  const addressInputs = addressSection.querySelectorAll("input, select");

  function toggleAddressFields() {
    const method = deliverySelect.value;

    if (method === "PEP Paxi" || method === "PostNet") {
      // Hide address section
      addressSection.style.display = "none";

      // Remove required attributes
      addressInputs.forEach(input => input.required = false);
    } else {
      // Show address section
      addressSection.style.display = "block";

      // Add back required attributes (for key fields only)
      document.getElementById("street").required = true;
      document.getElementById("province").required = true;
      document.getElementById("zip").required = true;
    }
  }

  // Run on change
  deliverySelect.addEventListener("change", toggleAddressFields);

  // Run on page load (in case default is set)
  toggleAddressFields();
 
function showShipping() {
    // Hide address section
    document.getElementById("address-section").classList.remove("show");

    // Show shipping section
    document.getElementById("shipping-method").classList.add("show");
}

function showPayment() {
    // Hide shipping section
    document.getElementById("shipping-method").classList.remove("show");

    // Show payment section
    document.getElementById("payment-method").classList.add("show");
}
