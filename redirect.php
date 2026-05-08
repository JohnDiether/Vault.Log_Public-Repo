<?php
// YOUR_SESSION_START_HERE

// YOUR_SESSION_TIMEOUT_LOGIC_HERE

if (!isset($_SESSION['YOUR_TARGET_VAR_HERE'])) {
    // YOUR_REDIRECT_LOGIC_HERE
    exit();
}

$target_url = $_SESSION['YOUR_TARGET_VAR_HERE'];

// YOUR_SESSION_CLEANUP_LOGIC_HERE
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" href="YOUR_FAVICON_PATH_HERE" type="image/svg+xml">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>YOUR_REDIRECT_TITLE_HERE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700;900&family=JetBrains+Mono:wght@100;400;700&display=swap');
        
        body { 
            font-family: 'Inter', sans-serif; 
            background: #030303; 
            color: #ffffff; 
            margin: 0; 
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            perspective: 1000px;
        }

        .scanlines {
            position: fixed; inset: 0; z-index: 9999; pointer-events: none;
            background: linear-gradient(rgba(18, 16, 16, 0) 50%, rgba(0, 0, 0, 0.25) 50%), linear-gradient(90deg, rgba(255, 0, 0, 0.06), rgba(0, 255, 0, 0.02), rgba(0, 0, 255, 0.06));
            background-size: 100% 4px, 3px 100%;
            opacity: 0.25;
            mix-blend-mode: overlay;
        }

        @keyframes fadeScaleIn {
            from { opacity: 0; transform: scale(0.92) translateZ(-50px); }
            to { opacity: 1; transform: scale(1) translateZ(0); }
        }
        @keyframes fadeScaleOut {
            from { opacity: 1; transform: scale(1) translateZ(0); filter: blur(0px); }
            to { opacity: 0; transform: scale(1.1) translateZ(100px); filter: blur(10px); }
        }
        @keyframes heartbeat {
            0%, 100% { transform: scale(1); text-shadow: 0 0 10px transparent; filter: drop-shadow(0 0 0 transparent); }
            50% { transform: scale(1.05); text-shadow: 0 0 20px rgba(255,255,255,0.8); filter: drop-shadow(0 0 10px rgba(255,255,255,0.5)); }
        }
        @keyframes panGrid {
            0% { transform: translate3d(0, 0, 0); }
            100% { transform: translate3d(-80px, -80px, 0); }
        }
        @keyframes glitchText {
            0%, 100% { opacity: 1; transform: translateX(0); }
            95% { opacity: 1; transform: translateX(0); }
            96% { opacity: 0.8; transform: translateX(-2px) skewX(10deg); text-shadow: -2px 0 red, 2px 0 blue; }
            98% { opacity: 0.9; transform: translateX(2px) skewX(-10deg); text-shadow: 2px 0 red, -2px 0 blue; }
        }
        @keyframes load { 
            0% { width: 0%; box-shadow: 0 0 0px #fff; } 
            100% { width: 100%; box-shadow: 0 0 20px #fff; } 
        }
        @keyframes fadeRow {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .starfield {
            position: fixed; inset: -50px; z-index: -2;
            background-image: 
                radial-gradient(1px 1px at 20px 30px, rgba(255,255,255,0.8), rgba(0,0,0,0)),
                radial-gradient(1px 1px at 40px 70px, rgba(255,255,255,0.6), rgba(0,0,0,0)),
                radial-gradient(1px 1px at 50px 160px, rgba(255,255,255,0.4), rgba(0,0,0,0)),
                radial-gradient(1.5px 1.5px at 90px 40px, rgba(255,255,255,0.5), rgba(0,0,0,0)),
                radial-gradient(1.5px 1.5px at 130px 80px, rgba(255,255,255,0.3), rgba(0,0,0,0));
            background-repeat: repeat;
            background-size: 200px 200px;
            opacity: 0.8;
            will-change: transform;
            animation: heartbeat 8s infinite alternate cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .glow-core {
            position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);
            width: 80vw; height: 80vw; max-width: 600px;
            background: radial-gradient(circle, rgba(255,255,255,0.04) 0%, transparent 70%);
            z-index: -1;
        }

        .grid-overlay-container {
            position: fixed; inset: -100px; z-index: -3; overflow: hidden;
            perspective: 500px;
        }
        .grid-overlay {
            width: calc(100% + 160px); height: calc(100% + 160px); opacity: 0.05;
            background-image: linear-gradient(#fff 1px, transparent 1px), linear-gradient(90deg, #fff 1px, transparent 1px);
            background-size: 80px 80px;
            animation: panGrid 12s linear infinite;
            will-change: transform;
            transform-origin: top;
        }

        .solid-card { 
            background: #000000; border: 1px solid #1a1a1a; border-radius: 4px; 
            box-shadow: 0 40px 100px rgba(0,0,0,0.8), 0 0 50px rgba(255,255,255,0.02); 
            width: 100%; max-width: 450px;
            padding: 3rem; position: relative;
            transform-style: preserve-3d;
            animation: fadeScaleIn 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        
        .logo-svg { animation: heartbeat 4s infinite cubic-bezier(0.4, 0, 0.2, 1); }

        .status-box {
            background: #050505; border: 1px solid #111; padding: 2.5rem;
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 2rem; position: relative; overflow: hidden;
            transition: border-color 0.4s ease, box-shadow 0.4s ease;
        }
        .status-box:hover { border-color: rgba(255,255,255,0.2); box-shadow: inset 0 0 20px rgba(255,255,255,0.02); }

        .timer-text {
            font-family: 'JetBrains Mono', monospace; font-size: 4rem; font-weight: 100;
            color: #fff; letter-spacing: -4px; z-index: 10;
            animation: heartbeat 1s infinite cubic-bezier(0.16, 1, 0.3, 1);
            will-change: transform, text-shadow;
            transition: transform 0.1s ease-out;
        }

        .loading-bar {
            position: absolute; bottom: 0; left: 0; height: 2px; background: #fff; width: 0%;
            animation: load 5s linear forwards;
            will-change: width, box-shadow;
        }

        .glitch-text {
            font-family: 'JetBrains Mono', monospace; font-size: 10px;
            text-transform: uppercase; letter-spacing: 5px; color: rgba(255,255,255,0.4);
            margin-bottom: 0.5rem; animation: glitchText 4s infinite;
        }
        
        .info-row { opacity: 0; animation: fadeRow 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        .info-row:nth-child(1) { animation-delay: 0.5s; }
        .info-row:nth-child(2) { animation-delay: 0.8s; }
    </style>
</head>
<body>
    <div class="scanlines"></div>
    <div class="grid-overlay-container"><div class="grid-overlay"></div></div>
    <div class="starfield" id="parallax-bg"></div>
    <div class="glow-core" id="parallax-core"></div>

    <div class="solid-card text-center" id="transfer-card">
        <div class="flex justify-center mb-10">
            <div class="flex items-center gap-3">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="logo-svg text-white">
                    <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke-linecap="square"/>
                    <path d="M2 17L12 22L22 17" stroke-linecap="square"/>
                    <path d="M2 12L12 17L22 12" stroke-linecap="square"/>
                    <path d="M12 22V12" stroke-linecap="square"/>
                </svg>
                <h1 class="text-xl font-black tracking-tighter text-transparent bg-clip-text bg-gradient-to-b from-white to-[#444]">YOUR_APP<span class="opacity-20 text-white">.NAME</span></h1>
            </div>
        </div>

        <div class="mb-8">
            <p class="glitch-text">YOUR_PROTOCOL_TEXT_HERE</p>
            <h1 class="text-4xl font-black tracking-tighter uppercase mb-2">YOUR_TRANSFER_TEXT_HERE</h1>
            <p class="font-mono text-[9px] uppercase tracking-[0.3em] text-white/30 animate-pulse">YOUR_STATUS_TEXT_HERE</p>
        </div>

        <div class="status-box">
            <span id="countdown" class="timer-text">5</span>
            <div class="loading-bar"></div>
        </div>

        <div class="space-y-4">
            <div class="flex justify-between items-center px-2 info-row group">
                <span class="font-mono text-[8px] uppercase tracking-widest text-white/30 transition-colors duration-300 group-hover:text-white/60">YOUR_LABEL_1</span>
                <span class="font-mono text-[8px] uppercase tracking-widest text-white/60 transition-colors duration-300 group-hover:text-white">YOUR_VALUE_1</span>
            </div>
            <div class="flex justify-between items-center px-2 border-t border-white/5 pt-4 info-row group">
                <span class="font-mono text-[8px] uppercase tracking-widest text-white/30 transition-colors duration-300 group-hover:text-white/60">YOUR_LABEL_2</span>
                <span class="font-mono text-[8px] uppercase tracking-widest text-white/60 transition-colors duration-300 group-hover:text-white">YOUR_VALUE_2</span>
            </div>
        </div>

        <p class="mt-12 text-[9px] font-mono text-white/20 uppercase tracking-[0.5em] hover:text-white/50 hover:tracking-[0.6em] transition-all duration-500 cursor-default">YOUR_FOOTER_TEXT_HERE</p>
    </div>

    <script>
        const targetUrl = <?php echo json_encode($target_url); ?>;
        // YOUR_REDIRECT_ANIMATION_JS_LOGIC_HERE
        
        let timeLeft = 5;
        const display = document.getElementById('countdown');
        const card = document.getElementById('transfer-card');

        // Mousemove logic retained for 3d effect visual integrity
        document.addEventListener('mousemove', (e) => {
            requestAnimationFrame(() => {
                const x = (e.clientX / window.innerWidth - 0.5) * 20;
                const y = (e.clientY / window.innerHeight - 0.5) * 20;

                const starfield = document.getElementById('parallax-bg');
                const core = document.getElementById('parallax-core');
                
                if(starfield) starfield.style.transform = `translate3d(${x}px, ${y}px, 0)`;
                if(core) core.style.transform = `translate3d(calc(-50% + ${x*1.5}px), ${y*1.5}px, 0) scale(1)`;
                
                if(card && timeLeft > 0) {
                    const tiltX = (e.clientY / window.innerHeight - 0.5) * -4;
                    const tiltY = (e.clientX / window.innerWidth - 0.5) * 4;
                    card.style.transform = `perspective(1000px) rotateX(${tiltX}deg) rotateY(${tiltY}deg) scale3d(1, 1, 1)`;
                }
            });
        });

        document.addEventListener('mouseleave', () => {
            if(card && timeLeft > 0) {
                card.style.transform = `perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1)`;
            }
        });

        function startSequence() {
            if (!targetUrl) {
                display.textContent = "ERR";
                display.style.animation = "glitchText 0.2s infinite";
                display.style.color = "#ff4444";
                return;
            }

            const interval = setInterval(() => {
                timeLeft--;
                if (display) {
                    display.style.transform = 'scale(1.2)';
                    setTimeout(() => {
                        if(timeLeft > 0) display.style.transform = 'scale(1)';
                    }, 150);
                    display.textContent = timeLeft;
                }

                if (timeLeft <= 0) {
                    clearInterval(interval);
                    card.style.animation = 'fadeScaleOut 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards';
                    setTimeout(() => {
                        window.location.href = targetUrl;
                    }, 500);
                }
            }, 1000);
        }

        window.onload = startSequence;
    </script>
</body>
</html>