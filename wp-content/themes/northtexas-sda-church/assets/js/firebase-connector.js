/**
 * Firebase Connector Script
 * This replaces the current API connector and connects directly to Firebase
 * It maintains the same functionality but uses Firebase instead of your backend API
 */

// Firebase services will be available globally after Firebase CDN loads

const ntxsdaAssets = window.ntxsdaAssets || {};
const ntxsdaUrls = window.ntxsdaUrls || {};
const fallbackLogo = ntxsdaAssets.logoUrl || 'https://northtexassdachurch.com/images/logo.png';
const fallbackPastor = ntxsdaAssets.pastorUrl || 'https://northtexassdachurch.com/images/pastor1.jpg';
const eventsUrl = ntxsdaUrls.events || 'events.html';
const sermonVideoUrl = ntxsdaUrls.sermonVideo || 'sermon-video.html';

// DOM Elements - Updated to match actual IDs in your HTML
const eventsContainer = document.querySelector('.modern-events-container');
const sermonsContainer = document.querySelector('.featured-sermons-container');
const leadershipContainer = document.querySelector('.leadership-container');

/**
 * Debug logger (same as your current one)
 */
function debugLog(message) {
    console.log(message);

    // Check if the debugLog function from mock-api.js is available
    if (window.debugLog && window.debugLog !== debugLog) {
        window.debugLog(message);
        return;
    }

    // Otherwise, log to the debug console on the page
    const debugLogElement = document.getElementById('debug-log');
    if (debugLogElement) {
        const logEntry = document.createElement('div');
        logEntry.textContent = `${new Date().toLocaleTimeString()}: ${message}`;
        debugLogElement.appendChild(logEntry);
        debugLogElement.scrollTop = debugLogElement.scrollHeight;
    }
}

/**
 * Initialize the Firebase connector
 */
function initFirebaseConnector() {
    debugLog('Initializing Firebase connector...');

    // Load data when the page loads
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => {
            debugLog('DOM loaded, fetching data from Firebase...');
            loadEvents();
            loadSermons();
            // Leadership section kept static - not loading from Firebase
        });
    } else {
        // DOM already loaded
        debugLog('DOM already loaded, fetching data from Firebase...');
        loadEvents();
        loadSermons();
        // Leadership section kept static - not loading from Firebase
    }
}

/**
 * Load and display events from Firebase
 */
async function loadEvents() {
    try {
        debugLog('Fetching events from Firebase...');

        // Check if events container exists
        if (!eventsContainer) {
            debugLog('ERROR: Events container not found in the DOM');
            return;
        }

        // Check if Firebase is ready
        if (typeof firebase === 'undefined' || !firebase.firestore) {
            debugLog('ERROR: Firebase not ready');
            return;
        }

        // Fetch events from Firebase
        const eventsSnapshot = await firebase.firestore()
            .collection('events')
            .where('status', '==', 'upcoming')
            .orderBy('date', 'asc')
            .limit(3)
            .get();

        const events = [];
        eventsSnapshot.forEach(doc => {
            events.push({ id: doc.id, ...doc.data() });
        });

        debugLog(`Events loaded from Firebase: ${events.length} events`);

        // Clear container
        eventsContainer.innerHTML = '';

        // If no events, show a message
        if (events.length === 0) {
            eventsContainer.innerHTML = '<p class="text-center">No upcoming events at this time.</p>';
            return;
        }

        // Create event cards (same HTML structure as before)
        events.forEach(event => {
            const eventCard = createEventCard(event);
            eventsContainer.appendChild(eventCard);
        });

        debugLog('Events displayed successfully');

    } catch (error) {
        debugLog(`ERROR loading events: ${error.message}`);
        console.error('Error loading events:', error);

        if (eventsContainer) {
            eventsContainer.innerHTML = '<p class="text-center text-danger">Error loading events. Please try again later.</p>';
        }
    }
}

/**
 * Load and display sermons from Firebase
 */
async function loadSermons() {
    try {
        debugLog('Fetching sermons from Firebase...');

        // Check if sermons container exists
        if (!sermonsContainer) {
            debugLog('ERROR: Sermons container not found in the DOM');
            return;
        }

        // Check if Firebase is ready
        if (typeof firebase === 'undefined' || !firebase.firestore) {
            debugLog('ERROR: Firebase not ready');
            return;
        }

        // Fetch sermons from Firebase
        const sermonsSnapshot = await firebase.firestore()
            .collection('sermons')
            .orderBy('date', 'desc')
            .limit(3)
            .get();

        const sermons = [];
        sermonsSnapshot.forEach(doc => {
            sermons.push({ id: doc.id, ...doc.data() });
        });

        debugLog(`Sermons loaded from Firebase: ${sermons.length} sermons`);

        // Clear container
        sermonsContainer.innerHTML = '';

        // If no sermons, show a message
        if (sermons.length === 0) {
            sermonsContainer.innerHTML = '<p class="text-center">No sermons available at this time.</p>';
            return;
        }

        // Create sermon cards (same HTML structure as before)
        sermons.forEach(sermon => {
            const sermonCard = createSermonCard(sermon);
            sermonsContainer.appendChild(sermonCard);
        });

        debugLog('Sermons displayed successfully');

    } catch (error) {
        debugLog(`ERROR loading sermons: ${error.message}`);
        console.error('Error loading sermons:', error);

        if (sermonsContainer) {
            sermonsContainer.innerHTML = '<p class="text-center text-danger">Error loading sermons. Please try again later.</p>';
        }
    }
}

/**
 * Load and display leadership team from Firebase
 */
async function loadLeadershipTeam() {
    try {
        debugLog('Fetching leadership team from Firebase...');

        // Check if leadership container exists
        if (!leadershipContainer) {
            debugLog('ERROR: Leadership container not found in the DOM');
            return;
        }

        // Check if Firebase is ready
        if (typeof firebase === 'undefined' || !firebase.firestore) {
            debugLog('ERROR: Firebase not ready');
            return;
        }

        // Fetch leadership from Firebase
        const leadershipSnapshot = await firebase.firestore()
            .collection('leadership')
            .orderBy('displayOrder', 'asc')
            .get();

        const leadership = [];
        leadershipSnapshot.forEach(doc => {
            leadership.push({ id: doc.id, ...doc.data() });
        });

        debugLog(`Leadership loaded from Firebase: ${leadership.length} members`);

        // Clear container
        leadershipContainer.innerHTML = '';

        // If no leadership members, show a message
        if (leadership.length === 0) {
            leadershipContainer.innerHTML = '<p class="text-center">Leadership information will be available soon.</p>';
            return;
        }

        // Create leadership cards (same HTML structure as before)
        leadership.forEach(leader => {
            const leaderCard = createLeaderCard(leader);
            leadershipContainer.appendChild(leaderCard);
        });

        debugLog('Leadership team displayed successfully');

    } catch (error) {
        debugLog(`ERROR loading leadership: ${error.message}`);
        console.error('Error loading leadership:', error);

        if (leadershipContainer) {
            leadershipContainer.innerHTML = '<p class="text-center text-danger">Error loading leadership information. Please try again later.</p>';
        }
    }
}

/**
 * Create event card HTML (matching your modern-event-card structure)
 */
function createEventCard(event) {
    const eventCard = document.createElement('div');
    eventCard.className = 'modern-event-card';

    // Format date - Modern style with day name above, 2-digit date, and month below
    const eventDate = new Date(event.date);
    const dayName = eventDate.toLocaleDateString('en-US', { weekday: 'short' }).toUpperCase();
    const dayNumber = eventDate.getDate().toString().padStart(2, '0');
    const monthName = eventDate.toLocaleDateString('en-US', { month: 'short' }).toUpperCase();
    const formattedTime = `${eventDate.toLocaleDateString('en-US', { month: 'short', day: 'numeric' }).toUpperCase()} @ ${event.startTime} - ${event.endTime}`;

    eventCard.innerHTML = `
        <div class="modern-event-left">
            <div class="modern-event-date">
                <span class="modern-event-day-name">${dayName}</span>
                <span class="modern-event-day">${dayNumber}</span>
                <span class="modern-event-month">${monthName}</span>
            </div>
        </div>
        <div class="modern-event-image">
            <img src="${event.imageUrl || 'https://blog.ronniefloyd.com/wp-content/uploads/Preaching.png'}" alt="${event.title}">
        </div>
        <div class="modern-event-content">
            <h3 class="modern-event-title">${event.title}</h3>
            <p class="modern-event-description">${event.description}</p>
            <div class="modern-event-details">
                <p class="modern-event-time">${formattedTime}</p>
            </div>
        </div>
        <div class="modern-event-action">
            <a href="${eventsUrl}" class="modern-event-button">VIEW DETAILS</a>
        </div>
    `;

    return eventCard;
}

/**
 * Create sermon card HTML (matching your featured-sermon-card structure)
 */
function createSermonCard(sermon) {
    const sermonCard = document.createElement('div');
    sermonCard.className = 'featured-sermon-card';

    // Format date
    const sermonDate = new Date(sermon.date);
    const formattedDate = sermonDate.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    }).toUpperCase();

    sermonCard.innerHTML = `
        <div class="featured-sermon-thumbnail">
            <img src="${sermon.thumbnailUrl || 'https://images.squarespace-cdn.com/content/v1/5843ab37e6f2e16ba63fa175/1489184542191-OK4AAAYZ768ER75BLNN2/Header+-+04+Worship.jpg?format=1500w'}" alt="${sermon.title}">
        </div>
        <div class="featured-sermon-date">${formattedDate}</div>
        <h3 class="featured-sermon-title">${sermon.title}</h3>
        <div class="featured-sermon-author">
            <div class="featured-sermon-author-image">
                <img src="${fallbackLogo}" alt="Pastor">
            </div>
            <div class="featured-sermon-author-name">${sermon.preacher}</div>
        </div>
    `;

    // Add click event to open sermon video page
    sermonCard.addEventListener('click', () => {
        if (sermon.id) {
            window.location.href = `${sermonVideoUrl}?id=${sermon.id}`;
        }
    });

    // Add cursor pointer style
    sermonCard.style.cursor = 'pointer';

    return sermonCard;
}

/**
 * Create leader card HTML (matching your about-container structure)
 */
function createLeaderCard(leader) {
    const leaderContainer = document.createElement('div');
    leaderContainer.className = 'about-container';

    leaderContainer.innerHTML = `
        <div class="leader-card">
            <img src="${leader.imageUrl || fallbackPastor}" alt="${leader.name}" class="leader-image">
            <div class="leader-info">
                <h3 class="leader-name">${leader.name}</h3>
                <p class="leader-role">${leader.position}</p>
            </div>
        </div>
        <div class="about-content">
            <div class="about-title">${leader.name}</div>
            <div class="about-subtitle">${leader.position}</div>
            <div class="about-text">
                <p>${leader.bio || 'Biography coming soon...'}</p>
            </div>
        </div>
    `;

    return leaderContainer;
}

// Initialize when script loads
initFirebaseConnector();

// Export functions for external use
window.firebaseConnector = {
    loadEvents,
    loadSermons,
    // loadLeadershipTeam - disabled, keeping static content
    debugLog
};

// Test function to manually load events (for debugging)
window.testLoadEvents = function() {
    console.log('🧪 Manual test: Loading events...');
    loadEvents();
};

// Test function to check event date formatting
window.testEventDateFormat = function() {
    const testDate = new Date('2024-06-15');
    const dayName = testDate.toLocaleDateString('en-US', { weekday: 'short' }).toUpperCase();
    const dayNumber = testDate.getDate().toString().padStart(2, '0');
    const monthName = testDate.toLocaleDateString('en-US', { month: 'short' }).toUpperCase();

    console.log('🗓️ Event date format test:');
    console.log('Day Name:', dayName);
    console.log('Day Number:', dayNumber);
    console.log('Month Name:', monthName);
    console.log('Structure: Day Name > Day Number > Month Name');
};
