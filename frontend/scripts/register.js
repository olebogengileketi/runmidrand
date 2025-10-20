
  const termsLink = document.getElementById('termsLink');
  const termsOverlay = document.getElementById('termsOverlay');
  const closeBtn = document.getElementById('closeBtn');
  const printBtn = document.getElementById('printBtn');

  // Show modal on link click
  termsLink.addEventListener('click', function(event) {
    event.preventDefault();
    termsOverlay.style.display = 'block';
    // Optional: trap focus inside modal for accessibility
    termsOverlay.querySelector('#closeBtn').focus();
  });

  // Close modal
  closeBtn.addEventListener('click', function() {
    termsOverlay.style.display = 'none';
    termsLink.focus();
  });

  // Close modal if clicking outside modal content
  termsOverlay.addEventListener('click', function(event) {
    if (event.target === termsOverlay) {
      termsOverlay.style.display = 'none';
      termsLink.focus();
    }
  });

  // Print terms content
  printBtn.addEventListener('click', function() {
    const modalContent = document.getElementById('termsModal').innerHTML;
    const printWindow = window.open('', '', 'width=800,height=600');
    printWindow.document.write(`
      <html>
        <head>
          <title>Print Terms and Conditions</title>
          <style>
            body { font-family: Arial, sans-serif; padding: 20px; }
            h5 { margin-bottom: 20px; }
            h6 { margin-top: 20px; }
          </style>
        </head>
        <body>
          ${modalContent}
        </body>
      </html>
    `);
    printWindow.document.close();
    printWindow.focus();
    printWindow.print();
    printWindow.close();
  });

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
