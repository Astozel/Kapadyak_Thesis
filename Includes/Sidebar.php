<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap"
        rel="stylesheet"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="application/javascript">
        $(document).ready(function(){
        $('nav ul li a').click(function(){
            $('ul li a').removeClass("highlight");
            $(this).addClass("highlight");
        })
        });
    </script>
    <title>Sidebar</title>
</head>
<body>
    <nav class="navbar">
        <ul class="navbar-nav">
<!-- Logo -->
            <li class="logo noHover noFilter">
                <a href="#" class="nav-link ">
                <span><img src="../Images/logo.png" class="nav-logo"></span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                    <g class="fa-group">
                    <path
                        fill="currentColor"
                        fill-rule="evenodd" 
                        d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"
                    ></path>
                    </g>
                </svg>
                </a>
            </li>
<!-- Newsfeed -->
            <li class="nav-item">
                <a href="index.php" class="nav-link highlight">
                <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-house-heart" viewBox="0 0 16 16">
                <g class="fa-group">
                    <path
                        fill="currentColor"
                        d="M8 6.982C9.664 5.309 13.825 8.236 8 12 2.175 8.236 6.336 5.309 8 6.982Z"
                        class="fa-secondary"
                    ></path>
                    <path
                        fill="currentColor"
                        d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.707L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.646a.5.5 0 0 0 .708-.707L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"
                        class="fa-primary"
                    ></path>
                </g>
                </svg>
                <span class="link-text">Newsfeed</span>
                </a>
            </li>
<!-- Rental -->
<li class="nav-item">
                <a href="feed_rental.php" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-bicycle" viewBox="0 0 16 16">
                <path />
                <g class="fa-group">
                    <path
                        fill="currentColor"
                        d="M4 4.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1v.5h4.14l.386-1.158A.5.5 0 0 1 11 4h1a.5.5 0 0 1 0 1h-.64l-.311.935.807 1.29a3 3 0 1 1-.848.53l-.508-.812-2.076 3.322A.5.5 0 0 1 8 10.5H5.959a3 3 0 1 1-1.815-3.274L5 5.856V5h-.5a.5.5 0 0 1-.5-.5zm1.5 2.443-.508.814c.5.444.85 1.054.967 1.743h1.139L5.5 6.943zM8 9.057 9.598 6.5H6.402L8 9.057zM4.937 9.5a1.997 1.997 0 0 0-.487-.877l-.548.877h1.035zM3.603 8.092A2 2 0 1 0 4.937 10.5H3a.5.5 0 0 1-.424-.765l1.027-1.643zm7.947.53a2 2 0 1 0 .848-.53l1.026 1.643a.5.5 0 1 1-.848.53L11.55 8.623z"
                        class="fa-primary"
                    ></path>
                </g>
                </svg>
                <span class="link-text">Rental</span>
                </a>
            </li>
<!-- Event -->
<li class="nav-item">
                <a href="feed_events.php" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                <g class="fa-group">
                    <path
                        fill="currentColor"
                        d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"
                        class="fa-secondary"
                    ></path>
                    <path
                        fill="currentColor"
                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"
                        class="fa-primary"
                    ></path>
                </g>
                </svg>
                <span class="link-text">Event</span>
                </a>
            </li>
<!-- Pre-loved -->
            <li class="nav-item">
                <a href="feed_pre.php" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-bag-heart" viewBox="0 0 16 16">
                <path  />
                <g class="fa-group">
                    <path
                        fill="currentColor"
                        fill-rule="evenodd"
                        d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5Zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0ZM14 14V5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1ZM8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"
                        class="fa-primary"
                    ></path>
                </g>
                </svg>
                <span class="link-text">Pre-loved</span>
                </a>
            </li>
<!-- Profile -->
            <li class="nav-item">
                <a href="personal_info_panel.php" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <g class="fa-group">
                    <path
                        fill="currentColor"
                        d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"
                        class="fa-secondary"
                    ></path>
                    <path
                        fill="currentColor"
                        fill-rule="evenodd" 
                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"
                        class="fa-primary"
                    ></path>
                </g>
                </svg>
                <span class="link-text">Profile</span>
                </a>
            </li>
<!-- Message -->
            <li class="nav-item">
                <a href="inbox.php" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
                <g class="fa-group">
                    <path
                        fill="currentColor"
                        d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"
                        class="fa-secondary"
                    ></path>
                    <path
                        fill="currentColor"
                        d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z"
                        class="fa-primary"
                    ></path>
                </g>
                </svg>
                <span class="link-text">Message 
                    <?php 
                    $msg_query = $conn->query("SELECT COUNT(member_id) as unreadMessage FROM message WHERE status='Unread' AND member_id='$id2'");
                    $data=$msg_query->fetch();
                    $unreadCount = $data['unreadMessage'];
                    if($unreadCount > 0){ 
                        ?><span class="link-text-badge"><?php echo $unreadCount; ?> </span> <?php
                    }?>  
                </span>
                </a>
            </li>
<!-- Status -->
            <li class="nav-item">
                <a href="member.php" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
                <g class="fa-group">
                    <path
                        fill="currentColor"
                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"
                        class="fa-primary"
                    ></path>
                    <path
                        fill="currentColor"
                        d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z"
                        class="fa-secondary"
                    ></path>
                </g>
                </svg>
                <span class="link-text">Online</span>
                </a>
            </li>
<!-- Gallery -->
            <li class="nav-item">
                <a href="gallery.php" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
                <path />
                <path />
                <g class="fa-group">
                    <path
                        fill="currentColor"
                        d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"
                        class="fa-secondary"
                    ></path>
                    <path
                        fill="currentColor"
                        d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z"
                        class="fa-primary"
                    ></path>
                </g>
                </svg>
                <span class="link-text">Gallery</span>
                </a>
            </li>
        
                              <!-- Manage Member -->
                              <li class="nav-item">
                <a href="feed_tips.php" class="nav-link ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                <g class="fa-group">
                    <path
                        fill="currentColor"
                        d="M0 1.5V13a1 1 0 0 0 1 1V1.5a.5.5 0 0 1 .5-.5H14a1 1 0 0 0-1-1H1.5A1.5 1.5 0 0 0 0 1.5z"
                        class="fa-secondary"
                    ></path>
                    <path
                        fill="currentColor"
                       d="M3.5 2A1.5 1.5 0 0 0 2 3.5v11A1.5 1.5 0 0 0 3.5 16h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 16 9.586V3.5A1.5 1.5 0 0 0 14.5 2h-11zm6 8.5a1 1 0 0 1 1-1h4.396a.25.25 0 0 1 .177.427l-5.146 5.146a.25.25 0 0 1-.427-.177V10.5z"
                        class="fa-primary"
                    ></path>
                </g>
                </svg>
                <span class="link-text"> Tips & Tricks</span>
                </a>
            </li>
        </ul>
    </nav>
</body>
</html>