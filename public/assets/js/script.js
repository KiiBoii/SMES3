// JavaScript code for search bar functionality
const searchInput = document.querySelector('.search-bar input[type="text"]');
const searchButton = document.querySelector('.search-bar button[type="button"]');

searchButton.addEventListener('click', (e) => {
  e.preventDefault();
  const searchTerm = searchInput.value.trim();
  if (searchTerm) {
    // Send search request to server
    fetch('/search', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ searchTerm }),
    })
      .then(response => response.json())
      .then(data => {
        // Display search results
        const resultsContainer = document.querySelector('.search-results');
        resultsContainer.innerHTML = '';
        data.forEach(result => {
          const resultHTML = `
            <div class="search-result">
              <h3>${result.name}</h3>
              <p>${result.description}</p>
            </div>
          `;
          resultsContainer.innerHTML += resultHTML;
        });
      })
      .catch(error => console.error(error));
  }
});
