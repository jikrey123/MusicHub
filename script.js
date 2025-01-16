// Elements
const searchForm = document.getElementById('search-form');
const searchBar = document.getElementById('search-bar');
const searchResultsContainer = document.getElementById('search-results-container');

// Simulated song database
const songDatabase = [
    { title: 'Shape of You', artist: 'Ed Sheeran' },
    { title: 'Blinding Lights', artist: 'The Weeknd' },
    { title: 'Levitating', artist: 'Dua Lipa' },
    { title: 'Stay', artist: 'The Kid LAROI & Justin Bieber' },
    { title: 'Good 4 U', artist: 'Olivia Rodrigo' },
    { title: 'Bad Habits', artist: 'Ed Sheeran' },
    { title: 'Peaches', artist: 'Justin Bieber' },
    { title: 'Save Your Tears', artist: 'The Weeknd' }
];

// Function to display search results
function displaySearchResults(results) {
    // Clear previous results
    searchResultsContainer.innerHTML = '';

    if (results.length === 0) {
        searchResultsContainer.innerHTML = '<p>No songs found.</p>';
        return;
    }

    // Display the song results
    const ul = document.createElement('ul');
    results.forEach(song => {
        const li = document.createElement('li');
        li.textContent = `${song.title} by ${song.artist}`;
        ul.appendChild(li);
    });

    searchResultsContainer.appendChild(ul);
}

// Search handler
searchForm.addEventListener('submit', (event) => {
    event.preventDefault();
    
    const query = searchBar.value.trim().toLowerCase();
    
    if (!query) {
        alert('Please enter a song name to search.');
        return;
    }

    // Simulate search by filtering the song database
    const results = songDatabase.filter(song => 
        song.title.toLowerCase().includes(query) || song.artist.toLowerCase().includes(query)
    );

    // Display the search results
    displaySearchResults(results);
});

fetch(`/api/search?q=${query}`)
    .then(response => response.json())
    .then(data => displaySearchResults(data))
    .catch(error => console.error('Error fetching search results:', error));
