document.addEventListener('DOMContentLoaded', function () {
    console.log('Script is running.');

    var companyContainer = document.getElementById('companyContainer');

    if (!companyContainer) {
        console.error('Error: Company container not found');
        return;
    }

    console.log('Company container found:', companyContainer);

    fetch('/app/views/companies/getCompanies.php')
        .then(response => response.json())
        .then(companiesData => {
            console.log('Raw Companies data:', companiesData);

            // Check if companiesData is an array before reversing it
            if (Array.isArray(companiesData)) {
                console.log('Companies data:', companiesData);

                // Reverse the array and display companies
                companiesData.reverse().forEach(function (data) {
                    createCompanyCard(data, companyContainer);
                });
            } else {
                console.error('Error: Companies data is not an array', companiesData);
            }
        })
        .catch(error => {
            console.error('Error fetching companies:', error);
            alert('An error occurred while fetching companies. Please try again.\nCheck the console for more details.');
        });
});



function createCompanyCard(data, container) {
    var card = document.createElement('div');
    card.dataset.type = 'company'; // Assuming you want to set a specific type for companies
    card.classList.add('card');

    var cardHTML = `
        <div class="company-name"><i class="fas fa-building"></i> ${data.name || 'N/A'}</div>
        <table class="company-details">
            <tr>
                <td><strong>Description:</strong></td>
                <td>${data.description || 'N/A'}</td>
            </tr>
            <tr>
                <td><i class="fas fa-industry"></i></td>
                <td><strong>Industry:</strong></td>
                <td>${data.industry || 'N/A'}</td>
            </tr>
            <tr>
                <td><i class="fas fa-map-marker-alt"></i></td>
                <td><strong>Location:</strong></td>
                <td>${data.location || 'N/A'}</td>
            </tr>
            <tr>
                <td><i class="fas fa-globe"></i></td>
                <td><strong>Website:</strong></td>
                <td>${data.website || 'N/A'}</td>
            </tr>
            <tr>
                <td><i class="fas fa-envelope"></i></td>
                <td><strong>Contact Email:</strong></td>
                <td>${data.contact_email || 'N/A'}</td>
            </tr>
            <tr>
                <td><i class="fas fa-phone"></i></td>
                <td><strong>Contact Phone:</strong></td>
                <td>${data.contact_phone || 'N/A'}</td>
            </tr>
        </table>
    `;

    card.innerHTML = cardHTML;

    if (container) {
        container.insertBefore(card, container.firstChild);
    } else {
        console.error('Error: Company container not found');
    }
}
