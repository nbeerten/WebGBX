import Alpine from 'alpinejs'

window.Alpine = Alpine

document.addEventListener('alpine:init', () => {
    Alpine.magic('clipboard', () => {
        return subject => navigator.clipboard.writeText(subject)
    })
})
Alpine.start()