<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <link rel="stylesheet" href="index.css" />
        <script src="https://kit.fontawesome.com/37aa586021.js" crossorigin="anonymous"></script> <!-- Includes Font Awesome icons using a script tag that loads the Font Awesome library from a CDN -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
            integrity="sha512-q+NB8U3h0QfXwvNTOzgUu5ndUAM5A0lGJKeMFXfPXmG3tjYyFnjF3gXJK5RUhB2OweEBa6H7iBxWsDFRUyBLKg=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer" />
            
        <style>
             /* Global styles */

             * {
                box-sizing: border-box;
            }
            body {
                margin: 0;
                font-family: Arial, sans-serif;
                color: #191716;
            }

            .setss {
                display: flex;
            }

            /* Navigation styles */
            nav {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 2vh 8vh;
                background-color: white;
                border-bottom: 2px solid #cccccc;
            }

            /* Button styles */
            button {
                padding: 8px 16px;
                border: none;
                cursor: pointer;
                transition: background-color 0.3s, color 0.3s;
                animation: fadeIn 0.5s ease-in-out;
            }

            /* Login button styles */
            .login-btn {
                background-color: #ffc700;
                color: #fff;
            }

            .login-btn:hover {
                background-color: #191716;
            }

            .login-btn:active {
                background-color: #000;
            }

            /* register button styles */
            .register-btn {
                background-color: #ffc700;
                color: #fff;
            }

            .register-btn:hover {
                background-color: #191716;
            }

            .register-btn:active {
                background-color: #000;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                }
                to {
                    opacity: 1;
                }
            }

            /* Filter section styles */
            .filter_section {
                display: flex;
                flex-direction: column;
            }

            .filter_set {
                width: 100%;
                max-width: 45vh;
                min-width: 45vh;
                margin-bottom: 5px;
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                border: 2px solid #cccccc;
                padding-left: 2vh;
                gap: 2vh;
            }

            legend {
                color: #ffc700;
                font-weight: bold;
                margin-bottom: 1vh;
            }

            .filter_label {
                font-weight: 600;
            }

            .filter_select {
                width: 25vh;
                height: 4vh;
                padding: 8px;
                margin: 8px 0;
                box-sizing: border-box;
                border: 2px solid #cccccc;
                position: relative;
            }

            .filter_select::after {
                content: "▼";
                font-size: 12px;
                color: #cccccc;
                position: absolute;
                top: 50%;
                right: 8px;
                transform: translateY(-50%);
            }

            .filter_select:focus {
                outline: none;
                border-color: #ffc700;
            }

            .filter_select:focus::after {
                color: #ffc700;
            }

            /*filter button*/
            .filter_submit {
                align-self: flex-end;
                background-color: #ffc700;
                color: #fff;
            }

            .filter_submit:hover {
                background-color: #191716;
            }

            .filter_submit:active {
                background-color: #000;
            }

            /*filter button*/

            .filter_label_con {
                display: flex;
                align-items: center;
            }

            /* Content styles */
            .content {
                display: flex;
                flex-direction: column;
                padding: 2vh 8vh;
            }

            /* Left side styles */
            .left_side {
                display: flex;
                flex-direction: column;
                gap: 2vh;
            }

            /*filter checkbox*/

            /* Checkbox filter styles */
            .checkbox_filter {
                display: flex;
                align-items: center;
            }

            .filter_label {
                font-weight: 600;
                margin-right: 2vh; /* Add margin to separate label from checkbox */
            }

            .checkbox_filter input[type="checkbox"] {
                width: 16px; /* Set a specific width for the checkbox */
                height: 16px; /* Set a specific height for the checkbox */
                margin: 0; /* Remove default margin */
                cursor: pointer;
            }

            /* Style the appearance of the checkbox */
            .checkbox_filter input[type="checkbox"]::before {
                content: "\2713"; /* Unicode character for a checkmark */
                display: inline-block;
                font-size: 16px;
                color: transparent;
                background-color: #fff;
                border: 2px solid #cccccc;
                width: 16px;
                height: 16px;
                line-height: 16px;
                text-align: center;
                transition: background-color 0.3s, color 0.3s;
            }

            /* Style the appearance of the checkbox when checked */
            .checkbox_filter input[type="checkbox"]:checked::before {
                color: #fff;
                background-color: #ffc700;
                border-color: #ffc700;
            }

            /*filter checkbox*/

            /*slider*/
            .rating-slider {
                width: 24.5vh;
                position: relative;
            }

            input[type="range"] {
                -webkit-appearance: none;
                width: 100%;
                height: 2px;
                background: #ccc;
                outline: none;
                -webkit-transition: 0.2s;
                transition: opacity 0.2s;
            }

            input[type="range"]:hover {
                opacity: 1;
            }

            input[type="range"]::-webkit-slider-thumb {
                -webkit-appearance: none;
                appearance: none;
                width: 20px;
                height: 20px;
                border-radius: 50%;
                cursor: pointer;
                background-color: #ffc700;
                margin-top: -2vh; /* center the thumb vertically */
            }

            input[type="range"]::-moz-range-thumb {
                width: 20px;
                height: 20px;
                border-radius: 50%;
                cursor: pointer;
            }

            /*slider*/

            /* suggestion*/

            .sug_set {
                width: 100%;
                max-width: 45vh;
                min-width: 45vh;
                margin-bottom: 20px;
                padding: auto;
                padding-bottom: 3vh;
                display: flex;
                align-items: center;
                justify-content: space-between;
                border: 2px solid #cccccc;
                padding-left: 2vh;
            }

            .sug_element {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .sug_buttons {
                border-radius: 60vh;
                width: 5vh;
                height: 5vh;
            }

            .sug_buttons:hover {
                width: 6vh;
                height: 6vh;
            }

            .sug_buttons:active {
                background-color: #000;
            }

            /* suggestion*/

            /* fav*/
            .fav_set {
                width: 100%;
                max-width: 45vh;
                min-width: 45vh;
                max-height: 15vh;
                min-height: 15vh;
                margin-bottom: 1px;
                padding: auto;
                padding-bottom: 3vh;
                display: flex;
                align-items: center;
                justify-content: space-between;
                border: 2px solid #cccccc;
                padding-left: 2vh;
            }
            /* fav*/

            /*map*/

            .map_set {
                border: 2px solid #cccccc;
                max-height: 76.1vh;
                /*min-height: 76.1vh;*/
                max-width: 140vh;
                width: 140vh;
                min-width: 50vh;
                margin-left: 3vh;
                padding: 0;
            }

            /*map*/

            .circle {
                position: absolute;
                width: 40px;
                height: 40px;
                border-radius: 50%;
                cursor: pointer;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .circle:hover {
                background-color: brighten(10%);
            }

            .icon {
                font-size: 20px;
                color: #191716;
            }

            /*search button*/

            .map_set {
                position: relative;
                overflow: hidden;
            }

            #canvas-container {
                position: relative;
                width: 100%;
                height: 100%;
                overflow: hidden;
                cursor: move;
            }

            .search_map {
                display: flex;
                gap: -3px;
                position: absolute;
                top: 0;
                right: 0;
                z-index: 100;
            }

            .search_button {
                margin-right: 20px;
                background-color: #fff;
                border-width: 2px 2px 2px 0;
                border-style: solid;
                border-color: #cccccc;
            }

            .search_button:active {
                background-color: #fff;
                border-width: 2px 2px 2px 0;
                border-style: solid;
                border-color: #ffc700;
            }

            .search_map_field {
                background-color: #fff;
                border: 2px solid #cccccc;
            }

            .search_map_field::after {
                content: "▼";
                font-size: 12px;
                color: #cccccc;
                position: absolute;
                top: 50%;
                right: 8px;
                transform: translateY(-50%);
            }

            .search_map_field:focus {
                outline: none;
                border-color: #ffc700;
            }

            .search_map_field:focus::after {
                color: #ffc700;
            }

            .add_bonplan {
                position: absolute;
                top: 60vh;
                right: 5vh;
                border-radius: 50%;
                width: 70px;
                height: 70px;
                cursor: pointer;
                transition: background-color 0.3s, color 0.3s;
                animation: fadeIn 0.5s ease-in-out;
            }

            .add_bonplan:hover {
                background-color: #ffc700;
                color: white;
            }

            .add_bonplan:active {
                background-color: #000;
                color: white;
            }

        /* Modal styles */
       
        
       
        .section {
            margin-bottom: 3px; /* Adds a small margin at the bottom of each section */
            padding: 10px; /* Adds padding inside each section */
            background-color: white; /* Sets background color for sections */
        }

        /* Styles for the business header section */
        .business-header {
            text-align: center; /* Aligns content to the center */
        }

        /* Styles for the business image */
        .business-image img {
            width: 100%; /* Makes the image fill its container horizontally */
            height: 250px; /* Sets fixed height for the image */
            object-fit: cover; /* Scales the image while maintaining aspect ratio and cropping excess */
            margin-bottom: 0px; /* Removes bottom margin */
        }

        /* Styles for business information */
        .business--info {
            background-color: white; /* Sets background color for business info */
            display: flex;
            align-items: center;
            margin-bottom: 3px;
            padding: 40px; /* Adds padding inside business info */
        }

        /* Styles for the circle representing business type */
        .business-type-circle {
            width: 80px; /* Sets width of the circle */
            height: 80px; /* Sets height of the circle */
            border-radius: 50%; /* Makes the circle round */
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 20px; /* Adds margin to the right */
        }

        /* Styles for business type icon */
        .business-type-icon {
            color: white; /* Sets color of the icon */
            font-size: 30px; /* Sets font size of the icon */
        }

        /* Styles for business name and type */
        .business-name-type {
            text-align: left; /* Aligns text to the left */
        }

        /* Styles for business name */
        .business-name {
            font-size: 24px; /* Sets font size of the business name */
            font-weight: bold; /* Makes the business name bold */
            margin-bottom: 5px; /* Adds margin at the bottom */
        }

        /* Styles for business type */
        .business-type {
            font-size: 18px; /* Sets font size of the business type */
            color: #666; /* Sets color of the business type */
            margin-bottom: 10px; /* Adds margin at the bottom */
        }

        /* Styles for rating stars */
        .rating {
            unicode-bidi: bidi-override;
            margin-left: 0%;
        }
        .star {
            display: inline-block;
            cursor: pointer;
            font-size: 30px;
            margin-left: -4%;
            color: #E0E0E0; /* Couleur par défaut des étoiles */
        
        }
        .selected {
            color: #FFE070; /* Couleur des étoiles sélectionnées */
        }

        /* Styles for filled star */
        .fas.fa-star {
            color: gold; /* Sets color of filled star to gold */
        }

        /* Styles for empty star */
        .far.fa-star {
            color: #CCCCCC; /* Sets color of empty star to light gray */
        }

        /* Styles for business info section */
        .business-info {
            padding: 20px 40px; /* Adds padding inside business info */
            background-color: white; /* Sets background color for business info */
            display: flex;
            flex-direction: column;
            align-items: start; /* Aligns content to the start */
        }

        /* Styles for information titles */
        .info-title {
            font-weight: bold;
            color: #333;
        }
        
                /* Styles for information details */
                .info-detail {
                    color: #666;
                }

        /* Styles for info header */
        .info-header {
            display: flex;
            align-items: center;
            margin-bottom: 15px; /* Adds margin at the bottom */
        }

        /* Styles for logo container in information section */
        .logo-container-info {
            width: 50px; /* Sets width of the logo container */
            height: 50px; /* Sets height of the logo container */
            border-radius: 50%; /* Makes the logo container round */
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 15px; /* Adds margin to the right */
        }

        /* Styles for icon inside logo container in information section */
        .logo-container-info i {
            color: white; /* Sets color of the icon */
            font-size: 24px; /* Sets font size of the icon */
        }

        /* Styles for info content */
        .info-content {
            margin-left: 40px; /* Adds margin to the left */
        }

        /* Styles for individual information items */
        .info-item {
            display: flex;
            justify-content: space-between; /* Aligns items with space between them */
            align-items: center; /* Aligns items vertically */
            margin-bottom: 15px; /* Adds margin at the bottom */
            margin-left: 0;
        }

        /* Styles for icon and title */
        .info-icon-title {
            display: flex;
            align-items: center; /* Aligns items vertically */
            margin-right: 15px; /* Adds margin to the right */
        }

        /* Styles for icon */
        .info-icon-title i {
            margin-right: 10px; /* Adds margin to the right of the icon */
        }

        /* Styles for icons in info items */
        .info-item i {
            margin-right: 10px; /* Adds margin to the right */
        }

        /* Styles for menu and offers sections */
        .menu,
        .offers {
            padding: 15px 40px; /* Adds padding inside menu and offers sections */
        }

        /* Styles for button container */
        .button-container {
            width: 100%;
            background-color: #fff; /* Set background color to match the container background */
            display: flex;
            justify-content: space-between; /* Distributes space evenly between buttons */
        }

        /* Styles for buttons */
        .button {
            width: 100%; /* Makes buttons fill the container horizontally */
            padding: 10px 20px; /* Adds padding inside buttons */
            color: white; /* Sets text color of buttons */
            border: none; /* Removes button border */
            cursor: pointer; /* Changes cursor to pointer on hover */
            transition: filter 0.3s ease; /* hover effect */
        }

        /* Styles for button hover effect */
        .button:hover {
            filter: brightness(80%); /* Darken the color to 80% of the original on hover */
        }

        /* Styles for menu section */
        .menu-section {
            margin-top: 20px; /* Adds margin at the top */
        }

        /* Styles for menu and offer headers */
        .menu-header,
        .offer-header {
            display: flex;
            align-items: center;
            margin-bottom: 25px; /* Adds margin at the bottom */
        }

        /* Styles for logo containers in menu and offer headers */
        .logo-container,
        .logo-container-offer {
            width: 50px; /* Sets width of the logo container */
            height: 50px; /* Sets height of the logo container */
            border-radius: 50%; /* Makes the logo container round */
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 15px; /* Adds margin to the right */
        }

        /* Styles for icons inside logo containers in menu and offer headers */
        .logo-container i {
            color: white; /* Sets color of the icon */
            font-size: 24px; /* Sets font size of the icon */
        }

        /* Styles for menu and offer headers */
        .menu-header h2,
        .offer-header h2 {
            margin: 0; /* Removes margin */
        }

        /* Styles for menu content */
        .menu-content,
        .offer-detail {
            margin-left: 30px; /* Adds margin to the left */
        }

        /* Styles for food type header */
        .food-type h3 {
            margin-top: 0; /* Removes margin at the top */
            margin-bottom: 15px; /* Adds margin at the bottom */
        }

        /* Styles for individual food items */
        .food-item {
            color: rgba(25, 23, 22, 0.6); /* Sets text color with some transparency */
            display: flex;
            justify-content: space-between; /* Distributes space evenly between elements */
        }

        /* Styles for offer title */
        .offer-title {
            margin: 0 0 10px 0; /* Adds margin */
            color: #333; /* Sets text color */
        }

        /* Styles for offer description */
        .offer-description {
            margin: 0; /* Removes margin */
            color: #666; /* Sets text color */
        }

        /* Style for offer icon to be white */
            .logo-container-offer i {
            color: white; /* Sets color of the offer icon to white */
        }

        /* Styles for focus state of buttons */
        button.informations:focus,
        button:focus {
            background-color: #0056b3; /* Changes background color on focus */
        }
    

  
        .container {
            display: flex;
            flex-direction: column; /* Change this from flex to none */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
            z-index: 999;
            
        }
        .container-menu {
            position: relative; /* Set container position to relative */
            background-color: #CCCCCC; /* Sets background color for the container */
            display: flex;
            flex-direction: column;
            max-height: 90vh; /* Sets maximum height for the container */
            max-width: 500px; /* Sets maximum width for the container */
            overflow: auto; /* Adds scrollbars if content overflows */
        }
        /*hathy l code mtaa diw asna3ha enty ta7et il div mtaa container bithabet w sakerha l div file5er hathhy bich naamelha 5tr kol
        dic mil code mta3ek bich yebda binathom espace ya3ny mouch las9in l b3ath'hom les siv mta3ek donc aamel l code css hatha w taw terke7
        */

        .modal-content {
            background-color: white;
            padding: 10px 150px 30px 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        /*Image du user*/
        .ImageUser{
            width: 40px;
            height: 40px;
            border-radius: 200px;
            cursor: pointer;
            margin-left: 20%;
        }
        /*chat*/
        .chat-btn {
            font-size: 24px;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #ffc700;
            border: none;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center; 
        }

        .chat-btn i {
            transform: translate(-50%, -50%);
            color: white; 
            line-height: 0px; /* Center the icon vertically */
            margin-left: 27px;
        }

        .chat-btn:hover {
            background-color: #ffc700;
        }

        .chat-btn:focus {
            outline: none;
        }
        
        .nav_buttons{
            gap: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* hide elements */
        .hidden {
            display: none;
        }

        /* favoris */
        .business-title {
            display: flex;
            align-items: center;
            
        }

        .fav-heart {
            color: #ff5050;
            margin-left: 5px;
            font-size: 20px;
            cursor: pointer;
            border-radius: 50%;
        }

    </style>
    </head>
    <body>
        <nav>
            <svg onclick="window.location.reload();"
                width="125"
                height="28"
                viewBox="0 0 125 28"
                fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M8.22656 14.6289H3.84375L3.82031 12.0742H7.44141C8.08203 12.0742 8.60156 11.9961 9 11.8398C9.40625 11.6836 9.70312 11.457 9.89062 11.1602C10.0781 10.8555 10.1719 10.4805 10.1719 10.0352C10.1719 9.52734 10.0781 9.11719 9.89062 8.80469C9.70312 8.49219 9.40625 8.26562 9 8.125C8.60156 7.97656 8.08594 7.90234 7.45312 7.90234H5.22656V22H1.40625V4.9375H7.45312C8.47656 4.9375 9.39062 5.03125 10.1953 5.21875C11 5.40625 11.6836 5.69531 12.2461 6.08594C12.8164 6.47656 13.25 6.96484 13.5469 7.55078C13.8438 8.13672 13.9922 8.82812 13.9922 9.625C13.9922 10.3203 13.8359 10.9688 13.5234 11.5703C13.2188 12.1719 12.7266 12.6602 12.0469 13.0352C11.3672 13.4102 10.457 13.6133 9.31641 13.6445L8.22656 14.6289ZM8.07422 22H2.87109L4.25391 19.0469H8.07422C8.66016 19.0469 9.13672 18.9531 9.50391 18.7656C9.87109 18.5781 10.1406 18.3242 10.3125 18.0039C10.4844 17.6836 10.5703 17.3242 10.5703 16.9258C10.5703 16.457 10.4883 16.0508 10.3242 15.707C10.168 15.3633 9.91797 15.0977 9.57422 14.9102C9.23828 14.7227 8.78906 14.6289 8.22656 14.6289H4.80469L4.82812 12.0742H9.01172L9.90234 13.082C10.9883 13.0586 11.8555 13.2344 12.5039 13.6094C13.1602 13.9766 13.6328 14.4609 13.9219 15.0625C14.2109 15.6641 14.3555 16.3008 14.3555 16.9727C14.3555 18.082 14.1172 19.0117 13.6406 19.7617C13.1641 20.5039 12.457 21.0625 11.5195 21.4375C10.5898 21.8125 9.44141 22 8.07422 22ZM48.832 4.9375V22H45.0234L38.5781 10.9727V22H34.7578V4.9375H38.5781L45.0352 15.9648V4.9375H48.832ZM70.3359 16.0703H66.0469V13.1055H70.3359C70.9688 13.1055 71.4766 13 71.8594 12.7891C72.25 12.5781 72.5352 12.2891 72.7148 11.9219C72.9023 11.5469 72.9961 11.125 72.9961 10.6562C72.9961 10.1719 72.9023 9.72266 72.7148 9.30859C72.5352 8.88672 72.25 8.54688 71.8594 8.28906C71.4766 8.03125 70.9688 7.90234 70.3359 7.90234H67.4297V22H63.6094V4.9375H70.3359C71.6953 4.9375 72.8594 5.18359 73.8281 5.67578C74.8047 6.16797 75.5508 6.84375 76.0664 7.70312C76.5898 8.55469 76.8516 9.53125 76.8516 10.6328C76.8516 11.7344 76.5898 12.6914 76.0664 13.5039C75.5508 14.3164 74.8047 14.9492 73.8281 15.4023C72.8594 15.8477 71.6953 16.0703 70.3359 16.0703ZM90.3047 19.0469V22H81.6914V19.0469H90.3047ZM82.9922 4.9375V22H79.1719V4.9375H82.9922ZM99.5039 8.18359L95.0977 22H91.0195L97.3359 4.9375H99.9141L99.5039 8.18359ZM103.16 22L98.7422 8.18359L98.2852 4.9375H100.898L107.238 22H103.16ZM102.973 15.6484V18.6016H94.0781V15.6484H102.973ZM122.73 4.9375V22H118.922L112.477 10.9727V22H108.656V4.9375H112.477L118.934 15.9648V4.9375H122.73Z"
                    fill="#191716" />
                <path
                    d="M24 4C22.1435 4 20.363 4.7375 19.0503 6.05025C17.7375 7.36301 17 9.14348 17 11C17 13.38 18.19 15.47 20 16.74V19C20 19.2652 20.1054 19.5196 20.2929 19.7071C20.4804 19.8946 20.7348 20 21 20H27C27.2652 20 27.5196 19.8946 27.7071 19.7071C27.8946 19.5196 28 19.2652 28 19V16.74C29.81 15.47 31 13.38 31 11C31 9.14348 30.2625 7.36301 28.9497 6.05025C27.637 4.7375 25.8565 4 24 4ZM21 23C21 23.2652 21.1054 23.5196 21.2929 23.7071C21.4804 23.8946 21.7348 24 22 24H26C26.2652 24 26.5196 23.8946 26.7071 23.7071C26.8946 23.5196 27 23.2652 27 23V22H21V23Z"
                    fill="#FFC700" />
            </svg>
            <!--Image User-->

            <div class="nav_buttons">
                <img class="ImageUser" src="{{ $user->avatar_url ? asset('storage/' . $user->avatar_url) : 'https://static.thenounproject.com/png/6224470-200.png'}}" alt="ImageUser" onclick="LoginFunction()">            
                <button class="chat-btn"><i class="fas fa-comment"></i></button>        
            </div>
        </nav>

        <div class="content">
            <h1>Explore, Try, Search For A New <span style="color: #ffc700">Adventure</span></h1>

            <div class="setss">
                <div class="left_side">
                    <form class="filter_section" action="/action_page.php">
                        <fieldset class="filter_set">
                            <legend>Filters</legend>

                            <!--categorie selector-->
                            <div class="filter_label_con" style="gap: 2.2vh">
                                <label class="filter_label" for="city">Categories:</label>
                                <select
                                    class="filter_select"
                                    id="category"
                                    name="category"
                                    required>
                                    <option value="" disabled selected>Select a category</option>
                                </select>
                            </div>

                            <!--cities selector-->
                            <div class="filter_label_con" style="gap: 8vh">
                                <label class="filter_label" for="city">City:</label>
                                <select class="filter_select" id="city" name="city" required>
                                    <option value="" disabled selected>Select a city</option>
                                    <option value="ariana">Ariana</option>
                                    <option value="beja">Béja</option>
                                    <option value="ben-arous">Ben Arous</option>
                                    <option value="bizerte">Bizerte</option>
                                    <option value="gabes">Gabès</option>
                                    <option value="gafsa">Gafsa</option>
                                    <option value="jendouba">Jendouba</option>
                                    <option value="kairouan">Kairouan</option>
                                    <option value="kasserine">Kasserine</option>
                                    <option value="kebili">Kebili</option>
                                    <option value="kef">Le Kef</option>
                                    <option value="mahdia">Mahdia</option>
                                    <option value="manouba">La Manouba</option>
                                    <option value="medenine">Médenine</option>
                                    <option value="monastir">Monastir</option>
                                    <option value="nabeul">Nabeul</option>
                                    <option value="sfax">Sfax</option>
                                    <option value="sidi-bouzid">Sidi Bouzid</option>
                                    <option value="siliana">Siliana</option>
                                    <option value="sousse">Sousse</option>
                                    <option value="tataouine">Tataouine</option>
                                    <option value="tozeur">Tozeur</option>
                                    <option value="tunis">Tunis</option>
                                    <option value="zaghouan">Zaghouan</option>
                                </select>
                            </div>

                            <div class="checkbox_filter" style="gap: 1.8vh">
                                <label class="filter_label" for="Offers">Offers Only:</label>
                                <input type="checkbox" />
                            </div>

                            <div class="checkbox_filter" style="gap: 2.5vh">
                                <label class="filter_label" for="Offers">Open Only:</label>
                                <input type="checkbox" />
                            </div>

                            <div class="checkbox_filter" style="gap: 5.8vh">
                                <label class="filter_label" for="rating">Rating:</label>
                                <div class="rating-slider">
                                    <input
                                        type="range"
                                        min="1"
                                        max="5"
                                        step="1"
                                        value="1"
                                        list="rating-list" />
                                </div>

                                <datalist id="rating-list">
                                    <option value="1"></option>
                                    <option value="2"></option>
                                    <option value="3"></option>
                                    <option value="4"></option>
                                    <option value="5"></option>
                                </datalist>
                            </div>

                            <br />
                            <button class="filter_submit" type="submit">Filter</button>
                        </fieldset>
                    </form>

                    <fieldset class="fav_set">
                        <legend>Favorites</legend>
                    </fieldset>

                    <fieldset class="sug_set">
                        <legend>Suggestions</legend>
                        <div class="sug_element">
                            <p class="filter_label">Deal of the day</p>
                            <button class="sug_buttons" style="background-color: #ffc700">
                                <i class="fa-solid fa-exclamation"></i>
                            </button>
                        </div>
                        <div class="sug_element">
                            <p class="filter_label">Bonplan of the day</p>
                            <button class="sug_buttons"></button>
                        </div>
                    </fieldset>
                </div>

                <fieldset class="map_set">
                    <legend>Map</legend>
                    <div id="canvas-container">
                        <div class="search_map">
                            <input class="search_map_field" type="search" />
                            <button class="search_button">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                            @if(auth()->check() && auth()->user()->isSuperAdmin())
                        <button class="add_bonplan" onclick="openModal()">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    @endif
                        </div>
                        <div id="circles"></div>
                    </div>
                </fieldset>
            </div>
        </div>
    <div id="container" class="container">
        <div class="container-menu"> <!-- Container for the entire content of the webpage -->

            <!-- Business Header Section -->
            @foreach ($bon_plans as $bonplan)
            <div class="business-header">
                <div class="business-image">
                <img src="{{ asset('storage/' . $bonplan->img) }}" alt="Business Image"> <!-- Image representing the business -->
                </div>
                <div class="business--info">
                    <div id="business-type-circle" class="business-type-circle">
                        <i id="business-type-icon" class="business-type-icon fas"></i> <!-- Font Awesome icon representing the type of business -->
                    </div>
                    
                    <div class="business-name-type">
                        <div class="business-title">
                            <div class="business-name">{{ $bonplan->nom_bp }}</div> <!-- Name of the business -->
                            <div id="fav-button" onclick="toggleFavorite()">
                                <i id="fav-icon" class="fa-regular fa-heart fav-heart"></i>
                            </div>
                        </div> 
                        <div class="business-type">{{ $bonplan->categorie_bp }}</div> <!-- Type of the business -->
                        <div class="rating">
                            <input type="hidden" id="rating_value" name="rating_value" value="{{ $bonplan->rate_moy }}">
                            @for ($i = 1; $i <= 5; $i++)
                                <span class="star {{ $i <= $bonplan->rate_moy ? 'selected' : '' }}">&#9733;</span>
                            @endfor
                        </div>
                    </div>
                    
                </div>
            </div> <!-- End of Business Header Section -->
    
            <!-- Information Section -->
            <div class="section business-info">
                <!-- Header for the information section -->
                <div class="info-header">
                    <div id="logo-container-info" class="logo-container-info">
                        <i class="fas fa-info-circle"></i> <!-- Font Awesome icon for information -->
                    </div>
                    <h2 id="title-info">Information</h2> <!-- Title of the information section -->
                </div>
                <!-- Content of the information section -->
                <div class="info-content">
                    <!-- Individual information items -->
                    <div class="info-item">
                        <!-- Icon and title -->
                        <div class="info-icon-title">
                            <i class="fas fa-clock"></i> <!-- Font Awesome icon for clock -->
                            <div class="info-title">Opening Hours</div> <!-- Title for opening hours -->
                        </div>
                        <!-- Information detail -->
                        <div class="info-detail">Monday - Friday: {{ $bonplan->ouverture }}-{{ $bonplan->fermuture }}</div> <!-- Opening hours of the business -->
                    </div>
                   
                    <div class="info-item">
                        <!-- Icon and title -->
                        <div class="info-icon-title">
                            <i class="fas fa-phone"></i> <!-- Font Awesome icon for phone -->
                            <div class="info-title">Phone</div> <!-- Title for phone number -->
                        </div>
                        <!-- Information detail -->
                        <div class="info-detail">{{ $bonplan->tel_bp }}</div> <!-- Phone number of the business -->
                    </div>
                    <div class="info-item">
                        <!-- Icon and title -->
                        <div class="info-icon-title">
                            <i class="fas fa-map-marker-alt"></i> <!-- Font Awesome icon for map marker -->
                            <div class="info-title">Location</div> <!-- Title for business location -->
                        </div>
                        <!-- Information detail -->
                        <div class="info-detail">{{ $bonplan->location }}</div> <!-- Location of the business -->
                    </div>
                    <div class="info-item">
                        <!-- Icon and title -->
                        <div class="info-icon-title">
                            <i class="fas fa-info"></i> <!-- Font Awesome icon for information -->
                            <div class="info-title">Description</div> <!-- Title for business description -->
                        </div>
                        <!-- Information detail -->
                        <div class="info-detail">{{ $bonplan->desc_bp }}</div> <!-- Description of the business -->
                    </div>
                </div>
                @endforeach
            </div> <!-- End of Information Section -->
    
    
            <!-- Menu Section -->
            <div id="section-menu" class="section menu hidden">
                <div class="menu-section">
                    <!-- Header for the menu section -->
                    <div class="menu-header">
                        <div id="logo-container-menu" class="logo-container">
                            <i class="fas fa-utensils"></i> <!-- Font Awesome icon for utensils -->
                        </div>
                        <h2 id="title-menu">Menu</h2> <!-- Title of the menu section -->
                    </div>
                    <!-- Content of the menu section -->
                    <div class="menu-content">
                        @foreach ($menus as $menu)
                        <div class="food-type">
                            <h3>{{ $menu->nom }}</h3> <!-- Title of the menu category -->
                            <!-- Individual food items -->
                            @foreach ($menu->sousMenus as $sousMenu)
                            <div class="food-item">
                                <span class="food-name">{{ $sousMenu->nom }}</span> <!-- Name of the food item -->
                                <span class="food-price">{{ $sousMenu->prix }} dt</span> <!-- Price of the food item -->
                            </div>
                            <!-- Additional food items can be added here -->
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                </div>
            </div> <!-- End of Menu Section -->
    
            <!-- Offers Section -->
            <div id="section-offer" class="section offers hidden">
                <!-- Header for the offers section -->
                <div class="offer-header">
                    <div id="logo-container-offer" class="logo-container-offer">
                        <i class="fas fa-tags"></i> <!-- Font Awesome icon for tags -->
                    </div>
                    <h2 id="title-offer">Offers</h2> <!-- Title of the offers section -->
                </div>
                <!-- Content of the offers section -->
                @foreach ($offres as $offre)
                <div class="offer-detail">
                    <h3 class="offer-title">{{ $offre->title }}</h3> <!-- Title of the special offer -->
                    <p class="offer-description">{{ $offre->content }}</p> <!-- Description of the special offer -->
                </div>
                @endforeach
                
                <!-- Additional offer details can be added here -->
            </div> <!-- End of Offers Section -->
    
            <!-- Button Container -->
            <div class="button-container" id="buttonContainer">
                <button id="close" class="button informations">Close</button> <!-- Button 1 -->
                <button id="button-rating" class="button ratings">View Ratings</button> <!-- Button 2 -->
            </div> <!-- End of Button Container -->
        </div> <!-- End of Container -->
    </div>
<script>
      <!-- JavaScript for scrolling container to the top -->
    
        // JavaScript code goes here
    window.onload = function() {
        var container = document.querySelector('.modal-content');
        container.scrollTop = 0; // Scrolls the container to the top
    };
    
    
    window.onload = function() {
            var container = document.querySelector('.modal-content');
            container.scrollTop = 0; // Scrolls the container to the top
        };
    
    function LoginFunction(){
        window.location.href = "/login";
    }        

    function openModal() {
        document.getElementById("container").style.display = "flex";
    }

    function closeModal() {
        document.getElementById("container").style.display = "none";
        getUser(getUserIdFromUrl()).then(isAdmin => {
        if(isAdmin){
            window.location.href = `../../../../bonplans/c/${getUserIdFromUrl()}`;
        }
        else {
            window.location.href = `../../../../bonplans/sh/${getUserIdFromUrl()}`;
        }
    });
    }

    // Optional: Close modal if user clicks outside the form
    window.onclick = function (event) {
        if (event.target === document.getElementById("container")) {
            closeModal();
        }
    };

    async function getUser(userId){
        const response = await fetch('/api/users');
        const users = await response.json();
        userId = getUserIdFromUrl();
        return (users[userId-1].isAdmin);
    }
    
            
    function getBonPlanIdFromUrl() {
        const path = window.location.pathname;
        const urlParts = path.split('/').filter(part => part !== '');
        // Supprimer 'menus' de URL
        const index = urlParts.indexOf('menus');
        if (index !== -1) {
            urlParts.splice(index, 1); 
        }
        return urlParts.join('/'); 
    }

    function getUserIdFromUrl(){
        const path = window.location.pathname;
        const urlParts = path.split('/').filter(part => part !== '');
        return urlParts[urlParts.length -1];
    }



    //redirection vers la page ratings
    document.getElementById('button-rating').addEventListener('click', function() {
        window.location.href = `${window.location.origin}/${getBonPlanIdFromUrl()}/ratings`;
    });

    document.getElementById('close').addEventListener('click', function() {
        getUser(getUserIdFromUrl()).then(isAdmin => {
            if(isAdmin){
                window.location.href = `../../../../bonplans/c/${getUserIdFromUrl()}`;
            }
            else {
                window.location.href = `../../../../bonplans/sh/${getUserIdFromUrl()}`;
            }
        });
    });

    /* theme */
    // get categorie
    let categorieBp = {!! json_encode($bonplan->categorie_bp) !!};

    function processProperties(category) {
        switch (category) {
            case "clothing_store":
                return {
                        color: "#FF69B4",
                        icon: "fa-tshirt",
                    };
                
                case "fastfood":
                    return{
                        color: "#FFC72C",
                        icon: "fa-burger",
                    };
                case "complex":
                    return {
                        color: "#00a6ed",
                        icon: "fa-building",
                    };
                case "coffee_shop":
                    return {
                        color: "#CD853F",
                        icon: "fa-mug-hot",
                    };
                case "store":
                    return {
                        color: "#48D1CC",
                        icon: "fa-store",
                    };
                case "market":
                    return {
                        color: "#32CD32",
                        icon: "fa-shopping-cart",
                    };
                case "educational":
                    return {
                        color: "#FF5733",
                        icon: "fa-school",
                    };
                case "bar":
                    return {
                        color: "#CC00FF",
                        icon: "fa-glass-martini",
                    };
                case "restaurant":
                    return {
                        color: "#FF2400",
                        icon: "fa-utensils",
                    };
                case "gym":
                    return {
                        color: "#84A9C0",
                        icon: "fa-dumbbell",
                    };
                case "tea_house":
                    return {
                        color: "#00FF7F",
                        icon: "fa-coffee",
                    };
                default:
                    return {
                        color: "red",
                        icon: "fa-question",
                    };
            }
        }
        
    
    let categorieProperties = processProperties(categorieBp);

    // background color theme
    document.getElementById("business-type-circle").style.setProperty('background-color', categorieProperties.color, 'important');

    // categorie icon theme
    document.getElementById("business-type-icon").classList.add(categorieProperties.icon);

    // other icon color themes
    document.getElementById("logo-container-info").style.setProperty('background-color', categorieProperties.color, 'important');
    document.getElementById("logo-container-menu").style.setProperty('background-color', categorieProperties.color, 'important');
    document.getElementById("logo-container-offer").style.setProperty('background-color', categorieProperties.color, 'important');

    document.getElementById("title-info").style.setProperty('color', categorieProperties.color, 'important');
    document.getElementById("title-menu").style.setProperty('color', categorieProperties.color, 'important');
    document.getElementById("title-offer").style.setProperty('color', categorieProperties.color, 'important');

    // buttons
    document.getElementById("close").style.setProperty('background-color', categorieProperties.color, 'important');
    document.getElementById("button-rating").style.setProperty('background-color', categorieProperties.color, 'important');

    const menuCategories = ["fastfood", "coffee_shop", "bar", "restaurant", "tea_house"];
    if (menuCategories.includes(categorieBp)) {
        document.getElementById("section-menu").classList.remove("hidden");
        document.getElementById("section-offer").classList.add("hidden");
    }

    const offerCategories = ["clothing_store", "store", "market", "complex","gym"];
    if (offerCategories.includes(categorieBp)) {
        document.getElementById("section-offer").classList.remove("hidden");
        document.getElementById("section-menu").classList.add("hidden");
    }

    

        </script>
        <script type="module">
        /* favoris */
        async function checkIsFavorited() {
                const userId = {!! json_encode($user->id) !!};
                const bonPlanId = {!! json_encode($bonplan->id) !!};

                const response = await fetch(`/api/bon-plans/favorites/${userId}/${bonPlanId}`)
                const data = await response.json();

                console.log(data);

                updateFavIcon(data.is_favorited);

                return data.is_favorited;
            }

            function updateFavIcon(favoritedState) {
                const favIcon = document.getElementById('fav-icon');

                if (favoritedState) {
                    console.log("favorited");
                    favIcon.classList.remove('fa-regular');
                    favIcon.classList.add('fas');
                } else {
                    console.log("not fav");
                    favIcon.classList.remove('fas');
                    favIcon.classList.add('fa-regular');
                }
            }

            let isFavorited = await checkIsFavorited();

                
            window.toggleFavorite = async function() {
                const userId = {!! json_encode($user->id) !!};
                const bonPlanId = {!! json_encode($bonplan->id) !!};

                // send a post request to /bon-plans/favorites/{userId}/{bonPlanId}/toggle and set isFavorited to false

                const response = await fetch(`/api/bon-plans/favorites/${userId}/${bonPlanId}/toggle`, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                });

                if (!response.ok) {
                    console.error('Error:', response.statusText);
                    return;
                }
                
                isFavorited = !isFavorited;
                updateFavIcon(isFavorited);
            }
        </script>
    </body>
</html>

                                  
    
    
   

    

    

    
   
    
            
   

    