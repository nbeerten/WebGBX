import './bootstrap';
import "@fontsource/montserrat/variable.css";
import "@fontsource/montserrat/variable-italic.css";
import "@fontsource/fira-code/variable.css"

if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register("/serviceworker.js");
}