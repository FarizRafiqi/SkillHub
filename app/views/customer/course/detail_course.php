<html>
<head>
    <style>
        div {
            margin-bottom: 5px 0px 10px;
        }
        .center-video {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
            flex-direction: column;
        }
        
        .center-video video {
            max-width: 100%;
            height: auto;
        }

        .first-div {
            background-color: gray;
            padding: 40px 60px 40px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            
        }
        .lead-title{
            margin: 0px 0px 15px;
            max-width: 60%;
            color: #FFFFFF;
            font-size: 36px;
            text-align: left;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        .lead-desc{
            margin: 0px 0px 10px;
            max-width: 60%;
            color: #FFFFFF;
            font-size: 14px;
            text-align: left;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        .course-desc{
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .course-desc h2 {
            color: #000000;
            font-size: 24px;
            margin-bottom: 10px;
        }
        .course-desc p {
            color: #666666;
            font-size: 16px;
            line-height: 1.5;
        }
        .stats-section {
            background-color: #F2F2F2;
            padding: 40px 20px;
            text-align: center;
        }
        .stats-section h3 {
            color: #000000;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .stats-section p {
            color: #666666;
            font-size: 16px;
            line-height: 1.5;
        }
        .made-by {
            text-align: left;
            color: black;
            font-size: 14px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="first-div">
        <h1 class="lead-title">Automate the Boring Stuff with Python Programming</h1>
        <h4 class="lead-desc">A practical programming course for office workers, academics, and administrators who want to improve their productivity.</h4>
        <p class="stats">Over 1000 students have join the course</p>
        <p class="made-by">Made by <a href="https://www.example.com">Your Name</a></p>
    </div>
    
    <div class="center-video">
        <h2>Course Video</h2>
        <video src="course_video.mp4" controls></video>
    </div>
    
    <div class="course-desc">
        <h2>Description</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut ligula auctor, efficitur tellus at, convallis justo.</p>
    </div>
    
    <div class="stats-section">
        <h3>Course Statistics</h3>
        <p>Discover the power of Python programming and learn practical skills that can boost your productivity in various domains.</p>
        <p>Join thousands of satisfied students who have already benefited from this
    </div>
