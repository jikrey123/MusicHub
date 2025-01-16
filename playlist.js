// Elements
const playlistForm = document.getElementById('playlistForm');
const playlistNameInput = document.getElementById('playlistName');
const songNameInput = document.getElementById('songName');
const songList = document.getElementById('songList');
const addSongButton = document.getElementById('addSongButton');

// Array to store songs
let songs = [];

// Add song to the playlist
addSongButton.addEventListener('click', () => {
    const songName = songNameInput.value.trim();
    if (songName) {
        songs.push(songName);

        // Update the song list display
        const li = document.createElement('li');
        li.textContent = songName;
        songList.appendChild(li);

        // Clear the input field
        songNameInput.value = '';
    } else {
        alert('Please enter a song name.');
    }
});

// Save the playlist
playlistForm.addEventListener('submit', (event) => {
    event.preventDefault();
    const playlistName = playlistNameInput.value.trim();

    if (!playlistName) {
        alert('Please enter a playlist name.');
        return;
    }

    if (songs.length === 0) {
        alert('Please add at least one song to the playlist.');
        return;
    }

    // Save playlist to localStorage (simulate backend storage)
    const playlist = {
        name: playlistName,
        songs: songs,
    };

    localStorage.setItem(playlistName, JSON.stringify(playlist));
    alert(`Playlist "${playlistName}" has been saved!`);

    // Reset the form and song list
    playlistForm.reset();
    songList.innerHTML = '';
    songs = [];
});
