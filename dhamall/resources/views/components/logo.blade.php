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
        width: 2.5rem; /* Relative unit */
        height: 2.5rem; /* Relative unit */
        background-color: #b3a31c;
        border-radius: 50%;
        position: relative;
        margin-right: 0.625rem; /* Relative unit */
    }

    /* Earpod Design */
    .earpod-icon::before {
        content: '';
        position: absolute;
        width: 1.25rem; /* Relative unit */
        height: 1.25rem; /* Relative unit */
        background-color: #000000;
        border-radius: 50%;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .earpod-icon::after {
        content: '';
        position: absolute;
        width: 0.625rem; /* Relative unit */
        height: 0.625rem; /* Relative unit */
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
        margin-left: 0.625rem; /* Relative unit */
    }

    .wave {
        width: 0.3125rem; /* Relative unit */
        height: 1.25rem; /* Relative unit */
        background-color: #b3a31c;
        margin: 0 0.1875rem; /* Relative unit */
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
        font-size: 1.5rem; /* Relative unit */
        text-transform: uppercase;
        color: #b3a31c;
    }

    .tagline {
        font-size: 0.75rem; /* Relative unit */
        margin-left: 0.625rem; /* Relative unit */
        font-weight: normal;
        color: white;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .logo {
            flex-direction: column; /* Stack elements vertically */
            align-items: flex-start;
        }

        .earpod-icon {
            width: 2rem; /* Smaller size for small screens */
            height: 2rem; /* Smaller size for small screens */
            margin-right: 0; /* Remove margin for stacked layout */
        }

        .logo-text {
            font-size: 1.25rem; /* Smaller font size for small screens */
        }

        .tagline {
            font-size: 0.625rem; /* Smaller font size for small screens */
            margin-left: 0; /* Remove margin for stacked layout */
        }

        .sound-waves {
            margin-left: 0; /* Remove margin for stacked layout */
        }

        .wave {
            width: 0.25rem; /* Smaller waves for small screens */
            height: 1rem; /* Smaller waves for small screens */
        }
    }
</style>