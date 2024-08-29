import './bootstrap';
import './argon-dashboard-tailwind.js';
import Alpine from 'alpinejs';
import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.css";

// Importa el idioma español
import { Spanish } from "flatpickr/dist/l10n/es.js";
window.Alpine = Alpine;

// Hacer Flatpickr globalmente accesible para Alpine.js
window.flatpickr = flatpickr;
flatpickr.localize(Spanish);
Alpine.start();
