<div class="content">
        
        <img src="images\bgagent.png" alt="Home Page Image" class="home-image">
    </div>
    
    <style>
        .home-image {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Ensures the image covers the full screen without distortion */
        border-radius: 0; /* Remove rounded corners for full screen */
        filter: blur(5px); /* Optional: Blur effect */
    }
        .content {
        position: absolute;
        top: 0;
        left: 0;
        width: 100vw;
        height: 220vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        font-weight: bold;
    }
    </style>