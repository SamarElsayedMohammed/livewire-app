import "./bootstrap";

// var Turbolinks = require("turbolinks");
// Turbolinks.start();
import Turbolinks from "turbolinks";

document.addEventListener("turbolinks:load", () => {
    Livewire.restart();
});

Turbolinks.start();
