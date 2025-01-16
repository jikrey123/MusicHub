const cacheName = 'music-cache-v1';
const filesToCache = [
    '/',
    '/style.css',
    '/script.js',
    '/assets/music/song.mp3'
];

self.addEventListener('install', event => {
    event.waitUntil(
        caches.open(cacheName).then(cache => cache.addAll(filesToCache))
    );
});

self.addEventListener('fetch', event => {
    event.respondWith(
        caches.match(event.request).then(response => response || fetch(event.request))
    );
});
