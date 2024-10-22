// Array of background image URLs
const backgrounds = [
    "url('https://images.unsplash.com/photo-1581447109200-bf2769116351?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTV8fHN0dWR5fGVufDB8fDB8fHww')", 
    "url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqsUSNEFXN0s2Shn8CHZWsNbzqS5-ljKf1AA&s')", 
    "url('https://burst.shopifycdn.com/photos/wrtiting-tools.jpg?width=1000&format=pjpg&exif=0&iptc=0')", 
    "url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqsUSNEFXN0s2Shn8CHZWsNbzqS5-ljKf1AA&s')"
];

let currentIndex = 0;

// Preload the images to avoid blank periods between transitions
function preloadImages() {
    backgrounds.forEach((background) => {
        const img = new Image();
        img.src = background.replace(/url\(['"]?(.*?)['"]?\)/i, '$1');
    });
}

// Function to change the background
function changeBackground() {
    document.body.style.backgroundImage = backgrounds[currentIndex];
    currentIndex = (currentIndex + 1) % backgrounds.length; // Cycle through images
}

// Preload images before starting the interval
preloadImages();

// Change the background every 7 seconds
setInterval(changeBackground, 7000);

// Set the first background on page load
changeBackground();
