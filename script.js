function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";

  

}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();

function openMenu(){
    // console.log('jjjj');
    document.getElementById('mobileMenu').style.left='0';
    document.body.style.overflow="hidden";

}
function closeMenu(){
    // console.log('jjjj');
    document.getElementById('mobileMenu').style.left='-100%';
    document.body.style.overflow="auto";

}



document.getElementById('dynamicServiceForm').addEventListener('submit', function(e) {
    e.preventDefault();

    // Get Values
    const name = document.getElementById('m_name').value;
    const desc = document.getElementById('m_desc').value;
    const imgUrl = document.getElementById('m_img').value;
    
    // Find the main container to append to
    const container = document.querySelector('.container');
    const sectionCount = container.querySelectorAll('.service-section').length;
    
    // Determine if layout should be reversed (even count = standard, odd count = reverse)
    const isReverse = sectionCount % 2 !== 0 ? 'flex-lg-row-reverse' : '';
    const paddingClass = sectionCount % 2 !== 0 ? 'ps-lg-5' : '';

    // Create the New Section HTML
    const newSection = document.createElement('section');
    newSection.className = 'service-section';
    newSection.innerHTML = `
        <div class="row align-items-center ${isReverse}">
            <div class="col-lg-6 ${paddingClass}">
                <div class="service-icon-box">
                    <ion-icon name="color-palette-outline"></ion-icon>
                </div>
                <h2 class="fw-bold mb-4">${name}</h2>
                <p class="text-secondary mb-4">${desc}</p>
                <ul class="list-unstyled feature-list">
                    <li><ion-icon name="checkmark-circle" class="text-primary"></ion-icon> High-Fidelity Solutions</li>
                    <li><ion-icon name="checkmark-circle" class="text-primary"></ion-icon> Strategic Positioning</li>
                    <li><ion-icon name="checkmark-circle" class="text-primary"></ion-icon> Performance Optimization</li>
                </ul>
                <a href="register.php" class="btn btn-warning" style="display: flex;flex-direction: row;width: fit-content;align-items: center;gap: 5px;height: 52px;">
                    <span>Buy now</span>
                    <ion-icon name="arrow-forward-outline"></ion-icon>
                </a>
            </div>
            <div class="col-lg-6 mt-5 mt-lg-0">
                <div class="img-placeholder">
                    <img src="${imgUrl}" alt="${name}">
                </div>
            </div>
        </div>
    `;

    // Append to UI
    container.appendChild(newSection);

    // Close Modal and Clear Form
    const modal = bootstrap.Modal.getInstance(document.getElementById('addMoreModal'));
    modal.hide();
    this.reset();
    
    // Optional: Smooth scroll to new section
    newSection.scrollIntoView({ behavior: 'smooth' });
});