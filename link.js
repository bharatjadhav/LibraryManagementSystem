particlesJS('particles-js',

    {
        "particles": {
            "number": {
                "value": 500,
                "density": {
                    "enable": true,
                    "value_area": 8000
                }
            },
            "color": {
                "value": "#26d2be"

            },
            "shape": {
                "type": "circle",
                "stroke": {
                    "width": 0,
                    "color": "#26d2be"
                },
                "polygon": {
                    "nb_sides": 100
                },
                "image": {
                    "src": "img/github.svg",
                    "width": 100,
                    "height": 100
                }
            },
            "opacity": {
                //"value": 0.5,
                "random": true,
                "anim": {
                    "enable": true,
                    "speed": 9,

                    "opacity_min": 0.1,
                    "sync": false
                }
            },
            "size": {
                "value": 2,
                "random": true,
                "anim": {
                    "enable": true,
                    "speed": 2,
                    "size_min": 5,
                    "sync": false
                }
            },
            "line_linked": {
                "enable": true,
                "distance": 100,
                "color": "#c205fc",
                "opacity": 5,
                "width": 2
            },
            "move": {
                "enable": true,
                "speed": 3,
                "direction": "none",
                "random": true,

                "straight": false,
                "out_mode": "bounce",
                "attract": {
                    "enable": true,
                    "rotateX": 1200,
                    "rotateY": 600
                }
            }
        },
        "interactivity": {
            "detect_on": "canvas",
            "events": {
                "onhover": {
                    "enable": true,
                    "mode": "bubble"
                },
                "onclick": {
                    "enable": false,
                    "mode": "push"
                },
                "resize": true
            },
            "modes": {
                "grab": {
                    "distance": 400,
                    "line_linked": {    "color": "#00ff00",
                        "opacity": 1
                    }
                },
                "bubble": {
                    "distance": 100,
                    "size": 3,
                    "duration": 2,
                    "opacity": 8,
                    "speed": 1
                },
                "repulse": {
                    "distance": 200
                },
                "push": {
                    "particles_nb": 3
                },
                "remove": {
                    "particles_nb": 4
                }
            }
        },
        "retina_detect": true,
        "config_demo": {
            "hide_card": true,
        }
    }

);