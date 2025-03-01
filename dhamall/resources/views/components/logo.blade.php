<!-- resources/views/components/logo.blade.php -->
<div class="logo">
    <!-- Earpod Icon -->
    <div class="earpod-icon"></div>

    <!-- Logo Text -->
    <div class="logo-text">
        Dhamall
        <span class="tagline">Sound Redefined</span>
    </div>

    <!-- Sound Waves -->
    <div class="sound-waves">
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
    </div>
</div>

<style>
    /* Logo Container */
    .logo {
        display: flex;
        align-items: center;
        font-family: 'Arial', sans-serif;
        font-weight: bold;
        color: #00BFFF;
    }

    /* Earpod Icon */
    .earpod-icon {
        width: 40px;
        height: 40px;
        background-color:#b3a31c;
        border-radius: 50%;
        position: relative;
        margin-right: 10px;
    }

    /* Earpod Design */
    .earpod-icon::before {
        content: '';
        position: absolute;
        width: 20px;
        height: 20px;
        background-color: #000000;
        border-radius: 50%;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .earpod-icon::after {
        content: '';
        position: absolute;
        width: 10px;
        height: 10px;
        background-color: #FFFFFF;
        border-radius: 50%;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    /* Sound Waves */
    .sound-waves {
        display: flex;
        align-items: center;
        margin-left: 10px;
    }

    .wave {
        width: 5px;
        height: 20px;
        background-color: #b3a31c;
        margin: 0 3px;
        animation: wave 1.2s infinite ease-in-out;
    }

    .wave:nth-child(2) {
        animation-delay: -0.4s;
    }

    .wave:nth-child(3) {
        animation-delay: -0.8s;
    }

    @keyframes wave {
        0%, 40%, 100% {
            transform: scaleY(0.5);
        }
        20% {
            transform: scaleY(1);
        }
    }

    /* Text */
    .logo-text {
        font-size: 24px;
        text-transform: uppercase;
        color: #b3a31c;
    }

    .tagline {
        font-size: 12px;
        margin-left: 10px;
        font-weight: normal;
        color: white;
    }
</style>