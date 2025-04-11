<link href="https://fonts.googleapis.com/css2?family=Onest:wght@300;400;600&display=swap" rel="stylesheet" />
<style>
    body {
      margin: 0;
      font-family: "Onest", sans-serif;
      background-color: #faeeee;
    }

    h1 {
      font-size: clamp(32px, 6vw, 80px);
      margin-bottom: 20px;
    }

    p {
      font-size: clamp(16px, 2.2vw, 24px);
      line-height: 1.5;
      margin: 20px 0;
    }

    .section {
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      text-align: center;
      position: relative;
      background-size: cover;
      background-position: center;
      padding: 20px;
      background-attachment: fixed;
      transition: background 1s ease, opacity 1s ease;
    }

    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.4);
    }

    .content {
      z-index: 2;
      max-width: 700px;
      margin: auto;
      padding: 20px;
      opacity: 1;
    }

    .btnz {
      display: inline-block;
      margin-top: 20px;
      padding: 12px 24px;
      color: white;
      text-decoration: none;
      border-radius: 20px;
      background: transparent;
      transition: all 0.3s ease;
      font-size: 16px;
    }

    .btn1 {
      border: 2px solid #e195ab;
    }

    .btn2 {
      border: 2px solid #8c4a4a;
    }

    .btn3 {
      border: 2px solid #70a988;
    }

    .btn1:hover {
      background: #e195ab;
      color: #ffffff;
    }

    .btn2:hover {
      background: #8c4a4a;
      color: #ffffff;
    }

    .btn3:hover {
      background: #70a988;
      color: #ffffff;
    }

    .san-valentin {
      background-image: url({{ asset('assets/velasgirasolesblancos.png') }});
    }

    .dia-muertos {
      background-image: url({{ asset('assets/veladiademuertos.png') }});
    }

    .navidad {
      background-image: url({{ asset('assets/velasnavidad.jpg') }});
    }

    .section.appear .content {
      animation: fade-in 0.8s forwards;
    }

    .section.disappear .content {
      animation: smoke-out 0.8s forwards;
    }

    @keyframes smoke-out {
      0% {
        opacity: 1;
        transform: translateY(0) scale(1) rotate(0deg);
        filter: blur(0);
      }

      100% {
        opacity: 0;
        transform: translateY(-60px) scale(1.1) rotate(-2deg);
        filter: blur(3px);
      }
    }

    @keyframes fade-in {
      0% {
        opacity: 0;
        transform: translateY(40px) scale(0.95);
        filter: blur(2px);
      }

      100% {
        opacity: 1;
        transform: translateY(0) scale(1);
        filter: blur(0);
      }
    }
  </style>

<body>
  <div class="section san-valentin">
    <div class="overlay"></div>
    <div class="content">
      <h1>San Valentín</h1>
      <p>
        Hermosas velas de flores perfectas para trasmitir emociones alegres y
        positivas. Cariño, gratitud y admiración.
      </p>
      <a href="{{ url('/catalogue?categoria=Temporada-Valentín') }}" class="btnz btn1">Conoce nuestro catálogo</a>
    </div>
  </div>
  <div class="section dia-muertos">
    <div class="overlay"></div>
    <div class="content">
      <h1>Día de Muertos</h1>
      <p>
        Adorna y eleva tu altar con nuestras velas inspiradas en tradiciones
        mexicanas.
      </p>
      <a href="{{ url('/catalogue?categoria=Temporada-Muertos') }}" class="btnz btn2">Conoce nuestro catálogo</a>
    </div>
  </div>
  <div class="section navidad">
    <div class="overlay"></div>
    <div class="content">
      <h1>Navidad</h1>
      <p>
        Velas navideñas, elegantes y aromáticas, decoradas con detalles
        naturales. Perfectas para crear un ambiente cálido y festivo.
      </p>
      <a href="{{ url('/catalogue?categoria=Temporada-Navidad') }}" class="btnz btn3">Conoce nuestro catálogo</a>
    </div>
  </div>
  <script>
    const sections = document.querySelectorAll(".section");

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          const section = entry.target;
          const content = section.querySelector(".content");

          if (entry.isIntersecting) {
            section.classList.remove("disappear");
            section.classList.add("appear");

            content.style.animation = "none"; // reset
            content.offsetHeight; // trigger reflow
            content.style.animation = null; // re-apply
          } else {
            section.classList.remove("appear");
            section.classList.add("disappear");

            content.style.animation = "none";
            content.offsetHeight;
            content.style.animation = null;
          }
        });
      },
      {
        threshold: 0.6,
      }
    );

    sections.forEach((section) => observer.observe(section));
  </script>
</body>