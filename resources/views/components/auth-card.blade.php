<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 video-bg">
    <video autoplay muted loop class="background-video">
        <source src="images/loginbg.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="content">
        <div>
            {{ $logo }}
        </div>
        
        <div class="w-full sm:max-w-lg mt-6 px-10 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</div>

<style>
    .video-bg {
        position: relative;
        width: 100%;
        height: 100vh;
        overflow: hidden;
    }

    .background-video {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transform: translate(-50%, -50%);
        z-index: -1;
    }

    .content {
        position: relative;
        z-index: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    /* Adjusted the width and padding */
    .sm\:max-w-lg {
        max-width: 600px; /* Increase width */
    }

    .px-10 {
        padding-left: 2.5rem;
        padding-right: 2.5rem;
    }

    .py-8 {
    padding-top: 1rem;
    padding-bottom: 1rem;
    width: 424px;
    }
</style>
