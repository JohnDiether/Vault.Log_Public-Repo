const CACHE_NAME = 'vault-log-v1';
const ASSETS = [
    './index.php',
    './index.php?action=intro',
    './index.php?action=login',
    './index.php?action=register',
    './index.php?action=recover',
    './index.php?action=delete_account',
    './index.php?action=halted',
    'https://cdn.tailwindcss.com',
    'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js',
    'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js'
];

self.addEventListener('install', (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME).then((cache) => cache.addAll(ASSETS))
    );
});

self.addEventListener('fetch', (event) => {
    event.respondWith(
        fetch(event.request).catch(() => {
            return caches.match(event.request).then((response) => {
                
                if (!response && (event.request.url.endsWith('/') || event.request.url.includes('index.php'))) {
                    return caches.match('./index.php');
                }
                return response;
            });
        })
    );
});

self.addEventListener('fetch', (event) => {
    event.respondWith(
        fetch(event.request).catch(() => {
            return caches.match(event.request).then((response) => {
                
                if (!response && (event.request.url.endsWith('/') || event.request.url.includes('./index.php?action=intro'))) {
                    return caches.match('./index.php?action=intro');
                }
                return response;
            });
        })
    );
});

self.addEventListener('fetch', (event) => {
    event.respondWith(
        fetch(event.request).catch(() => {
            return caches.match(event.request).then((response) => {
                
                if (!response && (event.request.url.endsWith('/') || event.request.url.includes('./index.php?action=login'))) {
                    return caches.match('./index.php?action=login');
                }
                return response;
            });
        })
    );
});

self.addEventListener('fetch', (event) => {
    event.respondWith(
        fetch(event.request).catch(() => {
            return caches.match(event.request).then((response) => {
                
                if (!response && (event.request.url.endsWith('/') || event.request.url.includes('./index.php?action=register'))) {
                    return caches.match('./index.php?action=register');
                }
                return response;
            });
        })
    );
});

self.addEventListener('fetch', (event) => {
    event.respondWith(
        fetch(event.request).catch(() => {
            return caches.match(event.request).then((response) => {
                
                if (!response && (event.request.url.endsWith('/') || event.request.url.includes('./index.php?action=recover'))) {
                    return caches.match('./index.php?action=recover');
                }
                return response;
            });
        })
    );
});

self.addEventListener('fetch', (event) => {
    event.respondWith(
        fetch(event.request).catch(() => {
            return caches.match(event.request).then((response) => {
                
                if (!response && (event.request.url.endsWith('/') || event.request.url.includes('./index.php?action=delete_account'))) {
                    return caches.match('./index.php?action=delete_account');
                }
                return response;
            });
        })
    );
});

self.addEventListener('fetch', (event) => {
    event.respondWith(
        fetch(event.request).catch(() => {
            return caches.match(event.request).then((response) => {
                
                if (!response && (event.request.url.endsWith('/') || event.request.url.includes('./index.php?action=halted'))) {
                    return caches.match('./index.php?action=halted');
                }
                return response;
            });
        })
    );
});