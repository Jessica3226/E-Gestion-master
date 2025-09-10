<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: #ddd;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background: #10700d;
            color: white;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .header h1 {
            margin: 0;
            font-size: 1.8rem;
            text-align: center;
        }

        .logo-left, .logo-right {
            height: 50px;
        }

        .logout-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background: #10700d;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }
        .logout-btn:hover {
            background: #0a4e09;
        }
        
        /* 3D Carousel */
        .scene {
            width: 90%;
            max-width: 400px;
            height: 320px;
            perspective: 1200px;
            margin: 100px auto;
            position: relative;
        }

        .carousel {
            width: 100%;
            height: 100%;
            position: relative;
            transform-style: preserve-3d;
            transition: transform 1s ease-in-out;
        }

        .card {
            position: absolute;
            width: 200px;
            height: 250px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.2rem;
            font-weight: bold;
            transition: transform 0.5s, box-shadow 0.5s;
        }
        .card:hover {
            transform: scale(1.05) translateZ(20px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
        }

        .circle {
            width: 120px;
            height: 120px;
            background: #10700d;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            transition: background 0.3s, transform 0.3s;
        }
        .circle a {
            color: white;
            text-decoration: none;
            text-align: center;
        }
        .circle:hover {
            background: #0a4e09;
            transform: scale(1.1);
        }

        .card:nth-child(1) { transform: rotateY(0deg) translateZ(300px); }
        .card:nth-child(2) { transform: rotateY(90deg) translateZ(300px); }
        .card:nth-child(3) { transform: rotateY(180deg) translateZ(300px); }
        .card:nth-child(4) { transform: rotateY(270deg) translateZ(300px); }

        .shadow {
            position: absolute;
            bottom: -25px;
            left: 50%;
            transform: translateX(-50%);
            width: 140px;
            height: 25px;
            background: radial-gradient(rgba(0, 0, 0, 0.25), transparent);
            border-radius: 50%;
            filter: blur(8px);
        }

        @media (max-width: 480px) {
            .card {
                width: 150px;
                height: 200px;
                font-size: 1rem;
            }
            .circle {
                width: 90px;
                height: 90px;
            }
            .scene {
                height: 250px;
            }
        }
    </style>
</head>
<body>

    <div class="header">
        <img src="images/logo-left.png" alt="Logo Gauche" class="logo-left">
        <h1>RECENSEMENT</h1>
        <img src="images/logo-right.png" alt="Logo Droite" class="logo-right">
    </div>

    <button class="logout-btn" onclick="logoutUser()"><i class="fas fa-sign-out-alt"></i> Déconnexion</button>

    <div class="scene">
        <div class="carousel" id="carousel">
            <div class="card"><div class="circle"><a href="/ajoutAgent"><i class="fas fa-user-plus"></i> <span>Agent</span></a></div><div class="shadow"></div></div>
            <div class="card"><div class="circle"><a href="/familleAgent"><i class="fas fa-people-roof"></i> <span>Familles</span></a></div><div class="shadow"></div></div>
            <div class="card"><div class="circle"><a href="/listesAgent"><i class="fas fa-list"></i> <span>Liste des Agents</span></a></div><div class="shadow"></div></div>
            <div class="card"><div class="circle"><a href="/archivesAgent"><i class="fas fa-box-archive"></i> <span>Archives</span></a></div><div class="shadow"></div></div>
        </div>
    </div>

    <script>
        function logoutUser() {
            window.location.href = "<?php echo base_url('/logout'); ?>";
        }

        let angle = 0;
        const carousel = document.getElementById("carousel");

        window.addEventListener("wheel", (e) => {
            if (e.deltaY > 0) {
                angle -= 90;
            } else {
                angle += 90;
            }
            carousel.style.transform = `translateZ(-300px) rotateY(${angle}deg)`;
        });

        window.addEventListener("keydown", (e) => {
            if (e.key === "ArrowLeft") {
                angle += 90;
            } else if (e.key === "ArrowRight") {
                angle -= 90;
            }
            carousel.style.transform = `translateZ(-300px) rotateY(${angle}deg)`;
        });

        carousel.addEventListener("click", () => {
            angle -= 90;
            carousel.style.transform = `translateZ(-300px) rotateY(${angle}deg)`;
        });
    </script>

</body>
</html>
