<?php
    session_start();
    print("<!-- ");
    $id_session = session_id();

    print("Session id : ".$id_session." <br>");

    $expired = false;
    if (array_key_exists("expires",$_SESSION)) {
            if ($_SESSION["expires"]<time()) {
                    $expired = true;
                    print("Session expired <br>");
            }
    }
    
    //if (!array_key_exists("spotify_token",$_SESSION) || $expired) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://accounts.spotify.com/api/token");
            curl_setopt($ch, CURLOPT_POST, true);
            $headers = [
                'Authorization: Basic YmU5YzY0ODIzOWM5NDA1ZThlOWM0YTAyNWYzNDM4Y2I6MmJlYmE2YWE0OTBkNDU1MjhhYTViNTk3MjE5ODc0Mzk=',
            ];
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=authorization_code&code=AQARTgT8-btZXFDpHWO9oYDK62esCZ8kXZveKOCjaRRmzQqGW6dbGoethV8lLJ4XNgbiD7FKDymzbFoqshoY7ZCl9qb9ARk9fGw9ksSaxdTP5beuFb9ftiGYXRFL79b8NzvYf6VWP4D9qdrjNk0DIvIWyxDydYGRO912YP_AdpQpw_tckCw790ChLlH5mwbSJojeayLKsPAU7N0b6-5qGNThShlhGryXSBRhyWwbvT84SZVi&redirect_uri=http%3A%2F%2Fmathis-guerin.great-site.net%2F");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);
            curl_close($ch);
            print("Output ".$output." <br>");
            $data = json_decode($output,true);
            $token = $data['access_token'];
            $expires = $data["expires_in"];
            $now = time();
            $end = $now + $expires;
            $_SESSION["spotify_token"] = $token;
            $_SESSION["expires"] = $end;
    //}
    //else {
    //        $token = $_SESSION["spotify_token"];
    //}
    print("Token value ".$token." <br>");

    // AQDYHso8eZF4kJsi1cQK6tYp73GSrJpFdzl58BMOEfEXepz1Mzdv6snfnEDndcS_Y0Ls3Idlg186TGQfkPlMPkYuGAtbRxF56X7F-Y2PtlElPtwzEZt4FKiOq1-jGcir7NioumcP56T7TNxVF8gD0wKpicSRf_2jHhbcBRVa62Jg9M8kGCm56tPpjNSP4C0wHK3QUGQTiZeVtSTLh-siae1D7QhAWVBMAAuZLaFe
    //$code = "AQARTgT8-btZXFDpHWO9oYDK62esCZ8kXZveKOCjaRRmzQqGW6dbGoethV8lLJ4XNgbiD7FKDymzbFoqshoY7ZCl9qb9ARk9fGw9ksSaxdTP5beuFb9ftiGYXRFL79b8NzvYf6VWP4D9qdrjNk0DIvIWyxDydYGRO912YP_AdpQpw_tckCw790ChLlH5mwbSJojeayLKsPAU7N0b6-5qGNThShlhGryXSBRhyWwbvT84SZVi";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/me/top/tracks");
    $headers = [
        "Authorization: Bearer ".$_SESSION["spotify_token"],
    ];
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    print("Output : ".$output." <br>");
    curl_close($ch);

    $data = json_decode($output);
   
    print_r($data);
    print(" -->");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="./public/js/gear.js" defer></script>
    <script src="./public/js/header.js" defer></script>
    <script src="./public/js/pages.js" defer></script>
    <script src="./public/js/backgrounds.js" defer></script>
    <script src="./public/js/competences.js" defer></script>
    <script src="./public/js/spotify.js" defer></script>


    <link rel="stylesheet" href="./public/css/pages/index.css">
    <link rel="stylesheet" href="./public/css/pages/indexHidden.css">

    <link rel="icon" href="./public/ressources/logo MG.svg" type="image/x-icon">
    <title>Mathis Guerin's projects</title>
</head>

<body class="bg2">
    <header class="bg2">

        <img class="iconAccueil" rel="icon" src="./public/ressources/logo MG.svg" type="image/x-icon">

        <h1>Mathis Guerin's Portfolio</h1>

        <div class="menu-deroulant" title="esc pour fermer">
            <svg width="50" height="50" version="1.1" xmlns="http://www.w3.org/2000/svg" class="btn-drop">
                <rect x="5" y="5" rx="10" ry="10" width="40" height="8" fill="black" stroke-width="3" class="one"/>
                <rect x="5" y="20" rx="10" ry="10" width="40" height="8" fill="black" stroke-width="3" class="two"/>
                <rect x="5" y="35" rx="10" ry="10" width="40" height="8" fill="black" stroke-width="3" class="three"/>
            </svg>
            <ul class="menu-deroulant-content">
				<li>
					<a href="https://github.com/Hubrec" title="lien vers mon profile github">My Github</a>
				</li>
				<li>
                    <a href="mailto:mathisjp.guerin@gmail.com?body=Bonjour%20Mathis,%0A%0A" title="lien pour m'envoyer un mail">Contact Me</a>
				</li>
				<li>
					<a href="https://open.spotify.com/user/91ln68mwno9yew0utduvt2gz3?si=caa44c0e7c60490f" title="lein vers mon compte spotify">My Spotify</a>
				</li>
			</ul>
        </div>

    </header>
        <section class="sectGears">
            <div class="divgears" title="click me">
                <svg class="gear-1 gear" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 460.01 460.01">
                    <path d="M230,37.6C123.74,37.6,37.6,123.74,37.6,230S123.74,422.41,230,422.41,422.41,336.27,422.41,230,336.27,37.6,230,37.6Zm0,336.12A143.72,143.72,0,1,1,373.72,230,143.72,143.72,0,0,1,230,373.72Z" transform="translate(0 0)"/>
                    <polygon points="154.94 76.95 213.97 60.29 181.47 4.17 153.3 12.12 154.94 76.95"/>
                    <polygon points="60.29 246.04 76.95 305.07 12.12 306.71 4.17 278.54 60.29 246.04"/>
                    <polygon points="305 382.81 245.97 399.48 278.47 455.59 306.64 447.64 305 382.81"/>
                    <polygon points="399.48 214.03 382.81 155 447.64 153.36 455.59 181.53 399.48 214.03"/>
                    <polygon points="68.2 174.58 98.16 121.06 36.63 104.99 22.33 130.53 68.2 174.58"/>
                    <polygon points="121.06 361.85 174.58 391.81 130.53 437.67 104.99 423.38 121.06 361.85"/>
                    <polygon points="391.81 285.43 361.85 338.95 423.38 355.01 437.67 329.47 391.81 285.43"/>
                    <polygon points="338.95 98.16 285.43 68.2 329.47 22.33 355.01 36.63 338.95 98.16"/>
                    <polygon points="101 117.71 148.91 79.42 97.97 41.36 75.1 59.63 101 117.71"/>
                    <polygon points="79.42 311.1 117.71 359.01 59.63 384.91 41.36 362.04 79.42 311.1"/>
                    <polygon points="359.01 342.29 311.1 380.59 362.04 418.65 384.91 400.37 359.01 342.29"/>
                    <polygon points="380.59 148.91 342.29 101 400.37 75.1 418.65 97.97 380.59 148.91"/>
                    <polygon points="59.38 241.82 66.18 180.87 3.25 189.98 0 219.07 59.38 241.82"/>
                    <polygon points="180.87 393.82 241.82 400.62 219.07 460.01 189.98 456.76 180.87 393.82"/>
                    <polygon points="400.63 218.18 393.82 279.14 456.76 270.03 460.01 240.94 400.63 218.18"/>
                    <polygon points="279.14 66.18 218.18 59.38 240.94 0 270.03 3.25 279.14 66.18"/>
                    <circle class="cls-1" cx="230" cy="230" r="44.93" transform="translate(-33.87 420.19) rotate(-80.78)"/>
                </svg>
                <h1 class="titleGear1">My Skills</h1>
            </div>

            <div class="divgears" title="click me">
                <svg class="gear-2 gear" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 460.01 460.01">
                    <path d="M230,37.6C123.74,37.6,37.6,123.74,37.6,230S123.74,422.41,230,422.41,422.41,336.27,422.41,230,336.27,37.6,230,37.6Zm0,336.12A143.72,143.72,0,1,1,373.72,230,143.72,143.72,0,0,1,230,373.72Z" transform="translate(0 0)"/>
                    <polygon points="154.94 76.95 213.97 60.29 181.47 4.17 153.3 12.12 154.94 76.95"/>
                    <polygon points="60.29 246.04 76.95 305.07 12.12 306.71 4.17 278.54 60.29 246.04"/>
                    <polygon points="305 382.81 245.97 399.48 278.47 455.59 306.64 447.64 305 382.81"/>
                    <polygon points="399.48 214.03 382.81 155 447.64 153.36 455.59 181.53 399.48 214.03"/>
                    <polygon points="68.2 174.58 98.16 121.06 36.63 104.99 22.33 130.53 68.2 174.58"/>
                    <polygon points="121.06 361.85 174.58 391.81 130.53 437.67 104.99 423.38 121.06 361.85"/>
                    <polygon points="391.81 285.43 361.85 338.95 423.38 355.01 437.67 329.47 391.81 285.43"/>
                    <polygon points="338.95 98.16 285.43 68.2 329.47 22.33 355.01 36.63 338.95 98.16"/>
                    <polygon points="101 117.71 148.91 79.42 97.97 41.36 75.1 59.63 101 117.71"/>
                    <polygon points="79.42 311.1 117.71 359.01 59.63 384.91 41.36 362.04 79.42 311.1"/>
                    <polygon points="359.01 342.29 311.1 380.59 362.04 418.65 384.91 400.37 359.01 342.29"/>
                    <polygon points="380.59 148.91 342.29 101 400.37 75.1 418.65 97.97 380.59 148.91"/>
                    <polygon points="59.38 241.82 66.18 180.87 3.25 189.98 0 219.07 59.38 241.82"/>
                    <polygon points="180.87 393.82 241.82 400.62 219.07 460.01 189.98 456.76 180.87 393.82"/>
                    <polygon points="400.63 218.18 393.82 279.14 456.76 270.03 460.01 240.94 400.63 218.18"/>
                    <polygon points="279.14 66.18 218.18 59.38 240.94 0 270.03 3.25 279.14 66.18"/>
                    <circle class="cls-1" cx="230" cy="230" r="44.93" transform="translate(-33.87 420.19) rotate(-80.78)"/>
                </svg>
                <h1 class="titleGear2">My Projects</h1>
            </div>

            <div class="divgears" title="click me">
                <svg class="gear-3 gear" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 460.01 460.01">
                    <path d="M230,37.6C123.74,37.6,37.6,123.74,37.6,230S123.74,422.41,230,422.41,422.41,336.27,422.41,230,336.27,37.6,230,37.6Zm0,336.12A143.72,143.72,0,1,1,373.72,230,143.72,143.72,0,0,1,230,373.72Z" transform="translate(0 0)"/>
                    <polygon points="154.94 76.95 213.97 60.29 181.47 4.17 153.3 12.12 154.94 76.95"/>
                    <polygon points="60.29 246.04 76.95 305.07 12.12 306.71 4.17 278.54 60.29 246.04"/>
                    <polygon points="305 382.81 245.97 399.48 278.47 455.59 306.64 447.64 305 382.81"/>
                    <polygon points="399.48 214.03 382.81 155 447.64 153.36 455.59 181.53 399.48 214.03"/>
                    <polygon points="68.2 174.58 98.16 121.06 36.63 104.99 22.33 130.53 68.2 174.58"/>
                    <polygon points="121.06 361.85 174.58 391.81 130.53 437.67 104.99 423.38 121.06 361.85"/>
                    <polygon points="391.81 285.43 361.85 338.95 423.38 355.01 437.67 329.47 391.81 285.43"/>
                    <polygon points="338.95 98.16 285.43 68.2 329.47 22.33 355.01 36.63 338.95 98.16"/>
                    <polygon points="101 117.71 148.91 79.42 97.97 41.36 75.1 59.63 101 117.71"/>
                    <polygon points="79.42 311.1 117.71 359.01 59.63 384.91 41.36 362.04 79.42 311.1"/>
                    <polygon points="359.01 342.29 311.1 380.59 362.04 418.65 384.91 400.37 359.01 342.29"/>
                    <polygon points="380.59 148.91 342.29 101 400.37 75.1 418.65 97.97 380.59 148.91"/>
                    <polygon points="59.38 241.82 66.18 180.87 3.25 189.98 0 219.07 59.38 241.82"/>
                    <polygon points="180.87 393.82 241.82 400.62 219.07 460.01 189.98 456.76 180.87 393.82"/>
                    <polygon points="400.63 218.18 393.82 279.14 456.76 270.03 460.01 240.94 400.63 218.18"/>
                    <polygon points="279.14 66.18 218.18 59.38 240.94 0 270.03 3.25 279.14 66.18"/>
                    <circle class="cls-1" cx="230" cy="230" r="44.93" transform="translate(-33.87 420.19) rotate(-80.78)"/>
                </svg>
                <h1 class="titleGear3">Spotify me</h1>
            </div>

            <div class="divgears" title="click me">
                <svg class="gear-4 gear" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 460.01 460.01">
                    <path d="M230,37.6C123.74,37.6,37.6,123.74,37.6,230S123.74,422.41,230,422.41,422.41,336.27,422.41,230,336.27,37.6,230,37.6Zm0,336.12A143.72,143.72,0,1,1,373.72,230,143.72,143.72,0,0,1,230,373.72Z" transform="translate(0 0)"/>
                    <polygon points="154.94 76.95 213.97 60.29 181.47 4.17 153.3 12.12 154.94 76.95"/>
                    <polygon points="60.29 246.04 76.95 305.07 12.12 306.71 4.17 278.54 60.29 246.04"/>
                    <polygon points="305 382.81 245.97 399.48 278.47 455.59 306.64 447.64 305 382.81"/>
                    <polygon points="399.48 214.03 382.81 155 447.64 153.36 455.59 181.53 399.48 214.03"/>
                    <polygon points="68.2 174.58 98.16 121.06 36.63 104.99 22.33 130.53 68.2 174.58"/>
                    <polygon points="121.06 361.85 174.58 391.81 130.53 437.67 104.99 423.38 121.06 361.85"/>
                    <polygon points="391.81 285.43 361.85 338.95 423.38 355.01 437.67 329.47 391.81 285.43"/>
                    <polygon points="338.95 98.16 285.43 68.2 329.47 22.33 355.01 36.63 338.95 98.16"/>
                    <polygon points="101 117.71 148.91 79.42 97.97 41.36 75.1 59.63 101 117.71"/>
                    <polygon points="79.42 311.1 117.71 359.01 59.63 384.91 41.36 362.04 79.42 311.1"/>
                    <polygon points="359.01 342.29 311.1 380.59 362.04 418.65 384.91 400.37 359.01 342.29"/>
                    <polygon points="380.59 148.91 342.29 101 400.37 75.1 418.65 97.97 380.59 148.91"/>
                    <polygon points="59.38 241.82 66.18 180.87 3.25 189.98 0 219.07 59.38 241.82"/>
                    <polygon points="180.87 393.82 241.82 400.62 219.07 460.01 189.98 456.76 180.87 393.82"/>
                    <polygon points="400.63 218.18 393.82 279.14 456.76 270.03 460.01 240.94 400.63 218.18"/>
                    <polygon points="279.14 66.18 218.18 59.38 240.94 0 270.03 3.25 279.14 66.18"/>
                    <circle class="cls-1" cx="230" cy="230" r="44.93" transform="translate(-33.87 420.19) rotate(-80.78)"/>
                </svg>
                <h1 class="titleGear4">My contacts</h1>
            </div>

        </section>

        <section class="hiddenPages">

            <section class="myCompetences page1">
                <ul class="nav">
                    <li class="grow" title="grow the page"></li>
                    <li class="closer" title="shrink the page"></li>
                </ul>
                
                <div class="separator"></div>

                <div class="content">
                    
                    <ul>
                        <li class="selected">About me</li>
                        <li>My skills</li>
                        <li>My CV</li>
                    </ul>

                    <section class="about selected">
                        <span>
                            <p>Hello, I'm Mathis Guerin !</p>
                            <p>I am a computer science student at IUT Lyon 1 in the second year. I love discovering new things and I work out of passion.
                                Above all, I like to code and develop in many different languages. </p>
                            <p>
                                When I am involved in a project that interests me, it can happen that I no longer see myself for a whole week.</p>
                            </p>
                        </span>
                        <div class="img">
                            <img src="public/ressources/about_me.svg" alt="image svg">
                        </div>
                    </section>

                    <section class="skills">
                        <div class="languages">
                            <a href="https://fr.wikipedia.org/wiki/HTML5"><img src="https://img.shields.io/badge/html5%20-%23E34F26.svg?&amp;style=for-the-badge&amp;logo=html5&amp;logoColor=white"></a>
                            <a href="https://fr.wikipedia.org/wiki/Feuilles_de_style_en_cascade"><img src="https://img.shields.io/badge/css3%20-%231572B6.svg?&amp;style=for-the-badge&amp;logo=css3&amp;logoColor=white"></a>
                            <a href="https://sass-lang.com/"><img src="https://img.shields.io/badge/Sass-%23CC6699.svg?&amp;style=for-the-badge&amp;logo=sass&amp;logoColor=white"></a>
                            <a href="https://www.python.org/"><img src="https://img.shields.io/badge/python%20-%2314354C.svg?&amp;style=for-the-badge&amp;logo=python&amp;logoColor=white"></a>
                            <a href="https://fr.wikipedia.org/wiki/C_(langage)"><img src="https://img.shields.io/badge/language c%20-%2300599C.svg?&amp;style=for-the-badge&amp;logo=c&amp;logoColor=white"></a>
                            <a href="https://www.php.net/manual/fr/intro-whatis.php"><img src="https://img.shields.io/badge/php-%23777BB4.svg?&amp;style=for-the-badge&amp;logo=php&amp;logoColor=white"></a>
                            <a href="https://fr.wikipedia.org/wiki/Java_(langage)"><img src="https://img.shields.io/badge/java-%23ED8B00.svg?&amp;style=for-the-badge&amp;logo=java&amp;logoColor=white"></a>
                            <a href="https://fr.wikipedia.org/wiki/C%2B%2B#:~:text=C%2B%2B%20est%20un%20langage,objet%20et%20la%20programmation%20g%C3%A9n%C3%A9rique."><img src="https://img.shields.io/badge/c%2B%2B-%2300599C.svg?&amp;style=for-the-badge&amp;logo=c%2B%2B&amp;logoColor=white"></a>
                            <a href="https://fr.wikipedia.org/wiki/Markdown"><img class="dark" src="https://img.shields.io/badge/Markdown-%23000000.svg?&amp;style=for-the-badge&amp;logo=markdown&amp;logoColor=white"></a>
                        </div>

                        <div class="softwares">
                            <a href="https://fr.wikipedia.org/wiki/XAMPP"><img src="https://img.shields.io/badge/XAMPP%20-%23ED8B00.svg?&amp;style=for-the-badge&amp;logo=XAMPP&amp;logoColor=white"></a>
                            <a href="https://fr.wikipedia.org/wiki/Wireshark"><img src="https://img.shields.io/badge/Wireshark-%231572B6.svg?&amp;style=for-the-badge&amp;logo=Wireshark&amp;logoColor=white"></a>
                            <a href="https://fr.wikipedia.org/wiki/Visual_Studio_Code"><img src="https://img.shields.io/badge/Visual%20Studio%20Code-%23007ACC.svg?&amp;style=for-the-badge&amp;logo=visual-studio-code&amp;logoColor=white"></a>
                            <a href="https://visualstudio.microsoft.com/fr/"><img src="https://img.shields.io/badge/Visual%20Studio-%235C2D91.svg?&amp;style=for-the-badge&amp;logo=visual-studio&amp;logoColor=white"></a>
                            <a href="https://fr.wikipedia.org/wiki/MySQL"><img src="https://img.shields.io/badge/MySQL-%2300f.svg?&amp;style=for-the-badge&amp;logo=mysql&amp;logoColor=white"></a>
                            <a href="https://fr.wikipedia.org/wiki/Discord_(logiciel)"><img src="https://img.shields.io/badge/Discord-%237289DA.svg?&amp;style=for-the-badge&amp;logo=discord&amp;logoColor=white"></a>
                            <a href="https://fr.wikipedia.org/wiki/PhpMyAdmin"><img src="https://img.shields.io/badge/PHPMyAdmin-%2300f.svg?&amp;style=for-the-badge&amp;logo=phpmyadmin&amp;logoColor=white"></a>
                            <a href="https://fr.wikipedia.org/wiki/GIMP"><img src="https://img.shields.io/badge/GIMP-%2300f.svg?&amp;style=for-the-badge&amp;logo=gimp&amp;logoColor=white"></a>
                            <a href="https://fr.wikipedia.org/wiki/Eclipse_(projet)"><img src="https://img.shields.io/badge/Eclipse%20IDE-%23007ACC.svg?&amp;style=for-the-badge&amp;logo=eclipse-ide&amp;logoColor=white"></a>
                        </div>

                        <div class="environnement">
                            <a href="https://fr.wikipedia.org/wiki/Linux"></a><img src="https://img.shields.io/badge/Linux-FCC624?style=for-the-badge&amp;logo=linux&amp;logoColor=black"></a>
                            <a href="https://fr.wikipedia.org/wiki/Ubuntu_(syst%C3%A8me_d%27exploitation)"></a><img src="https://img.shields.io/badge/Ubuntu-E95420?style=for-the-badge&amp;logo=ubuntu&amp;logoColor=white"></a>
                            <a href="https://fr.wikipedia.org/wiki/Arduino"></a><img src="https://img.shields.io/badge/Arduino-%2300f.svg?&amp;style=for-the-badge&amp;logo=arduino&amp;logoColor=white"></a>
                            <a href="https://fr.wikipedia.org/wiki/Raspberry_Pi"></a><img src="https://img.shields.io/badge/Raspberry%20Pi-C51A4A?style=for-the-badge&amp;logo=Raspberry-Pi"></a>
                            <a href="https://fr.wikipedia.org/wiki/Microsoft_Windows"></a><img src="https://img.shields.io/badge/Windows-0078D6?style=for-the-badge&amp;logo=windows&amp;logoColor=white"></a>
                        </div>
                        
                        <div class="repositories">
                            <a href="https://fr.wikipedia.org/wiki/Git"><img src="https://img.shields.io/badge/Git-F05032?style=for-the-badge&amp;logo=git&amp;logoColor=white"></a>
                            <a href="https://fr.wikipedia.org/wiki/GitLab"><img src="https://img.shields.io/badge/GitLab-FCA121?style=for-the-badge&amp;logo=gitlab"></a>
                            <a href="https://fr.wikipedia.org/wiki/GitHub"><img class="dark" src="https://img.shields.io/badge/GitHub-100000?style=for-the-badge&amp;logo=github&amp;logoColor=white"></a>
                        </div>
                    </section>

                    <section class="cv">
                        <h1>Download my CV here</h1>
                        <a href="https://drive.google.com/file/d/1w4QhwTzrhw0M8C93fa0ib6b_4Tsuezl8/view?usp=share_link"><button class="download"><img src="./public/ressources/download.svg" alt="image svg"><p>Download</p></button></a>
                    </section>

                </div>

            </section>

            <section class="myProjects page2">
                <ul class="nav">
                    <li class="grow" title="grow the page"></li>
                    <li class="closer" title="shrink the page"></li>
                </ul>
                
                <div class="separator"></div>

                <h1>My personals and school projects</h1>

                <div class="content">

                </div>

            </section>

            <section class="spotifyAlpha page3">
                <ul class="nav">
                    <li class="grow" title="grow the page"></li>
                    <li class="closer" title="shrink the page"></li>
                </ul>

                <div class="separator"></div>

                <h1>My spotify page</h1>

                <div class="content">

                </div>

            </section>

            <section class="myContacts page4">
                <ul class="nav">
                    <li class="grow" title="grow the page"></li>
                    <li class="closer" title="shrink the page"></li>
                </ul>

                <div class="separator"></div>

                <h1>All the ways to contact me</h1>

                <div class="content">
                    <ul>
                        <li class="instagram"><a href="https://www.instagram.com/mathi_grn_/"><svg viewBox="0 0 40 40"><path d="M20,7c4.2,0,4.7,0,6.3,0.1c1.5,0.1,2.3,0.3,3,0.5C30,8,30.5,8.3,31.1,8.9c0.5,0.5,0.9,1.1,1.2,1.8c0.2,0.5,0.5,1.4,0.5,3 C33,15.3,33,15.8,33,20s0,4.7-0.1,6.3c-0.1,1.5-0.3,2.3-0.5,3c-0.3,0.7-0.6,1.2-1.2,1.8c-0.5,0.5-1.1,0.9-1.8,1.2 c-0.5,0.2-1.4,0.5-3,0.5C24.7,33,24.2,33,20,33s-4.7,0-6.3-0.1c-1.5-0.1-2.3-0.3-3-0.5C10,32,9.5,31.7,8.9,31.1 C8.4,30.6,8,30,7.7,29.3c-0.2-0.5-0.5-1.4-0.5-3C7,24.7,7,24.2,7,20s0-4.7,0.1-6.3c0.1-1.5,0.3-2.3,0.5-3C8,10,8.3,9.5,8.9,8.9 C9.4,8.4,10,8,10.7,7.7c0.5-0.2,1.4-0.5,3-0.5C15.3,7.1,15.8,7,20,7z M20,4.3c-4.3,0-4.8,0-6.5,0.1c-1.6,0-2.8,0.3-3.8,0.7 C8.7,5.5,7.8,6,6.9,6.9C6,7.8,5.5,8.7,5.1,9.7c-0.4,1-0.6,2.1-0.7,3.8c-0.1,1.7-0.1,2.2-0.1,6.5s0,4.8,0.1,6.5 c0,1.6,0.3,2.8,0.7,3.8c0.4,1,0.9,1.9,1.8,2.8c0.9,0.9,1.7,1.4,2.8,1.8c1,0.4,2.1,0.6,3.8,0.7c1.6,0.1,2.2,0.1,6.5,0.1 s4.8,0,6.5-0.1c1.6-0.1,2.9-0.3,3.8-0.7c1-0.4,1.9-0.9,2.8-1.8c0.9-0.9,1.4-1.7,1.8-2.8c0.4-1,0.6-2.1,0.7-3.8 c0.1-1.6,0.1-2.2,0.1-6.5s0-4.8-0.1-6.5c-0.1-1.6-0.3-2.9-0.7-3.8c-0.4-1-0.9-1.9-1.8-2.8c-0.9-0.9-1.7-1.4-2.8-1.8 c-1-0.4-2.1-0.6-3.8-0.7C24.8,4.3,24.3,4.3,20,4.3L20,4.3L20,4.3z"></path><path d="M20,11.9c-4.5,0-8.1,3.7-8.1,8.1s3.7,8.1,8.1,8.1s8.1-3.7,8.1-8.1S24.5,11.9,20,11.9z M20,25.2c-2.9,0-5.2-2.3-5.2-5.2 s2.3-5.2,5.2-5.2s5.2,2.3,5.2,5.2S22.9,25.2,20,25.2z"></path><path d="M30.6,11.6c0,1-0.8,1.9-1.9,1.9c-1,0-1.9-0.8-1.9-1.9s0.8-1.9,1.9-1.9C29.8,9.7,30.6,10.5,30.6,11.6z"></path></svg></a></li>
                        <li class="linkedin"><a href="https://www.linkedin.com/in/mathis-guerin-43b228222/"><svg viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg></a></li>
                        <li class="discord"><a href="https://discordapp.com/users/444134344341061634"><svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"><path d="M20.317 4.4921C18.7873 3.80147 17.147 3.29265 15.4319 3.00122C15.4007 2.9956 15.3695 3.00965 15.3534 3.03777C15.1424 3.40697 14.9087 3.88862 14.7451 4.26719C12.9004 3.99545 11.0652 3.99545 9.25832 4.26719C9.09465 3.8802 8.85248 3.40697 8.64057 3.03777C8.62449 3.01059 8.59328 2.99654 8.56205 3.00122C6.84791 3.29172 5.20756 3.80054 3.67693 4.4921C3.66368 4.49772 3.65233 4.5071 3.64479 4.51928C0.533392 9.09311 -0.31895 13.5545 0.0991801 17.9606C0.101072 17.9822 0.11337 18.0028 0.130398 18.0159C2.18321 19.4993 4.17171 20.3998 6.12328 20.9967C6.15451 21.0061 6.18761 20.9949 6.20748 20.9695C6.66913 20.3492 7.08064 19.6952 7.43348 19.0073C7.4543 18.967 7.43442 18.9192 7.39186 18.9033C6.73913 18.6597 6.1176 18.3626 5.51973 18.0253C5.47244 17.9981 5.46865 17.9316 5.51216 17.8997C5.63797 17.8069 5.76382 17.7104 5.88396 17.613C5.90569 17.5952 5.93598 17.5914 5.96153 17.6026C9.88928 19.3672 14.1415 19.3672 18.023 17.6026C18.0485 17.5905 18.0788 17.5942 18.1015 17.612C18.2216 17.7095 18.3475 17.8069 18.4742 17.8997C18.5177 17.9316 18.5149 17.9981 18.4676 18.0253C17.8697 18.3692 17.2482 18.6597 16.5945 18.9024C16.552 18.9183 16.533 18.967 16.5538 19.0073C16.9143 19.6942 17.3258 20.3483 17.7789 20.9686C17.7978 20.9949 17.8319 21.0061 17.8631 20.9967C19.8241 20.3998 21.8126 19.4993 23.8654 18.0159C23.8834 18.0028 23.8948 17.9831 23.8967 17.9616C24.3971 12.8676 23.0585 8.4428 20.3482 4.52021C20.3416 4.5071 20.3303 4.49772 20.317 4.4921ZM8.02002 15.2778C6.8375 15.2778 5.86313 14.2095 5.86313 12.8976C5.86313 11.5857 6.8186 10.5175 8.02002 10.5175C9.23087 10.5175 10.1958 11.5951 10.1769 12.8976C10.1769 14.2095 9.22141 15.2778 8.02002 15.2778ZM15.9947 15.2778C14.8123 15.2778 13.8379 14.2095 13.8379 12.8976C13.8379 11.5857 14.7933 10.5175 15.9947 10.5175C17.2056 10.5175 18.1705 11.5951 18.1516 12.8976C18.1516 14.2095 17.2056 15.2778 15.9947 15.2778Z"/></svg></a></li>
                        <li class="mail"><a href="mailto:mathisjp.guerin@gmail.com?body=Bonjour%20Mathis,%0A%0A"><svg id="icon-90a" viewBox="0 0 40 40"><path d="M37.3,15.3v15.3c0,0.8-0.3,1.6-0.9,2.2c-0.6,0.6-1.4,0.9-2.2,0.9H5.8c-0.8,0-1.6-0.3-2.2-0.9s-0.9-1.4-0.9-2.2V15.3 c0.5,0.6,1.2,1.1,2,1.7c4.7,3.1,7.9,5.4,9.6,6.7c0.7,0.5,1.4,0.9,1.8,1.2c0.4,0.3,1,0.6,1.9,0.9c0.7,0.3,1.5,0.5,2.1,0.5l0,0 c0.6,0,1.4-0.2,2.1-0.5c0.7-0.3,1.4-0.6,1.9-0.9c0.4-0.3,1-0.7,1.8-1.2c2.2-1.6,5.4-3.8,9.6-6.7C36.1,16.5,36.7,15.9,37.3,15.3 L37.3,15.3z M37.3,9.6c0,1-0.3,2-0.9,2.9c-0.6,0.9-1.5,1.8-2.4,2.4c-4.9,3.3-7.9,5.4-9,6.2c-0.1,0.1-0.4,0.3-0.8,0.6 c-0.4,0.3-0.7,0.5-1,0.7c-0.3,0.2-0.6,0.4-1,0.6c-0.4,0.2-0.7,0.4-1.1,0.5c-0.4,0.1-0.6,0.2-0.9,0.2l0,0c-0.3,0-0.6-0.1-0.9-0.2 c-0.3-0.1-0.7-0.3-1.1-0.5c-0.4-0.2-0.7-0.4-1-0.6c-0.3-0.2-0.6-0.4-1-0.7c-0.4-0.3-0.7-0.5-0.8-0.6c-1.1-0.8-2.8-2-5.1-3.5 c-2.3-1.6-3.3-2.4-3.7-2.7c-0.8-0.5-1.6-1.2-2.3-2.2s-1-1.9-1-2.6c0-1,0.3-1.9,0.8-2.5c0.5-0.6,1.2-1,2.3-1h28.4 c0.8,0,1.6,0.3,2.2,0.9C37.1,8.1,37.3,8.8,37.3,9.6L37.3,9.6z"></path></svg></a></li>
                    </ul>
                </div>
            </section>

        </section>
        
    
        <footer>
        
        </footer>
</body>
</html>